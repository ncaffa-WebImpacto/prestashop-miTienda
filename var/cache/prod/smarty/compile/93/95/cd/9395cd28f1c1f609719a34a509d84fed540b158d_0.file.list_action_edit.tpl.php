<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:23:44
  from 'C:\xampp\htdocs\mitienda\admin260f4hauq\themes\default\template\helpers\list\list_action_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1f1013ab97_29996844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9395cd28f1c1f609719a34a509d84fed540b158d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\admin260f4hauq\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1589296689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1f1013ab97_29996844 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['href']->value,'html','UTF-8' ));?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>

</a>
<?php }
}
