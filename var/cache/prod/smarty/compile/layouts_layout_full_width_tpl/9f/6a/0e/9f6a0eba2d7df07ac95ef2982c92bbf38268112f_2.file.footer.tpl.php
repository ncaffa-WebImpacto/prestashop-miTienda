<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d06e1aae7_43301113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f6a0eba2d7df07ac95ef2982c92bbf38268112f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\footer.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/footer.tpl' => 1,
  ),
),false)) {
function content_5ebc1d06e1aae7_43301113 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14886550865ebc1d06e18f85_49433700', 'footer');
?>

<?php }
/* {block 'footer'} */
class Block_14886550865ebc1d06e18f85_49433700 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_14886550865ebc1d06e18f85_49433700',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php $_smarty_tpl->_subTemplateRender('file:_partials/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block 'footer'} */
}
