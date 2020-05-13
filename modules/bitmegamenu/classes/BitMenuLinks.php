<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

class BitMenuLinks
{
    public static function gets($id_lang, $id_shop, $id_bitmenulinks = null)
    {
        $sql = 'SELECT l.id_bitmenulinks, l.new_window, s.name, ll.link, ll.label
				FROM ' . _DB_PREFIX_ . 'bitmenulinks l
				LEFT JOIN ' . _DB_PREFIX_ . 'bitmenulinks_lang ll ON (l.id_bitmenulinks = ll.id_bitmenulinks AND ll.id_lang = ' . (int) $id_lang . ' AND ll.id_shop=' . (int) $id_shop . ')
				LEFT JOIN ' . _DB_PREFIX_ . 'shop s ON l.id_shop = s.id_shop
				WHERE 1 ' . ((!is_null($id_bitmenulinks)) ? ' AND l.id_bitmenulinks = "' . (int) $id_bitmenulinks . '"' : '') . '
				AND l.id_shop IN (0, ' . (int) $id_shop . ')';

        return Db::getInstance()->executeS($sql);
    }

    public static function get($id_bitmenulinks, $id_lang, $id_shop)
    {
        return self::gets($id_lang, $id_shop, $id_bitmenulinks);
    }

    public static function getLinkLang($id_bitmenulinks, $id_shop)
    {
        $ret = Db::getInstance()->executeS('SELECT l.id_bitmenulinks, l.new_window, ll.link, ll.label, ll.id_lang FROM ' . _DB_PREFIX_ . 'bitmenulinks l
			LEFT JOIN ' . _DB_PREFIX_ . 'bitmenulinks_lang ll ON (l.id_bitmenulinks = ll.id_bitmenulinks AND ll.id_shop=' . (int) $id_shop . ')
			WHERE 1
			' . ((!is_null($id_bitmenulinks)) ? ' AND l.id_bitmenulinks = "' . (int) $id_bitmenulinks . '"' : '') . '
			AND l.id_shop IN (0, ' . (int) $id_shop . ')');

        $link = array();
        $label = array();
        $new_window = false;

        foreach ($ret as $line) {
            $link[$line['id_lang']] = Tools::safeOutput($line['link']);
            $label[$line['id_lang']] = Tools::safeOutput($line['label']);
            $new_window = (bool) $line['new_window'];
        }

        return array('link' => $link, 'label' => $label, 'new_window' => $new_window);
    }

    public static function add($link, $label, $id_shop, $newWindow = 0)
    {
        if (!is_array($label)) {
            return false;
        }

        if (!is_array($link)) {
            return false;
        }

        Db::getInstance()->insert(
            'bitmenulinks',
            array(
                'new_window' => (int) $newWindow,
                'id_shop' => (int) $id_shop,
            )
        );

        $id_bitmenulinks = Db::getInstance()->Insert_ID();
        $result = true;

        foreach ($label as $id_lang => $label) {
            $result &= Db::getInstance()->insert(
                'bitmenulinks_lang',
                array(
                    'id_bitmenulinks' => (int) $id_bitmenulinks,
                    'id_lang' => (int) $id_lang,
                    'id_shop' => (int) $id_shop,
                    'label' => pSQL($label),
                    'link' => pSQL($link[$id_lang]),
                )
            );
        }

        return $result;
    }

    public static function update($link, $labels, $id_shop, $id_link, $newWindow = 0)
    {
        if (!is_array($labels)) {
            return false;
        }

        if (!is_array($link)) {
            return false;
        }

        Db::getInstance()->update(
            'bitmenulinks',
            array(
                'new_window' => (int) $newWindow,
                'id_shop' => (int) $id_shop,
            ),
            'id_bitmenulinks = ' . (int) $id_link
        );

        foreach ($labels as $id_lang => $label) {
            Db::getInstance()->update(
                'bitmenulinks_lang',
                array(
                    'id_shop' => (int) $id_shop,
                    'label' => pSQL($label),
                    'link' => pSQL($link[$id_lang]),
                ),
                'id_bitmenulinks = ' . (int) $id_link . ' AND id_lang = ' . (int) $id_lang
            );
        }
        return true;
    }

    public static function remove($id_bitmenulinks, $id_shop)
    {
        $result = true;
        $result &= Db::getInstance()->delete('bitmenulinks', 'id_bitmenulinks = ' . (int) $id_bitmenulinks . ' AND id_shop = ' . (int) $id_shop);
        $result &= Db::getInstance()->delete('bitmenulinks_lang', 'id_bitmenulinks = ' . (int) $id_bitmenulinks);

        return $result;
    }
}
