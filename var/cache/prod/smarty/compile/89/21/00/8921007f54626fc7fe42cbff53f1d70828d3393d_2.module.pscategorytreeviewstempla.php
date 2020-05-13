<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:09
  from 'module:pscategorytreeviewstempla' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd1780086_22542595',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8921007f54626fc7fe42cbff53f1d70828d3393d' => 
    array (
      0 => 'module:pscategorytreeviewstempla',
      1 => 1589356898,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd1780086_22542595 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'categories' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\mitienda\\var\\cache\\prod\\smarty\\compile\\89\\21\\00\\8921007f54626fc7fe42cbff53f1d70828d3393d_2.module.pscategorytreeviewstempla.php',
    'uid' => '8921007f54626fc7fe42cbff53f1d70828d3393d',
    'call_name' => 'smarty_template_function_categories_11251668405ebc1cd1768787_21127528',
  ),
));
?>


<div class="block-categories block top-categories clearfix">
  <h4 class="title_block hidden-md-down"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h4>
  <a href="#category-top-menu" class="h4 hidden-lg-up title_block" data-toggle="collapse"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
  <?php if (count($_smarty_tpl->tpl_vars['categories']->value['children'])) {?>
    <ul id="category-top-menu" class="category-top-menu block_content collapse show" data-collapse-hide-mobile>
      <li><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories', array('nodes'=>$_smarty_tpl->tpl_vars['categories']->value['children']), true);?>
</li>
    </ul>
  <?php }?>
  <div class="clearfix"></div>
</div>
<?php }
/* smarty_template_function_categories_11251668405ebc1cd1768787_21127528 */
if (!function_exists('smarty_template_function_categories_11251668405ebc1cd1768787_21127528')) {
function smarty_template_function_categories_11251668405ebc1cd1768787_21127528(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('nodes'=>array(),'depth'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <?php if (count($_smarty_tpl->tpl_vars['nodes']->value)) {?><ul class="category-sub-menu"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nodes']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
?><li data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['depth']->value, ENT_QUOTES, 'UTF-8');?>
" class="category-sub__item category-sub__item--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['depth']->value, ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['depth']->value === 0) {?> clearfix<?php }?>"><?php if ($_smarty_tpl->tpl_vars['depth']->value === 0) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['link'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a><?php if ($_smarty_tpl->tpl_vars['node']->value['children']) {?><i class="material-icons icon-collapse cursor-pointer" data-toggle="collapse" data-target="#exCollapsingNavbar<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id'], ENT_QUOTES, 'UTF-8');?>
">&#xE313;</i><div class="collapse clearfix" id="exCollapsingNavbar<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories', array('nodes'=>$_smarty_tpl->tpl_vars['node']->value['children'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);?>
</div><?php }
} else { ?><a class="category-sub-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['link'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a><?php if ($_smarty_tpl->tpl_vars['node']->value['children']) {?><i class="material-icons icon-collapse cursor-pointer" data-toggle="collapse" data-target="#exCollapsingNavbar<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id'], ENT_QUOTES, 'UTF-8');?>
">&#xE313;</i><div class="collapse clearfix" id="exCollapsingNavbar<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories', array('nodes'=>$_smarty_tpl->tpl_vars['node']->value['children'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);?>
</div><?php }
}?></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}}
/*/ smarty_template_function_categories_11251668405ebc1cd1768787_21127528 */
}
