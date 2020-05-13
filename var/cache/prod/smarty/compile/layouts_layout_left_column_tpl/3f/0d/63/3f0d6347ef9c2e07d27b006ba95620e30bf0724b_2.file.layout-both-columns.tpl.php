<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:08
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\layouts\layout-both-columns.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd06bbfe8_23099693',
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
function content_5ebc1cd06bbfe8_23099693 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19614771175ebc1cd06a04e1_44877615', 'head');
?>

  </head>

  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classnames' ][ 0 ], array( $_smarty_tpl->tpl_vars['page']->value['body_classes'] )), ENT_QUOTES, 'UTF-8');
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['g_layout']) && $_smarty_tpl->tpl_vars['themeOpt']->value['g_layout'] == 'boxed') {?> boxed<?php }?>">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6727770735ebc1cd06a3417_43420021', 'hook_after_body_opening_tag');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3628512295ebc1cd06a3f81_24684011', 'svg_icons');
?>


    <main id="page" class="site-wrapper">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6480380665ebc1cd06a4f48_33943822', 'product_activation');
?>


      <header id="header"<?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['h_sticky']) && $_smarty_tpl->tpl_vars['themeOpt']->value['h_sticky'] == "1") {?> class="sticky-header"<?php }?>>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12419719855ebc1cd06a6b11_31964662', 'header');
?>

      </header>

      <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] != 'index') {?>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16969897075ebc1cd06a7d41_29379427', 'breadcrumb');
?>

      <?php }?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9706273435ebc1cd06a8a92_60614553', 'notifications');
?>

      
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7301402805ebc1cd06a9513_31606086', 'wrapper');
?>


      <footer id="footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21251961665ebc1cd06b74f5_07415440', "footer");
?>

      </footer>
    </main>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10018410275ebc1cd06b8273_62187195', 'backtotop');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6793989335ebc1cd06b8e35_75628935', 'preloader');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11387254185ebc1cd06b99c8_62275503', 'offcanvas_madals');
?>

    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9001337135ebc1cd06ba546_56011038', 'javascript_bottom');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4188651465ebc1cd06bb492_34402710', 'hook_before_body_closing_tag');
?>

  </body>

</html>
<?php }
/* {block 'head'} */
class Block_19614771175ebc1cd06a04e1_44877615 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_19614771175ebc1cd06a04e1_44877615',
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
class Block_6727770735ebc1cd06a3417_43420021 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_after_body_opening_tag' => 
  array (
    0 => 'Block_6727770735ebc1cd06a3417_43420021',
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
class Block_3628512295ebc1cd06a3f81_24684011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'svg_icons' => 
  array (
    0 => 'Block_3628512295ebc1cd06a3f81_24684011',
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
class Block_6480380665ebc1cd06a4f48_33943822 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_activation' => 
  array (
    0 => 'Block_6480380665ebc1cd06a4f48_33943822',
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
class Block_12419719855ebc1cd06a6b11_31964662 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_12419719855ebc1cd06a6b11_31964662',
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
class Block_16969897075ebc1cd06a7d41_29379427 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'breadcrumb' => 
  array (
    0 => 'Block_16969897075ebc1cd06a7d41_29379427',
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
class Block_9706273435ebc1cd06a8a92_60614553 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'notifications' => 
  array (
    0 => 'Block_9706273435ebc1cd06a8a92_60614553',
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
class Block_12968744855ebc1cd06af110_28868481 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <div class="row">
            <?php
}
}
/* {/block "layout_row_start"} */
/* {block "left_column"} */
class Block_16614546725ebc1cd06af8e9_48944530 extends Smarty_Internal_Block
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
class Block_15356652655ebc1cd06b25a0_96437557 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
left-column right-column col-12 col-lg-6 order-1 order-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block "content"} */
class Block_10041338015ebc1cd06b3236_31499768 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <p>Hello world! This is HTML5 Boilerplate.</p>
                  <?php
}
}
/* {/block "content"} */
/* {block "content_wrapper"} */
class Block_8914593835ebc1cd06b21a8_10485445 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div id="content-wrapper" class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15356652655ebc1cd06b25a0_96437557', 'contentWrapperClass', $this->tplIndex);
?>
">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayContentWrapperTop"),$_smarty_tpl ) );?>

                  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10041338015ebc1cd06b3236_31499768', "content", $this->tplIndex);
?>

                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayContentWrapperBottom"),$_smarty_tpl ) );?>

                </div>
              <?php
}
}
/* {/block "content_wrapper"} */
/* {block "right_column"} */
class Block_12650962415ebc1cd06b4195_72496020 extends Smarty_Internal_Block
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
class Block_19033126215ebc1cd06b63e5_32417523 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              </div>
            <?php
}
}
/* {/block "layout_row_end"} */
/* {block 'wrapper'} */
class Block_7301402805ebc1cd06a9513_31606086 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'wrapper' => 
  array (
    0 => 'Block_7301402805ebc1cd06a9513_31606086',
  ),
  'layout_row_start' => 
  array (
    0 => 'Block_12968744855ebc1cd06af110_28868481',
  ),
  'left_column' => 
  array (
    0 => 'Block_16614546725ebc1cd06af8e9_48944530',
  ),
  'content_wrapper' => 
  array (
    0 => 'Block_8914593835ebc1cd06b21a8_10485445',
  ),
  'contentWrapperClass' => 
  array (
    0 => 'Block_15356652655ebc1cd06b25a0_96437557',
  ),
  'content' => 
  array (
    0 => 'Block_10041338015ebc1cd06b3236_31499768',
  ),
  'right_column' => 
  array (
    0 => 'Block_12650962415ebc1cd06b4195_72496020',
  ),
  'layout_row_end' => 
  array (
    0 => 'Block_19033126215ebc1cd06b63e5_32417523',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12968744855ebc1cd06af110_28868481', "layout_row_start", $this->tplIndex);
?>

              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16614546725ebc1cd06af8e9_48944530', "left_column", $this->tplIndex);
?>


              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8914593835ebc1cd06b21a8_10485445', "content_wrapper", $this->tplIndex);
?>


              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12650962415ebc1cd06b4195_72496020', "right_column", $this->tplIndex);
?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19033126215ebc1cd06b63e5_32417523', "layout_row_end", $this->tplIndex);
?>

          </div>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayWrapperBottom"),$_smarty_tpl ) );?>

        </section>
      <?php
}
}
/* {/block 'wrapper'} */
/* {block "footer"} */
class Block_21251961665ebc1cd06b74f5_07415440 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_21251961665ebc1cd06b74f5_07415440',
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
class Block_10018410275ebc1cd06b8273_62187195 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'backtotop' => 
  array (
    0 => 'Block_10018410275ebc1cd06b8273_62187195',
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
class Block_6793989335ebc1cd06b8e35_75628935 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'preloader' => 
  array (
    0 => 'Block_6793989335ebc1cd06b8e35_75628935',
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
class Block_11387254185ebc1cd06b99c8_62275503 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'offcanvas_madals' => 
  array (
    0 => 'Block_11387254185ebc1cd06b99c8_62275503',
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
class Block_9001337135ebc1cd06ba546_56011038 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript_bottom' => 
  array (
    0 => 'Block_9001337135ebc1cd06ba546_56011038',
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
class Block_4188651465ebc1cd06bb492_34402710 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_before_body_closing_tag' => 
  array (
    0 => 'Block_4188651465ebc1cd06bb492_34402710',
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
