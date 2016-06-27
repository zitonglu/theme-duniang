<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/search_config.php';
//注册插件
RegisterPlugin('duniang','ActivePlugin_duniang');

function ActivePlugin_duniang()
{
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'duniang_AddMenu');
	Add_Filter_Plugin('Filter_Plugin_Zbp_Load','duniang_rebuild_Main');
	Add_Filter_Plugin('Filter_Plugin_Edit_Response3','duniang_teSeTuPian');
	Add_Filter_Plugin('Filter_Plugin_Search_Begin','duniang_SearchMain');
}

//定义开头
function duniang_SubMenu($id){
	$arySubMenu = array(
		0 => array('基本设置', 'config', 'left', false),
		1 => array('图片设置', 'base', 'left', false),
		2 => array('广告设置', 'advertisement', 'left', false),
		3 => array('个性定制', 'byDesign', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
	}
}

function duniang_AddMenu(&$menus)
{
	global $zbp;
	$menus[] = MakeTopMenu('root', '主题配置', $zbp->host . 'zb_users/theme/duniang/main.php', '', 'topmenu_duniang');
}

function InstallPlugin_duniang()
{
global $zbp;
if(!$zbp->Config('duniang')->HasKey('Version')){
$zbp->Config('duniang')->ifseo = '1';
$zbp->Config('duniang')->ifHomeSearch = '1';
$zbp->Config('duniang')->ifsidebar1 = '0';
$zbp->Config('duniang')->ifsidebar2 = '0';
$zbp->Config('duniang')->ifListPic4 = '0';
$zbp->Config('duniang')->carousel0 = 'http://images.paipk.com/20162016/06/201606194461_624.jpg';
$zbp->Config('duniang')->HomeKeywords = '拍拍看科技';
}
$zbp->Config('duniang')->Version = '1.0';
$zbp->SaveConfig('duniang');
}

//重建模块首先加载项目
function duniang_rebuild_Main() {
	global $zbp;
	$zbp->RegBuildModule('comments','duniang_side_comm');
	$zbp->RegBuildModule('archives','duniang_side_archives');
}

//侧栏评论
function duniang_side_comm() {
    global $zbp;
	$i = $zbp->modulesbyfilename['comments']->MaxLi;
	if ($i == 0) $i = 10;
	$comments = $zbp->GetCommentList('*', array(array('=', 'comm_RootID', 0)), array('comm_PostTime' => 'DESC'), $i, null);
	$s = '';
	foreach ($comments as $comment) {
		$s .= '<li><a href="'.$comment->Post->Url.'#cmt'.$comment->ID.'"><img src="'.$comment->Author->Avatar.'" alt="头像" class="img-comment"></a>';
		$s .= '<span class="pl-list"><a href="'.$comment->Post->Url.'" title="'.$comment->Post->Title.'">'.$comment->Post->Title.'</a> <small>的评论：</small></span><br>';
		$s .= '<a href="'.$comment->Post->Url.'" class="text-success">'.$comment->Author->StaticName.'</a>';
		$s .= '<time class="text-muted"> - '.$comment->Time('Y-m-d').'</time><br>';
		$s .= TransferHTML($comment->Content,'[noenter]').'</li>';
	}
	return $s;
}

//文章归档
function duniang_side_archives() {
	global $zbp;
	$i = $zbp->modulesbyfilename['archives']->MaxLi;
	if($i<0)return '';
	$fdate;
	$ldate;
	$sql = $zbp->db->sql->Select($zbp->table['Post'], array('log_PostTime'), null, array('log_PostTime' => 'DESC'), array(1), null);
	$array = $zbp->db->Query($sql);
	if (count($array) == 0)
		return '';
	$ldate = array(date('Y', $array[0]['log_PostTime']), date('m', $array[0]['log_PostTime']));
	$sql = $zbp->db->sql->Select($zbp->table['Post'], array('log_PostTime'), null, array('log_PostTime' => 'ASC'), array(1), null);
	$array = $zbp->db->Query($sql);
	if (count($array) == 0)
	return '';
	$fdate = array(date('Y', $array[0]['log_PostTime']), date('m', $array[0]['log_PostTime']));
	$arraydate = array();
	for ($i = $fdate[0]; $i < $ldate[0] + 1; $i++) {
		for ($j = 1; $j < 13; $j++) {
			$arraydate[] = strtotime($i . '-' . $j);
		}
	}
	foreach ($arraydate as $key => $value) {
		if ($value - strtotime($ldate[0] . '-' . $ldate[1]) > 0)
			unset($arraydate[$key]);
		if ($value - strtotime($fdate[0] . '-' . $fdate[1]) < 0)
			unset($arraydate[$key]);
	}
	$arraydate = array_reverse($arraydate);
	$s = '<div class="divArchives" name="divArchives"><ul>';
	$s .= '<form action="" method="get"><select class="form-control" onchange="MM_jumpMenu(\'parent\',this,0)">';
	$s .= '<option>==请选择月份==</option>';
	foreach ($arraydate as $key => $value) {
		$url = new UrlRule($zbp->option['ZC_DATE_REGEX']);
		$url->Rules['{%date%}'] = date('Y-n', $value);
		$url->Rules['{%year%}'] = date('Y', $value);
		$url->Rules['{%month%}'] = date('n', $value);
		$url->Rules['{%day%}'] = 1;

		$fdate = $value;
		$ldate = (strtotime(date('Y-m-t', $value)) + 60 * 60 * 24);
		$sql = $zbp->db->sql->Count($zbp->table['Post'], array(array('COUNT', '*', 'num')), array(array('=', 'log_Type', '0'), array('=', 'log_Status', '0'), array('BETWEEN', 'log_PostTime', $fdate, $ldate)));
		$n = GetValueInArrayByCurrent($zbp->db->Query($sql), 'num');
		if ($n > 0) {
			$s .= '<option value ="' . $url->Make() . '">' . str_replace(array('%y%', '%m%'), array(date('Y', $fdate), date('n', $fdate)), $zbp->lang['msg']['year_month']) . ' (' . $n . ')</option>';
		}
	}
	$s .= '</select></form></ul></div>';
	$s .= '<script type="text/javascript">
			function MM_jumpMenu(targ,selObj,restore){
			eval(targ+".location=\'"+selObj.options[selObj.selectedIndex].value+"\'");
			if (restore) selObj.selectedIndex=0;}
			</script>';
	return $s;
}

//定义特色图片
function duniang_teSeTuPian(){
	global $zbp,$article;
	echo '<div><label for="meta_duniang_teSeTuPian" class="editinputname">特色图片链接地址:</label><br /><input type="text" name="meta_duniang_teSeTuPian" value="'.htmlspecialchars($article->Metas->duniang_teSeTuPian).'"/><br /><img src="'.$article->Metas->duniang_teSeTuPian.'" alt="暂无图片" style="max-width:190px" /></div>';
}

function UninstallPlugin_duniang(){
	global $zbp;
}