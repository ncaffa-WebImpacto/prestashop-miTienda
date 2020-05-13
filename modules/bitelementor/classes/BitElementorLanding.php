<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class BitElementorLanding extends ObjectModel
{
    public $id;
    public $id_bit_elementor_landing;
    public $id_shop;
    public $title;
    // Lang fields
    public $text;
    public $data;

    /**
    * @see ObjectModel::$definition
    */
    public static $definition = array(
        'table' => 'bit_elementor_landing',
        'primary' => 'id_bit_elementor_landing',
        'multilang' => true,
        'fields' => array(
            'id_shop' => array('type' => self::TYPE_NOTHING, 'validate' => 'isUnsignedId'),
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255),
            // Lang fields
            'data' => array('type' => self::TYPE_HTML,  'lang' => true, 'validate' => 'isJson'),
        )
    );

    public static function getLandingPages()
    {
        $sql = new DbQuery();
        $sql->select('id_bit_elementor_landing, title');
        $sql->from('bit_elementor_landing', 'iel');
        $sql->where('iel.id_shop = ' . (int) Context::getContext()->shop->id);
        $sqlResult = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        $landingPages = array();
        foreach ($sqlResult as $p) {
            $landingPages[$p['id_bit_elementor_landing']] = array(
                'id' => $p['id_bit_elementor_landing'],
                'name' => $p['title']
            );
        }

        return $landingPages;
    }
}
