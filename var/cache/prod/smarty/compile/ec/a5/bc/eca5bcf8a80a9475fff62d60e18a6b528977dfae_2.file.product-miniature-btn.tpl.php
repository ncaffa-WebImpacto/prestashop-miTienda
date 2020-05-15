<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:59
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\miniatures\_partials\product-miniature-btn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe64231bb883_89366648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eca5bcf8a80a9475fff62d60e18a6b528977dfae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\miniatures\\_partials\\product-miniature-btn.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe64231bb883_89366648 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['pl_grid_cart_btn']) && $_smarty_tpl->tpl_vars['themeOpt']->value['pl_grid_cart_btn'] == "1") {?>
	<?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
		<div class="product-add-to-cart">
			<?php if (isset($_smarty_tpl->tpl_vars['product']->value['customizable']) && $_smarty_tpl->tpl_vars['product']->value['customizable'] > 0) {?>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-primary customize tip_inside">
					<svg width="18px" height="18px" fill="currentcolor">
		         	   <use xlink:href="#tdsbtncustomize"></use>
		         	</svg>
										<span class="tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customize','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
				</a>
			<?php } elseif (isset($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) && $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'] > 0) {?>
				<a href="#" data-link-action="quickview" class="btn btn-primary select quick-view tip_inside">
					<svg width="18px" height="18px" fill="currentcolor">
						<use xlink:href="#tdsbtnselect"></use>
					</svg>
										<span class="tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select Option','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
				</a>
			<?php } else { ?>
				<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" method="post" class="td-add-to-cart-or-refresh">
					<div class="product-quantity">
						<?php if (($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0 && $_smarty_tpl->tpl_vars['product']->value['quantity'] >= $_smarty_tpl->tpl_vars['product']->value['minimal_quantity']) || $_smarty_tpl->tpl_vars['product']->value['allow_oosp'] == 1) {?>
							<input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
							<input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
">
							<input type="hidden" name="qty" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'], ENT_QUOTES, 'UTF-8');?>
" />
							<input type="hidden" name="id_customization" value="0">
							<button class="btn btn-primary ajax_add_to_cart_button add-to-cart tip_inside" data-button-action="add-to-cart">
																<svg width="18px" height="18px" fill="currentcolor">
					         	   <use xlink:href="#tdsbtncart"></use>
					         	</svg>
								<span class="tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
							</button>
						<?php } else { ?>
							<button class="btn btn-primary ajax_add_to_cart_button add-to-cart tip_inside" disabled>
																<svg width="18px" height="18px" fill="currentcolor">
					         	   <use xlink:href="#tdsbtncart"></use>
					         	</svg>
								<span class="tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of stock','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
							</button>
						<?php }?>
					</div>
				</form>
			<?php }?>
		</div>
	<?php }
}
}
}
