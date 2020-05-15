<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:56
  from 'C:\xampp\htdocs\mitienda\modules\tdproductcomments\views\templates\hook\tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce876e705_72279857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b5c663a42a497ba0154322f7b3264bdff1de897' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductcomments\\views\\templates\\hook\\tab.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce876e705_72279857 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'vertical' || $_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'horizontal') {?>
    <li class="nav-item">
        <a class="nav-link tdcommenttab" data-toggle="tab" href="#product-comment"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reviews','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</a>
    </li>
    <?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'accordion') {?>
        <a class="accordion-tab-title  tdcommenttab" data-toggle="collapse" href="#product-comment"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reviews','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</a>
<?php }?> 
<?php }
}
