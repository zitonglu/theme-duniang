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
{if $zbp->Config('duniang')->PageAD1!=""}
  <div class="hidden-sm hidden-xs center-block">
    {$zbp->Config('duniang')->PageAD1}
  </div><!-- 底部广告 -->
{/if}
<div class="more-name">相关文章</div>
<aside>
  <ul class="more-text col-lg-10">
        {$aid=$article.ID}
        {$tagid=$article.Tags}
        {$cid=$article.Category.ID}
        {php}
            $str = '';
            $tagrd=array_rand($tagid);
            if( sizeof($tagid)>0 && ($tagid[$tagrd]->Count)>1){
                $tagi='%{'.$tagrd.'}%';
                $where = array(array('=','log_Status','0'),array('like','log_Tag',$tagi),array('<>','log_ID',$aid));
            }else{
                $where = array(array('=','log_Status','0'),array('=','log_CateID',$cid),array('<>','log_ID',$aid));
            }
            $aboutarray = $zbp->GetArticleList(array('*'),$where,array('rand()'=>' '),array(6),'');
            foreach ($aboutarray as $related) {
                if(($related->ID)!=$aid){
                $str .= "<li><time class=\"visible-lg\">".$related->time('Y-m-d H:i')."</time><i class=\"dian\"> ● </i><a href=\"{$related->Url}\" title=\"{$related->Title}\">{$related->Title}</a></li>";
                }
            }
        {/php}
        {$str}
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
              $RMarray = $zbp->GetArticleList(array('*'),$where,$order,array(6),'');
              {/php}
              {foreach $RMarray as $hotlist}
                {php}SF_img1::getPics($hotlist,240,180,4);{/php}
                {php}$src=SF_img1::getPicUrlBy($hotlist->Metas->duniang_teSeTuPian,240,180,4){/php}
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                {if $hotlist.Metas.duniang_teSeTuPian!=""}
                  <img src="{$src}" alt="{$hotlist.Title}">
                {elseif $hotlist->sf_img_count>0}
                  <img src="{$hotlist.sf_img[0]}" alt="{$hotlist.Title}">
                {else}
                  <img src="{$host}zb_users/theme/{$theme}/include/nopic.jpg" alt="{$hotlist.Title}">
                {/if}
                  <div class="caption">
                    <p class="pl-list">
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