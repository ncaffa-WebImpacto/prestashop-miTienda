<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:14
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-flags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd60998e1_79339144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86bc4a1ed887b83e5fba9ccc5310f7a0d2b8e16b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-flags.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd60998e1_79339144 (Smarty_Internal_Template $_smarty_tpl) {
?>    <ul class="product-flags">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
            <li class="product-flag <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['flag']->value['type'] == "discount") {?> d--none<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php }
}
