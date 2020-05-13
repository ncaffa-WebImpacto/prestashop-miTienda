<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:01
  from 'module:paypalviewstemplatesfront' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d059daf82_79851786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63fecdeac943dea07b07385a96556a9927f826e0' => 
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
function content_5ebc1d059daf82_79851786 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-info">
    <div>
        <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have to [b]finish your payment[/b] done with your PayPal account ','mod'=>'paypal'),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
echo smarty_modifier_paypalreplace($_prefixVariable1);?>
 <?php if (isset($_smarty_tpl->tpl_vars['paypalEmail']->value)) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paypalEmail']->value,'htmlall','utf-8' )), ENT_QUOTES, 'UTF-8');
}?>
    </div>

    <div>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by accepting the terms of service and clicking on the order validation button below.','mod'=>'paypal'),$_smarty_tpl ) );?>

    </div>
</div>
<?php }
}
