<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:13:52
  from 'C:\xampp\htdocs\mitienda\modules\paypal\views\templates\admin\_partials\accountSettingsBlock.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc0dc85a1_04248127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '840e69b286e3eb24f73138f857b2205089ea8580' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\paypal\\views\\templates\\admin\\_partials\\accountSettingsBlock.tpl',
      1 => 1589381675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./mbCredentialsForm.tpl' => 2,
    'file:./pppCredentialsForm.tpl' => 2,
  ),
),false)) {
function content_5ebc1cc0dc85a1_04248127 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),));
?>

<div>

    <?php if (isset($_smarty_tpl->tpl_vars['method']->value) && in_array($_smarty_tpl->tpl_vars['method']->value,array('EC','PPP'))) {?>
        <p class="h3">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PayPal Account','mod'=>'paypal'),$_smarty_tpl ) );?>

        </p>

        <p>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In order to activate the module, you must connect your existing PayPal account or create a new one.','mod'=>'paypal'),$_smarty_tpl ) );?>

        </p>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['accountConfigured']->value) && $_smarty_tpl->tpl_vars['accountConfigured']->value) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['method']->value) && $_smarty_tpl->tpl_vars['method']->value == 'EC') {?>
            <span class="pp__mr-4">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connected account','mod'=>'paypal'),$_smarty_tpl ) );?>

            </span>

            <strong>
                <?php if (isset($_smarty_tpl->tpl_vars['paypal_api_user_name']->value) && is_string($_smarty_tpl->tpl_vars['paypal_api_user_name']->value)) {?>
                    <?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['paypal_api_user_name']->value,'/_api[\d]*\./','@');?>

                <?php }?>
            </strong>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['method']->value) && $_smarty_tpl->tpl_vars['method']->value == 'MB') {?>
            <?php $_smarty_tpl->_subTemplateRender('file:./mbCredentialsForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender('file:./pppCredentialsForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['method']->value) && $_smarty_tpl->tpl_vars['method']->value == 'EC') {?>
            <span class="btn btn-default pp__ml-4" id="logoutAccount">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Logout','mod'=>'paypal'),$_smarty_tpl ) );?>

            </span>
        <?php }?>
    <?php } else { ?>
        <?php if (isset($_smarty_tpl->tpl_vars['method']->value) && $_smarty_tpl->tpl_vars['method']->value == 'MB') {?>
            <?php $_smarty_tpl->_subTemplateRender('file:./mbCredentialsForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['country_iso']->value) && in_array($_smarty_tpl->tpl_vars['country_iso']->value,array('IN','JP'))) {?>
            <span class="btn btn-default" data-toggle="modal" data-target="#credentialBlockEC">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connect or create PayPal account','mod'=>'paypal'),$_smarty_tpl ) );?>

            </span>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['urlOnboarding']->value) && $_smarty_tpl->tpl_vars['urlOnboarding']->value) {?>
            <a href="<?php echo addslashes($_smarty_tpl->tpl_vars['urlOnboarding']->value);?>
"
               class="btn btn-default">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connect or create PayPal account','mod'=>'paypal'),$_smarty_tpl ) );?>

            </a>
        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender('file:./pppCredentialsForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>

    <?php }?>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['country_iso']->value) && in_array($_smarty_tpl->tpl_vars['country_iso']->value,array('IN','JP'))) {?>
    <div class="modal fade" id="credentialBlockEC" role="dialog" aria-labelledby="credentialBlockEC" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'API Credentials','mod'=>'paypal'),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In order to accept PayPal Plus payments, please fill in your API REST credentials.','mod'=>'paypal'),$_smarty_tpl ) );?>
</p>
                    <ul>
                        <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Access','mod'=>'paypal'),$_smarty_tpl ) );?>

                            <a target="_blank" href="https://www.<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'SANDBOX') {?>sandbox.<?php }?>paypal.com/">https://www.<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'SANDBOX') {?>sandbox.<?php }?>paypal.com/</a>
                        </li>
                        <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Log in or Create a business account','mod'=>'paypal'),$_smarty_tpl ) );?>
</li>
                        <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Access to','mod'=>'paypal'),$_smarty_tpl ) );?>
 <a target="_blank" href="https://www.<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'SANDBOX') {?>sandbox.<?php }?>paypal.com/businessprofile/mytools/apiaccess/firstparty/signature"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'API NVP/SOAP integration','mod'=>'paypal'),$_smarty_tpl ) );?>
</a></li>
                        <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click « Show » on the right of credentials','mod'=>'paypal'),$_smarty_tpl ) );?>
</li>
                        <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Copy/paste your API credentials below for %s environment','sprintf'=>array($_smarty_tpl->tpl_vars['mode']->value),'mod'=>'paypal'),$_smarty_tpl ) );?>
 </li>
                    </ul>
                    <hr/>
                    <input type="hidden" id="with_card" name="with_card"/>
                    <input type="hidden" name="paypal_set_config" value="1"/>
		            <input type="hidden" name="id_shop" value="<?php if (isset($_smarty_tpl->tpl_vars['idShop']->value)) {
echo $_smarty_tpl->tpl_vars['idShop']->value;
}?>"/>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'API Credentials for','mod'=>'paypal'),$_smarty_tpl ) );?>
 <?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
</h4>
                    <p>
                        <label for="api_username"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'API username','mod'=>'paypal'),$_smarty_tpl ) );?>
</label>
                        <input type="text" id="api_username" name="api_username" value="<?php if (isset($_smarty_tpl->tpl_vars['paypal_api_user_name']->value)) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paypal_api_user_name']->value,'htmlall','UTF-8' ));
}?>"/>
                    </p>
                    <p>
                        <label for="api_password"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'API password','mod'=>'paypal'),$_smarty_tpl ) );?>
</label>
                        <input type="password" id="api_password" name="api_password" value="<?php if (isset($_smarty_tpl->tpl_vars['paypal_pswd']->value)) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paypal_pswd']->value,'htmlall','UTF-8' ));
}?>"/>
                    </p>
                    <p>
                        <label for="api_signature"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'API signature','mod'=>'paypal'),$_smarty_tpl ) );?>
</label>
                        <input type="text" id="api_signature" name="api_signature" value="<?php if (isset($_smarty_tpl->tpl_vars['paypal_signature']->value)) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paypal_signature']->value,'htmlall','UTF-8' ));
}?>"/>
                    </p>
                    <p>
                        <label for="merchant_id"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Merchant ID','mod'=>'paypal'),$_smarty_tpl ) );?>
</label>
                        <input type="text" id="merchant_id" name="merchant_id" value="<?php if (isset($_smarty_tpl->tpl_vars['paypal_merchant_id']->value)) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paypal_merchant_id']->value,'htmlall','UTF-8' ));
}?>"/>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'paypal'),$_smarty_tpl ) );?>
</button>
                    <button type="button" id="confirmCredentials" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Confirm API Credentials','mod'=>'paypal'),$_smarty_tpl ) );?>
</button>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php }
}
