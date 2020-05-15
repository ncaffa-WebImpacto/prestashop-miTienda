<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:51:50
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\variant-links.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3c0690edf0_48741266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a219343a40a59fed98b7ab49ded73b748c4d35f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\variant-links.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe3c0690edf0_48741266 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="variant-links d-flex">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['variants']->value, 'variant', false, NULL, 'variantslist', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['variant']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_variantslist']->value['iteration']++;
?>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_variantslist']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_variantslist']->value['iteration'] : null) < 6) {?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
               class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value['type'], ENT_QUOTES, 'UTF-8');?>
 mx-1 tip_inside"
                                <?php if ($_smarty_tpl->tpl_vars['variant']->value['html_color_code']) {?> style="background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value['html_color_code'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['variant']->value['texture']) {?> style="background-image: url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value['texture'], ENT_QUOTES, 'UTF-8');?>
)" <?php }?>
            ><span class="tip"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span></a>
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ((count($_smarty_tpl->tpl_vars['variants']->value)) > 5) {?>
        <span class="js-count count">+<?php echo htmlspecialchars((count($_smarty_tpl->tpl_vars['variants']->value))-5, ENT_QUOTES, 'UTF-8');?>
</span>
    <?php }?>
</div>
<?php }
}
