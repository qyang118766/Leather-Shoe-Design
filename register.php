<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<?
include_once("class/mysql_class.php");
include_once("dao/user_dao_class.php");//�������ݿ�����࣬��������Ҳ��
include_once("class/user_class.php");
include_once("class/verify_class.php");
session_start();//����session

function isUserNameExist($userName){//�����û����Ƿ��ѱ�ռ��
	$user = new userDao();
	$arr=array("user_name"=>$userName);
	$result=$user->selectUser($arr,'','user_name');
	if($result[0][0]!=NULL) return true;
	else return false;
}

function getUserId($userName){//�����û����Ƿ��ѱ�ռ��
	$user = new userDao();
	$arr=array("user_name"=>$userName);
	$result=$user->selectUser($arr,'','id');
	if($result[0][0]!=NULL) return $result;
	else return NULL;
}

?>


<title>ע��</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Ԫ��/��ǩѡ���� ~~ */
ul, ol, dl { /* ���������֮��Ĳ��죬������������б��н����ͱ߾඼����Ϊ�㡣Ϊ�˱���һ�£��������ڴ˴�ָ����Ҫ����ֵ��Ҳ�������б����������б��LI��DT �� DD����ָ����Ҫ����ֵ����ע�⣬���Ǳ�дһ����Ϊ�����ѡ�������������ڴ˴����е����ý������� .nav �б� */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* ɾ���ϱ߾���Խ���߾�ᳬ��������� div �����⡣ʣ����±߾����ʹ div �������κ�Ԫ�ر���һ�����롣 */
	padding-right: 15px;
	padding-left: 15px; /* �� div �ڵ�Ԫ�ز�ߣ������� div ����������ɱ���ʹ���κη���ģ����ѧ�����⣬Ҳ�ɽ����в������Ƕ�� div ������������� */
}
a img { /* ��ѡ������ɾ��ĳЩ���������ʾ��ͼ����Χ��Ĭ����ɫ�߿򣨵���ͼ�������������ʱ�� */
	border: none;
}
/* ~~ վ�����ӵ���ʽ���뱣�ִ�˳�򣬰������ڴ�����ͣЧ����ѡ���������ڡ� ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* ���ǽ��������óɼ�Ϊ���ص������ʽ����������ṩ�»��ߣ��Ա�ɴ��Ӿ��Ͽ���ʶ�� */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* ����ѡ������Ϊ���̵������ṩ�����ʹ������ͬ����ͣ���顣 */
	text-decoration: none;
}

/* ~~ �˹̶��������������������Ԫ�� ~~ */
.container {
	width: 960px;
	background-color: #FFF;
	margin: 0 auto; /* ��ߵ��Զ�ֵ���Ƚ��ʹ�ã����Խ����־��ж��� */
}

/* ~~ ���ǲ�����Ϣ�� ~~ 

1) ���ֻ������� div �Ķ�����/��ײ����� div �е�Ԫ�ز�߻�����䡣�����������Ա���ʹ���κΡ�����ģ����ѧ������ע�⣬����� div ��������κβ������߿���Щ�������߿���������Ŀ����ӣ��ó� *�ܼ�* ��ȡ���Ҳ����ѡ��ɾ�� div �е�Ԫ�ص���䣬���ڸ�Ԫ�����������һ��û���κο�ȵ���������������� div��

*/
.content {

	padding: 10px 0;
}

/* ~~ ��������/����� ~~ */
.fltrt {  /* �����������ҳ����ʹԪ�����Ҹ���������Ԫ�ر���λ������ҳ���ϵ�����Ԫ��֮ǰ�� */
	float: right;
	margin-left: 8px;
}
.fltlft { /* �����������ҳ����ʹԪ�����󸡶�������Ԫ�ر���λ������ҳ���ϵ�����Ԫ��֮ǰ�� */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* ����� .container ��ɾ���� overflow:hidden������Խ���������� <br /> ��� div �У���Ϊ #container �����һ������ div ֮�������Ԫ�� */
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
    <h1 align="center">���û�ע��</h1>
    <form action="" method="post">
    <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100" align="right"><font color="#FF0000">*</font>�û�����</td>
    <td width="150"><input name="USERNAME" type="text" size="15" maxlength="16" /></td>
    <td>4-16λ��ֻ�������֣���ĸ��Сд��������ţ��������</td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>���룺</td>
    <td><input name="PASSWORD" type="password" size="15" maxlength="20" /></td>
    <td>���볤��6-20λ����ֻ�����ֺ���ĸ�Լ�����������</td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>ȷ�����룺</td>
    <td><input name="CONFIRM_PASSWORD" type="password" size="15" maxlength="20" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>�绰��</td>
    <td><input name="PHONE" type="text" size="15" maxlength="11" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>Email:</td>
    <td><input name="EMAIL" type="text" size="15" maxlength="40" /></td>
    <td></td>
  </tr>
   <tr>
    <td align="right">��ַ��</td>
    <td><input name="ADDRESS" type="text" size="15" maxlength="100" /></td>
    <td></td>
  </tr>
   <tr>
    <td align="right">����</td>
    <td><input name="FIRSTNAME" type="text" size="15" maxlength="20" /></td>
    <td></td>
  </tr>
   <tr>
    <td align="right">���ϣ�</td>
    <td><input name="LASTNAME" type="text" size="15" maxlength="20" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right">�ʱࣺ</td>
    <td><input name="POSTCODE" type="text" size="15" maxlength="6" /></td>
    <td></td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">*</font>��֤��:</td>
    <td><input name="CODE" type="code" size="4" maxlength="4" /></td>
    <td><img src='utils/idcode.php' onClick="this.src='utils/idcode.php'"/>�����壿���ͼƬ����</td>
  </tr>
  </table>
<table align="center" width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><font color="#FF0000">*</font><input name="AGREEMENT" type="checkbox"/></td>
    <td>����ύ����ʾ�Ѿ�ͬ��<a href="agreement.php"><u>����վʹ�ù��򼰷�������</u></a></td>
  </tr>
</table>
	</br>
    <center><input name="SUBMIT" type="submit" value="��   ��" style="width:100px;height:30px" /></center>

</form>
    
    <p style="color:#F00" align="center">
    <?
    if($_POST[SUBMIT]){
		
		
		//$a=$_POST[USERNAME];
		//echo $a;
		if(empty($_POST[AGREEMENT])) exit ("���ȵ���Ķ�������ͬ�⡶��վʹ�ù��򼰷�������");
		if($_POST[CODE]==NULL || $_POST[CODE]!=$_SESSION[check_pic]) exit("��֤�벻��ȷ����������");
		if($_POST[PASSWORD]!=$_POST[CONFIRM_PASSWORD]) exit("������������벻һ�£�����");
		$verify = new verify();
		if(!$verify->isUSN($_POST[USERNAME])) exit("�û��������Ϲ��������˵����������");
		if(!$verify->isPWD($_POST[PASSWORD])) exit("���벻���Ϲ��������˵����������");
		if(!$verify->isPHO($_POST[PHONE])) exit("�绰���벻���Ϲ�������д��ȷ�绰����");
		if(!$verify->isEMAIL($_POST[EMAIL])) exit("Email��ַ�����Ϲ�������д��ȷEmail��ַ");
		
		
		if(isUserNameExist($_POST[USERNAME])) exit("�û����Ѵ��ڣ�");
		
		$user = new user('',$_POST[USERNAME],$_POST[PASSWORD],$_POST[PHONE],$_POST[EMAIL],$_POST[ADDRESS],$_POST[FIRSTNAME],$_POST[LASTNAME],$_POST[POSTCODE]);
		$user_dao = new userDao();
		$user_dao->insertUser($user);
		
		$userId = getUserId($_POST[USERNAME]);
		//echo $userId[0][0];
		if($userId[0][0] !=NULL) $_SESSION['id']=$userId[0][0];
		
		
		//echo "<script language=\"javascript\">alert('".$c."���ͻ��ͷųɹ�!');window.location.href='index.php'</script>";	
		echo "<script language=\"javascript\">alert('ע��ɹ���');window.location.href='index.php'</script>";	
	}

	?>
    
    </p>
    <p></p>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>