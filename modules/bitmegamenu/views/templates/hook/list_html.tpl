{**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
<div class="panel"><h3><i class="icon-list-ul"></i> {l s='Custom htmls' mod='bitmegamenu'}
	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="{$link->getAdminLink('AdminModules')}&configure=bitmegamenu&addCustomHtml=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div id="tabsContent">
		<div id="tabs{$menu_type}">
			{foreach from=$tabs item=tab}
				<div id="tabs_{$tab.id_html}" class="panel" style="padding: 10px 10px 0px 10px;">
					<div class="row">
						<div class="col-lg-1">
							<span><i class="icon-arrows "></i></span>
						</div>
						<div class="col-md-11">
							<h4 class="pull-left">#{$tab.id_html} - {$tab.title}</h4>
							<div class="btn-group-action pull-right">

								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')}&configure=bitmegamenu&id_html={$tab.id_html}">
									<i class="icon-edit"></i>
									{l s='Edit' mod='bitmegamenu'}
								</a>
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')}&configure=bitmegamenu&delete_id_html={$tab.id_html}">
									<i class="icon-trash"></i>
									{l s='Delete' mod='bitmegamenu'}
								</a>
							</div>
						</div>
					</div>
				</div>
			{/foreach}
		</div>
	</div>
</div>
