<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" media="all" />
<style type="text/css">
<!--
.oc{font-size:12px;cursor:hand;width: 100px;height: 20px;background-color: #ffffff;background-repeat: repeat;background-attachment: scroll;background-position: center;border: 0 solid #000000;text-align: center;padding-top: 0px;}
.rs{font-size:12px;cursor:hand;width: 40px;height: 20px;background-color: #ffffff;background-repeat: repeat;background-attachment: scroll;background-position: center;border: 0 solid #000000;text-align: center;padding-top: 0px;}
-->
</style>
<title>无标题文档</title>
<?
include_once("class/mysql_class.php");//引用数据库操作类，以下两个也是
include_once("dao/user_dao_class.php");
include_once("dao/order_dao_class.php");
include_once("class/order_class.php");

session_start();//启动session
if($_SESSION['id']==NULL){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}else{
	$user_id=$_SESSION['id'];//得到用户名
}
$left_panel=$_SESSION['left_panel'];
if($_POST[oc]){
	$left_panel=!$left_panel;
	$_SESSION['left_panel']=$left_panel;
	echo "<script language=\"javascript\">window.parent.location.reload();</script>";
}


if($_POST[Add_To_Order]){
	if($_SESSION['pics_group']==NULL){
		echo "发生了错误，请联系管理员";
		exit;	
	}else{	
		$pics_group_array=$_SESSION['pics_group'];		
		$componentNumString=getComponentNumString($pics_group_array);//components list
		$userName = getUserName($user_id);//user name
		//echo $userName;
		$productName = "图图";
		$productId = "11111";
		$status = saveOrder($user_id,$userName,$productId,$productName,$componentNumString);
		if($status==1){
			echo "订单保存成功！";	
		}else{
			echo "订单保存失败，请联系管理员！";
		}
	}
}


function getComponentNum($path){//去文件名中的材料号
	$filenameFull = pathinfo($path,PATHINFO_BASENAME);//文件名
	$filenameEXT = pathinfo($path,PATHINFO_EXTENSION);//扩展名
	$EXTPosition = strrpos($filenameFull,$filenameEXT);//扩展名起始位
	$componentNum = substr($filenameFull,0,$EXTPosition-1);
	return $componentNum;
}

function getComponentNumString($arr){//材料号组成长字符串用于存入数据库
	foreach ($arr as $key => $value) {
			if($value != end($arr)){
				$value = getComponentNum($value);
    			$saveString .= $key.":".$value.",";
			}else{
				$value = getComponentNum($value);
				$saveString .= $key.":".$value;
			}
			
		}
		return $saveString;	
}

function getUserName($userId){
	$user = new userDao();
	$arr=array("id"=>$userId);
	$result=$user->selectUser($arr,'','user_name');
	if($result[0][0]!=NULL) return $result[0][0];
	else return NULL;
}
function saveOrder($user_id,$user_name,$product_id,$product_name,$components_list){
	$order = new order('',$user_id,$user_name,$product_id,$product_name,$components_list);
	$order_dao = new OrderDao();
	$order_dao->insertOrder($order);
	return 1;
}

?>


</head>

<body bgcolor="">
<div align="center">
<form action="" method="post" name="">
<table width="1000" height="10" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><i class="fa fa-list" aria-hidden="true"><input class="oc" name="oc" type="submit" value="&nbsp;打开/关闭 订制" /></i></td>
    <td align="center">尖头牛津鞋 | Leathers 流光异彩水纹皮 深灰色 | Sole 8mm皮质防滑鞋底 | ￥1458.99</td>
    <td align="left">
	<input name="Add_To_Order" type="submit" value="加入订单" />
	</td>
    <td><a href="#"><i class="fa fa-repeat" aria-hidden="true"><input class="rs" name="reset" type="submit" value="&nbsp;重置" /></i></a></td>
  </tr>
</table>
</form>
</div>
<div id="area" align="center""><img src="./pics/leather/default.png" style="width:801px;height:501px;position:absolute;left:100px;top:40px;"/></div>
</body>
</html>