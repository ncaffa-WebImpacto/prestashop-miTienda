<?php
/* Smarty version 3.1.33, created on 2020-05-15 11:43:15
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\_partials\contact-info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe6433996ef4_87100075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f95d20d28d6140083494e5d08813bfbdac4908c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\_partials\\contact-info.tpl',
      1 => 1589401702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe6433996ef4_87100075 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="conatctstoreinfo col-12 col-lg-3">
  <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_title']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_title']) {?>
    <p class="title_block hidden-md-down"><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_title'];?>
</p>
    <a href="#contact_store_info" class="hidden-lg-up title_block" data-toggle="collapse"><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_title'];?>
</a>
  <?php }?>
  <div id="contact_store_info" class="collapse show" data-collapse-hide-mobile>
    <div class="block_content">
      <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_img']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_img']) {?>
        <div class="storeinfo_img">
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_img'], ENT_QUOTES, 'UTF-8');?>
" class="img-fluid" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Footer Logo','d'=>'Shop.ThemeDelights'),$_smarty_tpl ) );?>
"/>
          </a>
        </div>
      <?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_desc']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_desc']) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_desc'];?>
</p>
      <?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_add']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_add']) {?>
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdaddress mr-3"><i class="material-icons">&#xE55F;</i></div>
            <div class="data tdaddress rte-content"><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_add'];?>
</div>
        </div> 
      <?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_no']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_no']) {?>
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdphone mr-3"><i class="material-icons">&#xE0CD;</i></div>
            <div class="data tdphone"><a href="tel:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_no'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_no'];?>
</a></div>
        </div> 
      <?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_fno']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_fno']) {?>
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdfax mr-3"><i class="material-icons">&#xE0DF;</i></div>
            <div class="data tdfax"><a href="tel:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_fno'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_fno'];?>
</a></div>
        </div> 
      <?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_email']) && $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_email']) {?>
        <div class= "block d-inline-flex align-items-start justify-content-center">
            <div class="icon tdemail mr-3"><i class="material-icons">&#xE158;</i></div>
            <div class="data tdemail"><a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_email'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['themeOpt']->value['cinfo_email'];?>
</a></div>
        </div> 
      <?php }?>
    </div>
  </div>
</div><?php }
}
