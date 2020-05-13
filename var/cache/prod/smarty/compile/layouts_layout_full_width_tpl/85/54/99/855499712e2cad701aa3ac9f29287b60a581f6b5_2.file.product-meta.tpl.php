<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:14
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-meta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd6d84077_87059996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '855499712e2cad701aa3ac9f29287b60a581f6b5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-meta.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd6d84077_87059996 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tags'] == '1' || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_cats'] == '1') {?>
    <div class="js-product-meta">
        <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tags'] == '1') {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16246948265ebc1cd6d779a2_75666915', 'product_tags');
?>

        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_cats'] == '1') {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13886131905ebc1cd6d80b10_63119132', 'product_categorie');
?>

        <?php }?>
    </div><!-- /.modal -->
<?php }
}
/* {block 'product_tags'} */
class Block_16246948265ebc1cd6d779a2_75666915 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_tags' => 
  array (
    0 => 'Block_16246948265ebc1cd6d779a2_75666915',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php $_smarty_tpl->_assignInScope('tags', Tag::getProductTags(Tools::getValue('id_product')));?>
                <?php $_smarty_tpl->_assignInScope('id_lang', $_smarty_tpl->tpl_vars['language']->value['id']);?>
                <?php if ($_smarty_tpl->tpl_vars['tags']->value[$_smarty_tpl->tpl_vars['id_lang']->value]) {?>
                    <div class="product-tags">
                        <label class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tags:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</label>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value[$_smarty_tpl->tpl_vars['id_lang']->value], 'tags', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['tags']->value) {
?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag', false, NULL, 'tag', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
                                <a href="<?php ob_start();
echo htmlspecialchars(urlencode($_smarty_tpl->tpl_vars['tag']->value), ENT_QUOTES, 'UTF-8');
$_prefixVariable1=ob_get_clean();
echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,NULL,"tag=".$_prefixVariable1), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tag']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
            <?php
}
}
/* {/block 'product_tags'} */
/* {block 'product_categorie'} */
class Block_13886131905ebc1cd6d80b10_63119132 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_categorie' => 
  array (
    0 => 'Block_13886131905ebc1cd6d80b10_63119132',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="product-cats">
                    <label class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Categories:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</label>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Product::getProductCategoriesFull(Tools::getValue('id_product')), 'cat', false, NULL, 'cat', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
                        <a href="<?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value['id_category'], ENT_QUOTES, 'UTF-8');
$_prefixVariable2 = ob_get_clean();
echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_prefixVariable2), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php
}
}
/* {/block 'product_categorie'} */
}
