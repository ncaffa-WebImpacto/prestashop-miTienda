<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

include_once(_PS_MODULE_DIR_.'bitblog/loader.php');

class BitblogcategoryModuleFrontController extends ModuleFrontController
{
    public $php_self;
    protected $template_path = '';

    public function __construct()
    {
        parent::__construct();
        $this->context = Context::getContext();
        $this->template_path = _PS_MODULE_DIR_.'bitblog/views/templates/front/';
    }

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        $config = BitBlogConfig::getInstance();

        /* Load Css and JS File */
        BitBlogHelper::loadMedia($this->context, $this);

        //$this->php_self = 'category';

        $this->php_self = 'module-bitblog-category';

        parent::initContent();

        $id_category = (int)Tools::getValue('id');

        $helper = BitBlogHelper::getInstance();

        $limit_leading_blogs = (int)$config->get('listing_leading_limit_items', 1);
        $limit_secondary_blogs = (int)$config->get('listing_secondary_limit_items', 6);

        $limit = (int)$limit_leading_blogs + (int)$limit_secondary_blogs;
        $n = $limit;
        $p = abs((int)(Tools::getValue('p', 1)));
        if ($config->get('url_use_id', 1)) {
            // URL HAVE ID
            $category = new Bitblogcat($id_category, $this->context->language->id);
        } else {
            // REMOVE ID FROM URL
            $url_rewrite = explode('/', $_SERVER['REQUEST_URI']) ;
            $url_last_item = count($url_rewrite) - 1;
            $url_rewrite = rtrim($url_rewrite[$url_last_item], 'html');
            $url_rewrite = rtrim($url_rewrite, '\.');    // result : product.html -> product.
            $category = Bitblogcat::findByRewrite(array('link_rewrite'=>$url_rewrite));
        }

        $template = isset($category->template) && $category->template ? $category->template : $config->get('template', 'default');

        if ($category->id_bitblogcat && $category->active) {
//            $_GET['rewrite'] = $category->link_rewrite;
            $this->template_path .= $template.'/';
            $id_shop = $this->context->shop->id;
            $url = _PS_BASE_URL_;
            if (Tools::usingSecureMode()) {
                # validate module
                $url = _PS_BASE_URL_SSL_;
            }
            if ($category->image) {
                # validate module
                $category->image = $url._THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/c/'.$category->image;
            }

            $blogs = BitBlogBlog::getListBlogs($category->id_bitblogcat, $this->context->language->id, $p, $limit, 'id_bitblog_blog', 'DESC', array(), true);
            $count = BitBlogBlog::countBlogs($category->id_bitblogcat, $this->context->language->id, true);
            $authors = array();

            $leading_blogs = array();
            $secondary_blogs = array();
//            $links        =  array();

            if (count($blogs)) {
                $leading_blogs = array_slice($blogs, 0, $limit_leading_blogs);
                $secondary_blogs = array_splice($blogs, $limit_leading_blogs, count($blogs));
            }
            $image_w = (int)$config->get('listing_leading_img_width', 690);
            $image_h = (int)$config->get('listing_leading_img_height', 300);

            foreach ($leading_blogs as $key => $blog) {
                $blog = BitBlogHelper::buildBlog($helper, $blog, $image_w, $image_h, $config);
                if ($blog['id_employee']) {
                    if (!isset($authors[$blog['id_employee']])) {
                        # validate module
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

            $image_w = (int)$config->get('listing_secondary_img_width', 390);
            $image_h = (int)$config->get('listing_secondary_img_height', 200);

            foreach ($secondary_blogs as $key => $blog) {
                $blog = BitBlogHelper::buildBlog($helper, $blog, $image_w, $image_h, $config);
                if ($blog['id_employee']) {
                    if (!isset($authors[$blog['id_employee']])) {
                        # validate module
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

                $secondary_blogs[$key] = $blog;
            }

            $nb_blogs = $count;
            $range = 2; /* how many pages around page selected */
            if ($p > (($nb_blogs / $n) + 1)) {
                Tools::redirect(preg_replace('/[&?]p=\d+/', '', $_SERVER['REQUEST_URI']));
            }
            $pages_nb = ceil($nb_blogs / (int)($n));
            $start = (int)($p - $range);
            if ($start < 1) {
                $start = 1;
            }
            $stop = (int)($p + $range);
            if ($stop > $pages_nb) {
                $stop = (int)($pages_nb);
            }

            $params = array(
                'rewrite' => $category->link_rewrite,
                'id' => $category->id_bitblogcat
            );

            /* breadcrumb */
            $r = $helper->getPaginationLink('module-bitblog-category', 'category', $params, false, true);
            $path = '';
            $all_cats = array();
            self::parentCategories($category, $all_cats);

            foreach ($all_cats as $key => $cat) {
                if ($cat->id == 1) {
                    # validate module
                    $path .= '<a href="'.$helper->getFontBlogLink().'">'.htmlentities($config->get('blog_link_title_'.$this->context->language->id, 'Blog'), ENT_NOQUOTES, 'UTF-8').'</a><span class="navigation-pipe">'.Configuration::get('PS_NAVIGATION_PIPE').'</span>';
                } elseif ((count($all_cats) - 1) == $key) {
                    # validate module
                    $path .= $cat->title;
                } else {
                    $params = array(
                        'rewrite' => $cat->link_rewrite,
                        'id' => $cat->id
                    );
                    $path .= '<a href="'.$helper->getBlogCatLink($params).'">'.htmlentities($cat->title, ENT_NOQUOTES, 'UTF-8').'</a><span class="navigation-pipe">'.Configuration::get('PS_NAVIGATION_PIPE').'</span>';
                }
            }
            /* sub categories */
            $categories = $category->getChild($category->id_bitblogcat, $this->context->language->id);

            $childrens = array();

            if ($categories) {
                foreach ($categories as $child) {
                    $params = array(
                        'rewrite' => $child['link_rewrite'],
                        'id' => $child['id_bitblogcat']
                    );

                    if ($child['image']) {
                        $child['thumb'] = $url._THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/c/'.$child['image'];
                    }

                    $child['category_link'] = $helper->getBlogCatLink($params);
                    $childrens[] = $child;
                }
            }

            $this->context->smarty->assign(array(
                'leading_blogs' => $leading_blogs,
                'secondary_blogs' => $secondary_blogs,
                'listing_leading_column' => $config->get('listing_leading_column', 1),
                'listing_secondary_column' => $config->get('listing_secondary_column', 3),
                'module_tpl' => $this->template_path,
                'config' => $config,
                'range' => $range,
                'category' => $category,
                'start' => $start,
                'childrens' => $childrens,
                'stop' => $stop,
                'path' => $path,
                'pages_nb' => $pages_nb,
                'nb_items' => $count,
                'p' => (int)$p,
                'n' => (int)$n,
                'meta_title' => Tools::ucfirst($category->title).' - '.Configuration::get('PS_SHOP_NAME'),
                'meta_keywords' => $category->meta_keywords,
                'meta_description' => $category->meta_description,
                'requestPage' => $r['requestUrl'],
                'requestNb' => $r,
                'category' => $category
            ));
        } else {
            $path = '<a href="'.$helper->getFontBlogLink().'">'.htmlentities($config->get('blog_link_title_'.$this->context->language->id, 'Blog'), ENT_NOQUOTES, 'UTF-8').'</a><span class="navigation-pipe">'.Configuration::get('PS_NAVIGATION_PIPE').'</span>';
            $this->context->smarty->assign(array(
                'active' => '0',
                'path' => $path,
                'leading_blogs' => array(),
                'secondary_blogs' => array(),
                'controller' => 'category',
                'category' => $category
            ));
        }


        // $this->setTemplate($template.'/category.tpl');
        $this->setTemplate('module:bitblog/views/templates/front/'.$template.'/category.tpl');
    }

    public static function parentCategories($current, &$return)
    {
        if ($current->id_parent) {
            $obj = new Bitblogcat($current->id_parent, Context::getContext()->language->id);
            self::parentCategories($obj, $return);
        }
        $return[] = $current;
    }

    public function getTemplateVarPage()
    {
        $page = parent::getTemplateVarPage();
        $config = BitBlogConfig::getInstance();
        if ($config->get('url_use_id', 1)) {
            // URL HAVE ID
            $category = new Bitblogcat((int)Tools::getValue('id'), $this->context->language->id);
        } else {
            // REMOVE ID FROM URL
            $url_rewrite = explode('/', $_SERVER['REQUEST_URI']) ;
            $url_last_item = count($url_rewrite) - 1;
            $url_rewrite = rtrim($url_rewrite[$url_last_item], '.html');
            $category = Bitblogcat::findByRewrite(array('link_rewrite' => $url_rewrite));
        }
        $page['meta']['title'] = Tools::ucfirst($category->title).' - '.Configuration::get('PS_SHOP_NAME');
        $page['meta']['keywords'] = $category->meta_keywords;
        $page['meta']['description'] = $category->meta_description;

        return $page;
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $helper = BitBlogHelper::getInstance();
        $link = $helper->getFontBlogLink();
        $config = BitBlogConfig::getInstance();
        $breadcrumb['links'][] = array(
            'title' => $config->get('blog_link_title_'.$this->context->language->id, $this->l('Blog', 'category')),
            'url' => $link,
        );

        if ($config->get('url_use_id', 1)) {
            // URL HAVE ID
            $category = new Bitblogcat((int)Tools::getValue('id'), $this->context->language->id);
        } else {
            // REMOVE ID FROM URL
            $url_rewrite = explode('/', $_SERVER['REQUEST_URI']) ;
            $url_last_item = count($url_rewrite) - 1;
            $url_rewrite = rtrim($url_rewrite[$url_last_item], '.html');
            $category = Bitblogcat::findByRewrite(array('link_rewrite'=>$url_rewrite));
        }

        $params = array(
            'rewrite' => $category->link_rewrite,
            'id' => $category->id_bitblogcat
        );

        $category_link = $helper->getBlogCatLink($params);

        $breadcrumb['links'][] = array(
            'title' => $category->title,
            'url' => $category_link,
        );

        return $breadcrumb;
    }
}
