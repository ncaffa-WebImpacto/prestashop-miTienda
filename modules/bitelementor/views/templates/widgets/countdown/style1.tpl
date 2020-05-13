{* <div class="product-container">
    <div class="thumbnail-container col-12 col-md-6 col-lg-6">
        <div class ="thumbnail-inner">
            {block name='product_thumbnail'}
                {include file='catalog/_partials/miniatures/_partials/product-miniature-thumb.tpl'}
            {/block}
        </div>
    </div>

    <div class="product-description col-12 col-md-6 col-lg-6">
        {block name='product_name'}
            {include file='catalog/_partials/miniatures/_partials/product-miniature-name.tpl'}
        {/block}

        {block name='product_price_and_shipping'}
            {include file='catalog/_partials/miniatures/_partials/product-miniature-price.tpl'}
        {/block}

        {block name='product_description_short'}
            <div class="product-description">
                {$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}
            </div>
        {/block}

        {block name='product_reviews'}
            {hook h='displayProductListReviews' product=$product}
        {/block}
    </div>
</div> *}
{include file="catalog/_partials/miniatures/product.tpl" product=$product elementor=true}