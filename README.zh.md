![YesilCMS Logo](https://i.imgur.com/Vj0GNLV.png)
# YesilCMS &middot; [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://github.com/yesilmen-vm/YesilCMS/pulls) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/yesilmen-vm/YesilCMS/blob/master/LICENSE)

Read in: [英语 :gb:](README.md) | [简中 :cn:](README_zh.md)

**YesilcmS** 基于 [BlizzCMS](https://github.com/WoW-CMS/BlizzCMS) 专门针对 [VMaNGOS Core](https://github.com/vmangos/core) 进行了调整，包括新功能和许多错误修复。

您可以通过此处查看演示; [YesilcmS 演示](https://yesilcms.page).

## 特性

除了 BlizzCMS 的现有功能外，新增功能如下;

- **完整的 VMaNGOS 兼容性。**
- 新的安装脚本，根据操作系统/环境指导用户。
- 调整以在多个Web服务器上工作，包括Apache/Nginx/IIS。
- 适用于 *nix 操作系统的 **Redis 缓存**。
- 高级静态缓存。 (可选，对登录用户有一些副作用)
- 功能验证码 [reCAPTCHA](https://www.google.com/recaptcha/admin/create).
- 新的轻量级深色主题。
- 全新的**内置数据库查看器** *(WIP(\*))*.
  - 渐进式数据库搜索 (1.2 到 1.12)
  - 使用所有相关数据进行项目搜索。
  - 使用所有相关数据和开发所需数据进行法术搜索。
  - 对象、生物和任务页面处于 WIP 状态。 (*)
- 全新的 **可定制的军械库。**
  - 基本角色信息
  - 3D模型查看器 (Fast: Uses plain `displayID`, Detailed: Converts old `displayID` to Classic `displayID` using Classic's DBC. You can also create a separate table instead of remote call.)
  - 动态基础统计数据
  - 渐进式军械库 (1.2 到 1.12 也可由用户选择)
  - Primary & Secondary Professions
  - PvP对战统计
  - 能够在物品上显示附魔（通过使用WoWHead的工具提示而不是ClassicDB）。
  - 能够显示所有角色属性，而不仅仅是基本属性。
- 全新的 **PvP对战页面**
  - 玩家可能想要查看的所有 pvp 数据。
  - 广泛的过滤选项。
    - 能够按所有时间和上周进行过滤
    - 能够按阵营过滤
    - 能够按特定名称进行筛选
- 独特的 **时间轴模块** ，具有响应式设计和充分的灵活性。
  - 能够根据选择添加任何补丁（包括自定义补丁）
  - 能够自动订购或自定义，无论日期如何
  - Separated Description, General, PvE and PvP sections better for maintainability.
  - Ability to add unique image for each patch.
- 用于未来开发的 REST API 实现。
- 内置 **账户激活。**
- 内置 **账户恢复。*
- 内置 **工具提示、物品和法术查看器。**
- 每个页面上都内置动态 CSRF 保护。
- 调整了管理面板。（SMTP测试器，处理程序和日志等）
- 可即时下载的领域列表。
- 错误修复和改进。

## 系统要求

- 正常运行的 vMaNGOS 服务器（在同一台/另一台主机上）
- OS操作系统 (**包含 Windows**)
- PHP 7.2+ (包含 8.1.x - 测试版)
- Composer
- Web服务器（在Nginx，Apache和IIS上测试）
- 数据库 (MySQL/MariaDB)
- Redis for *nix operating systems

### PHP 扩展
- ctype
- curl
- gd
- gmp
- json
- mbstring
- mysqli
- openssl
- redis (仅适用于 *nix 操作系统)
- soap

## 安装
这是 **RHEL OS**的示例安装;

- **nginx 1.21.6** (为 Brotli, Pagespeed, PCRE2, Zlib, Headers定制编译),
- **PHP 7.4.30 & PHP7.4-FPM**,
- **MariaDB 10.6.7**,
- **Redis v6.0.16**

并假设您已经在上面安装和配置。

*注意：对于 FastCGI，您可以通过fastcgi_param CI_ENV ENV_NAME设置CI_ENV 可用环境名称为开发、测试、环境 `development, testing, environment`*

将项目从Github克隆到您的Web服务器根文件夹或文档根目录，并授予所需的所有权和权限:

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
为 CMS 创建所需的数据库和用户:
```mariadb
  CREATE DATABASE [cms_db];
  CREATE USER '[cms_user]'@'[host]' IDENTIFIED BY '[password]';
  GRANT USAGE ON *.* TO '[cms_user]'@'[host]';
  GRANT SELECT, EXECUTE, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON [cms_db].* TO '[cms_user]'@'[host]';
  FLUSH PRIVILEGES;
```

然后转到该站点并继续执行安装说明。

## API Reference 接口参考
目前只有 5 种方法可用，所有 CRUD 操作都计划从这里完成，以确保之后的基础设施发生变化。

#### 获取物品新的显示 ID
Takes `item_id` and returns new `ItemDisplayInfoID` from Classic build  (1.14.3.44403) on [WoW Tools](https://github.com/Marlamin/wow.tools). DBC can be downloaded and used locally as well.

```http
  GET /api/v1/item/newdisplayid/item_id
```

| Parameter | Type      | Description              |
|:----------|:----------|:-------------------------|
| `item_id` | `integer` | **Required**. Item entry |

#### 获取物品信息
Takes `item_id` and `patch` and returns information of given item if exists in database within given patch.

```http
  GET /api/v1/item/item_id/patch
```

| Parameter | Type      | Description                         |
|:----------|:----------|:------------------------------------|
| `item_id` | `integer` | **Required**. Item entry            |
| `patch`   | `integer` | **Optional**. Patch version of item |

#### 获取物品工具提示信息
Takes `item_id` and `patch` and returns `id`, `type`, `name`, `icon`, `quality` and `tooltip`. Tooltip parameter will be
html formatted.

```http
  GET /api/v1/tooltip/item/item_id/patch
```

| Parameter | Type      | Description                         |
|:----------|:----------|:------------------------------------|
| `item_id` | `integer` | **Required**. Item entry            |
| `patch`   | `integer` | **Optional**. Patch version of item |

#### 获取技能工具提示信息
Takes `spell_id` and `patch` and returns `id`, `type`, `name`, `icon`, and `tooltip`. Tooltip parameter will be
html formatted.

```http
  GET /api/v1/tooltip/spell/spell_id/patch
```

| Parameter  | Type      | Description                                                                    |
|:-----------|:----------|:-------------------------------------------------------------------------------|
| `spell_id` | `integer` | **Required**. Spell entry                                                      |
| `patch`    | `integer` | **Optional**. Patch version of spell (build converted to patch automatically.) |

#### Search Database
Takes `query` and `patch` and returns matching Item and Spells in database.

```http
  POST /api/v1/search_db
```

| Parameter | Type      | Description                                                        |
|:----------|:----------|:-------------------------------------------------------------------|
| `query`   | `string`  | **Required**. Search query                                         |
| `patch`   | `integer` | **Optional**. Patch version (by default its 10)                    |
| `token`   | `string`  | **Required when** CSRF is enabled. Do not confuse it with API key. |

*Note: `token` parameter should be renamed to configured `csrf_token_name`.*


## Roadmap

- Minimize the code to remain compatible only with vMaNGOS and other vanilla emulators.
- Add Object, Quest and NPC structure for database.
- Customize static-based cache structure. (Create a different cache structure for the visitor and the logged in user.)
- Migrate existing framework from Codeigniter 3 to Laravel 9.

## License

MIT

#### I like ☕, who doesn't right?
[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/yesilcms)
