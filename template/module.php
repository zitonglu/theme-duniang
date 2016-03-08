<section class="widget" id="{$module.HtmlID}">

{if (!$module.IsHideTitle)&&($module.Name)}
<h5>{$module.Name}</h5>
{else}<h5 style="display:none;"></h5>{/if}

{if $module.Type=='div'}
<div>{$module.Content}</div>
{/if}

{if $module.Type=='ul'}
<ul>{$module.Content}</ul>
{/if}

</section>