<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:03
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\offcanvas-modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ccb248f04_40704778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c9c253925fbbcc0f8ff31a02bc73f9d4cde6357' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\offcanvas-modal.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ccb248f04_40704778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<div class="modal fade" id="offcanvas_search_filter" tabindex="-1" role="dialog" data-modal-hide-mobile>
    <div class="modal-dialog modal-dialog-centered modal-dialog__offcanvas modal-dialog__offcanvas--left" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
">
                    <span class="material-icons">arrow_back</span>
                </button>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Filter By','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

            </div>
            <div class="modal-body">
                <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['cat_layout'] == 3) {?>
                  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13173460625ebc1ccb247a52_15087057', 'product_list_facets_center');
?>

                <?php }?>
                <div id="_mobile_search_filters_wrapper"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mobile_top_menu_wrapper" tabindex="-1" role="dialog" data-modal-hide-mobile>
    <div class="modal-dialog modal-dialog__offcanvas" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
">
                    <span aria-hidden="true"><i class="material-icons">close</i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
                <div id="_mobile_bitmegamenu-mobile"></div>
                <div class="responsive-content mobile">
                    <div id="_mobile_language_selector"></div>
                    <div id="_mobile_currency_selector"></div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
/* {block 'product_list_facets_center'} */
class Block_13173460625ebc1ccb247a52_15087057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_facets_center' => 
  array (
    0 => 'Block_13173460625ebc1ccb247a52_15087057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['widget'][0], array( array('name'=>"ps_facetedsearch"),$_smarty_tpl ) );?>

                  <?php
}
}
/* {/block 'product_list_facets_center'} */
}
