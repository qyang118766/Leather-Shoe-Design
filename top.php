<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>TOP</title>
<?
include_once("class/mysql_class.php");
include_once("dao/user_dao_class.php");//引用数据库操作类，以下两个也是
include_once("class/user_class.php");
session_start();//启动session
if($_SESSION['id']==NULL){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}else{
	$p=$_SESSION['id'];
	$result=getUserName($p);	
	$userName=$result[0][0];
}

function getUserName($userId){//查找用户名是否已被占用
	$user = new userDao();
	$arr=array("id"=>$userId);
	$result=$user->selectUser($arr,'','user_name');
	if($result[0][0]!=NULL) return $result;
	else return NULL;
}
?>


</head>

<body>
<table width="1300" height="40" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300"><a href="index.php" target="_parent"><img src="../pics/logos/logo.jpg" width="70" height="70" /></a></td>
    <td width="800"></td>
	<td width="200">
    <table width="300" border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">你好！<?=$userName?></td>
    <td align="right"><a href="">我的创作</a></td>
    <td width="50" align="right"><a target="_parent" href="../log_out.php">退出</a></td>
  </tr>
</table>
</td>
</tr>  
</table>
<hr />



</body>
</html>