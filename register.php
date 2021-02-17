<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<?
include_once("class/mysql_class.php");
include_once("dao/user_dao_class.php");//引用数据库操作类，以下两个也是
include_once("class/user_class.php");
include_once("class/verify_class.php");
session_start();//启动session

function isUserNameExist($userName){//查找用户名是否已被占用
	$user = new userDao();
	$arr=array("user_name"=>$userName);
	$result=$user->selectUser($arr,'','user_name');
	if($result[0][0]!=NULL) return true;
	else return false;
}

function getUserId($userName){//查找用户名是否已被占用
	$user = new userDao();
	$arr=array("user_name"=>$userName);
	$result=$user->selectUser($arr,'','id');
	if($result[0][0]!=NULL) return $result;
	else return NULL;
}

?>


<title>注册</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ 元素/标签选择器 ~~ */
ul, ol, dl { /* 由于浏览器之间的差异，最佳做法是在列表中将填充和边距都设置为零。为了保持一致，您可以在此处指定需要的数值，也可以在列表所包含的列表项（LI、DT 和 DD）中指定需要的数值。请注意，除非编写一个更为具体的选择器，否则您在此处进行的设置将会层叠到 .nav 列表。 */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* 删除上边距可以解决边距会超出其包含的 div 的问题。剩余的下边距可以使 div 与后面的任何元素保持一定距离。 */
	padding-right: 15px;
	padding-left: 15px; /* 向 div 内的元素侧边（而不是 div 自身）添加填充可避免使用任何方框模型数学。此外，也可将具有侧边填充的嵌套 div 用作替代方法。 */
}
a img { /* 此选择器将删除某些浏览器中显示在图像周围的默认蓝色边框（当该图像包含在链接中时） */
	border: none;
}
/* ~~ 站点链接的样式必须保持此顺序，包括用于创建悬停效果的选择器组在内。 ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* 除非将链接设置成极为独特的外观样式，否则最好提供下划线，以便可从视觉上快速识别 */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* 此组选择器将为键盘导航者提供与鼠标使用者相同的悬停体验。 */
	text-decoration: none;
}

/* ~~ 此固定宽度容器包含所有其它元素 ~~ */
.container {
	width: 960px;
	background-color: #FFF;
	margin: 0 auto; /* 侧边的自动值与宽度结合使用，可以将布局居中对齐 */
}

/* ~~ 这是布局信息。 ~~ 

1) 填充只会放置于 div 的顶部和/或底部。此 div 中的元素侧边会有填充。这样，您可以避免使用任何“方框模型数学”。请注意，如果向 div 自身添加任何侧边填充或边框，这些侧边填充或边框将与您定义的宽度相加，得出 *总计* 宽度。您也可以选择删除 div 中的元素的填充，并在该元素中另外放置一个没有任何宽度但具有设计所需填充的 div。

*/
.content {

	padding: 10px 0;
}

/* ~~ 其它浮动/清除类 ~~ */
.fltrt {  /* 此类可用于在页面中使元素向右浮动。浮动元素必须位于其在页面上的相邻元素之前。 */
	float: right;
	margin-left: 8px;
}
.fltlft { /* 此类可用于在页面中使元素向左浮动。浮动元素必须位于其在页面上的相邻元素之前。 */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* 如果从 .container 中删除了 overflow:hidden，则可以将此类放置在 <br /> 或空 div 中，作为 #container 内最后一个浮动 div 之后的最终元素 */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style></head>

<body>

<div class="container">
  <div class="content" style="height:500">
    <h1 align="center">新用户注册</h1>
    <form action="" method="post">
    <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100" align="right"><font color="#FF0000">*</font>用户名：</td>
    <td width="150"><input name="USERNAME" type="text" size="15" maxlength="16" /></td>
    <td>4-16位，只能是数字，字母大小写，特殊符号，中文组成</td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>密码：</td>
    <td><input name="PASSWORD" type="password" size="15" maxlength="20" /></td>
    <td>密码长度6-20位，且只用数字和字母以及特殊符号组成</td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>确认密码：</td>
    <td><input name="CONFIRM_PASSWORD" type="password" size="15" maxlength="20" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>电话：</td>
    <td><input name="PHONE" type="text" size="15" maxlength="11" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>Email:</td>
    <td><input name="EMAIL" type="text" size="15" maxlength="40" /></td>
    <td></td>
  </tr>
   <tr>
    <td align="right">地址：</td>
    <td><input name="ADDRESS" type="text" size="15" maxlength="100" /></td>
    <td></td>
  </tr>
   <tr>
    <td align="right">名：</td>
    <td><input name="FIRSTNAME" type="text" size="15" maxlength="20" /></td>
    <td></td>
  </tr>
   <tr>
    <td align="right">姓氏：</td>
    <td><input name="LASTNAME" type="text" size="15" maxlength="20" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right">邮编：</td>
    <td><input name="POSTCODE" type="text" size="15" maxlength="6" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>验证码:</td>
    <td><input name="CODE" type="code" size="4" maxlength="4" /></td>
    <td><img src='utils/idcode.php' onClick="this.src='utils/idcode.php'"/>看不清？点击图片更新</td>
  </tr>
  </table>
<table align="center" width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><font color="#FF0000">*</font><input name="AGREEMENT" type="checkbox"/></td>
    <td>点击提交，表示已经同意<a href="agreement.php"><u>《网站使用规则及法律义务》</u></a></td>
  </tr>
</table>
	</br>
    <center><input name="SUBMIT" type="submit" value="提   交" style="width:100px;height:30px" /></center>

</form>
    
    <p style="color:#F00" align="center">
    <?
    if($_POST[SUBMIT]){
		
		
		//$a=$_POST[USERNAME];
		//echo $a;
		if(empty($_POST[AGREEMENT])) exit ("请先点击阅读，并且同意《网站使用规则及法律义务》");
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]) exit("验证码不正确请重新输入");
		if($_POST[PASSWORD]!=$_POST[CONFIRM_PASSWORD]) exit("两次输入的密码不一致，请检查");
		$verify = new verify();
		if(!$verify->isUSN($_POST[USERNAME])) exit("用户名不符合规则，请参照说明重新输入");
		if(!$verify->isPWD($_POST[PASSWORD])) exit("密码不符合规则，请参照说明重新输入");
		if(!$verify->isPHO($_POST[PHONE])) exit("电话号码不符合规则，请填写正确电话号码");
		if(!$verify->isEMAIL($_POST[EMAIL])) exit("Email地址不符合规则，书填写正确Email地址");
		
		
		if(isUserNameExist($_POST[USERNAME])) exit("用户名已存在！");
		
		$user = new user('',$_POST[USERNAME],$_POST[PASSWORD],$_POST[PHONE],$_POST[EMAIL],$_POST[ADDRESS],$_POST[FIRSTNAME],$_POST[LASTNAME],$_POST[POSTCODE]);
		$user_dao = new userDao();
		$user_dao->insertUser($user);
		
		$userId = getUserId($_POST[USERNAME]);
		//echo $userId[0][0];
		if($userId[0][0] !=NULL) $_SESSION['id']=$userId[0][0];
		
		
		//echo "<script language=\"javascript\">alert('".$c."个客户释放成功!');window.location.href='index.php'</script>";	
		echo "<script language=\"javascript\">alert('注册成功！');window.location.href='index.php'</script>";	
	}

	?>
    
    </p>
    <p></p>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>