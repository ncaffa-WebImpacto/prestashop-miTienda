<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:07
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec238530ebb79_80726882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1de17912ec772ca3b0f796272f0811d5488eb8ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\product.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/product-cover-thumbnails.tpl' => 1,
    'file:catalog/_partials/product-images-modal.tpl' => 1,
    'file:catalog/_partials/product-customization.tpl' => 1,
    'file:catalog/_partials/product-discounts.tpl' => 1,
    'file:catalog/_partials/product-prices.tpl' => 1,
    'file:catalog/_partials/countdown.tpl' => 1,
    'file:catalog/_partials/product-variants.tpl' => 1,
    'file:catalog/_partials/miniatures/pack-product.tpl' => 1,
    'file:catalog/_partials/product-add-to-cart.tpl' => 1,
    'file:catalog/_partials/product-payment-logo.tpl' => 1,
    'file:catalog/_partials/product-meta.tpl' => 1,
    'file:catalog/_partials/product-additional-info.tpl' => 1,
    'file:catalog/_partials/product-details.tpl' => 2,
    'file:catalog/_partials/miniatures/product.tpl' => 1,
  ),
),false)) {
function content_5ec238530ebb79_80726882 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10616698045ec23853096d23_08301275', 'head_seo');
?>


<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 1) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4072407785ec2385309a725_61109570', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20328826705ec2385309d4f5_16970605', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20631368435ec2385309dae3_75909026', 'contentWrapperClass');
?>

<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 2) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19293850285ec2385309ea42_67256920', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3488342335ec2385309eff3_61745655', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8559585565ec2385309fa17_35695510', 'contentWrapperClass');
?>

<?php } else { ?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15849645465ec238530a0382_83369629', 'left_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9729435635ec238530a0957_09962059', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4636606975ec238530a0ed4_39079416', 'contentWrapperClass');
?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19604714395ec238530a1676_37145538', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layouts/layout-both-columns.tpl');
}
/* {block 'head_seo'} */
class Block_10616698045ec23853096d23_08301275 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head_seo' => 
  array (
    0 => 'Block_10616698045ec23853096d23_08301275',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <link rel="canonical" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['canonical_url'], ENT_QUOTES, 'UTF-8');?>
">
<?php
}
}
/* {/block 'head_seo'} */
/* {block "left_column"} */
class Block_4072407785ec2385309a725_61109570 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_4072407785ec2385309a725_61109570',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="left-column" class="left-column col-12 col-lg-3 order-2 order-lg-1">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayVerticalMenu"),$_smarty_tpl ) );?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayLeftColumnProduct'),$_smarty_tpl ) );?>

    </div>
  <?php
}
}
/* {/block "left_column"} */
/* {block 'right_column'} */
class Block_20328826705ec2385309d4f5_16970605 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_20328826705ec2385309d4f5_16970605',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_20631368435ec2385309dae3_75909026 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_20631368435ec2385309dae3_75909026',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
left-column col-12 col-lg-9 order-1 order-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block "left_column"} */
class Block_19293850285ec2385309ea42_67256920 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_19293850285ec2385309ea42_67256920',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "left_column"} */
/* {block 'right_column'} */
class Block_3488342335ec2385309eff3_61745655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_3488342335ec2385309eff3_61745655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="right-column" class="right-column col-12 col-lg-3 order-2">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayRightColumnProduct'),$_smarty_tpl ) );?>

    </div>
  <?php
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_8559585565ec2385309fa17_35695510 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_8559585565ec2385309fa17_35695510',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
right-column col-12 col-lg-9 order-1<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'left_column'} */
class Block_15849645465ec238530a0382_83369629 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_15849645465ec238530a0382_83369629',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'left_column'} */
/* {block 'right_column'} */
class Block_9729435635ec238530a0957_09962059 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_9729435635ec238530a0957_09962059',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_4636606975ec238530a0ed4_39079416 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_4636606975ec238530a0ed4_39079416',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
col-12<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'product_cover_thumbnails'} */
class Block_6459787495ec238530a46e9_67774307 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] != 8 && $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] != 9) {?>
                  <div class="<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 1 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 2 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 3) {?>js-cover-carousel<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>js-cover-vcarousel<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>js-cover-multicarousel<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 7) {?>js-cover-singlecarousel<?php }?>">
                <?php }?>
                <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-cover-thumbnails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] != 8 && $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] != 9) {?>
                  </div>
                <?php }?>
              <?php
}
}
/* {/block 'product_cover_thumbnails'} */
/* {block 'page_content'} */
class Block_11919433655ec238530a4329_60964311 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6459787495ec238530a46e9_67774307', 'product_cover_thumbnails', $this->tplIndex);
?>

            <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_19134428045ec238530a3ea8_25803145 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <section class="page-content--product" id="content">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11919433655ec238530a4329_60964311', 'page_content', $this->tplIndex);
?>

          </section>
        <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_title'} */
class Block_16960970995ec238530af481_78662617 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_17410440255ec238530af0c1_60564288 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <h1 class="product_title h1"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16960970995ec238530af481_78662617', 'page_title', $this->tplIndex);
?>
</h1>
            <?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_12632012545ec238530aece3_02132713 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="product-action-wrap">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17410440255ec238530af0c1_60564288', 'page_header', $this->tplIndex);
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayPrevNext'),$_smarty_tpl ) );?>

          </div>
        <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'product_comment'} */
class Block_21215110585ec238530b07e4_09371506 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayTdProductExtra', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTdProductExtra'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
            <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductExtra')) {?>
              <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductExtra');?>

            <?php }?>
          <?php
}
}
/* {/block 'product_comment'} */
/* {block 'product_description_short'} */
class Block_20881392115ec238530b5192_62713006 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <div id="product-description-short-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="rte-content"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
          <?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_images_modal'} */
class Block_18470505935ec238530b6299_25728346 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-images-modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php
}
}
/* {/block 'product_images_modal'} */
/* {block 'product_customization'} */
class Block_3003315005ec238530b79f2_15134207 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/product-customization.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('customizations'=>$_smarty_tpl->tpl_vars['product']->value['customizations']), 0, false);
?>
            <?php
}
}
/* {/block 'product_customization'} */
/* {block 'product_extra_info'} */
class Block_11295978505ec238530b8aa2_46840249 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            
          <?php
}
}
/* {/block 'product_extra_info'} */
/* {block 'product_discounts'} */
class Block_4910569735ec238530ba682_63848143 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-discounts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_discounts'} */
/* {block 'product_prices'} */
class Block_2865544265ec238530bb051_95137479 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-prices.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_prices'} */
/* {block 'product_deals'} */
class Block_5040360015ec238530bba29_12344159 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/countdown.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_deals'} */
/* {block 'product_variants'} */
class Block_11260720685ec238530bc3e5_20697235 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-variants.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_variants'} */
/* {block 'product_miniature'} */
class Block_9239011595ec238530bebb6_49202166 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                          <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/pack-product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product_pack']->value), 0, true);
?>
                        <?php
}
}
/* {/block 'product_miniature'} */
/* {block 'product_pack'} */
class Block_2095853375ec238530bcda6_91463447 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php if ($_smarty_tpl->tpl_vars['packItems']->value) {?>
                    <section class="product-pack mt-4">
                      <p class="h4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This pack contains','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</p>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packItems']->value, 'product_pack');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_pack']->value) {
?>
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9239011595ec238530bebb6_49202166', 'product_miniature', $this->tplIndex);
?>

                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </section>
                  <?php }?>
                <?php
}
}
/* {/block 'product_pack'} */
/* {block 'product_add_to_cart'} */
class Block_395126475ec238530bfdc0_17105133 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-add-to-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_add_to_cart'} */
/* {block 'product_payment_logo'} */
class Block_5370912425ec238530c07a1_50407876 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-payment-logo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_payment_logo'} */
/* {block 'product_meta'} */
class Block_15855203985ec238530c11b9_92278441 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_meta'} */
/* {block 'product_additional_info'} */
class Block_4711618335ec238530c1b88_53018508 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-additional-info.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_additional_info'} */
/* {block 'product_refresh'} */
class Block_11863592995ec238530c2629_35340594 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'product_refresh'} */
/* {block 'product_buy'} */
class Block_4760268325ec238530b9090_87757157 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" method="post" id="add-to-cart-or-refresh">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" id="product_customization_id">
                
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4910569735ec238530ba682_63848143', 'product_discounts', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2865544265ec238530bb051_95137479', 'product_prices', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5040360015ec238530bba29_12344159', 'product_deals', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11260720685ec238530bc3e5_20697235', 'product_variants', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2095853375ec238530bcda6_91463447', 'product_pack', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_395126475ec238530bfdc0_17105133', 'product_add_to_cart', $this->tplIndex);
?>
        
                
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5370912425ec238530c07a1_50407876', 'product_payment_logo', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15855203985ec238530c11b9_92278441', 'product_meta', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4711618335ec238530c1b88_53018508', 'product_additional_info', $this->tplIndex);
?>


                                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11863592995ec238530c2629_35340594', 'product_refresh', $this->tplIndex);
?>

              </form>
            <?php
}
}
/* {/block 'product_buy'} */
/* {block 'hook_display_reassurance'} */
class Block_6133105575ec238530c2ed0_54267251 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayReassurance'),$_smarty_tpl ) );?>

          <?php
}
}
/* {/block 'hook_display_reassurance'} */
/* {block 'product_comment_tab'} */
class Block_10116749225ec238530c93a2_93352077 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayTdProductTab', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTdProductTab'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
                <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTab')) {?>
                  <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTab');?>

                <?php }?>
              <?php
}
}
/* {/block 'product_comment_tab'} */
/* {block 'product_description'} */
class Block_11299955795ec238530cb832_28814644 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                  <div class="product-description">
                    <div class="rte-content">
                      <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                    </div>
                  </div>
                <?php
}
}
/* {/block 'product_description'} */
/* {block 'product_details'} */
class Block_12050930885ec238530cc5d0_40306499 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-details.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php
}
}
/* {/block 'product_details'} */
/* {block 'product_attachments'} */
class Block_1268834135ec238530ccfc9_08178660 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php if ($_smarty_tpl->tpl_vars['product']->value['attachments']) {?>
                <div class="tab-pane" id="attachments" role="tabpanel">
                  <section class="product-attachments">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['attachments'], 'attachment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->value) {
?>
                      <div class="attachment">
                        <h3><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'attachment','params'=>array('id_attachment'=>$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h3>
                        <p class=""><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['description'], ENT_QUOTES, 'UTF-8');?>
</p>
                        <a class="btn btn-primary" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'attachment','params'=>array('id_attachment'=>$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])),$_smarty_tpl ) );?>
">
                          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['file_size_formatted'], ENT_QUOTES, 'UTF-8');?>
)
                        </a>
                      </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </section>
                </div>
              <?php }?>
            <?php
}
}
/* {/block 'product_attachments'} */
/* {block 'product_comment_tab_content'} */
class Block_17896720155ec238530d43d2_49001798 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayTdProductTabContent', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTdProductTabContent'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
              <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTabContent')) {?>
                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTabContent');?>

              <?php }?>
            <?php
}
}
/* {/block 'product_comment_tab_content'} */
/* {block 'product_description'} */
class Block_16812329415ec238530d7be5_73530395 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="product-description">
                  <div class="rte-content">
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                  </div>
                </div>
              <?php
}
}
/* {/block 'product_description'} */
/* {block 'product_details'} */
class Block_14243390015ec238530d9fe5_20542581 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-details.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
          <?php
}
}
/* {/block 'product_details'} */
/* {block 'product_attachments'} */
class Block_6287895625ec238530db6d7_10659406 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php if ($_smarty_tpl->tpl_vars['product']->value['attachments']) {?>
              <div class="accordion-tab-description  collapse" id="attachments" role="tabpanel">
                <section class="product-attachments">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['attachments'], 'attachment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->value) {
?>
                    <div class="attachment">
                      <h4><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'attachment','params'=>array('id_attachment'=>$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h4>
                      <p class="small"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['description'], ENT_QUOTES, 'UTF-8');?>
</p>
                      <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'attachment','params'=>array('id_attachment'=>$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])),$_smarty_tpl ) );?>
">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['file_size_formatted'], ENT_QUOTES, 'UTF-8');?>
)
                      </a>
                    </div>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </section>
              </div>
            <?php }?>
          <?php
}
}
/* {/block 'product_attachments'} */
/* {block 'product_comment_tab'} */
class Block_18021113375ec238530e2a67_02638911 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayTdProductTab', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTdProductTab'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
            <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTab')) {?>
                <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTab');?>

            <?php }?>
          <?php
}
}
/* {/block 'product_comment_tab'} */
/* {block 'product_comment_tab_content'} */
class Block_1301560735ec238530e4958_89795165 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayTdProductTabContent', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTdProductTabContent'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
            <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTabContent')) {?>
              <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayTdProductTabContent');?>

            <?php }?>
          <?php
}
}
/* {/block 'product_comment_tab_content'} */
/* {block 'product_tabs'} */
class Block_18832847525ec238530c39f2_25330169 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="tabs product-tabs <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'], ENT_QUOTES, 'UTF-8');?>
-tabs">
        <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'vertical' || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'horizontal') {?>
          <div class="box-nav-tab">
            <div class="dropdown-toggle-nav-tab hidden-lg-up"></div>
            <ul class="nav nav-tabs dropdown-menu-nav-tab" role="tablist">
              <?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#description"
                    role="tab"
                    aria-controls="description"
                    aria-selected="true"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Description','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
                </li>
              <?php }?>
              <li class="nav-item">
                <a
                  class="nav-link<?php if (!$_smarty_tpl->tpl_vars['product']->value['description']) {?> active<?php }?>"
                  data-toggle="tab"
                  href="#product-details"
                  role="tab"
                  aria-controls="product-details"
                  <?php if (!$_smarty_tpl->tpl_vars['product']->value['description']) {?> aria-selected="true"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Details','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
              </li>
              <?php if ($_smarty_tpl->tpl_vars['product']->value['attachments']) {?>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#attachments"
                    role="tab"
                    aria-controls="attachments"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Attachments','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
                </li>
              <?php }?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['extraContent'], 'extra', false, 'extraKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extraKey']->value => $_smarty_tpl->tpl_vars['extra']->value) {
?>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
"
                    role="tab"
                    aria-controls="extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
                </li>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10116749225ec238530c93a2_93352077', 'product_comment_tab', $this->tplIndex);
?>

            </ul>
          </div>
          <div class="tab-content" id="tab-content">
            <?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
              <div class="tab-pane active" id="description" role="tabpanel">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11299955795ec238530cb832_28814644', 'product_description', $this->tplIndex);
?>

              </div>
            <?php }?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12050930885ec238530cc5d0_40306499', 'product_details', $this->tplIndex);
?>


            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1268834135ec238530ccfc9_08178660', 'product_attachments', $this->tplIndex);
?>


            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['extraContent'], 'extra', false, 'extraKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extraKey']->value => $_smarty_tpl->tpl_vars['extra']->value) {
?>
              <div class="tab-pane <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra']->value['attr']['class'], ENT_QUOTES, 'UTF-8');?>
" id="extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
" role="tabpanel" <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extra']->value['attr'], 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value, ENT_QUOTES, 'UTF-8');?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>>
                <?php echo $_smarty_tpl->tpl_vars['extra']->value['content'];?>

              </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17896720155ec238530d43d2_49001798', 'product_comment_tab_content', $this->tplIndex);
?>

          </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'accordion') {?>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
            <a
              class="accordion-tab-title active"
              data-toggle="collapse"
              href="#description"
              role="tab"
              aria-controls="description"
              aria-selected="true"
              aria-expanded="true"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Description','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>

            </a>
          <?php }?> 
          <?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
            <div class="accordion-tab-description collapse show" id="description" role="tabpanel">
              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16812329415ec238530d7be5_73530395', 'product_description', $this->tplIndex);
?>

            </div>
          <?php }?>

          <a
            class="accordion-tab-title <?php if (!$_smarty_tpl->tpl_vars['product']->value['description']) {?> active<?php }?>"
            data-toggle="collapse"
            href="#product-details"
            role="tab"
            aria-controls="product-details"
            <?php if (!$_smarty_tpl->tpl_vars['product']->value['description']) {?> aria-selected="true" aria-expanded="true"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Details','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>

          </a>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14243390015ec238530d9fe5_20542581', 'product_details', $this->tplIndex);
?>

  
          <?php if ($_smarty_tpl->tpl_vars['product']->value['attachments']) {?>
            <a
              class="accordion-tab-title"
              data-toggle="collapse"
              href="#attachments"
              role="tab"
              aria-controls="attachments"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Attachments','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</a>
          <?php }?>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6287895625ec238530db6d7_10659406', 'product_attachments', $this->tplIndex);
?>
 
          
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['extraContent'], 'extra', false, 'extraKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['extraKey']->value => $_smarty_tpl->tpl_vars['extra']->value) {
?>
            <a
              class="accordion-tab-title"
              data-toggle="collapse"
              href="#extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
"
              role="tab"
              aria-controls="extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra']->value['title'], ENT_QUOTES, 'UTF-8');?>

            </a>
            <div class="accordion-tab-description  collapse <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra']->value['attr']['class'], ENT_QUOTES, 'UTF-8');?>
" id="extra-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extraKey']->value, ENT_QUOTES, 'UTF-8');?>
" role="tabpanel" <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extra']->value['attr'], 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value, ENT_QUOTES, 'UTF-8');?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>>
              <?php echo $_smarty_tpl->tpl_vars['extra']->value['content'];?>

            </div>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18021113375ec238530e2a67_02638911', 'product_comment_tab', $this->tplIndex);
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1301560735ec238530e4958_89795165', 'product_comment_tab_content', $this->tplIndex);
?>

        <?php }?>
      </div>
    <?php
}
}
/* {/block 'product_tabs'} */
/* {block 'product_miniature'} */
class Block_3667188555ec238530e8a96_81817510 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product_accessory']->value), 0, true);
?>
                  <?php
}
}
/* {/block 'product_miniature'} */
/* {block 'product_accessories'} */
class Block_11190167005ec238530e7071_03952149 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php if ($_smarty_tpl->tpl_vars['accessories']->value) {?>
        <section class="product-accessories products_block clearfix">
          <div class="products_block_inner">
            <p class="products-section-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You might also like','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</p>
            <div class="block_content products row">
              <div class="owl-carousel owl-arrows-inside owl-dots-outside" data-owl-carousel='{ "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": "5000", "responsive":{ "0":{ "items": 1 }, "544":{ "items": 2 }, "768":{ "items": 3 }, "992":{ "items": 3 }, "1200":{ "items": 4 } } }'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accessories']->value, 'product_accessory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_accessory']->value) {
?>
                  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3667188555ec238530e8a96_81817510', 'product_miniature', $this->tplIndex);
?>

                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
            </div>
          </div>
        </section>
      <?php }?>
    <?php
}
}
/* {/block 'product_accessories'} */
/* {block 'product_footer'} */
class Block_18533744495ec238530e9c71_94126066 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterProduct','product'=>$_smarty_tpl->tpl_vars['product']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'product_footer'} */
/* {block 'page_footer'} */
class Block_18001448685ec238530ead41_75102057 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_4913564825ec238530ea972_20085346 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18001448685ec238530ead41_75102057', 'page_footer', $this->tplIndex);
?>
</footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_19604714395ec238530a1676_37145538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19604714395ec238530a1676_37145538',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_19134428045ec238530a3ea8_25803145',
  ),
  'page_content' => 
  array (
    0 => 'Block_11919433655ec238530a4329_60964311',
  ),
  'product_cover_thumbnails' => 
  array (
    0 => 'Block_6459787495ec238530a46e9_67774307',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_12632012545ec238530aece3_02132713',
  ),
  'page_header' => 
  array (
    0 => 'Block_17410440255ec238530af0c1_60564288',
  ),
  'page_title' => 
  array (
    0 => 'Block_16960970995ec238530af481_78662617',
  ),
  'product_comment' => 
  array (
    0 => 'Block_21215110585ec238530b07e4_09371506',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_20881392115ec238530b5192_62713006',
  ),
  'product_images_modal' => 
  array (
    0 => 'Block_18470505935ec238530b6299_25728346',
  ),
  'product_customization' => 
  array (
    0 => 'Block_3003315005ec238530b79f2_15134207',
  ),
  'product_extra_info' => 
  array (
    0 => 'Block_11295978505ec238530b8aa2_46840249',
  ),
  'product_buy' => 
  array (
    0 => 'Block_4760268325ec238530b9090_87757157',
  ),
  'product_discounts' => 
  array (
    0 => 'Block_4910569735ec238530ba682_63848143',
  ),
  'product_prices' => 
  array (
    0 => 'Block_2865544265ec238530bb051_95137479',
  ),
  'product_deals' => 
  array (
    0 => 'Block_5040360015ec238530bba29_12344159',
  ),
  'product_variants' => 
  array (
    0 => 'Block_11260720685ec238530bc3e5_20697235',
  ),
  'product_pack' => 
  array (
    0 => 'Block_2095853375ec238530bcda6_91463447',
  ),
  'product_miniature' => 
  array (
    0 => 'Block_9239011595ec238530bebb6_49202166',
    1 => 'Block_3667188555ec238530e8a96_81817510',
  ),
  'product_add_to_cart' => 
  array (
    0 => 'Block_395126475ec238530bfdc0_17105133',
  ),
  'product_payment_logo' => 
  array (
    0 => 'Block_5370912425ec238530c07a1_50407876',
  ),
  'product_meta' => 
  array (
    0 => 'Block_15855203985ec238530c11b9_92278441',
  ),
  'product_additional_info' => 
  array (
    0 => 'Block_4711618335ec238530c1b88_53018508',
  ),
  'product_refresh' => 
  array (
    0 => 'Block_11863592995ec238530c2629_35340594',
  ),
  'hook_display_reassurance' => 
  array (
    0 => 'Block_6133105575ec238530c2ed0_54267251',
  ),
  'product_tabs' => 
  array (
    0 => 'Block_18832847525ec238530c39f2_25330169',
  ),
  'product_comment_tab' => 
  array (
    0 => 'Block_10116749225ec238530c93a2_93352077',
    1 => 'Block_18021113375ec238530e2a67_02638911',
  ),
  'product_description' => 
  array (
    0 => 'Block_11299955795ec238530cb832_28814644',
    1 => 'Block_16812329415ec238530d7be5_73530395',
  ),
  'product_details' => 
  array (
    0 => 'Block_12050930885ec238530cc5d0_40306499',
    1 => 'Block_14243390015ec238530d9fe5_20542581',
  ),
  'product_attachments' => 
  array (
    0 => 'Block_1268834135ec238530ccfc9_08178660',
    1 => 'Block_6287895625ec238530db6d7_10659406',
  ),
  'product_comment_tab_content' => 
  array (
    0 => 'Block_17896720155ec238530d43d2_49001798',
    1 => 'Block_1301560735ec238530e4958_89795165',
  ),
  'product_accessories' => 
  array (
    0 => 'Block_11190167005ec238530e7071_03952149',
  ),
  'product_footer' => 
  array (
    0 => 'Block_18533744495ec238530e9c71_94126066',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_4913564825ec238530ea972_20085346',
  ),
  'page_footer' => 
  array (
    0 => 'Block_18001448685ec238530ead41_75102057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section class="product-style-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'], ENT_QUOTES, 'UTF-8');?>
" id="main">
    <div class="row">
      <div class="product-images <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>col-12 col-md-7<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>col-12<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8) {?>col-12 col-md-6 col-lg-7 col-xl-8<?php } else { ?>col-12 col-md-6<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19134428045ec238530a3ea8_25803145', 'page_content_container', $this->tplIndex);
?>

      </div>
      <div class="product-infos <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>col-12 col-md-5<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>col-12<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8) {?>col-12 col-md-6 col-lg-5 col-xl-4<?php } else { ?>col-12 col-md-6<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12632012545ec238530aece3_02132713', 'page_header_container', $this->tplIndex);
?>


        <div class="product-information">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21215110585ec238530b07e4_09371506', 'product_comment', $this->tplIndex);
?>


          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20881392115ec238530b5192_62713006', 'product_description_short', $this->tplIndex);
?>


          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18470505935ec238530b6299_25728346', 'product_images_modal', $this->tplIndex);
?>

          
          <?php if ($_smarty_tpl->tpl_vars['product']->value['is_customizable'] && count($_smarty_tpl->tpl_vars['product']->value['customizations']['fields'])) {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3003315005ec238530b79f2_15134207', 'product_customization', $this->tplIndex);
?>

          <?php }?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11295978505ec238530b8aa2_46840249', 'product_extra_info', $this->tplIndex);
?>


          <div class="product-actions">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4760268325ec238530b9090_87757157', 'product_buy', $this->tplIndex);
?>

          </div>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6133105575ec238530c2ed0_54267251', 'hook_display_reassurance', $this->tplIndex);
?>

        </div>
      </div>
    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18832847525ec238530c39f2_25330169', 'product_tabs', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11190167005ec238530e7071_03952149', 'product_accessories', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18533744495ec238530e9c71_94126066', 'product_footer', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4913564825ec238530ea972_20085346', 'page_footer_container', $this->tplIndex);
?>

  </section>

<?php
}
}
/* {/block 'content'} */
}
