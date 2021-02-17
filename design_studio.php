<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>Design Studio</title>
<?

session_start();//启动session
if($_SESSION['id']==NULL){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}

$left_panel=$_SESSION['left_panel'];

?>
</head>


<frameset rows = "15%,*">  
<frame src = "top.php" id="topframe" name="topframe" noresize="noresize" frameborder="0"/>
<?
if($left_panel==TRUE){
?>
<frameset cols = "25%,*">  
<frame src = "left.php" id="leftframe" name = "leftframe" noresize="noresize" frameborder="0" scrolling="auto" /> 
<frame src = "main.php" id="mainframe" name = "mainframe" noresize="noresize" frameborder="0"/> 
</frameset>  
<?	
}else{
?>
<frameset cols = "*">  
<frame src = "main.php" id="mainframe" name = "mainframe" noresize="noresize" frameborder="0"/> 
</frameset>
<?
}
?>  
</frameset>

<noframes></noframes> 
</html>