<?php
/* Smarty version 3.1.33, created on 2020-05-18 09:25:07
  from 'C:\xampp\htdocs\mitienda\modules\tdproductcomments\views\templates\hook\microdata-jsonld.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec23853e82db7_77371750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a426a205b5da61d3e0eb86d7bbc3658c4a8ea79a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\modules\\tdproductcomments\\views\\templates\\hook\\microdata-jsonld.tpl',
      1 => 1589401689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec23853e82db7_77371750 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['nbComments']->value) && $_smarty_tpl->tpl_vars['nbComments']->value && $_smarty_tpl->tpl_vars['ratings']->value['avg']) {?>"aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ratings']->value['avg'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
    "bestRating": "5",
    "reviewCount": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['nbComments']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
},<?php }
if (isset($_smarty_tpl->tpl_vars['comments']->value) && $_smarty_tpl->tpl_vars['comments']->value) {?>
"review":[<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment', true);
$_smarty_tpl->tpl_vars['comment']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->iteration++;
$_smarty_tpl->tpl_vars['comment']->last = $_smarty_tpl->tpl_vars['comment']->iteration === $_smarty_tpl->tpl_vars['comment']->total;
$__foreach_comment_13_saved = $_smarty_tpl->tpl_vars['comment'];
?>{
    "@type":"Review",
    "name":"<?php echo $_smarty_tpl->tpl_vars['comment']->value['title'];?>
",
    "reviewBody":"<?php echo nl2br(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['content'],'html','UTF-8' )));?>
",
    "datePublished":"<?php echo htmlspecialchars(substr(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['date_add'],'html','UTF-8' )),0,10), ENT_QUOTES, 'UTF-8');?>
",
    "reviewRating":{
        "@type":"Rating",
        "ratingValue":"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['grade'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
    },
    "author":{
        "@type":"Person",
        "name":"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['customer_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
    }
}<?php if (!$_smarty_tpl->tpl_vars['comment']->last) {?>,<?php }
$_smarty_tpl->tpl_vars['comment'] = $__foreach_comment_13_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],<?php }
}
}
