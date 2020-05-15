<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:57:33
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-add-to-cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3d5de30402_05416451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd96d92a4681507bacbcd16ec35a9e766d294c2f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-add-to-cart.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe3d5de30402_05416451 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="product-add-to-cart">
  <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
    <span class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quantity','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9397446615ebe3d5de28397_91843619', 'product_quantity');
?>

    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11294132385ebe3d5de2b898_30188615', 'product_availability');
?>

    
    <div class="product-btn-block">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductActions','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

    </div>
    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10715359025ebe3d5de2e7f1_83683737', 'product_minimal_quantity');
?>

  <?php }?>
</div>
<?php }
/* {block 'product_quantity'} */
class Block_9397446615ebe3d5de28397_91843619 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_quantity' => 
  array (
    0 => 'Block_9397446615ebe3d5de28397_91843619',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="product-quantity clearfix">
        <div class="qty">
          <input
            type="text"
            name="qty"
            id="quantity_wanted"
            value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_wanted'], ENT_QUOTES, 'UTF-8');?>
"
            class="input-group"
            min="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'], ENT_QUOTES, 'UTF-8');?>
"
            aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quantity','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"
            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['product_url'])) {?>data-update-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_url'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>
          >
        </div>

        <div class="add">
          <button
            class="btn btn-primary add-to-cart btn-add-to-cart js-add-to-cart"
            data-button-action="add-to-cart"
            type="submit"
            <?php if (!$_smarty_tpl->tpl_vars['product']->value['add_to_cart_url']) {?>
              disabled
            <?php }?>
          >
            <i class="material-icons shopping-cart btn-add-to-cart__icon mr-1">&#xE547;</i><span class="btn-add-to-cart__spinner" role="status" aria-hidden="true"></span>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

          </button>
        </div>
      </div>
    <?php
}
}
/* {/block 'product_quantity'} */
/* {block 'product_availability'} */
class Block_11294132385ebe3d5de2b898_30188615 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_availability' => 
  array (
    0 => 'Block_11294132385ebe3d5de2b898_30188615',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <span id="product-availability" class="mt-2">
        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_availability'] && $_smarty_tpl->tpl_vars['product']->value['availability_message']) {?>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['availability'] == 'available') {?>
            <i class="material-icons product-available text-success">check</i>
          <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['availability'] == 'last_remaining_items') {?>
            <i class="material-icons product-last-items text-warning">report_problem</i>
          <?php } else { ?>
            <i class="material-icons product-unavailable text-danger mr-1">not_interested</i>
          <?php }?>
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['availability_message'], ENT_QUOTES, 'UTF-8');?>

        <?php }?>
      </span>
    <?php
}
}
/* {/block 'product_availability'} */
/* {block 'product_minimal_quantity'} */
class Block_10715359025ebe3d5de2e7f1_83683737 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_minimal_quantity' => 
  array (
    0 => 'Block_10715359025ebe3d5de2e7f1_83683737',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <p class="product-minimal-quantity">
        <?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'] > 1) {?>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The minimum purchase order quantity for the product is %quantity%.','d'=>'Shop.Theme.Checkout','sprintf'=>array('%quantity%'=>$_smarty_tpl->tpl_vars['product']->value['minimal_quantity'])),$_smarty_tpl ) );?>

        <?php }?>
      </p>
    <?php
}
}
/* {/block 'product_minimal_quantity'} */
}
