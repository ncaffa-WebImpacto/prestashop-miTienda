<?php
/* Smarty version 3.1.33, created on 2020-05-18 18:08:55
  from 'C:\xampp\htdocs\mitienda\admin260f4hauq\themes\new-theme\template\components\layout\confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec2b317467a85_36445001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c812dc07e7a58c3fb63b8462c89cf7f25f24d85' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\admin260f4hauq\\themes\\new-theme\\template\\components\\layout\\confirmation_messages.tpl',
      1 => 1589401683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec2b317467a85_36445001 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
