<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:13:53
  from 'C:\xampp\htdocs\mitienda\modules\paypal\views\templates\admin\_partials\alertInfo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc1132108_82830083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84504e3515608b79d08f6849e57caeb5d0d52e6e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\paypal\\views\\templates\\admin\\_partials\\alertInfo.tpl',
      1 => 1589381675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc1132108_82830083 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-info <?php if (isset($_smarty_tpl->tpl_vars['widthByContent']->value) && $_smarty_tpl->tpl_vars['widthByContent']->value) {?>d-inline-block<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['class']->value) && $_smarty_tpl->tpl_vars['class']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 <?php }?>">
    <?php if (isset($_smarty_tpl->tpl_vars['btnClose']->value) && $_smarty_tpl->tpl_vars['btnClose']->value) {?>
        <button type="button" class="close" data-dismiss="alert">×</button>
    <?php }?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value,'htmlall','utf-8' ));?>

</div>
<?php }
}
