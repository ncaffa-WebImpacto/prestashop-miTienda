<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:42:59
  from 'C:\xampp\htdocs\mitienda\modules\tdproductcomments\views\templates\hook\tdproductcomments_reviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe64234602f4_29835326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '529446689650ebceeb5c28d7da2e8b0b0393fef9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductcomments\\views\\templates\\hook\\tdproductcomments_reviews.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe64234602f4_29835326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
if ((isset($_smarty_tpl->tpl_vars['nbComments']->value) && $_smarty_tpl->tpl_vars['nbComments']->value > 0) || $_smarty_tpl->tpl_vars['zeroCommentDisplay']->value) {?>
    <div class="comments_note">
        <div class="star_content d-inline-flex clearfix">
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
        <?php if (isset($_smarty_tpl->tpl_vars['nbCommentsCounter']->value) && $_smarty_tpl->tpl_vars['nbCommentsCounter']->value) {?>
            <span class="nb-comments">(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nbComments']->value, ENT_QUOTES, 'UTF-8');?>
)</span>
        <?php }?>
    </div>
<?php }
}
}
