<?
class order{
		private $id;
		private $user_id;
		private $user_name;
		private $product_id;
		private $product_name;
		private $components_list;
		
		
		
		function __construct(
		$id,
		$user_id,
		$user_name,
		$product_id,
		$product_name,
		$components_list
	){//初始化
			$this->id=$id;
			$this->user_id=$user_id;
			$this->user_name=$user_name;
			$this->product_id=$product_id;
			$this->product_name=$product_name;
			$this->components_list=$components_list;
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
?>