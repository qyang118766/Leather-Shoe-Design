<?PHP
/*
 * class user
 */

	class ComponentFilesInfo{
		private $id;
		private $name;
		private $chineseName;
		private $needRows;
		private $totalNum;
		private $filesList = array();
		private $iconsList = array();
		
		
		
		function __construct(
		$id,
		$name,
		$chineseName,
		$needRows,
		$totalNum,
		$filesList,
		$iconsList
	){//初始化
			$this->id=$id;
			$this->name=$name;
			$this->chineseName=$chineseName;
			$this->needRows=$needRows;
			$this->totalNum=$totalNum;
			$this->filesList=$filesList;
			$this->iconsList=$iconsList;
		}
		
		function __get($property_name){//访问私有变量权限
			if(isset($this->$property_name))
			{
				return($this->$property_name);
			}
			else
			{
				return(NULL);
			}
		}
		
		function __set($property_name, $value){//给私有变量赋值
			$this->$property_name = $value;
			
			
		}
		
	}
	/*$iii= array("123","456");
	$top=new ComponentFilesInfo(7,"top","鞋面","2","5",$iii);
	print_r($top->__get(filesList));*/




?>