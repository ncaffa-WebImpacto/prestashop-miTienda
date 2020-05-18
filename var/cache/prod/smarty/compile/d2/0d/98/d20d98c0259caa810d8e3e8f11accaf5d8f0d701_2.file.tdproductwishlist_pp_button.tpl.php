<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:09
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\modules\tdproductwishlist\views\templates\hook\tdproductwishlist_pp_button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23855bc3e73_73864843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd20d98c0259caa810d8e3e8f11accaf5d8f0d701' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\modules\\tdproductwishlist\\views\\templates\\hook\\tdproductwishlist_pp_button.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec23855bc3e73_73864843 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="wishlist">
	<?php if (isset($_smarty_tpl->tpl_vars['wishlists']->value) && count($_smarty_tpl->tpl_vars['wishlists']->value) > 1) {?>
		<div class="dropdown td-wishlist-button-dropdown">
			<a class="td-wishlist-button tip_inside dropdown-toggle show-list btn-product<?php if ($_smarty_tpl->tpl_vars['added_wishlist']->value) {?> added<?php }?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id-wishlist="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_wishlist']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product_attribute']->value, ENT_QUOTES, 'UTF-8');?>
" data-display="static">
				<svg width="18px" height="18px" fill="currentcolor">
					<use xlink:href="#tdswishlist">
					</use>
				</svg>
				<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );?>
</span>
				<span class ="tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );?>
</span>
			</a>
		  <div class="dropdown-menu td-list-wishlist td-list-wishlist-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product']->value, ENT_QUOTES, 'UTF-8');?>
">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlists']->value, 'wishlists_item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['wishlists_item']->value) {
?>
				<a href="javascript:void(0)" class="dropdown-item list-group-item list-group-item-action wishlist-item tip_inside<?php if (in_array($_smarty_tpl->tpl_vars['wishlists_item']->value['id_wishlist'],$_smarty_tpl->tpl_vars['wishlists_added']->value)) {?> added <?php }?>" data-id-wishlist="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlists_item']->value['id_wishlist'], ENT_QUOTES, 'UTF-8');?>
" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product_attribute']->value, ENT_QUOTES, 'UTF-8');?>
">
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlists_item']->value['name'], ENT_QUOTES, 'UTF-8');?>

					<span class ="tip"><?php if (in_array($_smarty_tpl->tpl_vars['wishlists_item']->value['id_wishlist'],$_smarty_tpl->tpl_vars['wishlists_added']->value)) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );
}?></span>
				</a>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		  </div>
		</div>
	<?php } else { ?>
		<a class="td-wishlist-button tip_inside<?php if ($_smarty_tpl->tpl_vars['added_wishlist']->value) {?> added<?php }?>" href="javascript:void(0)" data-id-wishlist="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_wishlist']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_id_product_attribute']->value, ENT_QUOTES, 'UTF-8');?>
">
			<svg width="18px" height="18px" fill="currentcolor">
				<use xlink:href="#tdswishlist">
				</use>
			</svg>
			<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );?>
</span>
			<span class ="tip"><?php if ($_smarty_tpl->tpl_vars['added_wishlist']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to Wishlist','mod'=>'tdproductwishlist'),$_smarty_tpl ) );
}?></span>
		</a>
	<?php }?>
</div>
<?php }
}
