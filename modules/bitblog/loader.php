<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

define('_BIT_BLOG_PREFIX_', 'BITBLOG_');
require_once(_PS_MODULE_DIR_.'bitblog/classes/config.php');

$config = BitBlogConfig::getInstance();


define('_BITBLOG_BLOG_IMG_DIR_', _PS_MODULE_DIR_.'bitblog/views/img/');
define('_BITBLOG_BLOG_IMG_URI_', __PS_BASE_URI__.'modules/bitblog/views/img/');


define('_BITBLOG_CATEGORY_IMG_URI_', _PS_MODULE_DIR_.'bitblog/views/img/');
define('_BITBLOG_CATEGORY_IMG_DIR_', __PS_BASE_URI__.'modules/bitblog/views/img/');

define('_BITBLOG_CACHE_IMG_DIR_', _PS_IMG_DIR_.'bitblog/');
define('_BITBLOG_CACHE_IMG_URI_', _PS_IMG_.'bitblog/');

$link_rewrite = 'link_rewrite'.'_'.Context::getContext()->language->id;
define('_BIT_BLOG_REWRITE_ROUTE_', $config->get($link_rewrite, 'blog'));

if (!is_dir(_BITBLOG_BLOG_IMG_DIR_.'c')) {
    # validate module
    mkdir(_BITBLOG_BLOG_IMG_DIR_.'c', 0777, true);
}

if (!is_dir(_BITBLOG_BLOG_IMG_DIR_.'b')) {
    # validate module
    mkdir(_BITBLOG_BLOG_IMG_DIR_.'b', 0777, true);
}

if (!is_dir(_BITBLOG_CACHE_IMG_DIR_)) {
    # validate module
    mkdir(_BITBLOG_CACHE_IMG_DIR_, 0777, true);
}
if (!is_dir(_BITBLOG_CACHE_IMG_DIR_.'c')) {
    # validate module
    mkdir(_BITBLOG_CACHE_IMG_DIR_.'c', 0777, true);
}
if (!is_dir(_BITBLOG_CACHE_IMG_DIR_.'b')) {
    # validate module
    mkdir(_BITBLOG_CACHE_IMG_DIR_.'b', 0777, true);
}

require_once(_PS_MODULE_DIR_.'bitblog/libs/Helper.php');
require_once(_PS_MODULE_DIR_.'bitblog/classes/bitblogcat.php');
require_once(_PS_MODULE_DIR_.'bitblog/classes/blog.php');
require_once(_PS_MODULE_DIR_.'bitblog/classes/link.php');
require_once(_PS_MODULE_DIR_.'bitblog/classes/comment.php');
require_once(_PS_MODULE_DIR_.'bitblog/classes/BitblogOwlCarousel.php');
