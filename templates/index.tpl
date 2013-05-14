<div class="farm">
    <div class="align">
        <div class="clr"></div>
            <div class="lamb killed"></div>
            <span id="killed">{$killed}</span>
            <div id="msg" class="hidden"></div>
            <div class="pull-right">
                <input type="text" id="console" placeholder="Enter command here..">
                <a id="refresh_page" href="#">Refresh</a>
            </div>
        <div class="clr"></div>
    </div>
</div>

<div class="farm">
  <div class="align">
    <div class="clr"></div>
    {for $yard=1 to 4}
        <div class="yard" id="yard{$yard}">
            <div class="name">
                Yard {$yard} <b>(<span id="count_yard{$yard}">{$lambs[$yard]|@count}</span>)</b>
                <div class="pull-right"><a class="kill" id="{$yard}">Kill All</a></div>
            </div>
            <div class="lamb_place" id="lamb_place{$yard}">
                {foreach from=$lambs[$yard] item=lamb}
                    <div class="lamb"></div>
                {/foreach}
            </div>
        </div>
    {/for}
    <div class="clr"></div>
  </div>
</div>