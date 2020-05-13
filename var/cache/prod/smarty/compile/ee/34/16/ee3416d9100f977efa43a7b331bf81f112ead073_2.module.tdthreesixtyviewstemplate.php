<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:14
  from 'module:tdthreesixtyviewstemplate' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd6116c51_18740586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee3416d9100f977efa43a7b331bf81f112ead073' => 
    array (
      0 => 'module:tdthreesixtyviewstemplate',
      1 => 1589356896,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd6116c51_18740586 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['isThreeSixtyContent']->value) && $_smarty_tpl->tpl_vars['isThreeSixtyContent']->value) {?>
    <div class="product-threesixty">
        <a class="pro_360" href="#threesixty-img-container-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
            <svg width="30px" height="30px" fill="currentcolor">
                <use xlink:href="#360deg"></use>
            </svg>
        </a>
    </div>
            
    <div id="threesixty-img-container-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="threesixty-img-container mfp-hide">
        <div class='threesixty' data-images="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['threeSixtyContent']->value, ENT_QUOTES, 'UTF-8');?>
" data-frames="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['frames_count']->value, ENT_QUOTES, 'UTF-8');?>
">
            <ul class="threesixty_images">
            </ul>
            <div class="spinner">
                <span>0%</span>
            </div>
        </div>
    </div>
<?php }?>






<?php }
}
