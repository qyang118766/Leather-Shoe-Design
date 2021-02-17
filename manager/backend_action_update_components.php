<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include_once("../dao/plm_dao_class.php");
include_once("../class/files_clear.php");
include_once("../class/files_load.php");
/*
后台处理Session
*/
session_start();//启动session
if($_SESSION['m_id']==NULL || $_SESSION['m_id']!="admin"){
	echo "未知错误，请联系管理员！";
	exit;
}

$plm_server_url = "18.162.60.239";
$plm_server_username = "wcadmin";
$plm_server_pasword = "ptc";
$plm_server_databasename = "WIND";
$plm_server_database_username = "pds";
$plm_server_database_password = "pds";
$base_url = "http://".$plm_server_username.":".$plm_server_pasword."@".$plm_server_url;

$imageGroupDir = "../pics/leathertest/";//用于存放图像组的文件夹，危险！！！请再三确认文件夹的路径

$componentGroup = array("edge","eyelet","lace","quarters","toe_cap","tongue","vamp");

function load($baseDir,$p,$primaryGroup,$iconGroup,$index){
	$primaryPath = $baseDir.$p."/";
	//echo $primaryPath."------";
	$iconPath = $baseDir.$p."/icons/";
	//echo $iconPath."------";
	$partLoad = new FilesLoad();
	$partLoad->loadImagesArray($primaryPath,$iconPath,$primaryGroup,$iconGroup,$index);
}

ob_end_clean();
ob_implicit_flush(1);//自动刷新时间

?>
<title>无标题文档</title>
</head>

<body bgcolor="#000000">
<?
//模块0：数据更新开始-------------------------
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 开始执行数据更新，程序结束前，请勿关闭本页面！</font><br >";
sleep(1);
//模块1：连接plm服务器,并返回数据
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 准备连接PLM服务器，地址为：".$plm_server_url."</font><br >";
sleep(1);
$plm_database_conn = new OraclePLMDao($plm_server_url,$plm_server_database_username,$plm_server_database_password,$plm_server_databasename);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 已经成功连接到PLM接服务器，地址为：".$plm_server_url."</font><br >";
sleep(1);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 准备提取数据</font><br >";
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据提取中，请稍候......</font><br >";

$primaryImages=$plm_database_conn->getALLMaterialPrimaryImageURL();
$iconImages=$plm_database_conn->getALLMaterialIconURL($primaryImages);
$finalImageGroup = $plm_database_conn->arrCombinforFinal($primaryImages,$iconImages);

echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据提取成功，共：<font color=\"#FFCC00\">".count($finalImageGroup)."</font> 条</font><br >";
sleep(1);
//模块2：整理返回数据
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 准备数据整理</font><br >";
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据整理中，请稍候......</font><br >";

$edge_primaryImage = array();
$eyelet_primaryImage = array();
$lace_primaryImage = array();
$quarters_primaryImage = array();
$toecap_primaryImage = array();
$tongue_primaryImage = array();
$vamp_primaryImage = array();

$edge_iconImage = array();
$eyelet_iconImage = array();
$lace_iconImage = array();
$quarters_iconImage = array();
$toecap_iconImage = array();
$tongue_iconImage = array();
$vamp_iconImage = array();

$edge_index = array();
$eyelet_index = array();
$lace_index = array();
$quarters_index = array();
$toecap_index = array();
$tongue_index = array();
$vamp_index = array();

$undefind = array();

for($i=0;$i<count($finalImageGroup);$i++){//从全局数组分离，分类
	$p = $finalImageGroup[$i][0];
	switch ($p) {
		case "edge":
			$edge_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$edge_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$edge_index[] = $finalImageGroup[$i][3];
		continue;
		
		case "eyelet":
			$eyelet_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$eyelet_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$eyelet_index[] = $finalImageGroup[$i][3];
		continue;
		
		case "lace":
			$lace_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$lace_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$lace_index[] = $finalImageGroup[$i][3];
		continue;
		
		case "quarters":
			$quarters_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$quarters_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$quarters_index[] = $finalImageGroup[$i][3];
		continue;
		
		case "toecap":
			$toecap_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$toecap_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$toecap_index[] = $finalImageGroup[$i][3];
		continue;
		
		case "tongue":
			$tongue_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$tongue_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$tongue_index[] = $finalImageGroup[$i][3];
		continue;
		
		case "vamp":
			$vamp_primaryImage[] = $base_url.$finalImageGroup[$i][1];
			$vamp_iconImage[] = $base_url.$finalImageGroup[$i][2];
			$vamp_index[] = $finalImageGroup[$i][3];
		continue;
		
		default:
			$undefind [] = $finalImageGroup[$i][1];
			$undefind [] = $finalImageGroup[$i][2];
			$undefind [] = $finalImageGroup[$i][3];
	}
	
}
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据整理完毕，其中异常数据共：<font color=\"#FFCC00\">".count($undefind)."</font> 条</font><br >";
sleep(1);
//模块3：清空缓存数据
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 开始清空缓存，请稍候......</font><br >";
$fc = new FilesClear();
$fc->delDir($imageGroupDir);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 缓存清理结束</font><br >";
sleep(1);
//模块4：载入数据
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 准备载入数据</font><br >";
sleep(1);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据加载中，请稍候......</font><br >";
//------载入------
for($i=0;$i<count($componentGroup);$i++){
	//echo $p;
	$p = $componentGroup[$i];
	switch ($p) {
		case "edge":
			load($imageGroupDir,$p,$edge_primaryImage,$edge_iconImage,$edge_index);
		continue;
		
		case "eyelet":
			load($imageGroupDir,$p,$eyelet_primaryImage,$eyelet_iconImage,$eyelet_index);
		continue;
		
		case "lace":
			load($imageGroupDir,$p,$lace_primaryImage,$lace_iconImage,$lace_index);
		continue;
		
		case "quarters":
			load($imageGroupDir,$p,$quarters_primaryImage,$quarters_iconImage,$quarters_index);
		continue;
		case "toe_cap":
			load($imageGroupDir,$p,$toecap_primaryImage,$toecap_iconImage,$toecap_index);
		continue;
		case "tongue":
			load($imageGroupDir,$p,$tongue_primaryImage,$tongue_iconImage,$tongue_index);
		continue;
		case "vamp":
			load($imageGroupDir,$p,$vamp_primaryImage,$vamp_iconImage,$vamp_index);
		continue;
		default:
			echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 载入数据出错，未知类型定义！</font><br >";
			exit;
	}	
}
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据加载完成！</font><br >";
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 执行数据更新程序完毕！</font><br >";
?>
</body>
</html>
