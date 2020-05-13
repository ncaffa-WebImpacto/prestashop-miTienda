<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:01
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d05a8b259_52568527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5623d0ae5884fcc9514f4cb3e7139386dffbd36f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\checkout.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/head.tpl' => 1,
    'file:_partials/_partials/svg-icons.tpl' => 1,
    'file:checkout/_partials/header.tpl' => 1,
    'file:_partials/breadcrumb.tpl' => 1,
    'file:_partials/notifications.tpl' => 1,
    'file:checkout/_partials/cart-summary.tpl' => 1,
    'file:checkout/_partials/footer.tpl' => 1,
    'file:_partials/_partials/back-to-top.tpl' => 1,
    'file:_partials/_partials/preloader.tpl' => 1,
    'file:_partials/_partials/offcanvas-modal.tpl' => 1,
    'file:_partials/javascript.tpl' => 1,
  ),
),false)) {
function content_5ebc1d05a8b259_52568527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3273388005ebc1d05a75178_58318732', 'head');
?>

  </head>

  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classnames' ][ 0 ], array( $_smarty_tpl->tpl_vars['page']->value['body_classes'] )), ENT_QUOTES, 'UTF-8');
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['g_layout']) && $_smarty_tpl->tpl_vars['themeOpt']->value['g_layout'] == 'boxed') {?> boxed<?php }?>">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18145164595ebc1d05a7b4c2_72988866', 'hook_after_body_opening_tag');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8323427665ebc1d05a7cd03_34989945', 'svg_icons');
?>


    <main id="page" class="site-wrapper">
      <header id="header"<?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['h_sticky']) && $_smarty_tpl->tpl_vars['themeOpt']->value['h_sticky'] == "1") {?> class="sticky-header"<?php }?>>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11415664105ebc1d05a80dc6_62890401', 'header');
?>

      </header>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2900340775ebc1d05a81897_61207371', 'breadcrumb');
?>


      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10093348375ebc1d05a82361_27644668', 'notifications');
?>


      <section id="wrapper">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayWrapperTop"),$_smarty_tpl ) );?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8064002945ebc1d05a83376_04447880', 'content');
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayWrapperBottom"),$_smarty_tpl ) );?>

      </section>

      <footer id="footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5251645355ebc1d05a864b6_51741328', 'footer');
?>

      </footer>
    </main>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11457334705ebc1d05a86f69_71701550', 'backtotop');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19436613435ebc1d05a87c38_48880231', 'preloader');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_367136975ebc1d05a88874_56501154', 'offcanvas_madals');
?>

    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2761627925ebc1d05a89461_62099538', 'javascript_bottom');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20388088875ebc1d05a8a520_29187912', 'hook_before_body_closing_tag');
?>


  </body>

</html>
<?php }
/* {block 'head'} */
class Block_3273388005ebc1d05a75178_58318732 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_3273388005ebc1d05a75178_58318732',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender('file:_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'head'} */
/* {block 'hook_after_body_opening_tag'} */
class Block_18145164595ebc1d05a7b4c2_72988866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_after_body_opening_tag' => 
  array (
    0 => 'Block_18145164595ebc1d05a7b4c2_72988866',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterBodyOpeningTag'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_after_body_opening_tag'} */
/* {block 'svg_icons'} */
class Block_8323427665ebc1d05a7cd03_34989945 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'svg_icons' => 
  array (
    0 => 'Block_8323427665ebc1d05a7cd03_34989945',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender("file:_partials/_partials/svg-icons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'svg_icons'} */
/* {block 'header'} */
class Block_11415664105ebc1d05a80dc6_62890401 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_11415664105ebc1d05a80dc6_62890401',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php
}
}
/* {/block 'header'} */
/* {block 'breadcrumb'} */
class Block_2900340775ebc1d05a81897_61207371 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'breadcrumb' => 
  array (
    0 => 'Block_2900340775ebc1d05a81897_61207371',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender('file:_partials/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php
}
}
/* {/block 'breadcrumb'} */
/* {block 'notifications'} */
class Block_10093348375ebc1d05a82361_27644668 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications' => 
  array (
    0 => 'Block_10093348375ebc1d05a82361_27644668',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender('file:_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php
}
}
/* {/block 'notifications'} */
/* {block 'checkout_process'} */
class Block_16478690935ebc1d05a83799_26165904 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('file'=>'checkout/checkout-process.tpl','ui'=>$_smarty_tpl->tpl_vars['checkout_process']->value),$_smarty_tpl ) );?>

                <?php
}
}
/* {/block 'checkout_process'} */
/* {block 'cart_summary'} */
class Block_8187410325ebc1d05a84c22_33424130 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/cart-summary.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, false);
?>
                <?php
}
}
/* {/block 'cart_summary'} */
/* {block 'content'} */
class Block_8064002945ebc1d05a83376_04447880 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8064002945ebc1d05a83376_04447880',
  ),
  'checkout_process' => 
  array (
    0 => 'Block_16478690935ebc1d05a83799_26165904',
  ),
  'cart_summary' => 
  array (
    0 => 'Block_8187410325ebc1d05a84c22_33424130',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="container">
            <div class="row">
              <div id="js-checkout-process" class="col-md-8 accordion mb-4">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16478690935ebc1d05a83799_26165904', 'checkout_process', $this->tplIndex);
?>

              </div>
              <div class="col-md-4 order-checkout">

                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8187410325ebc1d05a84c22_33424130', 'cart_summary', $this->tplIndex);
?>


                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayReassurance'),$_smarty_tpl ) );?>

              </div>
            </div>
          </div>
        <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_5251645355ebc1d05a864b6_51741328 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_5251645355ebc1d05a864b6_51741328',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:checkout/_partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php
}
}
/* {/block 'footer'} */
/* {block 'backtotop'} */
class Block_11457334705ebc1d05a86f69_71701550 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'backtotop' => 
  array (
    0 => 'Block_11457334705ebc1d05a86f69_71701550',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender("file:_partials/_partials/back-to-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'backtotop'} */
/* {block 'preloader'} */
class Block_19436613435ebc1d05a87c38_48880231 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'preloader' => 
  array (
    0 => 'Block_19436613435ebc1d05a87c38_48880231',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender("file:_partials/_partials/preloader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'preloader'} */
/* {block 'offcanvas_madals'} */
class Block_367136975ebc1d05a88874_56501154 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'offcanvas_madals' => 
  array (
    0 => 'Block_367136975ebc1d05a88874_56501154',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender("file:_partials/_partials/offcanvas-modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'offcanvas_madals'} */
/* {block 'javascript_bottom'} */
class Block_2761627925ebc1d05a89461_62099538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript_bottom' => 
  array (
    0 => 'Block_2761627925ebc1d05a89461_62099538',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender("file:_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, false);
?>
    <?php
}
}
/* {/block 'javascript_bottom'} */
/* {block 'hook_before_body_closing_tag'} */
class Block_20388088875ebc1d05a8a520_29187912 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_before_body_closing_tag' => 
  array (
    0 => 'Block_20388088875ebc1d05a8a520_29187912',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_before_body_closing_tag'} */
}
