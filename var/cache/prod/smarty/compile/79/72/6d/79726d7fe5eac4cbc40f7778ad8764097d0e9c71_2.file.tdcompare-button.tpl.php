<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:59
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\modules\tdcompare\views\templates\hook\tdcompare-button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6423346b12_83376447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79726d7fe5eac4cbc40f7778ad8764097d0e9c71' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\modules\\tdcompare\\views\\templates\\hook\\tdcompare-button.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6423346b12_83376447 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="compare">
	<a class="add_to_compare btn btn-primary tip_inside<?php if ($_smarty_tpl->tpl_vars['added']->value) {?> added<?php }?>" href="#" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_product']->value, ENT_QUOTES, 'UTF-8');?>
">
		<svg width="18px" height="18px" fill="currentcolor">
			<use xlink:href="#tdscompare">
			</use>	
		</svg>
		<span class ="tip"><?php if ($_smarty_tpl->tpl_vars['added']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from Compare','mod'=>'tdcompare'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to Compare','mod'=>'tdcompare'),$_smarty_tpl ) );
}?></span>
	</a>
</div>
<?php }
}
