<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:14
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-variants.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd67dd839_99888354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7ada31b0cada5611d6466bbaa4bf7a13e5f78e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-variants.tpl',
      1 => 1589374587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd67dd839_99888354 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-variants">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group', false, 'id_attribute_group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id_attribute_group']->value => $_smarty_tpl->tpl_vars['group']->value) {
?>
    <?php if (!empty($_smarty_tpl->tpl_vars['group']->value['attributes'])) {?>
      <div class="clearfix product-variants-item">
        <?php if ($_smarty_tpl->tpl_vars['group']->value['group_type'] == 'select') {?>
          <div class="control-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
          <div class="clearfix">
            <select class="custom-select w-auto" id="group_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" data-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" name="group[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
]">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value['attributes'], 'group_attribute', false, 'id_attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id_attribute']->value => $_smarty_tpl->tpl_vars['group_attribute']->value) {
?>
                <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['selected']) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
          </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['group_type'] == 'color') {?>
          <div class="control-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
          <div class="clearfix">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value['attributes'], 'group_attribute', false, 'id_attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id_attribute']->value => $_smarty_tpl->tpl_vars['group_attribute']->value) {
?>
              <label class="input-container">
                <input class="input-color d--none" type="radio" data-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" name="group[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['selected']) {?> checked="checked"<?php }?>>
                <span
                <?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['html_color_code'] && !$_smarty_tpl->tpl_vars['group_attribute']->value['texture']) {?>class="color tip_inside" style="background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['html_color_code'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['texture']) {?>class="color texture tip_inside" style="background-image: url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['texture'], ENT_QUOTES, 'UTF-8');?>
)" <?php }?>
                ><span class="tip"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span></span>
              </label>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['group_type'] == 'radio') {?>
          <div class="control-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value['attributes'], 'group_attribute', false, 'id_attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id_attribute']->value => $_smarty_tpl->tpl_vars['group_attribute']->value) {
?>
            <div class="input-container">
              <input id="r-variant-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
" class="input-radio" type="radio" data-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" name="group[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['selected']) {?> checked="checked"<?php }?>>
              <label class="radio-label" for="r-variant-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
</label>
            </div>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
      </div>
    <?php }?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
