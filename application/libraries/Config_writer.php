<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Get instance of the config writer * 获取配置编写器的实例
 *
 * @param  string  $file             * 配置文件的绝对路径，默认为主配置文件
 * @param  string  $variable_name    * 保存项目的变量（数组）的名称
 *
 * @return \Array_Config_Writer
 */

require_once APPPATH . 'libraries/configwriter/class-array-config-writer.php';

class Config_Writer
{
    public function get_instance($file = null, $variable_name = 'config')
    {
        if (! $file) {
            $file = APPPATH . 'config/config.php';
        }

        return new Array_Config_Writer($file, $variable_name);
    }

    public function isEnabled($data)
    {
        if ($data == '1') {
            return true;
        } else {
            return false;
        }
    }
}
