<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('duniang')) {$zbp->ShowError(48);die();}
$blogtitle="主题配置";
$act=GetVars('act','GET');
if($act == "" ) $act= 'config' ;
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>

<div id="divMain">
  <div class="divHeader2"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
    <?php duniang_SubMenu($act);?>
    <a href="http://www.paipk.com/wiki/duniang.html" target="_blank" title="度娘的wiki"><span class="m-left">设置帮助(wiki)</span></a>
  </div>
  <div id="divMain2">
<?php if ($act == 'base' || $act == 'bjjpg' || $act == 'Homejpg' || $act == 'shangjpg'){?><!--图片设置-->
    <table width="100%" border="1" width="100%" class="tableBorder">
    <tr>
      <th scope="col" height="32" width="150px">配置项</th>
      <th scope="col">配置内容</th>
      <th scope="col" width="500px">配置说明</th>
    </tr>
    <form enctype="multipart/form-data" method="post" action="save.php?type=base">
      <tr>
        <td><label for="logo.jpg">主题LOGO设置</label></td>
        <td><input name="logo.png" type="file"/>
          <input name="" type="Submit" class="button" value="上传LOGO图片"/></td>
        <td>[24px*24px]-png格式</td>
      </tr>
    </form>
    <form enctype="multipart/form-data" method="post" action="save.php?type=bjjpg">
      <tr>
        <td><label for="nopic.jpg">默认图片设置</label></td>
        <td><input name="nopic.png" type="file"/>
          <input name="" type="Submit" class="button" value="上传默认图片"/></td>
        <td>[240px*180px]-jpg格式</td>
      </tr>
    </form>
    <form enctype="multipart/form-data" method="post" action="save.php?type=Homejpg">
      <tr>
        <td><label for="homelogo.jpg">简单首页图片</label></td>
        <td><input name="homelogo.png" type="file"/>
          <input name="" type="Submit" class="button" value="上传默认图片"/></td>
        <td>简单首页图片,推荐用PNG格式</td>
      </tr>
    </form>
    <form enctype="multipart/form-data" method="post" action="save.php?type=shangjpg">
      <tr>
        <td><label for="shang.jpg">文章打赏图片</label></td>
        <td><input name="shang.png" type="file"/>
          <input name="" type="Submit" class="button" value="上传默认图片"/></td>
        <td>图片格式JPG，大小随意</td>
      </tr>
    </form>
    </table>
<?php } ?>
<?php if ($act == 'config' || $act == ''){?><!--基本设置-->
<?php
if(isset($_POST['ifseo'])){
  $zbp->Config('duniang')->ifseo = $_POST['ifseo'];
  $zbp->Config('duniang')->ifHomeTopSearch = $_POST['ifHomeTopSearch'];
  $zbp->Config('duniang')->HomeKeywords = $_POST['HomeKeywords'];
  $zbp->Config('duniang')->HomeTopUrl = $_POST['HomeTopUrl'];
  $zbp->Config('duniang')->Homedescription = $_POST['Homedescription'];
  $zbp->Config('duniang')->baidutongji = $_POST['baidutongji'];
  $zbp->Config('duniang')->ifListPic4 = $_POST['ifListPic4'];
  $zbp->Config('duniang')->ifcarousel = $_POST['ifcarousel'];
  $zbp->Config('duniang')->carousel0 = $_POST['carousel0'];
  $zbp->Config('duniang')->carousel1 = $_POST['carousel1'];
  $zbp->Config('duniang')->carousel2 = $_POST['carousel2'];
  $zbp->Config('duniang')->carousel3 = $_POST['carousel3'];
  $zbp->Config('duniang')->carousel4 = $_POST['carousel4'];
  $zbp->Config('duniang')->carousel5 = $_POST['carousel5'];
  $zbp->SaveConfig('duniang');
    $zbp->ShowHint('good');
}
?>
    <form id="form-postdata" name="form-postdata" method="post" enctype="multipart/form-data" action="main.php">
      <table width="100%" border="1" width="100%" class="tableBorder">
      <tr>
        <th scope="col" height="32" width="150px">配置项</th>
        <th scope="col">配置内容</th>
        <th scope="col" width="500px">使用说明</th>
      </tr>
      <tr>
        <td scope="row"><strong>首页巨幕模式</strong></td>
        <td><input name="ifHomeTopSearch" type="text" class="checkbox" style="display:none;" value="<?php echo $zbp->Config('duniang')->ifHomeTopSearch; ?>">
      </input></td>
      <td>在首页开启巨幕(开始简单模式此项无效)</td>
      </tr>
      <tr>
        <td scope="row">巨幕图片链接地址</td>
        <td><input name="HomeTopUrl" type="text" style="width:98%" value="<?php echo $zbp->Config('duniang')->HomeTopUrl; ?>">
          </input></td>
        <td>点击巨幕图片的链接，http://开头</td>
      </tr>
      <tr>
        <td scope="row">文章列表4连图</td>
        <td><input name="ifListPic4" type="text" class="checkbox" style="display:none;" value="<?php echo $zbp->Config('duniang')->ifListPic4; ?>">
      </input></td>
      <td>开闭则不显示文章列表页面的4连图模式。</td>
      </tr>
      <tr>
        <td scope="row"><strong>网站SEO</strong></td>
        <td><input name="ifseo" type="text" class="checkbox" style="display:none;" value="<?php echo $zbp->Config('duniang')->ifseo; ?>">
          </input></td>
        <td>用其他SEO插件请关闭</td>
      </tr>
      <tr>
        <td scope="row">首页关键词</td>
        <td><input name="HomeKeywords" type="text" style="width:98%" value="<?php echo $zbp->Config('duniang')->HomeKeywords; ?>">
          </input></td>
        <td>多个词汇用,隔开</td>
      </tr>
      <tr>
        <td scope="row">首页描述</td>
        <td><textarea name="Homedescription" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->Homedescription; ?></textarea></td>
        <td>留空为副标题</td>
      </tr>
      <tr>
        <td scope="row">百度统计</td>
        <td><textarea name="baidutongji" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->baidutongji; ?></textarea></td>
        <td>代码添加至网站全部页面的head标签前</td>
      </tr>
      <tr>
        <td scope="row"><strong>首页幻灯片开关</strong></td>
        <td><input name="ifcarousel" type="text" class="checkbox" style="display:none;" value="<?php echo $zbp->Config('duniang')->ifcarousel; ?>">
          </input></td>
        <td>开启关闭首页幻灯片模式</td>
      </tr>
      <tr>
        <td scope="row">幻灯片默认图片URL</td>
        <td><textarea name="carousel0" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->carousel0; ?></textarea></td>
        <td>请参考<a href="http://v3.bootcss.com/javascript/#carousel" target="_black">代码模板</a></td>
      </tr>
      <tr>
        <td scope="row">幻灯片第二图片URL</td>
        <td><textarea name="carousel1" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->carousel1; ?></textarea></td>
        <td>请参考<a href="http://v3.bootcss.com/javascript/#carousel" target="_black">代码模板</a></td>
      </tr>
      <tr>
        <td scope="row">幻灯片第三图片URL</td>
        <td><textarea name="carousel2" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->carousel2; ?></textarea></td>
        <td>请参考<a href="http://v3.bootcss.com/javascript/#carousel" target="_black">代码模板</a></td>
      </tr>
      <tr>
        <td scope="row">幻灯片第四图片URL</td>
        <td><textarea name="carousel3" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->carousel3; ?></textarea></td>
        <td>请参考<a href="http://v3.bootcss.com/javascript/#carousel" target="_black">代码模板</a></td>
      </tr>
      <tr>
        <td scope="row">幻灯片第五图片URL</td>
        <td><textarea name="carousel4" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->carousel4; ?></textarea></td>
        <td>请参考<a href="http://v3.bootcss.com/javascript/#carousel" target="_black">代码模板</a></td>
      </tr>
      <tr>
        <td scope="row">幻灯片第六图片URL</td>
        <td><textarea name="carousel5" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->carousel5; ?></textarea></td>
        <td>请参考<a href="http://v3.bootcss.com/javascript/#carousel" target="_black">代码模板</a></td>
      </tr>
      </table>
      <br/>
      <input class="button" type="submit" value="保存设置" />
    </form>
<?php } ?>
<?php if ($act == 'advertisement'){?><!--广告设置-->
<?php
  if(isset($_POST['listAD1'])){
    $zbp->Config('duniang')->listAD1 = $_POST['listAD1'];
    $zbp->Config('duniang')->listAD2 = $_POST['listAD2'];
    $zbp->Config('duniang')->PageAD1 = $_POST['PageAD1'];
    $zbp->Config('duniang')->PageAD2 = $_POST['PageAD2'];
    $zbp->Config('duniang')->HomeAD1 = $_POST['HomeAD1'];
    $zbp->SaveConfig('duniang');
    $zbp->ShowHint('good');
  }
?>
    <form id="form-postdata" name="form-postdata" method="post" enctype="multipart/form-data" action="main.php?act=advertisement">
      <table width="100%" border="1" width="100%" class="tableBorder">
      <tr>
        <th scope="col" height="32" width="150px">配置项</th>
        <th scope="col">配置内容</th>
        <th scope="col" width="500px">使用说明</th>
      </tr>
      <tr>
        <td scope="row">首页广告1</td>
        <td><textarea name="listAD1" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->listAD1; ?></textarea></td>
        <td>列表中间的广告</td>
      </tr>
      <tr>
        <td scope="row">首页广告2</td>
        <td><textarea name="listAD2" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->listAD2; ?></textarea></td>
        <td>列表底部的广告</td>
      </tr>
      <tr>
        <td scope="row">文章底部广告1</td>
        <td><textarea name="PageAD1" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->PageAD1; ?></textarea></td>
        <td>文章底部的广告代码</td>
      </tr>
      <tr>
        <td scope="row">文章底部广告2</td>
        <td><textarea name="PageAD2" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->PageAD2; ?></textarea></td>
        <td>文章底部的广告代码</td>
      </tr>
      <tr>
        <td scope="row">简单搜索页面广告1</td>
        <td><textarea name="HomeAD1" type="text" style="width:98%" ><?php echo $zbp->Config('duniang')->HomeAD1; ?></textarea></td>
        <td>简单搜索页面的侧栏广告<br />仅在屏幕宽度超过1190px时显示</td>
      </tr>
      </table>
      <br/>
      <input name="ok" class="button" type="submit" value="保存设置" />
    </form>
<?php } ?>
<?php if ($act == 'byDesign'){?><!--个性定制-->
    <h3 style="margin-top:30px">定制页面</h3>
    <p>模版可根据客户的要求进行<strong>私人定制</strong>，如果有需要的朋友，请<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=910109610&amp;site=qq&amp;menu=yes" title="联系我们" target="_black">联系作者</a>。
    我们会按低于市场的价格给您优先制作。</p>
    <h3 style="margin-top:30px">联系方式</h3>
      <ul>
        <li>联系方式：admin@paipk.com（#换成@）。来信请在主题中备注相关需求，您也可以在留言咨询相关信息。</li>
        <li>作者blog：<a href="http://www.paipk.com" target="_black" title="拍拍看科技">http://www.paipk.com</a></li>
        <li>BUG页面提交：<a href="http://www.paipk.com/?id=67" target="_black" title="BUG提交">http://www.paipk.com/?id=67</a></li>
     </ul>
<?php } ?>
  </div>
</div>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
?>
