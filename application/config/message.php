<?php
/**
 * @package WoWCMS
 * @version 1.0.4.4
 * @author  Sayghteihgt (Destroyer/Darthar)
 * @author  DzyWolf
 * @link    http://wow-cms.com
 */

/*

/*
 *  Enable announcement message   启用公告消息
 *
 *  Whether or not to show the announcement message  是否显示公告信息
 *
*/
$config["message_enabled"] = true;

/*
 *  Message headline   消息标题
 *
 *  ["message_headline"] Announcement headline   公告标题
 *  ["message_headline_size"] Size of the headline in px 标题的大小，以 px 为单位
 *
*/
$config["message_headline"]      = "Unauthorized copy(未经授权的副本)!";
$config["message_headline_size"] = 56;

/*
 *  Message text 消息文本
 *
*/
$config["message_text"]
    = "此 WoWCMS 副本尚未在我们的许可服务中注册 <a href=\"http://wow-cms.com/\" style=\"text-decoration:none;color:white;\"> wow- cms .com </a>。要删除此消息，请转到 Application/config/message.php 并键入 false。";
