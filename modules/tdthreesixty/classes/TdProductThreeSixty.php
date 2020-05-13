<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class TdProductThreeSixty extends ObjectModel
{
    public $id_threesixty;
    public $id_product;
    public $content;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'tdthreesixty',
        'primary' => 'id_threesixty',
        'fields' => array(
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'content' => array('type' => self::TYPE_STRING, 'validate' => 'isJson'),
        ),
    );

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);

        if ($this->id) {
            $this->content = Tools::jsonDecode($this->content, true);
        }
    }

    public function add($auto_date = true, $null_values = false)
    {
        if (is_array($this->content)) {
            $this->content = Tools::jsonEncode($this->content);
        }

        $return = parent::add($auto_date, $null_values);
        $this->content = Tools::jsonDecode($this->content, true);
        return $return;
    }

    public function update($auto_date = true, $null_values = false)
    {
        if (is_array($this->content)) {
            $this->content = Tools::jsonEncode($this->content);
        }

        $return = parent::update($auto_date, $null_values);
        $this->content = Tools::jsonDecode($this->content, true);
        return $return;
    }

    public static function getIdByProduct($id_product)
    {
        if (!Validate::isUnsignedInt($id_product)) {
            return;
        }

        $sql = 'SELECT id_threesixty FROM ' . _DB_PREFIX_ . 'tdthreesixty WHERE id_product = ' . (int) $id_product;
        $id_threesixty = Db::getInstance()->getValue($sql);

        return $id_threesixty;
    }
}
