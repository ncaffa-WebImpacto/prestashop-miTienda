<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:24
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\cart-summary-totals.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ce0242ff3_04099073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6dd49c1cbe7c2f4a3454e1dd489659e61e0a0a6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\cart-summary-totals.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ce0242ff3_04099073 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="cart-summary-totals">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11495065255ebc1ce023b7c7_95513359', 'cart_summary_total');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3779260825ebc1ce0240c35_76238291', 'cart_summary_tax');
?>


</div>
<?php }
/* {block 'cart_summary_total'} */
class Block_11495065255ebc1ce023b7c7_95513359 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_total' => 
  array (
    0 => 'Block_11495065255ebc1ce023b7c7_95513359',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['display_prices_tax_incl'] && $_smarty_tpl->tpl_vars['configuration']->value['taxes_enabled']) {?>
            <div class="cart-summary-line">
                <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span>
                <span class="value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
            <div class="cart-summary-line cart-total">
                <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total_including_tax']['label'], ENT_QUOTES, 'UTF-8');?>
</span>
                <span class="value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total_including_tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
        <?php } else { ?>
            <div class="cart-summary-line cart-total">
                <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['configuration']->value['taxes_enabled']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');
}?></span>
                <span class="value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
        <?php }?>
    <?php
}
}
/* {/block 'cart_summary_total'} */
/* {block 'cart_summary_tax'} */
class Block_3779260825ebc1ce0240c35_76238291 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_tax' => 
  array (
    0 => 'Block_3779260825ebc1ce0240c35_76238291',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if ($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']) {?>
            <div class="small">
                <span class="label sub"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%label%:','sprintf'=>array('%label%'=>$_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label']),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
                <span class="value sub"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
        <?php }?>
    <?php
}
}
/* {/block 'cart_summary_tax'} */
}
