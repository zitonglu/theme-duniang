<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
{if $pagebar}
<nav class="col-xs-12">
	<ul class="pagination">
		{foreach $pagebar.buttons as $k=>$v}
		  {if $pagebar.PageNow==$k}
		<li class="active"><a href="#">{$k}</a></li>
		{else}
		<li><a href="{$v}">{$k}</a></li>
		{/if}
		{/foreach}
	</ul>
</nav><!-- 分页 End -->
{/if}