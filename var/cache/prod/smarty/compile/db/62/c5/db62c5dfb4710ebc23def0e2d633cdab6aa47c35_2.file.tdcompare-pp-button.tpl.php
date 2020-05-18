<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:09
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\modules\tdcompare\views\templates\hook\tdcompare-pp-button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23855c934b5_85956635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db62c5dfb4710ebc23def0e2d633cdab6aa47c35' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\modules\\tdcompare\\views\\templates\\hook\\tdcompare-pp-button.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec23855c934b5_85956635 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="compare">
	<a class="add_to_compare tip_inside<?php if ($_smarty_tpl->tpl_vars['added']->value) {?> added<?php }?>" href="#" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_product']->value, ENT_QUOTES, 'UTF-8');?>
">
		<svg width="18px" height="18px" fill="currentcolor">
			<use xlink:href="#tdscompare">
			</use>	
		</svg>
		<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare','mod'=>'tdcompare'),$_smarty_tpl ) );?>
</span>
		<span class ="tip"><?php if ($_smarty_tpl->tpl_vars['added']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from Compare','mod'=>'tdcompare'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to Compare','mod'=>'tdcompare'),$_smarty_tpl ) );
}?></span>
	</a>
</div>
<?php }
}
