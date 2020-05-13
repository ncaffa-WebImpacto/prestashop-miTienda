<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:13:55
  from 'C:\xampp\htdocs\mitienda\modules\paypal\views\templates\admin\setup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc3746919_89737106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '489384f0b22f249bd9a4ab7bf1d2d90e2a64da84' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\paypal\\views\\templates\\admin\\setup.tpl',
      1 => 1589381675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./_partials/headerLogo.tpl' => 1,
  ),
),false)) {
function content_5ebc1cc3746919_89737106 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:./_partials/headerLogo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div>
    <div class="row pp__flex">
        <div class="col-lg-8 stretchHeightForm pp__pb-4">
            <?php if (isset($_smarty_tpl->tpl_vars['formAccountSettings']->value)) {?>
                <?php echo $_smarty_tpl->tpl_vars['formAccountSettings']->value;?>
             <?php }?>

        </div>
        <div class="col-lg-4 pp__flex pp__flex_direction_column pp__justify-content-between">
            <?php if (isset($_smarty_tpl->tpl_vars['formEnvironmentSettings']->value)) {?>
                <?php echo $_smarty_tpl->tpl_vars['formEnvironmentSettings']->value;?>
             <?php }?>

            <div class="status-block-container">
                <?php if (isset($_smarty_tpl->tpl_vars['formStatusTop']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['formStatusTop']->value;?>
                 <?php }?>
            </div>
        </div>
    </div>

    <div class="row pp__flex">
        <div class="col-lg-8">
            <?php if (isset($_smarty_tpl->tpl_vars['formPaymentSettings']->value)) {?>
                <?php echo $_smarty_tpl->tpl_vars['formPaymentSettings']->value;?>
             <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['formMerchantAccounts']->value)) {?>
                <?php echo $_smarty_tpl->tpl_vars['formMerchantAccounts']->value;?>

            <?php }?>
        </div>
        <div class="col-lg-4 stretchHeightForm pp__pb-4 status-block-container">
            <?php if (isset($_smarty_tpl->tpl_vars['formStatus']->value)) {?>
                <?php echo $_smarty_tpl->tpl_vars['formStatus']->value;?>
             <?php }?>
        </div>
    </div>
</div>
<?php }
}
