<?PHP
/*
 * class user
 */

	class ComponentsPicsGroup{
		private $edge;
		private $eyelet;
		private $lace;
		private $quarters;
		private $toe_cap;
		private $tongue;
		private $vamp;
	
		function __construct(
		$edge,
		$eyelet,
		$lace,
		$quarters,
		$toe_cap,
		$tongue,
		$vamp	
	){//初始化
			$this->edge=$edge;
			$this->eyelet=$eyelet;
			$this->lace=$lace;
			$this->quarters=$quarters;
			$this->toe_cap=$toe_cap;
			$this->tongue=$tongue;
			$this->vamp=$vamp;
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