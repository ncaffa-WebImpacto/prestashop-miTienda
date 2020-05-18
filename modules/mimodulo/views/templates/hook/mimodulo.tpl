
{* 
<p>{l s='HELLO WORLD'}</p>
 <h1>{$texto_variable}</h1> *}

 {* {include file='C:/xampp/htdocs/mitienda/themes/PRS028/templates/catalog/_partials/product-cover-thumbnails.tpl'} *}



  


           {if $product.cover}
                <div class="easyzoom">
                  <a href="javascript:void(0)" data-image="{$product.cover.bySize.large_default.url}" title="{$product.cover.legend}">
                   <img
                       class="thumb js-thumb lazyload img-fluid"
                          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                          data-src="{$product.cover.bySize.home_default.url}"
                          alt="{$product.cover.legend}"
                         title="{$product.cover.legend}"
            
                    />
                  </a>
                </div>
         {/if}


             <p>Hola, soy nicolas estoy cogiendo los datos del producto "{$product.name}"</p>
             <p>Su categoria es "{$product.category_name}"</p>
             <p>Su id_categoria es "{$product.id_category_default}"</p>

            
      


    
    
    
    
 



 
