<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:10
  from 'C:\xampp\htdocs\mitienda\modules\mimodulo\views\templates\hook\mimodulo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec238563d8de3_46830707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e975a372c3bca82b32fd0db299a9c58d123ca97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\mimodulo\\views\\templates\\hook\\mimodulo.tpl',
      1 => 1589786699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec238563d8de3_46830707 (Smarty_Internal_Template $_smarty_tpl) {
?>

 


  


           <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
                <div class="easyzoom">
                  <a href="javascript:void(0)" data-image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
">
                   <img
                       class="thumb js-thumb lazyload img-fluid"
                          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                          data-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
                          alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
                         title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
            
                    />
                  </a>
                </div>
         <?php }?>


             <p>Hola, soy nicolas estoy cogiendo los datos del producto "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"</p>
             <p>Su categoria es "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['category_name'], ENT_QUOTES, 'UTF-8');?>
"</p>
             <p>Su id_categoria es "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_category_default'], ENT_QUOTES, 'UTF-8');?>
"</p>

            
      


    
    
    
    
 



 
<?php }
}
