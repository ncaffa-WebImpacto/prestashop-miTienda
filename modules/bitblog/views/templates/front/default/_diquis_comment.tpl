{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

<div id="disqus_thread"></div>
<script type="text/javascript">
var disqus_shortname = '{$config->get('item_diquis_account','')|escape:'html':'UTF-8'}';
var disqus_url = '{$blog_link|escape:'html':'UTF-8'}';
(function() {
	var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
})();
</script>
<noscript>{l s='Please enable JavaScript to view the.' mod='bitblog'} <a href="http://disqus.com/?ref_noscript">{l s='Comments powered by Disqus.' mod='bitblog'}.</a></noscript>
