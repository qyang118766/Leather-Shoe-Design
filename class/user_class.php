<?PHP
/*
 * class user
 */

	class user{
		private $id;
		private $userName;
		private $password;
		private $cellphone;
		private $Email;
		private $address;
		private $firstName;
		private $lastName;
		private $postcode;
		private $dateCreated;
		
		
		function __construct(
		$id,
		$userName,
		$password,
		$cellphone,
		$Email,
		$address,
		$firstName,
		$lastName,
		$postcode
	){//初始化
			$this->id=$id;
			$this->userName=$userName;
			$this->password=$this->passSecurity($password);
			$this->cellphone=$cellphone;
			$this->Email=$Email;
			$this->address=$address;
			$this->firstName=$firstName;
			$this->lastName=$lastName;
			$this->postcode=$postcode;
			//$this->dateCreated=$dateCreated;
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
	
		function passSecurity($password){
			return $this->password=md5($password);
		}

		
	}

	//$student1 = new student('04','44556','王娜','2','化工','有机化学','3','25','女','1345565474','rrty888@gmail.com','5','0','普通');
	//$student1->id="113452";
	//$student1->password="0036789hgf";
	//$student1->pass_security();
	//$student1->avl_borrow_num="8";
	//echo $student1->avl_borrow_num;
	//echo $student1->password;
	//echo $student1->password;




?>