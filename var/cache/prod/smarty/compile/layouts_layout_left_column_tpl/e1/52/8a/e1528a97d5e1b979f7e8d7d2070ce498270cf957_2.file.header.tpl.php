<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:09
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd1272962_01424321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1528a97d5e1b979f7e8d7d2070ce498270cf957' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\header.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/_partials/header-1.tpl' => 1,
    'file:_partials/_partials/header-2.tpl' => 1,
    'file:_partials/_partials/mobile-header-1.tpl' => 1,
    'file:_partials/_partials/mobile-header-2.tpl' => 1,
  ),
),false)) {
function content_5ebc1cd1272962_01424321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9972875545ebc1cd126d996_60126869', 'header_desktop');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1757585125ebc1cd1270605_79759988', 'mobile_desktop');
}
/* {block 'header_desktop'} */
class Block_9972875545ebc1cd126d996_60126869 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_desktop' => 
  array (
    0 => 'Block_9972875545ebc1cd126d996_60126869',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div id="desktop-header" class="header-style-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['h_layout'], ENT_QUOTES, 'UTF-8');?>
 hidden-md-down">
    <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['h_layout'] == 1) {?>
      <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/header-1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['h_layout'] == 2) {?>
      <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/header-2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
  </div>
<?php
}
}
/* {/block 'header_desktop'} */
/* {block 'mobile_desktop'} */
class Block_1757585125ebc1cd1270605_79759988 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mobile_desktop' => 
  array (
    0 => 'Block_1757585125ebc1cd1270605_79759988',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div id="desktop-mobile-header" class="header-style-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['res_h_layout'], ENT_QUOTES, 'UTF-8');?>
 hidden-lg-up">
    <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['res_h_layout'] == 1) {?>
      <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/mobile-header-1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['res_h_layout'] == 2) {?>
      <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/mobile-header-2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
  </div>
<?php
}
}
/* {/block 'mobile_desktop'} */
}
