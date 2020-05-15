<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:54
  from 'C:\xampp\htdocs\mitienda\modules\tdproductwishlist\views\templates\hook\tdproductwishlist_top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce6f0cbd5_76897966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d6b408e83e3d7f3cdccc3befc35c3a8c5f76181' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductwishlist\\views\\templates\\hook\\tdproductwishlist_top.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce6f0cbd5_76897966 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a class="wishtlist_top" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_link']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wishlists','mod'=>'tdproductwishlist'),$_smarty_tpl ) );?>
" rel="nofollow">
    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wishlists','mod'=>'tdproductwishlist'),$_smarty_tpl ) );?>
 (<span class="cart-wishlist-number" data-wishlist-total="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_product']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['count_product']->value, ENT_QUOTES, 'UTF-8');?>
</span>)</span>
</a>
<?php }
}
