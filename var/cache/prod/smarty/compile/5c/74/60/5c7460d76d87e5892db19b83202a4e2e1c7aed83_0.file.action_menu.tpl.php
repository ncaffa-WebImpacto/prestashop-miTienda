<?php
/* Smarty version 3.1.33, created on 2020-05-13 17:58:04
  from 'C:\xampp\htdocs\mitienda\modules\ps_mbo\views\templates\admin\include\action_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc190c411271_77847618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c7460d76d87e5892db19b83202a4e2e1c7aed83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\ps_mbo\\views\\templates\\admin\\include\\action_menu.tpl',
      1 => 1589297235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc190c411271_77847618 (Smarty_Internal_Template $_smarty_tpl) {
?> 
<div v-if="module.attributes.url_active == 'buy'" class="form-action-button-container">
    <a class="btn btn-primary btn-primary-reverse btn-block btn-outline-primary light-button module_action_menu_go_to_addons" v-bind:href="module.attributes.url" target="_blank">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Discover','d'=>'Admin.Modules.Feature'),$_smarty_tpl ) );?>

    </a>
 </div>
<div v-else class="btn-group form-action-button-container">
	<form class="btn-group form-action-button" method="post" v-bind:action="module.attributes.urls.install">
		<button type="submit" class="btn btn-primary-reverse btn-outline-primary light-button module_action_menu_install" >
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Install','d'=>'Admin.Modules.Feature'),$_smarty_tpl ) );?>

		</button>
	</form>
</div><?php }
}
