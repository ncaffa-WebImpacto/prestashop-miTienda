<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\cart-summary-subtotals.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d06d90407_08580947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd11a61d65a3c3788e7d851bf8628c56f8d443807' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\cart-summary-subtotals.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d06d90407_08580947 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="cart-summary-subtotals-container">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value['subtotals'], 'subtotal');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subtotal']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['subtotal']->value && $_smarty_tpl->tpl_vars['subtotal']->value['type'] !== 'tax') {?>
          <div class="cart-summary-line cart-summary-subtotals mt-2" id="cart-subtotal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
            <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
            <span class="value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div>



<?php }
}
