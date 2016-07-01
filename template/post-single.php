<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
    <h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
    由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<div>
  <ol class="breadcrumb">
    <li><a href="{$host}">主页</a></li>
    <li><a href="{$article.Category.Url}">{$article.Category.Name}</a></li>
    <li class="active">正文</li>
  </ol>
</div><!-- 导航 -->
<div>
  <div class="title-text">
    <h1 class="text-center">{$article.Title}</h1>
    <p class="text-muted text-center">
      <time>{$article.Time('Y年m月d日 H:i')}</time> 
      {if $article.Tags}
      标签：{foreach $article.Tags as $tag}<a href="{$tag.Url}">{$tag.Name}</a> {/foreach}
      {else}{$article.Author.StaticName}
      {/if}
    </p>
  </div>
</div>

<div class="blog-text">{$article.Content}
  <div class="text-center" style="margin-top:20px;margin-bottom:20px">
    <div class="btn-group" role="group">
      {if $article.Prev}<a href="{$article.Prev.Url}" class="btn btn-default" title="{$article.Prev.Title}"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;上一篇</a>{/if}
      <a href="#" data-toggle="modal" data-target="#shang" type="button" class="btn btn-default" title="打赏" alt="打赏"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;打赏</a>
      <a href="#" data-toggle="modal" data-target="#myerweima" type="button" class="btn btn-default" title="微信分享" alt="微信分享"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;二维码</a>
      <a href="#" data-toggle="modal" data-target="#shareOut" type="button" class="btn btn-default" title="文章分享" alt="文章分享"><i class="glyphicon glyphicon-share"></i>&nbsp;分享</a>
      {if $article.Next}<a href="{$article.Next.Url}" class="btn btn-default" title="{$article.Next.Title}"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;下一篇</a>{/if}
    </div>
  </div>
  <!-- 分享按钮 -->
<!-- 跳出弹窗 -->
<div class="modal fade" id="shang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="myModalLabel">谢谢您的支持</p>
      </div>
      <div class="modal-body text-center">
        <p>
          <img src="{$host}zb_users/theme/{$theme}/include/shang.jpg" alt="打赏图片">
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- shang end -->
<div class="modal fade" id="myerweima" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="myModalLabel">二维码扫描</p>
      </div>
      <div class="modal-body text-center">
        <p>
          <img src="http://api.qrserver.com/v1/create-qr-code/?size=256x256&amp;data={$article.Url}" alt="{$article.Title}">
        </p>
        <p>
          打开微信，点击底部的“发现”，<br />使用“扫一扫”即可将网页分享至朋友圈。
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- myerweima end -->
<div class="modal fade" id="shareOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="myModalLabel">文章分享</p>
      </div>
      <div class="modal-body text-center">
        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div><script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- shareOut end -->

</div>
{if $zbp->Config('duniang')->PageAD1!=""}
  <div class="hidden-sm hidden-xs center-block">
    {$zbp->Config('duniang')->PageAD1}
  </div><!-- 底部广告 -->
{/if}
<div class="more-name">相关文章</div>
<aside>
  <ul class="more-text col-lg-10">
    {$arrayAbout=GetList(6,null,null,null,null,null,array('is_related'=>$article->ID));}
    {foreach $arrayAbout as $related}
    <li>
      <time class="visible-lg">{$related.Time("Y-m-d H:i")}</time>
      <i class="dian"></i>
      <a href="{$related.Url}" title="{$related.Title}">{$related.Title}</a>
    </li>
    {/foreach}
  </ul>
  <div class="clearfix"></div>
</aside><!-- 相关文章 -->
<div class="more-name">热门文章</div>
<aside class="row more-margin">
  {php}
  $stime = time();
  $ytime = 91*24*60*60;
  $ztime = $stime-$ytime;
  $order = array('log_ViewNums'=>'DESC');
  $where = array(array('=','log_Status','0'),array('>','log_PostTime',$ztime));
  $RMarray = $zbp->GetArticleList(array('*'),$where,$order,array(3),'');
  {/php}
  {foreach $RMarray as $hotlist}
  {php}SF_img1::getPics($hotlist,240,180,4);{/php}
  {php}$src=SF_img1::getPicUrlBy($hotlist->Metas->duniang_teSeTuPian,240,180,4){/php}
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail hot-single">
      {if $hotlist.Metas.duniang_teSeTuPian!=""}
      <a href="{$hotlist.Url}" title="{$hotlist.Title}"><img src="{$src}" alt="{$hotlist.Title}"></a>
      {elseif $hotlist->sf_img_count>0}
      <a href="{$hotlist.Url}" title="{$hotlist.Title}"><img src="{$hotlist.sf_img[0]}" alt="{$hotlist.Title}"></a>
      {else}
      <a href="{$hotlist.Url}" title="{$hotlist.Title}"><img src="{$host}zb_users/theme/{$theme}/include/nopic.jpg" alt="{$hotlist.Title}"></a>
      {/if}
      <div class="caption">
        <p class="pl-list more-list-p">
          <a href="{$hotlist.Url}" title="{$hotlist.Title}">{$hotlist.Title}</a>
        </p>
      </div>
    </div>
  </div>
  {/foreach}
</aside><!-- 热门文章 -->
{if $zbp->Config('duniang')->PageAD2!=""}
  <div class="hidden-sm hidden-xs center-block">
    {$zbp->Config('duniang')->PageAD2}
  </div><!-- 底部广告 -->
{/if}
{if !$article.IsLock}
{template:comments}		
{/if}
