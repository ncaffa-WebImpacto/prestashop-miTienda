<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:13:55
  from 'C:\xampp\htdocs\mitienda\admin260f4hauq\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc38c3681_44023180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edd91996f136f12bfc27f267bf325b49c46fdb23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\admin260f4hauq\\themes\\default\\template\\content.tpl',
      1 => 1589296689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc38c3681_44023180 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
