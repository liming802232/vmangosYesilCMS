<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace   显示调试回溯
|------------------------------------------------ --------------------------
|
| 如果设置为 TRUE，回溯将与 php 错误一起显示。 如果
| error_reporting 被禁用，回溯将不会显示，无论这里
| 如何设置
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', true);

/*
|--------------------------------------------------------------------------
| File and Directory Modes   文件和目录模式
|------------------------------------------------ --------------------------
|
| 这些首选项用于在使用文件系统时检查和设置模式。
| 在具有适当安全性的服务器上，默认值就很好用，
| 但您可能希望（甚至需要）更改某些环境中的值
| （Apache 为每个运行一个单独的进程
| 用户、CGI 下的 PHP 和 Apache suEXEC 等）。 
| 应始终使用八进制值来正确设置模式。
|
*/
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes   文件流模式
|------------------------------------------------ --------------------------
|
| 这些模式在使用 fopen()/popen() 时使用
|
*/
defined('FOPEN_READ') or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes 退出状态代码
|------------------------------------------------ --------------------------
|
| 用于指示脚本退出（）的条件。
| 虽然没有错误代码的通用标准，但有一些广泛的约定。
| 下面提到了三个这样的约定，供那些希望使用它们的人使用。
| 选择 CodeIgniter 默认值是为了与这些约定的重叠最少，
| 同时仍然为其他人在未来的版本中定义留下空间
| 和用户应用程序。
|
| 用于确定退出状态代码的三个主要约定
| 如下面所述：
|
| 标准 C/C++ 库 (stdlibc)：
| http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
| （此链接还包含其他 GNU 特定约定）
| BSD sysexits.h:
| http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
| Bash 脚本：
| http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS') or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*
|--------------------------------------------------------------------------
| Header Image Names 标题图像名称
|------------------------------------------------ --------------------------
|
| 不带扩展名的图像名称用于随机标头
|
*/
const HEADER_IMAGES = array(1, 2, 3, 4);
