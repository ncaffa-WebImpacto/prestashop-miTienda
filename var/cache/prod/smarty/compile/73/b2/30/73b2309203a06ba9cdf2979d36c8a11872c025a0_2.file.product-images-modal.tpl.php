<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:57:34
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-images-modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3d5e02cf33_42604058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73b2309203a06ba9cdf2979d36c8a11872c025a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-images-modal.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe3d5e02cf33_42604058 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="js-product-images-modal">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17432511655ebe3d5e024618_62744290', 'product_reference');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12094842395ebe3d5e026ad3_03182502', 'product_quantities');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20628354165ebe3d5e029394_50819390', 'product_brands');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8397161255ebe3d5e02b757_23504028', 'product_condition');
?>

</div><!-- /.modal -->
<?php }
/* {block 'product_reference'} */
class Block_17432511655ebe3d5e024618_62744290 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_reference' => 
  array (
    0 => 'Block_17432511655ebe3d5e024618_62744290',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['reference_to_display']) && $_smarty_tpl->tpl_vars['product']->value['reference_to_display'] != '') {?>
            <div class="product-reference">
                <label class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SKU','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
:</label>
                <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
        <?php }?>
    <?php
}
}
/* {/block 'product_reference'} */
/* {block 'product_quantities'} */
class Block_12094842395ebe3d5e026ad3_03182502 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_quantities' => 
  array (
    0 => 'Block_12094842395ebe3d5e026ad3_03182502',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_quantities']) {?>
            <div class="product-quantities">
                <label class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In stock','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
:</label>
                <span data-stock="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
" data-allow-oosp="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['allow_oosp'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_label'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
        <?php }?>
    <?php
}
}
/* {/block 'product_quantities'} */
/* {block 'product_brands'} */
class Block_20628354165ebe3d5e029394_50819390 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_brands' => 
  array (
    0 => 'Block_20628354165ebe3d5e029394_50819390',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value['id_manufacturer']) {?>
            <div class="product-brand">
                <label class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Brand','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
:</label>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getManufacturerLink($_smarty_tpl->tpl_vars['product']->value['id_manufacturer']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_manufacturer']->value->name, ENT_QUOTES, 'UTF-8');?>
</a>
            </div>
        <?php }?>
    <?php
}
}
/* {/block 'product_brands'} */
/* {block 'product_condition'} */
class Block_8397161255ebe3d5e02b757_23504028 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_condition' => 
  array (
    0 => 'Block_8397161255ebe3d5e02b757_23504028',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value['condition']) {?>
        <div class="product-condition">
            <label class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Condition','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
:</label>
            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['condition']['label'], ENT_QUOTES, 'UTF-8');?>
</span>
        </div>
        <?php }?>
    <?php
}
}
/* {/block 'product_condition'} */
}
