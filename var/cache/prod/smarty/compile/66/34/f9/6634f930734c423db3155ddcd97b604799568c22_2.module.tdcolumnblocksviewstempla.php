<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:09
  from 'module:tdcolumnblocksviewstempla' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd1a7ce84_17570210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6634f930734c423db3155ddcd97b604799568c22' => 
    array (
      0 => 'module:tdcolumnblocksviewstempla',
      1 => 1589356895,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/_partials/product-miniature-left.tpl' => 1,
  ),
),false)) {
function content_5ebc1cd1a7ce84_17570210 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['columnBlocks']->value) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['columnBlocks']->value, 'block', false, NULL, 'columnBlocks', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['block']->value) {
?>
		<?php $_smarty_tpl->_assignInScope('_expand_id', mt_rand(10,100000));?>
		<div class="block clearfix <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['custom_class'], ENT_QUOTES, 'UTF-8');?>
">
			<?php if ($_smarty_tpl->tpl_vars['block']->value['block_type'] == $_smarty_tpl->tpl_vars['blocktype_product']->value) {?>
				<h4 class="title_block hidden-md-down"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h4>
  				<a href="#tdcolumn_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_expand_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="h4 hidden-lg-up title_block" data-toggle="collapse"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
				<div id="tdcolumn_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_expand_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="block_content row products-block <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['product_thumb'], ENT_QUOTES, 'UTF-8');?>
 collapse show" data-collapse-hide-mobile>
					<?php if ($_smarty_tpl->tpl_vars['block']->value['products']) {?>
						<!-- Custom start -->
						<?php if ($_smarty_tpl->tpl_vars['block']->value['enable_slider']) {?>
							<div class="owl-carousel products" data-owl-carousel='{ "nav": false, "dots": false, "autoplay": <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['auto_scroll'], ENT_QUOTES, 'UTF-8');?>
, "autoplayTimeout": 5000, "items": 1 }'>
						<?php } else { ?>
							<div class="products grid">
						<?php }?>

						<!-- Custom End -->
						<?php $_smarty_tpl->_assignInScope('counter', 0);?>
						<?php $_smarty_tpl->_assignInScope('rows', $_smarty_tpl->tpl_vars['block']->value['slider_row']);?>
						<?php if ($_smarty_tpl->tpl_vars['rows']->value < 1 || $_smarty_tpl->tpl_vars['rows']->value == '') {?>
							<?php $_smarty_tpl->_assignInScope('rows', 1);?>
						<?php }?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['block']->value['products'], 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['block']->value['enable_slider']) {?>
								<?php if ($_smarty_tpl->tpl_vars['counter']->value%$_smarty_tpl->tpl_vars['rows']->value == 0) {?>
									<div class="row_items">
								<?php }?>
								<?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
							<?php }?>
							<article class="product-miniature js-product-miniature">
								<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/miniatures/_partials/product-miniature-left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
							</article>
							<?php if ($_smarty_tpl->tpl_vars['block']->value['enable_slider']) {?>
								<?php if ($_smarty_tpl->tpl_vars['counter']->value%$_smarty_tpl->tpl_vars['rows']->value == 0 || $_smarty_tpl->tpl_vars['counter']->value == count($_smarty_tpl->tpl_vars['block']->value['products'])) {?>
									</div>
								<?php }?>
							<?php }?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

						<?php if ($_smarty_tpl->tpl_vars['block']->value['enable_slider']) {?>
							</div>
						<?php } else { ?>
							</div>
						<?php }?>
					<?php } else { ?>
						<div class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No Products at this time.','mod'=>'tdcolumnblocks'),$_smarty_tpl ) );?>
</div>
					<?php }?>
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['block_type'] == $_smarty_tpl->tpl_vars['blocktype_html']->value) {?>
				<div class="static-html typo rte-content">
					<?php echo $_smarty_tpl->tpl_vars['block']->value['static_html'];?>

				</div>
			<?php }?>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
