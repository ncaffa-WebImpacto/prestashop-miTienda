<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:24:57
  from 'C:\xampp\htdocs\mitienda\admin260f4hauq\themes\new-theme\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23849056165_57801599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fadebff6038f17a106e6377356821cf13e298102' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\admin260f4hauq\\themes\\new-theme\\template\\content.tpl',
      1 => 1589401683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec23849056165_57801599 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
