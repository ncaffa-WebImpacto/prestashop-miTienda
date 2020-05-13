<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:00
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\layouts\layout-full-width.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc84b9f83_81571564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b431bbf0718e1845f3ae60951bcad7f47390458f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\layouts\\layout-full-width.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc84b9f83_81571564 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4703233545ebc1cc84b39e1_65804420', 'left_column');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14004719335ebc1cc84b40d8_04605914', 'right_column');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18714337975ebc1cc84b7611_44354532', "layout_row_start");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14313191705ebc1cc84b7dc0_94971412', "layout_row_end");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2665603765ebc1cc84b8376_98902586', 'content_wrapper');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layouts/layout-both-columns.tpl');
}
/* {block 'left_column'} */
class Block_4703233545ebc1cc84b39e1_65804420 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_4703233545ebc1cc84b39e1_65804420',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'left_column'} */
/* {block 'right_column'} */
class Block_14004719335ebc1cc84b40d8_04605914 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_14004719335ebc1cc84b40d8_04605914',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block "layout_row_start"} */
class Block_18714337975ebc1cc84b7611_44354532 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'layout_row_start' => 
  array (
    0 => 'Block_18714337975ebc1cc84b7611_44354532',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "layout_row_start"} */
/* {block "layout_row_end"} */
class Block_14313191705ebc1cc84b7dc0_94971412 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'layout_row_end' => 
  array (
    0 => 'Block_14313191705ebc1cc84b7dc0_94971412',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "layout_row_end"} */
/* {block 'contentWrapperClass'} */
class Block_4902397155ebc1cc84b8720_18527189 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'content'} */
class Block_8298334055ebc1cc84b9281_52214705 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <p>Hello world! This is HTML5 Boilerplate.</p>
    <?php
}
}
/* {/block 'content'} */
/* {block 'content_wrapper'} */
class Block_2665603765ebc1cc84b8376_98902586 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content_wrapper' => 
  array (
    0 => 'Block_2665603765ebc1cc84b8376_98902586',
  ),
  'contentWrapperClass' => 
  array (
    0 => 'Block_4902397155ebc1cc84b8720_18527189',
  ),
  'content' => 
  array (
    0 => 'Block_8298334055ebc1cc84b9281_52214705',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div id="content-wrapper" class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4902397155ebc1cc84b8720_18527189', 'contentWrapperClass', $this->tplIndex);
?>
">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayContentWrapperTop"),$_smarty_tpl ) );?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8298334055ebc1cc84b9281_52214705', 'content', $this->tplIndex);
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayContentWrapperBottom"),$_smarty_tpl ) );?>

  </div>
<?php
}
}
/* {/block 'content_wrapper'} */
}
