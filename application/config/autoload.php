<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| 自动载入程序
| -------------------------------------------------------------------
| 该文件指定默认应加载哪些系统。
|
| 该文件指定默认应加载哪些系统。
| 为了使框架尽可能轻量级，默认情况下只加载绝对最少的资源。
| 例如，数据库不会自动连接，因为没有假设您是否打算使用它。
| 该文件允许您全局定义每个请求要加载的系统。
| 
| 
|
| -------------------------------------------------------------------
| 说明
| -------------------------------------------------------------------
|
| 这些是您可以自动加载的内容：
|
| 1. Packages 程序包
| 2. Libraries 网络函数库
| 3. Drivers 驱动程序
| 4. Helper files 帮助文件
| 5. Custom config files 自定义配置文件
| 6. Language files 语言文件
| 7. Models 模块
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages 自动加载程序包
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = [];

/*
| -------------------------------------------------------------------
|  Auto-load Libraries 自动加载网络函数库
| -------------------------------------------------------------------
| 这些类位于 system/libraries/ 或您的 application/libraries/目录中，
| 并添加了"database"库，这在某种程度上是一个特例。
| 
|
| Prototype:
|
|   $autoload['libraries'] = array('database', 'email', 'session');
|
| 您还可以提供要在控制器中指定的备用库名称:
| 
|
|   $autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = [
    'database',
    'session',
    'form_validation',
    'parser',
    'template',
    'cart'
];

/*
| -------------------------------------------------------------------
|  Auto-load Drivers 自动加载驱动程序
| -------------------------------------------------------------------
| 这些类位于 system/libraries/ 或 application/libraries/ 目录中，
| 但也位于它们自己的子目录中，它们扩展CI_Driver_Library类。
| 它们提供多种可互换的驱动器选项。
| 
|
| Prototype:
|
|   $autoload['drivers'] = array('cache');
|
| 您还可以提供要在控制器中分配的替代属性名称：
|
|
|   $autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = ['cache'];

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files 自动加载帮助文件
| -------------------------------------------------------------------
| Prototype:
|
|   $autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = [
    'url',
    'file',
    'text',
    'form',
    'html',
    'language',
    'modules'
];

/*
| -------------------------------------------------------------------
|  Auto-load Config files 自动加载配置文件
| -------------------------------------------------------------------
| Prototype:
|
|   $autoload['config'] = array('config1', 'config2');
|
| 注意：此项目仅在您创建了自定义配置文件。
| 否则，将其留空。
|
*/
$autoload['config'] = [
    'blizzcms',
    'seo'
];

/*
| -------------------------------------------------------------------
|  Auto-load Language files 自动加载语言文件
| -------------------------------------------------------------------
| Prototype:
|
|   $autoload['language'] = array('lang1', 'lang2');
|
| 注意：不要在文件中包含"_lang"部分。
| 例如，"codeigniter_lang.php"将被引用为 array('codeigniter');
|
*/
$autoload['language'] = [
    'general',
    'notification',
    'admin'
];

/*
| -------------------------------------------------------------------
|  Auto-load Models 自动加载模块
| -------------------------------------------------------------------
| Prototype:
|
|   $autoload['model'] = array('first_model', 'second_model');
|
| 您还可以提供要分配的备用模型名称在控制器中:
|
|
|   $autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = [
    'auth_model'    => 'wowauth',
    'general_model' => 'wowgeneral',
    'realm_model'   => 'wowrealm',
    'module_model'  => 'wowmodule',
    'service_model' => 'service'
];
