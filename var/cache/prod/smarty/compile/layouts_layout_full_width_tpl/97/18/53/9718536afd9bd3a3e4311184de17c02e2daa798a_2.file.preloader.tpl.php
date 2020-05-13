<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:03
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\preloader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ccb1ace67_73973469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9718536afd9bd3a3e4311184de17c02e2daa798a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\preloader.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ccb1ace67_73973469 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader']) && $_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader'] != "prenone") {?>
	<div class="loader-wrapper <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader'], ENT_QUOTES, 'UTF-8');?>
">
		<div class="loader-section style<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_precss'], ENT_QUOTES, 'UTF-8');?>
">
			<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader'] == "preimg" && $_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_preimg'] != '') {?>
				<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_preimg'], ENT_QUOTES, 'UTF-8');?>
" alt="loader"/>
			<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader'] == "precss") {?>
				<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_precss'] == 1) {?>
					<div class="box1"></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_precss'] == 2 || $_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_precss'] == 3) {?>
					<div class="spinner"><div class="box1"></div><div class="box2"></div></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_precss'] == 4) {?>
					<div class="spinner"><div class="box1"></div><div class="box2"></div><div class="box3"></div></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['g_preloader_icon_precss'] == 5) {?>
					<div class="spinner"><div class="box1"></div><div class="box2"></div><div class="box3"></div><div class="box4"></div><div class="box5"></div></div>
				<?php }?>
			<?php }?>
		</div>
	</div>
<?php }
}
}
