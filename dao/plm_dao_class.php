
<?
/*
 * class user dao class 封装对所有用户执行数据库操作类
 */
include_once("D:\Leather Shoe Design\class\oracle_plm_class.php");
//include_once("D:\Leather Shoe Design\class\user_class.php");

	class OraclePLMDao{//对PLM材料交互信息与数据库的操作进行封装
		private $PLMServerPublicURL;
		private $dbUserName;
		private $dbPassword;
		private $dbName;
		
		function __construct(
		 $PLMServerPublicURL,
		 $dbUserName,
		 $dbPassword,
		 $dbName)
		 {//初始化
			$this->PLMServerPublicURL=$PLMServerPublicURL;
			$this->dbUserName=$dbUserName;
			$this->dbPassword=$dbPassword;
			$this->dbName=$dbName;
		}	
		
		function getALLMaterialPrimaryImageURL(){//提取所有材料部件的主图像等信息(部件名称，图像位置，缩略图索引)
			$connection = oci_connect($this->dbUserName, $this->dbPassword, "//".$this->PLMServerPublicURL."/".$this->dbName);//连接准备信息
			$db_conn = new oracle($connection);//初始化数据库连接已经建立了连接检查
			$results = $db_conn->select("PTC_STR_29TYPEINFOLCSMATERIA,PRIMARYIMAGEURL,BRANCHIDITERATIONINFO,ptc_lng_1typeInfoLCSMaterial","pds.latestiterlcsmaterial","ptc_bln_2typeInfoLCSMaterial = 1 and PRIMARYIMAGEURL <> ' ' and PTC_STR_29TYPEINFOLCSMATERIA in ('quarters','vamp','edge','eyelet','lace','toecap','tongue')");
			$db_conn->closeDB($connection);
			return $results;
		}
		
		function getALLMaterialIconURL($arr){//提取所有材料部件的缩略图位置
			$connection = oci_connect($this->dbUserName, $this->dbPassword, "//".$this->PLMServerPublicURL."/".$this->dbName);//连接准备信
			$db_conn = new oracle($connection);//初始化数据库连接已经建立了连接检查
			$prefix = "VR:com.lcs.wc.material.LCSMaterial:";
			$arrSearch = "";
			for($i=0;$i<count($arr);$i++){//index 2 是要用的
				if($i != count($arr)-1){//不是最后一个的时候
					$arrSearch .= "'".$prefix.$arr[$i][2]."'".",";
				}else{
					$arrSearch .= "'".$prefix.$arr[$i][2]."'";
				}
			}
			//echo $arrSearch;
			$results = $db_conn->select("ptc_str_17typeInfoLCSDocumen,THUMBNAILLOCATION","pds.LCSDOCUMENT","THUMBNAILLOCATION <> ' ' and ptc_str_20typeInfoLCSDocumen = 'customizedicon' and ptc_str_17typeInfoLCSDocumen in ($arrSearch)");
			$db_conn->closeDB($connection);
			return $results;			
		}
		
		function arrCombinforFinal($resPrimary,$resIcon){
			if(count($resPrimary) != count($resIcon)){
				echo "提取主图像数目与图标数目不匹配，程序终止，请联系PLM管理员！";
				exit;
			}
			$prefix = "VR:com.lcs.wc.material.LCSMaterial:";
			$finalArray = array();
			for($i=0;$i<count($resPrimary);$i++){
				$matchPI = $prefix.$resPrimary[$i][2];//example: VR:com.lcs.wc.material.LCSMaterial:1012345
				for($j=0;$j<count($resIcon);$j++){
					if($matchPI == $resIcon[$j][0]){
						$resPrimary[$i][2] = $resIcon[$j][1];
					}
				}
			}
			$finalArray = $resPrimary;
			return $finalArray;
		}		
	}

/*$test = new OraclePLMDao("18.163.102.102","pds","pds","WIND");
$res1=$test->getALLMaterialPrimaryImageURL();
$res2=$test->getALLMaterialIconURL($res1);
for($i=0;$i<count($res1);$i++){
	echo $res1[$i][0]." ".$res1[$i][1]." ".$res1[$i][2]." ".$res1[$i][3]."<br >";
}
echo "--------------------------<br >";
for($i=0;$i<count($res2);$i++){
	echo $res2[$i][0]." ".$res2[$i][1]."<br >";
}
echo "--------------------------<br >";

$res3 = $test->arrCombinforFinal($res1,$res2);
for($i=0;$i<count($res3);$i++){
	echo $res3[$i][0]." ".$res3[$i][1]." ".$res3[$i][2]." ".$res1[$i][3]."<br >";
}*/

?>