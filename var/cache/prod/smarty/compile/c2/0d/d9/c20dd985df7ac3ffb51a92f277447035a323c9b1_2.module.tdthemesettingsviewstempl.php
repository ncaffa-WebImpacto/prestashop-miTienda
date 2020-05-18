<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:09
  from 'module:tdthemesettingsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23855464236_55369383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c20dd985df7ac3ffb51a92f277447035a323c9b1' => 
    array (
      0 => 'module:tdthemesettingsviewstempl',
      1 => 1589401689,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec23855464236_55369383 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['previous']->value) || isset($_smarty_tpl->tpl_vars['next']->value)) {?>
    <div id="productsnav">
        <?php if (isset($_smarty_tpl->tpl_vars['previous']->value)) {?>
            <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'product','id'=>$_smarty_tpl->tpl_vars['previous']->value->id,'id_lang'=>$_smarty_tpl->tpl_vars['id_lang']->value),$_smarty_tpl ) );?>
">
                <i class="material-icons">chevron_left</i>
                <div class="product-short-image">
                    <div class="image-thumb">
                        <img class="img-responsive"  src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['previous']->value->link_rewrite,$_smarty_tpl->tpl_vars['previousImage']->value,'small_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" itemprop="image" />
                    </div>
                    <div class="product-short-description">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['previous']->value->name, ENT_QUOTES, 'UTF-8');?>

                    </div>
                </div>
            </a>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['next']->value)) {?>
            <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'product','id'=>$_smarty_tpl->tpl_vars['next']->value->id,'id_lang'=>$_smarty_tpl->tpl_vars['id_lang']->value),$_smarty_tpl ) );?>
">
                <i class="material-icons">chevron_right</i>
                <div class="product-short-image">
                    <div class="image-thumb">
                        <img class="img-responsive"  src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['next']->value->link_rewrite,$_smarty_tpl->tpl_vars['nextImage']->value,'small_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" itemprop="image" />
                    </div>
                    <div class="product-short-description">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['next']->value->name, ENT_QUOTES, 'UTF-8');?>

                    </div>
                </div>
            </a>
        <?php }?>
    </div>
<?php }
}
}
