<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:10
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23856452e07_74693309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91688b57b317adcbb8f535ca29037bc79592cc40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\footer.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/_partials/footer-1.tpl' => 1,
    'file:_partials/_partials/footer-2.tpl' => 1,
  ),
),false)) {
function content_5ec23856452e07_74693309 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1249805805ec23856450639_32817645', 'footer_desktop');
?>

<?php }
/* {block 'footer_desktop'} */
class Block_1249805805ec23856450639_32817645 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer_desktop' => 
  array (
    0 => 'Block_1249805805ec23856450639_32817645',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="footer-style-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['f_layout'], ENT_QUOTES, 'UTF-8');?>
">
    <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['f_layout'] == 1) {?>
      <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/footer-1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['f_layout'] == 2) {?>
      <?php $_smarty_tpl->_subTemplateRender('file:_partials/_partials/footer-2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
  </div>
<?php
}
}
/* {/block 'footer_desktop'} */
}
