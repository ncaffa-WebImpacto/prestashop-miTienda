<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
include_once(dirname(__FILE__).'/bitblog.php');
$bitblog = new bitblog();
if (file_exists(_PS_MODULE_DIR_.'bitblog/classes/config.php')) {
    $bitblog->isInstalled = true;
    require_once(_PS_MODULE_DIR_.'bitblog/loader.php');
    if (!Module::getInstanceByName('bitblog')->active) {
        exit;
    }

    # Get data
    $authors = array();
    $config = BitBlogConfig::getInstance();
    $enbrss = (int)$config->get('indexation', 0);
    if ($enbrss != 1) {
        exit;
    }
    $config->setVar('blockbit_blogs_height', Configuration::get('BBITBLOGS_HEIGHT'));
    $config->setVar('blockbit_blogs_width', Configuration::get('BBITBLOGS_WIDTH'));
    $config->setVar('blockbit_blogs_limit', Configuration::get('BBITBLOGS_NBR'));
    $limit = (int)$config->get('rss_limit_item', 4);
    $helper = BitBlogHelper::getInstance();
    $image_w = (int)$config->get('blockbit_blogs_width', 690);
    $image_h = (int)$config->get('blockbit_blogs_height', 300);
    $blogs = BitBlogBlog::getListBlogs(null, Context::getContext()->language->id, 0, $limit, 'id_bitblog_blog', 'DESC', array(), true);
    foreach ($blogs as $key => $blog) {
        $blog = BitBlogHelper::buildBlog($helper, $blog, $image_w, $image_h, $config);
        if ($blog['id_employee']) {
            if (!isset($authors[$blog['id_employee']])) {
                # validate module
                $authors[$blog['id_employee']] = new Employee($blog['id_employee']);
            }

            $blog['author'] = $authors[$blog['id_employee']]->firstname.' '.$authors[$blog['id_employee']]->lastname;
            $blog['author_link'] = $helper->getBlogAuthorLink($authors[$blog['id_employee']]->id);
        } else {
            $blog['author'] = '';
            $blog['author_link'] = '';
        }

        $blogs[$key] = $blog;
    }
    # Send feed
    header('Content-Type:text/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
    ?>
    <rss version="2.0">
        <channel>
            <title><![CDATA[<?php echo Configuration::get('PS_SHOP_NAME') ?>]]></title>
            <link><?php echo _PS_BASE_URL_.__PS_BASE_URI__; ?></link>
            <webMaster><?php echo Configuration::get('PS_SHOP_EMAIL') ?></webMaster>
            <generator>PrestaShop</generator>
            <language><?php echo Context::getContext()->language->iso_code; ?></language>
            <image>
            <title><![CDATA[<?php echo Configuration::get('PS_SHOP_NAME') ?>]]></title>
            <url><?php echo _PS_BASE_URL_.__PS_BASE_URI__.'img/logo.jpg'; ?></url>
            <link><?php echo _PS_BASE_URL_.__PS_BASE_URI__; ?></link>
            </image>
            <?php
            foreach ($blogs as $blog) {
                echo "\t\t<item>\n";
                echo "\t\t\t<title><![CDATA[".$blog['title']."]]></title>\n";
                echo "\t\t\t<description>";
                $cdata = true;
                if (!empty($blog['image'])) {
                    echo "<![CDATA[<img src='".$blog['preview_url']."' title='".str_replace('&', '', $blog['title'])."' alt='thumb' class='img-fluid'/>";
                    $cdata = false;
                }
                if ($cdata) {
                    echo '<![CDATA[';
                }
                echo $blog['description']."]]></description>\n";

                echo "\t\t\t<link><![CDATA[".$blog['link']."]]></link>\n";
                echo "\t\t</item>\n";
            }
            ?>
        </channel>
    </rss>
    <?php
}
