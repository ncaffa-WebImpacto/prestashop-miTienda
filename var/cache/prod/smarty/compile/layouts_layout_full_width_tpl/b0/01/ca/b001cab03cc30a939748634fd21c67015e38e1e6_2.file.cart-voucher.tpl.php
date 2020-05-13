<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:24
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\cart-voucher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ce035d815_94518299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b001cab03cc30a939748634fd21c67015e38e1e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\cart-voucher.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ce035d815_94518299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['allowed']) {?>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6988340655ebc1ce034df50_94728611', 'cart_voucher');
?>

<?php }
}
/* {block 'cart_voucher_list'} */
class Block_11116924985ebc1ce034ec04_01594952 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                        <ul class="promo-name">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value['vouchers']['added'], 'voucher');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->value) {
?>
                                <li class="cart-summary-line">
                                    <span class="label small"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                                    <div class="">
                                        <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['reduction_formatted'], ENT_QUOTES, 'UTF-8');?>
</span>
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['delete_url'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="remove-voucher"><i class="material-icons">&#xE872;</i></a>
                                    </div>
                                </li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php
}
}
/* {/block 'cart_voucher_list'} */
/* {block 'cart_voucher_form'} */
class Block_4568603245ebc1ce03556d9_46673253 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <form class="form__add-voucher" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="add-voucher" method="post">
                                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
                                <input type="hidden" name="addDiscount" value="1">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="discount_name" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Promo code','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</button>
                                    </div>
                                </div>
                            </form>
                        <?php
}
}
/* {/block 'cart_voucher_form'} */
/* {block 'cart_voucher_notifications'} */
class Block_18662342555ebc1ce0357282_27222126 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <div class="alert alert-danger js-error promo-code-alert" role="alert">
                                <i class="material-icons">&#xE001;</i><span class="ml-1 js-error-text"></span>
                            </div>
                        <?php
}
}
/* {/block 'cart_voucher_notifications'} */
/* {block 'cart_voucher'} */
class Block_6988340655ebc1ce034df50_94728611 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cart_voucher' => 
  array (
    0 => 'Block_6988340655ebc1ce034df50_94728611',
  ),
  'cart_voucher_list' => 
  array (
    0 => 'Block_11116924985ebc1ce034ec04_01594952',
  ),
  'cart_voucher_form' => 
  array (
    0 => 'Block_4568603245ebc1ce03556d9_46673253',
  ),
  'cart_voucher_notifications' => 
  array (
    0 => 'Block_18662342555ebc1ce0357282_27222126',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <div class="block-promo">
            <div class="cart-voucher">
                <?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']) {?>
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11116924985ebc1ce034ec04_01594952', 'cart_voucher_list', $this->tplIndex);
?>

                <?php }?>

                <p class="promo-code-button display-promo<?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts']) > 0) {?> with-discounts<?php }?>">
                    <a class="collapse-button" href="#promo-code" data-toggle="collapse"<?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts']) > 0) {?> aria-expanded="true"<?php }?>>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Have a promo code?','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>

                    </a>
                </p>

                <div id="promo-code" class="promo-code collapse<?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts']) > 0) {?> show<?php }?>">
                    <div class="promo-code__content">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4568603245ebc1ce03556d9_46673253', 'cart_voucher_form', $this->tplIndex);
?>


                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18662342555ebc1ce0357282_27222126', 'cart_voucher_notifications', $this->tplIndex);
?>


                        <a class="collapse-button promo-code-button cancel-promo" role="button" data-toggle="collapse" href ="#promo-code" aria-expanded="true" aria-controls="promo-code">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>

                        </a>
                    </div>
                </div>

                <?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts']) > 0) {?>
                    <p class="block-promo promo-highlighted">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Take advantage of our exclusive offers:','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

                    </p>
                    <ul class="js-discount promo-discounts">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value['discounts'], 'discount');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->value) {
?>
                            <li>
                <span class="label"><span class="code"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['code'], ENT_QUOTES, 'UTF-8');?>
</span> - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                            </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                <?php }?>
            </div>
        </div>
    <?php
}
}
/* {/block 'cart_voucher'} */
}
