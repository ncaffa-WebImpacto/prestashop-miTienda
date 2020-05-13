<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:09
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\miniatures\_partials\product-miniature-left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd1b9de51_17441522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd57d502435f094827167d2674a7001a1fd897953' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\miniatures\\_partials\\product-miniature-left.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-name.tpl' => 1,
    'file:catalog/_partials/miniatures/_partials/product-miniature-price.tpl' => 1,
  ),
),false)) {
function content_5ebc1cd1b9de51_17441522 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-container">
    <div class="thumbnail-container">
        <div class ="thumbnail-inner">
            <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div class="product-description">
        <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-name.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>


        <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-price.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div><?php }
}
