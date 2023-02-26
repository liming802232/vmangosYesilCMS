<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Parser Enabled *解析器启用
*
* 解析器库是否应该用于整个页面吗？
*
* 可以用 $this->template->enable_parser(TRUE/FALSE) 覆盖；
*
* 默认值：TRUE
 *
 */
$config['parser_enabled'] = false;

/**
 *
 * Parser Enabled for Body * 为正文启用解析器
 *
 * 如果启用了解析器，你是否希望它解析正文？
 *
 * 可以用 $this->template->enable_parser(TRUE/FALSE) 覆盖；
 *
 * 默认值： FALSE
 *
 */
$config['parser_body_enabled'] = false;

/**
 *
 * Title Separator * 标题分隔符
*
* 应该使用什么字符串来分隔通过 $this->template->title('Foo', 'Bar') 发送的标题段；
*
* 默认： ' | '
 *
 */
$config['title_separator'] = ' | ';

/**
 *
 * Layout * 布局
*
* 应该使用哪个布局文件？ 当与主题结合时，它将成为该主题中的布局文件
*
* 更改为 'main' 以获取 /application/views/layouts/main.php
*
* 默认： 'default'
 *
 */
$config['layout'] = 'layout';

/**
 *
 * Theme * 主题
*
* 默认使用哪个主题？
*
* 可以用 $this->template->set_theme('foo'); 覆盖
*
* 默认： ''
 *
 */
$config['theme'] = config_item('theme_name');

/**
 *
 * Theme Locations *主题位置
*
* 我们应该在哪里看到主题？
*
* 默认：array(APPPATH.'themes/' => '../themes/')
 *
 */
$config['theme_locations'] = array(
    APPPATH . 'themes/'
);
