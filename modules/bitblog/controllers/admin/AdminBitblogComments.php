<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

include_once(_PS_MODULE_DIR_.'bitblog/loader.php');
require_once(_PS_MODULE_DIR_.'bitblog/classes/comment.php');

class AdminBitblogCommentsController extends ModuleAdminController
{
    protected $max_image_size = 1048576;
    protected $position_identifier = 'id_bitblog_blog';

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'bitblog_comment';
        $this->identifier = 'id_comment';
        $this->className = 'BitBlogComment';
        $this->lang = false;

        $this->addRowAction('edit');
        $this->addRowAction('delete');

        if (Tools::getValue('id_bitblog_blog')) {
            # validate module
            $this->_where = ' AND id_bitblog_blog='.(int)Tools::getValue('id_bitblog_blog');
        }
        parent::__construct();

        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?'), 'icon' => 'icon-trash'));

        $this->fields_list = array(
            'id_comment' => array('title' => $this->l('ID'), 'align' => 'center', 'class' => 'fixed-width-xs'),
            'id_bitblog_blog' => array('title' => $this->l('Blog ID'), 'align' => 'center', 'class' => 'fixed-width-xs'),
            'user' => array('title' => $this->l('User')),
            'comment' => array('title' => $this->l('Comment')),
            'date_add' => array('title' => $this->l('Date Added'),'type' => 'datetime'),
            'active' => array('title' => $this->l('Displayed'), 'align' => 'center', 'active' => 'status', 'class' => 'fixed-width-sm', 'type' => 'bool', 'orderby' => false)
        );
    }

    public function initPageHeaderToolbar()
    {
        $link = $this->context->link;

        if (Tools::getValue('id_bitblog_blog')) {
            $this->page_header_toolbar_btn['back-blog'] = array(
                'href' => $link->getAdminLink('AdminBitblogBlogs').'&updatebitblog_blog&id_bitblog_blog='.Tools::getValue('id_bitblog_blog'),
                'desc' => $this->l('Back To The Blog'),
                'icon' => 'icon-blog icon-3x process-icon-blog'
            );
        }
        // if (Tools::getValue('id_comment')) {
            // $this->page_header_toolbar_btn['save-and-stay'] = array(
                // 'short' => 'SaveAndStay',
                // 'href' => '#',
                // 'desc' => $this->l('Save and stay', array(), 'Admin.Actions'),
            // );
        // }
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
        $this->initToolbar();
        $this->initPageHeaderToolbar();

        //$id_bitblogcat = (int) (Tools::getValue('id_bitblogcat'));
        //$obj           = new bitblogcat($id_bitblogcat);
        //$tree          = $obj->getTree();
        //$menus         = $obj->getDropdown(null, $obj->id_parent);

        $blog = new BitBlogBlog($this->object->id_bitblog_blog, $this->context->language->id);

        $this->multiple_fieldsets = true;
        $this->object->blog_title = $blog->meta_title;

        $this->fields_form[0]['form'] = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Blog Form'),
                'icon' => 'icon-folder-close'
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'label' => $this->l('Comment ID'),
                    'name' => 'id_comment',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Blog Title'),
                    'name' => 'blog_title',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('User'),
                    'name' => 'user',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Email'),
                    'name' => 'email',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Blog Content'),
                    'name' => 'comment',
                    'rows' => 5,
                    'cols' => 40,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}'
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

        $this->tpl_form_vars = array(
            'active' => $this->object->active,
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL')
        );
        $html = '
                    <script type="text/javascript">
                        var PS_ALLOW_ACCENTED_CHARS_URL = '.(int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL').';
                    </script>
            ';
        return $html.parent::renderForm();
    }

    public function renderList()
    {
        $this->toolbar_title = $this->l('Comments Management');
        $this->toolbar_btn['new'] = null;

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
        if (Tools::isSubmit('saveandstay')) {
            parent::validateRules();

            if (count($this->errors)) {
                return false;
            }

            if ($id_comment = (int)Tools::getValue('id_comment')) {
                $comment = new BitBlogComment($id_comment);
                $this->copyFromPost($comment, 'comment');

                if (!$comment->update()) {
                    $this->errors[] = $this->l('An error occurred while creating an object.').' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
                } else {
                    Tools::redirectAdmin(self::$currentIndex.'&'.$this->identifier.'='.Tools::getValue('id_comment').'&conf=4&update'.$this->table.'&token='.Tools::getValue('token'));
                }
            } else {
                $this->errors[] = $this->l('An error occurred while creating an object.').' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
            }
        } else {
            parent::postProcess();
        }
    }
}
