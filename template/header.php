<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<!DOCTYPE html>
<html xml:lang="{$language}" lang="{$language}">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{$host}zb_system/script/common.js" type="text/javascript"></script>
  <script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
  <!--bootrap外调库-->
  <link rel="stylesheet" id="_bootstrap-css"  href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" type="text/css" media="all" />
 	<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css?v=1" type="text/css">
	<meta name="generator" content="{$zblogphp}" />
{$header}
  <!--首页相关信息-->
{if $type=='index'&&$page=='1'}
	<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
{/if}
  <!--SEO代码优化-->
{if $zbp->Config('duniang')->ifseo=="1"}
	{if $type=='article'}
  <title>{$title}</title>
  {php}
    $aryTags = array();
    foreach($article->Tags as $key){
      $aryTags[] = $key->Name;
    }
    if(count($aryTags)>0){
     $keywords = implode(',',$aryTags);
     }else{
     $keywords = $name;
     }
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),140)).'...');
  {/php}
  <meta name="keywords" content="{$keywords}"/>
  <meta name="description" content="{$description}"/>
  <meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='page'}
  <title>{$title}</title>
  <meta name="keywords" content="{$title},{$name}"/>
  {php}
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),140)).'...');
  {/php}
  <meta name="description" content="{$description}"/>
  <meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='index'}
  <title>{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}</title>
  <meta name="Keywords" content="{$name},{$zbp->Config('duniang')->HomeKeywords;}">
  <meta name="description" content="{if $zbp->Config('duniang')->Homedescription==""}{$subname}{else}{$zbp->Config('duniang')->Homedescription}{/if}">
  <meta name="author" content="{$zbp.members[1].Name}">
{else}
  <title>{$title}_第{$pagebar.PageNow}页</title>
  <meta name="Keywords" content="{$title},{$name}">
  <meta name="description" content="{$title}_{$name}_当前是第{$pagebar.PageNow}页">
  <meta name="author" content="{$zbp.members[1].Name}">
{/if}
{/if}
<!--SEO优化代码End-->
{if $zbp->Config('duniang')->baidutongji!=""}{$zbp->Config('duniang')->baidutongji}{/if}