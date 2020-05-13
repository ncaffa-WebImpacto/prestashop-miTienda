<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:01
  from 'module:pslanguageselectorpslangu' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc93bbb48_22022567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c00f78dace25d509ec3a1f54176b7ae2000accf' => 
    array (
      0 => 'module:pslanguageselectorpslangu',
      1 => 1589356898,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc93bbb48_22022567 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="_desktop_language_selector">
  <div id="language_selector">
    <div class="language-selector-wrapper">
     <span id="language-selector-label" class="d-inline-block d-lg-none"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Language : ','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
      <div class="language-selector dropdown js-dropdown">
        <a class="expand-more hidden-md-down" data-display="static" data-toggle="dropdown">
          <img class="mr-1" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_lang_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['current_language']->value['id_lang'], ENT_QUOTES, 'UTF-8');?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['current_language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>
" />
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['current_language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>

        </a>
        <ul class="dropdown-menu hidden-md-down">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
            <li <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] == $_smarty_tpl->tpl_vars['current_language']->value['id_lang']) {?> class="current" <?php }?>>
              <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'language','id'=>$_smarty_tpl->tpl_vars['language']->value['id_lang']),$_smarty_tpl ) );?>
" class="dropdown-item" data-iso-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>
</a>
            </li>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <select class="link hidden-lg-up" aria-labelledby="language-selector-label">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
            <option value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'language','id'=>$_smarty_tpl->tpl_vars['language']->value['id_lang']),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] == $_smarty_tpl->tpl_vars['current_language']->value['id_lang']) {?> selected="selected"<?php }?> data-iso-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>

            </option>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
      </div>
    </div>
  </div>
</div><?php }
}