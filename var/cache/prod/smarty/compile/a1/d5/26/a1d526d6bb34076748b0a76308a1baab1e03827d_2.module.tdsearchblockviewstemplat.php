<?php
/* Smarty version 3.1.33, created on 2020-05-15 14:36:54
  from 'module:tdsearchblockviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebe8ce6daa863_32188621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1d526d6bb34076748b0a76308a1baab1e03827d' => 
    array (
      0 => 'module:tdsearchblockviewstemplat',
      1 => 1589401689,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebe8ce6daa863_32188621 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="_desktop_search" class="searchwrap">
    <div class="tdsearchblock clearfix">
        <div id="search_block_top">
            <form method="get" action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_controller_url']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" id="searchbox">
                <input name="controller" value="search" type="hidden">
                <input name="orderby" value="position" type="hidden">
                <input name="orderway" value="desc" type="hidden">
                <?php if (isset($_smarty_tpl->tpl_vars['searchCategoryList']->value) && $_smarty_tpl->tpl_vars['searchCategoryList']->value) {?>
                    <div class="searchboxform-control">
                        <select name="search_category" id="search_category" onclick="event.stopPropagation();">
                            <option value="all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All Categories','mod'=>'tdsearchblock'),$_smarty_tpl ) );?>
</option>
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_category']->value,'quotes','UTF-8' ));?>

                        </select>
                    </div>
                <?php }?>
                <button type="submit" name="submit_search" class="btn btn-primary button-search">
                                        <i class="icofont-search-1"></i>
                </button>
                <div class="input-wrapper">
                    <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search Products Here','mod'=>'tdsearchblock'),$_smarty_tpl ) );?>
" value="<?php echo htmlspecialchars(stripslashes(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['search_query']->value,'htmlall','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" autocomplete="off" />
                </div>
                <div id="td_ajax_search_url" style="display:none">
                    <input type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/ajax_search.php" class="ajaxUrl" />
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
