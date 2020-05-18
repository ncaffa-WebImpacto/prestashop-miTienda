<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:11
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\errors\404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec238573bc215_61883847',
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
function content_5ec238573bc215_61883847 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_359305695ec238573b20b5_00331203', 'page_header_container');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9591931295ec238573b29a0_20816386', 'page_footer_container');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5296921035ec238573b3039_24432004', 'pageWrapperClass');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6601234395ec238573b3690_40341981', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_header_container'} */
class Block_359305695ec238573b20b5_00331203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_header_container' => 
  array (
    0 => 'Block_359305695ec238573b20b5_00331203',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_header_container'} */
/* {block 'page_footer_container'} */
class Block_9591931295ec238573b29a0_20816386 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_footer_container' => 
  array (
    0 => 'Block_9591931295ec238573b29a0_20816386',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_footer_container'} */
/* {block 'pageWrapperClass'} */
class Block_5296921035ec238573b3039_24432004 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'pageWrapperClass' => 
  array (
    0 => 'Block_5296921035ec238573b3039_24432004',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
page-not-found <?php
}
}
/* {/block 'pageWrapperClass'} */
/* {block 'hook_not_found'} */
class Block_21050539585ec238573bac13_12652802 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNotFound'),$_smarty_tpl ) );?>

  <?php
}
}
/* {/block 'hook_not_found'} */
/* {block 'page_content_container'} */
class Block_6601234395ec238573b3690_40341981 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_6601234395ec238573b3690_40341981',
  ),
  'hook_not_found' => 
  array (
    0 => 'Block_21050539585ec238573bac13_12652802',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21050539585ec238573bac13_12652802', 'hook_not_found', $this->tplIndex);
?>

<?php
}
}
/* {/block 'page_content_container'} */
}
