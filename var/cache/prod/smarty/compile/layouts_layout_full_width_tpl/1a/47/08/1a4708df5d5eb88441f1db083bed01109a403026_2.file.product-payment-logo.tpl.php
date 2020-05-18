<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:09
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-payment-logo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23855d936d9_51385176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a4708df5d5eb88441f1db083bed01109a403026' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-payment-logo.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec23855d936d9_51385176 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['pp_img']) && $_smarty_tpl->tpl_vars['themeOpt']->value['pp_img']) {?>
  <div class="product-payment-logo">
    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['pp_img'], ENT_QUOTES, 'UTF-8');?>
" class="img-fluid" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Payments Logo','d'=>'Shop.ThemeDelights'),$_smarty_tpl ) );?>
"/>
  </div>
<?php }
}
}
