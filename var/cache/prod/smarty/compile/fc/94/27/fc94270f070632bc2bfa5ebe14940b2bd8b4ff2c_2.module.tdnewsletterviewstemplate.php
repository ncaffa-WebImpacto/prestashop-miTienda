<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:03
  from 'module:tdnewsletterviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1ccb35df81_96069941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc94270f070632bc2bfa5ebe14940b2bd8b4ff2c' => 
    array (
      0 => 'module:tdnewsletterviewstemplate',
      1 => 1589356895,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1ccb35df81_96069941 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['items']->value && isset($_smarty_tpl->tpl_vars['items']->value)) {?>
    <div  class="td-newsletter" style="max-width: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['width']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px; height: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['height']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px;">
        <div class="d-flex">
            <div class="image-newsletter col-md-6 hidden-sm-down">
                <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['items']->value[0]['image'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Newsletter','mod'=>'tdnewsletter'),$_smarty_tpl ) );?>
">
            </div>
            <div class="col-md-6 col-12 box-newsletter">
                <div class="innerbox-newsletter">
                    <?php if ($_smarty_tpl->tpl_vars['items']->value[0]['title'] && isset($_smarty_tpl->tpl_vars['items']->value[0]['title'])) {?>
                        <h3 class="newsletter-title">
                            <?php echo $_smarty_tpl->tpl_vars['items']->value[0]['title'];?>

                        </h3>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['items']->value[0]['text1'] && isset($_smarty_tpl->tpl_vars['items']->value[0]['text1'])) {?>
                        <div class="newsletter-desc text1">
                            <?php echo $_smarty_tpl->tpl_vars['items']->value[0]['text1'];?>

                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['items']->value[0]['text2'] && isset($_smarty_tpl->tpl_vars['items']->value[0]['text2'])) {?>
                        <div class="newsletter-desc text2">
                            <?php echo $_smarty_tpl->tpl_vars['items']->value[0]['text2'];?>

                        </div>
                    <?php }?>
                    <form method="post" class="tdnewsletter_form" action="">
                        <fieldset>
                            <div class="clearfix">
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <input class="form-control tdnl_email" type="text" id="tdnl_email" name="tdnl_email" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your email address','mod'=>'tdnewsletter'),$_smarty_tpl ) );?>
" value="">
                                    </div>
                                    <button type="submit" class="btn btn-primary tdnewsletter_send">
                                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subscribe','mod'=>'tdnewsletter'),$_smarty_tpl ) );?>
</span>
                                    </button>
                                </div>
                                <p class="newsletter_msg alert"></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <a class="td-newsletter-close" id="close"></a>
                <a class="td-newsletter-dont" href="#" id="dont-show"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Don’t show this popup again','mod'=>'tdnewsletter'),$_smarty_tpl ) );?>
</a>
            </div>
        </div>
    </div>
<?php }
}
}
