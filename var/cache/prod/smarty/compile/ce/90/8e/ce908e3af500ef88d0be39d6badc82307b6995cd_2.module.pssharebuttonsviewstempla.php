<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:14
  from 'module:pssharebuttonsviewstempla' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd6edcc46_36810527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce908e3af500ef88d0be39d6badc82307b6995cd' => 
    array (
      0 => 'module:pssharebuttonsviewstempla',
      1 => 1589356898,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd6edcc46_36810527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10137479985ebc1cd6ed9e71_28863742', 'social_sharing');
?>

<?php }
/* {block 'social_sharing'} */
class Block_10137479985ebc1cd6ed9e71_28863742 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'social_sharing' => 
  array (
    0 => 'Block_10137479985ebc1cd6ed9e71_28863742',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ($_smarty_tpl->tpl_vars['social_share_links']->value) {?>
    <div class="social-sharing">
      <div class="social-sharing-inner">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['social_share_links']->value, 'social_share_link');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['social_share_link']->value) {
?>
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="tip_inside <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['class'], ENT_QUOTES, 'UTF-8');?>
" target="_blank" rel="nofollow noopener">
            <svg width="16px" height="16px" fill="currentcolor">
              <use xlink:href="#pp_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['class'], ENT_QUOTES, 'UTF-8');?>
"></use>
            </svg>
            <span class="tip"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
          </a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    </div>
  <?php }
}
}
/* {/block 'social_sharing'} */
}
