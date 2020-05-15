<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:55
  from 'C:\xampp\htdocs\mitienda\modules\tdproductcomments\views\templates\hook\tdproductcomments-extra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce7c9c501_89674291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '239d41ca410e9daee1f34c148079a2a5d9d0df80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductcomments\\views\\templates\\hook\\tdproductcomments-extra.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce7c9c501_89674291 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
if ((($_smarty_tpl->tpl_vars['nbComments']->value == 0 && $_smarty_tpl->tpl_vars['too_early']->value == false && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value)) || ($_smarty_tpl->tpl_vars['nbComments']->value != 0))) {?>
    <div id="product_comments_block_extra" <?php if ($_smarty_tpl->tpl_vars['nbComments']->value == 0) {?>class="no-comment"<?php }?>>
        <?php if ($_smarty_tpl->tpl_vars['nbComments']->value != 0) {?>
            <div class="comments_note">
                <div class="star_content clearfix">
                    <?php if (!$_smarty_tpl->tpl_vars['ratings']->value['avg']) {?>
                        <?php $_smarty_tpl->_assignInScope('average', 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->_assignInScope('average', $_smarty_tpl->tpl_vars['ratings']->value['avg']);?>
                    <?php }?>
                    <?php echo smarty_function_math(array('equation'=>"floor(x)",'x'=>$_smarty_tpl->tpl_vars['average']->value,'assign'=>'stars'),$_smarty_tpl);?>

                    <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= 5; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <?php if (($_smarty_tpl->tpl_vars['stars']->value-(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) >= 1) {?>
                            <div class="star star_on"></div>
                        <?php } elseif ($_smarty_tpl->tpl_vars['average']->value-(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null) > 0) {?>
                            <div class="star star_on star_half"></div>
                        <?php } else { ?>
                            <div class="star"></div>
                        <?php }?>
                    <?php
}
}
?>
                </div>
            </div>
        <?php }?>
        <div class="comments_advices">
            <?php if ($_smarty_tpl->tpl_vars['nbComments']->value != 0) {?>
                <a class="reviews" href="javascript:void(0);"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read reviews','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nbComments']->value, ENT_QUOTES, 'UTF-8');?>
)</a>
            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['too_early']->value == false && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
                <a class="open-comment-form" href="javascript:void(0);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</a>
            <?php }?>
        </div>
    </div>
<?php }?>
<!--  /Module ProductComments --><?php }
}
