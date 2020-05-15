<?php
/* Smarty version 3.1.33, created on 2020-05-15 08:57:33
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\catalog\_partials\product-customization.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe3d5d97f489_41997863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1e7f1954d368c853c2f248450312cefd603f49c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\catalog\\_partials\\product-customization.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe3d5d97f489_41997863 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<section class="product-customization mt-4">
    <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
        <p class="h4 card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</p>
        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Don\'t forget to save your customization to be able to add to cart','d'=>'Shop.Forms.Help'),$_smarty_tpl ) );?>
</p>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11468433465ebe3d5d974142_53801016', 'product_customization_form');
?>

    <?php }?>
</section>
<?php }
/* {block 'product_customization_form'} */
class Block_11468433465ebe3d5d974142_53801016 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_customization_form' => 
  array (
    0 => 'Block_11468433465ebe3d5d974142_53801016',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data"
                    novalidate autocomplete="false">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customizations']->value['fields'], 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                    <div class="form-group">
                    <label for="field-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_customization_field'], ENT_QUOTES, 'UTF-8');?>
" class="mb-2"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->tpl_vars['field']->value['required']) {?><small class="text-muted"> (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Optional','d'=>'Shop.Forms.Labels'),$_smarty_tpl ) );?>
)</small><?php }?></label>
                    <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'text') {?>
                        <textarea placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your message here','d'=>'Shop.Forms.Help'),$_smarty_tpl ) );?>
"
                                    class="product-message form-control"
                                    maxlength="250" <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required <?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['input_name'], ENT_QUOTES, 'UTF-8');?>
"
                                    id="field-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_customization_field'], ENT_QUOTES, 'UTF-8');?>
"></textarea>
                        <div class="invalid-feedback js-invalid-feedback-browser"></div>

                        <small class="form-text text-muted pull-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'250 char. max','d'=>'Shop.Forms.Help'),$_smarty_tpl ) );?>
</small>
                        <?php if ($_smarty_tpl->tpl_vars['field']->value['text'] !== '') {?>
                            <strong class="customization-message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your customization:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>

                                <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['text'], ENT_QUOTES, 'UTF-8');?>
</label>
                            </strong>
                        <?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'image') {?>
                        <?php if ($_smarty_tpl->tpl_vars['field']->value['is_customized']) {?>
                            <div class="my-2">
                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['image']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" class="border">
                                <a class="remove-image btn btn-sm btn-outline-danger"
                                    href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['remove_image_url'], ENT_QUOTES, 'UTF-8');?>
"
                                    rel="nofollow"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove Image','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</a>
                            </div>
                        <?php }?>
                        <div class="custom-file">
                            <input class="custom-file-input" <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required <?php }?> type="file"
                                    name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['input_name'], ENT_QUOTES, 'UTF-8');?>
" id="field-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_customization_field'], ENT_QUOTES, 'UTF-8');?>
">
                            <label class="custom-file-label"
                                    for="field-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_customization_field'], ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose file','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</label>
                            <div class="invalid-feedback js-invalid-feedback-browser"></div>

                        </div>
                        <small class="form-text text-muted pull-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'.png .jpg .gif','d'=>'Shop.Forms.Help'),$_smarty_tpl ) );?>
</small>

                    <?php }?>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <button class="btn btn-primary" type="submit" name="submitCustomizedData"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save Customization','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</button>
            </form>
        <?php
}
}
/* {/block 'product_customization_form'} */
}
