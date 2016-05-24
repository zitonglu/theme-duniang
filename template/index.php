<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
{if $type=='index'&&$page=='1'&&$zbp->Config('duniang')->ifHomeSearch=="1"}
{template:index-home}
{else}
{template:header}
</head>
<body class="body-padding">
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">{$name}</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{$host}" title="{$name}"><img alt="{$name}的LOGO" src="{$host}zb_users/theme/{$theme}/include/logo.png"></a>
			<a class="navbar-brand" href="{$host}" title="{$subname}">{$name}</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left" role="search" action="{$host}zb_system/cmd.php?act=search" name="search" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="搜点什么" name="q">
				</div>
				<button type="submit" class="btn btn-default">搜索</button>
			</form>
			<ul class="nav navbar-nav">
				{module:navbar}
			</ul>
			<ul class="nav navbar-nav navbar-right">
				{module:右上导航}
			</ul>
		</div>
	</div>
</nav><!-- 顶部导航 End -->
	{if $zbp->Config('duniang')->ifHomeTopSearch=="1"}
	<div class="jumbotron hidden-xs JuMu">
		<div class="text-center"><a href="{if $zbp->Config('duniang')->HomeTopUrl}{$zbp->Config('duniang')->HomeTopUrl}{else}{$host}{/if}"><img src="{$host}zb_users/theme/{$theme}/include/homelogo.png" alt="{$name}"></a></div>
		<div style="margin-bottom:50px">
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
			<div style="padding-top:18px" class="col-sm-2 col-md-3">
				<a id="homepage" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown text-muted" style="padding-top:14px;margin-left:-18px">微信分享 <span class="caret"></span></a>
				<div class="dropdown-menu weixin-box" aria-labelledby="homepage" style="margin-left:-90px">
					<p class="text-center"><img src="http://api.qrserver.com/v1/create-qr-code/?size=128x128&amp;data={$host}" alt="{$name}"></p>
					<p class="text-center" style="font-size:14px">打开微信，点击底部的“发现”<br />使用“扫一扫”即可分享</p>
				</div>
			</div>
		</div>
	</div>
	{/if}
	<div class="more-margin">
		<div class="col-md-5 col-lg-offset-1 col-sm-7">
			<div><ol class="breadcrumb">{module:catalog}</ol></div>
			{$article_i=0}
			{foreach $articles as $article}
			{template:post-multi}
			{/foreach}
			{if $zbp->Config('duniang')->listAD2!=""}
			<section  class="col-md-12 list-section hidden-xs hidden-sm">
				{$zbp->Config('duniang')->listAD2}
			</section>
			{/if}<!-- PC广告 -->
			{if $modules['link'].Content}
			<div class="list-inline col-xs-12">
				<h4>友情链接</h4>
				{module:link}
			</div>
			{/if}
			{template:pagebar}
		</div>
		<!-- 左侧栏 End -->
		<div class="col-lg-offset-1 col-sm-5">
			<aside class="nav hidden-xs list-right"{if $zbp->Config('duniang')->ifsidebar1=="1"} data-spy="affix" id="nav"{/if}><!-- 是否下滚判断 -->
			{template:sidebar}
		</aside>
		</div><!-- 右侧栏 End -->
		<div class="clearfix"></div>
	</div>
{template:footer}
{/if}