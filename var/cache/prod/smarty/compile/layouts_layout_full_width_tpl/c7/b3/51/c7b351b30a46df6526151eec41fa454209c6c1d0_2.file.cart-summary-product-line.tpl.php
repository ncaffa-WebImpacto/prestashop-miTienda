<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\cart-summary-product-line.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d06cc4505_02264714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7b351b30a46df6526151eec41fa454209c6c1d0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\cart-summary-product-line.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d06cc4505_02264714 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6919691865ebc1d06cbea21_16603861', 'cart_summary_product_line');
?>

<?php }
/* {block 'cart_summary_product_line'} */
class Block_6919691865ebc1d06cbea21_16603861 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_product_line' => 
  array (
    0 => 'Block_6919691865ebc1d06cbea21_16603861',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="mr-3">
      <img class="media-object" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" width="50">
    </a>
  <div class="media-body small">
    <div class="product-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
    <div class="clearfix">
      <span class="product-quantity float-left">x<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="product-price float-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl ) );?>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['attributes'], 'value', false, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
      <div class="product-line-info product-line-info-secondary text-muted small">
          <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attribute']->value, ENT_QUOTES, 'UTF-8');?>
:</span>
          <span class="value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
</span>
      </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  </div>
<?php
}
}
/* {/block 'cart_summary_product_line'} */
}
