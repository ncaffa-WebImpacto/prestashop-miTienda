<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:20:56
  from 'C:\xampp\htdocs\mitienda\pdf\invoice.note-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1e6871c776_20550989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f60b8e51d33057375eeec9161f8d518950c37069' => 
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
function content_5ebc1e6871c776_20550989 (Smarty_Internal_Template $_smarty_tpl) {
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
