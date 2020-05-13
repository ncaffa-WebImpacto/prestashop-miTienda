{*
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*}

{if isset($isThreeSixtyContent) && $isThreeSixtyContent}
    <div class="product-threesixty">
        <a class="pro_360" href="#threesixty-img-container-{$product.id}">
            <svg width="30px" height="30px" fill="currentcolor">
                <use xlink:href="#360deg"></use>
            </svg>
        </a>
    </div>
            
    <div id="threesixty-img-container-{$product.id}" class="threesixty-img-container mfp-hide">
        <div class='threesixty' data-images="{$threeSixtyContent}" data-frames="{$frames_count}">
            <ul class="threesixty_images">
            </ul>
            <div class="spinner">
                <span>0%</span>
            </div>
        </div>
    </div>
{/if}






