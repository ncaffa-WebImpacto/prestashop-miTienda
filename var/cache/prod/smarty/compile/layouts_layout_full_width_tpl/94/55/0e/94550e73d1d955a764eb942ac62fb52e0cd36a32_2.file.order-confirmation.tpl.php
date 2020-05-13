<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:17:55
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\order-confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1db3baf0e7_21588735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94550e73d1d955a764eb942ac62fb52e0cd36a32' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\order-confirmation.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:checkout/_partials/order-confirmation-table.tpl' => 1,
  ),
),false)) {
function content_5ebc1db3baf0e7_21588735 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1156972285ebc1db3b96933_56287979', 'pageWrapperClass');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2360621455ebc1db3b97392_80033761', 'page_content_container');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8593068785ebc1db3b9f706_45910433', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'pageWrapperClass'} */
class Block_1156972285ebc1db3b96933_56287979 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'pageWrapperClass' => 
  array (
    0 => 'Block_1156972285ebc1db3b96933_56287979',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'pageWrapperClass'} */
/* {block 'order_confirmation_header'} */
class Block_1372046925ebc1db3b977a0_21558892 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <h3 class="h1 card-title">
                <i class="material-icons rtl-no-flip done">&#xE876;</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your order is confirmed','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>

              </h3>
            <?php
}
}
/* {/block 'order_confirmation_header'} */
/* {block 'hook_order_confirmation'} */
class Block_1734295075ebc1db3b9e7d6_73138696 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php echo $_smarty_tpl->tpl_vars['HOOK_ORDER_CONFIRMATION']->value;?>

            <?php
}
}
/* {/block 'hook_order_confirmation'} */
/* {block 'page_content_container'} */
class Block_2360621455ebc1db3b97392_80033761 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_2360621455ebc1db3b97392_80033761',
  ),
  'order_confirmation_header' => 
  array (
    0 => 'Block_1372046925ebc1db3b977a0_21558892',
  ),
  'hook_order_confirmation' => 
  array (
    0 => 'Block_1734295075ebc1db3b9e7d6_73138696',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="content-hook_order_confirmation" class="card mb-3 text-white bg-success">
      <div class="card-body">


            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1372046925ebc1db3b977a0_21558892', 'order_confirmation_header', $this->tplIndex);
?>


            <p>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'An email has been sent to your mail address %email%.','d'=>'Shop.Theme.Checkout','sprintf'=>array('%email%'=>$_smarty_tpl->tpl_vars['customer']->value['email'])),$_smarty_tpl ) );?>

              <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['invoice_url']) {?>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can also [1]download your invoice[/1]','d'=>'Shop.Theme.Checkout','sprintf'=>array('[1]'=>"<a href='".((string)$_smarty_tpl->tpl_vars['order']->value['details']['invoice_url'])."'>",'[/1]'=>"</a>")),$_smarty_tpl ) );?>

              <?php }?>
            </p>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1734295075ebc1db3b9e7d6_73138696', 'hook_order_confirmation', $this->tplIndex);
?>



      </div>
    </section>
<?php
}
}
/* {/block 'page_content_container'} */
/* {block 'order_confirmation_table'} */
class Block_5381368765ebc1db3b9fad9_79964356 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/order-confirmation-table.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['order']->value['products'],'subtotals'=>$_smarty_tpl->tpl_vars['order']->value['subtotals'],'totals'=>$_smarty_tpl->tpl_vars['order']->value['totals'],'labels'=>$_smarty_tpl->tpl_vars['order']->value['labels'],'add_product_link'=>false), 0, false);
?>
        <?php
}
}
/* {/block 'order_confirmation_table'} */
/* {block 'order_details'} */
class Block_15107804615ebc1db3ba4b86_39534310 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div id="order-details" class="col-12 col-lg-3">
            <h3 class="h3 card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order details','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
:</h3>
            <ul>
              <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order reference: %reference%','d'=>'Shop.Theme.Checkout','sprintf'=>array('%reference%'=>$_smarty_tpl->tpl_vars['order']->value['details']['reference'])),$_smarty_tpl ) );?>
</li>
              <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payment method: %method%','d'=>'Shop.Theme.Checkout','sprintf'=>array('%method%'=>$_smarty_tpl->tpl_vars['order']->value['details']['payment'])),$_smarty_tpl ) );?>
</li>
              <?php if (!$_smarty_tpl->tpl_vars['order']->value['details']['is_virtual']) {?>
                <li>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping method: %method%','d'=>'Shop.Theme.Checkout','sprintf'=>array('%method%'=>$_smarty_tpl->tpl_vars['order']->value['carrier']['name'])),$_smarty_tpl ) );?>
<br>
                  <em><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['carrier']['delay'], ENT_QUOTES, 'UTF-8');?>
</em>
                </li>
              <?php }?>
            </ul>
          </div>
        <?php
}
}
/* {/block 'order_details'} */
/* {block 'hook_payment_return'} */
class Block_20440267665ebc1db3ba94b6_48902764 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if (!empty($_smarty_tpl->tpl_vars['HOOK_PAYMENT_RETURN']->value)) {?>
    <section id="content-hook_payment_return" class="card mb-3 definition-list">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <?php echo $_smarty_tpl->tpl_vars['HOOK_PAYMENT_RETURN']->value;?>

          </div>
        </div>
      </div>
    </section>
    <?php }?>
  <?php
}
}
/* {/block 'hook_payment_return'} */
/* {block 'customer_registration_form'} */
class Block_7896761775ebc1db3baa834_66777553 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['customer']->value['is_guest']) {?>
      <div id="registration-form" class="card mb-3">
        <div class="card-body">
          <h4 class="h4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save time on your next order, sign up now','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</h4>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('file'=>'customer/_partials/customer-form.tpl','ui'=>$_smarty_tpl->tpl_vars['register_form']->value),$_smarty_tpl ) );?>

        </div>
      </div>
    <?php }?>
  <?php
}
}
/* {/block 'customer_registration_form'} */
/* {block 'hook_order_confirmation_1'} */
class Block_17861650365ebc1db3bad325_69823133 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayOrderConfirmation1'),$_smarty_tpl ) );?>

  <?php
}
}
/* {/block 'hook_order_confirmation_1'} */
/* {block 'hook_order_confirmation_2'} */
class Block_2021192955ebc1db3bae451_63668184 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="content-hook-order-confirmation-footer">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayOrderConfirmation2'),$_smarty_tpl ) );?>

    </section>
  <?php
}
}
/* {/block 'hook_order_confirmation_2'} */
/* {block 'page_content_container'} */
class Block_8593068785ebc1db3b9f706_45910433 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_8593068785ebc1db3b9f706_45910433',
  ),
  'order_confirmation_table' => 
  array (
    0 => 'Block_5381368765ebc1db3b9fad9_79964356',
  ),
  'order_details' => 
  array (
    0 => 'Block_15107804615ebc1db3ba4b86_39534310',
  ),
  'hook_payment_return' => 
  array (
    0 => 'Block_20440267665ebc1db3ba94b6_48902764',
  ),
  'customer_registration_form' => 
  array (
    0 => 'Block_7896761775ebc1db3baa834_66777553',
  ),
  'hook_order_confirmation_1' => 
  array (
    0 => 'Block_17861650365ebc1db3bad325_69823133',
  ),
  'hook_order_confirmation_2' => 
  array (
    0 => 'Block_2021192955ebc1db3bae451_63668184',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section id="content" class="page-content page-order-confirmation card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-lg-9">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5381368765ebc1db3b9fad9_79964356', 'order_confirmation_table', $this->tplIndex);
?>

        </div>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15107804615ebc1db3ba4b86_39534310', 'order_details', $this->tplIndex);
?>


      </div>
    </div>
  </section>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20440267665ebc1db3ba94b6_48902764', 'hook_payment_return', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7896761775ebc1db3baa834_66777553', 'customer_registration_form', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17861650365ebc1db3bad325_69823133', 'hook_order_confirmation_1', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2021192955ebc1db3bae451_63668184', 'hook_order_confirmation_2', $this->tplIndex);
?>

<?php
}
}
/* {/block 'page_content_container'} */
}
