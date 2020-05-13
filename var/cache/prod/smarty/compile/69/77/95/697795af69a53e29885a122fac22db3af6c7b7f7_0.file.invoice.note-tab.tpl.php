<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:17:50
  from 'C:\xampp\htdocs\mitienda\pdf\invoice.note-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1dae91a948_77375002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '697795af69a53e29885a122fac22db3af6c7b7f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\pdf\\invoice.note-tab.tpl',
      1 => 1589296737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1dae91a948_77375002 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['order_invoice']->value->note) && $_smarty_tpl->tpl_vars['order_invoice']->value->note) {?>
	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="6" class="left">
			<table id="note-tab" style="width: 100%">
				<tr>
					<td class="grey"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Note','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
				</tr>
				<tr>
					<td class="note"><?php echo nl2br($_smarty_tpl->tpl_vars['order_invoice']->value->note);?>
</td>
				</tr>
			</table>
		</td>
		<td colspan="1">&nbsp;</td>
	</tr>
<?php }
}
}
