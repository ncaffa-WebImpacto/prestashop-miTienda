<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:09
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\errors\not-found.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd1f21682_02143741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae8276ba84ace35513fa187ca2b017b76ccadfd5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\errors\\not-found.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd1f21682_02143741 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<section id="content" class="page-not-found">
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20461379415ebc1cd1f1ffb4_48979500', 'page_content');
?>

</section>
<?php }
/* {block 'hook_not_found'} */
class Block_3365986745ebc1cd1f209b8_14177446 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNotFound'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_not_found'} */
/* {block 'page_content'} */
class Block_20461379415ebc1cd1f1ffb4_48979500 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_20461379415ebc1cd1f1ffb4_48979500',
  ),
  'hook_not_found' => 
  array (
    0 => 'Block_3365986745ebc1cd1f209b8_14177446',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <p class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There are no products in this category.','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3365986745ebc1cd1f209b8_14177446', 'hook_not_found', $this->tplIndex);
?>

  <?php
}
}
/* {/block 'page_content'} */
}
