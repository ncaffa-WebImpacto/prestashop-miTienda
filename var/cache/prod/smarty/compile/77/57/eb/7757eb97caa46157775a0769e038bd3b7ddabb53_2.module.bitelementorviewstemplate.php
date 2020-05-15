<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:51:49
  from 'module:bitelementorviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3c05d0a530_49290336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7757eb97caa46157775a0769e038bd3b7ddabb53' => 
    array (
      0 => 'module:bitelementorviewstemplate',
      1 => 1589401687,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe3c05d0a530_49290336 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="categoryblock<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categorycount']->value, ENT_QUOTES, 'UTF-8');?>
 categoryblock">
	<div class="category-wrap">
		<?php if ($_smarty_tpl->tpl_vars['showimage']->value) {?>   
			<div class="categoryimage">
				<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
			</div>
		<?php }?>  
		<div class="categorylist">
			<?php if ($_smarty_tpl->tpl_vars['showtitle']->value) {?>   
				<div class="cate-heading">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'category','id'=>$_smarty_tpl->tpl_vars['cat']->value['id_category'],'id_lang'=>$_smarty_tpl->tpl_vars['id_lang']->value),$_smarty_tpl ) );?>
">
						<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

					</a>
				</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['showcount']->value) {?> 
				<div class="cate-count">
					<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat']->value['productCount'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Items','mod'=>'bitelementor'),$_smarty_tpl ) );?>

				</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['viewall']->value) {?> 
				<div class="show-all-cate">
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'category','id'=>$_smarty_tpl->tpl_vars['cat']->value['id_category'],'id_lang'=>$_smarty_tpl->tpl_vars['id_lang']->value),$_smarty_tpl ) );?>
">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View All','mod'=>'bitelementor'),$_smarty_tpl ) );?>

					</a> 
				</div>
			<?php }?>
		</div>
	</div>
</div><?php }
}
