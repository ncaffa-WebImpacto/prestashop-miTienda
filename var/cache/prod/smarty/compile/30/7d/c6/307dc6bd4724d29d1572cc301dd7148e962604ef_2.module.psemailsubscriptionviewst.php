<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:56
  from 'module:psemailsubscriptionviewst' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce8db86b1_72997242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307dc6bd4724d29d1572cc301dd7148e962604ef' => 
    array (
      0 => 'module:psemailsubscriptionviewst',
      1 => 1589401702,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce8db86b1_72997242 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="block_newsletter col-12">
  <div class="row align-items-center">
    <div class="newsletter_content col-md-5 col-12">
      <div class="newsletter_content_inner">
        <svg width="40px" height="40px" fill="currentcolor" class="mr-4">
          <use xlink:href="#tdnewsletter">
          </use>
        </svg>
        <div class="content_letter">
          <h3 class="title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Newsletter','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</h3>
          <p id="block-newsletter-label" class="newsletter_text"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get our latest news and special sales','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-12">
      <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
#footer" method="post" class="needs-validation">
        <div class="row">
          <div class="col-12 newsletter_form_wrap">
            <div class="input-wrapper">
              <input
                        name="email"
                        class="newsletter-input <?php if (isset($_smarty_tpl->tpl_vars['nw_error']->value) && $_smarty_tpl->tpl_vars['nw_error']->value) {?> is-invalid<?php }?>"
                        type="email"
                        value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
"
                        placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your email address','d'=>'Shop.Forms.Labels'),$_smarty_tpl ) );?>
"
                        aria-labelledby="block-newsletter-label"
                        autocomplete="email"
                >
            </div>
            <button class="btn btn-primary" name="submitNewsletter" type="submit" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subscribe','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
">
              <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subscribe','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
            </button>
            <input type="hidden" name="action" value="0">
          </div>
          <div class="col-12">
              <?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>
                <p class="newsletter_condition small mt-2"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['conditions']->value, ENT_QUOTES, 'UTF-8');?>
</p>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
                <p class="alert mt-2 <?php if ($_smarty_tpl->tpl_vars['nw_error']->value) {?>alert-danger<?php } else { ?>alert-success<?php }?>">
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value, ENT_QUOTES, 'UTF-8');?>

                </p>
              <?php }?>
              <?php if (isset($_smarty_tpl->tpl_vars['id_module']->value)) {?>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayGDPRConsent','id_module'=>$_smarty_tpl->tpl_vars['id_module']->value),$_smarty_tpl ) );?>

              <?php }?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php }
}
