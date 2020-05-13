{**
*  @author    BIT Themes
*  @copyright 2015-2019 BIT Themes. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if isset($errors) && count($errors) && current($errors) != ''}

	<div class="bootstrap">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		{if count($errors) == 1}
			{reset($errors)}
		{else }
			{l s='%d errors' sprintf=[$errors|count] mod='bitblog'}
			<br/>
			<ol>
				{foreach $errors as $error}
					<li>{$error}</li>
				{/foreach}
			</ol>
		{/if}
		</div>
	</div>
{/if}
