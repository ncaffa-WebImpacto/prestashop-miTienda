<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:00
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\customer\authentication.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc82476b5_28366638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '712775ccff1c6a98d75d2877a8269fae9f168586' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\customer\\authentication.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc82476b5_28366638 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15696758735ebc1cc823e315_88660341', 'contentWrapperClass');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1705230485ebc1cc823efc1_27729728', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20527451305ebc1cc8243bc2_81599823', 'page_content');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12518099835ebc1cc8246576_57490150', 'page_footer');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'contentWrapperClass'} */
class Block_15696758735ebc1cc823e315_88660341 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_15696758735ebc1cc823e315_88660341',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
col-12 col-lg-8 offset-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'page_title'} */
class Block_1705230485ebc1cc823efc1_27729728 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_1705230485ebc1cc823efc1_27729728',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log in to your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'page_title'} */
/* {block 'display_after_login_form'} */
class Block_1510337555ebc1cc8245074_85806801 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCustomerLoginFormAfter'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'display_after_login_form'} */
/* {block 'login_form_container'} */
class Block_10439891425ebc1cc8243fd1_80418966 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section class="login-form">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('file'=>'customer/_partials/login-form.tpl','ui'=>$_smarty_tpl->tpl_vars['login_form']->value),$_smarty_tpl ) );?>

      </section>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1510337555ebc1cc8245074_85806801', 'display_after_login_form', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'login_form_container'} */
/* {block 'page_content'} */
class Block_20527451305ebc1cc8243bc2_81599823 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_20527451305ebc1cc8243bc2_81599823',
  ),
  'login_form_container' => 
  array (
    0 => 'Block_10439891425ebc1cc8243fd1_80418966',
  ),
  'display_after_login_form' => 
  array (
    0 => 'Block_1510337555ebc1cc8245074_85806801',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10439891425ebc1cc8243fd1_80418966', 'login_form_container', $this->tplIndex);
?>

<?php
}
}
/* {/block 'page_content'} */
/* {block 'page_footer'} */
class Block_12518099835ebc1cc8246576_57490150 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_footer' => 
  array (
    0 => 'Block_12518099835ebc1cc8246576_57490150',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="no-account">
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['register'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="display-register-form">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No account? Create one here','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

    </a>
  </div>
<?php
}
}
/* {/block 'page_footer'} */
}
