![YesilCMS Logo](https://i.imgur.com/Vj0GNLV.png)
# YesilCMS &middot; [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://github.com/yesilmen-vm/YesilCMS/pulls) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/yesilmen-vm/YesilCMS/blob/master/LICENSE)

**YesilCMS** 基于[BlizzCMS](https://github.com/WoW-CMS/BlizzCMS) 专门针对 [VMaNGOS Core](https://github.com/vmangos/core) 进行了调整，包括新功能和许多错误修复。

## 功能

除了 BlizzCMS 的现有功能外，新增功能如下；

- 完整的 VMaNGOS 兼容性。
- 全新的安装脚本，根据操作系统/环境指导用户。
- 调整以在包括 Apache/Nginx/IIS 在内的多个 Web 服务器上工作。
- 适用于 *nix 操作系统的 Redis 缓存。
- 功能 [多重验证码 reCAPTCHA](https://www.google.com/recaptcha/admin/create)。
- 全新的轻量级深色主题。
- 全新的可定制军械库。
  - 基本角色信息
  - 3D 模型查看器（快速：使用普通的 "displayID"，详细：使用 Classic 的 DBC 将旧的 "displayID" 转换为 Classic 的 "displayID"。您也可以创建一个单独的表，而不是远程调用。）
  - 动态基础统计属性
  - 主 & 副职业
  - PvP 对战状态
  - 能够显示物品附魔（通过使用 WoWHead 的工具提示而不是 ClassicDB）
  - 能够显示所有角色属性，而不仅仅是基本属性
- 用 REST API 实现未来开发。
- 内置帐户激活。
- 内置帐户恢复。
- 在每个页面上内置动态 CSRF 保护。
- 调整管理面板。（SMTP 测试器、处理程序和日志等）
- 可即时下载的领域列表 Realmlist。
- Bug错误修复和改进。

## 系统要求

- 正常运行的 vMaNGOS 服务器（在同一台/另一台主机上）
- OS操作系统 (**包含 Windows视窗**)
- PHP版本 7.2以上
- Composer 是 PHP5.3以上的一个管理依赖关系的工具。
- 服务器（在Nginx，Apache和IIS上测试）
- 数据库 (MySQL/MariaDB)
- 适用于 *nix 操作系统的 Redis 缓存

### PHP Extensions扩展
- ctype
- curl
- gd
- gmp
- json
- mbstring
- mysqli
- openssl
- redis （仅适用于 *nix 操作系统）
- soap

## 安装
这是 **RHEL OS操作系统** 的示例安装；

- **nginx 1.21.6** (为 Brotli, Pagespeed, PCRE2, Zlib, Headers 定制编译），
- **PHP 7.4.30 & PHP7.4-FPM**，
- **MariaDB 10.6.7**，
- **Redis v6.0.16**

并假设您已经将上面软件全部安装和配置完好。

*注意：对于 FastCGI，您可以通过 `fastcgi_param CI_ENV ENV_NAME` 设置 CI_ENV 可用的环境名称是 `development开发, testing测试, environment环境`*

将项目从Github克隆到您的Web服务器根文件夹或文档根目录，并授予所需的所有权和权限：

```bash
  git clone https://github.com/yesilmen-vm/YesilCMS.git [document_root]
  sudo chown -R nginx:nginx [document_root]
  sudo usermod -a -G nginx nginx
  sudo find [document_root] -type f -exec chmod 644 {} \;    
  sudo find [document_root] -type d -exec chmod 755 {} \;
```
可以将依赖项更新到最新版本，也可以从头开始安装它们。要更新;
```bash
  composer update
```
为 CMS 创建所需的数据库和用户：
```mariadb
  CREATE DATABASE [cms_db];
  CREATE USER '[cms_user]'@'[host]' IDENTIFIED BY '[password]';
  GRANT USAGE ON *.* TO '[cms_user]'@'[host]';
  GRANT SELECT, EXECUTE, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON [cms_db].* TO '[cms_user]'@'[host]';
  FLUSH PRIVILEGES;
```

然后转到该站点并按照安装说明进行操作。
## API 参考
目前只有一种方法可用，所有 CRUD 操作都计划从这里完成，以确保之后的基础设施更改。

#### 获取新的显示ID
从 [WoW 工具](https://github.com/Marlamin/wow.tools) 上的经典版本 (1.14.3.44403) 获取“item_id”并返回新的“ItemDisplayInfoID”。 DBC 也可以在本地下载和使用。
```http
  GET /api/v1/item/newdisplayid/item_id
```

| Parameter | Type      | Description           |
|:----------|:----------|:----------------------|
| `item_id` | `integer` | **Required**. Item ID |

## 许可证

MIT

#### 我喜欢 ☕, 谁不喜欢呢？
[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/yesilcms)
