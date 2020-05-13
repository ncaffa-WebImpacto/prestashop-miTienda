<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:03
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\modules\ps_emailalerts\views\templates\hook\my-account-footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ccb0709c0_29100056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '254a3cde7e8f71d2ce418e0f7a26a4bb5e843984' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\modules\\ps_emailalerts\\views\\templates\\hook\\my-account-footer.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ccb0709c0_29100056 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li>
  <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'module','name'=>'ps_emailalerts','controller'=>'account'),$_smarty_tpl ) );?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My alerts','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My alerts','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>

  </a>
</li>
<?php }
}
