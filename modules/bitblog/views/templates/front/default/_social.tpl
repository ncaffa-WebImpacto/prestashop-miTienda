{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

		<div class="social-wrap">
			<div class="social-heading"> <b>{l s='Like This' mod='bitblog'}</b> </div>
			{if $config->get('social_code','')}
				{$config->get('social_code','')|escape:'html':'UTF-8'}
			{else}
			<!-- Twitter Button -->
			<div class="itemTwitterButton">
				<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" >
					{l s='Twitter' mod='bitblog'}
				</a>
				<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
			</div>


			<!-- Facebook Button -->
			<div class="itemFacebookButton">
				<div id="fb-root"></div>
				<script type="text/javascript">
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-like" data-send="false" data-width="200" data-show-faces="true"></div>
			</div>

			{/if}
		</div>
