<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:08
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\listing\product-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd04df233_87219365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b672cf57e45d4aa5bf96004625de2f195682df0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\listing\\product-list.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/products-top.tpl' => 1,
    'file:catalog/_partials/products.tpl' => 1,
    'file:catalog/_partials/products-bottom.tpl' => 1,
    'file:errors/not-found.tpl' => 1,
  ),
),false)) {
function content_5ebc1cd04df233_87219365 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['cat_layout'] == 1) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8257674605ebc1cd04c99e2_03406067', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16262694685ebc1cd04cca49_75912083', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18782096895ebc1cd04cd0c7_27596938', 'contentWrapperClass');
?>

<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['cat_layout'] == 2) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1036018775ebc1cd04ce1e0_10602150', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13894325415ebc1cd04ce812_14939875', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_304257055ebc1cd04cf2c1_59670144', 'contentWrapperClass');
?>

<?php } else { ?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21441371235ebc1cd04cfc20_76006298', 'left_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4273384725ebc1cd04d0249_68052809', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17960369065ebc1cd04d0833_01640682', 'contentWrapperClass');
?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1847864915ebc1cd04d1083_60907491', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layouts/layout-both-columns.tpl');
}
/* {block "left_column"} */
class Block_8257674605ebc1cd04c99e2_03406067 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_8257674605ebc1cd04c99e2_03406067',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="left-column" class="col-12 col-lg-3 order-2 order-lg-1">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayVerticalMenu"),$_smarty_tpl ) );?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayLeftColumn'),$_smarty_tpl ) );?>

    </div>
  <?php
}
}
/* {/block "left_column"} */
/* {block 'right_column'} */
class Block_16262694685ebc1cd04cca49_75912083 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_16262694685ebc1cd04cca49_75912083',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_18782096895ebc1cd04cd0c7_27596938 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_18782096895ebc1cd04cd0c7_27596938',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
left-column col-12 col-lg-9 order-1 order-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block "left_column"} */
class Block_1036018775ebc1cd04ce1e0_10602150 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_1036018775ebc1cd04ce1e0_10602150',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "left_column"} */
/* {block 'right_column'} */
class Block_13894325415ebc1cd04ce812_14939875 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_13894325415ebc1cd04ce812_14939875',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="right-column" class="col-12 col-lg-3 order-2">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayRightColumn'),$_smarty_tpl ) );?>

    </div>
  <?php
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_304257055ebc1cd04cf2c1_59670144 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_304257055ebc1cd04cf2c1_59670144',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
right-column col-12 col-lg-9 order-1<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'left_column'} */
class Block_21441371235ebc1cd04cfc20_76006298 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_21441371235ebc1cd04cfc20_76006298',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'left_column'} */
/* {block 'right_column'} */
class Block_4273384725ebc1cd04d0249_68052809 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_4273384725ebc1cd04d0249_68052809',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_17960369065ebc1cd04d0833_01640682 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_17960369065ebc1cd04d0833_01640682',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
col-12<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'product_list_header'} */
class Block_17819954565ebc1cd04d1480_22595198 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <h1 id="js-product-list-header" class="h1 page-maintitle"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing']->value['label'], ENT_QUOTES, 'UTF-8');?>
</h1>
    <?php
}
}
/* {/block 'product_list_header'} */
/* {block 'product_list_top'} */
class Block_12893002285ebc1cd04d7ba0_89160971 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products-top.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value), 0, false);
?>
          <?php
}
}
/* {/block 'product_list_top'} */
/* {block 'product_list_active_filters'} */
class Block_19130537805ebc1cd04db961_86453289 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div id="active-filters" class="">
            <?php echo $_smarty_tpl->tpl_vars['listing']->value['rendered_active_filters'];?>

          </div>
        <?php
}
}
/* {/block 'product_list_active_filters'} */
/* {block 'product_list'} */
class Block_19670980385ebc1cd04dca16_87132620 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value), 0, false);
?>
          <?php
}
}
/* {/block 'product_list'} */
/* {block 'product_list_bottom'} */
class Block_17993500865ebc1cd04dd6e9_00942983 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value), 0, false);
?>
          <?php
}
}
/* {/block 'product_list_bottom'} */
/* {block 'content'} */
class Block_1847864915ebc1cd04d1083_60907491 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1847864915ebc1cd04d1083_60907491',
  ),
  'product_list_header' => 
  array (
    0 => 'Block_17819954565ebc1cd04d1480_22595198',
  ),
  'product_list_top' => 
  array (
    0 => 'Block_12893002285ebc1cd04d7ba0_89160971',
  ),
  'product_list_active_filters' => 
  array (
    0 => 'Block_19130537805ebc1cd04db961_86453289',
  ),
  'product_list' => 
  array (
    0 => 'Block_19670980385ebc1cd04dca16_87132620',
  ),
  'product_list_bottom' => 
  array (
    0 => 'Block_17993500865ebc1cd04dd6e9_00942983',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section id="main">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17819954565ebc1cd04d1480_22595198', 'product_list_header', $this->tplIndex);
?>


    <section id="products">
      <?php if (count($_smarty_tpl->tpl_vars['listing']->value['products'])) {?>

        <div id="product-list-top">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12893002285ebc1cd04d7ba0_89160971', 'product_list_top', $this->tplIndex);
?>

        </div>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19130537805ebc1cd04db961_86453289', 'product_list_active_filters', $this->tplIndex);
?>


        <div id="product-list">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19670980385ebc1cd04dca16_87132620', 'product_list', $this->tplIndex);
?>

        </div>

        <div id="js-product-list-bottom">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17993500865ebc1cd04dd6e9_00942983', 'product_list_bottom', $this->tplIndex);
?>

        </div>

      <?php } else { ?>
        <div id="js-product-list-top"></div>
        <div id="js-product-list">
          <?php $_smarty_tpl->_subTemplateRender('file:errors/not-found.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div id="js-product-list-bottom"></div>
      <?php }?>
    </section>

  </section>
<?php
}
}
/* {/block 'content'} */
}
