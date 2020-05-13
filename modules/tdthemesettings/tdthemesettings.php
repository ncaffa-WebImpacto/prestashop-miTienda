<?php

/**
 *  @author    ThemeDelights
 *  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
 *  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class TdThemeSettings extends Module
{
    public $defaults;
    public $systemFonts;

    public function __construct()
    {
        $this->name = 'tdthemesettings';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'ThemeDelights';
        $this->bootstrap = true;
        $this->cfgName = 'tdopt_';

        parent::__construct();

        $this->defaults = array(
            /* General */
            'g_layout' => array('type' => 'default', 'value' => 'wide', 'cached' => true),
            'g_margin_tb' => array('type' => 'default', 'value' => '20'),
            'g_boxshadow' => array('type' => 'json', 'value' => '{"switch":"1","color":"rgba(0,0,0,0.2)","blur":"5","spread":"1","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'g_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'g_max_width' => array('type' => 'default', 'value' => '1200px'),
            'g_background' => array('type' => 'json', 'value' => '{"color":"#ffffff","repeat":"no-repeat","position":"center-center","size":"auto","attachment":"scroll","img":""}', 'scssType' => 'background'),

            'g_preloader' => array('type' => 'default', 'value' => 'precss', 'cached' => true),
            'g_preloader_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'g_preloader_icon_color' => array('type' => 'default', 'value' => '#428bca'),
            'g_preloader_icon_precss' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'g_preloader_icon_preimg' => array('type' => 'default', 'value' => '', 'cached' => true, 'scssType' => 'ignore'),

            'g_btt_status' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'g_btt_bg_color' => array('type' => 'default', 'value' => '#428bca'),
            'g_btt_link_color' => array('type' => 'default', 'value' => '#ffffff'),
            'g_btt_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#ececec"}', 'scssType' => 'border'),
            'g_btt_bg_h_color' => array('type' => 'default', 'value' => '#232323'),
            'g_btt_link_h_color' => array('type' => 'default', 'value' => '#ffffff'),
            'g_btt_border_h' => array('type' => 'default', 'value' => ''),

            /* Typography */
            'typo_font_include' => array('type' => 'default', 'value' => '', 'scssType' => 'ignore'),
            'typo_bfont_t' => array('type' => 'default', 'value' => 'google', 'cached' => true),
            'typo_bfont_g_url' => array('type' => 'default', 'value' => '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap', 'cached' => true, 'scssType' => 'ignore'),
            'typo_bfont_g_name' => array('type' => 'default', 'value' => 'Poppins, sans-serif'),
            'typo_bfont_s_name' => array('type' => 'default', 'value' => 'Arial, Helvetica, sans-serif'),
            'typo_bfont_c_name' => array('type' => 'default', 'value' => ''),
            'typo_bfont_size' => array('type' => 'default', 'value' => '13'),
            'typo_bfont_lineheight' => array('type' => 'default', 'value' => '24'),
            'typo_bfont_size_m' => array('type' => 'default', 'value' => ''),

            'typo_hfont_t' => array('type' => 'default', 'value' => 'same', 'cached' => true),
            'typo_hfont_g_url' => array('type' => 'default', 'value' => '//fonts.googleapis.com/css?family=Lobster', 'cached' => true, 'scssType' => 'ignore'),
            'typo_hfont_g_name' => array('type' => 'default', 'value' => 'Lobster, cursive'),
            'typo_hfont_s_name' => array('type' => 'default', 'value' => 'Arial, Helvetica, sans-serif'),
            'typo_hfont_c_name' => array('type' => 'default', 'value' => ''),

            'typo_tfont_t' => array('type' => 'default', 'value' => 'same', 'cached' => true),
            'typo_tfont_g_url' => array('type' => 'default', 'value' => '//fonts.googleapis.com/css?family=Lato:400,700', 'cached' => true, 'scssType' => 'ignore'),
            'typo_tfont_g_name' => array('type' => 'default', 'value' => 'Lato, sans-serif'),
            'typo_tfont_s_name' => array('type' => 'default', 'value' => 'Arial, Helvetica, sans-serif'),
            'typo_tfont_c_name' => array('type' => 'default', 'value' => ''),

            /* Header */
            'h_layout' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'h_text_color' => array('type' => 'default', 'value' => '#232323'),
            'h_link_color' => array('type' => 'default', 'value' => '#232323'),
            'h_link_h_color' => array('type' => 'default', 'value' => '#428bca'),
            'h_padding' => array('type' => 'json', 'value' => '{"top":"29","right":"","bottom":"29","left":""}', 'scssType' => 'padding'),
            'h_padding_r' => array('type' => 'json', 'value' => '{"top":"20","right":"","bottom":"20","left":""}', 'scssType' => 'padding'),
            'h_background' => array('type' => 'json', 'value' => '{"color":"#ffffff","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'h_border_t' => array('type' => 'json', 'value' => '{"type":"none","width":"3","color":""}', 'scssType' => 'border'),
            'h_border_b' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#000000"}', 'scssType' => 'border'),
            'h_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"#cbcbcb","blur":"5","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'h_absolute' => array('type' => 'default', 'value' => '0', 'cached' => true),
            'h_absolute_wrapper_bg' => array('type' => 'default', 'value' => 'rgba(0,0,0,0.6)'),
            'h_sticky' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'h_sticky_bg' => array('type' => 'default', 'value' => ''),
            'h_sticky_padding' => array('type' => 'default', 'value' => ''),
            'h_font_size' => array('type' => 'default', 'value' => '13'),


            /* Header Search */
            'h_search_input_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'h_search_input_txt' => array('type' => 'default', 'value' => '#666666'),
            'h_search_input_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),
            'h_search_btn_bg' => array('type' => 'default', 'value' => ''),
            'h_search_btn_text' => array('type' => 'default', 'value' => '#232323'),
            'h_search_btn_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'h_search_btn_bg_h' => array('type' => 'default', 'value' => ''),
            'h_search_btn_text_h' => array('type' => 'default', 'value' => '#428bca'),
            'h_search_btn_border_h' => array('type' => 'default', 'value' => ''),

            /* Cart */
            'h_cart_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'h_cart_inner_border' => array('type' => 'default', 'value' => '#e5e5e5'),
            'h_cart_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'h_cart_title' => array('type' => 'json', 'value' => '{"size":"15","bold":600,"italic":null,"uppercase":"1","spacing":"0.8"}', 'scssType' => 'font'),
            'h_cart_title_color' => array('type' => 'default', 'value' => '#232323'),
            'h_cart_inner_text' => array('type' => 'default', 'value' => '#666666'),
            'h_cart_inner_h_text' => array('type' => 'default', 'value' => '#428bca'),
            'h_cart_count_text' => array('type' => 'default', 'value' => '#ffffff'),
            'h_cart_count_bg' => array('type' => 'default', 'value' => '#428bca'),

            /* Top bar */
            'tb_status' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'tb_text_color' => array('type' => 'default', 'value' => '#666666'),
            'tb_link_color' => array('type' => 'default', 'value' => '#666666'),
            'tb_link_h_color' => array('type' => 'default', 'value' => '#428bca'),
            'tb_padding' => array('type' => 'json', 'value' => '{"top":"12","right":"","bottom":"12","left":""}', 'scssType' => 'padding'),
            'tb_padding_r' => array('type' => 'json', 'value' => '{"top":"10","right":"","bottom":"10","left":""}', 'scssType' => 'padding'),
            'tb_background' => array('type' => 'json', 'value' => '{"color":"#ffffff","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'tb_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),
            'tb_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'tb_font_size' => array('type' => 'default', 'value' => '13'),
            'welcome_status' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'welcome_msg' => array('type' => 'txt', 'value' => 'Indias fastest online shopping destination', 'cached' => true, 'scssType' => 'ignore'),

            /* Nav Full Width */
            'nf_text_color' => array('type' => 'default', 'value' => '#ffffff'),
            'nf_link_color' => array('type' => 'default', 'value' => '#ffffff'),
            'nf_link_h_color' => array('type' => 'default', 'value' => '#232323'),
            'nf_padding' => array('type' => 'json', 'value' => '{"top":"","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'nf_padding_r' => array('type' => 'json', 'value' => '{"top":"15","right":"","bottom":"15","left":""}', 'scssType' => 'padding'),
            'nf_background' => array('type' => 'json', 'value' => '{"color":"#428bca","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'nf_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'nf_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),


            //horizontal-menu
            'hm_submenu_width' => array('type' => 'default', 'value' => 'default'),
            'hm_background' => array('type' => 'json', 'value' => '{"color":"","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'hm_border_t' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#ffffff"}', 'scssType' => 'border'),
            'hm_border_r' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#ffffff"}', 'scssType' => 'border'),
            'hm_border_b' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#ffffff"}', 'scssType' => 'border'),
            'hm_border_l' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#ffffff"}', 'scssType' => 'border'),
            'hm_height' => array('type' => 'default', 'value' => '50'),
            
            'hm_btn_position' => array('type' => 'default', 'value' => 'left'),
            'hm_btn_arrow' => array('type' => 'default', 'value' => '1'),
            'hm_typo' => array('type' => 'json', 'value' => '{"size":"14","bold":500,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'hm_padding' => array('type' => 'default', 'value' => '10'),
            'hm_small_font' => array('type' => 'default', 'value' => '13'),
            'hm_small_padding' => array('type' => 'default', 'value' => '8'),
            'hm_btn_color' => array('type' => 'default', 'value' => '#FFFFFF'),
            'hm_btn_color_h' => array('type' => 'default', 'value' => '#232323'),
            'hm_btn_bg_color_h' => array('type' => 'default', 'value' => ''),
            'hm_btn_icon' => array('type' => 'default', 'value' => 'inline'),
            'hm_btn_icon_size' => array('type' => 'default', 'value' => '13'),
            'hm_border_i' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'hm_legend_color' => array('type' => 'default', 'value' => ''),
            'hm_legend_bg_color' => array('type' => 'default', 'value' => ''),

            //vertical-menu
            'vm_position' => array('type' => 'default', 'value' => 'horizontal', 'cached' => true),
            'vm_margin' => array('type' => 'default', 'value' => '15'),
            'vm_submenu_style' => array('type' => 'default', 'value' => '1'),
            'vm_title_text' => array('type' => 'default', 'value' => '1'),
            'vm_title_typo' => array('type' => 'json', 'value' => '{"size":"14","bold":500,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'vm_title_color' => array('type' => 'default', 'value' => '#ffffff'),
            'vm_title_bg' => array('type' => 'default', 'value' => '#232323'),
            'vm_title_color_h' => array('type' => 'default', 'value' => ''),
            'vm_title_bg_h' => array('type' => 'default', 'value' => '#0b6bbd'),
            'vm_title_height' => array('type' => 'default', 'value' => '50'),
            'vm_boxshadow' => array('type' => 'json', 'value' => '{"switch":"1","color":"rgba(74,63,63,0.15) ","blur":"25","spread":"0","horizontal":"0","vertical":"15"}', 'scssType' => 'box-shadow'),
            'vm_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'vm_bgcolor' => array('type' => 'default', 'value' => '#ffffff'),
            'vm_typo' => array('type' => 'json', 'value' => '{"size":"13","bold":400,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'vm_padding' => array('type' => 'default', 'value' => '8'),
            'vm_btn_arrow' => array('type' => 'default', 'value' => '1'),
            'vm_btn_color' => array('type' => 'default', 'value' => '#000000'),
            'vm_btn_color_h' => array('type' => 'default', 'value' => '#428bca'),
            'vm_btn_bg_color_h' => array('type' => 'default', 'value' => ''),
            'vm_btn_icon_size' => array('type' => 'default', 'value' => '13'),
            'vm_border_i' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'vm_legend_color' => array('type' => 'default', 'value' => ''),
            'vm_legend_bg_color' => array('type' => 'default', 'value' => ''),


            //submenu-menu
            'msm_bg' => array('type' => 'default', 'value' => ''),
            'msm_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'msm_boxshadow' => array('type' => 'json', 'value' => '{"switch":"1","color":"rgba(74,63,63,0.15)","blur":"25","spread":"0","horizontal":"0","vertical":"15"}', 'scssType' => 'box-shadow'),
            'msm_border_inner' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'msm_typo' => array('type' => 'json', 'value' => '{"size":"13","bold":400,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'msm_color' => array('type' => 'default', 'value' => '#232323'),
            'msm_color_h' => array('type' => 'default', 'value' => '#428bca'),
            'msm_arrows' => array('type' => 'default', 'value' => '0'),
            'msm_title_typo' => array('type' => 'json', 'value' => '{"size":"13","bold":600,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'msm_title_color' => array('type' => 'default', 'value' => '#232323'),
            'msm_title_color_h' => array('type' => 'default', 'value' => '#428bca'),
            'msm_title_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'msm_tabs_color' => array('type' => 'default', 'value' => '#232323'),
            'msm_tabs_bg' => array('type' => 'default', 'value' => ''),
            'msm_tabs_color_h' => array('type' => 'default', 'value' => '#428bca'),
            'msm_tabs_bg_h' => array('type' => 'default', 'value' => ''),


            //mobile-menu
            'mm_text' => array('type' => 'default', 'value' => ''),
            'mm_inner_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),

            /* Content Wrapper */
            'cw_padding_tb' => array('type' => 'default', 'value' => '20'),
            'cw_index_padding_tb' => array('type' => 'default', 'value' => '0'),
            'cw_background' => array('type' => 'json', 'value' => '{"color":"","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'cw_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),

            /* Content */
            'c_txt_color' => array('type' => 'default', 'value' => '#666666'),
            'c_link_color' => array('type' => 'default', 'value' => '#666666'),
            'c_link_hover' => array('type' => 'default', 'value' => '#428bca'),
            'c_page_title_color' => array('type' => 'default', 'value' => '#232323'),
            'c_page_title_typo' => array('type' => 'json', 'value' => '{"size":"18","bold":500,"italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'c_page_title_size_r' => array('type' => 'default', 'value' => '16'),
            'c_block_title_color' => array('type' => 'default', 'value' => '#232323'),
            'c_block_title_typo' => array('type' => 'json', 'value' => '{"size":"18","bold":500,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'c_block_title_size_r' => array('type' => 'default', 'value' => '16'),

            /*Tabs*/
            'c_tabs_typo' => array('type' => 'json', 'value' => '{"size":"13","bold":400,"italic":null,"uppercase":"null","spacing":"0.8"}', 'scssType' => 'font'),
            'c_tabs_bg' => array('type' => 'default', 'value' => 'rgba(0,0,0,0.05)'),
            'c_tabs_txt' => array('type' => 'default', 'value' => '#666666'),
            'c_tabs_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#3e1010"}', 'scssType' => 'border'),
            'c_tabs_bg_h' => array('type' => 'default', 'value' => '#428bca'),
            'c_tabs_txt_h' => array('type' => 'default', 'value' => '#ffffff'),
            'c_tabs_border_h' => array('type' => 'default', 'value' => ''),

            /* Sidebar */
            'sb_block_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'sb_block_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e8e8e8"}', 'scssType' => 'border'),
            'sb_block_padding' => array('type' => 'json', 'value' => '{"top":"10","right":"10","bottom":"10","left":"10"}', 'scssType' => 'padding'),
            'sb_block_padding_r' => array('type' => 'json', 'value' => '{"top":"","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'sb_block_title_color' => array('type' => 'default', 'value' => '#232323'),
            'sb_block_title_bg' => array('type' => 'default', 'value' => '#f5f5f5'),
            'sb_block_title_typo' => array('type' => 'json', 'value' => '{"size":"14","bold":500,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),
            'sb_block_title_padding' => array('type' => 'json', 'value' => '{"top":"10","right":"15","bottom":"10","left":"15"}', 'scssType' => 'padding'),
            'sb_block_title_padding_r' => array('type' => 'json', 'value' => '{"top":"","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'sb_facet_slider_color' => array('type' => 'default', 'value' => ''),

            /* Product Lists */
            'pl_lazyload' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'pl_lazycolor' => array('type' => 'default', 'value' => '#ffffff'),
            'pl_lazyimg' => array('type' => 'bgimg', 'value' => $this->getImageURL() . 'front/prdLoader.gif', 'scssType' => 'bgimg'),
            'pl_rollover' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'pl_infinite' => array('type' => 'default', 'value' => 'scroll', 'cached' => true),
            'hover_mobile_click' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),


            'pl_grid_layout' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'pl_grid_xl' => array('type' => 'default', 'value' => '3', 'cached' => true, 'scssType' => 'ignore'),
            'pl_grid_lg' => array('type' => 'default', 'value' => '3', 'cached' => true, 'scssType' => 'ignore'),
            'pl_grid_md' => array('type' => 'default', 'value' => '3', 'cached' => true, 'scssType' => 'ignore'),
            'pl_grid_sm' => array('type' => 'default', 'value' => '2', 'cached' => true, 'scssType' => 'ignore'),
            'pl_grid_xs' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'pl_grid_margin' => array('type' => 'default', 'value' => '10'),
            'pl_grid_padding' => array('type' => 'default', 'value' => ''),

            'pl_grid_b_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'pl_grid_b_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"rgba(218,218,218,0.74)","blur":"5","spread":"2","horizontal":"0","vertical":"1"}', 'scssType' => 'box-shadow'),
            'pl_grid_b_colors' => array('type' => 'default', 'value' => '1'),
            'pl_grid_b_bg' => array('type' => 'default', 'value' => ''),
            'pl_grid_b_text' => array('type' => 'default', 'value' => ''),
            'pl_grid_b_price' => array('type' => 'default', 'value' => ''),
            'pl_grid_b_oldprice' => array('type' => 'default', 'value' => ''),
            'pl_grid_b_rating' => array('type' => 'default', 'value' => ''),

            'pl_grid_bh_border_c' => array('type' => 'default', 'value' => ''),
            'pl_grid_bh_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'pl_grid_bh_colors' => array('type' => 'default', 'value' => '0'),
            'pl_grid_bh_bg' => array('type' => 'default', 'value' => ''),
            'pl_grid_bh_text' => array('type' => 'default', 'value' => ''),
            'pl_grid_bh_price' => array('type' => 'default', 'value' => ''),
            'pl_grid_bh_oldprice' => array('type' => 'default', 'value' => ''),
            'pl_grid_bh_rating' => array('type' => 'default', 'value' => ''),

            'pl_grid_name_font' => array('type' => 'json', 'value' => '{"size":"14","bold":400,"italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'pl_grid_price_font' => array('type' => 'json', 'value' => '{"size":"16","bold":"600","italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'pl_grid_colors' => array('type' => 'default', 'value' => 'show'),
            'pl_grid_func_btn' => array('type' => 'default', 'value' => '1'),
            'pl_grid_qv_btn' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'pl_grid_qv_btn_r' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'pl_grid_cart_btn' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'pl_grid_func_btn_r' => array('type' => 'default', 'value' => '1'),

            'pl_grid_name_trnc' => array('type' => 'default', 'value' => '1', 'cached' => true),

            /*Cart btn
            'pl_cart_btn_bg' => array('type' => 'default', 'value' => ''),
            'pl_cart_btn_color' => array('type' => 'default', 'value' => ''),
            'pl_cart_btn_border' => array('type' => 'json', 'value' => '', 'scssType' => 'border'),
            'pl_cart_btn_bg_h' => array('type' => 'default', 'value' => ''),
            'pl_cart_btn_color_h' => array('type' => 'default', 'value' => ''),
            'pl_cart_btn_border_h' => array('type' => 'default', 'value' => ''),*/

            /*Functional btn*/
            'pl_functional_bg' => array('type' => 'default', 'value' => '#232323'),
            'pl_functional_color' => array('type' => 'default', 'value' => '#ffffff'),
            'pl_functional_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#ececec"}', 'scssType' => 'border'),
            'pl_functional_btnradius' => array('type' => 'default', 'value' => '50'),
            'pl_functional_bg_h' => array('type' => 'default', 'value' => '#428bca'),
            'pl_functional_color_h' => array('type' => 'default', 'value' => '#ffffff'),
            'pl_functional_border_h' => array('type' => 'default', 'value' => ''),

            /*Deal*/
            'pl_deal_bg' => array('type' => 'default', 'value' => 'rgba(255, 255, 255, 0.8)'),
            'pl_deal_color' => array('type' => 'default', 'value' => '#232323'),
            'pl_deal_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),

            /*countdown widget*/
            'pl_cta_bg' => array('type' => 'default', 'value' => '#f5f5f5'),
            'pl_cta_color' => array('type' => 'default', 'value' => '#666666'),
            'pl_cta_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),
            'pl_cta_padding' => array('type' => 'default', 'value' => '10'),
            'pl_cta_no_font' => array('type' => 'json', 'value' => '{"size":"16","bold":600,"italic":null,"":null,"spacing":""}', 'scssType' => 'font'),
            'pl_cta_txt_font' => array('type' => 'json', 'value' => '{"size":"13","bold":"600","italic":null,"":null,"spacing":""}', 'scssType' => 'font'),

            /* style-3 Settings */
            'pl_s3_bg' => array('type' => 'default', 'value' => '#428bca'),
            'pl_s3_color' => array('type' => 'default', 'value' => '#ffffff'),
            'pl_s3_qv_color' => array('type' => 'default', 'value' => '#232323'),
            'pl_s3_border_color' => array('type' => 'default', 'value' => 'rgba(255,255,255,0.15)'),
            'pl_s3_color_h' => array('type' => 'default', 'value' => '#232323'),
            'pl_s3_qv_color_h' => array('type' => 'default', 'value' => '#428bca'),

            /* List Settings */
            'p_list_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"rgba(0,0,0,0.15)","blur":"16","spread":"0","horizontal":"0","vertical":"8"}', 'scssType' => 'box-shadow'),
            'p_list_color' => array('type' => 'default', 'value' => '#232323'),
            'p_list_color_h' => array('type' => 'default', 'value' => '#428bca'),
            'p_list_c_bg' => array('type' => 'default', 'value' => '#232323'),
            'p_list_c_color' => array('type' => 'default', 'value' => '#ffffff'),
            'p_list_c_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#877312"}', 'scssType' => 'border'),
            'p_list_c_bg_h' => array('type' => 'default', 'value' => '#428bca'),
            'p_list_c_color_h' => array('type' => 'default', 'value' => '#ffffff'),
            'p_list_c_border_h' => array('type' => 'default', 'value' => ''),

            /*Carousel Navigation*/
            'pl_crsl_bg' => array('type' => 'default', 'value' => '#232323'),
            'pl_crsl_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'pl_crsl_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#1d1d1d"}', 'scssType' => 'border'),
            'pl_crsl_bg_h' => array('type' => 'default', 'value' => '#428bca'),
            'pl_crsl_txt_h' => array('type' => 'default', 'value' => '#ffffff'),
            'pl_crsl_border_h' => array('type' => 'default', 'value' => ''),

            /*Pagination*/
            'pl_crsl_dot_bg' => array('type' => 'default', 'value' => '#666666'),
            'pl_crsl_dot_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#c6c7c9"}', 'scssType' => 'border'),
            'pl_crsl_dot_bg_h' => array('type' => 'default', 'value' => '#232323'),
            'pl_crsl_dot_border_h' => array('type' => 'default', 'value' => '#232323'),

            /* Category Page */
            'cat_layout' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'pl_layout' => array('type' => 'default', 'value' => 'grid', 'cached' => true),
            'cat_image' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'cat_desc' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'cat_sub_thumbs' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'cat_sub_hide_mobile' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),

            /* Product Page */
            'pp_layout' => array('type' => 'default', 'value' => '4', 'cached' => true),

            'pp_zoom' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),

            'pp_tabs_style' => array('type' => 'default', 'value' => 'horizontal', 'cached' => true),
            'pp_name_typo' => array('type' => 'json', 'value' => '{"size":"20","bold":400,"italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'pp_name_color' => array('type' => 'default', 'value' => '#232323'),
            'pp_price_typo' => array('type' => 'json', 'value' => '{"size":"20","bold":"600","italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'pp_price_color' => array('type' => 'default', 'value' => '#428bca'),
            'pp_navigation' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'pp_tags' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'pp_cats' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'pp_tagc_bg' => array('type' => 'default', 'value' => '#f9f9f9'),
            'pp_tagc_color' => array('type' => 'default', 'value' => '#232323'),
            'pp_tagc_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e9e9e9"}', 'scssType' => 'border'),
            'pp_tagc_bg_h' => array('type' => 'default', 'value' => '#232323'),
            'pp_tagc_color_h' => array('type' => 'default', 'value' => '#ffffff'),
            'pp_tagc_border_h' => array('type' => 'default', 'value' => '#232323'),
            'pp_img' => array('type' => 'default', 'value' => $this->getImageURL() . 'front/product-payment-logo.png', 'cached' => true, 'scssType' => 'ignore'),
            'pp_btn_color' => array('type' => 'default', 'value' => '#232323'),
            'pp_btn_color_h' => array('type' => 'default', 'value' => '#428bca'),

            'pp_tabs_typo' => array('type' => 'json', 'value' => '{"size":"14","bold":600,"italic":null,"uppercase":"1","spacing":""}', 'scssType' => 'font'),
            'pp_tabs_txt' => array('type' => 'default', 'value' => '#232323'),
            'pp_tabs_border' => array('type' => 'json', 'value' => '{"type":"none","width":"2","color":"#251919"}', 'scssType' => 'border'),
            'pp_tabs_txt_h' => array('type' => 'default', 'value' => '#428bca'),
            'pp_tabs_border_h' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#428bca"}', 'scssType' => 'border'),
            'pp_tabs_bg_r' => array('type' => 'default', 'value' => '#ffffff'),
            'pp_tabs_txt_r' => array('type' => 'default', 'value' => '#666666'),
            'pp_tabs_border_r' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),
            'pp_tabs_padding_r' => array('type' => 'json', 'value' => '{"top":"10","right":"10","bottom":"10","left":"10"}', 'scssType' => 'padding'),
            'pp_dd_tabs_bg_r' => array('type' => 'default', 'value' => '#ffffff'),
            'pp_dd_tabs_boxshadow' => array('type' => 'json', 'value' => '{"switch":"1","color":"rgba(0,0,0,0.35)","blur":"10","spread":"0","horizontal":"0","vertical":"3"}', 'scssType' => 'box-shadow'),
            'pp_link_tabs_bg_r' => array('type' => 'default', 'value' => 'rgba(255,255,255,0)'),
            'pp_link_tabs_txt_r' => array('type' => 'default', 'value' => '#666666'),
            'pp_link_tabs_border_r' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),
            'pp_link_tabs_lineheight' => array('type' => 'default', 'value' => '20'),
            'pp_link_tabs_padding_r' => array('type' => 'json', 'value' => '{"top":"8","right":"10","bottom":"8","left":"10"}', 'scssType' => 'padding'),
            'pp_link_tabs_bg_r_a' => array('type' => 'default', 'value' => '#f1f1f1'),
            'pp_link_tabs_txt_r_a' => array('type' => 'default', 'value' => '#232323'),

            /* footer-wrapper */
            'f_layout' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'f_text' => array('type' => 'default', 'value' => '#ffffff'),
            'f_link' => array('type' => 'default', 'value' => '#ffffff'),
            'f_link_h' => array('type' => 'default', 'value' => '#428bca'),
            'f_padding' => array('type' => 'json', 'value' => '{"top":"50","right":"","bottom":"38","left":""}', 'scssType' => 'padding'),
            'f_padding_r' => array('type' => 'json', 'value' => '{"top":"30","right":"","bottom":"30","left":""}', 'scssType' => 'padding'),
            'f_background' => array('type' => 'json', 'value' => '{"color":"#232323","repeat":"repeat","position":"center-center","size":"cover","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'f_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#393939"}', 'scssType' => 'border'),

            //footer after
            'fa_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#393939"}', 'scssType' => 'border'),
            'fa_padding' => array('type' => 'json', 'value' => '{"top":"38","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'fa_padding_r' => array('type' => 'json', 'value' => '{"top":"28","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'fa_mpadding' => array('type' => 'json', 'value' => '{"top":"40","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'fa_mpadding_r' => array('type' => 'json', 'value' => '{"top":"30","right":"","bottom":"","left":""}', 'scssType' => 'padding'),

            'f_block_title_layout' => array('type' => 'default', 'value' => '2', 'cached' => true),
            'f_block_title_position' => array('type' => 'default', 'value' => 'left', 'cached' => true),
            'f_block_title_color' => array('type' => 'default', 'value' => '#ffffff'),
            'f_block_title_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"2","color":"#428bca"}', 'scssType' => 'border'),
            'f_block_title_typo' => array('type' => 'json', 'value' => '{"size":"18","bold":500,"italic":null,"uppercase":"null","spacing":""}', 'scssType' => 'font'),

            'f_input_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),
            'f_input_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'f_input_txt' => array('type' => 'default', 'value' => '#666666'),
            'f_input_btn_bg' => array('type' => 'default', 'value' => '#428bca'),
            'f_input_btn' => array('type' => 'default', 'value' => '#ffffff'),
            'f_input_btn_bg_h' => array('type' => 'default', 'value' => '#000000'),
            'f_input_btn_h' => array('type' => 'default', 'value' => '#ffffff'),

            'f_social_c_t' => array('type' => 'default', 'value' => '1'),
            'f_social_c_t_h' => array('type' => 'default', 'value' => '1'),
            'f_social_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'f_social_txt_h' => array('type' => 'default', 'value' => '#ffffff'),

            'ft_text' => array('type' => 'default', 'value' => '#ffffff'),
            'ft_link' => array('type' => 'default', 'value' => '#ffffff'),
            'ft_link_h' => array('type' => 'default', 'value' => '#232323'),
            'ft_padding' => array('type' => 'json', 'value' => '{"top":"35","right":"","bottom":"35","left":""}', 'scssType' => 'padding'),
            'ft_padding_r' => array('type' => 'json', 'value' => '{"top":"","right":"","bottom":"","left":""}', 'scssType' => 'padding'),
            'ft_background' => array('type' => 'json', 'value' => '{"color":"","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'ft_border' => array('type' => 'json', 'value' => '{"type":"none","width":"1","color":""}', 'scssType' => 'border'),

            /* conatct Information */
            'cinfo_img' => array('type' => 'default', 'value' => '', 'cached' => true, 'scssType' => 'ignore'),
            'cinfo_desc' => array('type' => 'txt', 'value' => '', 'cached' => true, 'scssType' => 'ignore'),
            'cinfo_title' => array('type' => 'txt', 'value' => 'Store Information', 'cached' => true, 'scssType' => 'ignore'),
            'cinfo_add' => array('type' => 'txt', 'value' => 'B-14 Collins Street West Victoria 2386.', 'cached' => true, 'scssType' => 'ignore'),
            'cinfo_no' => array('type' => 'txt', 'value' => '0123456789', 'cached' => true, 'scssType' => 'ignore'),
            'cinfo_fno' => array('type' => 'txt', 'value' => '0123456789', 'cached' => true, 'scssType' => 'ignore'),
            'cinfo_email' => array('type' => 'txt', 'value' => 'Contact@yourcompany.com', 'cached' => true, 'scssType' => 'ignore'),

            /* Footer Copyrights */
            'fc_status' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'fc_text' => array('type' => 'default', 'value' => '#ffffff'),
            'fc_link' => array('type' => 'default', 'value' => '#ffffff'),
            'fc_link_h' => array('type' => 'default', 'value' => '#428bca'),
            'fc_padding' => array('type' => 'json', 'value' => '{"top":"20","right":"","bottom":"20","left":""}', 'scssType' => 'padding'),
            'fc_padding_r' => array('type' => 'json', 'value' => '{"top":"12","right":"","bottom":"12","left":""}', 'scssType' => 'padding'),
            'fc_background' => array('type' => 'json', 'value' => '{"color":"","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'fc_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#393939"}', 'scssType' => 'border'),
            'fc_copyright' => array('type' => 'txt', 'value' => '<p><a class="_blank" href="http://www.prestashop.com" target="_blank" rel="noreferrer noopener">© 2019 - Ecommerce software by PrestaShop™</a></p>', 'cached' => true, 'scssType' => 'ignore'),
            'fc_sys_img' => array('type' => 'default', 'value' => $this->getImageURL() . 'front/system-logo.png', 'cached' => true, 'scssType' => 'ignore'),
            'fc_img' => array('type' => 'default', 'value' => $this->getImageURL() . 'front/payment-logo.png', 'cached' => true, 'scssType' => 'ignore'),

            /* Buttons */
            'primarybtn_bg' => array('type' => 'default', 'value' => '#232323'),
            'primarybtn_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'primarybtn_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#232323"}', 'scssType' => 'border'),
            'primarybtn_bg_h' => array('type' => 'default', 'value' => '#428bca'),
            'primarybtn_txt_h' => array('type' => 'default', 'value' => '#ffffff'),
            'primarybtn_border_h' => array('type' => 'default', 'value' => '#428bca'),

            'secondarybtn_bg' => array('type' => 'default', 'value' => '#428bca'),
            'secondarybtn_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'secondarybtn_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#428bca"}', 'scssType' => 'border'),
            'secondarybtn_bg_h' => array('type' => 'default', 'value' => '#232323'),
            'secondarybtn_txt_h' => array('type' => 'default', 'value' => '#ffffff'),
            'secondarybtn_border_h' => array('type' => 'default', 'value' => '#232323'),

            /* Breadcrumb */
            'bc_status' => array('type' => 'default', 'value' => '1'),
            'bc_width' => array('type' => 'default', 'value' => 'fullwidth-bg', 'cached' => true),
            'bc_align' => array('type' => 'default', 'value' => 'center', 'cached' => true),
            'bc_padding' => array('type' => 'json', 'value' => '{"top":"15","right":"15","bottom":"15","left":"15"}', 'scssType' => 'padding'),
            'bc_padding_r' => array('type' => 'json', 'value' => '{"top":"10","right":"10","bottom":"10","left":"10"}', 'scssType' => 'padding'),
            'bc_font' => array('type' => 'json', 'value' => '{"size":"14","bold":400,"italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'bc_link' => array('type' => 'default', 'value' => '#666666'),
            'bc_link_h' => array('type' => 'default', 'value' => '#232323'),
            'bc_background' => array('type' => 'json', 'value' => '{"color":"#f5f5f5","repeat":"repeat","position":"left-top","size":"auto","attachment":"fixed","img":""}', 'scssType' => 'background'),
            'bc_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),

            /* Forms */
            'form_input_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'form_input_txt' => array('type' => 'default', 'value' => '#666666'),
            'form_input_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e5e5e5"}', 'scssType' => 'border'),
            'form_input_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'form_input_bg_h' => array('type' => 'default', 'value' => '#ffffff'),
            'form_input_border_c_h' => array('type' => 'default', 'value' => '#e5e5e5'),
            'form_input_boxshadow_h' => array('type' => 'json', 'value' => '{"switch":"1","color":"#232323","blur":"0","spread":"1","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),

            'form_radio_checked' => array('type' => 'default', 'value' => '#5f5f5f'),
            'form_radio_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'form_radio_border' => array('type' => 'default', 'value' => '#e5e5e5'),

            'form_dropdown_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'form_dropdown_txt' => array('type' => 'default', 'value' => '#666666'),
            'form_dropdown_txt_h' => array('type' => 'default', 'value' => '#232323'),
            'form_dropdown_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"rgba(0,0,0,0.15)"}', 'scssType' => 'border'),
            'form_dropdown_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"","blur":"0","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),

            /* Label - Prices */
            'lp_price' => array('type' => 'default', 'value' => '#000000'),
            'lp_old_price' => array('type' => 'default', 'value' => '#666666'),
            'lp_ratings' => array('type' => 'default', 'value' => '#ffc315'),
            'lp_label_font' => array('type' => 'json', 'value' => '{"size":"12","bold":"500","italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'lp_new_l_bg' => array('type' => 'default', 'value' => '#428bca'),
            'lp_new_l_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'lp_sale_l_bg' => array('type' => 'default', 'value' => '#f46e6e'),
            'lp_sale_l_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'lp_online_l_bg' => array('type' => 'default', 'value' => '#000000'),
            'lp_online_l_txt' => array('type' => 'default', 'value' => '#ffffff'),

            /* Tooltip Settings */
            'tip_toggle' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'tip_font' => array('type' => 'json', 'value' => '{"size":"13","bold":"500","italic":null,"uppercase":null,"spacing":""}', 'scssType' => 'font'),
            'tip_lineheight' => array('type' => 'default', 'value' => '14'),
            'tip_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'tip_txt' => array('type' => 'default', 'value' => '#1c1c1c'),
            'tip_boxshadow' => array('type' => 'json', 'value' => '{"switch":"1","color":"rgba(0,0,0,0.15)","blur":"16","spread":"0","horizontal":"0","vertical":"8"}', 'scssType' => 'box-shadow'),

            /* Responsive */
            'res_h_layout' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'res_header_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'res_header_boxshadow' => array('type' => 'json', 'value' => '{"switch":"0","color":"#3881a1","blur":"24","spread":"0","horizontal":"0","vertical":"0"}', 'scssType' => 'box-shadow'),
            'res_header_text' => array('type' => 'default', 'value' => '#666666'),
            'res_header_h_text' => array('type' => 'default', 'value' => '#428bca'),
            'res_header_mtitle_bg' => array('type' => 'default', 'value' => '#f5f5f5'),
            'res_header_mtitle' => array('type' => 'default', 'value' => '#232323'),
            'res_header_mborder' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e8e8e8"}', 'scssType' => 'border'),

            /* Cookie */
            'cookie_status' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_msg' => array('type' => 'txt', 'value' => 'This website uses cookies to ensure you get the best experience on our website.', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_btntxt' => array('type' => 'txt', 'value' => 'Got It!', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_moretxt' => array('type' => 'txt', 'value' => 'Learn more', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_morelnk' => array('type' => 'txt', 'value' => '#', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_position' => array('type' => 'default', 'value' => 'bottom-left', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_theme' => array('type' => 'default', 'value' => 'classic', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_expiry' => array('type' => 'default', 'value' => '40', 'cached' => true, 'scssType' => 'ignore'),
            'cookie_bg' => array('type' => 'default', 'value' => 'rgba(0,0,0,0.8)'),
            'cookie_txt_c' => array('type' => 'default', 'value' => '#ffffff'),
            'cookie_more_c' => array('type' => 'default', 'value' => '#ffffff'),
            'cookie_btnbg_c' => array('type' => 'default', 'value' => '#ffffff'),
            'cookie_btntxt_c' => array('type' => 'default', 'value' => '#000000'),
            'cookie_btnbg_h_c' => array('type' => 'default', 'value' => '#1d1d1d'),
            'cookie_btntxt_h_c' => array('type' => 'default', 'value' => '#ffffff'),
            'cookie_btnradius' => array('type' => 'default', 'value' => '30'),

            /* Maintance */
            'mt_background' => array('type' => 'json', 'value' => '{"color":"#b1b1b1","repeat":"no-repeat","position":"center-center","size":"auto","attachment":"fixed","img":"' . $this->getImageURL() . 'front/maintenance.jpg"}', 'scssType' => 'background'),
            'mt_text_color' => array('type' => 'default', 'value' => '#ffffff'),
            'mt_logo' => array('type' => 'default', 'value' => '', 'cached' => true, 'scssType' => 'ignore'),
            'mt_countdown' => array('type' => 'default', 'value' => '1', 'cached' => true, 'scssType' => 'ignore'),
            'mt_date' => array('type' => 'default', 'value' => '2018-10-24 00:00:00', 'cached' => true, 'scssType' => 'ignore'),
            'mt_newsletter' => array('type' => 'default', 'value' => '1', 'cached' => true),
            'mt_form_bg' => array('type' => 'default', 'value' => '#ffffff'),
            'mt_form_txt' => array('type' => 'default', 'value' => '#000000'),
            'mt_form_border' => array('type' => 'json', 'value' => '{"type":"solid","width":"1","color":"#e0dfdf"}', 'scssType' => 'border'),
            'mt_button_bg' => array('type' => 'default', 'value' => '#000000'),
            'mt_button_txt' => array('type' => 'default', 'value' => '#ffffff'),
            'mt_button_bg_h' => array('type' => 'default', 'value' => '#727272'),
            'mt_button_txt_h' => array('type' => 'default', 'value' => '#ffffff'),
            'mt_social' => array('type' => 'default', 'cached' => true, 'value' => '1', 'scssType' => 'ignore'),

            /* Custom Code */
            'codes_css' => array('type' => 'raw', 'value' => ''),
            'codes_js' => array('type' => 'raw', 'value' => '', 'scssType' => 'ignore'),
        );

        $this->systemFonts = array(
            array(
                'id_option' => 'Arial, Helvetica, sans-serif',
                'name' => 'Arial, Helvetica, sans-serif'
            ),
            array(
                'id_option' => 'Georgia, serif',
                'name' => 'Georgia, serif'
            ),
            array(
                'id_option' => 'Tahoma, Geneva, sans-serif',
                'name' => 'Tahoma, Geneva, sans-serif'
            ),
            array(
                'id_option' => '"Times New Roman", Times, serif',
                'name' => '"Times New Roman", Times, serif'
            ),
            array(
                'id_option' => 'Verdana, Geneva, sans-serif',
                'name' => 'Verdana, Geneva, sans-serif'
            )
        );

        $this->displayName = $this->l('TD - Theme Customizer');
        $this->description = $this->l('This module will allow you to Updates Color and settings on your store.');
    }

    public function install()
    {
        $this->setDefaults();
        $this->generateCssAndJs(true);
        return parent::install()
            && $this->installTab()
            && $this->registerHook('header')
            && $this->registerHook('displayMaintenance')
            && $this->registerHook('displayPrevNext')
            && $this->registerHook('ProductSearchProvider')
            && $this->registerHook('actionProductSearchAfter')
            && $this->registerHook('actionProductSearchComplete')
            && $this->registerHook('displayBeforeBodyClosingTag')
            && $this->registerHook('actionBeforeElementorWidgetRender');
    }

    public function uninstall()
    {
        foreach ($this->defaults as $key => $default) {
            Configuration::deleteByName($this->cfgName . $key);
        }
        Configuration::deleteByName($this->cfgName . 'options');

        return parent::uninstall()
            && $this->uninstallTab();
    }

    public function setDefaults()
    {
        $var = array();

        foreach ($this->defaults as $key => $default) {
            Configuration::updateValue($this->cfgName . $key, $default['value']);
            if (isset($default['cached'])) {
                $var[$key] = $default['value'];
            }
        }

        Configuration::updateValue($this->cfgName . 'options', Tools::jsonEncode($var));

        return true;
    }

    private function getImageURL()
    {
        return Tools::getHttpHost(true) . __PS_BASE_URI__ . 'modules/' . $this->name . '/views/img/';
    }

    public function setCachedOptions()
    {
        $var = array();

        foreach ($this->defaults as $key => $default) {
            if (isset($default['cached'])) {
                $var[$key] = Configuration::get($this->cfgName . $key);
            }
        }
        Configuration::updateValue($this->cfgName . 'options', Tools::jsonEncode($var));
        return true;
    }

    public function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminTdThemeSettings";
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = "TD - Theme Settings";
        }
        $tab->id_parent = (int) Tab::getIdFromClassName('AdminParentThemes');
        $tab->module = $this->name;
        return $tab->add();
    }

    public function uninstallTab()
    {
        $id_tab = (int) Tab::getIdFromClassName('AdminTdThemeSettings');
        $tab = new Tab($id_tab);
        return $tab->delete();
    }

    public function getContent()
    {
        Tools::redirectAdmin(
            $this->context->link->getAdminLink('AdminTdThemeSettings')
        );
    }

    public function generateCssAndJs($allShops = false)
    {
        $result = $this->generateCssAndJsProcess($allShops);
        return $result['message'];
    }

    public function generateCssAndJsProcess($allShops = false)
    {
        include_once _PS_MODULE_DIR_ . 'tdthemesettings/classes/scss.inc.php';

        $css = '';
        $css .= Configuration::get($this->cfgName . 'typo_font_include');

        $vars = '';
        $compiler = new scssc();
        $compiler->setFormatter('scss_formatter_compressed');
        $compiler->setImportPaths($this->local_path . 'views/scss/');

        foreach ($this->defaults as $key => $default) {
            if ($key == 'codes_css') {
                continue;
            }

            if (isset($default['scssType'])) {
                switch ($default['scssType']) {
                    case 'ignore':
                        continue;
                        break;
                    case 'border':
                        $vars .= ' ' . $this->configToScssVar($key, 'border') . PHP_EOL;
                        break;
                    case 'box-shadow':
                        $vars .= ' ' . $this->configToScssVar($key, 'box-shadow') . PHP_EOL;
                        break;
                    case 'background':
                        $vars .= ' ' . $this->configToScssVar($key, 'background') . PHP_EOL;
                        break;
                    case 'bgimg':
                        $vars .= ' ' . $this->configToScssVar($key, 'bgimg') . PHP_EOL;
                        break;
                    case 'font':
                        $vars .= ' ' . $this->configToScssVar($key, 'font') . PHP_EOL;
                        break;
                    case 'padding':
                        $vars .= ' ' . $this->configToScssVar($key, 'padding') . PHP_EOL;
                        break;
                }
            } else {
                $vars .= ' ' . $this->configToScssVar($key) . PHP_EOL;
            }
        }
        try {
            $css .= $compiler->compile($vars . ' @import "tdthemesettings.scss";');
        } catch (Exception $e) {
            $message = '<div class="alert alert-danger">' . $this->l('There is error in SCSS to CSS compiler');
            $message .= '<ul><li>' . $e->getMessage() . ' </li></ul></div>';
            return ['success' => false, 'message' => $message];
        }

        $css .= Configuration::get($this->cfgName . 'codes_css');
        $css = trim(preg_replace('/\s+/', ' ', $css));

        if (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $js = ' ';
            $js .= Configuration::get($this->cfgName . 'codes_js');
            $myFile = $this->local_path . "views/js/theme_" . (int) $this->context->shop->getContextShopID() . ".js";
            if (!file_put_contents($myFile, $js)) {
                $message = '<div class="alert alert-danger">' . $this->l('Problem with file permissions') . '</div>';
                return ['success' => false, 'message' => $message];
            }
        }

        if ($allShops) {
            $shops = Shop::getShopsCollection();
            foreach ($shops as $shop) {
                $myFile = $this->local_path . "views/css/theme_" . (int) $shop->id . ".css";
                file_put_contents($myFile, $css);
            }
            self::clearAssetsCache();
        } else {
            if (Shop::getContext() == Shop::CONTEXT_SHOP) {
                $myFile = $this->local_path . "views/css/theme_" . (int) $this->context->shop->getContextShopID() . ".css";
                if (file_put_contents($myFile, $css)) {
                    self::clearAssetsCache();
                    $message = '<div class="alert alert-success">' . $this->l('Seting saved. Refresh your frontoffice with CTRL + f5 to see results. ') . '</div>';
                    return ['success' => true, 'message' => $message];
                } else {
                    $message = '<div class="alert alert-danger">' . $this->l('Problem with file permissions') . '</div>';
                    return ['success' => false, 'message' => $message];
                }
            }
        }
    }

    public static function clearAssetsCache()
    {
        $files = glob(_PS_THEME_DIR_ . 'assets/cache/*');

        foreach ($files as $file) {
            if ('index.php' !== basename($file)) {
                Tools::deleteFile($file);
            }
        }
    }

    public function configToScssVar($name, $type = 'default', $options = '')
    {
        if ($type == 'default') {
            $val = Configuration::get($this->cfgName . $name);
            $var = '$' . $name . ': ' . (!empty($val) ? $val : 'null') . ';';
        } elseif ($type == 'bgimg') {
            $val = Configuration::get($this->cfgName . $name);
            $var = '$' . $name . ': ' . (!empty($val) ? 'url(\'' . $val . '\')' : 'null') . ';';
        } elseif ($type == 'box-shadow') {
            $boxshadow = Tools::jsonDecode(Configuration::get($this->cfgName . $name), true);
            if ($boxshadow['switch']) {
                $var = '$' . $name . ':  ' . (int) $boxshadow['horizontal'] . 'px ' . (int) $boxshadow['vertical'] . 'px ' . (int) $boxshadow['blur'] . 'px ' . (int) $boxshadow['spread'] . 'px ' . $boxshadow['color'] . ';';
            } else {
                $var = '$' . $name . ': none;';
            }
        } elseif ($type == 'border') {
            $border = Tools::jsonDecode(Configuration::get($this->cfgName . $name), true);
            $var = '$' . $name . ': ' . $border['type'] . ' ' . (int) $border['width'] . 'px ' . $border['color'] . ';';
            $var .= '$' . $name . '_width:' . ((int) $border['width']) . ';' . PHP_EOL;
            $var .= '$' . $name . '_type:' . (!empty($border['type']) ? $border['type'] : 'null') . ';' . PHP_EOL;
        } elseif ($type == 'background') {
            $background = Tools::jsonDecode(Configuration::get($this->cfgName . $name), true);
            if ($background['img'] != '') {
                $var = '$' . $name . ': ' . (!empty($background['color']) ? $background['color'] : '') . ' url("' . $background['img'] . '") ' . str_replace('-', ' ', $background['position']) . ' / ' . $background['size'] . ' ' . $background['repeat'] . ' ' . $background['attachment'] . ';';
            } else {
                $var = '$' . $name . ': ' . (!empty($background['color']) ? $background['color'] : 'null') . ';';
            }
        } elseif ($type == 'font') {
            $font = Tools::jsonDecode(Configuration::get($this->cfgName . $name), true);
            $var = '$' . $name . '_size:' . (!empty($font['size']) ? $font['size'] : 'null') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_spacing:' . (!empty($font['spacing']) ? $font['spacing'] : 'null') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_style:' . (!empty($font['italic']) ? 'italic' : 'normal') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_weight:' . (!empty($font['bold']) ? $font['bold'] : 'normal') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_uppercase:' . (!empty($font['uppercase']) ? 'uppercase' : 'none') . ';';
        } elseif ($type == 'padding') {
            $padding = Tools::jsonDecode(Configuration::get($this->cfgName . $name), true);
            $var = '$' . $name . '_top:' . (isset($padding['top']) && $padding['top'] >= "0" ? $padding['top'] : 'null') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_right:' . (isset($padding['right']) && $padding['right'] >= "0" ? $padding['right'] : 'null') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_bottom:' . (isset($padding['bottom']) && $padding['bottom'] >= "0" ? $padding['bottom'] : 'null') . ';' . PHP_EOL;;
            $var .= '$' . $name . '_left:' . (isset($padding['left']) && $padding['left'] >= "0" ? $padding['left'] : 'null') . ';';
        }

        return $var;
    }

    public function getOptions($options, $full = true)
    {
        $idLang = (int) $this->context->language->id;
        $options = Tools::jsonDecode($options, true);

        if (Tools::getValue('layout')) {
            $options['g_layout'] = Tools::getValue('layout');
        }
        if (Tools::getValue('header')) {
            $options['h_layout'] = Tools::getValue('header');
        }
        if (Tools::getValue('footer')) {
            $options['f_layout'] = Tools::getValue('footer');
        }
        if (Tools::getValue('rheader')) {
            $options['res_h_layout'] = Tools::getValue('rheader');
        }
        if (Tools::getValue('cat_layout')) {
            $options['cat_layout'] = Tools::getValue('cat_layout');
        }
        if (Tools::getValue('grid_layout')) {
            $options['pl_grid_layout'] = Tools::getValue('grid_layout');
        }
        if (Tools::getValue('product_load')) {
            $options['pl_infinite'] = Tools::getValue('product_load');
        }
        if (Tools::getValue('ptab_style')) {
            $options['pp_tabs_style'] = Tools::getValue('ptab_style');
        }
        if (Tools::getValue('xl')) {
            $options['pl_grid_xl'] = Tools::getValue('xl');
        }
        if (Tools::getValue('lg')) {
            $options['pl_grid_lg'] = Tools::getValue('lg');
        }
        if (Tools::getValue('md')) {
            $options['pl_grid_md'] = Tools::getValue('md');
        }
        if (Tools::getValue('sm')) {
            $options['pl_grid_sm'] = Tools::getValue('sm');
        }
        if (Tools::getValue('xs')) {
            $options['pl_grid_xs'] = Tools::getValue('xs');
        }

        if (Tools::getValue('list')) {
            $options['pl_layout'] = Tools::getValue('list');
        } elseif (isset($this->context->cookie->product_list_view)) {
            $options['pl_layout'] = $this->context->cookie->product_list_view;
        }

        if (Tools::getValue('product_style')) {
            $options['pp_layout'] = Tools::getValue('product_style');
        }

        if ($full) {
            /* google fonts */
            if ($options['typo_bfont_t'] == 'google') {
                $options['google_font_b'] = $options['typo_bfont_g_url'];
            }

            if ($options['typo_hfont_t'] == 'google') {
                $options['google_font_h'] = $options['typo_hfont_g_url'];
            }

            if ($options['typo_tfont_t'] == 'google') {
                $options['google_font_t'] = $options['typo_tfont_g_url'];
            }

            $options['codes_body'] = Configuration::get($this->cfgName . 'codes_body');
            $options['codes_head'] = Configuration::get($this->cfgName . 'codes_head');
            $options['welcome_msg'] = Configuration::get($this->cfgName . 'welcome_msg', $idLang);
            $options['cinfo_title'] = Configuration::get($this->cfgName . 'cinfo_title', $idLang);
            $options['cinfo_desc'] = Configuration::get($this->cfgName . 'cinfo_desc', $idLang);
            $options['cinfo_add'] = Configuration::get($this->cfgName . 'cinfo_add', $idLang);
            $options['cinfo_no'] = Configuration::get($this->cfgName . 'cinfo_no', $idLang);
            $options['cinfo_fno'] = Configuration::get($this->cfgName . 'cinfo_fno', $idLang);
            $options['cinfo_email'] = Configuration::get($this->cfgName . 'cinfo_email', $idLang);
            $options['fc_copyright'] = Configuration::get($this->cfgName . 'fc_copyright', $idLang);
            $options['cookie_msg'] = Configuration::get($this->cfgName . 'cookie_msg', $idLang);
            $options['cookie_btntxt'] = Configuration::get($this->cfgName . 'cookie_btntxt', $idLang);
            $options['cookie_moretxt'] = Configuration::get($this->cfgName . 'cookie_moretxt', $idLang);
            $options['cookie_morelnk'] = Configuration::get($this->cfgName . 'cookie_morelnk', $idLang);
        }
        return $options;
    }

    public function addJsVars($options)
    {
        Media::addJsDef(array(
            'themeOpt' => [
                'g_preloader' => $options['g_preloader'],
                'g_bttop'     => $options['g_btt_status'],
                'pp_zoom'     => $options['pp_zoom'],
                'owlnext'     => $this->l('Next'),
                'owlprev'     => $this->l('Prev'),
                'hover_mobile_click'     => $options['hover_mobile_click'],
                'tip_toggle'     => $options['tip_toggle'],
                'infiniteScroll' => $options['pl_infinite'],
                'h_layout' => $options['h_layout']
            ]
        ));
    }

    public function hookHeader()
    {
        $optionsData = Configuration::get($this->cfgName . 'options');
        if (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $this->context->controller->registerStylesheet('modules-' . $this->name . '-style-custom', 'modules/' . $this->name . '/views/css/theme_' . (int) $this->context->shop->getContextShopID() . '.css', ['media' => 'all', 'priority' => 150]);
        }

        $options = $this->getOptions($optionsData);
        $this->addJsVars($options);

        $this->context->controller->registerStylesheet('modules-fontawesome', 'modules/' . $this->name . '/views/css/font-awesome.css', ['media' => 'all', 'priority' => 150]);
        $this->context->controller->registerStylesheet('modules-icofont', 'modules/' . $this->name . '/views/css/icofont.min.css', ['media' => 'all', 'priority' => 150]);
        $this->context->controller->registerJavascript('jquery-tdscripts', 'modules/' . $this->name . '/views/js/scripts.js', ['position' => 'bottom', 'priority' => 10]);

        $this->context->controller->registerJavascript('modules' . $this->name . '-script', 'modules/' . $this->name . '/views/js/theme_' . (int) $this->context->shop->getContextShopID() . '.js', ['position' => 'bottom', 'priority' => 150]);
        $this->context->smarty->assign('themeOpt', $options);
    }

    /* Product Page Navigation */
    public function getPositionInCategory($id_product, $id_category)
    {
        $result = Db::getInstance()->getRow('SELECT position
            FROM `' . _DB_PREFIX_ . 'category_product`
            WHERE id_category = ' . (int) $id_category . '
            AND id_product = ' . (int) $id_product);
        return (int) $result['position'];
    }

    public function getNextInCategory($position, $id_category)
    {
        $result = Db::getInstance()->getRow('SELECT cp.id_product as id_product
            FROM `' . _DB_PREFIX_ . 'category_product` as cp
            RIGHT JOIN `' . _DB_PREFIX_ . 'product` as p
            ON p.id_product=cp.id_product
            WHERE cp.id_category = ' . (int) $id_category . '
            AND p.active = 1
            AND cp.position > ' . (int) $position . ' ORDER BY cp.position ASC');

        if (isset($result['id_product'])) {
            return $result['id_product'];
        }
    }

    public function getPreviousInCategory($position, $id_category)
    {
        $result = Db::getInstance()->getRow('SELECT cp.id_product  as id_product
            FROM `' . _DB_PREFIX_ . 'category_product` as cp
            RIGHT JOIN `' . _DB_PREFIX_ . 'product` as p
            ON p.id_product=cp.id_product
            WHERE cp.id_category = ' . (int) $id_category . '
            AND p.active = 1
            AND cp.position < ' . (int) $position . ' ORDER BY cp.position DESC');
        if (isset($result['id_product'])) {
            return $result['id_product'];
        }
    }

    public function hookDisplayPrevNext($params)
    {
        $optionsData = Configuration::get($this->cfgName . 'options');
        $options = $this->getOptions($optionsData);

        if ($options['pp_navigation'] == '1' && $this->context->controller->php_self == 'product') {
            $id_product = (int) $params['smarty']->tpl_vars['product']->value['id_product'];
            $id_category_default = (int) $params['smarty']->tpl_vars['product']->value['id_category_default'];
            $position = $this->getPositionInCategory($id_product, $id_category_default);
            $idLang = (int) $this->context->language->id;

            $previous = $this->getPreviousInCategory($position, $id_category_default);
            $previousProduct = new Product($previous, false, $idLang);
            $prevProduct_image = $previousProduct->getCoverWs();

            $next = $this->getNextInCategory($position, $id_category_default);
            $nextProduct = new Product($next, false, $idLang);
            $nextProduct_image = $nextProduct->getCoverWs();

            $links = array();

            if (isset($previous) && $previous > 0) {
                $this->context->smarty->assign(array(
                    'previous' => $previousProduct,
                    'previousImage' => $prevProduct_image
                ));
            }

            if (isset($next) && $next > 0) {
                $this->context->smarty->assign(array(
                    'next' => $nextProduct,
                    'nextImage' => $nextProduct_image
                ));
            }
            $this->context->smarty->assign('id_lang', $idLang);
            return $this->fetch('module:' . $this->name . '/views/templates/hook/tdprevnext.tpl');
        }
    }

    public function hookDisplayBeforeBodyClosingTag($params)
    {
        $optionsData = Configuration::get($this->cfgName . 'options');
        $options = $this->getOptions($optionsData);

        if ($options['cookie_status'] == '1') {
            $this->context->smarty->assign('themeOpt', $options);
            return $this->fetch('module:' . $this->name . '/views/templates/hook/cookie_law.tpl');
        }
    }

    public function hookProductSearchProvider()
    {
        if (Tools::getIsset('from-xhr')) {
            if (Tools::getIsset('productListView')) {
                $view = Tools::getValue('productListView');
                if ($view == 'grid') {
                    $this->context->cookie->__set('product_list_view', 'grid');
                } elseif ($view == 'list') {
                    $this->context->cookie->__set('product_list_view', 'list');
                }
                $this->context->cookie->write();
            }

            $optionsData = Configuration::get($this->cfgName . 'options');
            $options = $this->getOptions($optionsData, false);
            $configuration['is_catalog'] = (bool) Configuration::isCatalogMode();
            $this->context->smarty->assign(array(
                'themeOpt' => $options,
                'configuration' => $configuration,
            ));
        }
    }

    public function hookActionProductSearchAfter()
    {
        if (Tools::getIsset('ajax') || Tools::getIsset('ajaxMode')) {
            $optionsData = Configuration::get($this->cfgName . 'options');
            $options = $this->getOptions($optionsData, false);
            $configuration['is_catalog'] = (bool) Configuration::isCatalogMode();
            $this->context->smarty->assign(array(
                'themeOpt' => $options,
                'configuration' => $configuration,
            ));
        }
    }

    public function hookActionProductSearchComplete($hook_args)
    {
        if (isset($hook_args['js_enabled']) && $hook_args['js_enabled']) {
            if (Tools::getIsset('productListView')) {
                $view = Tools::getValue('productListView');
                if ($view == 'grid') {
                    $this->context->cookie->__set('product_list_view', 'grid');
                } elseif ($view == 'list') {
                    $this->context->cookie->__set('product_list_view', 'list');
                }
                $this->context->cookie->write();
            }

            $optionsData = Configuration::get($this->cfgName . 'options');
            $options = $this->getOptions($optionsData, false);
            $this->context->smarty->assign('themeOpt', $options);
        }
    }

    public function hookActionBeforeElementorWidgetRender()
    {
        $optionsData = Configuration::get($this->cfgName . 'options');
        return $options = $this->getOptions($optionsData, false);
    }

    public function hookDisplayMaintenance()
    {
        $this->hookHeader();
        $this->context->smarty->assign('tdThemeMaintenanceJs', $this->_path . 'views/js/maintenance.js');
    }
}
