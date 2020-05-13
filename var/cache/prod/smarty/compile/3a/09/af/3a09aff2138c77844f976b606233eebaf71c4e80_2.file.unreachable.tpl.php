<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:15:02
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\checkout\_partials\steps\unreachable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1d0686d420_67749575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a09aff2138c77844f976b606233eebaf71c4e80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\checkout\\_partials\\steps\\unreachable.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1d0686d420_67749575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9743660695ebc1d0686c583_17341460', 'step');
?>

<?php }
/* {block 'step'} */
class Block_9743660695ebc1d0686c583_17341460 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'step' => 
  array (
    0 => 'Block_9743660695ebc1d0686c583_17341460',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section class="checkout-step -unreachable card" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8');?>
">
    <div class="card-header">
    <h1 class="step-title h3">
      <span class="step-number p-2"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['position']->value, ENT_QUOTES, 'UTF-8');?>
</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

    </h1>
    </div>
  </section>
<?php
}
}
/* {/block 'step'} */
}
