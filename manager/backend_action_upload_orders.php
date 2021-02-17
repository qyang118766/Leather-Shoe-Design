<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include_once("../class/mysql_class.php");//引用数据库操作类，以下两个也是
include_once("../dao/user_dao_class.php");
include_once("../dao/order_dao_class.php");
include_once("../class/order_class.php");
/*
后台处理Session
*/
session_start();//启动session
if($_SESSION['m_id']==NULL || $_SESSION['m_id']!="admin"){
	echo "未知错误，请联系管理员！";
	exit;
}

//服务器信息组
$plm_server_url = "18.163.127.12";
$plm_server_username = "wcadmin";
$plm_server_pasword = "ptc";
$plm_server_databasename = "WIND";
$plm_server_database_username = "pds";
$plm_server_database_password = "pds";
$base_url = "http://".$plm_server_username.":".$plm_server_pasword."@".$plm_server_url;
$plm_jsp_page = $base_url."/Windchill/rfa/jsp/test/SaveOrders.jsp";

function getOrdersNum(){//查询数据量
	$order_dao = new OrderDao();
	return $order_dao->numOrder();
	
}

function clearOrdersCache(){
	$order_dao = new OrderDao();
	return $order_dao->deleteAll();
}

$num = getOrdersNum();
if($num==0){
	echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 共查询到数据条目：<font color=\"#FFCC00\">".$num."</font> 条,程序终止退出！</font><br >";
	exit;
}
//echo $num;
ob_end_clean();
ob_implicit_flush(1);//自动刷新时间

?>
<title>无标题文档</title>
</head>

<body bgcolor="#000000">
<?
//模块0：可是执行提示-------------------------
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 开始执行，程序结束前，请勿关闭本页面！</font><br >";
sleep(1);

//模块1：查找本地数据量
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 共查询到数据条目：<font color=\"#FFCC00\">".$num."</font> 条</font><br >";
sleep(1);
//模块2：取得服务器连接
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 连接FlexPLM服务器，服务器地址：<font color=\"#FFCC00\">".$plm_server_url."</font></font><br >";
sleep(1);

echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 正在执行传输，如果数据量大，请耐心等待程序执行完毕！</font><br >";
sleep(1);

$sign= trim(file_get_contents($plm_jsp_page));
if($sign == 1){
	echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据传输完成，请在FlexPLM服务器查看！</font><br >";
	sleep(1);
	
	echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 清空数据缓存！</font><br >";
	sleep(1);
	clearOrdersCache();
	
}else{
	echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 数据传输失败，请联系管理员！</font><br >";
	sleep(1);
}
echo "<font color=\"#00CC00\">".date('Y-m-d h:i:sa', time())." 程序执行完毕，可以正常关闭本窗口！</font><br >";
?>
</body>
</html>
