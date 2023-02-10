<?php

/*
Copyright 2016 Wakeel Ogunsanya
Licensed under GPLv2 or above

Version 1.2.1
*/

class Array_Config_Writer
{
    /**
     * 如果索引实际存在则跳过更新索引
     *
     * 如果不存在，这也会创建新索引
     */
    public const SKIP_IF_EXIST = 0;
    /**
     * 如果找不到指定的索引，则跳过创建新索引
     */
    public const SKIP_CREATE_IF_NOT_EXIST = 1;
    /**
     * 更新或创建索引
     */
    public const CREATE_OR_UPDATE = 2;
    /**
     * 要写入的配置文件
     *
     * 在类构造期间设置
     *
     * @var strng
     */
    protected $_file;

    /**
     * 从文件中读取的内容
     *
     * @var string
     */
    protected $_fileContent;


    /**
     * 要在文件中搜索的变量
     *
     * 例如，如果我们可以更新文件中的“option_name”值
     * $config['option_name'] 数组，变量为'config'
     *
     * @注意我们假设每个选项索引都在单独的行上
     *  $config['option_name_one']  = 'one' ;
     *  $config['option_name_two']  = 'two' ;
     *
     * 如果你有类似 $config['options'] = array(
     *                                      'option_name_one' => 'one',
     *                                      'option_name_two' => 'two'
     *                                 );
     * 你必须先在变量中获取 $config['options'] 然后手动更新
     * elements，之后你可以使用这个配置编写器来更新
     * $config['options'] element
     *
     * @var string
     */
    protected $_variable;

    /**
     * 变量的目标索引
     *
     * @var string
     */
    protected $_index;

    /**
     *
     * @var string
     */
    protected $_replacement;

    /**
     *
     * @var string
     */
    protected $_lastError;


    /**
     *  这个选项决定文件是否应该自动更新
     *
     * 如果设置为false，您将在使用write()方法完成写入后
     * 手动调用save()方法
     *
     * @since 1.1.0
     * @var boolean
     */
    protected $_autoSave = true;


    /**
     *
     * @param  string  $config_file    配置文件的绝对路径
     * @param  string  $variable_name  要更新的配置变量的名称
     */
    public function __construct($config_file, $variable_name = '\$config', $auto_save = true)
    {
        $this->_file     = $config_file;
        $this->_autoSave = $auto_save;
        $this->setVariableName($variable_name);

        if (! file_exists($this->_file)) {
            //throw new Exception('配置写入错误：配置文件不存在 ' . $this->_file);
            $this->_lastError = '配置写入错误：配置文件不存在 ' . $this->_file;

            return;
        }
        if (! $variable_name) {
            $this->_lastError = '您必须设置库构造的 set 参数有变量要更新';

            return;
        }

        $this->_fileContent = file_get_contents($this->_file);
    }


    /**
     * 写入或更新配置数组的一项
     *
     * @param  string|array  $index         更新 'language' 索引 $config['language']
     *                                      这将是字符串 'language' 要更新
     *                                      $db['default']['hostname']的主机名'，那么
     *                                      索引将是数组array( 'default' , 'hostname' )
     *
     * @param  mixed         $replacement
     * @param  boolean       $write_method  如果已经存在则跳过更新项目
     * @param  null|array    $comments      评论添加到项目（新项目）的顶部，每个元素将被放置在一个新行上。
     *                                      * 添加在每一行之前，这意味着您不必放置 
     *                                      /** 或 * 除非您希望它显示
     *
     * @return boolean
     *
     * @throws Exception
     *
     * @请注意，您不能更新现有的项目评论
     *
     *
     */
    public function write($index = null, $replacement = null, $write_method = self::CREATE_OR_UPDATE, $comments = null)
    {
        // error exists in the constructor?
        if ($this->_lastError) {
            return $this;
        }

        $this->_fileContent = trim($this->_fileContent);

        if (! $index) {
            $this->_lastError = '您必须设置要更新的索引';

            return $this;
        }
        $prefix = $this->_variable;

        $regex = '#(' . $prefix . ')(';
        // 添加标记以防配置项不存在
        $mark = "{$prefix}";
        // 我们可以更新多维
        $indices     = is_array($index) ? $index : array($index);
        $comment_str = '';

        foreach ($indices as $i) {
            $is_int = is_int($i);
            // 我们确保我们不会更改索引类型，如果它是数字的话
            $new_item_index = $is_int ? $i : "'$i'";
            // 如果索引是 int，我们不需要在正则表达式中检查 ' 或 ""
            $regex .= '\[\s*';
            $regex .= $is_int ? '' : '(\'|\")';
            $regex .= '(' . $i . ')*';
            $regex .= $is_int ? '' : '(\'|\")';
            $regex .= '\s*\]';
            // 在我们将数字索引与字符串分开之前使用
            //$regex .= '\[\s*(\'|\")(' . $i . ')*(\'|\")\s*\]' ;


            $mark .= "[$new_item_index]";
        }

        // closing
        $regex .= ')\s*=[^\;]*#';
        $mark  .= " = ";

        if (preg_match($regex, $this->_fileContent)) {
            // 好配置已经存在
            // 可能是应用程序升级 :) 我们不想覆盖用户设置
            if ($write_method == self::SKIP_IF_EXIST) {
                return $this;
            }
            // 更新内容
            $this->_fileContent = preg_replace($regex, '$1$2 = ' . var_export($replacement, true), $this->_fileContent);
        } // 配置项不存在，如果需要则创建新索引
        else {
            switch ($write_method) {
                case self::SKIP_CREATE_IF_NOT_EXIST:
                    return $this;
                case self::CREATE_OR_UPDATE:
                case self::SKIP_IF_EXIST:

                    // 这里有新项目
                    $mark .= var_export($replacement, true) . ' ;';
                    $mark .= "\n";
                    $mark .= "\n";

                    // 如果提供，请添加评论
                    if (is_array($comments) && count($comments) > 0) {
                        //open comment
                        $comment_str .= '/**';
                        $comment_str .= "\n";
                        foreach ($comments as $line) {
                            $comment_str .= ' * ' . $line . "\n";
                        }
                        // 关闭评论
                        $comment_str .= '*/';
                    }

                    // 让我们尝试从变量名中删除尾部斜杠，因为
                    //我们在这里写php
                    if (substr($mark, 0, 1) == '\\') {
                        $mark = substr($mark, 1);
                    }

                    // 我们更新了索引，文件将自动保存在类 shutdwon 中
                    // 我们这样做允许根据需要多次调用 write() 方法来更新多个索引
                    // 按要求
                    //

                    // 检查文件是否有 php 结束标签
                    if (substr($this->_fileContent, -2) === '?>') {
                        // 在添加我们的新项目之前删除结束标签
                        $this->_fileContent = substr($this->_fileContent, 0, -2) . "\n" . $comment_str . "\n" . $mark . ' ?>';
                    } else {
                        $this->_fileContent = $this->_fileContent . "\n" . $comment_str . "\n" . $mark . "\n";
                    }
                    break;
                case self::SKIP_CREATE_IF_NOT_EXIST:
                    return $this;
                default:
                    throw new Exception('Class: ' . __CLASS__ . ' Method :' . __METHOD__ . 'third parameter is invalid. Use the class constant');
            }
        }

        return $this;
    }

    /**
     * 更新数组配置的文件名
     *
     * 你将只执行此操作以将 php 文件内容传输到另一个文件
     *
     * @param  string  $name
     *
     * @return Array_Config_Writer for method chaining
     */
    public function setFilename($name = null)
    {
        $this->_file = $name;
    }


    /**
     *  设置配置变量名
     * // 实际上我们期望类似 '\$config' 但用户可能只提供 'config'
     *
     * @param  string  $name
     *
     * @return Array_Config_Writer
     */
    public function setVariableName($name = null)
    {
        if (! is_string($name)) {
            $this->_lastError = 'Variable name not string: ' . $name;

            return $this;
        }

        if (substr($name, 1, 1) != '$') {
            $name = '$' . $name;
        }
        if (substr($name, 0, 1) != '\\') {
            $name = '\\' . $name;
        }

        $this->_variable = $name;

        return $this;
    }

    /**
     * 我们现在可以更新文件内容
     *
     * 如果 _autosave 属性为 true，我们自动更新文件
     *
     */
    public function __destruct()
    {
        if ($this->_autoSave) {
            $this->save();
        }
    }

    /**
     *  将新内容保存到文件
     *
     * 您可以根据需要多次调用 Array_Config_Writer::write()
     * 在调用这个方法之前
     *
     * @return \Array_Config_Writer
     */
    public function save()
    {
        if (! $this->_lastError) {
            file_put_contents($this->_file, $this->_fileContent);
        }

        return $this;
    }

    /**
     * 检查是否发生任何错误
     *
     * @return boolean
     */
    public function hasError()
    {
        return ! empty($this->_lastError);
    }

    /**
     * 获取最后发生的错误
     *
     * @return string
     */
    public function getLastError()
    {
        return $this->_lastError;
    }

    /**
     * 设置自动保存选项
     *
     * @param  boolean  $option
     *
     * @since 1.1.1
     */
    public function setAutoSave($option = true)
    {
        $this->_autoSave = $option;
    }
}
