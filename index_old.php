<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>Home</title>
<link href="CSS/layout.css" rel="stylesheet" type="text/css" />
<?
include_once("class/mysql_class.php");
include_once("dao/user_dao_class.php");//引用数据库操作类，以下两个也是
include_once("class/user_class.php");

session_start();//启动session

if($_POST[SUBMIT_STUDENT]){//提交验证
	$user=$_POST[STUDENT_ID];
	$pass=md5($_POST[STUDENT_PASSWORD]);//加密
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('请输入您的ID和密码');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('验证码不正确，请重新输入');history.go(localhost)</script>";
		}else{
			$stu = new studentdao();//创建一个学生和数据库连接操作的实例
			$arr = array("id"=>"$user","password"=>"$pass");

			$result=$stu->selectStudent($arr,'AND','id');//查询
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('账号或密码错误，请检查');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//提交给session后页面跳转
				header("Location:StudentAndStaff/index.php");

				}
			
			
		}
	} 
	
}



?>
<!------------------------------------------------------------------->
<?
if($_POST[SUBMIT_UNIVERSITY_STAFF]){//提交验证
	$user=$_POST[UNIVERSITY_STAFF_ID];
	$pass=md5($_POST[UNIVERSITY_STAFF_PASSWORD]);//加密
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('请输入您的ID和密码');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('验证码不正确，请重新输入');history.go(localhost)</script>";
		}else{
			$sta = new universitystaffsdao();//创建一个教职工和数据库连接操作的实例
			$arr = array("id"=>"$user","password"=>"$pass");

			$result=$sta->selectStaff($arr,'AND','id');//查询
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('账号或密码错误，请检查');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//提交给session后页面跳转
				header("Location:StudentAndStaff/index.php");

				}
			
			
		}
	} 
	
}

?>

<!------------------------------------------------------------------->
<?
if($_POST[SUBMIT_LIBRARY_STAFF]){//提交验证
	$user=$_POST[LIBRARY_STAFF_ID];
	$pass=md5($_POST[LIBRARY_STAFF_PASSWORD]);//加密
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('请输入您的ID和密码');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('验证码不正确，请重新输入');history.go(localhost)</script>";
		}else{
			$ls = new librarystaffsdao();//创建一个学生和数据库连接操作的实例
			$arr = array("id"=>"$user","password"=>"$pass");

			$result=$ls->selectStaff($arr,'AND','id,position');//查询
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('账号或密码错误，请检查');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//提交给session后页面跳转
				if(isset($_SESSION['id'])){
					$ls->updateStaff('status','1',$arr,'AND');	
				}
				$pos=$result[0][1];
				switch ($pos){
					case "前台":
						header("Location:Front_Desk/index.php");
						break;
					case "管理员":
						header("Location:Manager/index.php");
						break;
					case "馆长":
						header("Location:Manager/index.php");
						break;
				}
				
				
				}
			
			
		}
	} 
	
}

?>

<!------------------------------------------------------------------->
<style type="text/css">
#tabs0 {
	height: 200px;
	width: 300px;
	border: 1px solid #cbcbcb;
	background-color: #f2f6fb;
}
.menu0 {
	width: 300px;
}
.menu0 li {
	display: block;
	float: left;
	padding: 4px 0;
	width: 100px;
	text-align: center;
	cursor: pointer;
	background: #FFFFff;
}
.menu0 li.hover {
	background: #f2f6fb;
}
#main0 ul {
	display: none;
}
#main0 ul.block {
	display: block;
}
-->
</style>
<script>  
  
<!------------------------------------------------------------------->
  
  
function setTab(m,n){  
  
 var tli=document.getElementById("menu"+m).getElementsByTagName("li");  
  
 var mli=document.getElementById("main"+m).getElementsByTagName("ul");  
  
 for(i=0;i<tli.length;i++){  
  
  tli[i].className=i==n?"hover":"";  
  
  mli[i].style.display=i==n?"block":"none";  
  
 }  
  
}  
  

  
<!------------------------------------------------------------------->
  
</script>
</head>

<body bgcolor="#FFFFFF">
<div id="Layer1" style="position:absolute; width:100%; height:110%; z-index:-1"> </div>
<div id="container">
  <div id="header"></div>
  <!--//logo-->
  <div id="logo"><img src="Image/logo.jpg" width="300" height="100" /> </div>
  <div id="form" style="background-color:#00F"><!--//预留的文字图片位置--> 
    <img src="Image/top.jpg" width="600" height="100" /> </div>
  <div class="clearfloat"></div>
  <div id="nav"> &nbsp;<a href="" ><font size="4">首页</font></a><font size="4">|</font> <a href="" ><font size="4">图书馆简介</font></a><font size="4">|</font> <a href="" ><font size="4">图书馆信息</font></a><font size="4">|</font> <a href="" ><font size="4">电子图书馆</font></a><font size="4">|</font> <a href="" ><font size="4">联系我们</font></a> </div>
  <div class="clearfloat"></div>
  <div id="maincontent">
    <div id="main" style="width:580px">
      <center>
        <marquee style="WIDTH: 580px; HEIGHT: 480px" scrollamount="5" direction="up">
        <?
    for($i=0;$i<count($message,0);$i++){
	?>
        <center>
          <table width="550" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="450"><font size="4">通知：
                <?=$message[$i][1]?>
                </font></td>
              <td width="100"><center>
                  <?=$message[$i][3]?>
                </center></td>
            </tr>
            <tr>
              <td colspan="2"><font size="4">
                <?=$message[$i][2]?>
                </font></td>
            </tr>
          </table>
        </center>
        <br />
        <hr />
        <br />
        <?
    }
	?>
        </marquee>
      </center>
    </div>
    <div style="background-color:#FFCC99;height:30px;width:302px;float:right;">
      <center>
        <font size="4" color="#0033CC">请选择登录身份验证</font>
      </center>
    </div>
    <div id="side" style="width:302px">
      <div id="tabs0">
        <ul class="menu0" id="menu0">
          <li onclick="setTab(0,0)" class="hover">学生登录</li>
          <li onclick="setTab(0,1)">教职工登录</li>
          <li onclick="setTab(0,2)">管理员登录</li>
        </ul>
        <div class="main" id="main0">
          <ul class="block">
            <br />
            <br />
            <br />
            
            <!------------------------------------------------------------------->
            <center>
              <form action="" method="post" name="log in 1">
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><center>
                        学生号
                      </center></td>
                    <td><input name="STUDENT_ID" type="text" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        密&nbsp;&nbsp;&nbsp;码
                      </center></td>
                    <td><input name="STUDENT_PASSWORD" type="password" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        验证码
                      </center></td>
                    <td><table width="150" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="50"><input name="CODE" type="code" size="4" maxlength="4" /></td>
                          <td width="70"><img src='idcode.php' onClick="this.src='idcode.php'"/></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                <table width="150" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><center>
                        <input name="SUBMIT_STUDENT" type="submit" value="登录" />
                      </center></td>
                    <td><center>
                        <a href="get_pass.php"><u>忘记密码</u></a>
                      </center></td>
                  </tr>
                </table>
                
                <!------------------------------------------------------------------->
                
              </form>
            </center>
          </ul>
          <ul>
            <br />
            <br />
            <br />
            <center>
              <form action="" method="post" name="log in 2">
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><center>
                        职工号
                      </center></td>
                    <td><input name="UNIVERSITY_STAFF_ID" type="text" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        密&nbsp;&nbsp;&nbsp;码
                      </center></td>
                    <td><input name="UNIVERSITY_STAFF_PASSWORD" type="password" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        验证码
                      </center></td>
                    <td><table width="150" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="50"><input name="CODE" type="code" size="4" maxlength="4" /></td>
                          <td width="70"><img src='idcode.php' onClick="this.src='idcode.php'"/></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                <table width="150" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><center>
                        <input name="SUBMIT_UNIVERSITY_STAFF" type="submit" value="登录" />
                      </center></td>
                    <td><center>
                        <a href="get_pass.php"><u>忘记密码</u></a>
                      </center></td>
                  </tr>
                </table>
                
                <!------------------------------------------------------------------->
              </form>
            </center>
          </ul>
          <ul>
            <br />
            <br />
            <br />
            <center>
              <form action="" method="post" name="log in 3">
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><center>
                        管理员
                      </center></td>
                    <td><input name="LIBRARY_STAFF_ID" type="text" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        密&nbsp;&nbsp;&nbsp;码
                      </center></td>
                    <td><input name="LIBRARY_STAFF_PASSWORD" type="password" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        验证码
                      </center></td>
                    <td><table width="150" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="50"><input name="CODE" type="code" size="4" maxlength="4" /></td>
                          <td width="70"><img src='idcode.php' onClick="this.src='idcode.php'"/></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                <table width="150" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><center>
                        <input name="SUBMIT_LIBRARY_STAFF" type="submit" value="登录" />
                      </center></td>
                    <td><center>
                        <a href="get_pass.php"><u>忘记密码</u></a>
                      </center></td>
                  </tr>
                </table>
              </form>
            </center>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfloat"></div>
  <div id="footer">
    <center>
      <p><font size="3">北京联合大学    北京联合大学图书馆      联合版权所有@Copyright</font></p>
      <br />
      <p><font size="3">2017-2017</font></p>
    </center>
  </div>
</div>
</body>
</html>
