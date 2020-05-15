<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:43:15
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\back-to-top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6433be1385_81907119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ddf8067b3e71dad14d9f5c932ba882c1f266ae8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\back-to-top.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6433be1385_81907119 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['g_btt_status']) && $_smarty_tpl->tpl_vars['themeOpt']->value['g_btt_status'] == "1") {?>
	<a class="backtotop" href="javascript:void(0);" style="display:none;">
      <i class="material-icons">keyboard_arrow_up</i>
    </a>
<?php }
}
}
