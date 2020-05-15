<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:57
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\errors\404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce9ae2060_61820442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a27d5b6f297196ccad273760bf26223c4933d48' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\errors\\404.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce9ae2060_61820442 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7983228715ebe8ce9ad89d9_91202099', 'page_header_container');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7569300715ebe8ce9ad91e5_58951624', 'page_footer_container');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16732219705ebe8ce9ad97b2_74115572', 'pageWrapperClass');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7555749185ebe8ce9ad9de9_46909245', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_header_container'} */
class Block_7983228715ebe8ce9ad89d9_91202099 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_header_container' => 
  array (
    0 => 'Block_7983228715ebe8ce9ad89d9_91202099',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_header_container'} */
/* {block 'page_footer_container'} */
class Block_7569300715ebe8ce9ad91e5_58951624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_footer_container' => 
  array (
    0 => 'Block_7569300715ebe8ce9ad91e5_58951624',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_footer_container'} */
/* {block 'pageWrapperClass'} */
class Block_16732219705ebe8ce9ad97b2_74115572 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'pageWrapperClass' => 
  array (
    0 => 'Block_16732219705ebe8ce9ad97b2_74115572',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
page-not-found <?php
}
}
/* {/block 'pageWrapperClass'} */
/* {block 'hook_not_found'} */
class Block_17108350315ebe8ce9ae0b85_55690120 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNotFound'),$_smarty_tpl ) );?>

  <?php
}
}
/* {/block 'hook_not_found'} */
/* {block 'page_content_container'} */
class Block_7555749185ebe8ce9ad9de9_46909245 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_7555749185ebe8ce9ad9de9_46909245',
  ),
  'hook_not_found' => 
  array (
    0 => 'Block_17108350315ebe8ce9ae0b85_55690120',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="text-center">
    <p class="pnf-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'404','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>
    <p class="pnf-subtitle"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['title'], ENT_QUOTES, 'UTF-8');?>
</p>
    <p class="pnf-desc"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can either return to previous page, visit our homepage or contact our support team.','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>

    <div class="pnf-buttons">
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visit Homepage','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</a><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['contact'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-secondary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</a>
    </div>
  </div>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17108350315ebe8ce9ae0b85_55690120', 'hook_not_found', $this->tplIndex);
?>

<?php
}
}
/* {/block 'page_content_container'} */
}
