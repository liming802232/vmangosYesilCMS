<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * SEO Title   * 搜索引擎优化标题
 *
 * Used by Metatags, Open Graph and Twitter Card* 由 Metatags、Open Graph 和 Twitter Card 使用
 *
 */
$config['seo_title'] = '';

/**
 *
 * SEO Imgurl   * 搜索引擎优化图片
 *
 * Used by Metatags, Open Graph and Twitter Card
 *
 */
$config['seo_imgurl'] = '';

/**
 *
 * Metadata Status (Default: false)* 元数据状态（默认值：false）
 *
 * TRUE = Enable
 * FALSE = Disabled
 *
 */
$config['seo_meta_enable'] = false;

/**
 *
 * Metadata  Description (320 characters allowed)* 元数据描述（允许 320 个字符）
 *
 * Used by Metatags, Open Graph and Twitter Card
 *
*/
$config['seo_meta_desc'] = '';

/**
 *
 * Metadata  Keywords   * 元数据关键词
 *
 * Used only Metatags   * 仅使用元标签
 *
 */
$config['seo_meta_keywords'] = '';

/**
 *
 * Twitter Card Status (Default: false)* 推特卡片状态（默认值：false）
 *
 * TRUE = Enable
 * FALSE = Disabled
 *
 */
$config['seo_twitter_enable'] = false;

/**
 *
 * Open Graph Status (Default: false)* 开放图谱状态（默认值：false）
 *
 * TRUE = Enable
 * FALSE = Disabled
 *
 */
$config['seo_og_enable'] = false;

/**
 *
 * Robots Status (Default: true)* 机器人状态（默认值：true）
 *
 * TRUE = Enable
 * FALSE = Disabled
 *
 */
$config['seo_robots_enable'] = true;

/**
 *
 * Behavior robots (Default: 1)*行为机器人（默认：1）
 *
 * 1 => 它允许对页面进行索引和跟踪，并且是默认值。
 *      忽略 meta robots 标签与在此配置中使用它是一样的。
 * 2 => 避免建立索引但允许跟踪。 这是理想的配置
 *      当您不希望某个页面出现在搜索引擎结果中时。
 * 3 => 它允许建立索引但避免跟踪。
 * 4 => 避免建立索引和跟踪。
 *
 *
 */
$config['seo_robots_config'] = 1;

/**
 *
 * Meta ViewPort (Default: False) [NOTE: Only Responsive designs]* Meta Viewport（默认值：False）[注意：仅限响应式设计]
 *
 * TRUE = Enable
 * FALSE = Disabled
 *
 */
$config['seo_meta_viewport'] = false;
