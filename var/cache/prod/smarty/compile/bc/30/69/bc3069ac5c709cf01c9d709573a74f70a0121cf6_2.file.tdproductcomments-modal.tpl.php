<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:57
  from 'C:\xampp\htdocs\mitienda\modules\tdproductcomments\views\templates\hook\tdproductcomments-modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce92c7433_10423781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc3069ac5c709cf01c9d709573a74f70a0121cf6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductcomments\\views\\templates\\hook\\tdproductcomments-modal.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce92c7433_10423781 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="tdcomment-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write a review','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>

                </h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php if (isset($_smarty_tpl->tpl_vars['comment_product']->value) && $_smarty_tpl->tpl_vars['comment_product']->value) {?>
                        <div class="product clearfix col-12 col-sm-6">
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productcomment_cover_image']->value, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment_product']->value->name,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
                            <div class="product_desc">
                                <p class="product_name">
                                    <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment_product']->value->name, ENT_QUOTES, 'UTF-8');?>
</strong>
                                </p>
                                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment_product']->value->description_short,'html','UTF-8' ));?>

                            </div>
                        </div>
                    <?php }?>
                    <div class="new_comment_form_content col-12 col-sm-6">
                        <form id="id_new_comment_form" action="#">
                            <?php if (count($_smarty_tpl->tpl_vars['criterions']->value) > 0) {?>
                                <ul id="criterions_list">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['criterions']->value, 'criterion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['criterion']->value) {
?>
                                        <li>
                                            <label><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
:</label>
                                            <div class="star_content">
                                                <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="1" />
                                                <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="2" />
                                                <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="3" />
                                                <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="4" />
                                                <input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(round($_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion']), ENT_QUOTES, 'UTF-8');?>
]" value="5" checked="checked" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            <?php }?>
                            <div class="form-group">
                                <label class="form-control-label" for="comment_title">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title:','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
 <sup class="required">*</sup>
                                </label>
                                <input class="form-control" id="comment_title" name="title" type="text" value=""/>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="content">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Comment:','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
 <sup class="required">*</sup>
                                </label>
                                <textarea class="form-control" id="commentContent" name="content" type="text"></textarea>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['allow_guests']->value == true && !$_smarty_tpl->tpl_vars['logged']->value) {?>
                                <div class="form-group">
                                    <label class="form-control-label" for="customer_name">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your name:','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
 <sup class="required">*</sup>
                                    </label>
                                    <input class="form-control" id="commentCustomerName" name="customer_name" type="text" value=""/>
                                </div>
                            <?php }?>
                            <div class="form-group">
                                <label class="form-control-label">
                                    <sup class="required">*</sup> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Required fields','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>

                                </label>
                                <input id="id_product_comment_send" name="id_product" type="hidden" value='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_product_comment_form']->value, ENT_QUOTES, 'UTF-8');?>
' />
                            </div>
                        </form>
                        <div id="new_comment_form_error" class="error" style="display: none; padding: 15px 0px">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</button>
                <button id="submitNewMessage" name="submitMessage" type="submit" class="btn btn-primary">
                    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Submit','mod'=>'tdproductcomments'),$_smarty_tpl ) );?>
</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php }
}
