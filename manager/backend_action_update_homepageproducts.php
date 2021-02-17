<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
//include_once("../dao/plm_dao_class.php");
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

//服务器信息组
$plm_server_url = "18.162.209.50";
$plm_server_username = "wcadmin";
$plm_server_pasword = "ptc";
$plm_server_databasename = "WIND";
$plm_server_database_username = "pds";
$plm_server_database_password = "pds";
$base_url = "http://".$plm_server_username.":".$plm_server_pasword."@".$plm_server_url;
$plm_jsp_page = $base_url."/Windchill/rfa/jsp/test/ProductMeta.jsp";

$jsonFilePath = "../json/";//json file path
$filename="home page product data.json";
$imageDir = "../pics/homepageimgs/";//用于存放图像组的文件夹，危险！！！请再三确认文件夹的路径

$imageArray=array();

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

//模块1：连接plm服务器,并返回json数据
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 准备连接PLM服务器，地址为：".$plm_server_url."</font><br >";
sleep(1);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 获取json文件并生成，路径为：".$jsonFilePath."</font><br >";
sleep(1);

$plm_json_stream= trim(file_get_contents($plm_jsp_page));
//echo $plm_json_stream;
file_put_contents($jsonFilePath.$filename,$plm_json_stream);

echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." json文件并生成，文件为：".$jsonFilePath.$filename."</font><br >";
sleep(1);
//模块2:整理json数据
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 开始整理json数据信息......"."</font><br >";
sleep(1);
$jsonString = file_get_contents($jsonFilePath.$filename);
$jsonArray=json_decode($jsonString, true);
if(count($jsonArray)!=8){
	echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数组条目不为8，更新程序终止"."</font><br >";
	exit;
}

//模块3:清空图像缓存
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 开始清空缓存，请稍候......</font><br >";
$fc = new FilesClear();
$fc->delDir($imageDir);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 缓存清理结束</font><br >";

//模块4:载入图像组（8个）
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 开始从服务器加载图像,请稍候......"."</font><br >";
sleep(1);
foreach($jsonArray as $key => $value) {
	//$sss = $base_url.$value['imageURL'];
	//echo $sss."|";
	$imageArray[] = $base_url.$value['imageURL'];
   //echo $value['imageURL']."|||";
}
$loadImgs = new FilesLoad();

$loadImgs->loadHomePageImages($imageDir,$imageArray);
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 图像加载完成！</font><br >";
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 执行数据更新程序完毕！</font><br >";


?>
</body>
</html>
