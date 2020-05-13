<?php
/**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    # module validation
    exit;
}

class Bitblogcat extends ObjectModel
{
    public $id;
    public $id_bitblogcat;
    public $image;
    public $icon_class;
    public $id_parent = 1;
    public $is_group = 0;
    public $width;
    public $submenu_width;
    public $colum_width;
    public $submenu_colum_width;
    public $item;
    public $colums = 1;
    public $type;
    public $is_content = 0;
    public $show_title = 1;
    public $type_submenu;
    public $level_depth;
    public $active = 1;
    public $position;
    public $show_sub;
    public $url;
    public $target;
    public $privacy;
    public $position_type;
    public $menu_class;
    public $content;
    public $submenu_content;
    public $level;
    public $left;
    public $right;
    public $date_add;
    public $date_upd;
    # Lang
    public $title;
    public $description;
    public $content_text;
    public $submenu_content_text;
    public $submenu_catids;
    public $is_cattree = 1;
    public $template = '';
    public $meta_keywords = '';
    public $meta_description = '';
    private $shop_url;
    public $link_rewrite;
    private $megaConfig = array();
    private $_editStringCol = '';
    private $_isLiveEdit = true;
    private $_module = null;
    public $id_shop = '';
    public $select_data = array();
    public $randkey;

    public function setModule($module)
    {
        $this->_module = $module;
    }
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'bitblogcat',
        'primary' => 'id_bitblogcat',
        'multilang' => true,
        'fields' => array(
            'image' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName'),
            'id_parent' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'level_depth' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'show_title' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'position' => array('type' => self::TYPE_INT),
            'privacy' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'size' => 6),
            'template' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 200),
            'menu_class' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 25),
            'icon_class' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 125),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            # Lang fields
            'title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 255),
            'content_text' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString', 'required' => false),
            'meta_description' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255, 'required' => false),
            'meta_keywords' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255, 'required' => false),
            'link_rewrite' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128),
            'randkey' => array('type' => self::TYPE_STRING, 'lang' => false, 'size' => 255),
        ),
    );

    public static function findByRewrite($parrams)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $id_shop = (int)Context::getContext()->shop->id;
        $id = 0;
        if (isset($parrams['link_rewrite']) && $parrams['link_rewrite']) {
            $sql = 'SELECT cl.id_bitblogcat FROM '._DB_PREFIX_.'bitblogcat_lang cl';
            $sql .= ' INNER JOIN '._DB_PREFIX_.'bitblogcat_shop cs on cl.id_bitblogcat=cs.id_bitblogcat AND id_shop='.$id_shop;
            $sql .= ' INNER JOIN '._DB_PREFIX_.'bitblogcat      cc on cl.id_bitblogcat=cc.id_bitblogcat AND cl.id_bitblogcat != cc.id_parent';  # FIX : PARENT IS NOT THIS CATEGORY
            //$sql .= ' WHERE id_lang = ' . $id_lang ." AND link_rewrite = '".$parrams['link_rewrite']."'";
            $sql .= " AND link_rewrite = '".pSQL($parrams['link_rewrite'])."'";

            if ($row = Db::getInstance()->getRow($sql)) {
                $id = $row['id_bitblogcat'];
            }
        }
        return new Bitblogcat($id, $id_lang);
    }

    public function add($autodate = true, $null_values = false)
    {
        $this->position = self::getLastPosition((int)$this->id_parent);
        $this->level_depth = $this->calcLevelDepth();
        $id_shop = BitBlogHelper::getIDShop();
        $res = parent::add($autodate, $null_values);
        $sql = 'INSERT INTO `'._DB_PREFIX_.'bitblogcat_shop` (`id_shop`, `id_bitblogcat`)
            VALUES('.(int)$id_shop.', '.(int)$this->id.')';
        $res &= Db::getInstance()->execute($sql);
        $this->cleanPositions($this->id_parent);
        return $res;
    }

    public function update($null_values = false)
    {
        $this->level_depth = $this->calcLevelDepth();
        return parent::update($null_values);
    }

    protected function recursiveDelete(&$to_delete, $id_bitblogcat)
    {
        if (!is_array($to_delete) || !$id_bitblogcat) {
            die(Tools::displayError());
        }

        $result = Db::getInstance()->executeS('
        SELECT `id_bitblogcat`
        FROM `'._DB_PREFIX_.'bitblogcat`
        WHERE `id_parent` = '.(int)$id_bitblogcat);
        foreach ($result as $row) {
            $to_delete[] = (int)$row['id_bitblogcat'];
            $this->recursiveDelete($to_delete, (int)$row['id_bitblogcat']);
        }
    }

    public function delete()
    {
        if ($this->id == 1) {
            return false;
        }
        $this->clearCache();

        // Get children categories
        $to_delete = array((int)$this->id);
        $this->recursiveDelete($to_delete, (int)$this->id);
        $to_delete = array_unique($to_delete);

        // Delete CMS Category and its child from database
        $list = count($to_delete) > 1 ? implode(',', array_map('intval', $to_delete)) : (int)$this->id;
        //delete blog
        //get all blog from category ID
        //$where   = '`id_bitblogcat` IN (' . $list . ')';
        $result_blog = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT `id_bitblog_blog` as id FROM `'._DB_PREFIX_.'bitblog_blog` WHERE `id_bitblogcat` IN ('.pSQL($list).')');
        foreach ($result_blog as $value) {
            $blog = new BitBlogBlog($value['id']);
            $blog->delete();
        }


        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'bitblogcat` WHERE `id_bitblogcat` IN ('.pSQL($list).')');
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'bitblogcat_shop` WHERE `id_bitblogcat` IN ('.pSQL($list).')');
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'bitblogcat_lang` WHERE `id_bitblogcat` IN ('.pSQL($list).')');
        bitblogcat::cleanPositions($this->id_parent);
        return true;
    }

    public static function countCats()
    {
        $row = Db::getInstance()->executeS('SELECT COUNT(id_bitblogcat) as total FROM `'._DB_PREFIX_.'bitblogcat` WHERE  id_bitblogcat!=1 AND 1=1');
        return $row[0]['total'];
    }

    public function deleteSelection($menus)
    {
        $return = 1;
        foreach ($menus as $id_bitblogcat) {
            $obj_menu = new Bitblogcat($id_bitblogcat);
            $return &= $obj_menu->delete();
        }
        return $return;
    }

    public function calcLevelDepth()
    {
        $parentbitblogcat = new Bitblogcat($this->id_parent);
        if (!$parentbitblogcat) {
            die('parent Menu does not exist');
        }
        return $parentbitblogcat->level_depth + 1;
    }

    public function updatePosition($way, $position)
    {
        $sql = 'SELECT cp.`id_bitblogcat`, cp.`position`, cp.`id_parent`
            FROM `'._DB_PREFIX_.'bitblogcat` cp
            WHERE cp.`id_parent` = '.(int)$this->id_parent.'
            ORDER BY cp.`position` ASC';
        !$res = Db::getInstance()->executeS($sql);
        if ($res) {
            return false;
        }

        foreach ($res as $menu) {
            if ((int)$menu['id_bitblogcat'] == (int)$this->id) {
                $moved_menu = $menu;
            }
        }

        if (!isset($moved_menu) || !isset($position)) {
            return false;
        }
        // < and > statements rather than BETWEEN operator
        // since BETWEEN is treated differently according to databases
        return (Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'bitblogcat`
            SET `position`= `position` '.($way ? '- 1' : '+ 1').'
            WHERE `position`
            '.($way ? '> '.(int)$moved_menu['position'].' AND `position` <= '.(int)$position : '< '.(int)$moved_menu['position'].' AND `position` >= '.(int)$position).'
            AND `id_parent`='.(int)$moved_menu['id_parent']) && Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'bitblogcat`
            SET `position` = '.(int)$position.'
            WHERE `id_parent` = '.(int)$moved_menu['id_parent'].'
            AND `id_bitblogcat`='.(int)$moved_menu['id_bitblogcat']));
    }

    public static function cleanPositions($id_parent)
    {
        $result = Db::getInstance()->executeS('
        SELECT `id_bitblogcat`
        FROM `'._DB_PREFIX_.'bitblogcat`
        WHERE `id_parent` = '.(int)$id_parent.'
        ORDER BY `position`');
        $sizeof = count($result);
        for ($i = 0; $i < $sizeof; ++$i) {
            $sql = '
            UPDATE `'._DB_PREFIX_.'bitblogcat`
            SET `position` = '.(int)$i.'
            WHERE `id_parent` = '.(int)$id_parent.'
            AND `id_bitblogcat` = '.(int)$result[$i]['id_bitblogcat'];
            Db::getInstance()->execute($sql);
        }
        return true;
    }

    public static function getLastPosition($id_parent)
    {
        return (Db::getInstance()->getValue('SELECT MAX(position)+1 FROM `'._DB_PREFIX_.'bitblogcat` WHERE `id_parent` = '.(int)$id_parent));
    }

    public function getInfo($id_bitblogcat, $id_lang = null, $id_shop = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        if (!$id_shop) {
            $id_shop = Context::getContext()->shop->id;
        }
        $sql = 'SELECT m.*, md.title, md.description, md.content_text
                FROM '._DB_PREFIX_.'megamenu m
                LEFT JOIN '._DB_PREFIX_.'bitblogcat_lang md ON m.id_bitblogcat = md.id_bitblogcat AND md.id_lang = '.(int)$id_lang
                .' JOIN '._DB_PREFIX_.'bitblogcat_shop bs ON m.id_bitblogcat = bs.id_bitblogcat AND bs.id_shop = '.(int)($id_shop);
        $sql .= ' WHERE m.id_bitblogcat='.(int)$id_bitblogcat;

        return Db::getInstance()->executeS($sql);
    }

    public function getChild($id_bitblogcat = null, $id_lang = null, $id_shop = null, $active = false)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        if (!$id_shop) {
            $id_shop = Context::getContext()->shop->id;
        }

        $sql = ' SELECT m.*, md.*
                FROM '._DB_PREFIX_.'bitblogcat m
                LEFT JOIN '._DB_PREFIX_.'bitblogcat_lang md ON m.id_bitblogcat = md.id_bitblogcat AND md.id_lang = '.(int)$id_lang
                .' JOIN '._DB_PREFIX_.'bitblogcat_shop bs ON m.id_bitblogcat = bs.id_bitblogcat AND bs.id_shop = '.(int)($id_shop);
        if ($active) {
            $sql .= ' WHERE m.`active`=1 ';
        }

        if ($id_bitblogcat != null) {
            # validate module
            $sql .= ' WHERE id_parent='.(int)$id_bitblogcat;
        }
        $sql .= ' ORDER BY `position` ';
        return Db::getInstance()->executeS($sql);
    }

    public function getAllChild($id_bitblogcat = null, $id_lang = null, $id_shop = null, $active = false)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        if (!$id_shop) {
            $id_shop = Context::getContext()->shop->id;
        }

        $sql = ' SELECT m.id_bitblogcat AS id_category, m.id_parent, md.title AS name
                FROM '._DB_PREFIX_.'bitblogcat m
                LEFT JOIN '._DB_PREFIX_.'bitblogcat_lang md ON m.id_bitblogcat = md.id_bitblogcat AND md.id_lang = '.(int)$id_lang
                .' JOIN '._DB_PREFIX_.'bitblogcat_shop bs ON m.id_bitblogcat = bs.id_bitblogcat AND bs.id_shop = '.(int)($id_shop);
        if ($active) {
            $sql .= ' WHERE m.`active`=1 ';
        }

        if ($id_bitblogcat != null) {
            # validate module
            $sql .= ' WHERE id_parent='.(int)$id_bitblogcat;
        }
        $sql .= ' ORDER BY `position` ';
        return Db::getInstance()->executeS($sql);
    }

    public function hasChild($id)
    {
        return isset($this->children[$id]);
    }

    public function getNodes($id)
    {
        return $this->children[$id];
    }

    public function getTree($id = null)
    {
        $childs = $this->getChild($id);

        foreach ($childs as $child) {
            # validate module
            $this->children[$child['id_parent']][] = $child;
        }
        $parent = 1;
        $output = $this->genTree($parent, 1);
        return $output;
    }

    public function getDropdown($id, $selected = 1)
    {
        $this->children = array();
        $childs = $this->getChild($id);
        foreach ($childs as $child) {
            # validate module
            $this->children[$child['id_parent']][] = $child;
        }
        $output = array(array('id' => '1', 'title' => 'Root', 'selected' => ''));
        $output = $this->genOption(1, 1, $selected, $output);

        return $output;
    }

    /**
     * @param int $level (default 0 )
     * @param type $output ( default array )
     * @param type $output
     */
    public function genOption($parent, $level, $selected, $output)
    {
        # module validation
        !is_null($level) ? $level : $level = 0;
        is_array($output) ? true : $output = array();

        if ($this->hasChild($parent)) {
            $data = $this->getNodes($parent);
            foreach ($data as $menu) {
                //$select = $selected == $menu['id_bitblogcat'] ? 'selected="selected"' : "";
                $output[] = array('id' => $menu['id_bitblogcat'], 'title' => str_repeat('-', $level).' '.$menu['title'].' (ID:'.$menu['id_bitblogcat'].')', 'selected' => $selected);
                if ($menu['id_bitblogcat'] != $parent) {
                    $output = $this->genOption($menu['id_bitblogcat'], $level + 1, $selected, $output);
                }
            }
        }
        return $output;
    }

    public function genTree($parent, $level)
    {
        if ($this->hasChild($parent)) {
            $data = $this->getNodes($parent);
            $t = $level == 1 ? ' sortable' : '';
            $output = '<ol class="level'.$level.$t.' ">';

            foreach ($data as $menu) {
                $cls = Tools::getValue('id_bitblogcat') == $menu['id_bitblogcat'] ? 'selected' : '';
                $output .= '<li id="list_'.$menu['id_bitblogcat'].'" class="'.$cls.'">
                <div><span class="disclose"><span></span></span>'.($menu['title'] ? $menu['title'] : '').' (ID:'.$menu['id_bitblogcat'].') <span class="quickedit" rel="id_'.$menu['id_bitblogcat'].'">E</span><span class="quickdel" rel="id_'.$menu['id_bitblogcat'].'">D</span></div>';
                if ($menu['id_bitblogcat'] != $parent) {
                    $output .= $this->genTree($menu['id_bitblogcat'], $level + 1);
                }
                $output .= '</li>';
            }

            $output .= '</ol>';
            return $output;
        }
        return false;
    }

    public function getFrontEndTree($id, $helper)
    {
        $childs = $this->getChild(null);

        foreach ($childs as $child) {
            # validate module
            $this->children[$child['id_parent']][] = $child;
        }

        $parent = $id;
        $output = $this->genFontEndTree($parent, 1, $helper);

        return $output;
    }

    public function genFontEndTree($parent, $level, $helper)
    {
        if ($this->hasChild($parent)) {
            $data = $this->getNodes($parent);
            $t = $level == 1 ? ' tree dhtml' : ' collapse';
            $id_sub = '';
            if ($level != 1) {
                $id_sub = 'sub_'.$parent;
                $output = '<ul id="'.$id_sub.'" class="category-sub-menu level'.$level.$t.' ">';
            } else {
                $output = '<ul class="category-sub-menu level'.$level.$t.' ">';
            }
            foreach ($data as $menu) {
                $params = array(
                    'rewrite' => $menu['link_rewrite'],
                    'id' => $menu['id_bitblogcat']
                );

                $category_link = $helper->getBlogCatLink($params);

                $cls = Tools::getValue('id_bitblogcat') == $menu['id_bitblogcat'] ? 'selected' : '';
                $output .= '<li id="list_'.$menu['id_bitblogcat'].'" class="'.$cls.' '.$menu['menu_class'].'"><a href="'.$category_link.'" title="'.$menu['title'].'">';
                if ($menu['icon_class']) {
                    $output .= '<i class="'.$menu['icon_class'].'"></i>';
                }
                $output .= '<span>'.$menu['title'].'</span></a> ';

                if ($menu['id_bitblogcat'] != $parent) {
                    # validate module
                    if ($this->hasChild($menu['id_bitblogcat'])) {
                        $output .= '<i class="material-icons icon-collapse cursor-pointer" data-toggle="collapse" data-target="#sub_'.$menu['id_bitblogcat'].'">&#xE313;</i>';
                    }

                    $output .= $this->genFontEndTree($menu['id_bitblogcat'], $level + 1, $helper);
                }
                $output .= '</li>';
            }

            $output .= '</ul>';
            return $output;
        }
        return false;
    }

    public static function autoCreateKey()
    {
        $sql = 'SELECT '.self::$definition['primary'].' FROM '._DB_PREFIX_.bqSQL(self::$definition['table']).
                ' WHERE randkey IS NULL OR randkey = ""';

        $rows = Db::getInstance()->executes($sql);
        foreach ($rows as $row) {
            $mod_group = new Bitblogcat((int)$row[self::$definition['primary']]);
            include_once(_PS_MODULE_DIR_.'bitblog/libs/Helper.php');
            $mod_group->randkey = BitBlogHelper::genKey();
            try {
                # Try caught to remove validate
                $mod_group->update();
            } catch (Exception $exc) {
            }
        }
    }
}
