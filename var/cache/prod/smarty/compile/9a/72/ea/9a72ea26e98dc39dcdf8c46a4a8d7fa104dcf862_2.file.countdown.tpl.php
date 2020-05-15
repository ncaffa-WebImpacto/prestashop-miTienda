<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:59
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\countdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6423158be2_64176622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a72ea26e98dc39dcdf8c46a4a8d7fa104dcf862' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\countdown.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6423158be2_64176622 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to']) && (smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S') < smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],'%Y-%m-%d %H:%M:%S'))) {?>
    <div class="tddeal">
        <div class="tdcountdown" data-date="<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],'%Y/%m/%d %H:%M:%S'), ENT_QUOTES, 'UTF-8');?>
">
            <div class="days_container">
                <span class="number days">0</span>
                <span class="days_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Days','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
            </div>
            <div class="hours_container">
                <span class="number hours">0</span>
                <span class="hours_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hours','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
            </div>
            <div class="minutes_container">
                <span class="number minutes">0</span>
                <span class="minutes_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mins','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
            </div>
            <div class="seconds_container">
                <span class="number seconds">0</span>
                <span class="seconds_text text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Secs','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</span>
            </div>
        </div>
    </div>
<?php }
}
}
