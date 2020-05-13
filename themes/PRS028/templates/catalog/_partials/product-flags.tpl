    <ul class="product-flags">
        {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type}{if $flag.type == "discount"} d--none{/if}">{$flag.label}</li>
        {/foreach}
    </ul>
