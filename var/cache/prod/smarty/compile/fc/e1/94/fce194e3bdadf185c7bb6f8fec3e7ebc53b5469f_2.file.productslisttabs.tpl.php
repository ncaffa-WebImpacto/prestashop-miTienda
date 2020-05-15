<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:58
  from 'C:\xampp\htdocs\mitienda\modules\bitelementor\views\templates\widgets\productslisttabs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6422d2c831_42217420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fce194e3bdadf185c7bb6f8fec3e7ebc53b5469f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\bitelementor\\views\\templates\\widgets\\productslisttabs.tpl',
      1 => 1589401687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/product.tpl' => 1,
  ),
),false)) {
function content_5ebe6422d2c831_42217420 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tabs elementor-products-tabs">
  <div class="box-nav-tab">
    <div class="dropdown-toggle-nav-tab hidden-lg-up"></div>
    <ul class="nav nav-tabs border-0 dropdown-menu-nav-tab" role="tablist">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab', false, NULL, 'productTabs', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['index'];
?>
        <li class="nav-item">
          <a class="nav-link<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first'] : null)) {?> active<?php }?>" data-toggle="tab" href="#ptab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['uid'], ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration'] : null), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
        </li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  </div>
  <div class="tab-content">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab', false, NULL, 'productTabs', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['index'];
?>
      <div id="ptab-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab']->value['uid'], ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration'] : null), ENT_QUOTES, 'UTF-8');?>
" class="tab-pane <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first'] : null)) {?> active<?php }?>">
        <?php if (isset($_smarty_tpl->tpl_vars['tab']->value['products']) && $_smarty_tpl->tpl_vars['tab']->value['products']) {?>
          <div class="block_content products row<?php if ($_smarty_tpl->tpl_vars['view']->value == 'grid') {?> grid cols-xs-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['xsd']->value, ENT_QUOTES, 'UTF-8');?>
 cols-sm-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['smd']->value, ENT_QUOTES, 'UTF-8');?>
 cols-md-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mdd']->value, ENT_QUOTES, 'UTF-8');?>
 cols-lg-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lgd']->value, ENT_QUOTES, 'UTF-8');?>
 cols-xl-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['xld']->value, ENT_QUOTES, 'UTF-8');
}?>">
            <?php if ($_smarty_tpl->tpl_vars['view']->value == 'carousel') {?>
              <div class="elementor-products-carousel owl-carousel product_list owl-arrows-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['arrows_position']->value, ENT_QUOTES, 'UTF-8');?>
 owl-dots-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dots_position']->value, ENT_QUOTES, 'UTF-8');?>
" data-owl-elementor='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['owl_options']->value, ENT_QUOTES, 'UTF-8');?>
'>
            <?php }?>
              <?php $_smarty_tpl->_assignInScope('counter', 0);?>
              <?php $_smarty_tpl->_assignInScope('rows', $_smarty_tpl->tpl_vars['rows']->value);?>
              <?php if ($_smarty_tpl->tpl_vars['rows']->value < 1 || $_smarty_tpl->tpl_vars['rows']->value == '') {?>
                <?php $_smarty_tpl->_assignInScope('rows', 1);?>
              <?php }?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value['products'], 'product', false, NULL, 'productTabs', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_productTabs']->value['index'];
?>
                <?php if ($_smarty_tpl->tpl_vars['view']->value == 'carousel') {?>
                  <?php if ($_smarty_tpl->tpl_vars['counter']->value%$_smarty_tpl->tpl_vars['rows']->value == 0) {?>
                    <div class="row_items">
                  <?php }?>
                  <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                <?php }?>
                  <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'elementor'=>true,'style'=>$_smarty_tpl->tpl_vars['style']->value), 0, true);
?>
                <?php if ($_smarty_tpl->tpl_vars['view']->value == 'carousel') {?>
                  <?php if ($_smarty_tpl->tpl_vars['counter']->value%$_smarty_tpl->tpl_vars['rows']->value == 0 || $_smarty_tpl->tpl_vars['counter']->value == count($_smarty_tpl->tpl_vars['tab']->value['products'])) {?>
                    </div>
                  <?php }?>
                <?php }?>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['view']->value == 'carousel') {?>
              </div>
            <?php }?>
          </div>
        <?php } else { ?>
          <div class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No Products in current tab at this time.','mod'=>'bitelementor'),$_smarty_tpl ) );?>
</div>
        <?php }?>
      </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
<?php }
}
