<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理控制台</title>
</head>
<?
session_start();
if($_SESSION['m_id']!="admin"){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}
?>
<frameset rows = "15%,*">  
<frame src = "m_top.php" name="topframe" noresize="noresize" />  
<frameset cols = "25%,*">  
<frame src = "m_left.php" name = "leftframe" noresize="noresize" /> 
<frame src = "m_main.php" name = "mainframe" noresize="noresize"/>  
</frameset>  
</frameset><noframes></noframes> 
</html>
