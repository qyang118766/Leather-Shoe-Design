<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<script type="text/javascript" src="ajax.js"></script>
<title>Design Panel</title>
<?
include_once("class/user_class.php");
include_once("class/read_files_class.php");
include_once("class/component_info_class.php");
session_start();//启动session
if($_SESSION['id']==NULL){//如果未能得到session,直接退出
	echo "<script language=\"javascript\">alert('请先登录');history.back(-1)</script>";
	exit;
}
$readyForSetCpnRows=new GetFiles();

$edgeRows=$readyForSetCpnRows->setRowNum("edge");
$edgeTotal=$readyForSetCpnRows->countFiles("edge");
$edgeList=$readyForSetCpnRows->scanFiles("edge");
$edgeIconsList=$readyForSetCpnRows->scanFiles("edge/icons");
$edge=new ComponentFilesInfo(0,"edge","鞋底边缘","$edgeRows","$edgeTotal",$edgeList,$edgeIconsList);

$eyeletRows=$readyForSetCpnRows->setRowNum("eyelet");
$eyeletTotal=$readyForSetCpnRows->countFiles("eyelet");
$eyeletList=$readyForSetCpnRows->scanFiles("eyelet");
$eyeletIconsList=$readyForSetCpnRows->scanFiles("eyelet/icons");
$eyelet=new ComponentFilesInfo(1,"eyelet","鞋带孔","$eyeletRows","$eyeletTotal",$eyeletList,$eyeletIconsList);

$laceRows=$readyForSetCpnRows->setRowNum("lace");
$laceTotal=$readyForSetCpnRows->countFiles("lace");
$laceList=$readyForSetCpnRows->scanFiles("lace");
$laceIconsList=$readyForSetCpnRows->scanFiles("lace/icons");
$lace=new ComponentFilesInfo(2,"lace","鞋带","$laceRows","$laceTotal",$laceList,$laceIconsList);

$quartersRows=$readyForSetCpnRows->setRowNum("quarters");
$quartersTotal=$readyForSetCpnRows->countFiles("quarters");
$quartersList=$readyForSetCpnRows->scanFiles("quarters");
$quartersIconsList=$readyForSetCpnRows->scanFiles("quarters/icons");
$quarters=new ComponentFilesInfo(3,"quarters","鞋身中段","$quartersRows","$quartersTotal",$quartersList,$quartersIconsList);

$toe_capRows=$readyForSetCpnRows->setRowNum("toe_cap");
$toe_capTotal=$readyForSetCpnRows->countFiles("toe_cap");
$toe_capList=$readyForSetCpnRows->scanFiles("toe_cap");
$toe_capIconsList=$readyForSetCpnRows->scanFiles("toe_cap/icons");
$toe_cap=new ComponentFilesInfo(4,"toe_cap","足尖","$toe_capRows","$toe_capTotal",$toe_capList,$toe_capIconsList);

$tongueRows=$readyForSetCpnRows->setRowNum("tongue");
$tongueTotal=$readyForSetCpnRows->countFiles("tongue");
$tongueList=$readyForSetCpnRows->scanFiles("tongue");
$tongueIconsList=$readyForSetCpnRows->scanFiles("tongue/icons");
$tongue=new ComponentFilesInfo(5,"tongue","鞋舌头","$tongueRows","$tongueTotal",$tongueList,$tongueIconsList);

$vampRows=$readyForSetCpnRows->setRowNum("vamp");
$vampTotal=$readyForSetCpnRows->countFiles("vamp");
$vampList=$readyForSetCpnRows->scanFiles("vamp");
$vampIconsList=$readyForSetCpnRows->scanFiles("vamp/icons");
$vamp=new ComponentFilesInfo(6,"vamp","鞋面","$vampRows","$vampTotal",$vampList,$vampIconsList);




$dataMatrix = array(
	$edge,
	$eyelet,
	$lace,
	$quarters,
	$toe_cap,
	$tongue,
	$vamp
);

function ABSDirToRELDir($array){
	
	foreach($array as $key => $value){
		$array[$key]=str_replace("D:/Leather Shoe Design",".",$value);
	}
	return $array;
}


//window.parent.mainframe.location.reload();
?>

</head>

<body bgcolor="#666666">
<h3 align="center"><font color="#FFFFFF">订制面板</font></h3>
<?
for($n=0; $n<count($dataMatrix); $n++){
	$currComponentName=$dataMatrix[$n]->__get(name);//英文名
	$currComponentChineseName=$dataMatrix[$n]->__get(chineseName);//中文名
	$currComponentNeedRows=$dataMatrix[$n]->__get(needRows);//前台需要循环的行数
	$currComponentTotalNum=$dataMatrix[$n]->__get(totalNum);//部件图像在文佳夹下的数量
	$currComponentFilesList=$dataMatrix[$n]->__get(filesList);//部件图像队列
	$currComponentIconsList=ABSDirToRELDir($dataMatrix[$n]->__get(iconsList));//部件图标队列
	//echo count($currComponentFilesList);
	?>
	<hr />
        
	<h3><font color="#FFFFFF"><?=$currComponentChineseName?></font></h3>
	  <form action="" method="post" name="<?=$currComponentName?>"><!-- 循环部件的表格 -->
  <table width="270" border="0" cellspacing="2" cellpadding="1">
  	<?
	$index=0;
    for ($i=0; $i<$currComponentNeedRows; $i++)//前台需要循环的行数
	{	
		$col1Mark = $index;//回归数
		$col2Mark = $index+1;
		$col3Mark = $index+2;
		?>
        <tr>
        <!-- 第一列 -->
		<?
        	if($col1Mark<$currComponentTotalNum){
				//echo $index;
				$index++;
		?>
        	<td width="90" align="center"><img src="<?=$currComponentIconsList[$col1Mark]?>" height="100" width="100"/></td>
            <?
			}else{?>
			<td width="90">&nbsp;</td>
			<?
            }
			?>
          <!-- 第二列 -->
        <?
        	if($col2Mark<$currComponentTotalNum){
				//echo $index;
				$index++;
		?>
        	<td width="90" align="center"><img src="<?=$currComponentIconsList[$col2Mark]?>" height="100" width="100"/></td>
            <?
			}else{?>
			<td width="90">&nbsp;</td>
			<?
            }
			?>
            <!-- 第三列 -->
        <?
        	if($col3Mark<$currComponentTotalNum){
				//echo $index;
				$index++;
		?>
        	<td width="90" align="center"><img src="<?=$currComponentIconsList[$col3Mark]?>" height="100" width="100"/></td>
            <?
			}else{?>
			<td width="90">&nbsp;</td>
			<?
            }
			?>
        </tr>
        <tr>
        <!-- 第一列 -->
        <?
        	if($col1Mark<$currComponentTotalNum){
		?>
        	<td align="center"><input type="radio" name="<?=$currComponentName?>" value="<?=$currComponentFilesList[$col1Mark]?>" id="1" onclick='send("<?=$currComponentName?>")'  /></td>
            <?
			
			}else{?>
			<td>&nbsp;</td>
			<?
            }
			?>
            <!-- 第二列 -->
            <?
        	if($col2Mark<$currComponentTotalNum){
		?>
        	<td align="center"><input type="radio" name="<?=$currComponentName?>" value="<?=$currComponentFilesList[$col2Mark]?>" id="1" onclick='send("<?=$currComponentName?>")' /></td>
            <?
			
			}else{?>
			<td>&nbsp;</td>
			<?
            }
			?>
            <!-- 第三列 -->
            <?
        	if($col3Mark<$currComponentTotalNum){
		?>
        	<td align="center"><input type="radio" name="<?=$currComponentName?>" value="<?=$currComponentFilesList[$col3Mark]?>" id="1" onclick='send("<?=$currComponentName?>")'  /></td>
            <?
			
			}else{?>
			<td>&nbsp;</td>
			<?
            }
			?>
        	
        </tr>
        <?
		
	}
	?>
   </table>
  </form>
	
	
	<?
	
}
?>

</body>
</html>