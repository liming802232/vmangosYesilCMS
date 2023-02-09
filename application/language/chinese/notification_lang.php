<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*Notification Title Lang*/
$lang['notification_title_success'] = '成功';
$lang['notification_title_warning'] = '警告';
$lang['notification_title_error']   = '错误';
$lang['notification_title_info']    = '信息';

/*Notification Message (Login/Register) Lang*/
$lang['notification_username_empty']                   = '用户名为空';
$lang['notification_account_not_created']              = '无法创建账户，请检查数据并重试';
$lang['notification_email_empty']                      = '电子邮件为空';
$lang['notification_password_empty']                   = '密码为空';
$lang['notification_user_error']                       = '用户名没密码不正确,请重试!';
$lang['notification_recaptcha_error']                  = '验证谷歌多重验证码错误，请重试!';
$lang['notification_email_error']                      = '电子邮件或密码不正确，请重试!';
$lang['notification_check_email']                      = '用户名或电子邮件不正确，请重试!';
$lang['notification_checking']                         = '正在检查...';
$lang['notification_redirection']                      = '正在连接您的账户...';
$lang['notification_new_account']                      = '创建新账户，正在重定向到登录...';
$lang['notification_email_sent']                       = '电子邮件已发送，请检查你的电子邮件...';
$lang['notification_account_activation']               = '电子邮件已发送,请检查您的电子邮件激活您的帐户。';
$lang['notification_captcha_error']                    = '请检查验证码';
$lang['notification_password_lenght_error']            = '密码长度错误。请使用5到16个字符之间的密码';
$lang['notification_account_already_exist']            = '此账户已存在';
$lang['notification_password_not_match']               = '密码不匹配';
$lang['notification_same_password']                    = '密码相同';
$lang['notification_currentpass_not_match']            = '旧密码不匹配';
$lang['notification_usernamepass_not_match']           = '密码与此用户名不匹配';
$lang['notification_used_email']                       = '电子邮件正在使用';
$lang['notification_email_not_match']                  = '电子邮件不匹配';
$lang['notification_username_not_match']               = '用户名不匹配';
$lang['notification_expansion_not_found']              = '扩展为找到';
$lang['notification_recovery_email_sent_success']      = '有关密码重置过程的信息已发送到您的电子邮件';
$lang['notification_recovery_email_sent_fail']         = '密码重置失败，请重试';
$lang['notification_recovery_token_valid_success']     = '<strong>密码更改成功</strong>请检查您的电子邮件以获取新的登录凭据';
$lang['notification_recovery_token_valid_fail']        = '无效电子邮件或令牌无效、已使用或过期';
$lang['notification_recovery_token_expired_fail']      = '您的令牌已过期，请重新请求';
$lang['notification_activation_email_sent_success']    = '<strong>账户创建成功</strong> 请检查您的电子邮件以激活您的账户。 您可以登录到您的网站账户以检查您的激活状态';
$lang['notification_activation_email_sent_fail']       = '账户创建成功，但发送激活电子邮件时出错，请登录您的帐户并请求新账户';
$lang['notification_activation_email_resent_success']  = '<strong>新激活电子邮件已成功发送</strong> 请检查您的电子邮件以激活您的账户';
$lang['notification_activation_email_resent_fail']     = '发送激活电子邮件时出现问题，请在下面请求新邮件';
$lang['notification_activation_token_valid_success']   = '<strong>账户已激活</strong> 现在您可以使用您的账户登录';
$lang['notification_activation_token_valid_fail']      = '提供的激活密钥无效';
$lang['notification_activation_not_found_fail']        = '出错了。可能无效的电子邮件或令牌无效、已使用或过期';
$lang['notification_activation_token_expired_success'] = '您的激活令牌 <strong>已被使用过一次</strong>,您应该可以登录了';
$lang['notification_activation_token_expired_fail']    = '您的令牌已过期，请登录您的账户并提出新请求';

/*Notification Message (General) Lang*/
$lang['notification_email_changed']                  = '电子邮件已更改';
$lang['notification_username_changed']               = '用户名已更改';
$lang['notification_password_changed']               = '密码已更改';
$lang['notification_avatar_changed']                 = '头像已更改';
$lang['notification_wrong_values']                   = '数值错误';
$lang['notification_select_type']                    = '选择类型';
$lang['notification_select_priority']                = '选择优先权';
$lang['notification_select_category']                = '选择类别';
$lang['notification_select_realm']                   = '选择领域';
$lang['notification_select_character']               = '选择角色';
$lang['notification_select_item']                    = '选择物品';
$lang['notification_report_created']                 = '报告以创建';
$lang['notification_title_empty']                    = '标题为空';
$lang['notification_description_empty']              = '描述为空';
$lang['notification_name_empty']                     = '名称为空';
$lang['notification_id_empty']                       = 'id 为空';
$lang['notification_reply_empty']                    = '回复为空';
$lang['notification_reply_created']                  = '已发送回复';
$lang['notification_reply_updated']                  = '回复已更新';
$lang['notification_reply_deleted']                  = '回复已删除';
$lang['notification_topic_created']                  = '主题以创建';
$lang['notification_donation_successful']            = '捐赠以成功完成，请检查您账户的捐赠积分';
$lang['notification_donation_canceled']              = '捐赠已取消';
$lang['notification_donation_error']                 = '交易中提供的信息不匹配';
$lang['notification_store_chars_error']              = '选择您角色状态的每个物品';
$lang['notification_store_item_insufficient_points'] = '您的积分不足，无法购买';
$lang['notification_store_item_purchased']           = '物品已购买，请在游戏中查看邮件';
$lang['notification_store_item_added']               = '所选商品已添加到您的购物车';
$lang['notification_store_item_removed']             = '所选商品已从您的购物车中删除';
$lang['notification_store_cart_error']               = '购物车更新失败，请重试';

/*Notification Message (Admin) Lang*/
$lang['notification_changelog_created'] = '更新日志以创建';
$lang['notification_changelog_edited']  = '更新日志已编辑';
$lang['notification_changelog_deleted'] = '更新日志已删除';
$lang['notification_forum_created']     = '论坛以创建';
$lang['notification_forum_edited']      = '论坛已编辑';
$lang['notification_forum_deleted']     = '论坛已删除';
$lang['notification_category_created']  = '类别以创建';
$lang['notification_category_edited']   = '类别以编辑';
$lang['notification_category_deleted']  = '类别以删除';
$lang['notification_menu_created']      = '菜单以创建';
$lang['notification_menu_edited']       = '菜单已编辑';
$lang['notification_menu_deleted']      = '菜单已删除';
$lang['notification_news_deleted']      = '新闻已删除';
$lang['notification_page_created']      = '页面以创建';
$lang['notification_page_edited']       = '页面已编辑';
$lang['notification_page_deleted']      = '页面已删除';
$lang['notification_realm_created']     = '领域以创建';
$lang['notification_realm_edited']      = '领域已编辑';
$lang['notification_realm_deleted']     = '领域已删除';
$lang['notification_slide_created']     = '幻灯片以创建';
$lang['notification_slide_edited']      = '幻灯片已编辑';
$lang['notification_slide_deleted']     = '幻灯片已删除';
$lang['notification_item_created']      = '物品以创建';
$lang['notification_item_edited']       = '物品已编辑';
$lang['notification_item_deleted']      = '物品已删除';
$lang['notification_top_created']       = '热门物品以创建';
$lang['notification_top_edited']        = '热门物品已编辑';
$lang['notification_top_deleted']       = '热门物品已删除';
$lang['notification_topsite_created']   = '热门站点以创建';
$lang['notification_topsite_edited']    = '热门站点已编辑';
$lang['notification_topsite_deleted']   = '热门站点已删除';

$lang['notification_settings_updated'] = '设置已更新<br>页面将重新加载';
$lang['notification_module_enabled']   = '模块已启用';
$lang['notification_module_disabled']  = '模块已禁用';
$lang['notification_migration']        = '设置已设置成功';

$lang['notification_donation_added']   = '增加捐赠';
$lang['notification_donation_deleted'] = '删除捐赠';
$lang['notification_donation_updated'] = '捐赠更新';
$lang['notification_points_empty']     = '积分为空';
$lang['notification_tax_empty']        = '飞行点为空';
$lang['notification_price_empty']      = '价格为空';
$lang['notification_incorrect_update'] = '意外更新';

$lang['notification_route_inuse'] = '该路由已在使用中，请选择另一个路由。';

$lang['notification_account_updated']    = '账户已更新';
$lang['notification_dp_vp_empty']        = 'DP/VP 为空';
$lang['notification_account_banned']     = '账户被封禁';
$lang['notification_reason_empty']       = '原因为空';
$lang['该账户的禁令已解除';
$lang['notification_rank_empty']         = '等级为空';
$lang['notification_rank_granted']       = '等级以授权';
$lang['notification_rank_removed']       = '等级已删除';

$lang['notification_cms_updated']         = 'CMS 已更新';
$lang['notification_cms_update_error']    = 'CMS 无法更新';
$lang['notification_cms_not_updated']     = '未找到要更新的新版本';
$lang['notification_cms_update_disabled'] = '此功能已被暂时禁用';

$lang['notification_select_category'] = '不是子类别';