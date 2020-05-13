<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:00
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cc8349bd6_49984016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0982ab7ac875c6f79b0a42b00a4b66609a2a19fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\page.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cc8349bd6_49984016 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7160939215ebc1cc83423e0_02215983', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'pageWrapperClass'} */
class Block_5804815925ebc1cc8342847_56759119 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
page-wrapper <?php
}
}
/* {/block 'pageWrapperClass'} */
/* {block 'pageHeaderClass'} */
class Block_18911477255ebc1cc8343e44_20680029 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
page-header <?php
}
}
/* {/block 'pageHeaderClass'} */
/* {block 'page_title'} */
class Block_3360783395ebc1cc8343a97_57864497 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18911477255ebc1cc8343e44_20680029', 'pageHeaderClass', $this->tplIndex);
?>
page-header--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
">
          <h1 class="page-maintitle"><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_11873083675ebc1cc8343583_07006881 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3360783395ebc1cc8343a97_57864497', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'pageContentClass'} */
class Block_7849327525ebc1cc8346904_45731390 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
page-content <?php
}
}
/* {/block 'pageContentClass'} */
/* {block 'page_content_top'} */
class Block_7264455445ebc1cc8347409_75640595 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_9852233495ebc1cc83479a7_19301584 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_2091056395ebc1cc8346504_30770070 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7849327525ebc1cc8346904_45731390', 'pageContentClass', $this->tplIndex);
?>
page-content--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7264455445ebc1cc8347409_75640595', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9852233495ebc1cc83479a7_19301584', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'pageFooterClass'} */
class Block_1394622345ebc1cc83485b7_70533170 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
page-footer <?php
}
}
/* {/block 'pageFooterClass'} */
/* {block 'page_footer'} */
class Block_6733020465ebc1cc83490b4_01086198 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_21320530805ebc1cc8348207_61254704 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1394622345ebc1cc83485b7_70533170', 'pageFooterClass', $this->tplIndex);
?>
page-footer--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6733020465ebc1cc83490b4_01086198', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_7160939215ebc1cc83423e0_02215983 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7160939215ebc1cc83423e0_02215983',
  ),
  'pageWrapperClass' => 
  array (
    0 => 'Block_5804815925ebc1cc8342847_56759119',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_11873083675ebc1cc8343583_07006881',
  ),
  'page_title' => 
  array (
    0 => 'Block_3360783395ebc1cc8343a97_57864497',
  ),
  'pageHeaderClass' => 
  array (
    0 => 'Block_18911477255ebc1cc8343e44_20680029',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_2091056395ebc1cc8346504_30770070',
  ),
  'pageContentClass' => 
  array (
    0 => 'Block_7849327525ebc1cc8346904_45731390',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_7264455445ebc1cc8347409_75640595',
  ),
  'page_content' => 
  array (
    0 => 'Block_9852233495ebc1cc83479a7_19301584',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_21320530805ebc1cc8348207_61254704',
  ),
  'pageFooterClass' => 
  array (
    0 => 'Block_1394622345ebc1cc83485b7_70533170',
  ),
  'page_footer' => 
  array (
    0 => 'Block_6733020465ebc1cc83490b4_01086198',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section id="main" class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5804815925ebc1cc8342847_56759119', 'pageWrapperClass', $this->tplIndex);
?>
page-wrapper--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11873083675ebc1cc8343583_07006881', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2091056395ebc1cc8346504_30770070', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21320530805ebc1cc8348207_61254704', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
