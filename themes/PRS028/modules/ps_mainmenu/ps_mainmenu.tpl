{function name="menu" nodes=[] depth=0 parent=null class=null}
    {if $nodes|count}
      <ul class="nav-items{if $depth == 0} top-menu{/if} {$class}" {if $depth == 0}id="top-menu"{/if} data-depth="{$depth}">
        {foreach from=$nodes item=node}
          <li class="{$node.type} nav-item{if $node.children|count} nav-expand{/if}{if $node.current} current{/if}" id="{$node.page_identifier}">
            <a class="nav-link{if $node.children|count} nav-expand-link{/if}" href="{$node.url}" data-depth="{$depth}" {if $node.open_in_new_window} target="_blank" {/if}>
              {$node.label}
            </a>
            {if $node.children|count}
              {menu nodes=$node.children depth=$node.depth parent=$node class='nav-expand-content'}
            {/if}
          </li>
        {/foreach}
      </ul>
    {/if}
{/function}

<div class="menu d-none d-md-block" id="_desktop_top_menu">
  {menu nodes=$menu.children}
</div>
