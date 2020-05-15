<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:56
  from 'module:tdsizechartsviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce84ccf04_90854180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '721e9c46b8a6508aec8921d5eed8d79f334ce79b' => 
    array (
      0 => 'module:tdsizechartsviewstemplate',
      1 => 1589401689,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce84ccf04_90854180 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['charts']->value) && $_smarty_tpl->tpl_vars['charts']->value) {?>
    <div class="tdsize-chart">
        <a class="schart tip_inside" href="#tdsizecharts-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
            <svg width="18px" height="18px" fill="currentcolor">
                <use xlink:href="#schart"></use>
            </svg>
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Size chart','mod'=>'tdsizecharts'),$_smarty_tpl ) );?>
</span>
            <span class ="tip"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Size chart','mod'=>'tdsizecharts'),$_smarty_tpl ) );?>
</span>
        </a>
    </div>

    <div id="tdsizecharts-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="tdsizecharts mfp-hide">
        <?php if (count($_smarty_tpl->tpl_vars['charts']->value) > 1) {?>
            <ul class="nav nav-tabs">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['charts']->value, 'chart', false, 'i', 'charts', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['chart']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['index'];
?>
                    <li class="nav-item">
                        <a class="nav-link<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['first'] : null)) {?> active<?php }?>" data-toggle="tab" href="#tdcharts-tab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8');?>
">
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['chart']->value['title'], ENT_QUOTES, 'UTF-8');?>

                        </a>
                    </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        <?php }?>

        <div class="tab-content" id="tab-content">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['charts']->value, 'chart', false, 'i', 'charts', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['chart']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['index'];
?>
                <div class="tab-pane in<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_charts']->value['first'] : null)) {?> active<?php }?>" id="tdcharts-tab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value, ENT_QUOTES, 'UTF-8');?>
">
                    <div class="rte-content"><?php echo $_smarty_tpl->tpl_vars['chart']->value['description'];?>
</div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
<?php }
}
}
