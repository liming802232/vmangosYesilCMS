<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
  |--------------------------------------------------------------------------
  | 支持的语言
  |--------------------------------------------------------------------------
  |
  | 包含您的网站将用于存储数据的所有语言。
  | 其他语言仍然可以通过语言文件显示，这是完全不同的。
  |
  | 检查字符的 HTML 等效性，例如以下 URL：
  |    http://htmlhelp.com/reference/html40/entities/latin1.html
  |
  |
  |    array('en'=> 'English', 'fr'=> 'French', 'de'=> 'German')
  |
 */
$config['supported_languages'] = [
    'cn' => [
        'name'      => 'Chinese',
        'folder'    => 'chinese',
        'direction' => 'ltr',
        'codes'     => ['cn', 'chinese', 'zh_CN'],
    ],    
    'es' => [
        'name'      => 'Español',
        'folder'    => 'spanish',
        'direction' => 'ltr',
        'codes'     => ['es', 'spanish', 'es_ES'],
    ],
    'en' => [
        'name'      => 'English',
        'folder'    => 'english',
        'direction' => 'ltr',
        'codes'     => ['en', 'english', 'en_US'],
    ],
    'fr' => [
        'name'      => 'French',
        'folder'    => 'french',
        'direction' => 'ltr',
        'codes'     => ['fr', 'French', 'fr_FR'],
    ],
    'de' => [
        'name'      => 'Deutsch',
        'folder'    => 'german',
        'direction' => 'ltr',
        'codes'     => ['de', 'german', 'de_DE'],
    ]
];

/*
  |--------------------------------------------------------------------------
  | 默认语言
  |--------------------------------------------------------------------------
  |
  | 如果没有指定语言，使用哪一种？ 必须在上面的数组中。
  |
  |    en
  |
 */
$config['default_language'] = 'en';

/*
  |--------------------------------------------------------------------------
  | 检测浏览器语言
  |--------------------------------------------------------------------------
  |
  | 如果启用检测浏览器语言并禁用默认语言
  |
  |    FALSE
  |
 */
$config['detect_language'] = false;

/*
  |--------------------------------------------------------------------------
  | 默认 URI
  |--------------------------------------------------------------------------
  |
  | 如果 URI 中没有语言，则重定向到哪里。
  | 例子 如果 default_uri 'welcome' => /en/weclome
  |
  |    welcome
  |
 */
$config['default_uri'] = '/';

/*
  |--------------------------------------------------------------------------
  | 特殊 URIs
  |--------------------------------------------------------------------------
  |
  | 此 URI 未本地化
  |
  |    array('admin', 'auth', 'api')
  |
 */
$config['special_uris'] = [];
