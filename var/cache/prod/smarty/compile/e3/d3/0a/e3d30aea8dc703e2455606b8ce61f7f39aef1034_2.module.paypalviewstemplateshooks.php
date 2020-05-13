<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:24
  from 'module:paypalviewstemplateshooks' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ce0040022_44161003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3d30aea8dc703e2455606b8ce61f7f39aef1034' => 
    array (
      0 => 'module:paypalviewstemplateshooks',
      1 => 1589381675,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ce0040022_44161003 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div data-container-express-checkout data-paypal-source-page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['source_page']->value, ENT_QUOTES, 'UTF-8');?>
" style="float:right; margin: 10px 40px 0 0">
    <form data-paypal-payment-form-cart class="paypal_payment_form" action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action_url']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pay with PayPal','mod'=>'paypal'),$_smarty_tpl ) );?>
" method="post" data-ajax="false">
        <?php if ($_smarty_tpl->tpl_vars['source_page']->value == 'product') {?>
          <input
                  type="hidden"
                  name="id_product"
                  data-paypal-id-product
                  <?php if (isset($_GET['id_product'])) {?>
                    value="<?php echo htmlspecialchars(intval($_GET['id_product']), ENT_QUOTES, 'UTF-8');?>
"
                  <?php } elseif (isset($_smarty_tpl->tpl_vars['product']->value)) {?>
                    value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->id, ENT_QUOTES, 'UTF-8');?>
"
                  <?php }?>
          />
          <input type="hidden" name="quantity" data-paypal-qty value=""/>
          <input type="hidden" name="combination" data-paypal-combination value="" />
          <input type="hidden" data-paypal-id-product-attribute value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['es_cs_product_attribute']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
        <?php }?>
        <input type="hidden" name="express_checkout" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['PayPal_payment_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="current_shop_url" data-paypal-url-page value="" />
        <?php if (isset($_smarty_tpl->tpl_vars['PayPal_tracking_code']->value) && !empty($_smarty_tpl->tpl_vars['PayPal_tracking_code']->value)) {?>
          <input type="hidden" name="bn" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['PayPal_tracking_code']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
          <input type="hidden" id="in_context_checkout_enabled" value="0">
        <?php }?>
        <input type="hidden" id="source_page" name="source_page" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['source_page']->value, ENT_QUOTES, 'UTF-8');?>
">
        <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['PayPal_img_esc']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" data-paypal-shortcut-btn alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PayPal','mod'=>'paypal'),$_smarty_tpl ) );?>
" style="cursor:pointer;"/>
    </form>
</div>
<div class="clearfix"></div>
<?php }
}
