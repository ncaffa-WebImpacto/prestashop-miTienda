<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\checkout-process.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d06037061_71872500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '145be02b3d7403c9c66b0b4fca23598f6f926825' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\checkout-process.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d06037061_71872500 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="checkout-process">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['steps']->value, 'step', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['step']->value) {
?>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('identifier'=>$_smarty_tpl->tpl_vars['step']->value['identifier'],'position'=>($_smarty_tpl->tpl_vars['index']->value+1),'ui'=>$_smarty_tpl->tpl_vars['step']->value['ui']),$_smarty_tpl ) );?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
