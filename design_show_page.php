<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<?
session_start();//启动session
if($_SESSION['id']==NULL){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}
print_r ($_SESSION['cars']);

?>

</head>

<body>
</body>
</html>