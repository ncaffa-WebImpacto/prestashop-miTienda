<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:12
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd4e6ffb4_79470616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1de17912ec772ca3b0f796272f0811d5488eb8ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\product.tpl',
      1 => 1589356898,
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
function content_5ebc1cd4e6ffb4_79470616 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3178069625ebc1cd4e042e9_82544446', 'head_seo');
?>


<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 1) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17133480005ebc1cd4e0bf94_96686116', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16355301875ebc1cd4e0efa3_56069136', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20499077745ebc1cd4e0f5b8_87421641', 'contentWrapperClass');
?>

<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 2) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7635352555ebc1cd4e106d4_20515284', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10677672745ebc1cd4e10cf1_04809057', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7584313085ebc1cd4e11795_96841875', 'contentWrapperClass');
?>

<?php } else { ?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7460953275ebc1cd4e12260_35247017', 'left_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9537931545ebc1cd4e12862_93780448', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12281017465ebc1cd4e12e28_45335599', 'contentWrapperClass');
?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8890444875ebc1cd4e139d2_98585370', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layouts/layout-both-columns.tpl');
}
/* {block 'head_seo'} */
class Block_3178069625ebc1cd4e042e9_82544446 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head_seo' => 
  array (
    0 => 'Block_3178069625ebc1cd4e042e9_82544446',
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
class Block_17133480005ebc1cd4e0bf94_96686116 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_17133480005ebc1cd4e0bf94_96686116',
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
class Block_16355301875ebc1cd4e0efa3_56069136 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_16355301875ebc1cd4e0efa3_56069136',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_20499077745ebc1cd4e0f5b8_87421641 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_20499077745ebc1cd4e0f5b8_87421641',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
left-column col-12 col-lg-9 order-1 order-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block "left_column"} */
class Block_7635352555ebc1cd4e106d4_20515284 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_7635352555ebc1cd4e106d4_20515284',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "left_column"} */
/* {block 'right_column'} */
class Block_10677672745ebc1cd4e10cf1_04809057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_10677672745ebc1cd4e10cf1_04809057',
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
class Block_7584313085ebc1cd4e11795_96841875 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_7584313085ebc1cd4e11795_96841875',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
right-column col-12 col-lg-9 order-1<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'left_column'} */
class Block_7460953275ebc1cd4e12260_35247017 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_7460953275ebc1cd4e12260_35247017',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'left_column'} */
/* {block 'right_column'} */
class Block_9537931545ebc1cd4e12862_93780448 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_9537931545ebc1cd4e12862_93780448',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_12281017465ebc1cd4e12e28_45335599 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_12281017465ebc1cd4e12e28_45335599',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
col-12<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'product_cover_thumbnails'} */
class Block_5067079975ebc1cd4e17503_69693860 extends Smarty_Internal_Block
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
class Block_9838224765ebc1cd4e16fd1_70984735 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5067079975ebc1cd4e17503_69693860', 'product_cover_thumbnails', $this->tplIndex);
?>

            <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_20167383335ebc1cd4e16a34_15780542 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <section class="page-content--product" id="content">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9838224765ebc1cd4e16fd1_70984735', 'page_content', $this->tplIndex);
?>

          </section>
        <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_title'} */
class Block_3173968015ebc1cd4e22326_79564984 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_380381715ebc1cd4e21f61_05179857 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <h1 class="product_title h1"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3173968015ebc1cd4e22326_79564984', 'page_title', $this->tplIndex);
?>
</h1>
            <?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_19494200335ebc1cd4e21b65_76717567 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="product-action-wrap">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_380381715ebc1cd4e21f61_05179857', 'page_header', $this->tplIndex);
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayPrevNext'),$_smarty_tpl ) );?>

          </div>
        <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'product_comment'} */
class Block_15811797195ebc1cd4e236e7_58645910 extends Smarty_Internal_Block
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
class Block_514292185ebc1cd4e280e6_31279539 extends Smarty_Internal_Block
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
class Block_15906358075ebc1cd4e29241_64376800 extends Smarty_Internal_Block
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
class Block_62235835ebc1cd4e2ab01_12767397 extends Smarty_Internal_Block
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
class Block_13351977525ebc1cd4e2bc51_82648407 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            
          <?php
}
}
/* {/block 'product_extra_info'} */
/* {block 'product_discounts'} */
class Block_7032635345ebc1cd4e2d976_99000249 extends Smarty_Internal_Block
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
class Block_17104612225ebc1cd4e2e392_61755085 extends Smarty_Internal_Block
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
class Block_6991470545ebc1cd4e2f1d1_70945981 extends Smarty_Internal_Block
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
class Block_19388835575ebc1cd4e2feb8_98160576 extends Smarty_Internal_Block
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
class Block_9949763555ebc1cd4e3a0f2_39740299 extends Smarty_Internal_Block
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
class Block_19786528475ebc1cd4e30ad9_28463382 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9949763555ebc1cd4e3a0f2_39740299', 'product_miniature', $this->tplIndex);
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
class Block_16375341025ebc1cd4e3ce94_97384568 extends Smarty_Internal_Block
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
class Block_5057275505ebc1cd4e3dd04_87704390 extends Smarty_Internal_Block
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
class Block_6885935955ebc1cd4e3ea17_39445996 extends Smarty_Internal_Block
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
class Block_10319591365ebc1cd4e3f6b5_38241546 extends Smarty_Internal_Block
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
class Block_17440692175ebc1cd4e402e5_24350444 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'product_refresh'} */
/* {block 'product_buy'} */
class Block_2759433245ebc1cd4e2c261_29513692 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7032635345ebc1cd4e2d976_99000249', 'product_discounts', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17104612225ebc1cd4e2e392_61755085', 'product_prices', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6991470545ebc1cd4e2f1d1_70945981', 'product_deals', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19388835575ebc1cd4e2feb8_98160576', 'product_variants', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19786528475ebc1cd4e30ad9_28463382', 'product_pack', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16375341025ebc1cd4e3ce94_97384568', 'product_add_to_cart', $this->tplIndex);
?>
        
                
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5057275505ebc1cd4e3dd04_87704390', 'product_payment_logo', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6885935955ebc1cd4e3ea17_39445996', 'product_meta', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10319591365ebc1cd4e3f6b5_38241546', 'product_additional_info', $this->tplIndex);
?>


                                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17440692175ebc1cd4e402e5_24350444', 'product_refresh', $this->tplIndex);
?>

              </form>
            <?php
}
}
/* {/block 'product_buy'} */
/* {block 'hook_display_reassurance'} */
class Block_10874153595ebc1cd4e40c72_87003097 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayReassurance'),$_smarty_tpl ) );?>

          <?php
}
}
/* {/block 'hook_display_reassurance'} */
/* {block 'product_comment_tab'} */
class Block_5814774035ebc1cd4e486d7_34417364 extends Smarty_Internal_Block
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
class Block_9644863265ebc1cd4e4c154_76000536 extends Smarty_Internal_Block
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
class Block_18799629375ebc1cd4e4d020_16618781 extends Smarty_Internal_Block
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
class Block_119036565ebc1cd4e4dc20_75435872 extends Smarty_Internal_Block
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
class Block_15488705955ebc1cd4e56990_00314699 extends Smarty_Internal_Block
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
class Block_14181491865ebc1cd4e5acd5_44207862 extends Smarty_Internal_Block
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
class Block_9785723505ebc1cd4e5d121_31528201 extends Smarty_Internal_Block
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
class Block_3643137405ebc1cd4e5e946_57220651 extends Smarty_Internal_Block
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
class Block_16996887215ebc1cd4e66b23_56492741 extends Smarty_Internal_Block
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
class Block_17167100095ebc1cd4e68ba1_65356013 extends Smarty_Internal_Block
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
class Block_4891140555ebc1cd4e41730_45468785 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5814774035ebc1cd4e486d7_34417364', 'product_comment_tab', $this->tplIndex);
?>

            </ul>
          </div>
          <div class="tab-content" id="tab-content">
            <?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
              <div class="tab-pane active" id="description" role="tabpanel">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9644863265ebc1cd4e4c154_76000536', 'product_description', $this->tplIndex);
?>

              </div>
            <?php }?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18799629375ebc1cd4e4d020_16618781', 'product_details', $this->tplIndex);
?>


            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_119036565ebc1cd4e4dc20_75435872', 'product_attachments', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15488705955ebc1cd4e56990_00314699', 'product_comment_tab_content', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14181491865ebc1cd4e5acd5_44207862', 'product_description', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9785723505ebc1cd4e5d121_31528201', 'product_details', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3643137405ebc1cd4e5e946_57220651', 'product_attachments', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16996887215ebc1cd4e66b23_56492741', 'product_comment_tab', $this->tplIndex);
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17167100095ebc1cd4e68ba1_65356013', 'product_comment_tab_content', $this->tplIndex);
?>

        <?php }?>
      </div>
    <?php
}
}
/* {/block 'product_tabs'} */
/* {block 'product_miniature'} */
class Block_16910545635ebc1cd4e6cde4_32147327 extends Smarty_Internal_Block
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
class Block_11132517875ebc1cd4e6b392_02537659 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16910545635ebc1cd4e6cde4_32147327', 'product_miniature', $this->tplIndex);
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
class Block_4148169695ebc1cd4e6e037_48779487 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterProduct','product'=>$_smarty_tpl->tpl_vars['product']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'product_footer'} */
/* {block 'page_footer'} */
class Block_17521085985ebc1cd4e6f0e1_99586665 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_19415994085ebc1cd4e6ed17_01141098 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17521085985ebc1cd4e6f0e1_99586665', 'page_footer', $this->tplIndex);
?>
</footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_8890444875ebc1cd4e139d2_98585370 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8890444875ebc1cd4e139d2_98585370',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_20167383335ebc1cd4e16a34_15780542',
  ),
  'page_content' => 
  array (
    0 => 'Block_9838224765ebc1cd4e16fd1_70984735',
  ),
  'product_cover_thumbnails' => 
  array (
    0 => 'Block_5067079975ebc1cd4e17503_69693860',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_19494200335ebc1cd4e21b65_76717567',
  ),
  'page_header' => 
  array (
    0 => 'Block_380381715ebc1cd4e21f61_05179857',
  ),
  'page_title' => 
  array (
    0 => 'Block_3173968015ebc1cd4e22326_79564984',
  ),
  'product_comment' => 
  array (
    0 => 'Block_15811797195ebc1cd4e236e7_58645910',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_514292185ebc1cd4e280e6_31279539',
  ),
  'product_images_modal' => 
  array (
    0 => 'Block_15906358075ebc1cd4e29241_64376800',
  ),
  'product_customization' => 
  array (
    0 => 'Block_62235835ebc1cd4e2ab01_12767397',
  ),
  'product_extra_info' => 
  array (
    0 => 'Block_13351977525ebc1cd4e2bc51_82648407',
  ),
  'product_buy' => 
  array (
    0 => 'Block_2759433245ebc1cd4e2c261_29513692',
  ),
  'product_discounts' => 
  array (
    0 => 'Block_7032635345ebc1cd4e2d976_99000249',
  ),
  'product_prices' => 
  array (
    0 => 'Block_17104612225ebc1cd4e2e392_61755085',
  ),
  'product_deals' => 
  array (
    0 => 'Block_6991470545ebc1cd4e2f1d1_70945981',
  ),
  'product_variants' => 
  array (
    0 => 'Block_19388835575ebc1cd4e2feb8_98160576',
  ),
  'product_pack' => 
  array (
    0 => 'Block_19786528475ebc1cd4e30ad9_28463382',
  ),
  'product_miniature' => 
  array (
    0 => 'Block_9949763555ebc1cd4e3a0f2_39740299',
    1 => 'Block_16910545635ebc1cd4e6cde4_32147327',
  ),
  'product_add_to_cart' => 
  array (
    0 => 'Block_16375341025ebc1cd4e3ce94_97384568',
  ),
  'product_payment_logo' => 
  array (
    0 => 'Block_5057275505ebc1cd4e3dd04_87704390',
  ),
  'product_meta' => 
  array (
    0 => 'Block_6885935955ebc1cd4e3ea17_39445996',
  ),
  'product_additional_info' => 
  array (
    0 => 'Block_10319591365ebc1cd4e3f6b5_38241546',
  ),
  'product_refresh' => 
  array (
    0 => 'Block_17440692175ebc1cd4e402e5_24350444',
  ),
  'hook_display_reassurance' => 
  array (
    0 => 'Block_10874153595ebc1cd4e40c72_87003097',
  ),
  'product_tabs' => 
  array (
    0 => 'Block_4891140555ebc1cd4e41730_45468785',
  ),
  'product_comment_tab' => 
  array (
    0 => 'Block_5814774035ebc1cd4e486d7_34417364',
    1 => 'Block_16996887215ebc1cd4e66b23_56492741',
  ),
  'product_description' => 
  array (
    0 => 'Block_9644863265ebc1cd4e4c154_76000536',
    1 => 'Block_14181491865ebc1cd4e5acd5_44207862',
  ),
  'product_details' => 
  array (
    0 => 'Block_18799629375ebc1cd4e4d020_16618781',
    1 => 'Block_9785723505ebc1cd4e5d121_31528201',
  ),
  'product_attachments' => 
  array (
    0 => 'Block_119036565ebc1cd4e4dc20_75435872',
    1 => 'Block_3643137405ebc1cd4e5e946_57220651',
  ),
  'product_comment_tab_content' => 
  array (
    0 => 'Block_15488705955ebc1cd4e56990_00314699',
    1 => 'Block_17167100095ebc1cd4e68ba1_65356013',
  ),
  'product_accessories' => 
  array (
    0 => 'Block_11132517875ebc1cd4e6b392_02537659',
  ),
  'product_footer' => 
  array (
    0 => 'Block_4148169695ebc1cd4e6e037_48779487',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_19415994085ebc1cd4e6ed17_01141098',
  ),
  'page_footer' => 
  array (
    0 => 'Block_17521085985ebc1cd4e6f0e1_99586665',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section class="product-style-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'], ENT_QUOTES, 'UTF-8');?>
" id="main">
    <div class="row">
      <div class="product-images <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>col-12 col-md-7<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>col-12<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8) {?>col-12 col-md-6 col-lg-7 col-xl-8<?php } else { ?>col-12 col-md-6<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20167383335ebc1cd4e16a34_15780542', 'page_content_container', $this->tplIndex);
?>

      </div>
      <div class="product-infos <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>col-12 col-md-5<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>col-12<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8) {?>col-12 col-md-6 col-lg-5 col-xl-4<?php } else { ?>col-12 col-md-6<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19494200335ebc1cd4e21b65_76717567', 'page_header_container', $this->tplIndex);
?>


        <div class="product-information">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15811797195ebc1cd4e236e7_58645910', 'product_comment', $this->tplIndex);
?>


          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_514292185ebc1cd4e280e6_31279539', 'product_description_short', $this->tplIndex);
?>


          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15906358075ebc1cd4e29241_64376800', 'product_images_modal', $this->tplIndex);
?>

          
          <?php if ($_smarty_tpl->tpl_vars['product']->value['is_customizable'] && count($_smarty_tpl->tpl_vars['product']->value['customizations']['fields'])) {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62235835ebc1cd4e2ab01_12767397', 'product_customization', $this->tplIndex);
?>

          <?php }?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13351977525ebc1cd4e2bc51_82648407', 'product_extra_info', $this->tplIndex);
?>


          <div class="product-actions">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2759433245ebc1cd4e2c261_29513692', 'product_buy', $this->tplIndex);
?>

          </div>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10874153595ebc1cd4e40c72_87003097', 'hook_display_reassurance', $this->tplIndex);
?>

        </div>
      </div>
    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4891140555ebc1cd4e41730_45468785', 'product_tabs', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11132517875ebc1cd4e6b392_02537659', 'product_accessories', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4148169695ebc1cd4e6e037_48779487', 'product_footer', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19415994085ebc1cd4e6ed17_01141098', 'page_footer_container', $this->tplIndex);
?>

  </section>

<?php
}
}
/* {/block 'content'} */
}
