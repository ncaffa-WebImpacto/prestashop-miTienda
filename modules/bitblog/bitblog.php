<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once(_PS_MODULE_DIR_.'bitblog/loader.php');

class Bitblog extends Module
{
    private static $bit_xml_fields = array('title', 'guid', 'description', 'author', 'comments', 'pubDate', 'source', 'link', 'content');
    public $base_config_url;
    private $_html = '';

    public function __construct()
    {
        $currentIndex = '';

        $this->name = 'bitblog';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';
        $this->controllers = array('blog', 'category', 'list');
        $this->need_instance = 0;
        $this->bootstrap = true;

        $this->secure_key = Tools::encrypt($this->name);

        parent::__construct();

        $this->base_config_url = $currentIndex.'&configure='.$this->name.'&token='.Tools::getValue('token');
        $this->displayName = $this->l('BIT - Blog Management');
        $this->description = $this->l('Powerfull Blog Content for PrestaShop');
    }

    private function uninstallModuleTab($class_sfx = '')
    {
        $tab_class = 'Admin'.Tools::ucfirst($this->name).Tools::ucfirst($class_sfx);

        $id_tab = Tab::getIdFromClassName($tab_class);
        if ($id_tab != 0) {
            $tab = new Tab($id_tab);
            $tab->delete();
            return true;
        }
        return false;
    }

    private function installModuleTab($title, $class_sfx = '', $parent = '')
    {
        $class = 'Admin'.Tools::ucfirst($this->name).Tools::ucfirst($class_sfx);
        @copy(_PS_MODULE_DIR_.$this->name.'/logo.gif', _PS_IMG_DIR_.'t/'.$class.'.gif');
        if ($parent == '') {
            $position = Tab::getCurrentTabId();
        } else {
            $position = Tab::getIdFromClassName($parent);
        }

        $tab1 = new Tab();
        $tab1->class_name = $class;
        $tab1->module = $this->name;
        $tab1->id_parent = (int)$position;
        $langs = Language::getLanguages(false);
        foreach ($langs as $l) {
            $tab1->name[$l['id_lang']] = $title;
        }
        $tab1->add(true, false);
    }

    public function install()
    {
        if (parent::install() && $this->registerBitHook()) {
            $res = true;

            Configuration::updateValue('BITBLOG_CATEORY_MENU', 1);
            Configuration::updateValue('BITBLOG_IMAGE_TYPE', 'jpg');

            Configuration::updateValue('BITBLOG_DASHBOARD_DEFAULTTAB', '#fieldset_0');

            $res &= $this->createTables();

            if (Db::getInstance()->executeS('SHOW TABLES LIKE \'%bitblog_blog%\'') && count(Db::getInstance()->executes('SELECT "thumb" FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "'._DB_NAME_.'" AND TABLE_NAME = "'._DB_PREFIX_.'bitblog_blog" AND COLUMN_NAME = "thumb"'))<1) {
                Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.'bitblog_blog` ADD `thumb` varchar(255) DEFAULT NULL');
            }

            $id_parent = Tab::getIdFromClassName('IMPROVE');

            $class = 'Admin'.Tools::ucfirst($this->name).'Management';
            $tab1 = new Tab();
            $tab1->class_name = $class;
            $tab1->module = $this->name;
            $tab1->id_parent = $id_parent;
            $tab1->icon = "content_paste";
            $langs = Language::getLanguages(false);
            foreach ($langs as $l) {
                $tab1->name[$l['id_lang']] = $this->l('Bit Blog Management');
            }
            $tab1->add(true, false);

            $this->installModuleTab('Blog Dashboard', 'dashboard', 'AdminBitblogManagement');
            $this->installModuleTab('Categories Management', 'categories', 'AdminBitblogManagement');
            $this->installModuleTab('Blogs Management', 'blogs', 'AdminBitblogManagement');
            $this->installModuleTab('Comment Management', 'comments', 'AdminBitblogManagement');
            $this->installModuleTab('Bit Blog Configuration', 'module', 'AdminBitblogManagement');

            $this->moveImageFolder();

            return (bool)$res;
        }
        return false;
    }

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addCss(__PS_BASE_URI__.'modules/bitblog/views/css/admin/blogmenu.css');
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitBlockCategories')) {
            Configuration::updateValue('BITBLOG_CATEORY_MENU', (int)Tools::getValue('BITBLOG_CATEORY_MENU'));
            Configuration::updateValue('BITBLOG_IMAGE_TYPE', Tools::getValue('BITBLOG_IMAGE_TYPE'));
        }
    }

    protected function about()
    {
        $this->smarty->assign(array(
            'doc_url' => $this->_path.'documentation.pdf',
        ));

        return $this->display(__FILE__, 'views/templates/admin/about.tpl');
    }

    public function getContent()
    {
        $this->postProcess();

        return $this->renderForm().$this->about();
    }

    public function renderForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enable Categories Tree Block'),
                        'name' => 'BITBLOG_CATEORY_MENU',
                        'desc' => $this->l('Activate  The Module.'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Image type'),
                        'name' => 'BITBLOG_IMAGE_TYPE',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id' => 'jpg',
                                    'name' => $this->l('jpg')
                                ),
                                array(
                                    'id' => 'png',
                                    'name' => $this->l('png')
                                ),
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'desc' => $this->l('For images png type. Keep png type or optimize to jpg type'),
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'class' => 'btn btn-default')
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitBlockCategories';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        return array(
            'BITBLOG_CATEORY_MENU' => Tools::getValue('BITBLOG_CATEORY_MENU', Configuration::get('BITBLOG_CATEORY_MENU')),
            'BITBLOG_IMAGE_TYPE' => Tools::getValue('BITBLOG_IMAGE_TYPE', Configuration::get('BITBLOG_IMAGE_TYPE')),

        );
    }

    public function _prepareHook()
    {
        $helper = BitBlogHelper::getInstance();

        $category = new Bitblogcat(Tools::getValue('id_bitblogcat'), $this->context->language->id);

        $tree = $category->getFrontEndTree((int)$category->id_bitblogcat > 1 ? $category->id_bitblogcat : 1, $helper);
        $this->smarty->assign('tree', $tree);
        if ($category->id_bitblogcat) {
            $this->smarty->assign('currentCategory', $category);
        }

        return true;
    }

    public function hookDisplayHeader()
    {
        if (Tools::getValue('module') == 'bitblog') {
            $langs = Language::getLanguages(false);
            if (count($langs) > 1) {
                $config = BitBlogConfig::getInstance();
                $array_list_rewrite = array();
                $array_category_rewrite = array();
                $array_config_category_rewrite = array();
                $array_blog_rewrite = array();
                $array_config_blog_rewrite = array();
                $config_url_use_id = $config->get('url_use_id');

                $page_name = Dispatcher::getInstance()->getController();

                if ($page_name == 'blog') {
                    if ($config_url_use_id == 1) {
                        $id_blog = Tools::getValue('id');
                    } else {
                        $id_shop = (int)Context::getContext()->shop->id;
                        $block_rewrite = Tools::getValue('rewrite');
                        $sql = 'SELECT bl.id_bitblog_blog FROM '._DB_PREFIX_.'bitblog_blog_lang bl';
                        $sql .= ' INNER JOIN '._DB_PREFIX_.'bitblog_blog_shop bs on bl.id_bitblog_blog=bs.id_bitblog_blog AND id_shop='.(int)$id_shop;
                        $sql .= " AND link_rewrite = '".pSQL($block_rewrite)."'";
                        if ($row = Db::getInstance()->getRow($sql)) {
                            $id_blog = $row['id_bitblog_blog'];
                        }
                    }
                    $blog_obj = new Bitblogblog($id_blog);
                }

                if ($page_name == 'category') {
                    if ($config_url_use_id == 1) {
                        $id_category = Tools::getValue('id');
                    } else {
                        $id_shop = (int)Context::getContext()->shop->id;
                        $category_rewrite = Tools::getValue('rewrite');
                        $sql = 'SELECT cl.id_bitblogcat FROM '._DB_PREFIX_.'bitblogcat_lang cl';
                        $sql .= ' INNER JOIN '._DB_PREFIX_.'bitblogcat_shop cs on cl.id_bitblogcat=cs.id_bitblogcat AND id_shop='.(int)$id_shop;
                        $sql .= ' INNER JOIN '._DB_PREFIX_.'bitblogcat cc on cl.id_bitblogcat=cc.id_bitblogcat AND cl.id_bitblogcat != cc.id_parent';
                        $sql .= " AND link_rewrite = '".pSQL($category_rewrite)."'";

                        if ($row = Db::getInstance()->getRow($sql)) {
                            $id_category = $row['id_bitblogcat'];
                        }
                    }
                    $blog_category_obj = new Bitblogcat($id_category);
                }

                foreach ($langs as $lang) {
                    $array_list_rewrite[$lang['iso_code']] = $config->get('link_rewrite_'.$lang['id_lang'], 'blog');

                    if (isset($id_blog)) {
                        $array_blog_rewrite[$lang['iso_code']] = $blog_obj->link_rewrite[$lang['id_lang']];
                        if ($config_url_use_id == 0) {
                            $array_config_blog_rewrite[$lang['iso_code']] = $config->get('detail_rewrite_'.$lang['id_lang'], 'detail');
                        }
                    }

                    if (isset($id_category)) {
                        $array_category_rewrite[$lang['iso_code']] = $blog_category_obj->link_rewrite[$lang['id_lang']];
                        if ($config_url_use_id == 0) {
                            $array_config_category_rewrite[$lang['iso_code']] = $config->get('category_rewrite_'.$lang['id_lang'], 'category');
                        }
                    }
                };

                Media::addJsDef(array(
                    'array_list_rewrite' => $array_list_rewrite,
                    'array_category_rewrite' => $array_category_rewrite,
                    'array_blog_rewrite' => $array_blog_rewrite,
                    'array_config_category_rewrite' => $array_config_category_rewrite,
                    'array_config_blog_rewrite' => $array_config_blog_rewrite,
                    'config_url_use_id' => $config_url_use_id
                ));
            }
        }
    }

    public function hookDisplayBlogSidebar()
    {
        $html = '';
        $fc = Tools::getValue('fc');
        $module = Tools::getValue('module');

        if ($fc == 'module' && $module =='bitblog') {
            $html .= $this->sidebarBlogCategory();
            $html .= $this->sidebarPopularBlog();
            $html .= $this->sidebarRecentBlog();
            $html .= $this->sidebarBlogTag();
        }

        return $html;
    }

    public function sidebarBlogCategory()
    {
        $html = '';

        if (Configuration::get('BITBLOG_CATEORY_MENU') && $this->_prepareHook()) {
            $html .= $this->display(__FILE__, 'views/templates/hook/categories_menu.tpl');
        }

        return $html;
    }

    public function sidebarPopularBlog()
    {
        $html = '';

        $config = BitBlogConfig::getInstance();
        if ($config->get('show_popular_blog', 0)) {
            $limit = (int)$config->get('limit_popular_blog', 5);
            $helper = BitBlogHelper::getInstance();
            $image_w = (int)$config->get('listing_leading_img_width', 870);
            $image_h = (int)$config->get('listing_leading_img_height', 615);
            $authors = array();

            $leading_blogs = array();
            if ($limit > 0) {
                $leading_blogs = BitBlogBlog::getListBlogs(null, $this->context->language->id, 1, $limit, 'hits', 'DESC', array(), true);
            }
            foreach ($leading_blogs as $key => $blog) {
                $blog = BitBlogHelper::buildBlog($helper, $blog, $image_w, $image_h, $config);
                if ($blog['id_employee']) {
                    if (!isset($authors[$blog['id_employee']])) {
                        $authors[$blog['id_employee']] = new Employee($blog['id_employee']);
                    }

                    if ($blog['author_name'] != '') {
                        $blog['author'] = $blog['author_name'];
                        $blog['author_link'] = $helper->getBlogAuthorLink($blog['author_name']);
                    } else {
                        $blog['author'] = $authors[$blog['id_employee']]->firstname.' '.$authors[$blog['id_employee']]->lastname;
                        $blog['author_link'] = $helper->getBlogAuthorLink($authors[$blog['id_employee']]->id);
                    }
                } else {
                    $blog['author'] = '';
                    $blog['author_link'] = '';
                }

                $leading_blogs[$key] = $blog;
            }

            $this->smarty->assign('leading_blogs', $leading_blogs);
            $html .= $this->display(__FILE__, 'views/templates/hook/left_popular.tpl');
        }

        return $html;
    }

    public function sidebarRecentBlog()
    {
        $html = '';

        $config = BitBlogConfig::getInstance();
        if ($config->get('show_recent_blog', 0)) {
            $limit = (int)$config->get('limit_recent_blog', 5);
            $config = BitBlogConfig::getInstance();
            $helper = BitBlogHelper::getInstance();
            $image_w = (int)$config->get('listing_leading_img_width', 870);
            $image_h = (int)$config->get('listing_leading_img_height', 615);
            $authors = array();

            $leading_blogs = array();
            if ($limit > 0) {
                $leading_blogs = BitBlogBlog::getListBlogs(null, $this->context->language->id, 1, $limit, 'date_add', 'DESC', array(), true);
            }
            foreach ($leading_blogs as $key => $blog) {
                $blog = BitBlogHelper::buildBlog($helper, $blog, $image_w, $image_h, $config);
                if ($blog['id_employee']) {
                    if (!isset($authors[$blog['id_employee']])) {
                        $authors[$blog['id_employee']] = new Employee($blog['id_employee']);
                    }

                    if ($blog['author_name'] != '') {
                        $blog['author'] = $blog['author_name'];
                        $blog['author_link'] = $helper->getBlogAuthorLink($blog['author_name']);
                    } else {
                        $blog['author'] = $authors[$blog['id_employee']]->firstname.' '.$authors[$blog['id_employee']]->lastname;
                        $blog['author_link'] = $helper->getBlogAuthorLink($authors[$blog['id_employee']]->id);
                    }
                } else {
                    $blog['author'] = '';
                    $blog['author_link'] = '';
                }

                $leading_blogs[$key] = $blog;
            }

            $this->smarty->assign('leading_blogs', $leading_blogs);
            $html .= $this->display(__FILE__, 'views/templates/hook/left_recent.tpl');
        }

        return $html;
    }

    public function sidebarBlogTag()
    {
        $html = '';
        $helper = BitBlogHelper::getInstance();

        $config = BitBlogConfig::getInstance();
        if ($config->get('show_all_tags', 0)) {
            $leading_blogs = BitBlogBlog::getListBlogs(null, $this->context->language->id, 1, 100000, 'date_add', 'DESC', array(), true);

            $tags_temp = array();
            foreach ($leading_blogs as $key => $value) {
                $tags_temp = array_merge($tags_temp, explode(",", $value['tags']));
            }
            unset($key);

            $tags_temp = array_unique($tags_temp);
            $tags = array();
            foreach ($tags_temp as $tag_temp) {
                $tags[] = array(
                    'name' => $tag_temp,
                    'link' => $helper->getBlogTagLink($tag_temp)
                );
            }

            $this->smarty->assign('bitblogtags', $tags);
            $html .= $this->display(__FILE__, 'views/templates/hook/left_bitblogtags.tpl');
        }

        return $html;
    }

    protected function getCacheId($name = null)
    {
        $name = ($name ? $name.'|' : '').implode('-', Customer::getGroupsStatic($this->context->customer->id));
        return parent::getCacheId($name);
    }

    public function hookRightcolumn($params)
    {
        return $this->hookDisplayBlogSidebar($params);
    }

    public function hookLeftghtcolumn($params)
    {
        return $this->hookDisplayBlogSidebar($params);
    }

    public function uninstall()
    {
        if (parent::uninstall() && $this->unregisterBitHook()) {
            $res = true;

            $this->uninstallModuleTab('management');
            $this->uninstallModuleTab('dashboard');
            $this->uninstallModuleTab('categories');
            $this->uninstallModuleTab('blogs');
            $this->uninstallModuleTab('comments');
            $this->uninstallModuleTab('module');

            $res &= $this->deleteTables();
            $this->deleteConfiguration();

            return (bool)$res;
        }
        return false;
    }

    public function deleteTables()
    {
        return Db::getInstance()->execute('
            DROP TABLE IF EXISTS
            `'._DB_PREFIX_.'bitblogcat`,
            `'._DB_PREFIX_.'bitblogcat_lang`,
            `'._DB_PREFIX_.'bitblogcat_shop`,
            `'._DB_PREFIX_.'bitblog_comment`,
            `'._DB_PREFIX_.'bitblog_blog`,
            `'._DB_PREFIX_.'bitblog_blog_lang`,
            `'._DB_PREFIX_.'bitblog_blog_shop`');
    }

    public function deleteConfiguration()
    {
        Configuration::deleteByName('BITBLOG_CATEORY_MENU');
        Configuration::deleteByName('BITBLOG_IMAGE_TYPE');

        Configuration::deleteByName('BITBLOG_DASHBOARD_DEFAULTTAB');
        Configuration::deleteByName('BITBLOG_CFG_GLOBAL');
        return true;
    }

    protected function createTables()
    {
        $res = 1;
        include_once(dirname(__FILE__).'/install/install.php');
        return $res;
    }

    public function hookDisplayBanner()
    {
        if (Module::isEnabled('blocklanguages')) {
            $default_rewrite = array();
            $module = Validate::isModuleName(Tools::getValue('module')) ? Tools::getValue('module') : '';
            $controller = Tools::getValue('controller');
            if ($module == 'bitblog' && $controller == 'blog' && ($id_blog = (int)Tools::getValue('id'))) {
                $languages = Language::getLanguages(true, $this->context->shop->id);
                if (!count($languages)) {
                    return false;
                }
                $link = new Link();

                foreach ($languages as $lang) {
                    $config = BitBlogConfig::getInstance();
                    $config->cur_id_lang = $lang['id_lang'];

                    $cur_key = 'link_rewrite'.'_'.Context::getContext()->language->id;
                    $cur_prefix = '/'.$config->cur_prefix_rewrite = $config->get($cur_key, 'blog').'/';

                    $other_key = 'link_rewrite'.'_'.$lang['id_lang'];
                    $other_prefix = '/'.$config->cur_prefix_rewrite = $config->get($other_key, 'blog').'/';

                    $blog = new BitBlogBlog($id_blog, $lang['id_lang']);
                    $temp_link = $link->getModuleLink($module, $controller, array('id' => $id_blog, 'rewrite' => $blog->link_rewrite), null, $lang['id_lang']);
                    $default_rewrite[$lang['id_lang']] = str_replace($cur_prefix, $other_prefix, $temp_link);
                }
            } elseif ($module == 'bitblog' && $controller == 'category' && ($id_blog = (int)Tools::getValue('id'))) {
                $languages = Language::getLanguages(true, $this->context->shop->id);
                if (!count($languages)) {
                    return false;
                }
                $link = new Link();

                foreach ($languages as $lang) {
                    $config = BitBlogConfig::getInstance();
                    $config->cur_id_lang = $lang['id_lang'];

                    $cur_key = 'link_rewrite'.'_'.Context::getContext()->language->id;
                    $cur_prefix = '/'.$config->cur_prefix_rewrite = $config->get($cur_key, 'blog').'/';

                    $other_key = 'link_rewrite'.'_'.$lang['id_lang'];
                    $other_prefix = '/'.$config->cur_prefix_rewrite = $config->get($other_key, 'blog').'/';

                    $blog = new Bitblogcat($id_blog, $lang['id_lang']);
                    $temp_link = $link->getModuleLink($module, $controller, array('id' => $id_blog, 'rewrite' => $blog->link_rewrite), null, $lang['id_lang']);
                    $default_rewrite[$lang['id_lang']] = str_replace($cur_prefix, $other_prefix, $temp_link);
                }
            } elseif ($module == 'bitblog' && $controller == 'list') {
                $languages = Language::getLanguages(true, $this->context->shop->id);
                if (!count($languages)) {
                    return false;
                }
                $link = new Link();

                foreach ($languages as $lang) {
                    $config = BitBlogConfig::getInstance();
                    $config->cur_id_lang = $lang['id_lang'];

                    $cur_key = 'link_rewrite'.'_'.Context::getContext()->language->id;
                    $cur_prefix = '/'.$config->cur_prefix_rewrite = $config->get($cur_key, 'blog').'';

                    $other_key = 'link_rewrite'.'_'.$lang['id_lang'];
                    $other_prefix = '/'.$config->cur_prefix_rewrite = $config->get($other_key, 'blog').'';

                    $temp_link = $link->getModuleLink($module, $controller, array(), null, $lang['id_lang']);
                    $default_rewrite[$lang['id_lang']] = str_replace($cur_prefix, $other_prefix, $temp_link);
                }
            }

            $this->context->smarty->assign('lang_bit_rewrite_urls', $default_rewrite);
        }
    }

    public function hookModuleRoutes($route = '', $detail = array())
    {
        $config = BitBlogConfig::getInstance();
        $routes = array();

        $routes['module-bitblog-list'] = array(
            'controller' => 'list',
            'rule' => _BIT_BLOG_REWRITE_ROUTE_.'.html',
            'keywords' => array(
            ),
            'params' => array(
                'fc' => 'module',
                'module' => 'bitblog'
            )
        );

        if ($config->get('url_use_id', 1)) {
            $routes['module-bitblog-blog'] = array(
                'controller' => 'blog',
                'rule' => _BIT_BLOG_REWRITE_ROUTE_.'/{rewrite}-b{id}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+', 'param' => 'id'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9-\pL]*', 'param' => 'rewrite'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'bitblog',

                )
            );

            $routes['module-bitblog-category'] = array(
                'controller' => 'category',
                'rule' => _BIT_BLOG_REWRITE_ROUTE_.'/{rewrite}-c{id}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+', 'param' => 'id'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9-\pL]*', 'param' => 'rewrite'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'bitblog',

                )
            );
        } else {
            $category_rewrite = 'category_rewrite'.'_'.Context::getContext()->language->id;
            $category_rewrite = $config->get($category_rewrite, 'category');
            $detail_rewrite = 'detail_rewrite'.'_'.Context::getContext()->language->id;
            $detail_rewrite = $config->get($detail_rewrite, 'detail');

            $routes['module-bitblog-blog'] = array(
                'controller' => 'blog',
                'rule' => _BIT_BLOG_REWRITE_ROUTE_.'/'.$detail_rewrite.'/{rewrite}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+', 'param' => 'id'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9-\pL]*', 'param' => 'rewrite'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'bitblog',
                )
            );

            $routes['module-bitblog-category'] = array(
                'controller' => 'category',
                'rule' => _BIT_BLOG_REWRITE_ROUTE_.'/'.$category_rewrite.'/{rewrite}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+', 'param' => 'id'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9-\pL]*', 'param' => 'rewrite'),
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'bitblog',
                )
            );
        }
        return $routes;
    }

    public function registerBitHook()
    {
        $res = true;
        $res &= $this->registerHook('header');
        $res &= $this->registerHook('displayBlogSidebar');
        $res &= $this->registerHook('moduleRoutes');
        $res &= $this->registerHook('displayBackOfficeHeader');
        $res &= $this->registerHook('actionAdminShopControllerSaveAfter');
        $res &= $this->registerHook('actionAdminControllerSetMedia');

        return $res;
    }


    public function unregisterBitHook()
    {
        $res = true;
        $res &= $this->unregisterHook('header');
        $res &= $this->unregisterHook('displayBlogSidebar');
        $res &= $this->unregisterHook('moduleRoutes');
        $res &= $this->unregisterHook('displayBackOfficeHeader');
        $res &= $this->unregisterHook('actionAdminShopControllerSaveAfter');
        $res &= $this->unregisterHook('actionAdminControllerSetMedia');
        return $res;
    }

    public function moveImageFolder()
    {
        if (!file_exists(_PS_THEME_DIR_.'assets/img/index.php')) {
            @copy(_BITBLOG_BLOG_IMG_DIR_.'index.php', _PS_THEME_DIR_.'assets/img/index.php');
        }

        if (!is_dir(_PS_THEME_DIR_.'assets/img/modules')) {
            mkdir(_PS_THEME_DIR_.'assets/img/modules', 0777, true);
        }

        if (!file_exists(_PS_THEME_DIR_.'assets/img/modules/index.php')) {
            @copy(_BITBLOG_BLOG_IMG_DIR_.'index.php', _PS_THEME_DIR_.'assets/img/modules/index.php');
        }

        if (!is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog')) {
            mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog', 0777, true);
        }

        if (!file_exists(_PS_THEME_DIR_.'assets/img/modules/bitblog/index.php')) {
            @copy(_BITBLOG_BLOG_IMG_DIR_.'index.php', _PS_THEME_DIR_.'assets/img/modules/bitblog/index.php');
        }

        if (!is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample')) {
            mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample', 0777, true);

            mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/b', 0777, true);
            mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/c', 0777, true);

            if (is_dir(_BITBLOG_BLOG_IMG_DIR_.'b') && is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/b')) {
                $objects_b = scandir(_BITBLOG_BLOG_IMG_DIR_.'b');
                $objects_theme_b = scandir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/b');
                if (count($objects_b) > 2 && count($objects_theme_b) <= 2) {
                    foreach ($objects_b as $objects_b_val) {
                        if ($objects_b_val != '.' && $objects_b_val != '..') {
                            if (filetype(_BITBLOG_BLOG_IMG_DIR_.'b'.'/'.$objects_b_val) == 'file') {
                                @copy(_BITBLOG_BLOG_IMG_DIR_.'b'.'/'.$objects_b_val, _PS_THEME_DIR_.'assets/img/modules/bitblog/sample/b/'.$objects_b_val);
                            }
                        }
                    }
                }
            }

            if (is_dir(_BITBLOG_BLOG_IMG_DIR_.'c') && is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/c')) {
                $objects_c = scandir(_BITBLOG_BLOG_IMG_DIR_.'c');
                $objects_theme_c = scandir(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/c');
                if (count($objects_c) > 2 && count($objects_theme_c) <= 2) {
                    foreach ($objects_c as $objects_c_val) {
                        if ($objects_c_val != '.' && $objects_c_val != '..') {
                            if (filetype(_BITBLOG_BLOG_IMG_DIR_.'c'.'/'.$objects_c_val) == 'file') {
                                @copy(_BITBLOG_BLOG_IMG_DIR_.'c'.'/'.$objects_c_val, _PS_THEME_DIR_.'assets/img/modules/bitblog/sample/c/'.$objects_c_val);
                            }
                        }
                    }
                }
            }
        }

        if (!file_exists(_PS_THEME_DIR_.'assets/img/modules/bitblog/sample/index.php')) {
            @copy(_BITBLOG_BLOG_IMG_DIR_.'index.php', _PS_THEME_DIR_.'assets/img/modules/bitblog/sample/index.php');
        }

        $list_id_shop = Db::getInstance()->executes('SELECT `id_shop` FROM `'._DB_PREFIX_.'bitblog_blog_shop` GROUP BY `id_shop`');

        if (count($list_id_shop) > 0) {
            foreach ($list_id_shop as $list_id_shop_val) {
                if (!is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'])) {
                    mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'], 0777, true);

                    @copy(_BITBLOG_BLOG_IMG_DIR_.'index.php', _PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/index.php');

                    mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/b', 0777, true);

                    mkdir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/c', 0777, true);

                    if (is_dir(_BITBLOG_BLOG_IMG_DIR_.'b') && is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/b')) {
                        $objects_b = scandir(_BITBLOG_BLOG_IMG_DIR_.'b');
                        $objects_theme_b = scandir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/b');
                        if (count($objects_b) > 2 && count($objects_theme_b) <= 2) {
                            foreach ($objects_b as $objects_b_val) {
                                if ($objects_b_val != '.' && $objects_b_val != '..') {
                                    if (filetype(_BITBLOG_BLOG_IMG_DIR_.'b'.'/'.$objects_b_val) == 'file') {
                                        @copy(_BITBLOG_BLOG_IMG_DIR_.'b'.'/'.$objects_b_val, _PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/b/'.$objects_b_val);
                                    }
                                }
                            }
                        }
                    }

                    if (is_dir(_BITBLOG_BLOG_IMG_DIR_.'c') && is_dir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/c')) {
                        $objects_c = scandir(_BITBLOG_BLOG_IMG_DIR_.'c');
                        $objects_theme_c = scandir(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/c');
                        if (count($objects_c) > 2 && count($objects_theme_c) <= 2) {
                            foreach ($objects_c as $objects_c_val) {
                                if ($objects_c_val != '.' && $objects_c_val != '..') {
                                    if (filetype(_BITBLOG_BLOG_IMG_DIR_.'c'.'/'.$objects_c_val) == 'file') {
                                        @copy(_BITBLOG_BLOG_IMG_DIR_.'c'.'/'.$objects_c_val, _PS_THEME_DIR_.'assets/img/modules/bitblog/'.$list_id_shop_val['id_shop'].'/c/'.$objects_c_val);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
