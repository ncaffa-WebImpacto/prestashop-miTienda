{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div id="blog-localengine">
	{if $config->get('item_show_listcomment','1') == 1}
		<h3 class="commenttitle">{l s='Comments' mod='bitblog'}</h3>

		{if isset($comments) && count($comments) > 0}
			<div class="comments clearfix">
				{foreach from=$comments item=comment name=comment} {$default=''}
				<div class="comment-item" id="comment{$comment.id_comment|escape:'html':'UTF-8'}">
					<div class="comment-image">
						<img src="http://www.gravatar.com/avatar/{md5(strtolower(trim($comment.email|escape:'html':'UTF-8')))}?d={urlencode($default|escape:'html':'UTF-8')}&s=60" align="left"/>
					</div>
					<div class="comment-wrap">
						<div class="comment-meta">
							<span class="comment-postedby">{$comment.user|escape:'html':'UTF-8'}</span>
							<span class="comment-infor">
								<span class="comment-created"><span> {strtotime($comment.date_add)|date_format:"%b %e, %Y"|escape:'html':'UTF-8'}</span></span>
							</span>
						</div>

						<div class="comment-content">
							{$comment.comment|nl2br nofilter}{* HTML form , no escape necessary *}
						</div>
					</div>
				</div>
				{/foreach}
				{if $blog_count_comment}
				<div class="top-pagination-content clearfix bottom-line">
					{include file="module:bitblog/views/templates/front/default/_pagination.tpl"}
				</div>
				{/if}
			</div>
		{else}
			<p class="alert alert-success">{l s='No comment at this time!' mod='bitblog'}</p>
		{/if}

	{/if}

		{if $config->get('item_show_formcomment','1') == 1}
			<div class="comment-form">
				<h3 class="title-comment">{l s='Leave your comment' mod='bitblog'}</h3>
				<form class="form-horizontal clearfix" method="post" id="comment-form" action="{$blog_link|escape:'html':'UTF-8'}" onsubmit="return false;">
					<div class="form-group row">
						<div class="col-lg-6">
							<input type="text" name="user" placeholder="{l s='Enter your full name' mod='bitblog'}" id="inputFullName" class="form-control">
						</div>
						<div class="col-lg-6 mt-3 mt-lg-0">
							<input type="text" name="email"  placeholder="{l  s='Enter your email' mod='bitblog'}" id="inputEmail" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-12">
							<textarea type="text" name="comment" rows="6"  placeholder="{l  s='Enter your comment' mod='bitblog'}" id="inputComment" class="form-control"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-12 ipts-captcha">
							<img src="{$captcha_image|escape:'html':'UTF-8'}" class="comment-capcha-image" align="left"/>
							<input class="form-control" type="text" placeholder="{l s='Enter the captcha' mod='bitblog'}" name="captcha" value="" size="10"  />
						</div>
					</div>

					<input type="hidden" name="id_bitblog_blog" value="{$id_bitblog_blog|intval}">
					<div class="form-group row">
						<div class="col-lg-12">
							<button class="btn btn-secondary btn-outline btn-submit-comment-wrapper" name="submitcomment" type="submit">
								<span class="btn-submit-comment">{l s='Submit' mod='bitblog'}</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		{/if}
</div>
