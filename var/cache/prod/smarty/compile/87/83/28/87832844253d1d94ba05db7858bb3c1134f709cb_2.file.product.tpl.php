<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:58
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\miniatures\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6422e40ca1_59891148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87832844253d1d94ba05db7858bb3c1134f709cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\miniatures\\product.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/_partials/product-miniature-".((string)$_smarty_tpl->tpl_vars[\'themeOpt\']->value[\'pl_grid_layout\']).".tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-".((string)$_smarty_tpl->tpl_vars[\'style\']->value).".tpl' => 1,
  ),
),false)) {
function content_5ebe6422e40ca1_59891148 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1597255665ebe6422e3cfa7_93724777', 'product_miniature_item');
?>

<?php }
/* {block 'product_miniature_item'} */
class Block_1597255665ebe6422e3cfa7_93724777 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_1597255665ebe6422e3cfa7_93724777',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <article class="product-miniature js-product-miniature col-12 style-<?php if (!isset($_smarty_tpl->tpl_vars['elementor']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['pl_grid_layout'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['style']->value, ENT_QUOTES, 'UTF-8');
}?>" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
">
        <?php if (!isset($_smarty_tpl->tpl_vars['elementor']->value)) {?>
            <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/_partials/product-miniature-".((string)$_smarty_tpl->tpl_vars['themeOpt']->value['pl_grid_layout']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/_partials/product-miniature-".((string)$_smarty_tpl->tpl_vars['style']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    </article>
<?php
}
}
/* {/block 'product_miniature_item'} */
}
