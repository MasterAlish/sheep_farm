<div class="farm">
    <div class="align">
        <div class="clr"></div>
            {if not empty($help)}{$help}{/if}
        <div class="hidden">
            {foreach from=$commands item=local key=command}
                <input type="hidden" id="{$command}" value="{$local}">
            {/foreach}
        </div>
        <div class="clr"></div>
    </div>
</div>