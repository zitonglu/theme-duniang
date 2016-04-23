<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
{template:header}
</head>
<body>
<div style="margin-top:100px;margin-bottom:25px" class="hidden-xs text-center"><a href="{$host}"><img src="{$host}zb_users/theme/{$theme}/include/homelogo.png" alt="{$name}"></a></div>
<div style="margin-top:10px">
  <form class="col-sm-10 col-md-6 col-md-offset-3" role="search" action="{$host}zb_system/cmd.php?act=search" name="search" method="post">
    <div class="input-group input-group-lg">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-open text-muted"></span></button>
        <ul class="dropdown-menu">
			{module:catalog}
          <li role="separator" class="divider"></li>
          <li><a href="{$feedurl}" target="_black" title="{$title}的RSS订阅">RSS订阅</a></li>
        </ul>
      </div>
      <input type="text" class="form-control" placeholder="{$name}..." name="q">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Go!</button>
      </span>
    </div>
  </form>
  <div style="padding-top:18px" class="col-sm-2 col-md-3 hidden-xs">
    <a id="homepage" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown text-muted" style="padding-top:14px;margin-left:-18px">微信分享 <span class="caret"></span></a>
    <div class="dropdown-menu weixin-box" aria-labelledby="homepage" style="margin-left:-90px">
      <p class="text-center"><img src="http://api.qrserver.com/v1/create-qr-code/?size=128x128&amp;data={$host}" alt="{$name}"></p>
      <p class="text-center">打开微信，点击底部的“发现”<br />使用“扫一扫”即可分享</p>
    </div>
  </div>
</div><!-- 导航结束 -->
<div class="col-sm-12 col-md-6 col-md-offset-3 home-page">
  <!-- 内容 -->
  <div class="tab-content">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#singleText" aria-controls="singleText" role="tab" data-toggle="tab">文章列表</a></li>
      <li role="presentation"><a href="#links" aria-controls="links" role="tab" data-toggle="tab">友情链接</a></li>
    </ul>
    <!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="singleText">
			<div class="col-lg-9 more-margin">
				<div>
          {if $article.Type==ZC_POST_TYPE_ARTICLE}
					{foreach $articles as $article}
					<li class="pl-list"><span class="glyphicon glyphicon-list-alt text-muted"></span> <span class="text-muted hidden-xs">[{$article.Time('Y-m-d')}] </span> <a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></li>
					{/foreach}
          {else}
            <ul>
              {module:previous}
            </ul>
          {/if}
					<p class="text-right"><a href="{$pagebar.nextbutton}">更多内容 <span class="glyphicon glyphicon-comment"></span></a></p>
				</div>
			</div>
			{if $zbp->Config('duniang')->HomeAD1 && $article.Type==ZC_POST_TYPE_ARTICLE}
			<div class="col-lg-3 more-margin list-right visible-lg">
				{$zbp->Config('duniang')->HomeAD1}
			</div>
			{/if}
		</div>
		<div role="tabpanel" class="tab-pane" id="links">
      {if $modules['link'].Content}
      <div class="list-inline">
        <h3>友情链接</h3>
        {module:link}
      </div>
      {/if}
      {if $modules['favorite'].Content}
      <div class="list-inline">
        <h3>网站收藏</h3>
        {module:favorite}
      </div>
      {/if}
    </div>
	</div>
<div class="clearfix"></div>
<p style="text-indent:1px;height: 100px" class="hidden-xs"></p>
{template:footer}
