<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'module:paypalviewstemplatesfront' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d06af94a1_05408204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffea87e3807e697178ee8347672b825b80d76d45' => 
    array (
      0 => 'module:paypalviewstemplatesfront',
      1 => 1589381675,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d06af94a1_05408204 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Benefit from many PayPal advantages such as :','mod'=>'paypal'),$_smarty_tpl ) );?>
</p>
<p><img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/protected.png" style="height: 43px; padding-right: 10px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your orders are protected','mod'=>'paypal'),$_smarty_tpl ) );?>
*</p>
<p><img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/refund.png" style=" height: 43px; padding-right: 10px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return shipping refunded','mod'=>'paypal'),$_smarty_tpl ) );?>
*</p>
<p><i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'* See conditions on PayPal website','mod'=>'paypal'),$_smarty_tpl ) );?>
</i></p>
<?php }
}
