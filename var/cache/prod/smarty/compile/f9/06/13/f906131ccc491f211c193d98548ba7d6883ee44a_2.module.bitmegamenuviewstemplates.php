<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:01
  from 'module:bitmegamenuviewstemplates' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc9ee6960_80678831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f906131ccc491f211c193d98548ba7d6883ee44a' => 
    array (
      0 => 'module:bitmegamenuviewstemplates',
      1 => 1589356895,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc9ee6960_80678831 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'mobile_links' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\mitienda\\var\\cache\\prod\\smarty\\compile\\f9\\06\\13\\f906131ccc491f211c193d98548ba7d6883ee44a_2.module.bitmegamenuviewstemplates.php',
    'uid' => 'f906131ccc491f211c193d98548ba7d6883ee44a',
    'call_name' => 'smarty_template_function_mobile_links_4196168595ebc1cc9ed9739_94544827',
  ),
));
?>



<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)) {?>
	<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'mobile_links', array('nodes'=>$_smarty_tpl->tpl_vars['menu']->value,'first'=>true), true);?>

<?php }
}
/* smarty_template_function_mobile_links_4196168595ebc1cc9ed9739_94544827 */
if (!function_exists('smarty_template_function_mobile_links_4196168595ebc1cc9ed9739_94544827')) {
function smarty_template_function_mobile_links_4196168595ebc1cc9ed9739_94544827(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('nodes'=>array(),'first'=>false), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

	<?php if (count($_smarty_tpl->tpl_vars['nodes']->value)) {
if (!$_smarty_tpl->tpl_vars['first']->value) {?><ul><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nodes']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
if (isset($_smarty_tpl->tpl_vars['node']->value['title'])) {?><li><?php if (isset($_smarty_tpl->tpl_vars['node']->value['children'])) {?><span class="mm-expand"><i class="fa fa-angle-down" aria-hidden="true"></i></span><?php }?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['href'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a><?php if (isset($_smarty_tpl->tpl_vars['node']->value['children'])) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'mobile_links', array('nodes'=>$_smarty_tpl->tpl_vars['node']->value['children'],'first'=>false), true);
}?></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!$_smarty_tpl->tpl_vars['first']->value) {?></ul><?php }
}
}}
/*/ smarty_template_function_mobile_links_4196168595ebc1cc9ed9739_94544827 */
}
