<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

if (!defined('ELEMENTOR_ABSPATH')) {
    define('ELEMENTOR_ABSPATH', _PS_MODULE_DIR_ . 'bitelementor');
}

define('ELEMENTOR_VERSION', '0.9.3');
define('ELEMENTOR_PATH', _PS_MODULE_DIR_ . 'bitelementor' . '/');
define('ELEMENTOR_ASSETS_URL',  _MODULE_DIR_.'bitelementor/views/');

use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;

class BitElementorWpHelper
{
    public static function _e($text, $domain = 'default')
    {
        echo $text;
    }

    public static function __($text, $domain = 'default')
    {
        return $text;
    }

    public static function _x($text, $context, $domain = 'default')
    {
       return $text;
    }

    public static function esc_attr_e($text, $domain = 'default')
    {
        return $text;
    }

    public static function getBitElementorWidgets()
    {
        $widgets = BitElementor::$WIDGETS;
        foreach ($widgets as $key => $widget) {
            $widget = 'BitElementorWidget_'.$widget;
            $instance = new $widget();
            if (!$instance->status) {
                unset($widgets[$key]);
            }
        }
        return $widgets;
    }

    public static function getBitElementorWidgetInstance($name)
    {
        $widget = new $name();
        return $widget;
    }

    public static function renderBitElementorWidget($name, $options)
    {
        $module = Module::getInstanceByName('bitelementor');
        return $module->renderBitElementorWidget($name, $options);
    }

    public static function renderBitElementorWidgetPreview($name, $options)
    {
        $module = Module::getInstanceByName('bitelementor');
        $data = array();

        $widgetLink = Context::getContext()->link->getModuleLink('bitelementor', 'Widget', array(
            'bit_fronteditor_token' =>  $module->getFrontEditorToken(),
            'id_employee' => is_object(Context::getContext()->employee) ? (int) Context::getContext()->employee->id :
                Tools::getValue('id_employee'),
            'ajax'  => 1,
            'action' => 'widgetPreview',
            'widgetName' =>  $name,
        ), true);


        $data['widgetOptions'] = $options;

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ),
        );

        $context  = stream_context_create($options);
        $widgetPreview = Tools::file_get_contents($widgetLink , false, $context);

        return $widgetPreview;
    }

    public static function file_get_contents_curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public static function esc_attr($text)
    {
        return Tools::safeOutput($text);
    }

    public static function wp_parse_args($args, $defaults = '')
    {
        if (is_object($args)) {
            $r = get_object_vars($args);
        } elseif (is_array($args)) {
            $r =& $args;
        } else {
            BitElementorWpHelper::wp_parse_str($args, $r);
        }

        if (is_array($defaults)) {
            return array_merge($defaults, $r);
        }
        return $r;
    }

    public static function wp_parse_str($string, &$array)
    {
        parse_str($string, $array);
        if (get_magic_quotes_gpc()) {
            $array = BitElementorWpHelper::stripslashes_deep($array);
        }
        return $array;
    }

    public static function stripslashes_deep($value)
    {
        return BitElementorWpHelper::map_deep( $value, 'stripslashes_from_strings_only' );
    }

    public static function map_deep($value, $callback)
    {
        if (is_array($value)) {
            foreach ($value as $index => $item) {
                $value[$index] = BitElementorWpHelper::map_deep($item, $callback);
            }
        } elseif (is_object($value)) {
            $object_vars = get_object_vars($value);
            foreach ($object_vars as $property_name => $property_value) {
                $value->$property_name = BitElementorWpHelper::map_deep($property_value, $callback);
            }
        } else {
            $value = call_user_func($callback, $value);
        }

        return $value;
    }

    public static function esc_url($url, $protocols = null, $_context = 'display')
    {
        if ('' == $url) {
            return $url;
        }
        $url = str_replace(' ', '%20', $url);
        $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\[\]\\x80-\\xff]|i', '', $url);
        if ( '' === $url ) {
            return $url;
        }
        $url = str_replace(';//', '://', $url);
        if (strpos($url, ':') === false && !in_array($url[0], array('/', '#', '?')) && !preg_match('/^[a-z0-9-]+?\.php/i', $url)) {
            $url = 'http://' . $url;
        }
        return $url;
    }

    public static function wp_send_json_success($data = null)
    {
        @header( 'Content-Type: application/json; charset=utf-8');
        $response = array( 'success' => true );
        if (isset($data)) {
            $response['data'] = $data;
        }
        die (Tools::jsonEncode($response));
    }

    public static function absint($maybeint)
    {
        return abs(intval($maybeint));
    }

    public static function is_rtl()
    {
        if (Context::getContext()->language->is_rtl) {
            return true;
        }
        return false;
    }

    public static function _doing_it_wrong($function, $message, $version)
    {
        die($function . ' - ' . $message . ' - ' .$version);
    }

    public static function triggerWpError($message)
    {
        die($message);
    }

    public static function get_option($option, $default = false)
    {
        $value = Configuration::get('bitelementor_' . $option);

        if ($value == '') {
            return $default;
        } else {
            $value;
        }
    }

    public static function update_option($option, $value, $autoload = null)
    {
        Configuration::updateValue('bitelementor_'  . $option, $value);
    }

    public static function getImage($image = '')
    {
        if (Validate::isAbsoluteUrl($image)) {
            return $image;
        } else {
            $http = Tools::getCurrentUrlProtocolPrefix();
            return $http.Tools::getMediaServer($image).$image;
        }
    }

    public static function substr($str, $start, $length = false, $encoding = 'utf-8')
    {
        if (is_array($str)) {
            return false;
        }

        return Tools::substr($str, $start, ($length === false ? Tools::strlen($str) : (int) $length));
    }

    public static function ucfirst($str)
    {
        return Tools::ucfirst($str);
    }

    public static function stripslashes($string)
    {
        return Tools::stripslashes($string);
    }

    public static function strtolower($str)
    {
        if (is_array($str)) {
            return false;
        }

        return Tools::strtolower($str);
    }

    public static function getIsset($key)
    {
        return Tools::getIsset($key);
    }

    public static function getValue($key)
    {
        return Tools::getValue($key);
    }

    public static function jsonDecode($data, $assoc = false, $depth = 512, $options = 0)
    {
        return Tools::jsonDecode($data, $assoc, $depth, $options);
    }

    public static function jsonEncode($data, $options = 0, $depth = 512)
    {
        return Tools::jsonEncode($data, $options, $depth);
    }
}
