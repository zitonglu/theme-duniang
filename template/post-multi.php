<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
{php}
    $intro=preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),80)).'...');
    $small_url=preg_replace('/http:\/\/+/', '', trim(SubStrUTF8(TransferHTML($article->Url,'[nohtml]'),28)).'...');
    $small_alias=preg_replace('/http+/', '', trim(SubStrUTF8(TransferHTML($article->Alias,'[nohtml]'),28)).'...');
    SF_img1::getPics($article,120,75,4);
    $article_i++;
{/php}
{if $article->sf_img_count>=4 && $zbp->Config('duniang')->ifListPic4==false}
<section class="col-xs-12 list-section" id="{$article.ID}">
	<h4><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h4>
	<span class="text-muted">{$article.Time('Y年m月d日')}</span> - {$intro}<br>
		{if $article->Alias!=""}<a href="{$article.Url}" class="text-danger" title="{$article.Title}">{$small_alias} <span class="caret"></span></a>
		{elseif $article->Tags}
		{foreach $article.Tags as $tag}<a href="{$tag.Url}" class="text-success">{$tag.Name}</a>&nbsp{/foreach}
		{else}
		<a href="{$article.Url}" title="{$article.Title}" class="text-success">{$small_url} <span class="caret"></span></a>
		{/if}
	<span class="text-muted"> - {$article.CommNums}评论 - {$article.ViewNums}人次浏览
	</span>
	<p>
		<ul class="list-inline">
			<li><a href="{$article.Url}"><img src="{$article.sf_img[0]}" alt="{$article.Title}" class="img-responsive"></a></li>
			<li><a href="{$article.Url}"><img src="{$article.sf_img[1]}" alt="{$article.Title}" class="img-responsive"></a></li>
			<li><a href="{$article.Url}"><img src="{$article.sf_img[2]}" alt="{$article.Title}" class="img-responsive"></a></li>
			<li><a href="{$article.Url}"><img src="{$article.sf_img[3]}" alt="{$article.Title}" class="img-responsive"></a></li>
		</ul>
	</p>
</section>
{elseif $article->sf_img_count>=1}
<section class="col-xs-12 list-section" id="{$article.ID}">
	<h4><a href="{$article.Url}" title="{$article.Title}"><span class="text-danger">{$article.Category.Name}</span>-{$article.Title}</a></h4>
	<div class="col-sm-3 hidden-xs"><a href="{$article.Url}"><img src="{$article.sf_img[0]}" alt="{$article.Title}" class="img-responsive"></a></div>
	<div class="col-sm-9 row">
		<span class="text-muted">{$article.Time('Y年m月d日')}</span> - {$intro}		
		<div class="text-muted">
		{if $article->Alias!=""}<a href="{$article.Url}" class="text-danger" title="{$article.Title}">{$small_alias} <span class="caret"></span></a>
		{elseif $article->Tags}
		{foreach $article.Tags as $tag}<a href="{$tag.Url}" class="text-success">{$tag.Name}</a> {/foreach}
		{else}
		<a href="{$article.Url}" title="{$article.Title}" class="text-success">{$small_url} <span class="caret"></span></a>
		{/if}
		 - 
		<a id="weixin-{$article.ID}" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown text-muted hidden-xs">微信分享 <span class="caret"></span></a>
		<div class="dropdown-menu weixin-box" aria-labelledby="weixin-{$article.ID}">
			<p>
				<img src="http://api.qrserver.com/v1/create-qr-code/?size=160x160&amp;data={$article.Url}" alt="{$article.Title}">
			</p>
		</div>
	       - {$article.ViewNums}人次浏览
		</div>
	</div>
</section>
{else}
<section id="{$article.ID}" class="col-xs-12 list-section">
	<h4><a href="{$article.Url}" title="{$article.Title}"><span class="text-danger">{$article.Category.Name}</span>-{$article.Title}</a></h4>
	<span class="text-muted">{$article.Time('Y年m月d日')}</span> - {$intro}<br>
		{if $article->Alias!=""}<a href="{$article.Url}" class="text-success" title="{$article.Title}">{$small_alias} <span class="caret"></span></a>
		{else}
		<a href="{$article.Url}" title="{$article.Title}" class="text-success">{$small_url} <span class="caret"></span></a>
		{/if}
	<span class="text-muted"> - 
		 {foreach $article.Tags as $tag}<a href="{$tag.Url}" class="text-success">{$tag.Name}</a> {/foreach} - {$article.ViewNums}人次浏览
	</span>
</section>
{/if}
{if $article_i == 6 and $zbp->Config('duniang')->listAD1!=""}
	<section  class="col-md-12 list-section hidden-xs hidden-sm">
		{$zbp->Config('duniang')->listAD1}
	</section>
{/if}