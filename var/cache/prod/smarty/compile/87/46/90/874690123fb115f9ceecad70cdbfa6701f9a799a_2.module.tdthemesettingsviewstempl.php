<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:43:15
  from 'module:tdthemesettingsviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6433ce65c0_32563923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '874690123fb115f9ceecad70cdbfa6701f9a799a' => 
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
function content_5ebe6433ce65c0_32563923 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#f1d600"
                }
            },
            "position": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_position'], ENT_QUOTES, 'UTF-8');?>
",
            "theme": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_theme'], ENT_QUOTES, 'UTF-8');?>
",
            "content": {
                "message": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_msg'], ENT_QUOTES, 'UTF-8');?>
",
                "dismiss": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_btntxt'], ENT_QUOTES, 'UTF-8');?>
",
                "link": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_moretxt'], ENT_QUOTES, 'UTF-8');?>
",
                "href": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_morelnk'], ENT_QUOTES, 'UTF-8');?>
",
            },
            "expiryDays" : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cookie_expiry'], ENT_QUOTES, 'UTF-8');?>

        })
    });
<?php echo '</script'; ?>
><?php }
}
