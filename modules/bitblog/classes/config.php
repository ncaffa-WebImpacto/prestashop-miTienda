<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class BitBlogConfig
{
    public $params;
    public $cat_image_dir = '';
    /** @var int id_lang current language in for, while */
    public $cur_id_lang = '';
    /** @var int id_lang current language in for, while */
    public $cur_prefix_rewrite = '';

    public static function getInstance()
    {
        static $instance;
        if (!$instance) {
            # validate module
            $instance = new BitBlogConfig();
        }
        return $instance;
    }

    public function __construct()
    {
        $data = self::getConfigValue('cfg_global');

        if ($data && $tmp = Tools::jsonDecode($data, true)) {
            # validate module
            $this->params = $tmp;
        }
    }

    public function mergeParams($params)
    {
        # validate module
        unset($params);
    }

    public function setVar($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function get($name, $value = '')
    {
        if (isset($this->params[$name])) {
            # validate module
            return $this->params[$name];
        }
        return $value;
    }

    public static function getConfigName($name)
    {
        return Tools::strtoupper(_BIT_BLOG_PREFIX_.$name);
    }

    public static function updateConfigValue($name, $value = '')
    {
        Configuration::updateValue(self::getConfigName($name), $value, true);
    }

    public static function getConfigValue($name)
    {
        return Configuration::get(self::getConfigName($name));
    }
}
