<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:53
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce5c054e8_42612602',
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
function content_5ebe8ce5c054e8_42612602 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7896412865ebe8ce5baef00_10899072', 'head_seo');
?>


<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 1) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18805436125ebe8ce5bb2a28_75832665', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7389670865ebe8ce5bb5925_69976831', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2317863675ebe8ce5bb6084_60019247', 'contentWrapperClass');
?>

<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 2) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7482387575ebe8ce5bb7089_93809732', "left_column");
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6659364635ebe8ce5bb7652_02654784', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16025855345ebe8ce5bb8096_56481148', 'contentWrapperClass');
?>

<?php } else { ?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11775136285ebe8ce5bb8957_84173267', 'left_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9000319125ebe8ce5bb8f03_71828134', 'right_column');
?>

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21386483275ebe8ce5bb94a6_03638947', 'contentWrapperClass');
?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9519981875ebe8ce5bb9c96_93518540', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layouts/layout-both-columns.tpl');
}
/* {block 'head_seo'} */
class Block_7896412865ebe8ce5baef00_10899072 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head_seo' => 
  array (
    0 => 'Block_7896412865ebe8ce5baef00_10899072',
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
class Block_18805436125ebe8ce5bb2a28_75832665 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_18805436125ebe8ce5bb2a28_75832665',
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
class Block_7389670865ebe8ce5bb5925_69976831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_7389670865ebe8ce5bb5925_69976831',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_2317863675ebe8ce5bb6084_60019247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_2317863675ebe8ce5bb6084_60019247',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
left-column col-12 col-lg-9 order-1 order-lg-2<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block "left_column"} */
class Block_7482387575ebe8ce5bb7089_93809732 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_7482387575ebe8ce5bb7089_93809732',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "left_column"} */
/* {block 'right_column'} */
class Block_6659364635ebe8ce5bb7652_02654784 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_6659364635ebe8ce5bb7652_02654784',
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
class Block_16025855345ebe8ce5bb8096_56481148 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_16025855345ebe8ce5bb8096_56481148',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
right-column col-12 col-lg-9 order-1<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'left_column'} */
class Block_11775136285ebe8ce5bb8957_84173267 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'left_column' => 
  array (
    0 => 'Block_11775136285ebe8ce5bb8957_84173267',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'left_column'} */
/* {block 'right_column'} */
class Block_9000319125ebe8ce5bb8f03_71828134 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'right_column' => 
  array (
    0 => 'Block_9000319125ebe8ce5bb8f03_71828134',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'right_column'} */
/* {block 'contentWrapperClass'} */
class Block_21386483275ebe8ce5bb94a6_03638947 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contentWrapperClass' => 
  array (
    0 => 'Block_21386483275ebe8ce5bb94a6_03638947',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
col-12<?php
}
}
/* {/block 'contentWrapperClass'} */
/* {block 'product_cover_thumbnails'} */
class Block_8757828385ebe8ce5bbcde2_92044386 extends Smarty_Internal_Block
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
class Block_10607942375ebe8ce5bbc9f3_85615581 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8757828385ebe8ce5bbcde2_92044386', 'product_cover_thumbnails', $this->tplIndex);
?>

            <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_10226391055ebe8ce5bbc610_97361694 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <section class="page-content--product" id="content">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10607942375ebe8ce5bbc9f3_85615581', 'page_content', $this->tplIndex);
?>

          </section>
        <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_title'} */
class Block_8488742965ebe8ce5bc82b9_35482172 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_11589246745ebe8ce5bc7ed1_15194091 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <h1 class="product_title h1"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8488742965ebe8ce5bc82b9_35482172', 'page_title', $this->tplIndex);
?>
</h1>
            <?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_13921375895ebe8ce5bc7ac8_24438551 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="product-action-wrap">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11589246745ebe8ce5bc7ed1_15194091', 'page_header', $this->tplIndex);
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayPrevNext'),$_smarty_tpl ) );?>

          </div>
        <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'product_comment'} */
class Block_4778138655ebe8ce5bc9640_81067062 extends Smarty_Internal_Block
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
class Block_12664380325ebe8ce5bce277_21874110 extends Smarty_Internal_Block
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
class Block_12154936815ebe8ce5bcf371_78032730 extends Smarty_Internal_Block
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
class Block_12788520345ebe8ce5bd0b01_93129586 extends Smarty_Internal_Block
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
class Block_14651079345ebe8ce5bd1c83_98230650 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            
          <?php
}
}
/* {/block 'product_extra_info'} */
/* {block 'product_discounts'} */
class Block_4977694385ebe8ce5bd38b3_76551502 extends Smarty_Internal_Block
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
class Block_4808611435ebe8ce5bd42a3_14217239 extends Smarty_Internal_Block
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
class Block_5365843385ebe8ce5bd4c71_18047721 extends Smarty_Internal_Block
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
class Block_12203912555ebe8ce5bd5640_44328183 extends Smarty_Internal_Block
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
class Block_15123649485ebe8ce5bd81a1_14958131 extends Smarty_Internal_Block
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
class Block_11503071835ebe8ce5bd6029_26729024 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15123649485ebe8ce5bd81a1_14958131', 'product_miniature', $this->tplIndex);
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
class Block_6924668695ebe8ce5bd9398_76878147 extends Smarty_Internal_Block
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
class Block_21160970015ebe8ce5bd9d61_88447076 extends Smarty_Internal_Block
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
class Block_5008066875ebe8ce5bda739_69181457 extends Smarty_Internal_Block
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
class Block_12074032125ebe8ce5bdb0e6_79614403 extends Smarty_Internal_Block
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
class Block_15273238765ebe8ce5bdbb75_47519835 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'product_refresh'} */
/* {block 'product_buy'} */
class Block_3398332195ebe8ce5bd2286_62659524 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4977694385ebe8ce5bd38b3_76551502', 'product_discounts', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4808611435ebe8ce5bd42a3_14217239', 'product_prices', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5365843385ebe8ce5bd4c71_18047721', 'product_deals', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12203912555ebe8ce5bd5640_44328183', 'product_variants', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11503071835ebe8ce5bd6029_26729024', 'product_pack', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6924668695ebe8ce5bd9398_76878147', 'product_add_to_cart', $this->tplIndex);
?>
        
                
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21160970015ebe8ce5bd9d61_88447076', 'product_payment_logo', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5008066875ebe8ce5bda739_69181457', 'product_meta', $this->tplIndex);
?>


                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12074032125ebe8ce5bdb0e6_79614403', 'product_additional_info', $this->tplIndex);
?>


                                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15273238765ebe8ce5bdbb75_47519835', 'product_refresh', $this->tplIndex);
?>

              </form>
            <?php
}
}
/* {/block 'product_buy'} */
/* {block 'hook_display_reassurance'} */
class Block_6020900365ebe8ce5bdc412_39194628 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayReassurance'),$_smarty_tpl ) );?>

          <?php
}
}
/* {/block 'hook_display_reassurance'} */
/* {block 'product_comment_tab'} */
class Block_13397601795ebe8ce5be28f8_32445101 extends Smarty_Internal_Block
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
class Block_18552413685ebe8ce5be4da2_80020589 extends Smarty_Internal_Block
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
class Block_2060439965ebe8ce5be5b55_21937004 extends Smarty_Internal_Block
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
class Block_7303090985ebe8ce5be6541_48077081 extends Smarty_Internal_Block
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
class Block_4232721115ebe8ce5bee0f0_26513360 extends Smarty_Internal_Block
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
class Block_7749913575ebe8ce5bf1953_30087259 extends Smarty_Internal_Block
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
class Block_4804274765ebe8ce5bf3c77_99297289 extends Smarty_Internal_Block
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
class Block_19033129225ebe8ce5bf52f4_66664261 extends Smarty_Internal_Block
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
class Block_17164459295ebe8ce5bfc430_11764999 extends Smarty_Internal_Block
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
class Block_6638134635ebe8ce5bfe246_69083894 extends Smarty_Internal_Block
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
class Block_11214312395ebe8ce5bdcdf7_03881804 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13397601795ebe8ce5be28f8_32445101', 'product_comment_tab', $this->tplIndex);
?>

            </ul>
          </div>
          <div class="tab-content" id="tab-content">
            <?php if ($_smarty_tpl->tpl_vars['product']->value['description']) {?>
              <div class="tab-pane active" id="description" role="tabpanel">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18552413685ebe8ce5be4da2_80020589', 'product_description', $this->tplIndex);
?>

              </div>
            <?php }?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2060439965ebe8ce5be5b55_21937004', 'product_details', $this->tplIndex);
?>


            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7303090985ebe8ce5be6541_48077081', 'product_attachments', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4232721115ebe8ce5bee0f0_26513360', 'product_comment_tab_content', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7749913575ebe8ce5bf1953_30087259', 'product_description', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4804274765ebe8ce5bf3c77_99297289', 'product_details', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19033129225ebe8ce5bf52f4_66664261', 'product_attachments', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17164459295ebe8ce5bfc430_11764999', 'product_comment_tab', $this->tplIndex);
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6638134635ebe8ce5bfe246_69083894', 'product_comment_tab_content', $this->tplIndex);
?>

        <?php }?>
      </div>
    <?php
}
}
/* {/block 'product_tabs'} */
/* {block 'product_miniature'} */
class Block_6650284195ebe8ce5c024a9_56836195 extends Smarty_Internal_Block
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
class Block_11828496135ebe8ce5c008b7_27212583 extends Smarty_Internal_Block
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6650284195ebe8ce5c024a9_56836195', 'product_miniature', $this->tplIndex);
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
class Block_6146756525ebe8ce5c03675_11159915 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterProduct','product'=>$_smarty_tpl->tpl_vars['product']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'product_footer'} */
/* {block 'page_footer'} */
class Block_12965975655ebe8ce5c04710_42038256 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_13450091295ebe8ce5c04341_32647896 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12965975655ebe8ce5c04710_42038256', 'page_footer', $this->tplIndex);
?>
</footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_9519981875ebe8ce5bb9c96_93518540 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9519981875ebe8ce5bb9c96_93518540',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_10226391055ebe8ce5bbc610_97361694',
  ),
  'page_content' => 
  array (
    0 => 'Block_10607942375ebe8ce5bbc9f3_85615581',
  ),
  'product_cover_thumbnails' => 
  array (
    0 => 'Block_8757828385ebe8ce5bbcde2_92044386',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_13921375895ebe8ce5bc7ac8_24438551',
  ),
  'page_header' => 
  array (
    0 => 'Block_11589246745ebe8ce5bc7ed1_15194091',
  ),
  'page_title' => 
  array (
    0 => 'Block_8488742965ebe8ce5bc82b9_35482172',
  ),
  'product_comment' => 
  array (
    0 => 'Block_4778138655ebe8ce5bc9640_81067062',
  ),
  'product_description_short' => 
  array (
    0 => 'Block_12664380325ebe8ce5bce277_21874110',
  ),
  'product_images_modal' => 
  array (
    0 => 'Block_12154936815ebe8ce5bcf371_78032730',
  ),
  'product_customization' => 
  array (
    0 => 'Block_12788520345ebe8ce5bd0b01_93129586',
  ),
  'product_extra_info' => 
  array (
    0 => 'Block_14651079345ebe8ce5bd1c83_98230650',
  ),
  'product_buy' => 
  array (
    0 => 'Block_3398332195ebe8ce5bd2286_62659524',
  ),
  'product_discounts' => 
  array (
    0 => 'Block_4977694385ebe8ce5bd38b3_76551502',
  ),
  'product_prices' => 
  array (
    0 => 'Block_4808611435ebe8ce5bd42a3_14217239',
  ),
  'product_deals' => 
  array (
    0 => 'Block_5365843385ebe8ce5bd4c71_18047721',
  ),
  'product_variants' => 
  array (
    0 => 'Block_12203912555ebe8ce5bd5640_44328183',
  ),
  'product_pack' => 
  array (
    0 => 'Block_11503071835ebe8ce5bd6029_26729024',
  ),
  'product_miniature' => 
  array (
    0 => 'Block_15123649485ebe8ce5bd81a1_14958131',
    1 => 'Block_6650284195ebe8ce5c024a9_56836195',
  ),
  'product_add_to_cart' => 
  array (
    0 => 'Block_6924668695ebe8ce5bd9398_76878147',
  ),
  'product_payment_logo' => 
  array (
    0 => 'Block_21160970015ebe8ce5bd9d61_88447076',
  ),
  'product_meta' => 
  array (
    0 => 'Block_5008066875ebe8ce5bda739_69181457',
  ),
  'product_additional_info' => 
  array (
    0 => 'Block_12074032125ebe8ce5bdb0e6_79614403',
  ),
  'product_refresh' => 
  array (
    0 => 'Block_15273238765ebe8ce5bdbb75_47519835',
  ),
  'hook_display_reassurance' => 
  array (
    0 => 'Block_6020900365ebe8ce5bdc412_39194628',
  ),
  'product_tabs' => 
  array (
    0 => 'Block_11214312395ebe8ce5bdcdf7_03881804',
  ),
  'product_comment_tab' => 
  array (
    0 => 'Block_13397601795ebe8ce5be28f8_32445101',
    1 => 'Block_17164459295ebe8ce5bfc430_11764999',
  ),
  'product_description' => 
  array (
    0 => 'Block_18552413685ebe8ce5be4da2_80020589',
    1 => 'Block_7749913575ebe8ce5bf1953_30087259',
  ),
  'product_details' => 
  array (
    0 => 'Block_2060439965ebe8ce5be5b55_21937004',
    1 => 'Block_4804274765ebe8ce5bf3c77_99297289',
  ),
  'product_attachments' => 
  array (
    0 => 'Block_7303090985ebe8ce5be6541_48077081',
    1 => 'Block_19033129225ebe8ce5bf52f4_66664261',
  ),
  'product_comment_tab_content' => 
  array (
    0 => 'Block_4232721115ebe8ce5bee0f0_26513360',
    1 => 'Block_6638134635ebe8ce5bfe246_69083894',
  ),
  'product_accessories' => 
  array (
    0 => 'Block_11828496135ebe8ce5c008b7_27212583',
  ),
  'product_footer' => 
  array (
    0 => 'Block_6146756525ebe8ce5c03675_11159915',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_13450091295ebe8ce5c04341_32647896',
  ),
  'page_footer' => 
  array (
    0 => 'Block_12965975655ebe8ce5c04710_42038256',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section class="product-style-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'], ENT_QUOTES, 'UTF-8');?>
" id="main">
    <div class="row">
      <div class="product-images <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>col-12 col-md-7<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>col-12<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8) {?>col-12 col-md-6 col-lg-7 col-xl-8<?php } else { ?>col-12 col-md-6<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10226391055ebe8ce5bbc610_97361694', 'page_content_container', $this->tplIndex);
?>

      </div>
      <div class="product-infos <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5) {?>col-12 col-md-5<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6) {?>col-12<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8) {?>col-12 col-md-6 col-lg-5 col-xl-4<?php } else { ?>col-12 col-md-6<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13921375895ebe8ce5bc7ac8_24438551', 'page_header_container', $this->tplIndex);
?>


        <div class="product-information">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4778138655ebe8ce5bc9640_81067062', 'product_comment', $this->tplIndex);
?>


          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12664380325ebe8ce5bce277_21874110', 'product_description_short', $this->tplIndex);
?>


          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12154936815ebe8ce5bcf371_78032730', 'product_images_modal', $this->tplIndex);
?>

          
          <?php if ($_smarty_tpl->tpl_vars['product']->value['is_customizable'] && count($_smarty_tpl->tpl_vars['product']->value['customizations']['fields'])) {?>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12788520345ebe8ce5bd0b01_93129586', 'product_customization', $this->tplIndex);
?>

          <?php }?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14651079345ebe8ce5bd1c83_98230650', 'product_extra_info', $this->tplIndex);
?>


          <div class="product-actions">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3398332195ebe8ce5bd2286_62659524', 'product_buy', $this->tplIndex);
?>

          </div>
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6020900365ebe8ce5bdc412_39194628', 'hook_display_reassurance', $this->tplIndex);
?>

        </div>
      </div>
    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11214312395ebe8ce5bdcdf7_03881804', 'product_tabs', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11828496135ebe8ce5c008b7_27212583', 'product_accessories', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6146756525ebe8ce5c03675_11159915', 'product_footer', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13450091295ebe8ce5c04341_32647896', 'page_footer_container', $this->tplIndex);
?>

  </section>

<?php
}
}
/* {/block 'content'} */
}
