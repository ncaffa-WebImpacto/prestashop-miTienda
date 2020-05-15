<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:43:14
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\header-1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6432c8f4b7_17024148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95cc314a1dc0004303c0bfa6394733a55c8afc92' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\header-1.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6432c8f4b7_17024148 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_508414335ebe6432c89788_91327086', 'header_banner');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2453460415ebe6432c8a3c3_30165636', 'header_nav');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4243608165ebe6432c8c239_81407528', 'header_top');
?>

<?php }
/* {block 'header_banner'} */
class Block_508414335ebe6432c89788_91327086 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_banner' => 
  array (
    0 => 'Block_508414335ebe6432c89788_91327086',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-banner">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBanner'),$_smarty_tpl ) );?>

  </div>
<?php
}
}
/* {/block 'header_banner'} */
/* {block 'header_nav'} */
class Block_2453460415ebe6432c8a3c3_30165636 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_nav' => 
  array (
    0 => 'Block_2453460415ebe6432c8a3c3_30165636',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <nav class="header-nav">
    <div class="container">
      <div class="row d-none d-md-flex align-items-center justify-content-between m-0">
        <div class="left-nav d-inline-flex align-items-center justify-content-start">
          <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['welcome_status'] == 1) {?>
            <div class="welcome-message">
              <svg width="16px" height="16px" fill="currentcolor" class="mr-2">
                <use xlink:href="#bitheadercontact"></use>
              </svg>
              <div class="message_info">
                <?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['welcome_msg'];?>

              </div>
            </div>
          <?php }?>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav1'),$_smarty_tpl ) );?>

        </div>
        <div class="right-nav d-inline-flex align-items-center justify-content-end">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav2'),$_smarty_tpl ) );?>

        </div>
      </div>
    </div>
  </nav>
<?php
}
}
/* {/block 'header_nav'} */
/* {block 'header_top'} */
class Block_4243608165ebe6432c8c239_81407528 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_top' => 
  array (
    0 => 'Block_4243608165ebe6432c8c239_81407528',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-top">
    <div id="desktop-header-container" class="container">
      <div class="row align-items-center justify-content-between m-0">
        <div id="_desktop_header_logo" class="logowrap d-none d-md-block">
          <div id="header_logo">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
              <img class="logo img-fluid" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
            </a>
          </div>
        </div>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['widget'][0], array( array('name'=>"tdsearchblock"),$_smarty_tpl ) );?>

        <div class="right_content d-inline-flex hidden-md-down">
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTop'),$_smarty_tpl ) );?>

        </div>
      </div>
    </div>
  </div>
  <div class="nav-full-width">
    <div class="container bit-megamenu-container"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayMegamenu'),$_smarty_tpl ) );?>
</div>
    <div class="container">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNavFullWidth'),$_smarty_tpl ) );?>

    </div>
  </div>
<?php
}
}
/* {/block 'header_top'} */
}
