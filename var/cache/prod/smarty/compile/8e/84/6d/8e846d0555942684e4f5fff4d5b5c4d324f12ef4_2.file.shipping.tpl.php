<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:17:28
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\steps\shipping.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d98d00c37_68510039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e846d0555942684e4f5fff4d5b5c4d324f12ef4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\steps\\shipping.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d98d00c37_68510039 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
  

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20322332215ebc1d98cf0c07_08374615', 'step_content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'checkout/_partials/steps/checkout-step.tpl');
}
/* {block 'delivery_options'} */
class Block_6223839435ebc1d98cf49b2_71104540 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="delivery-options">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['delivery_options']->value, 'carrier', false, 'carrier_id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['carrier_id']->value => $_smarty_tpl->tpl_vars['carrier']->value) {
?>
        <div class="delivery-option">
          <div class="row">
            <div class="col-sm-1">
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="delivery_option[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
]" id="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['delivery_option']->value == $_smarty_tpl->tpl_vars['carrier_id']->value) {?> checked<?php }?>>
                <label class="custom-control-label" for="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><span class="sr-only"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span></label>
              </div>
            </div>
            <label for="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="col-sm-11 delivery-option-2">
              <div class="row">
                <div class="col-sm-5 col-12">
                  <div class="row">   
                    <?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>
                    <div class="col-sm-3 col-12">
                      <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
                    </div>
                    <?php }?>
                    <div class="<?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>col-sm-9<?php } else { ?>col-12<?php }?>">
                      <span class="h6 carrier-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 col-12">
                  <span class="carrier-delay"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['delay'], ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
                <div class="col-sm-3 col-12 text-sm-right">
                  <span class="carrier-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
                </div>
              </div>
            </label>
          </div>
        </div>
        <div class="carrier-extra-content"<?php if ($_smarty_tpl->tpl_vars['delivery_option']->value != $_smarty_tpl->tpl_vars['carrier_id']->value) {?> style="display:none;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['carrier']->value['extraContent'];?>
</div>
        <div class="clearfix"></div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
      <?php
}
}
/* {/block 'delivery_options'} */
/* {block 'step_content'} */
class Block_20322332215ebc1d98cf0c07_08374615 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'step_content' => 
  array (
    0 => 'Block_20322332215ebc1d98cf0c07_08374615',
  ),
  'delivery_options' => 
  array (
    0 => 'Block_6223839435ebc1d98cf49b2_71104540',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div id="hook-display-before-carrier">
    <?php echo $_smarty_tpl->tpl_vars['hookDisplayBeforeCarrier']->value;?>

  </div>

  <div class="delivery-options-list">
    <?php if (count($_smarty_tpl->tpl_vars['delivery_options']->value)) {?>
    <form
    class="clearfix"
    id="js-delivery"
    data-url-update="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'order','params'=>array('ajax'=>1,'action'=>'selectDeliveryOption')),$_smarty_tpl ) );?>
"
    method="post"
    >
    <div class="form-fields">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6223839435ebc1d98cf49b2_71104540', 'delivery_options', $this->tplIndex);
?>

      <div class="order-options">
        <div id="delivery" class="form-group">
          <label for="delivery_message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you would like to add a comment about your order, please write it in the field below.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</label>
          <textarea class="form-control" rows="2" cols="120" id="delivery_message" name="delivery_message"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery_message']->value, ENT_QUOTES, 'UTF-8');?>
</textarea>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" type="checkbox" id="input_recyclable" name="recyclable" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value) {?> checked <?php }?>>
          <label class="custom-control-label" for="input_recyclable"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I would like to receive my order in recycled packaging.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</label>
        </div>

        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input js-gift-checkbox" type="checkbox" id="input_gift" name="gift" value="1" value="1" <?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift']) {?>checked="checked"<?php }?>>
          <label class="custom-control-label" for="input_gift"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['label'], ENT_QUOTES, 'UTF-8');?>
</label >
        </div>


        <div id="gift" class="collapse<?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift']) {?> show<?php }?>">
          <div class="form-group">
            <label for="gift_message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you\'d like, you can add a note to the gift:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</label>
            <textarea class="form-control" rows="2" cols="120" id="gift_message" name="gift_message"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['message'], ENT_QUOTES, 'UTF-8');?>
</textarea>
          </div>
        </div>
        <?php }?>

      </div>
    </div>
    <button type="submit" class="continue btn btn-primary btn-lg mt-3" name="confirmDeliveryOption" value="1">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

    </button>
  </form>
  <?php } else { ?>
  <p class="alert alert-danger"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unfortunately, there are no carriers available for your delivery address.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</p>
  <?php }?>
</div>

<div id="hook-display-after-carrier">
  <?php echo $_smarty_tpl->tpl_vars['hookDisplayAfterCarrier']->value;?>

</div>

<div id="extra_carrier"></div>
<?php
}
}
/* {/block 'step_content'} */
}