<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:51:51
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\miniatures\countdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3c07378164_53365851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3c48dfb3404143d06d1fecbcdc00a2de20641a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\miniatures\\countdown.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/_partials/product-countdown-".((string)$_smarty_tpl->tpl_vars[\'style\']->value).".tpl' => 1,
  ),
),false)) {
function content_5ebe3c07378164_53365851 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17030262515ebe3c07376447_66476841', 'product_miniature_item');
?>

<?php }
/* {block 'product_miniature_item'} */
class Block_17030262515ebe3c07376447_66476841 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_17030262515ebe3c07376447_66476841',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <article class="product-miniature js-product-miniature col-12 style-deal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['style']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
">
        <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/_partials/product-countdown-".((string)$_smarty_tpl->tpl_vars['style']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </article>
<?php
}
}
/* {/block 'product_miniature_item'} */
}
