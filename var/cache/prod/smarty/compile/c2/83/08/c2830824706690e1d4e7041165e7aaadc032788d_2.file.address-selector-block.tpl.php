<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:17:28
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\address-selector-block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d98bbcdd3_62638396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2830824706690e1d4e7041165e7aaadc032788d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\address-selector-block.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d98bbcdd3_62638396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3223352275ebc1d98ba3a74_34514190', 'address_selector_blocks');
?>

<?php }
/* {block 'address_selector_blocks'} */
class Block_3223352275ebc1d98ba3a74_34514190 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'address_selector_blocks' => 
  array (
    0 => 'Block_3223352275ebc1d98ba3a74_34514190',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['addresses']->value, 'address');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['address']->value) {
?>
    <article
      class="address-item col-12 col-md-6 col-lg-4 mb-3<?php if ($_smarty_tpl->tpl_vars['address']->value['id'] == $_smarty_tpl->tpl_vars['selected']->value) {?> selected<?php }?>"
      id="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classname' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value )), ENT_QUOTES, 'UTF-8');?>
-address-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
    >
      <label for="r-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classname' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value )), ENT_QUOTES, 'UTF-8');?>
-address-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="card mb-0">
        <div class="card-header">
          <div class="custom-control custom-radio">
            <input
                    type="radio"
                    name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
"
                    value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
                    id="r-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classname' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value )), ENT_QUOTES, 'UTF-8');?>
-address-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
                    class="custom-control-input"
                    <?php if ($_smarty_tpl->tpl_vars['address']->value['id'] == $_smarty_tpl->tpl_vars['selected']->value) {?>checked<?php }?>
            >
            <span class="custom-control-label d-inline-block font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['alias'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>

        </div>
      <div class="card-body small">
          <?php echo $_smarty_tpl->tpl_vars['address']->value['formatted'];?>

      </div>
          <?php if ($_smarty_tpl->tpl_vars['interactive']->value) {?>
        <div class="card-footer small">

        <a
                    class="edit-address text-muted mr-2"
                    data-link-action="edit-address"
                    href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'order','params'=>array('id_address'=>$_smarty_tpl->tpl_vars['address']->value['id'],'editAddress'=>$_smarty_tpl->tpl_vars['type']->value,'token'=>$_smarty_tpl->tpl_vars['token']->value)),$_smarty_tpl ) );?>
"
            >
              <i class="material-icons edit mr-1">&#xE254;</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

            </a>
            <a
                    class="delete-address text-muted"
                    data-link-action="delete-address"
                    href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'order','params'=>array('id_address'=>$_smarty_tpl->tpl_vars['address']->value['id'],'deleteAddress'=>true,'token'=>$_smarty_tpl->tpl_vars['token']->value)),$_smarty_tpl ) );?>
"
            >
              <i class="material-icons delete mr-1">&#xE872;</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

            </a>
        </div>

          <?php }?>

      </label>
    </article>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php if ($_smarty_tpl->tpl_vars['interactive']->value) {?>
    <p>
      <button class="ps-hidden-by-js form-control-submit center-block" type="submit"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</button>
    </p>
  <?php }
}
}
/* {/block 'address_selector_blocks'} */
}
