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
session_start();//����session
if($_SESSION['id']==NULL){//���δ�ܵõ�session,ֱ���˳�
	echo "<script language=\"javascript\">alert('���ȵ�¼');history.back(-1)</script>";
	exit;
}
$readyForSetCpnRows=new GetFiles();

$edgeRows=$readyForSetCpnRows->setRowNum("edge");
$edgeTotal=$readyForSetCpnRows->countFiles("edge");
$edgeList=$readyForSetCpnRows->scanFiles("edge");
$edgeIconsList=$readyForSetCpnRows->scanFiles("edge/icons");
$edge=new ComponentFilesInfo(0,"edge","Ь�ױ�Ե","$edgeRows","$edgeTotal",$edgeList,$edgeIconsList);

$eyeletRows=$readyForSetCpnRows->setRowNum("eyelet");
$eyeletTotal=$readyForSetCpnRows->countFiles("eyelet");
$eyeletList=$readyForSetCpnRows->scanFiles("eyelet");
$eyeletIconsList=$readyForSetCpnRows->scanFiles("eyelet/icons");
$eyelet=new ComponentFilesInfo(1,"eyelet","Ь����","$eyeletRows","$eyeletTotal",$eyeletList,$eyeletIconsList);

$laceRows=$readyForSetCpnRows->setRowNum("lace");
$laceTotal=$readyForSetCpnRows->countFiles("lace");
$laceList=$readyForSetCpnRows->scanFiles("lace");
$laceIconsList=$readyForSetCpnRows->scanFiles("lace/icons");
$lace=new ComponentFilesInfo(2,"lace","Ь��","$laceRows","$laceTotal",$laceList,$laceIconsList);

$quartersRows=$readyForSetCpnRows->setRowNum("quarters");
$quartersTotal=$readyForSetCpnRows->countFiles("quarters");
$quartersList=$readyForSetCpnRows->scanFiles("quarters");
$quartersIconsList=$readyForSetCpnRows->scanFiles("quarters/icons");
$quarters=new ComponentFilesInfo(3,"quarters","Ь���ж�","$quartersRows","$quartersTotal",$quartersList,$quartersIconsList);

$toe_capRows=$readyForSetCpnRows->setRowNum("toe_cap");
$toe_capTotal=$readyForSetCpnRows->countFiles("toe_cap");
$toe_capList=$readyForSetCpnRows->scanFiles("toe_cap");
$toe_capIconsList=$readyForSetCpnRows->scanFiles("toe_cap/icons");
$toe_cap=new ComponentFilesInfo(4,"toe_cap","���","$toe_capRows","$toe_capTotal",$toe_capList,$toe_capIconsList);

$tongueRows=$readyForSetCpnRows->setRowNum("tongue");
$tongueTotal=$readyForSetCpnRows->countFiles("tongue");
$tongueList=$readyForSetCpnRows->scanFiles("tongue");
$tongueIconsList=$readyForSetCpnRows->scanFiles("tongue/icons");
$tongue=new ComponentFilesInfo(5,"tongue","Ь��ͷ","$tongueRows","$tongueTotal",$tongueList,$tongueIconsList);

$vampRows=$readyForSetCpnRows->setRowNum("vamp");
$vampTotal=$readyForSetCpnRows->countFiles("vamp");
$vampList=$readyForSetCpnRows->scanFiles("vamp");
$vampIconsList=$readyForSetCpnRows->scanFiles("vamp/icons");
$vamp=new ComponentFilesInfo(6,"vamp","Ь��","$vampRows","$vampTotal",$vampList,$vampIconsList);




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
<h3 align="center"><font color="#FFFFFF">�������</font></h3>
<?
for($n=0; $n<count($dataMatrix); $n++){
	$currComponentName=$dataMatrix[$n]->__get(name);//Ӣ����
	$currComponentChineseName=$dataMatrix[$n]->__get(chineseName);//������
	$currComponentNeedRows=$dataMatrix[$n]->__get(needRows);//ǰ̨��Ҫѭ��������
	$currComponentTotalNum=$dataMatrix[$n]->__get(totalNum);//����ͼ�����ļѼ��µ�����
	$currComponentFilesList=$dataMatrix[$n]->__get(filesList);//����ͼ�����
	$currComponentIconsList=ABSDirToRELDir($dataMatrix[$n]->__get(iconsList));//����ͼ�����
	//echo count($currComponentFilesList);
	?>
	<hr />
        
	<h3><font color="#FFFFFF"><?=$currComponentChineseName?></font></h3>
	  <form action="" method="post" name="<?=$currComponentName?>"><!-- ѭ�������ı�� -->
  <table width="270" border="0" cellspacing="2" cellpadding="1">
  	<?
	$index=0;
    for ($i=0; $i<$currComponentNeedRows; $i++)//ǰ̨��Ҫѭ��������
	{	
		$col1Mark = $index;//�ع���
		$col2Mark = $index+1;
		$col3Mark = $index+2;
		?>
        <tr>
        <!-- ��һ�� -->
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
          <!-- �ڶ��� -->
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
            <!-- ������ -->
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
        <!-- ��һ�� -->
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
            <!-- �ڶ��� -->
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
            <!-- ������ -->
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