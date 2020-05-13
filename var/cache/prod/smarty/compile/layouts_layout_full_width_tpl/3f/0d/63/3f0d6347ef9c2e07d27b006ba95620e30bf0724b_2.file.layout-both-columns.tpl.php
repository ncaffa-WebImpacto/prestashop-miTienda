<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:00
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\layouts\layout-both-columns.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc85a2e03_51992759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f0d6347ef9c2e07d27b006ba95620e30bf0724b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\layouts\\layout-both-columns.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/head.tpl' => 1,
    'file:_partials/_partials/svg-icons.tpl' => 1,
    'file:catalog/_partials/product-activation.tpl' => 1,
    'file:_partials/header.tpl' => 1,
    'file:_partials/breadcrumb.tpl' => 1,
    'file:_partials/notifications.tpl' => 1,
    'file:_partials/footer.tpl' => 1,
    'file:_partials/_partials/back-to-top.tpl' => 1,
    'file:_partials/_partials/preloader.tpl' => 1,
    'file:_partials/_partials/offcanvas-modal.tpl' => 1,
    'file:_partials/javascript.tpl' => 1,
  ),
),false)) {
function content_5ebc1cc85a2e03_51992759 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19467329645ebc1cc85844d6_57196887', 'head');
?>

  </head>

  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classnames' ][ 0 ], array( $_smarty_tpl->tpl_vars['page']->value['body_classes'] )), ENT_QUOTES, 'UTF-8');
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['g_layout']) && $_smarty_tpl->tpl_vars['themeOpt']->value['g_layout'] == 'boxed') {?> boxed<?php }?>">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3031826875ebc1cc858a6d1_28553110', 'hook_after_body_opening_tag');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3941127865ebc1cc858b194_29919443', 'svg_icons');
?>


    <main id="page" class="site-wrapper">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6763596205ebc1cc858bea4_82770850', 'product_activation');
?>


      <header id="header"<?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['h_sticky']) && $_smarty_tpl->tpl_vars['themeOpt']->value['h_sticky'] == "1") {?> class="sticky-header"<?php }?>>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19542129035ebc1cc858d9b1_17735355', 'header');
?>

      </header>

      <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] != 'index') {?>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17593577075ebc1cc858eac0_39925533', 'breadcrumb');
?>

      <?php }?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12070007675ebc1cc858f636_24710772', 'notifications');
?>

      
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9504741945ebc1cc8590169_23652580', 'wrapper');
?>


      <footer id="footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1734841085ebc1cc859e317_88528515', "footer");
?>

      </footer>
    </main>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3695341355ebc1cc859ef42_12989995', 'backtotop');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2619819115ebc1cc859fc10_72052712', 'preloader');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17843705715ebc1cc85a07d4_86069948', 'offcanvas_madals');
?>

    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6573263055ebc1cc85a13c0_85415647', 'javascript_bottom');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17452444915ebc1cc85a2355_31896811', 'hook_before_body_closing_tag');
?>

  </body>

</html>
<?php }
/* {block 'head'} */
class Block_19467329645ebc1cc85844d6_57196887 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_19467329645ebc1cc85844d6_57196887',
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
class Block_3031826875ebc1cc858a6d1_28553110 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_after_body_opening_tag' => 
  array (
    0 => 'Block_3031826875ebc1cc858a6d1_28553110',
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
class Block_3941127865ebc1cc858b194_29919443 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'svg_icons' => 
  array (
    0 => 'Block_3941127865ebc1cc858b194_29919443',
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
/* {block 'product_activation'} */
class Block_6763596205ebc1cc858bea4_82770850 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_activation' => 
  array (
    0 => 'Block_6763596205ebc1cc858bea4_82770850',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php
}
}
/* {/block 'product_activation'} */
/* {block 'header'} */
class Block_19542129035ebc1cc858d9b1_17735355 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_19542129035ebc1cc858d9b1_17735355',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php
}
}
/* {/block 'header'} */
/* {block 'breadcrumb'} */
class Block_17593577075ebc1cc858eac0_39925533 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'breadcrumb' => 
  array (
    0 => 'Block_17593577075ebc1cc858eac0_39925533',
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
class Block_12070007675ebc1cc858f636_24710772 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications' => 
  array (
    0 => 'Block_12070007675ebc1cc858f636_24710772',
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
/* {block "layout_row_start"} */
class Block_1236088115ebc1cc8595996_18786631 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <div class="row">
            <?php
}
}
/* {/block "layout_row_start"} */
/* {block "left_column"} */
class Block_3635552975ebc1cc8596189_33042038 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div id="left-column" class="col-12 col-lg-3 order-2 order-lg-1">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayVerticalMenu"),$_smarty_tpl ) );?>

                  <?php if ((strpos($_smarty_tpl->tpl_vars['page']->value['page_name'],'bitblog') !== false)) {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayBlogSidebar"),$_smarty_tpl ) );?>

                  <?php } else { ?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayLeftColumn"),$_smarty_tpl ) );?>

                  <?php }?>
                </div>
              <?php
}
}
/* {/block "left_column"} */
/* {block 'contentWrapperClass'} */
class Block_7169302055ebc1cc85991d6_20989495 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
left-column right-column col-12 col-lg-6 order-1 order-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block "content"} */
class Block_5562829775ebc1cc8599e93_44992766 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <p>Hello world! This is HTML5 Boilerplate.</p>
                  <?php
}
}
/* {/block "content"} */
/* {block "content_wrapper"} */
class Block_6484425055ebc1cc8598de8_58916633 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div id="content-wrapper" class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7169302055ebc1cc85991d6_20989495', 'contentWrapperClass', $this->tplIndex);
?>
">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayContentWrapperTop"),$_smarty_tpl ) );?>

                  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5562829775ebc1cc8599e93_44992766', "content", $this->tplIndex);
?>

                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayContentWrapperBottom"),$_smarty_tpl ) );?>

                </div>
              <?php
}
}
/* {/block "content_wrapper"} */
/* {block "right_column"} */
class Block_20998635925ebc1cc859ae73_23211912 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div id="right-column" class="col-12 col-lg-3 order-2">
                  <?php if ((strpos($_smarty_tpl->tpl_vars['page']->value['page_name'],'bitblog') !== false)) {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayBlogSidebar"),$_smarty_tpl ) );?>

                  <?php } else { ?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayRightColumn"),$_smarty_tpl ) );?>

                  <?php }?>
                </div>
              <?php
}
}
/* {/block "right_column"} */
/* {block "layout_row_end"} */
class Block_8454561075ebc1cc859d0e0_76879009 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              </div>
            <?php
}
}
/* {/block "layout_row_end"} */
/* {block 'wrapper'} */
class Block_9504741945ebc1cc8590169_23652580 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'wrapper' => 
  array (
    0 => 'Block_9504741945ebc1cc8590169_23652580',
  ),
  'layout_row_start' => 
  array (
    0 => 'Block_1236088115ebc1cc8595996_18786631',
  ),
  'left_column' => 
  array (
    0 => 'Block_3635552975ebc1cc8596189_33042038',
  ),
  'content_wrapper' => 
  array (
    0 => 'Block_6484425055ebc1cc8598de8_58916633',
  ),
  'contentWrapperClass' => 
  array (
    0 => 'Block_7169302055ebc1cc85991d6_20989495',
  ),
  'content' => 
  array (
    0 => 'Block_5562829775ebc1cc8599e93_44992766',
  ),
  'right_column' => 
  array (
    0 => 'Block_20998635925ebc1cc859ae73_23211912',
  ),
  'layout_row_end' => 
  array (
    0 => 'Block_8454561075ebc1cc859d0e0_76879009',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <section id="wrapper">
          <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'index') {?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayTopColumn', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTopColumn'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
            <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTopColumn')) {?>
            <div id="top_column">
              <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTopColumn');?>

            </div>
            <?php }?>
          <?php }?>

          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayWrapperTop"),$_smarty_tpl ) );?>

          <div class="container">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1236088115ebc1cc8595996_18786631', "layout_row_start", $this->tplIndex);
?>

              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3635552975ebc1cc8596189_33042038', "left_column", $this->tplIndex);
?>


              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6484425055ebc1cc8598de8_58916633', "content_wrapper", $this->tplIndex);
?>


              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20998635925ebc1cc859ae73_23211912', "right_column", $this->tplIndex);
?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8454561075ebc1cc859d0e0_76879009', "layout_row_end", $this->tplIndex);
?>

          </div>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayWrapperBottom"),$_smarty_tpl ) );?>

        </section>
      <?php
}
}
/* {/block 'wrapper'} */
/* {block "footer"} */
class Block_1734841085ebc1cc859e317_88528515 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1734841085ebc1cc859e317_88528515',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender("file:_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php
}
}
/* {/block "footer"} */
/* {block 'backtotop'} */
class Block_3695341355ebc1cc859ef42_12989995 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'backtotop' => 
  array (
    0 => 'Block_3695341355ebc1cc859ef42_12989995',
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
class Block_2619819115ebc1cc859fc10_72052712 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'preloader' => 
  array (
    0 => 'Block_2619819115ebc1cc859fc10_72052712',
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
class Block_17843705715ebc1cc85a07d4_86069948 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'offcanvas_madals' => 
  array (
    0 => 'Block_17843705715ebc1cc85a07d4_86069948',
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
class Block_6573263055ebc1cc85a13c0_85415647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript_bottom' => 
  array (
    0 => 'Block_6573263055ebc1cc85a13c0_85415647',
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
class Block_17452444915ebc1cc85a2355_31896811 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_before_body_closing_tag' => 
  array (
    0 => 'Block_17452444915ebc1cc85a2355_31896811',
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
