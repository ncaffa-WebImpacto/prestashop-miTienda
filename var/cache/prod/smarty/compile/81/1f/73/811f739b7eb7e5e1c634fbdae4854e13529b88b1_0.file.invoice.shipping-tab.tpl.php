<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:20:56
  from 'C:\xampp\htdocs\mitienda\pdf\invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1e6885eb57_79051857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '811f739b7eb7e5e1c634fbdae4854e13529b88b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\pdf\\invoice.shipping-tab.tpl',
      1 => 1589296737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1e6885eb57_79051857 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
