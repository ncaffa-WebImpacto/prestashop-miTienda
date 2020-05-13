<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2017 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class TdAdditionalTab extends ObjectModel
{
    public $id_shop;
    public $id_tdadditionaltab;
    public $id_product;
    public $position;
    public $active;

    public $title;
    public $description;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'tdadditionaltab',
        'primary' => 'id_tdadditionaltab',
        'multilang' => true,
        'fields' => array(
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'active' =>   array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'position' =>        array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            // Lang fields
            'title' =>            array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 255),
            'description' =>    array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),

        ),
    );

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);
    }

    public static function getIdByProduct($idProduct)
    {
        if (!Validate::isUnsignedInt($idProduct)) {
            return;
        }

        $sql = 'SELECT id_tdadditionaltab FROM ' . _DB_PREFIX_ . 'tdadditionaltab WHERE id_product = ' . (int) $idProduct;
        $return = Db::getInstance()->getValue($sql);

        return $return;
    }

    public function add($autoDate = true, $nullValues = false)
    {
        $this->position = TdAdditionalTab::getLastPosition((int) $this->id_product);
        return parent::add($autoDate, true);
    }

    public function delete()
    {
        $res = true;
        $res &= Db::getInstance()->execute('
            DELETE FROM `'._DB_PREFIX_.'tdadditionaltab_shop`
            WHERE `id_tdadditionaltab` = '.(int)$this->id);
        $res &= parent::delete();
        return $res;
    }

    public function update($null_values = false, $position = false)
    {
        if (!$position) {
            if (isset($this->id)) {
                Db::getInstance()->delete('tdadditionaltab_shop', 'id_tdadditionaltab = ' . (int) $this->id);
            }
            $this->associateTo($this->id_shop_list);
        }

        return parent::update();
    }

    public static function getTabs($where = 'all', $idProduct = 0, $active = false, $idLang = null)
    {
        if (!Validate::isUnsignedInt($idProduct)) {
            return;
        }

        $context = Context::getContext();

        if (is_null($idLang)) {
            $idLang = $context->language->id;
        }

        $whereSql = '';
        switch ($where) {
            case 'all':
                $whereSql = '(t.id_product = 0 OR t.id_product = '.(int) $idProduct.')';
                break;
            case 'product':
                $whereSql = '(t.id_product = '.(int) $idProduct.')';
                break;
            case 'global':
                $whereSql = '(t.id_product = 0)';
                break;
        }

        $tabs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
        SELECT *
        FROM '._DB_PREFIX_.'tdadditionaltab t
        LEFT JOIN '._DB_PREFIX_.'tdadditionaltab_lang tl ON (t.id_tdadditionaltab = tl.id_tdadditionaltab AND tl.id_lang = '.(int) $idLang.')
        '.Shop::addSqlAssociation('tdadditionaltab', 't').'
        WHERE '. $whereSql . ($active ? ' AND t.`active` = 1 ' : '') . ' GROUP BY t.id_tdadditionaltab
        ORDER BY t.`position`');

        return $tabs;
    }

    public static function getIdTabs($where = 'all', $idProduct = 0, $active = false)
    {
        if (!Validate::isUnsignedInt($idProduct)) {
            return;
        }

        $whereSql = '';
        switch ($where) {
            case 'all':
                $whereSql = '(t.id_product = 0 OR t.id_product = '.(int) $idProduct.')';
                break;
            case 'product':
                $whereSql = '(t.id_product = '.(int) $idProduct.')';
                break;
            case 'global':
                $whereSql = '(t.id_product = 0)';
                break;
        }

        $tabs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
        SELECT t.id_tdadditionaltab
        FROM '._DB_PREFIX_.'tdadditionaltab t
        '.Shop::addSqlAssociation('tdadditionaltab', 't').'
        WHERE '. $whereSql . ($active ? ' AND t.`active` = 1 ' : '') . ' GROUP BY t.id_tdadditionaltab
        ORDER BY t.`position`');

        return $tabs;
    }

    public function copyFromPost()
    {
        /* Classical fields */
        foreach ($_POST as $key => $value) {
            if (array_key_exists($key, $this) and $key != 'id_'.self::$definition['table']) {
                $this->{$key} = $value;
            }
        }

        /* Multilingual fields */
        $class_vars = get_class_vars(get_class($this));
        $fields = array();
        if (isset($class_vars['definition']['fields'])) {
            $fields = $class_vars['definition']['fields'];
        }
        foreach ($fields as $field => $params) {
            if (array_key_exists('lang', $params) && $params['lang']) {
                foreach (Language::getIDs(false) as $id_lang) {
                    if (Tools::isSubmit($field.'_'.(int)$id_lang)) {
                        $this->{$field}[(int)$id_lang] = Tools::getValue($field.'_'.(int)$id_lang);
                    }
                }
            }
        }
    }

    public function copyFromAjax($formFields)
    {
        /* Classical fields */
        foreach ($formFields as $key => $value) {
            if (array_key_exists($key, $this) and $key != 'id_'.self::$definition['table']) {
                $this->{$key} = $value;
            }
        }

        /* Multilingual fields */
        $class_vars = get_class_vars(get_class($this));
        $fields = array();
        if (isset($class_vars['definition']['fields'])) {
            $fields = $class_vars['definition']['fields'];
        }
        foreach ($fields as $field => $params) {
            if (array_key_exists('lang', $params) && $params['lang']) {
                foreach (Language::getIDs(false) as $id_lang) {
                    if (isset($formFields[$field.'_'.(int)$id_lang])) {
                        $this->{$field}[(int)$id_lang] = $formFields[$field.'_'.(int)$id_lang];
                    }
                }
            }
        }
    }

    public static function getLastPosition($idProduct)
    {
        $sql = '
        SELECT MAX(position) + 1
        FROM `'._DB_PREFIX_.'tdadditionaltab`
        WHERE `id_product` = '.(int) $idProduct;
        return (Db::getInstance()->getValue($sql));
    }

    public static function updatePositions($tabs)
    {
        foreach ($tabs as $position => $id_tdadditionaltab) {
            $res = Db::getInstance()->execute('
                UPDATE `'._DB_PREFIX_.'tdadditionaltab` SET `position` = '.(int)$position.'
                WHERE `id_tdadditionaltab` = '.(int) $id_tdadditionaltab);
        }
    }

    public static function getAssociatedIdsShop($id_tdadditionaltab)
    {
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT ts.`id_shop`
            FROM `'._DB_PREFIX_.'tdadditionaltab_shop` ts
            WHERE ts.`id_tdadditionaltab` = '.(int)$id_tdadditionaltab);
        if (!is_array($result)) {
            return false;
        }
        $return = array();
        foreach ($result as $id_shop) {
            $return[] = (int)$id_shop['id_shop'];
        }
        return $return;
    }
}
