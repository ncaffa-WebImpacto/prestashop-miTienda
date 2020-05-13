<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\mobile-header-1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cca0789e5_53372589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00c68d76842c3f0bc39396e9dd05acb370fca88e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\mobile-header-1.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cca0789e5_53372589 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17465995805ebc1cca078327_48224192', 'header_top');
}
/* {block 'header_top'} */
class Block_17465995805ebc1cca078327_48224192 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_top' => 
  array (
    0 => 'Block_17465995805ebc1cca078327_48224192',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-top">
    <div class="container">
      <div class="mobile mobile-wrap d-flex align-items-center justify-content-between flex-wrap flex-row">
        <button class="btn header-toggle" data-toggle="modal" data-target="#mobile_top_menu_wrapper">
          <svg width="30px" height="30px" fill="currentcolor">
            <use xlink:href="#mtoggle"></use>
          </svg>
        </button>

        <div id="_mobile_header_logo" class="mobile-logo"></div>
        <div class="mobile-right-block d-inline-flex align-items-center">
          <div id="_mobile_user_info" class="mobile-user"></div>
          <div id="_mobile_cart" class="mobile-cart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="nav-full-width">
    <div class="container">
      <div id="_mobile_search_default"></div>
      <div id="_mobile_search" class="mobile-search"></div>
    </div>
  </div>
<?php
}
}
/* {/block 'header_top'} */
}
