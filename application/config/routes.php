<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING   URI路由
| ---------------------------------------------- ----------------------
| 该文件允许您将 URI 请求重新映射到特定的控制器功能。
|
| 通常，URL 字符串之间存在一对一的关系
| 及其相应的控制器类/方法。
| URL 中的段通常遵循以下模式：
|
| example.com/class/method/id/
|
| 然而，在某些情况下，您可能希望重新映射这种关系
| 以便调用一个不同的类/函数
| 与网址相对应。
|
| 请参阅用户指南以获取完整的详细信息：
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES   保留路径
| ---------------------------------------------- ----------------------
|
| 有3条预留路线：
|
| $route['default_controller'] = 'welcome';
|
| 此路由指示应加载哪个控制器类，如果
| URI 不包含任何数据。 在上面的例子中，"welcome" 类
| 会被加载。
|
| $route['404_override'] = 'errors/page_missing';
|
| 这条路线将告诉路由器使用哪个控制器/方法，如果这些
| URL 中提供的无法与有效路由匹配。
|
| $route['translate_uri_dashes'] = FALSE;
|
| 这不完全是一条路线，但允许您自动路线
| 包含破折号的控制器和方法名称。 '-' 无效
| 类或方法名字符，所以需要翻译。
| 当您将此选项设置为 TRUE 时，它将替换
| 控制器和方法 URI 段。
|
| 示例:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$lang = '^(en|es|bl|fr|de|ru)';

$route['default_controller']   = 'home';
$route['404_override']         = 'general/error404';
$route['translate_uri_dashes'] = false;

/*
 *  Website Routes 网站路由
 *  Configuration paths used by the CMS CMS使用的配置路径
*/
$route[$lang . '$']            = $route['default_controller'];
$route[$lang . '/confmigrate'] = 'home/setconfig';
$route[$lang . '/dbmigrate']   = 'home/migrateNow';
$route[$lang . '/maintenance'] = 'general/maintenance';
$route[$lang . '/realmlist']   = 'home/downloadRealmlist';

/*
 *  User 用户
 *  Routes with functionalities for the user. 为用户提供功能的路径。
*/
$route[$lang . '/login']                            = 'user/login';
$route[$lang . '/register']                         = 'user/register';
$route[$lang . '/pending']                          = 'user/pending';
$route[$lang . '/recovery']                         = 'user/recovery';
$route[$lang . '/recoverpass/([a-zA-Z0-9-_.]{64})'] = 'user/recoverpass/$2';
$route[$lang . '/activate/([a-zA-Z0-9-_.]{64})']    = 'user/activate/$2';
$route[$lang . '/resend']                           = 'user/resendactivation/';
$route[$lang . '/newacc']                           = 'user/newaccount';
$route[$lang . '/classicverify']                    = 'user/verify1';
$route[$lang . '/bnetverify']                       = 'user/verify2';
$route[$lang . '/forgotpassword']                   = 'user/forgotpassword';
$route[$lang . '/logout']                           = 'user/logout';
$route[$lang . '/panel']                            = 'user/panel';
$route[$lang . '/settings']                         = 'user/settings';
$route[$lang . '/changemail']                       = 'user/newemail';
$route[$lang . '/changepass']                       = 'user/newpass';
$route[$lang . '/changeavatar']                     = 'user/newavatar';
$route[$lang . '/changeusername']                   = 'user/newusername';

/*
 *  Vote 投票
 *  Voting system guidelines* 投票系统指南
*/
$route[$lang . '/vote']                = 'vote/index';
$route[$lang . '/vote/votenow/(:num)'] = 'vote/votenow/$2';

/*
 *  Donate 捐赠
 *  Donations module, routes for the user *捐赠模块，用户路线
*/
$route[$lang . '/donate']              = 'donate/index';
$route[$lang . '/donate/check/(:any)'] = 'donate/check/$2';
$route[$lang . '/donate/canceled']     = 'donate/canceled';

/*
 *  Download 下载
 *  Download module, where addons and clients can be added.* 下载模块，可以在其中添加插件和客户端。
*/
$route[$lang . '/download']                   = 'download/index';
$route[$lang . '/admin/download']             = 'admin/managedownload';
$route[$lang . '/admin/download/create']      = 'admin/createdownload';
$route[$lang . '/admin/download/edit/(:num)'] = 'admin/editdownload/$2';
$route[$lang . '/admin/download/add']         = 'admin/adddownload';
$route[$lang . '/admin/download/update']      = 'admin/updatedownload';
$route[$lang . '/admin/download/delete']      = 'admin/deletedownload';

/*
 *  Changelog 变更日志
 *  Route for changes in the project* 项目变更路线
*/
$route[$lang . '/changelogs'] = 'changelogs/index';

/*
 *  Bugtracker 错误追踪器
 *  Error reporting system* 错误反馈系统
*/
$route[$lang . '/bugtracker']               = 'bugtracker/index';
$route[$lang . '/bugtracker/(:num)']        = 'bugtracker/index/$2';
$route[$lang . '/bugtracker/new']           = 'bugtracker/newreport';
$route[$lang . '/bugtracker/create']        = 'bugtracker/create';
$route[$lang . '/bugtracker/report/(:num)'] = 'bugtracker/report/$2';

/*
 *  Forum 论坛
 *  Own forum within the CMS, still under development.* CMS 内置的论坛，仍在开发中。
*/
$route[$lang . '/forum']                    = 'forum/index';
$route[$lang . '/forum/category/(:num)']    = 'forum/category/$2';
$route[$lang . '/forum/topic/(:num)']       = 'forum/topic/$2';
$route[$lang . '/forum/topic/new/(:num)']   = 'forum/newtopic/$2';
$route[$lang . '/forum/topic/create']       = 'forum/addtopic';
$route[$lang . '/forum/topic/reply']        = 'forum/reply';
$route[$lang . '/forum/topic/reply/delete'] = 'forum/deletereply';
$route[$lang . '/forum/topic/update']       = 'forum/update';

/*
 *  News 新闻
 *  News module, to visualize and make comments.* 新闻模块，可视化和发表评论。
*/
$route[$lang . '/news/(:num)']       = 'news/article/$2';
$route[$lang . '/news/reply']        = 'news/reply';
$route[$lang . '/news/reply/delete'] = 'news/deletereply';

/*
 *  Store 商店
 *  Routes over the store* 商店内的路线
*/
$route[$lang . '/store']                = 'store/index';
$route[$lang . '/store/(:any)']         = 'store/category/$2/';
$route[$lang . '/cart']                 = 'store/cart';
$route[$lang . '/cart/checkout']        = 'store/checkout';
$route[$lang . '/cart/add']             = 'store/addtocart';
$route[$lang . '/cart/delete']          = 'store/removeitem';
$route[$lang . '/cart/updatequantity']  = 'store/updatequantity';
$route[$lang . '/cart/updatecharacter'] = 'store/updatecharacter';

/*
 *  Pages 页面
 *  Static pages, which can be created from the admin panel.* 静态页面，可以从管理面板创建。
*/
$route[$lang . '/page/(:any)'] = 'page/index/$2/';

/*
 *  PVP* 玩家对战
 *  PVP statistics of the server and its realms.* 服务器及其领域的 PVP 统计数据。
 *  It also includes arena statistics.* 它还包括竞技场统计数据。
*/
$route[$lang . '/pvp'] = 'pvp/index';

/*
 *  Online 在线
 *  Information about people active within the server.* 有关服务器内活跃人员的信息。
*/
$route[$lang . '/online'] = 'online/index';

/*
 *  Armory 军械库
 *  Information about player, items or guild.* 关于玩家、物品或公会的信息。
*/
$route[$lang . '/armory']                      = 'armory';
$route[$lang . '/armory/search']               = 'armory/search';
$route[$lang . '/armory/result']               = 'armory/result';
$route[$lang . '/armory/character/(:num)/(:num)'] = 'armory/character/$2/$3';
$route[$lang . '/armory/guild/(:num)/(:num)']  = 'armory/guild/$2/$3';

/*
 *  Api
 *  Initial API structure to develop CMS further* 进一步开发 CMS 的初始 API 结构
*/
$route[$lang . '/api/v1']                          = 'api_v1';
$route[$lang . '/api/v1/item/newdisplayid/(:num)'] = 'api_v1/classic_displayid/$2';


/*
 *  Mod Routes 版主路由
 *  Route for moderators 版主路径
*/
$route[$lang . '/mod']          = 'mod/index';
$route[$lang . '/mod/queue']    = 'mod/queue';
$route[$lang . '/mod/reports']  = 'mod/reports';
$route[$lang . '/mod/logs']     = 'mod/logs';
$route[$lang . '/mod/bannings'] = 'mod/bannings';
$route[$lang . '/mod/warnings'] = 'mod/warnings';

/*
 *  Admin Routes 管理路由
 *  Routes for administrators  管理员路由
*/
$route[$lang . '/admin']                              = 'admin/index';
$route[$lang . '/admin/cms']                          = 'admin/cmsmanage';
$route[$lang . '/admin/cms/update']                   = 'admin/updatecms';
$route[$lang . '/admin/settings']                     = 'admin/settings';
$route[$lang . '/admin/settings/update']              = 'admin/updatesettings';
$route[$lang . '/admin/settings/module']              = 'admin/modulesettings';
$route[$lang . '/admin/settings/module/updonate']     = 'admin/updatedonatesettings';
$route[$lang . '/admin/settings/module/upbugtracker'] = 'admin/updatebugtrackersettings';
$route[$lang . '/admin/settings/optional']            = 'admin/optionalsettings';
$route[$lang . '/admin/settings/optional/update']     = 'admin/updateoptionalsettings';
$route[$lang . '/admin/settings/seo']                 = 'admin/seosettings';
$route[$lang . '/admin/settings/seo/update']          = 'admin/updateseosettings';
$route[$lang . '/admin/modules']                      = 'admin/managemodules';
$route[$lang . '/admin/modules/enable']               = 'admin/enablemodule';
$route[$lang . '/admin/modules/disable']              = 'admin/disablemodule';

/*
 *  Manage Accounts 管理账户
*/
$route[$lang . '/admin/accounts']              = 'admin/accounts';
$route[$lang . '/admin/accounts/(:num)']       = 'admin/accounts/$2';
$route[$lang . '/admin/account/manage/(:num)'] = 'admin/accountmanage/$2';
$route[$lang . '/admin/account/dlogs/(:num)']  = 'admin/accountdonatelogs/$2';
$route[$lang . '/admin/account/update']        = 'admin/updateaccount';
$route[$lang . '/admin/account/ban']           = 'admin/banaccount';
$route[$lang . '/admin/account/unban']         = 'admin/unbanaccount';
$route[$lang . '/admin/account/grantrank']     = 'admin/grantrankaccount';
$route[$lang . '/admin/account/delrank']       = 'admin/delrankaccount';

/*
 *	Tickets 管理门票
*/
$route[$lang . '/admin/tickets']              = 'admin/managetickets';
$route[$lang . '/admin/tickets/realm/(:num)'] = 'admin/ticketrealm/$2';
$route[$lang . '/admin/tickets/realm/(:num)/(:num)']
                                              = 'admin/ticketrealm/$2/$3';

/*
 *  Menu 管理菜单
*/
$route[$lang . '/admin/menu']             = 'admin/managemenu';
$route[$lang . '/admin/menu/create']      = 'admin/createmenu';
$route[$lang . '/admin/menu/edit/(:num)'] = 'admin/editmenu/$2';
$route[$lang . '/admin/menu/add']         = 'admin/addmenu';
$route[$lang . '/admin/menu/update']      = 'admin/updatemenu';
$route[$lang . '/admin/menu/delete']      = 'admin/deletemenu';

/*
 *  Realms 管理领域
*/
$route[$lang . '/admin/realms']             = 'admin/managerealms';
$route[$lang . '/admin/realms/(:num)']      = 'admin/managerealms/$2';
$route[$lang . '/admin/realms/create']      = 'admin/createrealm';
$route[$lang . '/admin/realms/edit/(:num)'] = 'admin/editrealm/$2';
$route[$lang . '/admin/realms/add']         = 'admin/addrealm';
$route[$lang . '/admin/realms/update']      = 'admin/updaterealm';
$route[$lang . '/admin/realms/delete']      = 'admin/deleterealm';

/*
 *  Slides 管理幻灯片
*/
$route[$lang . '/admin/slides']             = 'admin/manageslides';
$route[$lang . '/admin/slides/(:num)']      = 'admin/manageslides/$2';
$route[$lang . '/admin/slides/create']      = 'admin/createslide';
$route[$lang . '/admin/slides/edit/(:num)'] = 'admin/editslide/$2';
$route[$lang . '/admin/slides/add']         = 'admin/addslide';
$route[$lang . '/admin/slides/update']      = 'admin/updateslide';
$route[$lang . '/admin/slides/delete']      = 'admin/deleteslide';

/*
 *  News 管理新闻
*/
$route[$lang . '/admin/news']             = 'admin/managenews';
$route[$lang . '/admin/news/(:num)']      = 'admin/managenews/$2';
$route[$lang . '/admin/news/create']      = 'admin/createnews';
$route[$lang . '/admin/news/edit/(:num)'] = 'admin/editnews/$2';
$route[$lang . '/admin/news/delete']      = 'admin/deletenews';

/*
 *  Changelog 管理变更日志
*/
$route[$lang . '/admin/changelogs']             = 'admin/managechangelogs';
$route[$lang . '/admin/changelogs/(:num)']      = 'admin/managechangelogs/$2';
$route[$lang . '/admin/changelogs/create']      = 'admin/createchangelog';
$route[$lang . '/admin/changelogs/edit/(:num)'] = 'admin/editchangelog/$2';
$route[$lang . '/admin/changelogs/add']         = 'admin/addchangelog';
$route[$lang . '/admin/changelogs/update']      = 'admin/updatechangelog';
$route[$lang . '/admin/changelogs/delete']      = 'admin/deletechangelog';

/*
 *  Pages 管理页面
*/
$route[$lang . '/admin/pages']             = 'admin/managepages';
$route[$lang . '/admin/pages/(:num)']      = 'admin/managepages/$2';
$route[$lang . '/admin/pages/create']      = 'admin/createpage';
$route[$lang . '/admin/pages/edit/(:num)'] = 'admin/editpage/$2';
$route[$lang . '/admin/pages/add']         = 'admin/addpage';
$route[$lang . '/admin/pages/update']      = 'admin/updatepage';
$route[$lang . '/admin/pages/delete']      = 'admin/deletepage';

/*
 *  Store 管理商店
*/
$route[$lang . '/admin/store']                      = 'admin/managestore';
$route[$lang . '/admin/store/(:num)']               = 'admin/managestore/$2';
$route[$lang . '/admin/store/items']                = 'admin/managestoreitems';
$route[$lang . '/admin/store/items/(:num)']         = 'admin/managestoreitems/$2';
$route[$lang . '/admin/store/top']                  = 'admin/managestoretop';
$route[$lang . '/admin/store/top/(:num)']           = 'admin/managestoretop/$2';
$route[$lang . '/admin/store/category/create']      = 'admin/createstorecategory';
$route[$lang . '/admin/store/category/edit/(:num)'] = 'admin/editstorecategory/$2';
$route[$lang . '/admin/store/category/add']         = 'admin/addstorecategory';
$route[$lang . '/admin/store/category/update']      = 'admin/updatestorecategory';
$route[$lang . '/admin/store/category/delete']      = 'admin/deletestorecategory';
$route[$lang . '/admin/store/item/create']          = 'admin/createstoreitem';
$route[$lang . '/admin/store/item/edit/(:num)']     = 'admin/editstoreitem/$2';
$route[$lang . '/admin/store/item/add']             = 'admin/addstoreitem';
$route[$lang . '/admin/store/item/update']          = 'admin/updatestoreitem';
$route[$lang . '/admin/store/item/delete']          = 'admin/deletestoreitem';
$route[$lang . '/admin/store/top/create']           = 'admin/createstoretop';
$route[$lang . '/admin/store/top/edit/(:num)']      = 'admin/editstoretop/$2';
$route[$lang . '/admin/store/top/add']              = 'admin/addstoretop';
$route[$lang . '/admin/store/top/update']           = 'admin/updatestoretop';
$route[$lang . '/admin/store/top/delete']           = 'admin/deletestoretop';
$route[$lang . '/admin/store/logs']                 = 'admin/storelogs';

/*
 *  Donate 管理捐赠
*/
$route[$lang . '/admin/donate']             = 'admin/donate';
$route[$lang . '/admin/donate/create']      = 'admin/createdonateplan';
$route[$lang . '/admin/donate/edit/(:num)'] = 'admin/editdonateplan/$2';
$route[$lang . '/admin/donate/add']         = 'admin/adddonateplan';
$route[$lang . '/admin/donate/update']      = 'admin/updatedonateplan';
$route[$lang . '/admin/donate/delete']      = 'admin/deletedonateplan';
$route[$lang . '/admin/donate/logs']        = 'admin/donatelogs';

/*
 *  Topsites 管理热门
*/
$route[$lang . '/admin/topsites']             = 'admin/managetopsites';
$route[$lang . '/admin/topsites/(:num)']      = 'admin/managetopsites/$2';
$route[$lang . '/admin/topsites/create']      = 'admin/createtopsite';
$route[$lang . '/admin/topsites/edit/(:num)'] = 'admin/edittopsite/$2';
$route[$lang . '/admin/topsites/add']         = 'admin/addtopsite';
$route[$lang . '/admin/topsites/update']      = 'admin/updatetopsite';
$route[$lang . '/admin/topsites/delete']      = 'admin/deletetopsite';

/*
 *  Forum 管理论坛
*/
$route[$lang . '/admin/forum']                      = 'admin/manageforum';
$route[$lang . '/admin/forum/(:num)']               = 'admin/manageforum/$2';
$route[$lang . '/admin/forum/elements']             = 'admin/manageforumelements';
$route[$lang . '/admin/forum/elements/(:num)']      = 'admin/manageforumelements/$2';
$route[$lang . '/admin/forum/create']               = 'admin/createforum';
$route[$lang . '/admin/forum/edit/(:num)']          = 'admin/editforum/$2';
$route[$lang . '/admin/forum/add']                  = 'admin/addforum';
$route[$lang . '/admin/forum/update']               = 'admin/updateforum';
$route[$lang . '/admin/forum/delete']               = 'admin/deleteforum';
$route[$lang . '/admin/forum/category/create']      = 'admin/createforumcategory';
$route[$lang . '/admin/forum/category/edit/(:num)'] = 'admin/editforumcategory/$2';
$route[$lang . '/admin/forum/category/add']         = 'admin/addforumcategory';
$route[$lang . '/admin/forum/category/update']      = 'admin/updateforumcategory';
$route[$lang . '/admin/forum/category/delete']      = 'admin/deleteforumcategory';

/*
 *  Vote (admin)   投票（管理员）
*/
$route[$lang . '/admin/vote/logs'] = 'admin/votelogs';

/*
 *  To check the soap connection   检查 soap 连接
*/
$route[$lang . '/admin/checksoap'] = 'admin/checkSoap';
