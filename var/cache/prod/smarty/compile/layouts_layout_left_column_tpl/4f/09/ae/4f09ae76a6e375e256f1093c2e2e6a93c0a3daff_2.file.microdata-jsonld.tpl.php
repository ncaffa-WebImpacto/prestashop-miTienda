<?php
/* Smarty version 3.1.33, created on 2020-05-13 18:14:08
  from 'C:\xampp\htdocs\mitienda\themes\PRS028\templates\_partials\microdata-jsonld.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebc1cd0c4f1d7_40336993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f09ae76a6e375e256f1093c2e2e6a93c0a3daff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mitienda\\themes\\PRS028\\templates\\_partials\\microdata-jsonld.tpl',
      1 => 1589356898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebc1cd0c4f1d7_40336993 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\mitienda\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
"/>
<meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
"/>
<meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"/>
<?php if (isset($_smarty_tpl->tpl_vars['product']->value) && $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'product') {?>
    <?php if (count($_smarty_tpl->tpl_vars['product']->value['images']) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'p_img', false, NULL, 'p_img_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p_img']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['total'];
?>
            <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_img']->value['large']['url'], ENT_QUOTES, 'UTF-8');?>
"/>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }
} else { ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['shop_domain_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
"/>
<?php }
echo '<script'; ?>
 type="application/ld+json">
{
    "@context" : "http://schema.org",
    "@type" : "Organization",
    "name" : "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
",
    "url" : "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
",
    "logo" : {
        "@type":"ImageObject",
        "url":"<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['shop_domain_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
"
    }
}
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="application/ld+json">
{
    "@context":"http://schema.org",
    "@type":"WebPage",
    "isPartOf": {
        "@type":"WebSite",
        "url":  "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
",
        "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
    },
    "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
",
    "url":  "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
"
}
<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'index') {
echo '<script'; ?>
 type="application/ld+json">
{
	"@context":	"http://schema.org",
    "@type": "WebSite",
    "url" : "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
",
    "image": {
        "@type": "ImageObject",
        "url":"<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['shop_domain_url'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
"
    },
    "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo htmlspecialchars(str_replace('--search_term_string--','{search_term_string}',$_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,null,array('search_query'=>'--search_term_string--'))), ENT_QUOTES, 'UTF-8');?>
",
        "query-input": "required name=search_term_string"
    }
}
<?php echo '</script'; ?>
>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['product']->value) && $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'product') {
echo '<script'; ?>
 type="application/ld+json">
{
    "@context": "http://schema.org/",
    "@type": "Product",
    "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
",
    "description": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
",
    "category": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['category_name'], ENT_QUOTES, 'UTF-8');?>
",
    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['cover'])) {?>"image" :"<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
",<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?>"mpn": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
",<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['product_manufacturer']->value->name) {?>"brand": {
        "@type": "Thing",
        "name": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product_manufacturer']->value->name,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
    },<?php }?>
    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'displayCommentMeta', null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayCommentMeta'),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
    <?php if ($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayCommentMeta')) {?>
      <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'displayCommentMeta');?>

    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['weight']) && ($_smarty_tpl->tpl_vars['product']->value['weight'] != 0)) {?>
        "weight": {
        "@context": "https://schema.org",
        "@type": "QuantitativeValue",
        "value": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['weight'], ENT_QUOTES, 'UTF-8');?>
",
        "unitCode": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['weight_unit'], ENT_QUOTES, 'UTF-8');?>
"
    },<?php }?>
      <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
    "offers": {
        "@type": "Offer",
        "priceCurrency": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
",
        "name": "<?php echo htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['product']->value['name']), ENT_QUOTES, 'UTF-8');?>
",
        "price": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price_amount'], ENT_QUOTES, 'UTF-8');?>
",
        "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
",
        "priceValidUntil": "<?php echo htmlspecialchars(smarty_modifier_date_format(time()+(60*60*24*15),"%Y-%m-%d"), ENT_QUOTES, 'UTF-8');?>
",
        <?php if (count($_smarty_tpl->tpl_vars['product']->value['images']) > 0) {?>
        "image": [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'p_img', false, NULL, 'p_img_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p_img']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['total'];
?>"<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_img']->value['large']['url'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_p_img_list']->value['last'] : null)) {?>,<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['ean13']) {?>
            "gtin13": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['ean13'], ENT_QUOTES, 'UTF-8');?>
",
        <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['upc']) {?>
            "gtin13": "0<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['upc'], ENT_QUOTES, 'UTF-8');?>
",
        <?php }?>
        "sku": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
",
        <?php if ($_smarty_tpl->tpl_vars['product']->value['condition'] == 'new') {?>"itemCondition": "http://schema.org/NewCondition",<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_condition'] > 0) {?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['condition'] == 'used') {?>"itemCondition": "http://schema.org/UsedCondition",<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['condition'] == 'refurbished') {?>"itemCondition": "http://schema.org/RefurbishedCondition",<?php }?>
        <?php }?>
        "availability":<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity'] > 0 || $_smarty_tpl->tpl_vars['product']->value['allow_oosp'] > 0) {?> "http://schema.org/InStock"<?php } else { ?> "http://schema.org/OutOfStock"<?php }?>,
        "seller": {
            "@type": "Organization",
            "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
        }
    }
    <?php }?>
}
<?php echo '</script'; ?>
>
<?php }
}
}
