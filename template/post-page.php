<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
    <h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
    由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<div>
  <ol class="breadcrumb">
    <li><a href="{$host}">主页</a></li>
    <li class="active">{$article.Title}</li>
  </ol>
</div><!-- 导航 -->
<div>
  <div class="title-text">
    <h1 class="text-center">{$article.Title}</h1>
    <p class="text-muted text-center">
      {$article.Time('Y年m月d日 H:i')}&nbsp; 
      {if $article.Tags}
      标签：{foreach $article.Tags as $tag}<a href="{$tag.Url}">{$tag.Name}</a>{/foreach}
      {else}{$article.Author.StaticName}
      {/if} 
      <a href="#" data-toggle="modal" data-target="#myModal" class="hidden-xs" title="微信分享" alt="微信分享"> - <i class="glyphicon glyphicon-qrcode"></i> - </a>
    </p>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">二维码扫描</h4>
      </div>
      <div class="modal-body text-center">
        <p>
          <img src="http://api.qrserver.com/v1/create-qr-code/?size=256x256&amp;data={$article.Url}" alt="{$article.Title}">
        </p>
        <p>
          打开微信，点击底部的“发现”，使用“扫一扫”即可将网页分享至朋友圈。
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="blog-text">{$article.Content}</div>

{if !$article.IsLock}
{template:comments}		
{/if}