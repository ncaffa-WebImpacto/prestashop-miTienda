<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:01
  from 'C:\xampp\htdocs\mitienda\modules\tdcompare\views\templates\hook\product-compare-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc96a39e9_57720441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98cf6eefdc203d0781996444f3a545363a19e919' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdcompare\\views\\templates\\hook\\product-compare-header.tpl',
      1 => 1589356895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc96a39e9_57720441 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
	<a class="bt_compare" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['compareUrl']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare','mod'=>'tdcompare'),$_smarty_tpl ) );?>
" rel="nofollow">
		<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare','mod'=>'tdcompare'),$_smarty_tpl ) );?>
 (<span class="total-compare-val"><?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['compared_products']->value), ENT_QUOTES, 'UTF-8');?>
</span>)</span>
	</a>
	<input type="hidden" name="compare_product_count" class="compare_product_count" value="<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['compared_products']->value), ENT_QUOTES, 'UTF-8');?>
" />
<?php }
}
}
