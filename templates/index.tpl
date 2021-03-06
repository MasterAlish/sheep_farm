<div class="farm">
    <div class="align">
        <div class="clr"></div>
            <div class="lamb killed"></div>
            <span id="killed">{$killed}</span>
            <div id="msg" class="hidden"></div>
            <div class="pull-right">
                <input type="text" id="console" placeholder="{$locale['enter_command']}..">
                <a id="refresh_page" href="#">{$locale['refresh']}</a>
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
                {$locale['yard']} {$yard} <b>(<span id="count_yard{$yard}">{if not empty($lambs)}{$lambs[$yard]|@count}{/if}</span>)</b>
                <div class="pull-right"><a class="kill" id="{$yard}">{$locale['kill_all']}</a></div>
            </div>
            <div class="lamb_place" id="lamb_place{$yard}">
                {if not empty($lambs)}
                {foreach from=$lambs[$yard] item=lamb}
                    <div class="lamb"></div>
                {/foreach}
                {/if}
            </div>
        </div>
    {/for}
    <div class="clr"></div>
  </div>
</div>