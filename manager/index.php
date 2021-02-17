<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录</title>
</head>

<body>
<?
session_start();
if($_POST[submit]){
	$user=$_POST[m_id];
	$pass=$_POST[m_password];//加密
	if($user=="admin" && $pass=="654321"){
		$_SESSION['m_id']=$user;
		header("Location:console.php");
	}
	else{
		echo "账户密码不正确！";
	}
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('请输入您的ID和密码');history.go(localhost)</script>";
	}
	
}

?>



<form action="" method="post">
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>管理员账户：</td>
    <td><input name="m_id" type="text" /></td>
    <td></td>
  </tr>
  <tr>
    <td>口&nbsp;&nbsp;&nbsp;令：</td>
    <td><input name="m_password" type="password" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="submit" type="submit" value="确定" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
</body>
</html>