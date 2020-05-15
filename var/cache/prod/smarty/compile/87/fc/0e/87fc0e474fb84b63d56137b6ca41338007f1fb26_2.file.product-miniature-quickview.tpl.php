<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:51:50
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\miniatures\_partials\product-miniature-quickview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3c06aaadc9_21913353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87fc0e474fb84b63d56137b6ca41338007f1fb26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\miniatures\\_partials\\product-miniature-quickview.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe3c06aaadc9_21913353 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['pl_grid_qv_btn']) && $_smarty_tpl->tpl_vars['themeOpt']->value['pl_grid_qv_btn'] == "1") {?>
    <div class="quick-view-wrapper">
        <a href="#" class="quick-view btn btn-primary tip_inside" data-link-action="quickview">
                        <svg width="18px" height="18px" fill="currentcolor">
                <use xlink:href="#tdsquickview">
                </use>
            </svg>
            <span class="lblquickview tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick view','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
        </a>
    </div>
<?php }
}
}
