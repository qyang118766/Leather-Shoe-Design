<?
/*
	获取图片文件信息
*/

class GetFiles{
	private $baseDir="D:/Leather Shoe Design/pics/leathertest/";
	
	function scanFiles($component){
		//$baseDir="../pics/";
		$fullDir=$this->baseDir.$component."/";
		//echo $fullDir."</br >";
		if(!is_dir($fullDir)){
        	return false;
   		 }
		$handler = opendir($fullDir);
		//$files=array();
		while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
		
        	if ($filename != "." && $filename != "..") {
				$checkType=pathinfo($filename, PATHINFO_EXTENSION);
                if($checkType=="jpg" || $checkType=="png") $files[] = $fullDir.$filename ;
				
           }
		   
       }
	   closedir($handler);
	   return $files;
    
	}
	
	function countFiles($component){
		$totalRowNum = count($this->scanFiles($component));//默认+1
		return $totalRowNum;
	}
	
	function setRowNum($component){
		$totalRowNum = $this->countFiles($component);
		//echo $totalRowNum % 3;
		if ($totalRowNum % 3 == 0) $rowNum = $totalRowNum/3;
		else $rowNum = intval(floor($totalRowNum/3))+1;
		return $rowNum;
	}	

}

/*$p=new GetFiles();
$res=$p->scanFiles("edge");
print_r($res);*/

/*$p=new GetFiles();
$res=$p->setRowNum("top");
echo $res;
echo $p->countFiles("top");*/


?>