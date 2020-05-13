<?php
/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

if (!defined('_PS_VERSION_')) {
    exit;
}


class TdThemeSettingsForm
{
    public $module;
    public $cfgName;
    public $systemFonts;
    public $defaults;

    public function __construct()
    {
        $this->cfgName = 'tdopt_';
        $this->module = Module::getInstanceByName('tdthemesettings');
        $this->systemFonts = $this->module->systemFonts;
        $this->defaults = $this->module->defaults;
    }

    public function getGeneralForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('General'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-general'
                ),
                'input' => array(
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('General Layout'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Site Width'),
                        'name' => 'g_layout',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'boxed',
                                    'name' => $this->module->l('Boxed'),
                                ),
                                array(
                                    'id_option' => 'wide',
                                    'name' => $this->module->l('Full Width'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                        'desc' => $this->module->l('You can make your content wrapper boxed or full width'),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Top and bottom margin'),
                        'desc' => $this->module->l('Adds top and bottom margin to main container'),
                        'name' => 'g_margin_tb',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                        'dependency' => array( 'g_layout', '==', 'boxed' ),
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Container box shadow'),
                        'name' => 'g_boxshadow',
                        'size' => 30,
                        'dependency' => array( 'g_layout', '==', 'boxed' ),
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Container border'),
                        'name' => 'g_border',
                        'size' => 30,
                        'dependency' => array( 'g_layout', '==', 'boxed' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Container max width'),
                        'desc' => $this->module->l('Set maxium width of page. You must provide px or percent suffix (example 1240px or 100%)'),
                        'name' => 'g_max_width',
                        'class' => 'width-150',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Body background'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'g_background',
                        'size' => 30,
                        'desc' =>  $this->module->l('Set background image or color for body. Only for BOXED layout')
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Preloader'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Status'),
                        'desc' =>  $this->module->l('Show loading spinner before page is fully loaded'),
                        'name' => 'g_preloader',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'prenone',
                                    'name' => $this->module->l('None'),
                                ),
                                array(
                                    'id_option' => 'precss',
                                    'name' => $this->module->l('CSS3'),
                                ),
                                array(
                                    'id_option' => 'preimg',
                                    'name' => $this->module->l('Image'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Preloader background'),
                        'name' => 'g_preloader_bg',
                        'size' => 30,
                        'dependency' => array( 'g_preloader', 'any', 'precss,preimg' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Preloader icon color'),
                        'name' => 'g_preloader_icon_color',
                        'size' => 30,
                        'dependency' => array( 'g_preloader', '==', 'precss' ),
                    ),
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Preloader Style'),
                        'name' => 'g_preloader_icon_precss',
                        'dependency' => array( 'g_preloader', '==', 'precss' ),
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'preloader/css-1.gif'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'preloader/css-2.gif'
                                ),
                                array(
                                    'id_option' => 3,
                                    'name' => $this->module->l('Style 3'),
                                    'img' => 'preloader/css-3.gif'
                                ),
                                array(
                                    'id_option' => 4,
                                    'name' => $this->module->l('Style 4'),
                                    'img' => 'preloader/css-4.gif'
                                ),
                                array(
                                    'id_option' => 5,
                                    'name' => $this->module->l('Style 5'),
                                    'img' => 'preloader/css-5.gif'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('Preloader Image'),
                        'name' =>  'g_preloader_icon_preimg',
                        'size' => 30,
                        'dependency' => array( 'g_preloader', '==', 'preimg' ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Back to top'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Status'),
                        'name' => 'g_btt_status',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Enabled'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Disable'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background color'),
                        'name' => 'g_btt_bg_color',
                        'size' => 30,
                        'dependency' => array( 'g_btt_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Content color'),
                        'name' => 'g_btt_link_color',
                        'size' => 30,
                        'dependency' => array( 'g_btt_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'g_btt_border',
                        'size' => 30,
                        'dependency' => array( 'g_btt_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background hover color'),
                        'name' => 'g_btt_bg_h_color',
                        'size' => 30,
                        'dependency' => array( 'g_btt_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Content hover color'),
                        'name' => 'g_btt_link_h_color',
                        'size' => 30,
                        'dependency' => array( 'g_btt_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border hover color'),
                        'name' => 'g_btt_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                        'dependency' => array( 'g_btt_status', '==', '1' ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getTypographyForm()
    {
        $customFontDesc = '<div class="alert alert-info">' . $this->module->l('You have to copy your custom fonts files by ftp to modules/tdthemesettings/views/fonts and then put similar code in field above. Please note that the path(url) must be ../fonts/fontname.eot') . '<pre>
        @font-face {
        font-family: \'MyWebFont\';
        src: url(\'../fonts/webfont.eot\');
        src: url(\'../fonts/webfont.eot?#iefix\') format(\'embedded-opentype\'),
        url(\'../fonts/webfont.woff2\') format(\'woff2\'),
        url(\'../fonts/webfont.woff\') format(\'woff\'),
        url(\'../fonts/webfont.ttf\')  format(\'truetype\'),
        url(\'../fonts/webfont.svg#svgFontName\') format(\'svg\');
        }
        </pre>
        </div>';

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Typography'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-typography'
                ),
                'input' => array(
                    array(
                        'type' => 'textarea2',
                        'label' => $this->module->l('Custom font face include'),
                        'desc' => $customFontDesc,
                        'name' => 'typo_font_include',
                        'disableFront' => true,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Base font'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Base font type'),
                        'name' => 'typo_bfont_t',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'google',
                                    'name' => $this->module->l('Google font'),
                                ),
                                array(
                                    'id_option' => 'system',
                                    'name' => $this->module->l('System font'),
                                ),
                                array(
                                    'id_option' => 'custom',
                                    'name' => $this->module->l('Custom'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Google font url'),
                        'desc' => $this->module->l('Example: //fonts.googleapis.com/css?family=Open+Sans:400,700 Add 400 and 700 font weigh if exist. If you need adds latin-ext or cyrilic too.'). '<a href="https://www.google.com/fonts" target="_blank">'.$this->module->l('Check google font database').'</a>',
                        'name' => 'typo_bfont_g_url',
                        'size' => 30,
                        'dependency' => array( 'typo_bfont_t', '==', 'google' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Google font family'),
                        'desc' => $this->module->l('Example: \'Montserrat\', sans-serif'),
                        'name' => 'typo_bfont_g_name',
                        'size' => 30,
                        'dependency' => array( 'typo_bfont_t', '==', 'google' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Custom font name'),
                        'desc' => $this->module->l('Example: \'Montserrat\', sans-serif'),
                        'name' => 'typo_bfont_c_name',
                        'size' => 30,
                        'dependency' => array( 'typo_bfont_t', '==', 'custom' ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('System font'),
                        'name' => 'typo_bfont_s_name',
                        'min' => 6,
                        'dependency' => array( 'typo_bfont_t', '==', 'system' ),
                        'options' => array(
                            'query' => $this->systemFonts,
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Base font size'),
                        'desc' => $this->module->l('Base font size is defined in px. It is default font size of template. Other elements of template are calculated to rem values. 1rem = your_definied_base_size.'),
                        'name' => 'typo_bfont_size',
                        'class' => 'width-150',
                        'min' => 6,
                        'size' => 30,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Line height'),
                        'name' => 'typo_bfont_lineheight',
                        'class' => 'width-150',
                        'min' => 6,
                        'size' => 30,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Base font size mobile'),
                        'desc' => $this->module->l('Font size for device with width less than 768px'),
                        'name' => 'typo_bfont_size_m',
                        'class' => 'width-150',
                        'size' => 30,
                        'min' => 6,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Heading Titles'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Heading font type'),
                        'name' => 'typo_hfont_t',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'same',
                                    'name' => $this->module->l('Same as base'),
                                ),
                                array(
                                    'id_option' => 'google',
                                    'name' => $this->module->l('Google font'),
                                ),
                                array(
                                    'id_option' => 'system',
                                    'name' => $this->module->l('System font'),
                                ),
                                array(
                                    'id_option' => 'custom',
                                    'name' => $this->module->l('Custom'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Google font url'),
                        'desc' => $this->module->l('Example: //fonts.googleapis.com/css?family=Open+Sans:400,700 Add 400 and 700 font weigh if exist. If you need adds latin-ext or cyrilic too.'). '<a href="https://www.google.com/fonts" target="_blank">'.$this->module->l('Check google font database').'</a>',
                        'name' => 'typo_hfont_g_url',
                        'size' => 30,
                        'dependency' => array( 'typo_hfont_t', '==', 'google' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Google font family'),
                        'desc' => $this->module->l('Example: \'Montserrat\', sans-serif'),
                        'name' => 'typo_hfont_g_name',
                        'size' => 30,
                        'dependency' => array( 'typo_hfont_t', '==', 'google' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Custom font name'),
                        'desc' => $this->module->l('Example: \'Montserrat\', sans-serif'),
                        'name' => 'typo_hfont_c_name',
                        'size' => 30,
                        'dependency' => array( 'typo_hfont_t', '==', 'custom' ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('System font'),
                        'name' => 'typo_hfont_s_name',
                        'dependency' => array( 'typo_hfont_t', '==', 'system' ),
                        'options' => array(
                            'query' => $this->systemFonts,
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'info_text',
                        'desc' => $this->module->l('It is font of main page title, section titles and block titles.
                        Size and other properties you can set in content and footer sections'),
                    ),

                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('HomePage Heading Titles'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Heading font type'),
                        'name' => 'typo_tfont_t',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'same',
                                    'name' => $this->module->l('Same as base'),
                                ),
                                array(
                                    'id_option' => 'google',
                                    'name' => $this->module->l('Google font'),
                                ),
                                array(
                                    'id_option' => 'system',
                                    'name' => $this->module->l('System font'),
                                ),
                                array(
                                    'id_option' => 'custom',
                                    'name' => $this->module->l('Custom'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Google font url'),
                        'desc' => $this->module->l('Example: //fonts.googleapis.com/css?family=Open+Sans:400,700 Add 400 and 700 font weigh if exist. If you need adds latin-ext or cyrilic too.'). '<a href="https://www.google.com/fonts" target="_blank">'.$this->module->l('Check google font database').'</a>',
                        'name' => 'typo_tfont_g_url',
                        'size' => 30,
                        'dependency' => array( 'typo_tfont_t', '==', 'google' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Google font family'),
                        'desc' => $this->module->l('Example: \'Montserrat\', sans-serif'),
                        'name' => 'typo_tfont_g_name',
                        'size' => 30,
                        'dependency' => array( 'typo_tfont_t', '==', 'google' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Custom font name'),
                        'desc' => $this->module->l('Example: \'Montserrat\', sans-serif'),
                        'name' => 'typo_tfont_c_name',
                        'size' => 30,
                        'dependency' => array( 'typo_tfont_t', '==', 'custom' ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('System font'),
                        'name' => 'typo_tfont_s_name',
                        'dependency' => array( 'typo_tfont_t', '==', 'system' ),
                        'options' => array(
                            'query' => $this->systemFonts,
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getHeaderTabForm()
    {
        return array(
            'form' => array(
                'childForms' => array(
                    'td-header'  => $this->module->l('Header'),
                    'td-top-bar'  => $this->module->l('Top bar'),
                    'td-nav-full'  => $this->module->l('Bottom Bar'),
                ),
                'legend' => array(
                    'title' => $this->module->l('Header'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-header-tab'
                ),
            ),
        );
    }

    public function getHeaderForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Header'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-header'
                ),
                'input' => array(
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Header style'),
                        'name' => 'h_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'headers/style1.jpg'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'headers/style2.jpg'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'h_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'h_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link hover/active color'),
                        'name' => 'h_link_h_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'h_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'h_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'h_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border top'),
                        'name' => 'h_border_t',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border bottom'),
                        'name' => 'h_border_b',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'h_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Transparent Header'),
                        'desc' => $this->module->l('Header will have postion: absolute so it will be shown above content.'),
                        'name' => 'h_absolute',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => '1',
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Header wrapper bg'),
                        'desc' => $this->module->l('Set some transparent background'),
                        'name' => 'h_absolute_wrapper_bg',
                        'size' => 30,
                        'dependency' => array( 'h_absolute', '==', '1' ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Sticky header'),
                        'name' => 'h_sticky',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => '1',
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Sticky Background'),
                        'name' => 'h_sticky_bg',
                        'size' => 30,
                        'dependency' => array( 'h_sticky', '==', '1' ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Sticky top and bottom padding'),
                        'name' => 'h_sticky_padding',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                        'dependency' => array( 'h_sticky', '==', '1' ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Fonts size'),
                        'name' => 'h_font_size',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'suffix' => 'px',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Search Settings'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Search input background'),
                        'name' => 'h_search_input_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Search input text color'),
                        'name' => 'h_search_input_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Search input border'),
                        'name' => 'h_search_input_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Search button background'),
                        'name' => 'h_search_btn_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Search button text color'),
                        'name' => 'h_search_btn_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Search button border color'),
                        'name' => 'h_search_btn_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - Search button background'),
                        'name' => 'h_search_btn_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - Search button text color'),
                        'name' => 'h_search_btn_text_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - Search button border color'),
                        'name' => 'h_search_btn_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Cart Settings'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'h_cart_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Inner Border color'),
                        'name' => 'h_cart_inner_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'h_cart_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Cart Title Font size and style'),
                        'name' => 'h_cart_title',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title Color'),
                        'name' => 'h_cart_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text/Link Color'),
                        'name' => 'h_cart_inner_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link Hover Color'),
                        'name' => 'h_cart_inner_h_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Counter Text Color'),
                        'name' => 'h_cart_count_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Counter Background Color'),
                        'name' => 'h_cart_count_bg',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getTopBarForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Top bar'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-top-bar'
                ),
                'input' => array(
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Status'),
                        'name' => 'tb_status',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'tb_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'tb_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link hover/active color'),
                        'name' => 'tb_link_h_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'tb_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'tb_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'tb_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'tb_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'tb_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Fonts size'),
                        'name' => 'tb_font_size',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'suffix' => 'px',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Topbar Welcome Message'),
                        'size' => 30,
                        'lang' => true,
                        'autoload_rte' => true
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Show Welcome Message'),
                        'name' => 'welcome_status',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Welcome Information '),
                        'name' => 'welcome_msg',
                        'lang' => true,
                        'dependency' => array( 'welcome_status', '==', '1' ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getNavFullForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Bottom Nav Bar'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-nav-full'
                ),
                'input' => array(
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'nf_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'nf_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link hover/active color'),
                        'name' => 'nf_link_h_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'nf_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'nf_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'nf_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'nf_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'nf_boxshadow',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getMenuTabForm()
    {
        return array(
            'form' => array(
                'childForms' => array(
                    'td-menu-horizontal'  => $this->module->l('Horizontal menu'),
                    'td-menu-vertical'  => $this->module->l('Vertical menu'),
                    'td-menu-submenu'  => $this->module->l('Submenu'),
                ),
                'legend' => array(
                    'title' => $this->module->l('Menu'),
                    'icon' => 'icon-bars',
                    'id' => 'td-menu-tab'
                ),
            ),
        );
    }

    public function getMenuHorizontalForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Horizontal menu'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-menu-horizontal'
                ),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Submenu width'),
                        'name' => 'hm_submenu_width',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'default',
                                    'name' => $this->module->l('Default'),
                                ),
                                array(
                                    'id_option' => 'fullwidth-background',
                                    'name' => $this->module->l('Full width - background only'),
                                ),
                                array(
                                    'id_option' => 'fullwidth',
                                    'name' => $this->module->l('Full width'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'hm_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border top'),
                        'name' => 'hm_border_t',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border right'),
                        'name' => 'hm_border_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border bottom'),
                        'name' => 'hm_border_b',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border left'),
                        'name' => 'hm_border_l',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Menu height'),
                        'name' => 'hm_height',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Tabs'),
                        'size' => 30,
                        'border_top' => true
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Align'),
                        'name' => 'hm_btn_position',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'left',
                                    'name' => $this->module->l('Left'),
                                ),
                                array(
                                    'id_option' => 'center',
                                    'name' => $this->module->l('Center'),
                                ),
                                array(
                                    'id_option' => 'right',
                                    'name' => $this->module->l('Right'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Arrow'),
                        'desc' => $this->module->l('Show arrow if submenu exist for tab'),
                        'name' => 'hm_btn_arrow',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'hm_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Left/right padding'),
                        'name' => 'hm_padding',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Font size (below 1300px width)'),
                        'name' => 'hm_small_font',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Left/right padding (below 1300px width)'),
                        'name' => 'hm_small_padding',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Icon position'),
                        'name' => 'hm_btn_icon',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'inline',
                                    'name' => $this->module->l('Inline'),
                                ),
                                array(
                                    'id_option' => 'above',
                                    'name' => $this->module->l('Above'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Icon size'),
                        'name' => 'hm_btn_icon_size',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border inner'),
                        'name' => 'hm_border_i',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'hm_btn_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover text color'),
                        'name' => 'hm_btn_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover background'),
                        'name' => 'hm_btn_bg_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Legend background'),
                        'name' => 'hm_legend_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Legend color'),
                        'name' => 'hm_legend_bg_color',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getMenuVerticalForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Vertical menu'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-menu-vertical'
                ),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Position/Status'),
                        'name' => 'vm_position',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'leftColumn',
                                    'name' => $this->module->l('Left column (all pages)'),
                                ),
                                array(
                                    'id_option' => 'horizontal',
                                    'name' => $this->module->l('On Horizontal menu (all pages)'),
                                ),
                                array(
                                    'id_option' => 'hiddenHorizontal',
                                    'name' => $this->module->l('Hidden on homepage, visible on horizontal menu on other pages'),
                                ),
                                array(
                                    'id_option' => 'hiddenLeft',
                                    'name' => $this->module->l('Hidden on homepage, visible on left column on other pages'),
                                ),
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('Hidden'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Vertical Menu Right Margin'),
                        'name' => 'vm_margin',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'suffix' => 'px',
                        'step' => 1,
                        'dependency' => array( 'vm_position', 'any', 'horizontal,hiddenHorizontal' ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Submenu equal height'),
                        'desc' => $this->module->l('If enabled submenu always will start from top, and will have at least same height as tabs'),
                        'name' => 'vm_submenu_style',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'vm_bgcolor',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'vm_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'vm_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Title'),
                        'size' => 30,
                        'border_top' => true
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Title text'),
                        'name' => 'vm_title_text',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Show'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Hide'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'desc' => $this->module->l('Title text you can change in translations'),
                        'name' => 'vm_title_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Line height'),
                        'name' => 'vm_title_height',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'vm_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'vm_title_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color hover'),
                        'name' => 'vm_title_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background hover'),
                        'name' => 'vm_title_bg_h',
                        'size' => 30,
                    ),

                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Tabs'),
                        'size' => 30,
                        'border_top' => true
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Arrow'),
                        'desc' => $this->module->l('Show arrow if submenu exist for tab'),
                        'name' => 'vm_btn_arrow',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'vm_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Top & bottom padding'),
                        'name' => 'vm_padding',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Icon size'),
                        'name' => 'vm_btn_icon_size',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border inner'),
                        'name' => 'vm_border_i',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'vm_btn_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover text color'),
                        'name' => 'vm_btn_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover background'),
                        'name' => 'vm_btn_bg_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Legend background'),
                        'name' => 'vm_legend_bg_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Legend color'),
                        'name' => 'vm_legend_color',
                        'size' => 30,
                    ),

                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getMenuSubmenuForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Submenu'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-menu-submenu'
                ),
                'input' => array(
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'msm_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'msm_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'msm_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border inner'),
                        'name' => 'msm_border_inner',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'msm_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'msm_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color hover'),
                        'name' => 'msm_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Listing arrows'),
                        'name' => 'msm_arrows',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Column titles'),
                        'size' => 30,
                        'border_top' => true
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'msm_title_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'msm_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color hover'),
                        'name' => 'msm_title_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'msm_title_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Predefined tabs'),
                        'size' => 30,
                        'border_top' => true
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'msm_tabs_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'msm_tabs_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color hover'),
                        'name' => 'msm_tabs_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background hover'),
                        'name' => 'msm_tabs_bg_h',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getContentTabForm()
    {
        return array(
            'form' => array(
                'childForms' => array(
                    'td-content-wrapper'  => $this->module->l('Content wrapper'),
                    'td-content'  => $this->module->l('Content'),
                    'td-sidebar'  => $this->module->l('Sidebar'),
                    'td-products-lists'  => $this->module->l('Products list/Carousels'),
                    'td-product-page'  => $this->module->l('Product page'),
                ),
                'legend' => array(
                    'title' => $this->module->l('Content/Pages'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-content-tab'
                ),
            ),
        );
    }

    public function getContentWrapperForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Content Wrapper'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-content-wrapper'
                ),
                'input' => array(
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Top and bottom padding'),
                        'name' => 'cw_padding_tb',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Top and bottom padding(on homepage)'),
                        'name' => 'cw_index_padding_tb',
                        'size' => 30,
                        'min' => 0,
                        'class' => 'width-150',
                        'step' => 1,
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'cw_background',
                        'size' => 30,
                        'desc' =>  $this->module->l('Set background image or color for Wrapper/Content.')
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'cw_border',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getContentForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Content'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-content'
                ),
                'input' => array(
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'c_txt_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'c_link_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color - hover'),
                        'name' => 'c_link_hover',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Page title'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title color'),
                        'name' => 'c_page_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'c_page_title_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Font size in responsive'),
                        'name' => 'c_page_title_size_r',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Section title'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title color'),
                        'name' => 'c_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'c_block_title_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Font size in responsive'),
                        'name' => 'c_block_title_size_r',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Tabs'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Title font'),
                        'name' => 'c_tabs_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Tab Background'),
                        'name' => 'c_tabs_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'c_tabs_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'c_tabs_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - background'),
                        'name' => 'c_tabs_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - text color'),
                        'name' => 'c_tabs_txt_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - border color'),
                        'name' => 'c_tabs_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getSidebarForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Sidebar'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-sidebar'
                ),
                'input' => array(
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Block/widget'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background color'),
                        'name' => 'sb_block_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'sb_block_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'sb_block_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'sb_block_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Block/widget title'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title color'),
                        'name' => 'sb_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title Background'),
                        'name' => 'sb_block_title_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'sb_block_title_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'sb_block_title_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'sb_block_title_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Facet Search'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Price/Weight Slider Color'),
                        'name' => 'sb_facet_slider_color',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getProductListForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Product lists/Carousels'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-products-lists'
                ),
                'input' => array(
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('General Options'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Lazy load'),
                        'name' => 'pl_lazyload',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background color'),
                        'name' => 'pl_lazycolor',
                        'size' => 30,
                        'dependency' => array( 'pl_lazyload', '==', '1' ),
                    ),
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('Loader GIF'),
                        'name' =>  'pl_lazyimg',
                        'size' => 30,
                        'dependency' => array( 'pl_lazyload', '==', '1' ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Second image on hover'),
                        'name' => 'pl_rollover',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => '1',
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Pagination/Infinite Scroll'),
                        'name' => 'pl_infinite',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'default',
                                    'name' => $this->module->l('Default Pagination'),
                                ),
                                array(
                                    'id_option' => 'button',
                                    'name' => $this->module->l('Button Load'),
                                ),
                                array(
                                    'id_option' => 'scroll',
                                    'name' => $this->module->l('Scroll Load'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Open product on click on mobile'),
                        'desc' => $this->module->l('If you disable this option, when user click on the product on mobile devices, it will see its add to cart button. The product page will be opened on second click.'),
                        'name' => 'hover_mobile_click',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Category'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Category style'),
                        'name' => 'cat_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'category/style-1.png'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'category/style-2.png'
                                ),
                                array(
                                    'id_option' => 3,
                                    'name' => $this->module->l('Style 3'),
                                    'img' => 'category/style-3.png'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Show category image'),
                        'name' => 'cat_image',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Show Category description'),
                        'name' => 'cat_desc',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => '1',
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('No'),
                                )
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Subcategories thumbs'),
                        'name' => 'cat_sub_thumbs',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Hide Subcategories on mobile'),
                        'name' => 'cat_sub_hide_mobile',
                        'dependency' => array( 'cat_sub_thumbs', '==', '1' ),
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Default Product Layout'),
                        'name' => 'pl_layout',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'grid',
                                    'name' => $this->module->l('Grid'),
                                ),
                                array(
                                    'id_option' => 'list',
                                    'name' => $this->module->l('List'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Grid'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Product Grid style'),
                        'name' => 'pl_grid_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'category/prd-style-1.jpg'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'category/prd-style-2.jpg'
                                ),
                                array(
                                    'id_option' => 3,
                                    'name' => $this->module->l('Style 3'),
                                    'img' => 'category/prd-style-3.jpg'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Style 3 Buttons'),
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Box bg color'),
                        'name' => 'pl_s3_bg',
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button color'),
                        'name' => 'pl_s3_color',
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Quickview color'),
                        'name' => 'pl_s3_qv_color',
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border color'),
                        'name' => 'pl_s3_border_color',
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Style 3 Buttons Hover'),
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button color'),
                        'name' => 'pl_s3_color_h',
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Quickview color'),
                        'name' => 'pl_s3_qv_color_h',
                        'size' => 30,
                        // 'dependency' => array( 'pl_grid_layout', '==', '3' ),
                    ),
                    array(
                        'type' => 'range',
                        'label' => $this->module->l('Product columns to show on device > 1200'),
                        'name' => 'pl_grid_xl',
                        'size' => 30,
                        'min' => 1,
                        'max' => 6,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'range',
                        'label' => $this->module->l('Product columns to show on device < 1200'),
                        'name' => 'pl_grid_lg',
                        'size' => 30,
                        'min' => 1,
                        'max' => 5,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'range',
                        'label' => $this->module->l('Product columns to show on device < 992'),
                        'name' => 'pl_grid_md',
                        'size' => 30,
                        'min' => 1,
                        'max' => 4,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'range',
                        'label' => $this->module->l('Product columns to show on device < 768'),
                        'name' => 'pl_grid_sm',
                        'size' => 30,
                        'min' => 1,
                        'max' => 3,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'range',
                        'label' => $this->module->l('Product columns to show on device < 544'),
                        'name' => 'pl_grid_xs',
                        'size' => 30,
                        'min' => 1,
                        'max' => 2,
                        'step' => 1,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Product box margin'),
                        'desc' => $this->module->l('Define gutter between product boxes'),
                        'name' => 'pl_grid_margin',
                        'size' => 30,
                        'min' => 0,
                        'step' => 1,
                        'suffix' => 'px',
                        'class' => 'width-150',
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Product box padding'),
                        'desc' => $this->module->l('Helpfull when you want to add borders'),
                        'name' => 'pl_grid_padding',
                        'size' => 30,
                        'min' => 0,
                        'step' => 1,
                        'class' => 'width-150',
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Product box colors - default'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pl_grid_b_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'pl_grid_b_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Custom colors'),
                        'name' => 'pl_grid_b_colors',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background color'),
                        'name' => 'pl_grid_b_bg',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_b_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pl_grid_b_text',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_b_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Price color'),
                        'name' => 'pl_grid_b_price',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_b_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Old price color'),
                        'name' => 'pl_grid_b_oldprice',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_b_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Stars'),
                        'name' => 'pl_grid_b_rating',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_b_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Product box colors - hover'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border color'),
                        'name' => 'pl_grid_bh_border_c',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'pl_grid_bh_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Custom colors'),
                        'name' => 'pl_grid_bh_colors',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background color'),
                        'name' => 'pl_grid_bh_bg',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_bh_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pl_grid_bh_text',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_bh_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Price color'),
                        'name' => 'pl_grid_bh_price',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_bh_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Old price color'),
                        'name' => 'pl_grid_bh_oldprice',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_bh_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Stars'),
                        'name' => 'pl_grid_bh_rating',
                        'size' => 30,
                        'dependency' => array( 'pl_grid_bh_colors', '==', '1' ),
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Options'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Truncate product name to single line'),
                        'name' => 'pl_grid_name_trnc',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Product name font size'),
                        'name' => 'pl_grid_name_font',
                        'size' => 30,
                        'min' => 0.1,
                        'class' => 'width-150',
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Product price font size'),
                        'name' => 'pl_grid_price_font',
                        'size' => 30,
                        'min' => 0.1,
                        'class' => 'width-150',
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Product color snippets'),
                        'desc' => $this->module->l('Show product color attribute'),
                        'name' => 'pl_grid_colors',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('Hide'),
                                ),
                                array(
                                    'id_option' => 'show',
                                    'name' => $this->module->l('Show'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Functional buttons'),
                        'name' => 'pl_grid_func_btn',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Hide'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Show'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Add To Cart Button'),
                        'name' => 'pl_grid_cart_btn',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Hide'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Show'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                        'dependency' => array( 'pl_grid_func_btn', '==', '1' ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Quickview Button'),
                        'name' => 'pl_grid_qv_btn',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Hide'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Show'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                        'dependency' => array( 'pl_grid_func_btn', '==', '1' ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Quickview button in mobile'),
                        'name' => 'pl_grid_qv_btn_r',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Hide'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Show'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                        'dependency' => array( 'pl_grid_func_btn|pl_grid_qv_btn', '==|==', '1|1' ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Hide Functional buttons in Mobile'),
                        'desc' => 'Hide buttons in <= 767 screen media',
                        'name' => 'pl_grid_func_btn_r',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Hide'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Show'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                        'dependency' => array( 'pl_grid_func_btn', '==', '1' ),
                    ),
                    /*array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Cart button'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'pl_cart_btn_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pl_cart_btn_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pl_cart_btn_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - background'),
                        'name' => 'pl_cart_btn_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - text color'),
                        'name' => 'pl_cart_btn_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - border color'),
                        'name' => 'pl_cart_btn_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),*/
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Functional buttons'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'pl_functional_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pl_functional_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pl_functional_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Border Redius'),
                        'name' => 'pl_functional_btnradius',
                        'size' => 50,
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                        'class' => 'width-150',
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - background'),
                        'name' => 'pl_functional_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - text color'),
                        'name' => 'pl_functional_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - border color'),
                        'name' => 'pl_functional_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Deal Options'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'pl_deal_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pl_deal_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pl_deal_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Countdown Widget Settings'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'pl_cta_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pl_cta_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pl_cta_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Padding'),
                        'name' => 'pl_cta_padding',
                        'size' => 30,
                        'min' => 0,
                        'step' => 1,
                        'class' => 'width-150',
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Number font size'),
                        'name' => 'pl_cta_no_font',
                        'size' => 30,
                        'min' => 0.1,
                        'class' => 'width-150',
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Text font size'),
                        'name' => 'pl_cta_txt_font',
                        'size' => 30,
                        'min' => 0.1,
                        'class' => 'width-150',
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('List Settings'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'p_list_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Color'),
                        'name' => 'p_list_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Hover Color'),
                        'name' => 'p_list_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Cart Button'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Background'),
                        'name' => 'p_list_c_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Color'),
                        'name' => 'p_list_c_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'p_list_c_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Hover Background'),
                        'name' => 'p_list_c_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Hover Color'),
                        'name' => 'p_list_c_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border Hover color'),
                        'name' => 'p_list_c_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Carousels Options'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Navigation'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Arrow background'),
                        'name' => 'pl_crsl_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Arrow color'),
                        'name' => 'pl_crsl_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pl_crsl_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Arrow background Hover'),
                        'name' => 'pl_crsl_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Arrow color Hover'),
                        'name' => 'pl_crsl_txt_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - border color'),
                        'name' => 'pl_crsl_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Pagination'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Dots color'),
                        'name' => 'pl_crsl_dot_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Dots Border'),
                        'name' => 'pl_crsl_dot_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Dots color hover'),
                        'name' => 'pl_crsl_dot_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Dots border hover color'),
                        'name' => 'pl_crsl_dot_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getProductPageForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Product page'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-product-page'
                ),
                'input' => array(
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Product style'),
                        'name' => 'pp_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'product/style-1.png'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'product/style-2.png'
                                ),
                                array(
                                    'id_option' => 3,
                                    'name' => $this->module->l('Style 3'),
                                    'img' => 'product/style-3.png'
                                ),
                                array(
                                    'id_option' => 4,
                                    'name' => $this->module->l('Style 4'),
                                    'img' => 'product/style-4.png'
                                ),
                                array(
                                    'id_option' => 5,
                                    'name' => $this->module->l('Style 5'),
                                    'img' => 'product/style-5.png'
                                ),
                                array(
                                    'id_option' => 6,
                                    'name' => $this->module->l('Style 6'),
                                    'img' => 'product/style-6.png'
                                ),
                                array(
                                    'id_option' => 7,
                                    'name' => $this->module->l('Style 7'),
                                    'img' => 'product/style-7.png'
                                ),
                                array(
                                    'id_option' => 8,
                                    'name' => $this->module->l('Style 8'),
                                    'img' => 'product/style-8.png'
                                ),
                                array(
                                    'id_option' => 9,
                                    'name' => $this->module->l('Style 9'),
                                    'img' => 'product/style-9.png'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Product Image Zoom'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Status'),
                        'name' => 'pp_zoom',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => '1',
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => '0',
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Content'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Title font size'),
                        'name' => 'pp_name_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title Color'),
                        'name' => 'pp_name_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Price font size'),
                        'name' => 'pp_price_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Price Color'),
                        'name' => 'pp_price_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Product Navigation'),
                        'name' => 'pp_navigation',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Product Tags'),
                        'name' => 'pp_tags',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Product Categories'),
                        'name' => 'pp_cats',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Tags/Categories Background'),
                        'name' => 'pp_tagc_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Tags/Categories Text color'),
                        'name' => 'pp_tagc_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Tags/Categories Border'),
                        'name' => 'pp_tagc_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Tags/Categories Hover Background'),
                        'name' => 'pp_tagc_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Tags/Categories Hover color'),
                        'name' => 'pp_tagc_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Tags/Categories Hover Border color'),
                        'name' => 'pp_tagc_border_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Product Button'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Color'),
                        'name' => 'pp_btn_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Hover Color'),
                        'name' => 'pp_btn_color_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('Payment Icons Upload'),
                        'name' =>  'pp_img',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Product Tabs'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Product Tabs Styles'),
                        'name' => 'pp_tabs_style',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'horizontal',
                                    'name' => $this->module->l('Horizontal'),
                                ),
                                array(
                                    'id_option' => 'vertical',
                                    'name' => $this->module->l('Vertical'),
                                ),
                                array(
                                    'id_option' => 'accordion',
                                    'name' => $this->module->l('Accordion'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Title font'),
                        'name' => 'pp_tabs_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pp_tabs_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pp_tabs_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Hover - text color'),
                        'name' => 'pp_tabs_txt_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Hover - Border'),
                        'name' => 'pp_tabs_border_h',
                        'desc' => $this->module->l('Border will be visible only if you set it also for normal state. Tip if you want to have border only for hover in normal state set transparent color'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Responsive Tabs'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background color'),
                        'name' => 'pp_tabs_bg_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'pp_tabs_txt_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'pp_tabs_border_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'pp_tabs_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Dropdown Background color'),
                        'name' => 'pp_dd_tabs_bg_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'pp_dd_tabs_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link Background color'),
                        'name' => 'pp_link_tabs_bg_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'pp_link_tabs_txt_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border Bottom'),
                        'name' => 'pp_link_tabs_border_r',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Line height'),
                        'name' => 'pp_link_tabs_lineheight',
                        'class' => 'width-150',
                        'min' => 6,
                        'size' => 30,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'pp_link_tabs_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Active Background color'),
                        'name' => 'pp_link_tabs_bg_r_a',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Active color'),
                        'name' => 'pp_link_tabs_txt_r_a',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getFooterTabForm()
    {
        return array(
            'form' => array(
                'childForms' => array(
                    'td-footer'  => $this->module->l('Footer'),
                    'td-footer-top'  => $this->module->l('Footer Top Bar'),
                    'td-contact-info'  => $this->module->l('Contact Information'),
                ),
                'legend' => array(
                    'title' => $this->module->l('Footer'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-footer-tab'
                ),
            ),
        );
    }

    public function getFooterForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Footer colors'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-footer'
                ),
                'input' => array(
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Footer style'),
                        'name' => 'f_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'footers/style1.jpg'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'footers/style2.jpg'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'f_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'f_link',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link hover/active color'),
                        'name' => 'f_link_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'f_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'f_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'f_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border top'),
                        'name' => 'f_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Footer After Block'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border top'),
                        'name' => 'fa_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'fa_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'fa_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Margin'),
                        'name' => 'fa_mpadding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Margin in responsive'),
                        'name' => 'fa_mpadding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Blocks title'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Title design'),
                        'name' => 'f_block_title_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'block-title/style1.png'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'block-title/style2.png'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Text position'),
                        'name' => 'f_block_title_position',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'left',
                                    'name' => $this->module->l('Left'),
                                ),
                                array(
                                    'id_option' => 'center',
                                    'name' => $this->module->l('Center'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Title color'),
                        'name' => 'f_block_title_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Title Border Bottom'),
                        'name' => 'f_block_title_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size and style'),
                        'name' => 'f_block_title_typo',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Newsletter'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Input border'),
                        'name' => 'f_input_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Input background'),
                        'name' => 'f_input_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Input text color'),
                        'name' => 'f_input_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button background color'),
                        'name' => 'f_input_btn_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button color'),
                        'name' => 'f_input_btn',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button background color hover'),
                        'name' => 'f_input_btn_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button color hover'),
                        'name' => 'f_input_btn_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Social icons'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Color type'),
                        'name' => 'f_social_c_t',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Default'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Custom'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Icon color'),
                        'name' => 'f_social_txt',
                        'size' => 30,
                        'dependency' => array( 'f_social_c_t', '==', '1' ),
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Color type hover'),
                        'name' => 'f_social_c_t_h',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('Default'),
                                ),
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Custom'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Icon color hover'),
                        'name' => 'f_social_txt_h',
                        'size' => 30,
                        'dependency' => array( 'f_social_c_t_h', '==', '1' ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Footer Bottom'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Show footer bottom'),
                        'name' => 'fc_status',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'fc_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'fc_link',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link hover/active color'),
                        'name' => 'fc_link_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'fc_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'fc_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'fc_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border top'),
                        'name' => 'fc_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Copyright/Payment-Icons'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->module->l('Copyright Text'),
                        'name' =>  'fc_copyright',
                        'lang' => true,
                        'autoload_rte' => true,
                        'cols' => 60,
                        'rows' => 30,
                    ),
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('System Icons'),
                        'name' =>  'fc_sys_img',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('Payment Icons'),
                        'name' =>  'fc_img',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getFooterTopBar()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Footer Top bar'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-footer-top'
                ),
                'input' => array(
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'ft_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link color'),
                        'name' => 'ft_link',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link hover/active color'),
                        'name' => 'ft_link_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'ft_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'ft_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'ft_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border top'),
                        'name' => 'ft_border',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getContactInformation()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Contact Information'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-contact-info'
                ),
                'input' => array(
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('Logo Image'),
                        'name' =>  'cinfo_img',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->module->l('Description'),
                        'name' =>  'cinfo_desc',
                        'lang' => true,
                        'autoload_rte' => true,
                        'cols' => 60,
                        'rows' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Title'),
                        'name' => 'cinfo_title',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->module->l('Address'),
                        'name' =>  'cinfo_add',
                        'lang' => true,
                        'autoload_rte' => true,
                        'cols' => 60,
                        'rows' => 30,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Contact No'),
                        'name' => 'cinfo_no',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Fax No'),
                        'name' => 'cinfo_fno',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Email Id'),
                        'name' => 'cinfo_email',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l(''),
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getOptionsTabForm()
    {
        return array(
            'form' => array(
                'childForms' => array(
                    'td-buttons'  => $this->module->l('Buttons'),
                    'td-breadcrumb'  => $this->module->l('Breadcrumb'),
                    'td-forms'  => $this->module->l('Forms/Drop downs'),
                    'td-labels'  => $this->module->l('Labels/Prices/Stars'),
                ),
                'legend' => array(
                    'title' => $this->module->l('Global Options'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-options-tab'
                ),
            ),
        );
    }

    public function getButtonsForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Buttons'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-buttons'
                ),
                'input' => array(
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Primary Button'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Normal'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'primarybtn_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'primarybtn_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'primarybtn_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Hover'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'primarybtn_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'primarybtn_txt_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border color'),
                        'name' => 'primarybtn_border_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Secondary Button'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Normal'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'secondarybtn_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'secondarybtn_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'secondarybtn_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Hover'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'secondarybtn_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Color'),
                        'name' => 'secondarybtn_txt_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border color'),
                        'name' => 'secondarybtn_border_h',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getBreadcrumbForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Breadcrumb'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-breadcrumb'
                ),
                'input' => array(
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Status'),
                        'name' => 'bc_status',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Width'),
                        'name' => 'bc_width',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'fullwidth-bg',
                                    'name' => $this->module->l('Full width background only'),
                                ),
                                array(
                                    'id_option' => 'fullwidth',
                                    'name' => $this->module->l('Full width'),
                                ),
                                array(
                                    'id_option' => 'inherit',
                                    'name' => $this->module->l('Inherit'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Text align'),
                        'name' => 'bc_align',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'left',
                                    'name' => $this->module->l('left'),
                                ),
                                array(
                                    'id_option' => 'center',
                                    'name' => $this->module->l('Center'),
                                ),
                                array(
                                    'id_option' => 'right',
                                    'name' => $this->module->l('Right'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding'),
                        'name' => 'bc_padding',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'padding',
                        'label' => $this->module->l('Padding in responsive'),
                        'name' => 'bc_padding_r',
                        'class' => 'width-150',
                        'suffix' => 'px',
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font'),
                        'name' => 'bc_font',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text/Link color'),
                        'name' => 'bc_link',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link Hover color'),
                        'name' => 'bc_link_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'bc_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'bc_boxshadow',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getFormsForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Forms'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-forms'
                ),
                'input' => array(
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Text input/select boxes - normal'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'form_input_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text'),
                        'name' => 'form_input_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'form_input_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'form_input_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Text input/select boxes - focus'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background - hover/focus'),
                        'name' => 'form_input_bg_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border color'),
                        'desc' => $this->module->l('Tip: if you want to have a border only on hover, in normal state select border different than none and give it transparent color'),
                        'name' => 'form_input_border_c_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow - hover/focus'),
                        'name' => 'form_input_boxshadow_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Checkboxs/radio buttons'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'form_radio_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Border'),
                        'name' => 'form_radio_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Active color'),
                        'name' => 'form_radio_checked',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Dropdowns'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'info_text',
                        'desc' => $this->module->l('For example language or currency drop down.'),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'form_dropdown_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text'),
                        'name' => 'form_dropdown_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text hover color'),
                        'name' => 'form_dropdown_txt_h',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Border'),
                        'name' => 'form_dropdown_border',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'form_dropdown_boxshadow',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getLabelsForm()
    {
        return array(
            'form' => array(
                'child' => true,
                'legend' => array(
                    'title' => $this->module->l('Labels/Alerts/Prices'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-labels'
                ),
                'input' => array(
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Price/stars'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Price color'),
                        'name' => 'lp_price',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Old price color'),
                        'name' => 'lp_old_price',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Rating stars color'),
                        'name' => 'lp_ratings',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Product stickers'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size'),
                        'name' => 'lp_label_font',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px'
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('New Label'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'lp_new_l_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text'),
                        'name' => 'lp_new_l_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Sale Label'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'lp_sale_l_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text'),
                        'name' => 'lp_sale_l_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Online & pack label'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'lp_online_l_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text'),
                        'name' => 'lp_online_l_txt',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Tooltip Settings'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Tooltip'),
                        'name' => 'tip_toggle',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'font',
                        'label' => $this->module->l('Font size'),
                        'name' => 'tip_font',
                        'size' => 30,
                        'class' => 'width-150',
                        'min' => 1,
                        'suffix' => 'px',
                        'dependency' => array( 'tip_toggle', '==', '1' ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Line height'),
                        'name' => 'tip_lineheight',
                        'class' => 'width-150',
                        'min' => 6,
                        'size' => 30,
                        'suffix' => 'px',
                        'dependency' => array( 'tip_toggle', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'tip_bg',
                        'size' => 30,
                        'dependency' => array( 'tip_toggle', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text'),
                        'name' => 'tip_txt',
                        'size' => 30,
                        'dependency' => array( 'tip_toggle', '==', '1' ),
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'tip_boxshadow',
                        'size' => 30,
                        'dependency' => array( 'tip_toggle', '==', '1' ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getResponsiveForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Responsive'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-resopnsive'
                ),
                'input' => array(
                    array(
                        'type' => 'image-select',
                        'label' => $this->module->l('Header style'),
                        'name' => 'res_h_layout',
                        'direction' => 'vertical',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Style 1'),
                                    'img' => 'headers/mstyle1.jpg'
                                ),
                                array(
                                    'id_option' => 2,
                                    'name' => $this->module->l('Style 2'),
                                    'img' => 'headers/mstyle2.jpg'
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'title_separator',
                        'label' => $this->module->l('Side Header'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background'),
                        'name' => 'res_header_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'boxshadow',
                        'label' => $this->module->l('Box shadow'),
                        'name' => 'res_header_boxshadow',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text/Link Color'),
                        'name' => 'res_header_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Link Hover Color'),
                        'name' => 'res_header_h_text',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'subtitle_separator',
                        'label' => $this->module->l('Menu Settings'),
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Menu Title Background'),
                        'name' => 'res_header_mtitle_bg',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Menu Title Color'),
                        'name' => 'res_header_mtitle',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Inner border'),
                        'name' => 'res_header_mborder',
                        'size' => 30,
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getCookieForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Cookie Law'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-cookie-law'
                ),
                'input' => array(
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Show Cookie Popup'),
                        'name' => 'cookie_status',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Message'),
                        'name' => 'cookie_msg',
                        'lang' => true,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Button Text'),
                        'name' => 'cookie_btntxt',
                        'lang' => true,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Learn More Text'),
                        'name' => 'cookie_moretxt',
                        'lang' => true,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->module->l('Learn More Link'),
                        'name' => 'cookie_morelnk',
                        'lang' => true,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Position'),
                        'name' => 'cookie_position',
                        'dependency' => array( 'cookie_status', '==', '1' ),
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'bottom',
                                    'name' => $this->module->l('Bottom'),
                                ),
                                array(
                                    'id_option' => 'bottom-left',
                                    'name' => $this->module->l('Bottom Left'),
                                ),
                                array(
                                    'id_option' => 'bottom-right',
                                    'name' => $this->module->l('Bottom Right'),
                                ),
                                array(
                                    'id_option' => 'top',
                                    'name' => $this->module->l('Top'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->module->l('Theme'),
                        'name' => 'cookie_theme',
                        'dependency' => array( 'cookie_status', '==', '1' ),
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 'block',
                                    'name' => $this->module->l('Block'),
                                ),
                                array(
                                    'id_option' => 'edgeless',
                                    'name' => $this->module->l('Edgeless'),
                                ),
                                array(
                                    'id_option' => 'classic',
                                    'name' => $this->module->l('Classic'),
                                )
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'range',
                        'label' => $this->module->l('Expiry Days'),
                        'name' => 'cookie_expiry',
                        'desc' => 'Specify -1 for no expiry',
                        'size' => 30,
                        'min' => -1,
                        'max' => 365,
                        'step' => 1,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Background Color'),
                        'name' => 'cookie_bg',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'cookie_txt_c',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Learn More color'),
                        'name' => 'cookie_more_c',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Background Color'),
                        'name' => 'cookie_btnbg_c',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Text color'),
                        'name' => 'cookie_btntxt_c',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Background Hover Color'),
                        'name' => 'cookie_btnbg_h_c',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Button Text Hover color'),
                        'name' => 'cookie_btntxt_h_c',
                        'size' => 30,
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                    array(
                        'type' => 'number',
                        'label' => $this->module->l('Border Redius'),
                        'name' => 'cookie_btnradius',
                        'size' => 30,
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                        'class' => 'width-150',
                        'dependency' => array( 'cookie_status', '==', '1' ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getMaintanceForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Maintenance'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-maintenance'
                ),
                'description' => $this->module->l('In this panel you configure style of Prestashop Maintenance page. To turn your shop into Maintenance mode, go to Shop parametrs > General > Maintenance.
                    Titles and countdown can be translated by default Prestsahop translation tool. '),
                'input' => array(
                    array(
                        'type' => 'background',
                        'label' => $this->module->l('Background'),
                        'name' => 'mt_background',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Text color'),
                        'name' => 'mt_text_color',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'filemanager',
                        'label' => $this->module->l('Logo replacement'),
                        'desc' => $this->module->l('Use this field to replace default logo.'),
                        'name' => 'mt_logo',
                        'size' => 30,
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Countdown'),
                        'name' => 'mt_countdown',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'datetime',
                        'label' => $this->module->l('Date for countdown'),
                        'name' => 'mt_date',
                        'size' => 30,
                        'dependency' => array( 'mt_countdown', '==', '1' )
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Newsletter'),
                        'name' => 'mt_newsletter',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Newsletter field bg'),
                        'name' => 'mt_form_bg',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Newsletter field txt'),
                        'name' => 'mt_form_txt',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'border',
                        'label' => $this->module->l('Newsletter field border'),
                        'name' => 'mt_form_border',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Newsletter button bg'),
                        'name' => 'mt_button_bg',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Newsletter button text'),
                        'name' => 'mt_button_txt',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Newsletter button hover bg'),
                        'name' => 'mt_button_bg_h',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'color2',
                        'label' => $this->module->l('Newsletter button hover text'),
                        'name' => 'mt_button_txt_h',
                        'size' => 30,
                        'dependency' => array( 'mt_newsletter', '==', '1' )
                    ),
                    array(
                        'type' => 'radio-group',
                        'label' => $this->module->l('Social buttons'),
                        'name' => 'mt_social',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id_option' => 1,
                                    'name' => $this->module->l('Yes'),
                                ),
                                array(
                                    'id_option' => 0,
                                    'name' => $this->module->l('No'),
                                ),
                            ),
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getCodesForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Custom Css/Js/Codes'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-codes'
                ),
                'input' => array(
                    array(
                        'type' => 'code_textarea',
                        'label' => $this->module->l('Custom Css code'),
                        'size' => 30,
                        'name' =>  'codes_css',
                        'class' => 'td-code-editor',
                        'language' => 'css'
                    ),
                    array(
                        'type' => 'code_textarea',
                        'label' => $this->module->l('Custom Js code'),
                        'size' => 30,
                        'name' =>  'codes_js',
                        'class' => 'td-code-editor',
                        'language' => 'javascript',
                    ),
                ),
                'submit' => array(
                    'title' => $this->module->l('Save'),
                ),
            ),
        );
    }

    public function getImportExportForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Import/Export/Reset configuration'),
                    'icon' => 'icon-cogs',
                    'id' => 'td-import_export'
                ),
                'input' => array(
                    array(
                        'type' => 'import_export',
                        'label' => $this->module->l('Import Export'),
                        'name' =>  'import_export',
                    ),
                ),
            ),
        );
    }

    public function getDocumentationForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->module->l('Documentation'),
                    'icon' => 'icon-file-text-o',
                    'id' => 'td-documentation'
                ),
                'input' => array(
                    array(
                        'type' => 'documentation',
                        'label' => $this->module->l('documentation'),
                        'name' =>  'documentation',
                    ),
                ),
            ),
        );
    }
}