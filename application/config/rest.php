<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| HTTP protocol   HTTP 协议
|------------------------------------------------ --------------------------
|
| 设置为强制使用 HTTPS 进行 REST API 调用
|
*/
$config['force_https'] = false;

/*
|--------------------------------------------------------------------------
| REST Output Format   REST 输出格式
|------------------------------------------------ --------------------------
|
| 响应的默认格式
|
| 'array'：      数组数据结构
| 'csv'：        逗号分隔的文件
| 'json'：       使用 json_encode()。 注意：如果传递了一个名为'callback'的GET查询字符串，那么将返回jsonp
| 'html'：       使用 CodeIgniter 中的表库的 HTML
| 'php'：        使用 var_export()
| 'serialized'： 使用 serialize()
| 'xml'：使用 simplexml_load_string()
|
*/
$config['rest_default_format'] = 'json';

/*
|--------------------------------------------------------------------------
| REST Supported Output Formats REST 支持的输出格式
|------------------------------------------------ --------------------------
|
| 以下设置包含支持/允许格式的列表。
| 您可以删除那些您不想使用的格式。
| 如果 $config['rest_supported_formats'] 中缺少默认格式
| $config['rest_default_format']，它将在
| REST_Controller 初始化期间静默添加。
|
*/
$config['rest_supported_formats'] = [
    'json',
    'array',
    'csv',
    'html',
    'jsonp',
    'php',
    'serialized',
    'xml',
];

/*
|--------------------------------------------------------------------------
| REST Status Field Name   REST 状态字段名称
|------------------------------------------------ --------------------------
|
| 响应中状态的字段名称
|
*/
$config['rest_status_field_name'] = 'status';

/*
|--------------------------------------------------------------------------
| REST Message Field Name   REST 消息字段名称
|------------------------------------------------ --------------------------
|
| 响应中消息的字段名称
|
*/
$config['rest_message_field_name'] = 'error';

/*
|--------------------------------------------------------------------------
| Enable Emulate Request   启用模拟请求
|------------------------------------------------ --------------------------
|
| 我们是否应该启用对请求的模拟（例如，在 Mootools 请求中使用）
|
*/
$config['enable_emulate_request'] = true;

/*
|--------------------------------------------------------------------------
| REST Realm   REST 领域
|------------------------------------------------ --------------------------
|
| 在登录对话框中显示的受密码保护的 REST API 的名称
|
| 例如：我的秘密 REST API
|
*/
$config['rest_realm'] = 'REST API';

/*
|--------------------------------------------------------------------------
| REST Login   REST登录
|------------------------------------------------ --------------------------
|
| 设置指定REST API需要登录
|
| FALSE     无需登录
| 'basic'   不安全登录
| 'digest'  更安全的登录
| 'session' 检查 PHP 会话变量。 请参阅“auth_source”来设置
|           授权密钥
|
*/
$config['rest_auth'] = false;

/*
|--------------------------------------------------------------------------
| REST Login Source   REST 登录来源
|------------------------------------------------ --------------------------
|
| 是否需要登录，如果需要，要使用的用户存储
|
| ''        使用基于用户配置或通配符测试
| 'ldap'    使用 LDAP 身份验证
| 'library' 使用身份验证库
|
| 注意：如果“rest_auth”设置为“session”，则将“auth_source”更改为会话变量的名称
|
*/
$config['auth_source'] = 'ldap';

/*
|--------------------------------------------------------------------------
| Allow Authentication and API Keys   允许身份验证和 API 密钥
|------------------------------------------------ --------------------------
|
| 您希望使用 Basic、Digest 或 Session 登录，但也希望使用 API 密钥（用于限制
| 请求等），设置为 TRUE；
|
*/
$config['allow_auth_and_keys'] = true;

/*
|--------------------------------------------------------------------------
| REST Login Class and Function REST 登录类和函数
|------------------------------------------------ --------------------------
|
| 如果使用库身份验证，请定义类和函数名称
|
| 该函数应该接受两个参数：class->function($username, $password)
| 在其他情况下，覆盖控制器中的函数 _perform_library_auth
|
| 对于摘要身份验证，库函数应该返回已经存储的
| 该用户名的 md5(username:restrealm:password)
|
| 例如： md5('admin:REST API:1234') = '1e957ebc35631ab22d5bd6526bd14ea2'
|
*/
$config['auth_library_class']    = '';
$config['auth_library_function'] = '';

/*
|--------------------------------------------------------------------------
| Override auth types for specific class/method  覆盖特定类/方法的身份验证类型
|------------------------------------------------ --------------------------
|
| 为类（控制器）中的方法设置特定的身份验证类型
|
| 根据需要设置尽可能多的配置条目。 任何未设置的方法都将使用默认的“rest_auth”配置值。
|
| 例如：
|
|           $config['auth_override_class_method']['deals']['view'] = 'none';
|           $config['auth_override_class_method']['deals']['insert'] = 'digest';
|           $config['auth_override_class_method']['accounts']['user'] = 'basic';
|           $config['auth_override_class_method']['dashboard']['*'] = 'none|digest|basic';
|
| 这里'deals'、'accounts' 和'dashboard' 是控制器名称，'view'、'insert' 和'user' 是其中的方法。 星号也可用于为整个类方法指定身份验证方法。 例如：$config['auth_override_class_method']['dashboard']['*'] = 'basic'; （注意：从方法名称的末尾去掉“_get”或“_post”）
| 可接受的值是； 'none', 'digest' 和 'basic'。
|
*/
// $config['auth_override_class_method']['deals']['view'] = 'none';
// $config['auth_override_class_method']['deals']['insert'] = 'digest';
// $config['auth_override_class_method']['accounts']['user'] = 'basic';
// $config['auth_override_class_method']['dashboard']['*'] = 'basic';


// ---取消注释 wildard 单元测试的列表行
// $config['auth_override_class_method']['wildcard_test_cases']['*'] = 'basic';

/*
|--------------------------------------------------------------------------
| Override auth types for specific 'class/method/HTTP method   '覆盖特定“类/方法/HTTP 方法”的身份验证类型
|------------------------------------------------ --------------------------
|
| 例子：
|
|            $config['auth_override_class_method_http']['deals']['view']['get'] = 'none';
|            $config['auth_override_class_method_http']['deals']['insert']['post'] = 'none';
|            $config['auth_override_class_method_http']['deals']['*']['options'] = 'none';
*/

// ---取消注释 wildard 单元测试的列表行
// $config['auth_override_class_method_http']['wildcard_test_cases']['*']['options'] = 'basic';

/*
|--------------------------------------------------------------------------
| REST Login Usernames   REST 登录用户名
|------------------------------------------------ --------------------------
|
| 用于登录的用户名和密码数组，如果配置了 ldap，则忽略该数组
|
*/
$config['rest_valid_logins'] = ['admin' => '1234'];

/*
|--------------------------------------------------------------------------
| Global IP White-listing   全球IP白名单
|------------------------------------------------ --------------------------
|
| 将与 REST 服务器的连接限制为白名单 IP 地址
|
| 用法：
| 1. 设置为 TRUE 并选择极端安全的身份验证选项（客户端的 IP
| 地址必须在白名单中并且他们也必须登录）
| 2. 将 auth 设置为 TRUE 设置为 FALSE 以允许白名单 IP 无需登录即可访问
| 3. 设置为 FALSE 但将 'auth_override_class_method' 设置为 'white-list' 以
| 将某些方法限制为白名单中的 IP
|
*/
$config['rest_ip_whitelist_enabled'] = false;

/*
|--------------------------------------------------------------------------
| REST Handle Exceptions REST 处理异常
|------------------------------------------------ --------------------------
|
| 处理控制器引起的异常
|
*/
$config['rest_handle_exceptions'] = true;

/*
|--------------------------------------------------------------------------
| REST IP White-list   REST IP 白名单
|------------------------------------------------ --------------------------
|
| 使用逗号分隔限制与 REST 服务器的连接
| IP地址列表
|
| 例如：'123.456.789.0, 987.654.32.1'
|
| 127.0.0.1 和 0.0.0.0 默认是允许的
|
*/
$config['rest_ip_whitelist'] = '';

/*
|--------------------------------------------------------------------------
| Global IP Blacklisting   全球IP黑名单
|------------------------------------------------ --------------------------
|
| 防止从列入黑名单的 IP 地址连接到 REST 服务器
|
| 用法：
| 1. 设置为 TRUE 并将任何 IP 地址添加到“rest_ip_blacklist”
|
*/
$config['rest_ip_blacklist_enabled'] = false;

/*
|--------------------------------------------------------------------------
| REST IP Blacklist   REST IP 黑名单
|------------------------------------------------ --------------------------
|
| 阻止来自以下 IP 地址的连接
|
| 例如： '123.456.789.0, 987.654.32.1'
|
*/
$config['rest_ip_blacklist'] = '';

/*
|--------------------------------------------------------------------------
| REST Database Group   REST 数据库组
|------------------------------------------------ --------------------------
|
| 连接到数据库组以获取密钥、日志记录等。
| 只有启用了这些功能中的任何一个，它才会连接
|
*/
$config['rest_database_group'] = 'default';

/*
|--------------------------------------------------------------------------
| REST API Keys Table Name   REST API 密钥表名称
|------------------------------------------------ --------------------------
|
| 数据库中存储 API 密钥的表名
|
*/
$config['rest_keys_table'] = 'keys';

/*
|--------------------------------------------------------------------------
| REST Enable KeysREST 启用密钥
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 时，REST API 将查找名为“key”的列名。
| 如果未提供密钥，请求将导致错误。
| 要覆盖列名，请参阅“rest_key_column”
|
| Default table schema:
|   CREATE TABLE `keys` (
|       `id` INT(11) NOT NULL AUTO_INCREMENT,
|       `user_id` INT(11) NOT NULL,
|       `key` VARCHAR(40) NOT NULL,
|       `level` INT(2) NOT NULL,
|       `ignore_limits` TINYINT(1) NOT NULL DEFAULT '0',
|       `is_private_key` TINYINT(1)  NOT NULL DEFAULT '0',
|       `ip_addresses` TEXT NULL DEFAULT NULL,
|       `date_created` INT(11) NOT NULL,
|       PRIMARY KEY (`id`)
|   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
|
*/
$config['rest_enable_keys'] = false;

/*
|--------------------------------------------------------------------------
| REST Table Key Column Name   REST 表键列名称
|------------------------------------------------ --------------------------
|
| 如果不使用“rest_enable_keys”中的默认表架构，
| 指定要匹配的列名称，例如 my_key
|
*/
$config['rest_key_column'] = 'key';

/*
|--------------------------------------------------------------------------
| REST API Limits method   REST API 限制方法
|------------------------------------------------ --------------------------
|
| 指定用于限制 API 调用的方法
|
| 可用方法有：
| $config['rest_limits_method'] = 'IP_ADDRESS'; // 对每个 ip 地址进行限制
| $config['rest_limits_method'] = 'API_KEY'; // 为每个 api 密钥设置一个限制
| $config['rest_limits_method'] = 'METHOD_NAME'; // 限制方法调用
| $config['rest_limits_method'] = 'ROUTED_URL'; // 对路由的 URL 进行限制
|
|
*/
$config['rest_limits_method'] = 'ROUTED_URL';

/*
|--------------------------------------------------------------------------
| REST Key Length   REST 密钥长度
|------------------------------------------------ --------------------------
|
| 创建的密钥的长度。 检查您的默认数据库模式
| 允许的最大长度
|
| 注意：最大长度为40
|
*/
$config['rest_key_length'] = 40;

/*
|--------------------------------------------------------------------------
| REST API Key Variable   REST API 关键变量
|------------------------------------------------ --------------------------
|
| 用于指定 API 密钥的自定义标头

| 注意：自 2012 年 6 月 12 日起，带有 X- 前缀的自定义标头已弃用。
| 有关详细信息，请参阅 RFC 6648 规范
|
*/
$config['rest_key_name'] = 'X-API-KEY';

/*
|--------------------------------------------------------------------------
| REST Enable Logging   REST 启用日志记录
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 时，REST API 将根据列名“key”、“date”、“time”和“ip_address”记录操作。
| 这是一个通用规则，可以在每个控制器的
| $this->method 数组中覆盖
|
| Default table schema:
|   CREATE TABLE `logs` (
|       `id` INT(11) NOT NULL AUTO_INCREMENT,
|       `uri` VARCHAR(255) NOT NULL,
|       `method` VARCHAR(6) NOT NULL,
|       `params` TEXT DEFAULT NULL,
|       `api_key` VARCHAR(40) NOT NULL,
|       `ip_address` VARCHAR(45) NOT NULL,
|       `time` INT(11) NOT NULL,
|       `rtime` FLOAT DEFAULT NULL,
|       `authorized` VARCHAR(1) NOT NULL,
|       `response_code` smallint(3) DEFAULT '0',
|       PRIMARY KEY (`id`)
|   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
|
*/
$config['rest_enable_logging'] = false;

/*
|--------------------------------------------------------------------------
| REST API Logs Table Name   REST API 日志表名称
|------------------------------------------------ --------------------------
|
| 如果不使用 'rest_enable_logging' 中的默认表模式，请指定
| 要匹配的表名，例如 my_logs
|
*/
$config['rest_logs_table'] = 'logs';

/*
|--------------------------------------------------------------------------
| REST Method Access Control   REST 方法访问权限控制
|------------------------------------------------ --------------------------
| 当设置为 TRUE 时，REST API 将检查访问表以查看 API 密钥是否可以访问该控制器。
| 必须启用“rest_enable_keys”才能
| 使用它
|
| Default table schema:
|   CREATE TABLE `access` (
|       `id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
|       `key` VARCHAR(40) NOT NULL DEFAULT '',
|       `all_access` TINYINT(1) NOT NULL DEFAULT '0',
|       `controller` VARCHAR(50) NOT NULL DEFAULT '',
|       `date_created` DATETIME DEFAULT NULL,
|       `date_modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
|       PRIMARY KEY (`id`)
|    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
|
*/
$config['rest_enable_access'] = false;

/*
|--------------------------------------------------------------------------
| REST API Access Table Name   REST API 访问表名
|------------------------------------------------ --------------------------
|
| 如果不使用 'rest_enable_access' 中的默认表模式，请指定
| 要匹配的表名，例如 my_access
|
*/
$config['rest_access_table'] = 'access';

/*
|--------------------------------------------------------------------------
| REST API Param Log Format   REST API 参数日志格式
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 时，REST API 日志参数将以 JSON 格式存储在数据库中
| 设置为 FALSE 以记录为序列化的 PHP
|
*/
$config['rest_logs_json_params'] = false;

/*
|--------------------------------------------------------------------------
| REST Enable Limits   REST 启用限制
|------------------------------------------------ --------------------------
|
| 当设置为 TRUE 时，REST API 将每小时通过 API 密钥计算每种方法的使用次数。
| 这是一个通用规则，可以在每个控制器的
| $this->method 数组中覆盖
|
| Default table schema:
|   CREATE TABLE `limits` (
|       `id` INT(11) NOT NULL AUTO_INCREMENT,
|       `uri` VARCHAR(255) NOT NULL,
|       `count` INT(10) NOT NULL,
|       `hour_started` INT(11) NOT NULL,
|       `api_key` VARCHAR(40) NOT NULL,
|       PRIMARY KEY (`id`)
|   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
|
| 要在控制器的 __construct() 方法中指定限制，请添加 per-method
| 限制：
|
| $this->method['METHOD_NAME']['limit'] = [NUM_REQUESTS_PER_HOUR];
|
| 有关示例，请参见 application/controllers/api/example.php
*/
$config['rest_enable_limits'] = false;

/*
|--------------------------------------------------------------------------
| REST API Limits Table Name   REST API 限制表名称
|------------------------------------------------ --------------------------
|
| 如果不使用 'rest_enable_limits' 中的默认表模式，请指定
| 要匹配的表名，例如 my_limits
|
*/
$config['rest_limits_table'] = 'limits';

/*
|--------------------------------------------------------------------------
| REST Ignore HTTP AcceptREST 忽略 HTTP 接受
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 以忽略 HTTP 接受并稍微加快每个请求。
| 仅当您在 URL 中使用 $this->rest_format 或 /format/xml 时才执行此操作
|
*/
$config['rest_ignore_http_accept'] = false;

/*
|--------------------------------------------------------------------------
| REST AJAX Only   仅限 REST AJAX
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 以仅允许 AJAX 请求。 设置为 FALSE 以接受 HTTP 请求
|
| 注意：如果设置为 TRUE 且请求不是 AJAX，则返回 505 响应并显示错误消息“仅接受 AJAX 请求”。
| 将被退回。
|
| 提示：这对生产环境很有用
|
*/
$config['rest_ajax_only'] = false;

/*
|--------------------------------------------------------------------------
| REST Language File   REST 语言文件
|------------------------------------------------ --------------------------
|
| 从语言目录加载的语言文件
|
*/
$config['rest_language'] = 'english';

/*
|--------------------------------------------------------------------------
| CORS Check   CORS 检查
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 可启用跨域资源共享 (CORS)。
| 如果您将 API 托管在与将通过浏览器访问它的应用程序
| 不同的域上，则很有用
|
*/
$config['check_cors'] = false;

/*
|--------------------------------------------------------------------------
| CORS Allowable Headers   CORS 允许的标头
|------------------------------------------------ --------------------------
|
| 如果使用 CORS 检查，请在此处设置允许的标头
|
*/
$config['allowed_cors_headers'] = [
    'Origin',
    'X-Requested-With',
    'Content-Type',
    'Accept',
    'Access-Control-Request-Method'
];

/*
|--------------------------------------------------------------------------
| CORS Allowable Methods   CORS 允许的方法
|------------------------------------------------ --------------------------
|
| 如果使用 CORS 检查，你可以设置你想要被允许的方法
|
*/
$config['allowed_cors_methods'] = [
    'GET',
    'POST',
    'OPTIONS',
    'PUT',
    'PATCH',
    'DELETE'
];

/*
|--------------------------------------------------------------------------
| CORS Allow Any Domain   CORS 允许任何域
|------------------------------------------------ --------------------------
|
| 设置为 TRUE 以启用来自任何源域的
| 跨域资源共享 (CORS)
|
*/
$config['allow_any_cors_domain'] = false;

/*
|--------------------------------------------------------------------------
| CORS Allowable Domains   CORS 允许的域名
|------------------------------------------------ --------------------------
|
| 如果 $config['check_cors'] 设置为 TRUE 且 $config['allow_any_cors_domain'] 设置为 FALSE 时使用。
| 设置数组中所有允许的域
|
| 例如 $config['allowed_origins'] = ['http://www.example.com', 'https://spa.example.com']
|
*/
$config['allowed_cors_origins'] = [];
