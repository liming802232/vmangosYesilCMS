<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 *  Website Name 网站名称
 *
 *  写下您网站的名称，这将默认显示。
 *
 */
$config['website_name'] = '';

/**
 *
 *  Timezone 时区
 *
 *  http://php.net/manual/en/timezones.php
 *
 */
$config['timezone'] = 'GMT';

/**
 *
 *  Maintenance Mode 维护模式
 *
 *  1 = Enable(启用) | 0 = Disable(禁用)
 *
 */
$config['maintenance_mode'] = '0';

/**
 *
 * Redis Status
 *
 * 1 = Enable(启用) | 0 = Disable(禁用)
 *
 * 对于基于Windows的服务器，0是必须的，而对于基于Linux的服务器，建议使用1。
 * 如果您在Linux下运行CMS并收到RedisException错误，这意味着您的Redis安装或扩展有问题。
 * 
 * 同时建议通过 application/config/redis.php 设置 redis的密码
 *
 * 目前仅用于军械库和API
 *
 * TODO：Redis将在以后实现到更多代码部分
 *
 */
$config['redis_in_cms'] = true;

/**
 *
 *  Invitation Discord 不和谐频道的邀请
 *
 *  写下您的不和谐频道的邀请
 *
 */
$config['discord_invitation'] = 'W7F4nRW';

/**
 *
 *  Realmlist 领域列表
 *
 *  编写服务器上使用的 realmlist 领域列表，以便在网站上发布它。
 *
 */
$config['realmlist'] = '';

/**
 *  Bnet enabled? 是否启用Bnet？
 *
 *  true for Emulators BattleNet. true适用于模拟器战网。
 *  false for not bnetserver false表示不是bnetserver
 */
$config['bnet_enabled'] = false;

/**
 *  Emulator 模拟仿真器
 *  srp6 = For Emulators (SRP6 Compatibility)
 *  srp6 = 用于仿真器（SRP6兼容性）
 *  old-trinity =  Trinity Core not SRP6(Sha_pass_hash Compatibility)
 *  old-trinity =  Trinity Core 不是 SRP6  (Sha_pass_hash 兼容性)
 *  hex = For emulators Mangos  (HEX6 Compatibility) 
 *  hex = 用于模拟器 Mangos  (HEX6 兼容性)
 */
$config['emulator'] = 'hex';

/**
 *
 *  Expansion Supported 支持的扩展
 *
 *  从以下选项中选择您的网站将使用的扩展：
 *
 *  1 = Vanilla(香草60)
 *  2 = The Burning Crusade(TBC燃烧的远征70)
 *  3 = Wrath of the Lich King(WLK巫妖王之怒80)
 *  4 = Cataclysm(CTM大地的裂变85)
 *  5 = Mist of Pandaria(MOP熊猫人之谜90)
 *  6 = Warlords of Draenor(WOD德拉诺之王100)
 *  7 = Legion(LEG军团再临110)
 *  8 = Battle for Azeroth(BFA争霸艾泽拉斯120)
 *  9 = Shadowlands(暗影国度50)
 *
 */
$config['expansion'] = '1';

/**
 *
 *  Theme Name 主题名称
 *
 *  写下你的主题名称
 *  名称与主文件夹相同
 *  css 也必须具有相同的名称
 *  默认：default
 *
 */
$config['theme_name'] = '%THEME%';

/**
 *
 *  社交链接
 *
 *  编写重定向到您的社交网络的链接。
 *
 */
$config['social_facebook'] = '';
$config['social_twitter']  = '';
$config['social_youtube']  = '';

/**
 *
 *  Recaptcha (V2) 多重验证V2版
 *
 *  写入必要的密钥以在寄存器中启用 recaptcha
 *  使用以下页面创建必要的密钥。
 *  https://www.google.com/recaptcha/admin#list
 *
 */
$config['recaptcha_sitekey'] = '';
$config['recaptcha_secret']  = '';

/**
 *
 *  SMTP 邮件传输协议
 *
 * 编写使用 SMTP 的必要信息以用于恢复密码和帐户激活。
 *
 *
 */
$config['smtp_host']   = '';
$config['smtp_user']   = '';
$config['smtp_pass']   = '';
$config['smtp_port']   = '465';
$config['smtp_crypto'] = 'ssl';

/**
 *
 *  电子邮件设置
 *  写下必要的信息以用于发送电子邮件。
 *
 */
$config['email_settings_sender']      = '';
$config['email_settings_sender_name'] = '';

$config['template_verification'] = 'application/views/mails/verify_account.html';
$config['template_recover_p1']   = 'application/views/mails/recover_password_p1.html';
$config['template_recover_p2']   = 'application/views/mails/recover_password_p2.html';

/**
 *
 *  帐号激活
 *
 *  启用或禁用通过电子邮件激活帐户的选项。
 *
 *  true  = Enable(启用)
 *  false = Disable(禁用)
 *
 */
$config['account_activation_required'] = false;

/**
 *
 *  管理员访问级别
 *
 *  访问管理部分的最低 gm 级别。
 *
 */
$config['admin_access_level'] = '3';

/**
 *
 *  版主访问级别
 *
 *  访问 mod 部分的最低 gm 级别。
 *
 */
$config['mod_access_level'] = '2';

/**
 *
 *  迁移状态
 *
 *  警告：不要更改此配置。
 *
 */
$config['migrate_status'] = '1';

/**
 *
 *  检查本地领域
 *
 *  设置检查服务器状态的方式。
 *  如果为 false，则使用来自 "auth" 数据库的 "realmlist" 表的公共 IP。
 *  否则，如果为 true，则通过私有 IP 执行检查。
 *
 */
$config['check_realm_local'] = false;
