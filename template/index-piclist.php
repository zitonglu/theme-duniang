<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
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
	<div class="more-margin col-xs-12">
		<div>
			<ol class="breadcrumb">{module:catalog}</ol>
		</div>
		<div>
			<ul class="list-inline PicList">
		{foreach $articles as $article}
				{php}SF_img1::getPics($article,auto,180,4);{/php}
				{for $i=0;$article->sf_img_count>$i;$i=$i+1}
				<li><a href="{$article.Url}"><img src="{$article.sf_img[$i]}" alt="{$article.Title}" title="{$article.Title}"></a></li>
				{/for}
		{/foreach}
			</ul>
		</div>
		{template:pagebar}
    </div>
{template:footer}