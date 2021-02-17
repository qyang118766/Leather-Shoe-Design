<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?
session_start();
if($_SESSION['m_id']!="admin"){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}
?>
<body bgcolor="#CCCCCC">
<li>操作导航</li>
<hr />
<center>
  <a href="backend_action_update_components.php" target="mainframe">更新材料库</a>
</center>
<hr />
<center>
  <a href="backend_action_update_homepageproducts.php" target="mainframe">更新版型库</a>
</center>
<hr />
<center>
  <a href="backend_action_upload_orders.php" target="mainframe">上传订单</a>
</center>
<hr />
<center>
  <a href="backend_action.php" target="mainframe">上传定制版型</a>
</center>
</body>
</html>