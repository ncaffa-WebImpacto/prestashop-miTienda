{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}
{if isset($previous) || isset($next)}
    <div id="productsnav">
        {if isset($previous)}
            <a href="{url entity='product' id=$previous->id id_lang=$id_lang}">
                <i class="material-icons">chevron_left</i>
                <div class="product-short-image">
                    <div class="image-thumb">
                        <img class="img-responsive"  src="{$link->getImageLink($previous->link_rewrite, $previousImage, 'small_default')|escape:'html':'UTF-8'}" itemprop="image" />
                    </div>
                    <div class="product-short-description">
                        {$previous->name}
                    </div>
                </div>
            </a>
        {/if}
        {if isset($next)}
            <a href="{url entity='product' id=$next->id id_lang=$id_lang}">
                <i class="material-icons">chevron_right</i>
                <div class="product-short-image">
                    <div class="image-thumb">
                        <img class="img-responsive"  src="{$link->getImageLink($next->link_rewrite, $nextImage, 'small_default')|escape:'html':'UTF-8'}" itemprop="image" />
                    </div>
                    <div class="product-short-description">
                        {$next->name}
                    </div>
                </div>
            </a>
        {/if}
    </div>
{/if}