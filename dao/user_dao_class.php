
<?
/*
 * class user dao class ��װ�������û�ִ�����ݿ������
 */
include_once("D:\Leather Shoe Design\class\mysql_class.php");
include_once("D:\Leather Shoe Design\class\user_class.php");

	class userDao{//���û���Ϣ�����ݿ⽻���Ĳ������з�װ
		function insertUser($user){//�����ݿ��в���һ���û���Ϣ
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
			
			$db->fn_insert('users','id,user_name,password,cell_phone,Email,address,first_name,last_name,postcode',"'$id','$userName','$password','$cellphone','$Email','$address','$firstName','$lastName','$postcode'");//ִ�в������
	
			$db->close();//�ر����ݿ�
		}
		
		function deleteUser($arr,$log){//�����ݿ���ɾ��һ���û������෽��������Խ�һ���Ż���Ŀǰ����ʵ�֣����������ͷ������ò������ѡ��
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//�����߼��ṹ
			//echo $db->where($arr,$log);
			$db->fn_delete('users');//ִ��ɾ������
			$db->close();//�ر����ݿ�
			
		}
			
		function selectUser($arr,$log,$fields){//�����ݿ��в�ѯ�û���Ϣ
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//�����߼��ṹ
			
			$result=$db->fn_select('users',$fields);//ִ�в�ѯ����
			$db->close();//�ر����ݿ�
			//print_r($result);
			return $result;
			
		
		}
		
		function updateUser($field,$value,$arr,$log){//�����û���Ϣ
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$db->where($arr,$log);//�����߼��ṹ
			$db->fn_update('users',$field,$value);//ִ�и��²���
			$db->close();//�ر����ݿ�
			
			
		}
		
		
	}

//$user = new user('1000000000','tester','123456','15165504512','7347476@qq.com','1234 abc road','��','��','255000');
//$user->id="1000000000";
//$user->userName="tester";
//$user->password="123456";
//$user->cellphone="15165504512";
//$user->Email="7347476@qq.com";
//$user->address="1234 abc road";
//$user->firstName="��";
//$user->lastName="��";
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