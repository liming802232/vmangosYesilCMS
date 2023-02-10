<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Enable/Disable Migrations 启用/禁用迁移
|------------------------------------------------ --------------------------
|
| 出于安全原因，默认情况下禁用迁移。
| 每当您打算进行架构迁移时，都应该启用迁移
| 并在完成后将其禁用。
|
*/
$config['migration_enabled'] = true;

/*
|--------------------------------------------------------------------------
| Migration Type   迁移类型
|------------------------------------------------ --------------------------
|
| 迁移文件名可能基于顺序标识符或
| 一个时间戳。 选项是：
|
| 'sequential' = 顺序迁移命名 (001_add_blog.php)
| 'timestamp' = 时间戳迁移命名 (20121031104401_add_blog.php)
| 使用时间戳格式 YYYYMMDDHHIISS。
|
| 注意：如果这个配置值缺少Migration库
| 默认为 'sequential' 以向后兼容 CI2。
|
*/
$config['migration_type'] = 'sequential';

/*
|--------------------------------------------------------------------------
| Migrations table   迁移表
|------------------------------------------------ --------------------------
|
| 这是将存储当前迁移状态的表的名称。
| 当迁移运行时，它将存储在迁移的数据库表中
| 系统所处的水平。 然后比较此中的迁移级别
| 表到 $config['migration_version'] 如果它们不一样
| 会向上迁移。 这是必须设置的。
|
*/
$config['migration_table'] = 'migrations';

/*
|--------------------------------------------------------------------------
| Auto Migrate To Latest   自动迁移到最新
|------------------------------------------------ --------------------------
|
| 如果在加载迁移类时将其设置为 TRUE 并且
| $config['migration_enabled'] 设置为 TRUE 系统将自动迁移
| 到你最近的迁移（无论 $config['migration_version'] 是什么
| 设置）。 这样您就不必在其他任何地方调用迁移
| 在您的代码中进行最新的迁移。
|
*/
$config['migration_auto_latest'] = false;

/*
|--------------------------------------------------------------------------
| Migrations version   迁移版本
|------------------------------------------------ --------------------------
|
| 这用于设置文件系统应该在的迁移版本。
| 如果你运行 $this->migration->current() 这是模式将要使用的版本
| 升级/降级为。
|
*/
$config['migration_version'] = 41;

/*
|--------------------------------------------------------------------------
| Migrations Path   迁移路径
|------------------------------------------------ --------------------------
|
| 迁移文件夹的路径。
| 通常，它将在您的应用程序路径中。
| 此外，迁移路径中需要写入权限。
|
*/
$config['migration_path'] = APPPATH . 'migrations/';
