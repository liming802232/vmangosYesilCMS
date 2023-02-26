<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Memcached settings Memcached设置
| ---------------------------------------------- ----------------------
| 您的 Memcached 服务器可以在下面指定。
|
| 请参阅： https://codeigniter.com/user_guide/libraries/caching.html#memcached
|
*/
$config = [
    'default' => [
        'hostname' => '127.0.0.1',
        'port'     => '11211',
        'weight'   => '1',
    ],
];
