<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:57:33
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-cover-thumbnails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3d5d56c2f5_97692592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7898ee6fc9b2cc3e43b2f6ce39a097c014e7458' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-cover-thumbnails.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/product-flags.tpl' => 1,
  ),
),false)) {
function content_5ebe3d5d56c2f5_97692592 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="images-container">
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7896841955ebe3d5d53d628_87563430', 'product_cover');
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8436336315ebe3d5d566385_78378802', 'product_images');
?>

</div>
<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterProductThumbs'),$_smarty_tpl ) );?>

<?php }
/* {block 'product_flags'} */
class Block_4872423015ebe3d5d53db02_01979313 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/product-flags.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php
}
}
/* {/block 'product_flags'} */
/* {block "after_product_cover"} */
class Block_21114972065ebe3d5d54e917_03050139 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="product-extra-content">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterProductCover','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

                </div>
              <?php
}
}
/* {/block "after_product_cover"} */
/* {block "after_product_cover"} */
class Block_20580877005ebe3d5d564e90_88240130 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="product-extra-content">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterProductCover','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

          </div>
        <?php
}
}
/* {/block "after_product_cover"} */
/* {block 'product_cover'} */
class Block_7896841955ebe3d5d53d628_87563430 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_7896841955ebe3d5d53d628_87563430',
  ),
  'product_flags' => 
  array (
    0 => 'Block_4872423015ebe3d5d53db02_01979313',
  ),
  'after_product_cover' => 
  array (
    0 => 'Block_21114972065ebe3d5d54e917_03050139',
    1 => 'Block_20580877005ebe3d5d564e90_88240130',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="product-cover">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4872423015ebe3d5d53db02_01979313', 'product_flags', $this->tplIndex);
?>

      <div class="js-product-cover-images row" data-count="<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['product']->value['images']), ENT_QUOTES, 'UTF-8');?>
">
        <div class="product-img product-img-0 col-xs-12 col-sm-6">
                    <div class="position-relative">
                        <div class="">
              <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
                <div class="easyzoom">
                  <a href="javascript:void(0)" data-image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
">
                    <img
                      class="img-fluid lazyload"
                      srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['medium_default']['url'], ENT_QUOTES, 'UTF-8');?>
 452w,
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['pdt_180']['url'], ENT_QUOTES, 'UTF-8');?>
 180w,
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['pdt_370']['url'], ENT_QUOTES, 'UTF-8');?>
 370w,
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['pdt_540']['url'], ENT_QUOTES, 'UTF-8');?>
 540w,
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['pdt_771']['url'], ENT_QUOTES, 'UTF-8');?>
 771w"
                      src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                      alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
                      title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
                    />
                  </a>
                </div>
              <?php } elseif (isset($_smarty_tpl->tpl_vars['urls']->value['no_picture_image'])) {?>
                <img
                  class="img-fluid lazyload"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
                />
              <?php } else { ?>
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==">
              <?php }?>
              <noscript>
                <img class="img-fluid" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['medium_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
">
              </noscript>
            </div>
            <a class="layer" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
              <i class="material-icons">fullscreen</i>
            </a>
            <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 8 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 9) {?>
              <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21114972065ebe3d5d54e917_03050139', "after_product_cover", $this->tplIndex);
?>

            <?php }?>
          </div>
        </div>

        <?php $_smarty_tpl->_assignInScope('item', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image', false, NULL, 'images', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['index'];
?>
          <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] != $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?>
            <div class="product-img product-img-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value, ENT_QUOTES, 'UTF-8');?>
 col-xs-12 col-sm-6">
              <div class="position-relative">
                                <div class="">
                  <div class="easyzoom">
                    <a href="javascript:void(0)" data-image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
">
                      <img
                        class="img-fluid lazyload"
                        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first'] : null) && !$_smarty_tpl->tpl_vars['product']->value['cover']) {?>data-sizes="auto"<?php }?>
                        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first'] : null) && !$_smarty_tpl->tpl_vars['product']->value['cover']) {?>data-<?php }?>srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['medium_default']['url'], ENT_QUOTES, 'UTF-8');?>
 452w,
                          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['pdt_180']['url'], ENT_QUOTES, 'UTF-8');?>
 180w,
                          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['pdt_370']['url'], ENT_QUOTES, 'UTF-8');?>
 370w,
                          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['pdt_540']['url'], ENT_QUOTES, 'UTF-8');?>
 540w,
                          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['pdt_771']['url'], ENT_QUOTES, 'UTF-8');?>
 771w"
                        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_images']->value['first'] : null) && !$_smarty_tpl->tpl_vars['product']->value['cover']) {?>data-<?php }?>src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                        alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                        title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                      />
                    </a>
                  </div>
                  <noscript>
                    <img class="img-fluid" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['medium_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
">
                  </noscript>
                </div>
                <a class="layer" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
                  <i class="material-icons">fullscreen</i>
                </a>
              </div>
            </div>
            <?php $_smarty_tpl->_assignInScope('item', $_smarty_tpl->tpl_vars['item']->value+1);?>
          <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
      <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 1 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 2 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 3 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 4 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 5 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 6 || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_layout'] == 7) {?>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20580877005ebe3d5d564e90_88240130', "after_product_cover", $this->tplIndex);
?>

      <?php }?>
    </div>
  <?php
}
}
/* {/block 'product_cover'} */
/* {block 'product_images'} */
class Block_8436336315ebe3d5d566385_78378802 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_8436336315ebe3d5d566385_78378802',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="product-thumbs-outer">
      <div class="product-thumbs js-thumb-product-images" data-count="<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['product']->value['images']), ENT_QUOTES, 'UTF-8');?>
">
        <div class="product-thumb product-thumb-0 slick-active">
                    <div class="">
            <img
              class="thumb js-thumb lazyload img-fluid"
              src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
              data-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
              title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
            />
          </div>
        </div>
        <?php $_smarty_tpl->_assignInScope('item', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
          <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] != $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?>
            <div class="product-thumb product-thumb-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value, ENT_QUOTES, 'UTF-8');?>
">
                            <div class="">
                <img
                  class="thumb js-thumb lazyload img-fluid"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
                  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                />
              </div>
            </div>
            <?php $_smarty_tpl->_assignInScope('item', $_smarty_tpl->tpl_vars['item']->value+1);?>
          <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    </div>
  <?php
}
}
/* {/block 'product_images'} */
}
