
<?
/*
 * class user dao class 封装对所有用户执行数据库操作类
 */
include_once("D:\Leather Shoe Design\class\mysql_class.php");
include_once("D:\Leather Shoe Design\class\user_class.php");

	class userDao{//对用户信息与数据库交换的操作进行封装
		function insertUser($user){//向数据库中插入一个用户信息
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$id=$user->id;
			$userName=$user->userName;
			$password=$user->password;
			$cellphone=$user->cellphone;
			$Email=$user->Email;
			$address=$user->address;
			$firstName=$user->firstName;
			$lastName=$user->lastName;
			$postcode=$user->postcode;
			//$dateCreated=$user->dateCreated;
			
			$db->fn_insert('users','id,user_name,password,cell_phone,Email,address,first_name,last_name,postcode',"'$id','$userName','$password','$cellphone','$Email','$address','$firstName','$lastName','$postcode'");//执行插入操作
	
			$db->close();//关闭数据库
		}
		
		function deleteUser($arr,$log){//从数据库中删除一个用户（此类方法代码可以进一步优化，目前可以实现，但冗余代码和方法调用不是最佳选择）
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//构造逻辑结构
			//echo $db->where($arr,$log);
			$db->fn_delete('users');//执行删除操作
			$db->close();//关闭数据库
			
		}
			
		function selectUser($arr,$log,$fields){//从数据库中查询用户信息
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//构造逻辑结构
			
			$result=$db->fn_select('users',$fields);//执行查询操作
			$db->close();//关闭数据库
			//print_r($result);
			return $result;
			
		
		}
		
		function updateUser($field,$value,$arr,$log){//更新用户信息
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$db->where($arr,$log);//构造逻辑结构
			$db->fn_update('users',$field,$value);//执行更新操作
			$db->close();//关闭数据库
			
			
		}
		
		
	}

//$user = new user('1000000000','tester','123456','15165504512','7347476@qq.com','1234 abc road','三','张','255000');
//$user->id="1000000000";
//$user->userName="tester";
//$user->password="123456";
//$user->cellphone="15165504512";
//$user->Email="7347476@qq.com";
//$user->address="1234 abc road";
//$user->firstName="三";
//$user->lastName="张";
//$user->postcode="255000";
//
//echo $user->password;
//
//$arr=array("id"=>"$user->id");
//$user_dao = new userDao();
//$user_dao->insertUser($user);
////$user_dao->deleteuser($arr,'AND');
////$user_dao->selectuser($arr,'OR','*');




?>