<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\breadcrumb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cca0b2a70_80587821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa72ae00e0013fddacf9e840551762eb3eb9e994' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\breadcrumb.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cca0b2a70_80587821 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['bc_width'] == 'inherit') {?><div class="container"><?php }?>
<nav data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="breadcrumb <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['themeOpt']->value['bc_align'], ENT_QUOTES, 'UTF-8');?>
">
  <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['bc_width'] == 'fullwidth') {?>
    <div class="container-fluid">
  <?php } elseif ($_smarty_tpl->tpl_vars['themeOpt']->value['bc_width'] == 'fullwidth-bg') {?>
    <div class="container">
  <?php }?>
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1457808105ebc1cca0ae792_43890719', 'breadcrumb');
?>

  </ol>
  <?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['bc_width'] == 'fullwidth' || $_smarty_tpl->tpl_vars['themeOpt']->value['bc_width'] == 'fullwidth-bg') {?>
    </div>
  <?php }?>
</nav>
<?php if ($_smarty_tpl->tpl_vars['themeOpt']->value['bc_width'] == 'inherit') {?></div><?php }
}
/* {block 'breadcrumb_item'} */
class Block_3058161795ebc1cca0af6b9_30945632 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
              <span itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
            </a>
            <meta itemprop="position" content="<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration'] : null), ENT_QUOTES, 'UTF-8');?>
">
          </li>
        <?php
}
}
/* {/block 'breadcrumb_item'} */
/* {block 'breadcrumb'} */
class Block_1457808105ebc1cca0ae792_43890719 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'breadcrumb' => 
  array (
    0 => 'Block_1457808105ebc1cca0ae792_43890719',
  ),
  'breadcrumb_item' => 
  array (
    0 => 'Block_3058161795ebc1cca0af6b9_30945632',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumb']->value['links'], 'path', false, NULL, 'breadcrumb', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration']++;
?>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3058161795ebc1cca0af6b9_30945632', 'breadcrumb_item', $this->tplIndex);
?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
}
/* {/block 'breadcrumb'} */
}
