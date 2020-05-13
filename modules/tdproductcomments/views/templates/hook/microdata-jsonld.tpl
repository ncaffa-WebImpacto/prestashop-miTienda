{if isset($nbComments) && $nbComments && $ratings.avg}"aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "{$ratings.avg|escape:'html':'UTF-8'}",
    "bestRating": "5",
    "reviewCount": "{$nbComments|escape:'html':'UTF-8'}"
},{/if}
{if isset($comments) && $comments}
"review":[{foreach from=$comments item=comment}{
    "@type":"Review",
    "name":"{$comment.title nofilter}",
    "reviewBody":"{$comment.content|escape:'html':'UTF-8'|nl2br nofilter}",
    "datePublished":"{$comment.date_add|escape:'html':'UTF-8'|substr:0:10}",
    "reviewRating":{
        "@type":"Rating",
        "ratingValue":"{$comment.grade|escape:'html':'UTF-8'}"
    },
    "author":{
        "@type":"Person",
        "name":"{$comment.customer_name|escape:'html':'UTF-8'}"
    }
}{if !$comment@last},{/if}{/foreach}],{/if}