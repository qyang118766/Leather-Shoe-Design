<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>Home</title>
<link href="CSS/layout.css" rel="stylesheet" type="text/css" />
<?
include_once("class/mysql_class.php");
include_once("dao/user_dao_class.php");//�������ݿ�����࣬��������Ҳ��
include_once("class/user_class.php");

session_start();//����session

if($_POST[SUBMIT_STUDENT]){//�ύ��֤
	$user=$_POST[STUDENT_ID];
	$pass=md5($_POST[STUDENT_PASSWORD]);//����
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('����������ID������');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('��֤�벻��ȷ������������');history.go(localhost)</script>";
		}else{
			$stu = new studentdao();//����һ��ѧ�������ݿ����Ӳ�����ʵ��
			$arr = array("id"=>"$user","password"=>"$pass");

			$result=$stu->selectStudent($arr,'AND','id');//��ѯ
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('�˺Ż������������');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//�ύ��session��ҳ����ת
				header("Location:StudentAndStaff/index.php");

				}
			
			
		}
	} 
	
}



?>
<!------------------------------------------------------------------->
<?
if($_POST[SUBMIT_UNIVERSITY_STAFF]){//�ύ��֤
	$user=$_POST[UNIVERSITY_STAFF_ID];
	$pass=md5($_POST[UNIVERSITY_STAFF_PASSWORD]);//����
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('����������ID������');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('��֤�벻��ȷ������������');history.go(localhost)</script>";
		}else{
			$sta = new universitystaffsdao();//����һ����ְ�������ݿ����Ӳ�����ʵ��
			$arr = array("id"=>"$user","password"=>"$pass");

			$result=$sta->selectStaff($arr,'AND','id');//��ѯ
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('�˺Ż������������');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//�ύ��session��ҳ����ת
				header("Location:StudentAndStaff/index.php");

				}
			
			
		}
	} 
	
}

?>

<!------------------------------------------------------------------->
<?
if($_POST[SUBMIT_LIBRARY_STAFF]){//�ύ��֤
	$user=$_POST[LIBRARY_STAFF_ID];
	$pass=md5($_POST[LIBRARY_STAFF_PASSWORD]);//����
	if($user==NULL || $pass==NULL){
		echo "<script language=\"javascript\">alert('����������ID������');history.go(localhost)</script>";
	}else{
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]){
			echo "<script language=\"javascript\">alert('��֤�벻��ȷ������������');history.go(localhost)</script>";
		}else{
			$ls = new librarystaffsdao();//����һ��ѧ�������ݿ����Ӳ�����ʵ��
			$arr = array("id"=>"$user","password"=>"$pass");

			$result=$ls->selectStaff($arr,'AND','id,position');//��ѯ
			if(!$result[0][0]){
				echo "<script language=\"javascript\">alert('�˺Ż������������');history.go(localhost)</script>";	
			}else{
				$_SESSION['id']=$result[0][0];//�ύ��session��ҳ����ת
				if(isset($_SESSION['id'])){
					$ls->updateStaff('status','1',$arr,'AND');	
				}
				$pos=$result[0][1];
				switch ($pos){
					case "ǰ̨":
						header("Location:Front_Desk/index.php");
						break;
					case "����Ա":
						header("Location:Manager/index.php");
						break;
					case "�ݳ�":
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
  <div id="form" style="background-color:#00F"><!--//Ԥ��������ͼƬλ��--> 
    <img src="Image/top.jpg" width="600" height="100" /> </div>
  <div class="clearfloat"></div>
  <div id="nav"> &nbsp;<a href="" ><font size="4">��ҳ</font></a><font size="4">|</font> <a href="" ><font size="4">ͼ��ݼ��</font></a><font size="4">|</font> <a href="" ><font size="4">ͼ�����Ϣ</font></a><font size="4">|</font> <a href="" ><font size="4">����ͼ���</font></a><font size="4">|</font> <a href="" ><font size="4">��ϵ����</font></a> </div>
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
              <td width="450"><font size="4">֪ͨ��
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
        <font size="4" color="#0033CC">��ѡ���¼�����֤</font>
      </center>
    </div>
    <div id="side" style="width:302px">
      <div id="tabs0">
        <ul class="menu0" id="menu0">
          <li onclick="setTab(0,0)" class="hover">ѧ����¼</li>
          <li onclick="setTab(0,1)">��ְ����¼</li>
          <li onclick="setTab(0,2)">����Ա��¼</li>
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
                        ѧ����
                      </center></td>
                    <td><input name="STUDENT_ID" type="text" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        ��&nbsp;&nbsp;&nbsp;��
                      </center></td>
                    <td><input name="STUDENT_PASSWORD" type="password" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        ��֤��
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
                        <input name="SUBMIT_STUDENT" type="submit" value="��¼" />
                      </center></td>
                    <td><center>
                        <a href="get_pass.php"><u>��������</u></a>
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
                        ְ����
                      </center></td>
                    <td><input name="UNIVERSITY_STAFF_ID" type="text" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        ��&nbsp;&nbsp;&nbsp;��
                      </center></td>
                    <td><input name="UNIVERSITY_STAFF_PASSWORD" type="password" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        ��֤��
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
                        <input name="SUBMIT_UNIVERSITY_STAFF" type="submit" value="��¼" />
                      </center></td>
                    <td><center>
                        <a href="get_pass.php"><u>��������</u></a>
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
                        ����Ա
                      </center></td>
                    <td><input name="LIBRARY_STAFF_ID" type="text" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        ��&nbsp;&nbsp;&nbsp;��
                      </center></td>
                    <td><input name="LIBRARY_STAFF_PASSWORD" type="password" size="15" maxlength="20" /></td>
                  </tr>
                  <tr>
                    <td><center>
                        ��֤��
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
                        <input name="SUBMIT_LIBRARY_STAFF" type="submit" value="��¼" />
                      </center></td>
                    <td><center>
                        <a href="get_pass.php"><u>��������</u></a>
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
      <p><font size="3">�������ϴ�ѧ    �������ϴ�ѧͼ���      ���ϰ�Ȩ����@Copyright</font></p>
      <br />
      <p><font size="3">2017-2017</font></p>
    </center>
  </div>
</div>
</body>
</html>
