<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:51:51
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\miniatures\_partials\product-countdown-1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3c073ec396_16821106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf63f1b513105f2372c266ed75561cf3fdcf71ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\miniatures\\_partials\\product-countdown-1.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-name.tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-price.tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-btn.tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-quickview.tpl' => 1,
  ),
),false)) {
function content_5ebe3c073ec396_16821106 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<div class="product-container">
    <div class="row">
        <div class="thumbnail-container col-12 col-sm-5 col-lg-6">
            <div class ="thumbnail-inner">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10195607945ebe3c073e1392_73335163', 'product_thumbnail');
?>

            </div>
        </div>

        <div class="product-description col-12 col-sm-7 col-lg-6">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86159635ebe3c073e2014_09629718', 'product_name');
?>


            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8098568465ebe3c073e2a20_64700064', 'product_description_short');
?>


            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3326498555ebe3c073e5ee2_47139383', 'product_price_and_shipping');
?>

            
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14784990895ebe3c073e68f3_57759418', 'product_reviews');
?>


            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to']) && (smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S') < smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],'%Y-%m-%d %H:%M:%S'))) {?>
                <div class="bitdeal">
                    <div class="tdcountdown" data-date="<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],'%Y/%m/%d %H:%M:%S'), ENT_QUOTES, 'UTF-8');?>
">
                        <div class="days_container">
                            <span class="number days">0</span>
                            <span class="days_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Days','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                        </div>
                        <div class="hours_container">
                            <span class="number hours">0</span>
                            <span class="hours_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hours','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                        </div>
                        <div class="minutes_container">
                            <span class="number minutes">0</span>
                            <span class="minutes_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mins','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                        </div>
                        <div class="seconds_container">
                            <span class="number seconds">0</span>
                            <span class="seconds_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Secs','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
                        </div>
                    </div>
                </div>
            <?php }?>

            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7022882145ebe3c073eae12_56139289', 'product_list_functional_buttons');
?>

                    </div>
    </div>
</div><?php }
/* {block 'product_thumbnail'} */
class Block_10195607945ebe3c073e1392_73335163 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_thumbnail' => 
  array (
    0 => 'Block_10195607945ebe3c073e1392_73335163',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'product_name'} */
class Block_86159635ebe3c073e2014_09629718 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_name' => 
  array (
    0 => 'Block_86159635ebe3c073e2014_09629718',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-name.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php
}
}
/* {/block 'product_name'} */
/* {block 'product_description_short'} */
class Block_8098568465ebe3c073e2a20_64700064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_description_short' => 
  array (
    0 => 'Block_8098568465ebe3c073e2a20_64700064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="product-description">
                    <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),90,'...' )), ENT_QUOTES, 'UTF-8');?>

                </div>
            <?php
}
}
/* {/block 'product_description_short'} */
/* {block 'product_price_and_shipping'} */
class Block_3326498555ebe3c073e5ee2_47139383 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_price_and_shipping' => 
  array (
    0 => 'Block_3326498555ebe3c073e5ee2_47139383',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-price.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_reviews'} */
class Block_14784990895ebe3c073e68f3_57759418 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_reviews' => 
  array (
    0 => 'Block_14784990895ebe3c073e68f3_57759418',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

            <?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_list_functional_buttons'} */
class Block_7022882145ebe3c073eae12_56139289 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_functional_buttons' => 
  array (
    0 => 'Block_7022882145ebe3c073eae12_56139289',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="button-container">
                    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-btn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

                    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-quickview.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, false);
?>
                </div>
            <?php
}
}
/* {/block 'product_list_functional_buttons'} */
}
