<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class BitElementorTemplate extends ObjectModel
{
    public $id;
    public $id_template;
    public $title;
    public $data;

    /**
    * @see ObjectModel::$definition
    */
    public static $definition = array(
        'table' => 'bit_elementor_template',
        'primary' => 'id_template',
        'multilang' => false,
        'fields' => array(
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255),
            'data'  => array('type' => self::TYPE_HTML, 'validate' => 'isJson'),
        )
    );

    public static function getTemplates()
    {
        $sql = 'SELECT * FROM '._DB_PREFIX_.'bit_elementor_template';
        return $results = Db::getInstance()->ExecuteS($sql);
    }
}
