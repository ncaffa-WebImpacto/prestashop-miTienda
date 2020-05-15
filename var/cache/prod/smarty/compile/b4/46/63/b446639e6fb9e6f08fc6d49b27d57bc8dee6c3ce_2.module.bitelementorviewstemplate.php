<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:59
  from 'module:bitelementorviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6423f0ea39_73129647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b446639e6fb9e6f08fc6d49b27d57bc8dee6c3ce' => 
    array (
      0 => 'module:bitelementorviewstemplate',
      1 => 1589401687,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6423f0ea39_73129647 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17689332205ebe6423f0d971_63446179', 'bitelementor');
?>

<?php }
/* {block 'bitelementor'} */
class Block_17689332205ebe6423f0d971_63446179 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bitelementor' => 
  array (
    0 => 'Block_17689332205ebe6423f0d971_63446179',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php
}
}
/* {/block 'bitelementor'} */
}
