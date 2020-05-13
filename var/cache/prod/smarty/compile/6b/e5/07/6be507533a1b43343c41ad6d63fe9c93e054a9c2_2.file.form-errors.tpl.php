<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\form-errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cca3ef071_83580097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6be507533a1b43343c41ad6d63fe9c93e054a9c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\form-errors.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cca3ef071_83580097 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
    <div class="<?php if (isset($_smarty_tpl->tpl_vars['label']->value)) {?>invalid-feedback<?php } else { ?>mb-3<?php }?>">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6840570335ebc1cca3e7673_30820466', 'form_errors');
?>

    </div>
    <?php } else { ?>
    <div class="invalid-feedback js-invalid-feedback-browser"></div>
<?php }
}
/* {block 'form_errors'} */
class Block_6840570335ebc1cca3e7673_30820466 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_errors' => 
  array (
    0 => 'Block_6840570335ebc1cca3e7673_30820466',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <ul<?php if (!isset($_smarty_tpl->tpl_vars['label']->value)) {?> class="ps-alert-error alert alert-danger"<?php }?>>
                <li class="js-invalid-feedback-browser"></li>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
                    <li><?php echo nl2br($_smarty_tpl->tpl_vars['error']->value);?>
</li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        <?php
}
}
/* {/block 'form_errors'} */
}
