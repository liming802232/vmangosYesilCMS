<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cart extends CI_Cart
{
    public function __construct($params = array())
    {
        // 将超级对象设置为局部变量以备后用
        $this->CI =& get_instance();

        // 是否手动传递任何配置设置？  如果是，请设置它们
        $config = is_array($params) ? $params : array();

        // Load the Sessions class *加载会话类
        $this->CI->load->driver('session', $config);

        // 从会话表中获取购物车数组
        $this->_cart_contents = $this->CI->session->userdata('cart_contents');
        if ($this->_cart_contents === null) {
            // 不存在购物车，因此我们将设置一些基本值
            $this->_cart_contents = array('cart_total' => 0, 'total_items' => 0, 'total_dp' => 0, 'total_vp' => 0, 'count_items' => 0, 'valid_items' => 0);
        }

        log_message('信息'，'购物车类初始化');
    }

    // --------------------------------------------------------------------

    /**
     * Insert
     *
     * @param  array
     *
     * @return    bool
     */
    protected function _insert($items = array())
    {
        // 是否传递了任何购物车数据？ 不知道？ 啊呸...
        if (! is_array($items) or count($items) === 0) {
            log_message('错误', 'insert 方法必须传递一个包含数据的数组。');

            return false;
        }

        // --------------------------------------------------------------------

        // $items 数组是否包含 id、quantity数量、price价格、name名称、dp 和 vp？ 这些是必需的
        if (! isset($items['id'], $items['qty'], $items['price'], $items['name'], $items['category'], $items['dp'], $items['vp'], $items['guid'])) {
            log_message('错误', '购物车数组必须包含 product产品ID、quantity数量、price价格、name名称、category类别、dp、vp 和 guid。');

            return false;
        }

        // --------------------------------------------------------------------

        // 准备数量。 它只能是一个数字。 呃......也修剪任何前导零
        $items['qty'] = (float)$items['qty'];

        // 如果数量为零或空白，我们就无能为力
        if ($items['qty'] == 0) {
            return false;
        }

        // --------------------------------------------------------------------

        // 验证产品 ID。 它只能是 alpha-numeric字母数字、dashes破折号、underscores下划线或 periods句点
        // 不完全确定我们是否应该强加这条规则，但标准化 ID 似乎是谨慎的做法。
        // 注意：这些可以由用户通过设置 $this->product_id_rules 变量来指定。
        if (! preg_match('/^[' . $this->product_id_rules . ']+$/i', $items['id'])) {
            log_message('错误', '产品 ID 无效。 产品 ID 只能包含字母数字字符、破折号和下划线');

            return false;
        }

        // --------------------------------------------------------------------

        // 验证产品名称。 它只能是 alpha-numeric字母数字、dashes破折号、underscores下划线、colons冒号或 periods句号。
        // 注意：这些可以通过设置 $this->product_name_rules 变量由用户指定。
        if ($this->product_name_safe && ! preg_match('/^[' . $this->product_name_rules . ']+$/i' . (UTF8_ENABLED ? 'u' : ''), $items['name'])) {
            log_message('错误', '提交了一个无效名称作为产品名称： ' . $items['name'] . ' 该名称只能包含 alpha-numeric字母数字、characters字符、dashes短划线、underscores下划线、colons冒号和spaces空格 ');

            return false;
        }

        // --------------------------------------------------------------------

        // 准备价格、dp 和 vp。 删除前导零和任何不是数字或decimal point小数点的内容。
        $items['price']    = (float)$items['price'];
        $items['category'] = (float)$items['category'];
        $items['dp']       = (float)$items['dp'];
        $items['vp']       = (float)$items['vp'];
        $items['guid']     = (float)$items['guid'];

        // 我们现在需要为要插入购物车的商品创建一个唯一标识符。
        // 每次将东西添加到购物车时，它都会存储在主购物车数组中。
        // 然而，购物车数组中的每一行都必须有一个唯一的索引，该索引不仅标识
        // 一个特定的产品，但可以存储具有不同选项的相同产品。
        // 例如，如果有人买了两件相同的 T 恤（相同的产品 ID），但在
        // 大小不同？ 产品 ID（和其他属性，如名称）对于
        // 两种尺寸，因为它是同一件衬衫。 唯一的区别是尺寸。
        // 在内部，我们需要将相同的提交但具有不同的选项视为独特的产品。
        // 我们的解决方案是将选项数组转换为字符串并将其与产品 ID 一起进行 MD5。
        // 这成为唯一的“行 ID”
        if (isset($items['options']) && count($items['options']) > 0) {
            $rowid = md5($items['id'] . serialize($items['options']));
        } else {
            // 没有提交任何选项，所以我们简单地对产品 ID 进行 MD5 运算。
            // 从技术上讲，在这种情况下我们不需要对 ID 进行 MD5，但它使得
            // 对两种情况下数组索引的格式进行标准化
            $rowid = md5($items['id']);
        }

        // --------------------------------------------------------------------

        // 现在我们有了唯一的“行 ID”，我们将把我们的购物车项目添加到主数组
        // 抓取数量（如果已经存在）并将其添加
        $old_quantity = isset($this->_cart_contents[$rowid]['qty']) ? (int)$this->_cart_contents[$rowid]['qty'] : 0;

        // 重新创建条目，只是为了确保我们的索引只包含这次提交的数据
        $items['rowid']               = $rowid;
        $items['qty']                 += $old_quantity;
        $this->_cart_contents[$rowid] = $items;

        return $rowid;
    }

    // --------------------------------------------------------------------

    /**
     * 更新购物车
     *
     * 此功能允许更改项目属性。
     * 通常它是从"view–cart查看购物车"页面调用的，如果用户进行
     * 结帐前更改数量。 该数组必须包含
     * 每个商品的 行ID和数量。
     *
     * @param  array
     *
     * @return    bool
     */
    protected function _update($items = array())
    {
        // 没有这些数组索引，我们无能为力
        if (! isset($items['rowid'], $this->_cart_contents[$items['rowid']])) {
            return false;
        }

        // 准备数量
        if (isset($items['qty'])) {
            $items['qty'] = (float)$items['qty'];
            // 数量是否为零？ 如果是，我们将从购物车中移除该商品。
            // 如果数量大于零我们更新
            if ($items['qty'] == 0) {
                unset($this->_cart_contents[$items['rowid']]);

                return true;
            }
        }

        // 查找可更新密钥
        $keys = array_intersect(array_keys($this->_cart_contents[$items['rowid']]), array_keys($items));
        // 如果价格通过，确保它包含有效数据
        if (isset($items['price'])) {
            $items['price'] = (float)$items['price'];
        }

        if (isset($items['category'])) {
            $items['category'] = (float)$items['category'];
        }

        if (isset($items['dp'])) {
            $items['dp'] = (float)$items['dp'];
        }

        if (isset($items['vp'])) {
            $items['vp'] = (float)$items['vp'];
        }

        if (isset($items['guid'])) {
            $items['guid'] = (float)$items['guid'];
        }

        // 产品ID 和名称不应该被改变
        foreach (array_diff($keys, array('id', 'name')) as $key) {
            $this->_cart_contents[$items['rowid']][$key] = $items[$key];
        }

        return true;
    }

    // --------------------------------------------------------------------

    /**
     * Save the cart array to the session DB * 保存购物车数组到会话数据库
     *
     * @return    bool
     */
    protected function _save_cart()
    {
        // 让我们将各个价格相加并设置购物车小计
        $this->_cart_contents['total_items'] = $this->_cart_contents['cart_total'] = $this->_cart_contents['total_dp'] = $this->_cart_contents['total_vp'] = $this->_cart_contents['count_items'] = $this->_cart_contents['valid_items'] = 0;
        foreach ($this->_cart_contents as $key => $val) {
            // 我们确保数组包含正确的索引
            if (! is_array($val) or ! isset($val['price'], $val['qty']) or ! isset($val['dp'], $val['qty']) or ! isset($val['vp'], $val['qty']) or ! isset($val['guid']) or ! isset($val['category'])) {
                continue;
            }

            $this->_cart_contents['cart_total']     += ($val['price'] * $val['qty']);
            $this->_cart_contents['total_dp']       += ($val['dp'] * $val['qty']);
            $this->_cart_contents['total_vp']       += ($val['vp'] * $val['qty']);
            $this->_cart_contents['total_items']    += $val['qty'];
            $this->_cart_contents['count_items']    += ($val['id'] != 0);
            $this->_cart_contents['valid_items']    += ($val['guid'] != 0);
            $this->_cart_contents[$key]['subtotal'] = ($this->_cart_contents[$key]['price'] * $this->_cart_contents[$key]['qty']);
        }

        // 我们的购物车是空的吗？ 如果是这样我们从会话中删除它
        if (count($this->_cart_contents) <= 2) {
            $this->CI->session->unset_userdata('cart_contents');

            // 没什么可做的了……咖啡时间！
            return false;
        }

        // 如果我们做到了这一步，就意味着我们的购物车有数据。
        // 让我们把它传递给 Session 类，这样它就可以被存储
        $this->CI->session->set_userdata(array('cart_contents' => $this->_cart_contents));

        // 哇哦!
        return true;
    }

    // --------------------------------------------------------------------

    /**
     * Total DP *DP总计
     *
     * @return    int
     */
    public function total_dp()
    {
        return $this->_cart_contents['total_dp'];
    }

    // --------------------------------------------------------------------

    /**
     * Total VP *VP总计
     *
     * @return    int
     */
    public function total_vp()
    {
        return $this->_cart_contents['total_vp'];
    }

    // --------------------------------------------------------------------

    /**
     * Count Items on cart *计算购物车上的物品
     *
     * @return    int
     */
    public function count_items()
    {
        return $this->_cart_contents['count_items'];
    }

    // --------------------------------------------------------------------

    /**
     * Valid guid on items * 物品的有效指南
     *
     * @return    int
     */
    public function valid_items()
    {
        return $this->_cart_contents['valid_items'];
    }

    // --------------------------------------------------------------------

    /**
     * Cart Contents * 购物车内容
     *
     * Returns the entire cart array * 返回整个购物车数组
     *
     * @param  bool
     *
     * @return    array
     */
    public function contents($newest_first = false)
    {
        // 我们是否首先要最新的？
        $cart = ($newest_first) ? array_reverse($this->_cart_contents) : $this->_cart_contents;

        // 删除这些，这样它们在显示购物车表时就不会产生问题
        unset($cart['total_items']);
        unset($cart['cart_total']);
        unset($cart['total_dp']);
        unset($cart['total_vp']);
        unset($cart['count_items']);
        unset($cart['valid_items']);

        return $cart;
    }

    // --------------------------------------------------------------------

    /**
     * Get cart item * 获取购物车商品
     *
     * Returns the details of a specific item in the cart * 返回购物车中特定商品的详细信息
     *
     * @param  string  $row_id
     *
     * @return    array
     */
    public function get_item($row_id)
    {
        return (in_array($row_id, array('total_items', 'cart_total', 'total_dp', 'total_vp', 'count_items', 'valid_items'), true) or ! isset($this->_cart_contents[$row_id]))
            ? false
            : $this->_cart_contents[$row_id];
    }

    // --------------------------------------------------------------------

    /**
     * Destroy the cart 销毁购物车
     *
     * Empties the cart and kills the session *清空购物车并终止会话
     *
     * @return    void
     */
    public function destroy()
    {
        $this->_cart_contents = array('cart_total' => 0, 'total_items' => 0, 'total_dp' => 0, 'total_vp' => 0, 'count_items' => 0, 'valid_items' => 0);
        $this->CI->session->unset_userdata('cart_contents');
    }
}
