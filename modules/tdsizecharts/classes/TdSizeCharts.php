<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class TdSizeChart extends ObjectModel
{
    public $id_shop;
    public $id_tdadditionaltab;
    public $active;

    public $title;
    public $description;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'tdsizechart',
        'primary' => 'id_tdsizechart',
        'multilang' => true,
        'fields' => array(
            'active' =>            array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),

            // Lang fields
            'title' =>            array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 255),
            'description' =>    array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),

        ),
    );

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);
    }

    public static function getIdByProduct($id_product)
    {
    }

    public function add($autoDate = true, $nullValues = false)
    {
        return parent::add($autoDate, true);
    }

    public function delete()
    {
        $this->deleteCategories();
        $this->deleteProducts();
        $res = true;
        $res &= Db::getInstance()->execute('
            DELETE FROM `'._DB_PREFIX_.'tdsizechart_shop`
            WHERE `id_tdsizechart` = '.(int)$this->id);
        $res &= parent::delete();
        return $res;
    }

    public function update($null_values = false, $position = false)
    {
        if (!$position) {
            if (isset($this->id)) {
                Db::getInstance()->delete('tdsizechart_shop', 'id_tdsizechart = ' . (int) $this->id);
            }
            $this->associateTo($this->id_shop_list);
        }

        return parent::update();
    }

    public static function getCharts()
    {
        $context = Context::getContext();
        $idLang = $context->language->id;

        $items = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
        SELECT *
        FROM '._DB_PREFIX_.'tdsizechart t
        LEFT JOIN '._DB_PREFIX_.'tdsizechart_lang tl ON (t.id_tdsizechart = tl.id_tdsizechart AND tl.id_lang = '.(int) $idLang.')
        '.Shop::addSqlAssociation('tdsizechart', 't').'
        GROUP BY t.id_tdsizechart');

        return $items;
    }

    public static function getChartsByCategoryAndBrand($idCategory, $id_manufacturer)
    {
        $context = Context::getContext();
        $idLang = $context->language->id;



        $items = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
        SELECT *
        FROM '._DB_PREFIX_.'tdsizechart t
        LEFT JOIN '._DB_PREFIX_.'tdsizechart_lang tl ON (t.id_tdsizechart = tl.id_tdsizechart AND tl.id_lang = '.(int) $idLang.')
        '.Shop::addSqlAssociation('tdsizechart', 't').'
        INNER JOIN '._DB_PREFIX_.'tdsizechart_category sc  ON (t.id_tdsizechart = sc.id_tdsizechart AND sc.id_category = '.(int) $idCategory.')
        INNER JOIN '._DB_PREFIX_.'tdsizechart_brand sb  ON (t.id_tdsizechart = sb.id_tdsizechart) where sb.id_manufacturer IN (0, '.(int) $id_manufacturer.')
        GROUP BY t.id_tdsizechart');


        return $items;
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


    public static function getAssociatedIdsShop($id_tdsizechart)
    {
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT ts.`id_shop`
            FROM `'._DB_PREFIX_.'tdsizechart_shop` ts
            WHERE ts.`id_tdsizechart` = '.(int)$id_tdsizechart);
        if (!is_array($result)) {
            return false;
        }
        $return = array();
        foreach ($result as $id_shop) {
            $return[] = (int)$id_shop['id_shop'];
        }
        return $return;
    }

    public function updateCategories($categories)
    {
        $result = Db::getInstance()->executeS('
			SELECT c.`id_category`
			FROM `'._DB_PREFIX_.'tdsizechart_category` cc
			LEFT JOIN `'._DB_PREFIX_.'category` c ON (c.`id_category` = cc.`id_category`)
			'.Shop::addSqlAssociation('category', 'c', true, null, true).'
			WHERE 1
			' . ((!empty($categories)) ? ' AND cc.`id_category` NOT IN ('.implode(',', array_map('intval', $categories)).') ' : ' ') . '
			AND cc.id_tdsizechart = '.(int) $this->id);

        // if none are found, it's an error
        if (!is_array($result)) {
            return false;
        }
        foreach ($result as $categ_to_delete) {
            $this->deleteCategory($categ_to_delete['id_category']);
        }
        if (!$this->addToCategories($categories)) {
            return false;
        }
        return true;
    }

    public function deleteCategory($idCategory)
    {
        $return = Db::getInstance()->delete('tdsizechart_category', 'id_tdsizechart = '.(int)$this->id.' AND id_category = '.(int)$idCategory);
        return $return;
    }

    public function deleteProducts()
    {
        $return = Db::getInstance()->delete('tdsizechart_product', 'id_tdsizechart = '.(int)$this->id);
        return $return;
    }

    public function deleteCategories()
    {
        $return = Db::getInstance()->delete('tdsizechart_category', 'id_tdsizechart = '.(int)$this->id);
        return $return;
    }

    public function addToCategories($categories = array())
    {
        if (empty($categories)) {
            return false;
        }
        if (!is_array($categories)) {
            $categories = array($categories);
        }
        if (!count($categories)) {
            return false;
        }
        $categories = array_map('intval', $categories);
        $currentCategories = self::getChartCategories($this->id);
        $currentCategories = array_map('intval', $currentCategories);

        $chartCats = array();
        foreach ($categories as $newCatId) {
            if (!in_array($newCatId, $currentCategories)) {
                $chartCats[] = array(
                    'id_tdsizechart' => (int)$this->id,
                    'id_category' => (int)$newCatId,
                );
            }
        }
        Db::getInstance()->insert('tdsizechart_category', $chartCats);
        return true;
    }

    public function updateBrands($brands)
    {
        $result = Db::getInstance()->executeS('
			SELECT c.`id_manufacturer`
			FROM `'._DB_PREFIX_.'tdsizechart_brand` cc
			LEFT JOIN `'._DB_PREFIX_.'manufacturer` c ON (c.`id_manufacturer` = cc.`id_manufacturer`)
			'.Shop::addSqlAssociation('manufacturer', 'c', true, null, true).'
			WHERE 1
			' . ((!empty($brands)) ? ' AND cc.`id_manufacturer` NOT IN ('.implode(',', array_map('intval', $brands)).') ' : ' ') . '
			AND cc.id_tdsizechart = '.(int) $this->id);

        // if none are found, it's an error
        if (!is_array($result)) {
            return false;
        }
        $this->deleteBrand(0);
        foreach ($result as $brand_to_delete) {
            $this->deleteBrand($brand_to_delete['id_manufacturer']);
        }
        if (!$this->addToBrands($brands)) {
            return false;
        }
        return true;
    }

    public function deleteBrand($id_manufacturer)
    {
        $return = Db::getInstance()->delete('tdsizechart_brand', 'id_tdsizechart = '.(int)$this->id.' AND id_manufacturer = '.(int)$id_manufacturer);
        return $return;
    }



    public function addToBrands($brands = array())
    {
        if (empty($brands)) {
            return false;
        }
        if (!is_array($brands)) {
            $brands = array($brands);
        }
        if (!count($brands)) {
            return false;
        }
        $brands = array_map('intval', $brands);
        $currentCategories = self::getChartBrands($this->id);
        $currentCategories = array_map('intval', $currentCategories);

        $chartCats = array();
        foreach ($brands as $newCatId) {
            if (!in_array($newCatId, $currentCategories)) {
                $chartCats[] = array(
                    'id_tdsizechart' => (int)$this->id,
                    'id_manufacturer' => (int)$newCatId,
                );
            }
        }
        Db::getInstance()->insert('tdsizechart_brand', $chartCats);
        return true;
    }


    public static function getChartBrands($id = '')
    {
        $cache_id = 'TdSizeChart::getChartBrands_'.(int)$id;
        if (!Cache::isStored($cache_id)) {
            $ret = array();
            $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
				SELECT `id_manufacturer` FROM `'._DB_PREFIX_.'tdsizechart_brand`
				WHERE `id_tdsizechart` = '.(int)$id);
            if ($row) {
                foreach ($row as $val) {
                    $ret[] = $val['id_manufacturer'];
                }
            }
            Cache::store($cache_id, $ret);
            return $ret;
        }
        return Cache::retrieve($cache_id);
    }


    public static function getChartCategories($id = '')
    {
        $cache_id = 'TdSizeChart::getChartCategories_'.(int)$id;
        if (!Cache::isStored($cache_id)) {
            $ret = array();
            $row = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
				SELECT `id_category` FROM `'._DB_PREFIX_.'tdsizechart_category`
				WHERE `id_tdsizechart` = '.(int)$id);
            if ($row) {
                foreach ($row as $val) {
                    $ret[] = $val['id_category'];
                }
            }
            Cache::store($cache_id, $ret);
            return $ret;
        }
        return Cache::retrieve($cache_id);
    }

    public static function assignProduct($idProduct, $id_tdsizechart)
    {
        if (!Validate::isUnsignedInt($idProduct)) {
            return;
        }

        if (!Validate::isUnsignedInt($id_tdsizechart)) {
            return;
        }

        $chartCats = array(
            'id_tdsizechart' => (int)$id_tdsizechart,
            'id_product' => (int)$idProduct,
        );

        self::deleteAssignedProduct($idProduct);
        Db::getInstance()->insert('tdsizechart_product', $chartCats);
    }

    public static function deleteAssignedProduct($idProduct)
    {
        if (!Validate::isUnsignedInt($idProduct)) {
            return;
        }
        Db::getInstance()->delete('tdsizechart_product', 'id_product = '.(int)$idProduct);
    }

    public static function getChartAssignedToProduct($idProduct)
    {
        if (!Validate::isUnsignedInt($idProduct)) {
            return;
        }

        $sql = 'SELECT id_tdsizechart FROM ' . _DB_PREFIX_ . 'tdsizechart_product WHERE id_product = '.(int)$idProduct;
        $row = Db::getInstance()->getRow($sql);

        if ($row != false) {
            $row = $row['id_tdsizechart'];
        } else {
            $row = -1;
        }
        return $row;
    }
}
