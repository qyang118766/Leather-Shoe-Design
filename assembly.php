<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<?
/*
后台处理Session
*/
session_start();//启动session
if($_SESSION['pics_group']==NULL || $_SESSION['id']==NULL){
	echo "未知错误，请联系管理员！";
	exit;
}
$preGroup=$_SESSION['pics_group'];

if($_GET[componentDir] && $_GET[component]){
	$componentDir=$_GET[componentDir];
	$component=$_GET[component];
}

if($componentDir && $component){
	//print_r($componentDir);
	$currGroup=updateGroup($preGroup,$component,$componentDir);
	//print_r($currGroup);
	$_SESSION['pics_group']=$currGroup;
	
}
$useGroup=$_SESSION['pics_group'];
//print_r($useGroup);
function updateGroup($array,$component,$componentDir){
	
	$array["$component"]=str_replace("D:/Leather Shoe Design",".","$componentDir");
	return $array;
}



?>

<img src="./pics/leather/default.png" style="width:801px;height:501px;position:absolute;left:100px;top:40px;"/>
<img src="<?=$useGroup["edge"]?>" style="position:absolute;left:232px;top:333px;"/>
<img src="<?=$useGroup["lace"]?>" style="position:absolute;left:448px;top:207px;"/>
<img src="<?=$useGroup["quarters"]?>" style="position:absolute;left:235px;top:196px;"/>
<img src="<?=$useGroup["toe_cap"]?>" style="position:absolute;left:573px;top:330px;"/>
<img src="<?=$useGroup["tongue"]?>" style="position:absolute;left:434px;top:196px;"/>
<img src="<?=$useGroup["vamp"]?>" style="position:absolute;left:314px;top:294px;"/>
<img src="<?=$useGroup["eyelet"]?>" style="position:absolute;left:445px;top:217px;"/>

