<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:51:51
  from 'C:\xampp\htdocs\mitienda\modules\bitelementor\views\templates\widgets\productscountdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3c072dd985_96835248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c47e4f4650bd9c3c3437ca0372a9d0551b420ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\bitelementor\\views\\templates\\widgets\\productscountdown.tpl',
      1 => 1589401687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/countdown.tpl' => 1,
  ),
),false)) {
function content_5ebe3c072dd985_96835248 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="elementor-products-countdown">
    <?php if (isset($_smarty_tpl->tpl_vars['products']->value) && $_smarty_tpl->tpl_vars['products']->value) {?>
        <div class="block_content products row">
            <div class="elementor-specialdeals-carousel owl-carousel product_list owl-arrows-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['arrows_position']->value, ENT_QUOTES, 'UTF-8');?>
 owl-dots-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dots_position']->value, ENT_QUOTES, 'UTF-8');?>
" data-owl-elementor='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['owl_options']->value, ENT_QUOTES, 'UTF-8');?>
'>
                <?php $_smarty_tpl->_assignInScope('counter', 0);?>
                <?php $_smarty_tpl->_assignInScope('rows', $_smarty_tpl->tpl_vars['rows']->value);?>
                <?php if ($_smarty_tpl->tpl_vars['rows']->value < 1 || $_smarty_tpl->tpl_vars['rows']->value == '') {?>
                    <?php $_smarty_tpl->_assignInScope('rows', 1);?>
                <?php }?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['counter']->value%$_smarty_tpl->tpl_vars['rows']->value == 0) {?>
                        <div class="row_items">
                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                    <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/countdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'elementor'=>true,'style'=>$_smarty_tpl->tpl_vars['style']->value), 0, true);
?>
                    <?php if ($_smarty_tpl->tpl_vars['counter']->value%$_smarty_tpl->tpl_vars['rows']->value == 0 || $_smarty_tpl->tpl_vars['counter']->value == count($_smarty_tpl->tpl_vars['products']->value)) {?>
                        </div>
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No Products at this time.','mod'=>'bitelementor'),$_smarty_tpl ) );?>
</div>
    <?php }?>
</section>
<?php }
}
