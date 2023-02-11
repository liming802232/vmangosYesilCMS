<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Format class 格式类
 * 帮助在各种格式之间进行转换，例如 XML、JSON、CSV 等。
 *
 * @author    Phil Sturgeon, Chris Kacerguis, @softwarespot
 * @license   http://www.dbad-license.org/
 */
class Format
{
    /**
     * Array output format *数组输出格式
     */
    public const ARRAY_FORMAT = 'array';

    /**
     * Comma Separated Value (CSV) output format *逗号分隔值 (CSV) 输出格式
     */
    public const CSV_FORMAT = 'csv';

    /**
     * Json output format *JSON输出格式
     */
    public const JSON_FORMAT = 'json';

    /**
     * HTML output format *HTML输出格式
     */
    public const HTML_FORMAT = 'html';

    /**
     * PHP output format *PHP输出格式
     */
    public const PHP_FORMAT = 'php';

    /**
     * Serialized output format *序列化输出格式
     */
    public const SERIALIZED_FORMAT = 'serialized';

    /**
     * XML output format *XML输出格式
     */
    public const XML_FORMAT = 'xml';

    /**
     * Default format of this class *此类的默认格式
     */
    public const DEFAULT_FORMAT = self::JSON_FORMAT; // 不能是 DEFAULT，因为这是一个关键字

    /**
     * CodeIgniter instance *CodeIgniter示例
     *
     * @var object
     */
    private $_CI;

    /**
     * Data to parse * 要解析的数据
     *
     * @var mixed
     */
    protected $_data = [];

    /**
     * Type to convert from *要转换的类型
     *
     * @var string
     */
    protected $_from_type = null;

    /**
     * 不要直接调用它，使用 factory()
     *
     * @param  NULL  $data
     * @param  NULL  $from_type
     *
     * @throws Exception
     */

    public function __construct($data = null, $from_type = null)
    {
        // Get the CodeIgniter reference// 获得 CodeIgniter 参考
        $this->_CI = &get_instance();

        // Load the inflector helper// 加载变形器助手
        $this->_CI->load->helper('inflector');

        // 如果提供的数据已经格式化，我们可能应该将其转换为数组
        if ($from_type !== null) {
            if (method_exists($this, '_from_' . $from_type)) {
                $data = call_user_func([$this, '_from_' . $from_type], $data);
            } else {
                throw new Exception('格式类不支持从"转换' . $from_type . '".');
            }
        }

        // 设置成员变量为传入的数据
        $this->_data = $data;
    }

    /**
     * 创建格式类的示例
     * 示例: echo $this->format->factory(['foo' => 'bar'])->to_csv();
     *
     * @param  mixed   $data       要转换/解析的数据
     * @param  string  $from_type  要转换的类型，例如 json、csv、html
     *
     * @return object Instance of the format class
     */
    public static function factory($data, $from_type = null)
    {
        // $class = __CLASS__;
        // return new $class();

        return new static($data, $from_type);
    }

    // FORMATTING OUTPUT 格式化输出---------------------------------------------------------

    /**
     * Format data as an array *将数据格式化为数组
     *
     * @param  mixed|NULL  $data  要传递的可选数据，以便重写
     *                            传递给构造函数的数据
     *
     * @return array Data parsed as an array; otherwise, an empty array
     */
    public function to_array($data = null)
    {
        // 如果没有数据作为参数传递，则使用
        // 通过构造函数传递的数据
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        // 如果尚未转换为数组，则转换为数组
        if (is_array($data) === false) {
            $data = (array)$data;
        }

        $array = [];
        foreach ((array)$data as $key => $value) {
            if (is_object($value) === true || is_array($value) === true) {
                $array[$key] = $this->to_array($value);
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    /**
     * Format data as XML *将数据格式化为 XML
     *
     * @param  mixed|NULL  $data  传递的可选数据，以重写
     *                            传递给构造函数的数据
     * @param  NULL        $structure
     * @param  string      $basenode
     *
     * @return mixed
     */
    public function to_xml($data = null, $structure = null, $basenode = 'xml')
    {
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        if ($structure === null) {
            $structure = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$basenode />");
        }

        // 强制它成为有用的东西
        if (is_array($data) === false && is_object($data) === false) {
            $data = (array)$data;
        }

        foreach ($data as $key => $value) {
            //将 false/true 更改为 0/1
            if (is_bool($value)) {
                $value = (int)$value;
            }

            // 请在我们的 xml 中不要使用数字键！
            if (is_numeric($key)) {
                // 生成字符串键...
                $key = (singular($basenode) != $basenode) ? singular($basenode) : 'item';
            }

            // 替换任何非字母数字的内容
            $key = preg_replace('/[^a-z_\-0-9]/i', '', $key);

            if ($key === '_attributes' && (is_array($value) || is_object($value))) {
                $attributes = $value;
                if (is_object($attributes)) {
                    $attributes = get_object_vars($attributes);
                }

                foreach ($attributes as $attribute_name => $attribute_value) {
                    $structure->addAttribute($attribute_name, $attribute_value);
                }
            } //如果递归地找到另一个数组，则调用此函数
            elseif (is_array($value) || is_object($value)) {
                $node = $structure->addChild($key);

                // 递归调用。
                $this->to_xml($value, $node, $key);
            } else {
                // 添加单个节点。
                $value = htmlspecialchars(html_entity_decode($value, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');

                $structure->addChild($key, $value);
            }
        }

        return $structure->asXML();
    }

    /**
     * Format data as HTML *将数据格式化为HTML
     *
     * @param  mixed|NULL  $data  要传递的可选数据，以便重写
     *                            传递给构造函数的数据
     *
     * @return mixed
     */
    public function to_html($data = null)
    {
        // 如果没有数据作为参数传递，则使用
        // 通过构造函数传递的数据
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        // 如果尚未转换为数组，则转换为数组
        if (is_array($data) === false) {
            $data = (array)$data;
        }

        // 检查是否为多维数组
        if (isset($data[0]) && count($data) !== count($data, COUNT_RECURSIVE)) {
            // 多维数组
            $headings = array_keys($data[0]);
        } else {
            // 单数组
            $headings = array_keys($data);
            $data     = [$data];
        }

        // 加载表库
        $this->_CI->load->library('table');

        $this->_CI->table->set_heading($headings);

        foreach ($data as $row) {
            // 抑制“数组到字符串转换”通知
            // 保留 "evil" @ 在这里
            $row = @array_map('strval', $row);

            $this->_CI->table->add_row($row);
        }

        return $this->_CI->table->generate();
    }

    /**
     * @link http://www.metashock.de/2014/02/create-csv-file-in-memory-php/
     *
     * @param  mixed|NULL  $data       要传递的可选数据，以便重写
     *                                 传递给构造函数的数据
     * @param  string      $delimiter  可选的分隔符参数设置字段
     *                                 分隔符（仅一个字符）。 NULL 将使用默认值(,)
     * @param  string      $enclosure  可选的附件参数设置字段
     *                                 附件  （仅一个字符）。 NULL 将使用默认值(")
     *
     * @return string A csv string
     */
    public function to_csv($data = null, $delimiter = ',', $enclosure = '"')
    {
        // 使用的阈值 1 MB (1024 * 1024)
        $handle = fopen('php://temp/maxmemory:1048576', 'w');
        if ($handle === false) {
            return null;
        }

        // 如果没有数据作为参数传递，则使用
        // 通过构造函数传递的数据
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        // 如果为 NULL，则设置为默认分隔符
        if ($delimiter === null) {
            $delimiter = ',';
        }

        // 如果为NULL，则设置为默认附件
        if ($enclosure === null) {
            $enclosure = '"';
        }

        // 如果尚未转换为数组，则转换为数组
        if (is_array($data) === false) {
            $data = (array)$data;
        }

        // 检查是否为多维数组
        if (isset($data[0]) && count($data) !== count($data, COUNT_RECURSIVE)) {
            // 多维数组
            $headings = array_keys($data[0]);
        } else {
            // 单数组
            $headings = array_keys($data);
            $data     = [$data];
        }

        // 应用标题
        fputcsv($handle, $headings, $delimiter, $enclosure);

        foreach ($data as $record) {
            // 如果记录不是数组，则中断。 这是因为 
            // fputcsv() 的第二个参数应该是一个数组
            if (is_array($record) === false) {
                break;
            }

            // 抑制“数组到字符串转换”通知
            // 保留 "evil" @ 在这里
            $record = @ array_map('strval', $record);

            // 返回写入的字符串的长度或 FALSE
            fputcsv($handle, $record, $delimiter, $enclosure);
        }

        // 重新设置文件指针
        rewind($handle);

        // 检索 csv 内容
        $csv = stream_get_contents($handle);

        // Closehandle 函数
        fclose($handle);

        // 将 UTF-8 编码转换为 MS Excel 支持的 UTF-16LE
        $csv = mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');

        return $csv;
    }

    /**
     * Encode data as json *将数据编码为 json
     *
     * @param  mixed|NULL  $data  要传递的可选数据，以便重写
     *                            传递给构造函数的数据
     *
     * @return string Json representation of a value
     */
    public function to_json($data = null)
    {
        // 如果没有数据作为参数传递，则使用
        // 通过构造函数传递的数据
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        // 获取回调参数（若已设置）
        $callback = $this->_CI->input->get('callback');

        if (empty($callback) === true) {
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        } // 我们只接受 jsonp 回调，它是有效的 javascript 标识符
        elseif (preg_match('/^[a-z_\$][a-z0-9\$_]*(\.[a-z_\$][a-z0-9\$_]*)*$/i', $callback)) {
            // 通过回调将数据作为编码的json返回
            return $callback . '(' . json_encode($data, JSON_UNESCAPED_UNICODE) . ');';
        }

        // 提供了无效的 jsonp 回调函数。
        // 虽然我认为这不应该在这里硬编码
        $data['warning'] = 'INVALID JSONP CALLBACK: ' . $callback;

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Encode data as a serialized array * 将数据编码为序列化数组
     *
     * @param  mixed|NULL  $data  要传递的可选数据，以便重写
     *                            传递给构造函数的数据
     *
     * @return string Serialized data
     */
    public function to_serialized($data = null)
    {
        // 如果没有数据作为参数传递，则使用
        // 通过构造函数传递的数据
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        return serialize($data);
    }

    /**
     * Format data using a PHP structure * 使用 PHP 结构格式化数据
     *
     * @param  mixed|NULL  $data  要传递的可选数据，以便重写
     *                            传递给构造函数的数据
     *
     * @return mixed String representation of a variable
     */
    public function to_php($data = null)
    {
        // 如果没有数据作为参数传递，则使用
        // 通过构造函数传递的数据
        if ($data === null && func_num_args() === 0) {
            $data = $this->_data;
        }

        return var_export($data, true);
    }

    // INTERNAL FUNCTIONS // 内部函数

    /**
     * @param  string  $data  XML string
     *
     * @return array XML element object; otherwise, empty array
     */
    protected function _from_xml($data)
    {
        return $data ? (array)simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA) : [];
    }

    /**
     * @param  string  $data       CSV string
     * @param  string  $delimiter  可选的分隔符参数设置字段
     *                             分隔符（仅一个字符）。 NULL 将使用默认值 (,)
     * @param  string  $enclosure  可选的附件参数设置字段
     *                             附件  （仅一个字符）。 NULL 将使用默认值 (")
     *
     * @return array A multi-dimensional array with the outer array being the number of rows
     * and the inner arrays the individual fields
     */
    protected function _from_csv($data, $delimiter = ',', $enclosure = '"')
    {
        // 如果为 NULL，则设置为默认分隔符
        if ($delimiter === null) {
            $delimiter = ',';
        }

        // 如果为 NULL，则设置为默认附件
        if ($enclosure === null) {
            $enclosure = '"';
        }

        return str_getcsv($data, $delimiter, $enclosure);
    }

    /**
     * @param  string  $data  Encoded json string
     *
     * @return mixed Decoded json string with leading and trailing whitespace removed
     */
    protected function _from_json($data)
    {
        return json_decode(trim($data));
    }

    /**
     * @param  string  $data  Data to unserialize
     *
     * @return mixed Unserialized data
     */
    protected function _from_serialize($data)
    {
        return unserialize(trim($data));
    }

    /**
     * @param  string  $data  Data to trim leading and trailing whitespace
     *
     * @return string Data with leading and trailing whitespace removed
     */
    protected function _from_php($data)
    {
        return trim($data);
    }
}
