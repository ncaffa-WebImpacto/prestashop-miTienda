<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:56
  from 'C:\xampp\htdocs\mitienda\modules\tdproductcomments\views\templates\hook\tdproductcomments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce8a381c4_85550146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de5c85060915a912e4e07c6977870be6fd7ab706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductcomments\\views\\templates\\hook\\tdproductcomments.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce8a381c4_85550146 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>
<div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['pp_tabs_style'] == 'accordion') {?> collapse accordion-tab-description<?php }?>" id="product-comment">
    <div id="product_comments_block_tab">
        <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
            <?php if ((!$_smarty_tpl->tpl_vars['too_early']->value && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
                <div class="align_center new_comment">
                    <a id="new_comment_tab_btn" class="btn btn-primary open-comment-form" href="javascript:void(0);">
                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review!','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</span>
                    </a>
                </div>
            <?php }?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['comment']->value['content']) {?>
                    <div class="comment">
                        <div class="row">
                            <div class="comment_author col-md-3">
                                <div class="star_content clearfix">
                                    <?php echo smarty_function_math(array('equation'=>"floor(x)",'x'=>$_smarty_tpl->tpl_vars['comment']->value['grade'],'assign'=>'stars'),$_smarty_tpl);?>

                                    <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= 5; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <?php if (($_smarty_tpl->tpl_vars['stars']->value-(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) >= 1) {?>
                                            <div class="star star_on"></div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['comment']->value['grade']-(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null) > 0) {?>
                                            <div class="star star_on star_half"></div>
                                        <?php } else { ?>
                                            <div class="star"></div>
                                        <?php }?>
                                    <?php
}
}
?>
                                </div>
                                <div class="comment_author_infos">
                                    <strong><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['customer_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</strong>
                                    <em><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['date_add'],'html','UTF-8' )),'full'=>0),$_smarty_tpl ) );?>
</em>
                                </div>
                            </div> <!-- .comment_author -->
                            <div class="comment_details col-md-9">
                                <p class="title_block">
                                    <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['title'], ENT_QUOTES, 'UTF-8');?>
</strong>
                                </p>
                                <p><?php echo nl2br(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['content'],'html','UTF-8' )));?>
</p>
                                <ul>
                                    <?php if ($_smarty_tpl->tpl_vars['comment']->value['total_advice'] > 0) {?>
                                        <li class="comment_helpful">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%1$d out of %2$d people found this review useful.','sprintf'=>array($_smarty_tpl->tpl_vars['comment']->value['total_useful'],$_smarty_tpl->tpl_vars['comment']->value['total_advice']),'mod'=>'tdproductcomments'),$_smarty_tpl ) );?>

                                        </li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                                        <?php if (!$_smarty_tpl->tpl_vars['comment']->value['customer_advice'] && $_smarty_tpl->tpl_vars['commentUsefull']->value) {?>
                                            <li>
                                                <div class="comment_helpful">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Was this comment useful to you?','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>

                                                    <button class="usefulness_btn btn btn-default usefull" data-is-usefull="1" data-id-product-comment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['id_product_comment'], ENT_QUOTES, 'UTF-8');?>
">
                                                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</span>
                                                    </button>
                                                    <button class="usefulness_btn btn btn-default notusefull" data-is-usefull="0" data-id-product-comment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['id_product_comment'], ENT_QUOTES, 'UTF-8');?>
">
                                                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</span>
                                                    </button>
                                                </div>
                                            </li>
                                        <?php }?>
                                        <?php if (!$_smarty_tpl->tpl_vars['comment']->value['customer_report'] && $_smarty_tpl->tpl_vars['commentReport']->value) {?>
                                            <li>
                                                <span class="report_btn" data-id-product-comment="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['id_product_comment'], ENT_QUOTES, 'UTF-8');?>
">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Report abuse','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>

                                                </span>
                                            </li>
                                        <?php }?>
                                    <?php }?>
                                </ul>
                            </div><!-- .comment_details -->
                        </div>
                    </div> <!-- .comment -->
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <?php if ((!$_smarty_tpl->tpl_vars['too_early']->value && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
                <div class="align_center">
                    <a id="new_comment_tab_btn" class="btn btn-primary open-comment-form" href="javascript:void(0);">
                        <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Be the first to write your review!','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</span>
                    </a>
                </div>
            <?php } else { ?>
                <div class="align_center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No customer reviews for the moment.','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</div>
            <?php }?>
        <?php }?>
    </div> <!-- #product_comments_block_tab -->
</div>
<?php }
}
