<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:24:58
  from 'C:\xampp\htdocs\mitienda\modules\welcome\views\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec2384a11abf8_92220287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '470c2f5da0380a788577caf5c56585e6b1be671a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\welcome\\views\\content.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec2384a11abf8_92220287 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>

<div class="onboarding-advancement" style="display: none">
  <div class="advancement-groups">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['steps']->value['groups'], 'group', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['group']->value) {
?>
      <div class="group group-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" style="width: <?php echo smarty_function_math(array('equation'=>"(x / y) * 100",'x'=>count($_smarty_tpl->tpl_vars['group']->value['steps']),'y'=>$_smarty_tpl->tpl_vars['totalSteps']->value),$_smarty_tpl);?>
%;">
        <div class="advancement" style="width: <?php echo $_smarty_tpl->tpl_vars['percent_real']->value;?>
%;"></div>
        <div class="id"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</div>
      </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
  <div class="col-md-8">
    <h4 class="group-title"></h4>
    <div class="step-title step-title-1"></div>
    <div class="step-title step-title-2"></div>
  </div>
  <button class="btn btn-primary onboarding-button-next"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Continue','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</button>
  <a class="onboarding-button-shut-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Skip this tutorial','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</a>
</div>

<?php echo '<script'; ?>
 type="text/javascript">

  var onBoarding;

  $(function(){
    onBoarding = new OnBoarding(<?php echo $_smarty_tpl->tpl_vars['currentStep']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['jsonSteps']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['isShutDown']->value;?>
, "<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
", baseAdminDir);

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['templates']->value, 'template');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
?>
      onBoarding.addTemplate('<?php echo $_smarty_tpl->tpl_vars['template']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['template']->value['content'];?>
');
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    onBoarding.showCurrentStep();

    var body = $("body");

    body.delegate(".onboarding-button-next", "click", function(){
      if ($(this).is('.with-spinner')) {
        if (!$(this).is('.animated')) {
          $(this).addClass('animated');
          onBoarding.gotoNextStep();
        }
      } else {
        onBoarding.gotoNextStep();
      }
    }).delegate(".onboarding-button-shut-down", "click", function(){
      onBoarding.setShutDown(true);
    }).delegate(".onboarding-button-resume", "click", function(){
      onBoarding.setShutDown(false);
    }).delegate(".onboarding-button-goto-current", "click", function(){
      onBoarding.gotoLastSavePoint();
    }).delegate(".onboarding-button-stop", "click", function(){
      onBoarding.stop();
    });

  });

<?php echo '</script'; ?>
>
<?php }
}
