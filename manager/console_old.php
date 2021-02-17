<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="ajax.js"></script>
<title>管理控制台</title>
<?
session_start();
if($_SESSION['m_id']!="admin"){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}
?>
</head>

<body>
<h1>管理员控制台</h1>
<div style="background-color:#CCCCCC;height:800px;width:300px;float:left;">
<center>
<br />
<input name="update" type="button" value="手动从PLM更新数据" onclick="updateProcess()" />
</center>
</div>
<div id="process_information" style="background-color:#CCCCCC;height:800px;width:1000px;float:right;">

</div>

</body>
</html>
