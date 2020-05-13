<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

include_once(_PS_MODULE_DIR_.'bitblog/loader.php');

class AdminBitblogBlogsController extends ModuleAdminController
{
    // print_r(Configuration::get('PS_PRODUCT_PICTURE_MAX_SIZE'));die();
    //protected $max_image_size = 1048576;
    // print_r(Configuration::get('PS_PRODUCT_PICTURE_MAX_SIZE'));die();
    protected $max_image_size;
    protected $position_identifier = 'id_bitblog_blog';

    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
        $this->table = 'bitblog_blog';
        //$this->list_id = 'id_bitblog_blog';        // must be set same value $this->table to delete multi rows
        $this->identifier = 'id_bitblog_blog';
        $this->className = 'BitBlogBlog';
        $this->lang = true;
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?'), 'icon' => 'icon-trash'));
        $this->fields_list = array(
            'id_bitblog_blog' => array('title' => $this->l('ID'), 'align' => 'center', 'class' => 'fixed-width-xs'),
            'meta_title' => array('title' => $this->l('Blog Title'), 'filter_key' => 'b!meta_title'),
            'author_name' => array('title' => $this->l('Author Name'), 'filter_key' => 'a!author_name'),
            'title' => array('title' => $this->l('Category Title'), 'filter_key' => 'cl!title'),
            'active' => array('title' => $this->l('Displayed'), 'align' => 'center', 'active' => 'status', 'class' => 'fixed-width-sm', 'type' => 'bool', 'orderby' => true),
            'date_add' => array('title' => $this->l('Date Create'), 'type' => 'date', 'filter_key' => 'a!date_add'),
            'date_upd' => array('title' => $this->l('Date Update'), 'type' => 'datetime', 'filter_key' => 'a!date_upd')

        );
        $this->max_image_size = Configuration::get('PS_PRODUCT_PICTURE_MAX_SIZE');
        $this->_select .= ' cl.title ';
        $this->_join .= ' LEFT JOIN '._DB_PREFIX_.'bitblogcat c ON a.id_bitblogcat = c.id_bitblogcat
                                  LEFT JOIN '._DB_PREFIX_.'bitblogcat_lang cl ON cl.id_bitblogcat=c.id_bitblogcat AND cl.id_lang=b.id_lang
                ';
        if (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $this->_join .= ' INNER JOIN `'._DB_PREFIX_.'bitblog_blog_shop` sh ON (sh.`id_bitblog_blog` = b.`id_bitblog_blog` AND sh.id_shop = '.(int)Context::getContext()->shop->id.') ';
        }
        $this->_where = '';
        $this->_group = ' GROUP BY (a.id_bitblog_blog) ';
        // $this->_orderBy = 'a.position';
        $this->_orderBy = 'a.id_bitblog_blog';
        $this->_orderWay = 'DESC';
    }

    public function initPageHeaderToolbar()
    {
        $link = $this->context->link;
        if (Tools::getValue('id_bitblog_blog')) {
            $helper = BitBlogHelper::getInstance();
            $blog_obj = new BitBlogBlog(Tools::getValue('id_bitblog_blog'), $this->context->language->id);
            // print_r($blog_obj);die();
            $this->page_header_toolbar_btn['view-blog-preview'] = array(
                'href' => $helper->getBlogLink(get_object_vars($blog_obj)),
                'desc' => $this->l('Preview Blog'),
                'icon' => 'icon-preview bitblog-comment-link-icon icon-3x process-icon-preview',
                'target' => '_blank',
            );

            $this->page_header_toolbar_btn['view-blog-comment'] = array(
                'href' => $link->getAdminLink('AdminBitblogComments').'&id_bitblog_blog='.Tools::getValue('id_bitblog_blog'),
                'desc' => $this->l('Manage Comments'),
                'icon' => 'icon-comment bitblog-comment-link-icon icon-3x process-icon-comment',
                'target' => '_blank',
            );
        }

        // if (Tools::getValue('id_bitblog_blog')) {
            // $save_and_stay_link = self::$currentIndex.'&id_bitblog_blog='.Tools::getValue('id_bitblog_blog').'&updatebitblog_blog&token='.$this->token.'&saveandstay=1';
        // }
        // else
        // {
            // $save_and_stay_link = self::$currentIndex.'&add'.$this->table.'&token='.$this->token.'&saveandstay=1';
        // }
        // $this->page_header_toolbar_btn['save-and-stay'] = array(
            // 'short' => 'SaveAndStay',
            // 'href' => $save_and_stay_link,
            // 'desc' => $this->l('Save and stay', array(), 'Admin.Actions'),
        // );

        return parent::initPageHeaderToolbar();
    }

    public function renderForm()
    {
        if (!$this->loadObject(true)) {
            if (Validate::isLoadedObject($this->object)) {
                $this->display = 'edit';
            } else {
                $this->display = 'add';
            }
        }
        // echo '<pre>';
        // print_r($this->object);die();
        $this->initToolbar();
        $this->initPageHeaderToolbar();

        $id_bitblogcat = (int)(Tools::getValue('id_bitblogcat'));
        // print_r($id_bitblogcat);die();
        $obj = new bitblogcat($id_bitblogcat);
//        $tree = $obj->getTree();    # validate module
        $obj->getTree();
        $menus = $obj->getDropdown(null, $obj->id_parent, false);
        // echo '<pre>';
        // print_r($menus);die();
        array_shift($menus);

        $id_shop = (int)Context::getContext()->shop->id;
        $url = _PS_BASE_URL_;
        if (Tools::usingSecureMode()) {
            # validate module
            $url = _PS_BASE_URL_SSL_;
        }
        // echo '<pre>';
        // print_r($menus);die();
        if ($this->object->image) {
            # validate module
            $thumb = $url._THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/b/'.$this->object->image;
        } else {
            # validate module
            $thumb = '';
        }
        // echo '<pre>';
        // print_r($this->context->employee);

        $default_author_name = '';
        // print_r($this->context->employee->firstname);
        // print_r($this->context->employee->lastname);

        if (isset($this->context->employee->firstname) && isset($this->context->employee->lastname)) {
            $default_author_name = $this->context->employee->firstname.' '.$this->context->employee->lastname;
        }

        if ($this->object->id == '') {
            $this->object->author_name = $default_author_name;
        }
        // print_r($default_author_name);
        // die();

        if ($this->object->thumb) {
            # validate module
            $thumb_img = $url._THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/b/'.$this->object->thumb;
        } else {
            # validate module
            $thumb_img = '';
        }

        $this->multiple_fieldsets = true;

        $this->fields_form[0]['form'] = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Blog Form'),
                'icon' => 'icon-folder-close'
            ),
            'input' => array(
                // custom template

                array(
                    'type' => 'select',
                    'label' => $this->l('Category'),
                    'name' => 'id_bitblogcat',
                    'options' => array('query' => $menus,
                        'id' => 'id',
                        'name' => 'title'),
                    'default' => $id_bitblogcat,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Meta title:'),
                    'name' => 'meta_title',
                    'id' => 'name', // for copyMeta2friendlyURL compatibility
                    'lang' => true,
                    'required' => true,
                    'class' => 'copyMeta2friendlyURL',
                    'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Friendly URL'),
                    'name' => 'link_rewrite',
                    'required' => true,
                    'lang' => true,
                    'hint' => $this->l('Only letters and the minus (-) character are allowed')
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Tags'),
                    'name' => 'tags',
                    'lang' => true,
                    'hint' => array(
                        $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                        $this->l('To add "tags" click in the field, write something, and then press "Enter."')
                    )
                ),
                array(
                    'type' => 'hidden',
                    'label' => $this->l('Image Name:'),
                    'name' => 'image',
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Image'),
                    'name' => 'image_link',
                    'display_image' => true,
                    'default' => '',
                    'desc' => $this->l('Max file size is: ').($this->max_image_size/1024/1024). 'MB',
                    'thumb' => $thumb,
                    // 'image' => $thumb,
                    // 'delete_url' => self::$currentIndex.'&'.$this->identifier.'=a&token='.$this->token.'&deleteImage=1',
                    'class' => 'bitblog_image_upload',
                ),
                array(
                    'type' => 'hidden',
                    'label' => $this->l('Thumb Name:'),
                    'name' => 'thumb',
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Thumb image'),
                    'name' => 'thumb_link',
                    'display_image' => true,
                    'default' => '',
                    'desc' => $this->l('Max file size is: ').($this->max_image_size/1024/1024). 'MB',
                    'thumb' => $thumb_img,
                    // 'image' => $thumb_img,
                    // 'delete_url' => self::$currentIndex.'&'.$this->identifier.'=a&token='.$this->token.'&deleteImage=1',
                    'class' => 'bitblog_image_upload',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Video Code'),
                    'name' => 'video_code',
                    'rows' => 5,
                    'cols' => 30,
                    'hint' => $this->l('Enter Video Code Copying From Youtube, Vimeo').' <>;=#{}'
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Blog description'),
                    'name' => 'description',
                    'autoload_rte' => true,
                    'lang' => true,
                    'rows' => 5,
                    'cols' => 30,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Blog Content'),
                    'name' => 'content',
                    'autoload_rte' => true,
                    'lang' => true,
                    'rows' => 5,
                    'cols' => 40,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Author Name'),
                    'name' => 'author_name',
                    'desc' => $this->l('Name of author will display on front-end')
                ),
                array(
                    'type' => 'date_bitblog',
                    'label' => $this->l('Date Create'),
                    'name' => 'date_add',
                    'default' => date('Y-m-d'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Indexation (by search engines):'),
                    'name' => 'indexation',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'indexation_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'indexation_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Displayed:'),
                    'name' => 'active',
                    'required' => false,
                    'is_bool' => true,
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
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
            ),
            'buttons' => array(
                'save_and_preview' => array(
                    'name' => 'saveandstay',
                    'type' => 'submit',
                    'title' => $this->l('Save and stay'),
                    'class' => 'btn btn-default pull-right',
                    'icon' => 'process-icon-save-and-stay'
                )
            )


        );

        $this->fields_form[1]['form'] = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('SEO'),
                'icon' => 'icon-folder-close'
            ),
            'input' => array(
                // custom template
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Meta description'),
                    'name' => 'meta_description',
                    'lang' => true,
                    'cols' => 40,
                    'rows' => 10,
                    'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}'
                ),
                array(
                    'type' => 'tags',
                    'label' => $this->l('Meta keywords'),
                    'name' => 'meta_keywords',
                    'lang' => true,
                    'hint' => array(
                        $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                        $this->l('To add "tags" click in the field, write something, and then press "Enter."')
                    )
                ),
            )
        );

        /*         if (Shop::isFeatureActive()) {
          $this->fields_form['input'][] = array(
          'type' => 'shop',
          'label' => $this->l('Shop association:'),
          'name' => 'checkBoxShopAsso',
          );
          }
         */
        $this->tpl_form_vars = array(
            'active' => $this->object->active,
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL')
        );
        $html = '
                            <script type="text/javascript">
                                var PS_ALLOW_ACCENTED_CHARS_URL = '.(int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL').';
                                var bitblog_del_img_txt = "'.$this->l('Delete').'";
                                var bitblog_del_img_mess = "'.$this->l('Are you sure delete this?').'";
                            </script>
                    ';
        return $html.parent::renderForm();
    }

    public function renderList()
    {
        $this->toolbar_title = $this->l('Blogs Management');
        $this->toolbar_btn['new'] = array(
            // 'href' => self::$currentIndex.'&add'.$this->table.'&id_bitblog_blog_category='.(int)'9'.'&token='.$this->token,
            'href' => self::$currentIndex.'&add'.$this->table.'&token='.$this->token,
            'desc' => $this->l('Add new')
        );

        return parent::renderList();
    }

    public function displayList($token = null)
    {
        /* Display list header (filtering, pagination and column names) */
        $this->displayListHeader($token);

        if (!count($this->_list)) {
            echo '<tr><td class="center" colspan="'.(count($this->fields_list) + 2).'">'.$this->l('No items found').'</td></tr>';
        }

        /* Show the content of the table */
        $this->displayListContent($token);

        /* Close list table and submit button */
        $this->displayListFooter($token);
    }

    public function postProcess()
    {
        if (Tools::isSubmit('viewblog') && ($id_bitblog_blog = (int)Tools::getValue('id_bitblog_blog')) && ($blog = new BitBlogBlog($id_bitblog_blog, $this->context->language->id)) && Validate::isLoadedObject($blog)) {
            $this->redirect_after = $this->getPreviewUrl($blog);
        }

        if (Tools::isSubmit('submitAddbitblog_blog') || Tools::isSubmit('submitAddbitblog_blogAndPreview') || Tools::isSubmit('saveandstay')) {
            if (count($this->errors)) {
                return false;
            }

            parent::validateRules();

            $id_shop = (int)Context::getContext()->shop->id;
            if (!$id_bitblog_blog = (int)Tools::getValue('id_bitblog_blog')) {
                # ADD
                $blog = new BitBlogBlog();
                $this->copyFromPost($blog, 'blog');

                if (isset($_FILES['image_link']) && isset($_FILES['image_link']['tmp_name']) && !empty($_FILES['image_link']['tmp_name'])) {
                    if (!$image = $this->_uploadImage($_FILES['image_link'], '', '')) {
                        return false;
                    }
                    $blog->image = $image;
                }

                if (isset($_FILES['thumb_link']) && isset($_FILES['thumb_link']['tmp_name']) && !empty($_FILES['thumb_link']['tmp_name'])) {
                    if (!$thumb = $this->_uploadImage($_FILES['thumb_link'], '', '', true)) {
                        return false;
                    }
                    $blog->thumb = $thumb;
                }
                $blog->id_employee = $this->context->employee->id;

                if (!$blog->add(false)) {
                    $this->errors[] = $this->l('An error occurred while creating an object.').' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
                } else {
                    # validate module
                    $this->updateAssoShop($blog->id);
                }
            } else {
                # EDIT
                $blog = new BitBlogBlog($id_bitblog_blog);
                $this->copyFromPost($blog, 'blog');

                if (isset($_FILES['image_link']) && isset($_FILES['image_link']['tmp_name']) && !empty($_FILES['image_link']['tmp_name'])) {
                    if (file_exists(_BITBLOG_CACHE_IMG_DIR_.'b/'.$id_shop.'/'.$id_bitblog_blog)) {
                        BitBlogHelper::rrmdir(_BITBLOG_CACHE_IMG_DIR_.'b/'.$id_shop.'/'.$id_bitblog_blog);
                    }
                    if (!$image = $this->_uploadImage($_FILES['image_link'], '', '')) {
                        return false;
                    }
                    // echo 'mmm<pre>';

                    $blog->image = $image;
                }

                if (isset($_FILES['thumb_link']) && isset($_FILES['thumb_link']['tmp_name']) && !empty($_FILES['thumb_link']['tmp_name'])) {
                    if (file_exists(_BITBLOG_CACHE_IMG_DIR_.'b/'.$id_shop.'/'.$id_bitblog_blog)) {
                        BitBlogHelper::rrmdir(_BITBLOG_CACHE_IMG_DIR_.'b/'.$id_shop.'/'.$id_bitblog_blog);
                    }
                    if (!$thumb = $this->_uploadImage($_FILES['thumb_link'], '', '', true)) {
                        return false;
                    }
                    $blog->thumb = $thumb;
                }
                if (!$blog->update()) {
                    $this->errors[] = $this->l('An error occurred while creating an object.').' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
                } else {
                    # validate module
                    $this->updateAssoShop($blog->id);
                }
            }

            if (Tools::isSubmit('submitAddblogAndPreview')) {
                # validate module
                $this->redirect_after = $this->previewUrl($blog);
            } elseif (Tools::isSubmit('saveandstay')) {
                # validate module
                Tools::redirectAdmin(self::$currentIndex.'&'.$this->identifier.'='.$blog->id.'&conf=4&update'.$this->table.'&token='.Tools::getValue('token'));
            } else {
                # validate module
                Tools::redirectAdmin(self::$currentIndex.'&id_bitblogcat='.$blog->id_bitblogcat.'&conf=4&token='.Tools::getValue('token'));
            }
        } else {
            parent::postProcess(true);
        }
    }

    protected function _uploadImage($image, $image_w = null, $image_h = null, $thumb_image = false)
    {
        $res = false;
        $id_shop = (int)Context::getContext()->shop->id;
        BitBlogHelper::buildFolder($id_shop);
        if (is_array($image) && (ImageManager::validateUpload($image, $this->max_image_size) === false) && ($tmp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS')) && move_uploaded_file($image['tmp_name'], $tmp_name)) {
            $type = Tools::strtolower(Tools::substr(strrchr($image['name'], '.'), 1));
            if ($thumb_image) {
                $img_name = 't-'.Tools::strtolower(str_replace('.'.$type, '', $image['name']).'.'.$type);
            } else {
                $img_name = 'b-'.Tools::strtolower(str_replace('.'.$type, '', $image['name']).'.'.$type);
            }

            if (file_exists(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/b/'.$img_name)) {
                @unlink(_PS_THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/b/'.$img_name);
            }
            $image_type = 'jpg';
            if (Configuration::get('BITBLOG_IMAGE_TYPE') != null) {
                $image_type = Configuration::get('BITBLOG_IMAGE_TYPE');
            }
            // Configuration::set('PS_IMAGE_QUALITY', 'png_all');
            Configuration::set('PS_IMAGE_QUALITY', $image_type);
            if (ImageManager::resize($tmp_name, _PS_THEME_DIR_.'assets/img/modules/bitblog/'.$id_shop.'/b/'.$img_name, (int)$image_w, (int)$image_h)) {
                $res = true;
            }
        }

//        if (isset($temp_name))
//                @unlink($tmp_name);
        if (!$res) {
            # validate module
            return false;
        }

        return $img_name;
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);
        $this->addJqueryUi('ui.widget');
        $this->addJqueryPlugin('tagify');

        $this->context->controller->addJS(__PS_BASE_URI__.'modules/bitblog/views/js/admin/form.js');
        $this->context->controller->addCss(__PS_BASE_URI__.'modules/bitblog/views/css/admin/form.css');
    }

    public function ajaxProcessUpdateblogPositions()
    {
        if ($this->tabAccess['edit'] === '1') {
            $id_bitblog_blog = (int)Tools::getValue('id_bitblog_blog');
            $id_category = (int)Tools::getValue('id_bitblog_blog_category');
            $way = (int)Tools::getValue('way');
            $positions = Tools::getValue('blog');
            if (is_array($positions)) {
                foreach ($positions as $key => $value) {
                    $pos = explode('_', $value);
                    if ((isset($pos[1]) && isset($pos[2])) && ($pos[1] == $id_category && $pos[2] == $id_bitblog_blog)) {
                        $position = $key;
                        break;
                    }
                }
            }
            $blog = new blog($id_bitblog_blog);
            if (Validate::isLoadedObject($blog)) {
                if (isset($position) && $blog->updatePosition($way, $position)) {
                    die(true);
                } else {
                    die('{"hasError" : true, "errors" : "Can not update blog position"}');
                }
            } else {
                die('{"hasError" : true, "errors" : "This blog can not be loaded"}');
            }
        }
    }

    public function ajaxProcessUpdateblogCategoriesPositions()
    {
        if ($this->tabAccess['edit'] === '1') {
            $id_bitblog_blog_category_to_move = (int)Tools::getValue('id_bitblog_blog_category_to_move');
            $id_bitblog_blog_category_parent = (int)Tools::getValue('id_bitblog_blog_category_parent');
            $way = (int)Tools::getValue('way');
            $positions = Tools::getValue('blog_category');
            if (is_array($positions)) {
                foreach ($positions as $key => $value) {
                    $pos = explode('_', $value);
                    if ((isset($pos[1]) && isset($pos[2])) && ($pos[1] == $id_bitblog_blog_category_parent && $pos[2] == $id_bitblog_blog_category_to_move)) {
                        $position = $key;
                        break;
                    }
                }
            }
            $blog_category = new blogCategory($id_bitblog_blog_category_to_move);
            if (Validate::isLoadedObject($blog_category)) {
                if (isset($position) && $blog_category->updatePosition($way, $position)) {
                    die(true);
                } else {
                    die('{"hasError" : true, "errors" : "Can not update blog categories position"}');
                }
            } else {
                die('{"hasError" : true, "errors" : "This blog category can not be loaded"}');
            }
        }
    }

    public function ajaxProcessPublishblog()
    {
        if ($this->tabAccess['edit'] === '1') {
            if ($id_bitblog_blog = (int)Tools::getValue('id_bitblog_blog')) {
                $bo_blog_url = dirname($_SERVER['PHP_SELF']).'/index.php?tab=AdminblogContent&id_bitblog_blog='.(int)$id_bitblog_blog.'&updateblog&token='.$this->token;

                if (Tools::getValue('redirect')) {
                    die($bo_blog_url);
                }

                $blog = new blog((int)(Tools::getValue('id_bitblog_blog')));
                if (!Validate::isLoadedObject($blog)) {
                    die('error: invalid id');
                }

                $blog->active = 1;
                if ($blog->save()) {
                    die($bo_blog_url);
                } else {
                    die('error: saving');
                }
            } else {
                die('error: parameters');
            }
        }
    }
}
