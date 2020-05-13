{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div id="blog-localengine">
		<form class="form-horizontal" method="post" id="comment-form" action="{$blog_link|escape:'html':'UTF-8'}" onsubmit="return false;">

			<div class="form-group">
				<label class="col-lg-3 control-label" for="inputFullName">{l s='Full Name' mod='bitblog'}</label>
				<div class="col-lg-9">
					<input type="text" name="fullname" placeholder="{l s='Enter your full name' mod='bitblog'}" id="inputFullName" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label" for="inputEmail">{l s='Email' mod='bitblog'}</label>
				<div class="col-lg-9">
					<input type="text" name="email" placeholder="{l s='Enter your email' mod='bitblog'}" id="inputEmail" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label" for="inputComment">{l s='Comment' mod='bitblog'}</label>
				<div class="col-lg-9">
					<textarea type="text" name="comment" rows="6" placeholder="{l s='Enter your comment' mod='bitblog'}" id="inputComment" class="form-control"></textarea>
				</div>
			</div>
			 <div class="form-group">
			 	 <img src="{$captcha_image|escape:'html':'UTF-8'}" alt="" align="left"/>
				 <input class="form-control" type="text" name="captcha" value="" size="10" />
			 </div>
			 <input type="hidden" name="id_bitblog_blog" value="{$id_bitblog_blog|intval}">
			<div class="form-group">
				<div class="col-lg-12">
					<button class="btn btn-default btn-outline btn-submit-comment-wrapper" name="submitcomment" type="submit">
						<span class="btn-submit-comment">{l s='Submit' mod='bitblog'}</span>
					</button>
				</div>
			</div>
		</form>
</div>
