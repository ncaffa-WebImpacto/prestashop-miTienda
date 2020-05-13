<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\cart-summary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d06b91087_60096188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '077e9a20674ea501ff28fa97c22b189704a5b26a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\cart-summary.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:checkout/_partials/cart-summary-product-line.tpl' => 1,
    'file:checkout/_partials/cart-summary-subtotals.tpl' => 1,
    'file:checkout/_partials/cart-voucher.tpl' => 1,
    'file:checkout/_partials/cart-summary-totals.tpl' => 1,
  ),
),false)) {
function content_5ebc1d06b91087_60096188 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<section id="js-checkout-summary" class="card js-cart mb-3" data-refresh-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
?ajax=1&action=refresh">
  <div class="card-body card__summary">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2991638825ebc1d06b8bc52_80922648', 'hook_checkout_summary_top');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8817348445ebc1d06b8c7b6_90627482', 'cart_summary_products');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20299640065ebc1d06b8ef71_81549357', 'cart_summary_subtotals');
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3643911455ebc1d06b8fb75_19516234', 'cart_summary_voucher');
?>

  </div>



  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16169314765ebc1d06b905d6_95615889', 'cart_summary_totals');
?>


</section>
<?php }
/* {block 'hook_checkout_summary_top'} */
class Block_2991638825ebc1d06b8bc52_80922648 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_checkout_summary_top' => 
  array (
    0 => 'Block_2991638825ebc1d06b8bc52_80922648',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCheckoutSummaryTop'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_checkout_summary_top'} */
/* {block 'cart_summary_product_list'} */
class Block_270388615ebc1d06b8d5a1_25862880 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="collapse" id="cart-summary-product-list">
            <ul class="media-list">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value['products'], 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                <li class="media media-list__item"><?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/cart-summary-product-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?></li>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
          </div>
        <?php
}
}
/* {/block 'cart_summary_product_list'} */
/* {block 'cart_summary_products'} */
class Block_8817348445ebc1d06b8c7b6_90627482 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_products' => 
  array (
    0 => 'Block_8817348445ebc1d06b8c7b6_90627482',
  ),
  'cart_summary_product_list' => 
  array (
    0 => 'Block_270388615ebc1d06b8d5a1_25862880',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="cart-summary-products">

        <p class="mb-0"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['summary_string'], ENT_QUOTES, 'UTF-8');?>
</p>

          <a class="link__showsummary" href="#" data-toggle="collapse" data-target="#cart-summary-product-list">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'show details','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

          </a>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_270388615ebc1d06b8d5a1_25862880', 'cart_summary_product_list', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'cart_summary_products'} */
/* {block 'cart_summary_subtotals'} */
class Block_20299640065ebc1d06b8ef71_81549357 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_subtotals' => 
  array (
    0 => 'Block_20299640065ebc1d06b8ef71_81549357',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/cart-summary-subtotals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, false);
?>
    <?php
}
}
/* {/block 'cart_summary_subtotals'} */
/* {block 'cart_summary_voucher'} */
class Block_3643911455ebc1d06b8fb75_19516234 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_voucher' => 
  array (
    0 => 'Block_3643911455ebc1d06b8fb75_19516234',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/cart-voucher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php
}
}
/* {/block 'cart_summary_voucher'} */
/* {block 'cart_summary_totals'} */
class Block_16169314765ebc1d06b905d6_95615889 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_summary_totals' => 
  array (
    0 => 'Block_16169314765ebc1d06b905d6_95615889',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="card-footer">
    <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/cart-summary-totals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, false);
?>
      </div>
  <?php
}
}
/* {/block 'cart_summary_totals'} */
}
