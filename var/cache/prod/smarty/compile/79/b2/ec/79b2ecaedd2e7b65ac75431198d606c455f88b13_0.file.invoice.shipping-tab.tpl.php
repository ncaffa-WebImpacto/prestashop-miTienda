<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:17:50
  from 'C:\xampp\htdocs\mitienda\pdf\invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1daeaa7018_97150680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79b2ecaedd2e7b65ac75431198d606c455f88b13' => 
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
function content_5ebc1daeaa7018_97150680 (Smarty_Internal_Template $_smarty_tpl) {
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
