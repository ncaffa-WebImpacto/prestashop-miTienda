<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:08
  from 'module:bitmegamenuviewstemplates' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23854819b75_04869571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17b6d1764bf39f39fde2db919f7e03f0dbbb5440' => 
    array (
      0 => 'module:bitmegamenuviewstemplates',
      1 => 1589401687,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'module:bitmegamenu/views/templates/hook/vertical.tpl' => 1,
    'module:bitmegamenu/views/templates/hook/_partials/submenu_content.tpl' => 2,
    'module:bitmegamenu/views/templates/hook/_partials/mobile_menu.tpl' => 1,
  ),
),false)) {
function content_5ec23854819b75_04869571 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
<div id="bitmegamenu-wrapper" class="bitmegamenu-wrapper bitmegamenu-all">
	<div class="container container-bitmegamenu">
		<div id="bitmegamenu-horizontal" class="bitmegamenu  clearfix" role="navigation">

				<?php if (isset($_smarty_tpl->tpl_vars['menu_settings_v']->value) && $_smarty_tpl->tpl_vars['menu_settings_v']->value['ver_position'] == 2) {?>

					<div class="cbp-vertical-on-top">
						<?php $_smarty_tpl->_subTemplateRender("module:bitmegamenu/views/templates/hook/vertical.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ontop'=>1), 0, false);
?>
					</div>
				<?php }?>
			<nav id="cbp-hrmenu" class="cbp-hrmenu cbp-horizontal cbp-hrsub-narrow">
				<ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['horizontal_menu']->value, 'tab');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
?>
						<li id="cbp-hrmenu-tab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['id_tab'], ENT_QUOTES, 'UTF-8');?>
" class="cbp-hrmenu-tab cbp-hrmenu-tab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['id_tab'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['tab']->value['active_label']) {?> cbp-onlyicon<?php }
if ($_smarty_tpl->tpl_vars['tab']->value['float']) {?> pull-right cbp-pulled-right<?php }?> <?php if ($_smarty_tpl->tpl_vars['tab']->value['submenu_type'] && !empty($_smarty_tpl->tpl_vars['tab']->value['submenu_content'])) {?> cbp-has-submeu<?php }?>">
							<?php if ($_smarty_tpl->tpl_vars['tab']->value['url_type'] == 2) {?><a role="button" class="cbp-empty-mlink nav-link"><?php } else { ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="nav-link" <?php if ($_smarty_tpl->tpl_vars['tab']->value['new_window']) {?>target="_blank" rel="noopener noreferrer"<?php }?>><?php }?>
								<span class="cbp-tab-title"><?php if ($_smarty_tpl->tpl_vars['tab']->value['icon_type'] && !empty($_smarty_tpl->tpl_vars['tab']->value['icon_class'])) {?> <i class="icon fa <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
 cbp-mainlink-icon"></i><?php }?>
								<?php if (!$_smarty_tpl->tpl_vars['tab']->value['icon_type'] && !empty($_smarty_tpl->tpl_vars['tab']->value['icon'])) {?> <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['icon'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['title'], ENT_QUOTES, 'UTF-8');?>
" class="cbp-mainlink-iicon" /><?php }
if (!$_smarty_tpl->tpl_vars['tab']->value['active_label']) {
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['tab']->value['title'],'/n','<br />');
}
if ($_smarty_tpl->tpl_vars['tab']->value['submenu_type']) {?> <i class="fa fa-angle-down cbp-submenu-aindicator"></i><?php }?></span>
								<?php if (!empty($_smarty_tpl->tpl_vars['tab']->value['label'])) {?><span class="label cbp-legend cbp-legend-main"><?php if (!empty($_smarty_tpl->tpl_vars['tab']->value['legend_icon'])) {?> <i class="icon fa <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['legend_icon'], ENT_QUOTES, 'UTF-8');?>
 cbp-legend-icon"></i><?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
							</a>
							<?php if ($_smarty_tpl->tpl_vars['tab']->value['submenu_type'] && !empty($_smarty_tpl->tpl_vars['tab']->value['submenu_content'])) {?>
								<div class="cbp-hrsub col-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['submenu_width'], ENT_QUOTES, 'UTF-8');?>
">
									<div class="cbp-hrsub-inner">
										<div class="container bitmegamenu-submenu-container">
											<?php if ($_smarty_tpl->tpl_vars['tab']->value['submenu_type'] == 1) {?>
												<div class="cbp-tabs-container">
													<div class="row no-gutters">
														<div class="tabs-links col-2">
															<ul class="cbp-hrsub-tabs-names cbp-tabs-names">
																<?php if (isset($_smarty_tpl->tpl_vars['tab']->value['submenu_content_tabs'])) {?>
																	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value['submenu_content_tabs'], 'innertab', false, NULL, 'innertabsnames', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['innertab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_innertabsnames']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_innertabsnames']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_innertabsnames']->value['index'];
?>
																		<li class="innertab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->id, ENT_QUOTES, 'UTF-8');?>
">
																			<a data-target="#iq-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->id, ENT_QUOTES, 'UTF-8');?>
-innertab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['id_tab'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['innertab']->value->url_type != 2) {?> href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->url, ENT_QUOTES, 'UTF-8');?>
" <?php }?> class="nav-link <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_innertabsnames']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_innertabsnames']->value['first'] : null)) {?>active<?php }?>">
																				<?php if ($_smarty_tpl->tpl_vars['innertab']->value->icon_type && !empty($_smarty_tpl->tpl_vars['innertab']->value->icon_class)) {?> <i class="icon fa <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->icon_class, ENT_QUOTES, 'UTF-8');?>
 cbp-mainlink-icon"></i><?php }?>
																				<?php if (!$_smarty_tpl->tpl_vars['innertab']->value->icon_type && !empty($_smarty_tpl->tpl_vars['innertab']->value->icon)) {?> <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->icon, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->title, ENT_QUOTES, 'UTF-8');?>
" class="cbp-mainlink-iicon" /><?php }?>
																				<?php if (!$_smarty_tpl->tpl_vars['innertab']->value->active_label) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->title, ENT_QUOTES, 'UTF-8');?>
 <?php }?>
																				<?php if (!empty($_smarty_tpl->tpl_vars['innertab']->value->label)) {?><span class="label cbp-legend cbp-legend-inner"><?php if (!empty($_smarty_tpl->tpl_vars['innertab']->value->legend_icon)) {?> <i class="icon fa <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->legend_icon, ENT_QUOTES, 'UTF-8');?>
 cbp-legend-icon"></i><?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->label, ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
																				<i class="fa fa-angle-right cbp-submenu-it-indicator"></i>
																			</a><span class="cbp-inner-border-hider"></span>
																		</li>
																	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
																<?php }?>
															</ul>
														</div>

														<?php if (isset($_smarty_tpl->tpl_vars['tab']->value['submenu_content_tabs'])) {?>
															<div class="tab-content col-10">
																<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value['submenu_content_tabs'], 'innertab', false, NULL, 'innertabscontent', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['innertab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_innertabscontent']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_innertabscontent']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_innertabscontent']->value['index'];
?>
																	<div class="tab-pane cbp-tab-pane <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_innertabscontent']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_innertabscontent']->value['first'] : null)) {?>active<?php }?> innertabcontent-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->id, ENT_QUOTES, 'UTF-8');?>
" id="iq-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['innertab']->value->id, ENT_QUOTES, 'UTF-8');?>
-innertab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['id_tab'], ENT_QUOTES, 'UTF-8');?>
" role="tabpanel">
																		<?php if (!empty($_smarty_tpl->tpl_vars['innertab']->value->submenu_content)) {?>
																			<div class="clearfix">
																				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['innertab']->value->submenu_content, 'element');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['element']->value) {
?>
																					<?php $_smarty_tpl->_subTemplateRender("module:bitmegamenu/views/templates/hook/_partials/submenu_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['element']->value), 0, true);
?>
																				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
																			</div>
																		<?php }?>
																	</div>
																<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
															</div>
														<?php }?>
													</div>
												</div>
											<?php } else { ?>
												<?php if (!empty($_smarty_tpl->tpl_vars['tab']->value['submenu_content'])) {?>
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value['submenu_content'], 'element');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['element']->value) {
?>
														<?php $_smarty_tpl->_subTemplateRender("module:bitmegamenu/views/templates/hook/_partials/submenu_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['element']->value), 0, true);
?>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												<?php }?>
											<?php }?>
										</div>
									</div>
								</div>
							<?php }?>
						</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ul>
			</nav>
		</div>
	</div>
</div>

<div id="_desktop_bitmegamenu-mobile">
	<h3 class="title_horizontal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu','mod'=>'bitmegamenu'),$_smarty_tpl ) );?>
</h3>
	<ul id="bitmegamenu-mobile">
		<?php $_smarty_tpl->_subTemplateRender("module:bitmegamenu/views/templates/hook/_partials/mobile_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('menu'=>$_smarty_tpl->tpl_vars['mobile_menu']->value), 0, false);
?>
	</ul>
</div>
<?php }
}
