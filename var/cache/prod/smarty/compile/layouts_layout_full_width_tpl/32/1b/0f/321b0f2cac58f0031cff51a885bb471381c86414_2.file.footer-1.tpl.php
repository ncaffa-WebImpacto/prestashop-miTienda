<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:56
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\footer-1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce8c89a09_51065449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '321b0f2cac58f0031cff51a885bb471381c86414' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\footer-1.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/_partials/contact-info.tpl' => 1,
    'module:ps_socialfollow/ps_socialfollow.tpl' => 1,
  ),
),false)) {
function content_5ebe8ce8c89a09_51065449 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="footer-container-before">
  <div class="container">
    <div class="row">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13277472445ebe8ce8c78566_47857834', 'hook_footer_before');
?>

    </div>
  </div>
</div>
<div class="footer-container">
  <div class="container">
    <div class="row">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1206344105ebe8ce8c79169_02165166', 'conatct-info');
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11898693565ebe8ce8c79c91_66096328', 'hook_footer');
?>

    </div>
  </div>
  <div class="footer-container-after">
    <div class="container">
      <div class="row align-items-center">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75318285ebe8ce8c7a6f7_50241865', 'hook_footer_after');
?>

        <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['fc_sys_img']) && $_smarty_tpl->tpl_vars['themeOpt']->value['fc_sys_img']) {?>
          <div class="<?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright']) && $_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright']) {?>col-12 col-md-4<?php } else { ?>col<?php }?> system-logo text-md-left text-center">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['fc_sys_img'], ENT_QUOTES, 'UTF-8');?>
" class="img-fluid" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'System Logo','d'=>'Shop.ThemeDelights'),$_smarty_tpl ) );?>
"/>
          </div>
        <?php }?>

        <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['widget_block'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['widget_block'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'smartyWidgetBlock'))) {
throw new SmartyException('block tag \'widget_block\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('widget_block', array('name'=>"ps_socialfollow"));
$_block_repeat=true;
echo $_block_plugin1->smartyWidgetBlock(array('name'=>"ps_socialfollow"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
          <?php $_smarty_tpl->_subTemplateRender('module:ps_socialfollow/ps_socialfollow.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_block_repeat=false;
echo $_block_plugin1->smartyWidgetBlock(array('name'=>"ps_socialfollow"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['fc_img']) && $_smarty_tpl->tpl_vars['themeOpt']->value['fc_img']) {?>
          <div class="<?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright']) && $_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright']) {?>col-12 col-md-4<?php } else { ?>col<?php }?> payment-logo text-md-right text-center">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['fc_img'], ENT_QUOTES, 'UTF-8');?>
" class="img-fluid" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payments Logo','d'=>'Shop.ThemeDelights'),$_smarty_tpl ) );?>
"/>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['fc_status']) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5632051385ebe8ce8c86490_34200225', 'footer_copyrights');
?>

<?php }?>


<style>
  .custom-file-label::after{
    content:"<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose file','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
"
  }
</style>
<?php }
/* {block 'hook_footer_before'} */
class Block_13277472445ebe8ce8c78566_47857834 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_before' => 
  array (
    0 => 'Block_13277472445ebe8ce8c78566_47857834',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterBefore'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'hook_footer_before'} */
/* {block 'conatct-info'} */
class Block_1206344105ebe8ce8c79169_02165166 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'conatct-info' => 
  array (
    0 => 'Block_1206344105ebe8ce8c79169_02165166',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/contact-info.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php
}
}
/* {/block 'conatct-info'} */
/* {block 'hook_footer'} */
class Block_11898693565ebe8ce8c79c91_66096328 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_11898693565ebe8ce8c79c91_66096328',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'hook_footer'} */
/* {block 'hook_footer_after'} */
class Block_75318285ebe8ce8c7a6f7_50241865 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_after' => 
  array (
    0 => 'Block_75318285ebe8ce8c7a6f7_50241865',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterAfter'),$_smarty_tpl ) );?>

        <?php
}
}
/* {/block 'hook_footer_after'} */
/* {block 'footer_copyrights'} */
class Block_5632051385ebe8ce8c86490_34200225 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer_copyrights' => 
  array (
    0 => 'Block_5632051385ebe8ce8c86490_34200225',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright']) && $_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright']) {?>
            <div class="<?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['fc_img']) && $_smarty_tpl->tpl_vars['themeOpt']->value['fc_img']) {?>col-12<?php } else { ?>col<?php }?> rte-content copyright-txt text-center">
              <?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['fc_copyright'];?>

            </div>
          <?php }?>
        </div>
      </div>
    </div>
  <?php
}
}
/* {/block 'footer_copyrights'} */
}
