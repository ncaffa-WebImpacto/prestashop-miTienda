<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class ClassTdNewsletter extends ObjectModel
{
    const GUEST_NOT_REGISTERED = -1;
    const CUSTOMER_NOT_REGISTERED = 0;
    const GUEST_REGISTERED = 1;
    const CUSTOMER_REGISTERED = 2;

    public $id_tab;
    public $id_shop;
    public $image;
    public $title;
    public $text1;
    public $text2;
    public $date_start;
    public $date_end;

    public static $definition = array(
        'table' => 'tdnewsletter',
        'primary' => 'id_tab',
        'multilang' => true,
        'fields' => array(
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'image' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
            'title' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'text1' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'text2' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'date_start' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_end' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public function delete()
    {
        $res = true;
        $images = $this->image;

        if ($images) {
            foreach ($images as $image) {
                if ($image && file_exists(_PS_MODULE_DIR_.'tdnewsletter/views/img/images/'.$image)) {
                    $res &= @unlink(_PS_MODULE_DIR_.'tdnewsletter/views/img/images/'.$image);
                }
            }
        }

        $res &= parent::delete();
        return $res;
    }

    public function getTopFrontItems($id_shop)
    {
        $now = date('Y-m-d H:i:00');

        $sql = 'SELECT *
                FROM ' . _DB_PREFIX_ . 'tdnewsletter td
                JOIN ' . _DB_PREFIX_ . 'tdnewsletter_lang tdl
                ON td.id_tab = tdl.id_tab
                WHERE tdl.id_lang = '.(int)Context::getContext()->language->id.'
                AND td.`date_end` >= \''.$now.'\'
                AND td.`date_start` <= \''.$now.'\'
                AND td.id_shop ='.(int)$id_shop;

        if (!$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql)) {
            return array();
        }

        return $result;
    }

    public static function isNewsletterRegistered($customer_email)
    {
        $sql = 'SELECT `email`
                FROM '._DB_PREFIX_.'emailsubscription
                WHERE `email` = \''.pSQL($customer_email).'\'
                AND id_shop = '.Context::getContext()->shop->id;

        if (Db::getInstance()->getRow($sql)) {
            return self::GUEST_REGISTERED;
        }

        $sql = 'SELECT `newsletter`
                FROM '._DB_PREFIX_.'customer
                WHERE `email` = \''.pSQL($customer_email).'\'
                AND id_shop = '.Context::getContext()->shop->id;

        if (!$registered = Db::getInstance()->getRow($sql)) {
            return self::GUEST_NOT_REGISTERED;
        }

        if ($registered['newsletter'] == '1') {
            return self::CUSTOMER_REGISTERED;
        }

        return self::CUSTOMER_NOT_REGISTERED;
    }

    public static function registerUser($email)
    {
        $sql = 'UPDATE '._DB_PREFIX_.'customer
                SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL(Tools::getRemoteAddr()).'\'
                WHERE `email` = \''.pSQL($email).'\'
                AND id_shop = '.Context::getContext()->shop->id;

        return Db::getInstance()->execute($sql);
    }


    public static function registerGuest($email, $active = true)
    {
        $sql = 'INSERT INTO '._DB_PREFIX_.'emailsubscription (id_shop, id_shop_group, email, newsletter_date_add, ip_registration_newsletter, http_referer, active)
                VALUES
                ('.Context::getContext()->shop->id.',
                '.Context::getContext()->shop->id_shop_group.',
                \''.pSQL($email).'\',
                NOW(),
                \''.pSQL(Tools::getRemoteAddr()).'\',
                (
                    SELECT c.http_referer
                    FROM '._DB_PREFIX_.'connections c
                    WHERE c.id_guest = '.(int) Context::getContext()->customer->id.'
                    ORDER BY c.date_add DESC LIMIT 1
                ),
                '.(int) $active.'
                )';

        return Db::getInstance()->execute($sql);
    }

    public static function isRegistered($register_status)
    {
        return in_array(
            $register_status,
            array(ClassTdNewsletter::GUEST_REGISTERED, ClassTdNewsletter::CUSTOMER_REGISTERED)
        );
    }

    public static function register($email, $register_status)
    {
        if ($register_status == ClassTdNewsletter::GUEST_NOT_REGISTERED) {
            return ClassTdNewsletter::registerGuest($email);
        }

        if ($register_status == ClassTdNewsletter::CUSTOMER_NOT_REGISTERED) {
            return ClassTdNewsletter::registerUser($email);
        }

        return false;
    }
}
