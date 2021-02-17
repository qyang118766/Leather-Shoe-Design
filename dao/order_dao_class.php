
<?
/*
 * class Order dao class ��װ�����ж���ִ�����ݿ������
 */
include_once("D:\Leather Shoe Design\class\mysql_class.php");
include_once("D:\Leather Shoe Design\class\order_class.php");

	class OrderDao{//�Զ�����Ϣ�����ݿ⽻���Ĳ������з�װ
		function insertOrder($order){//�����ݿ��в���һ��������Ϣ
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$id=$order->id;
			$user_id=$order->user_id;
			$user_name=$order->user_name;
			$product_id=$order->product_id;
			$product_name=$order->product_name;
			$components_list=$order->components_list;
			
			//$dateCreated=$order->dateCreated;
			//��������δ֪
			$db->fn_insert('orders_latest','id,user_id,user_name,product_id,product_name,components_list',"'$id','$user_id','$user_name','$product_id','$product_name','$components_list'");//ִ�в������order_latest
	
			$db->fn_insert('orders_all','id,user_id,user_name,product_id,product_name,components_list',"'$id','$user_id','$user_name','$product_id','$product_name','$components_list'");//ִ�в������order_all
			
			$db->close();//�ر����ݿ�
		}
		
		function deleteOrder($arr,$log){//�����ݿ���ɾ��һ�����������෽��������Խ�һ���Ż���Ŀǰ����ʵ�֣����������ͷ������ò������ѡ��
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//�����߼��ṹ
			//echo $db->where($arr,$log);
			$db->fn_delete('orders_latest');//ִ��ɾ������
			$db->close();//�ر����ݿ�
			
		}
		
		function deleteAll(){
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$db->fn_delete('orders_latest',NULL);//ִ��ɾ������
			$db->close();//�ر����ݿ�
		}
			
		function selectOrder($arr,$log,$fields){//�����ݿ��в�ѯ������Ϣ
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//�����߼��ṹ
			
			$result=$db->fn_select('orders_latest',$fields);//ִ�в�ѯ����
			//print_r($result);
			return $result;
			$db->close();//�ر����ݿ�
		
		}
		
		function numOrder(){
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$result=$db->fn_count('orders_latest',NULL);
			return $result;
		}
		
		
		function updateOrder($field,$value,$arr,$log){//���¶�����Ϣ
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$db->where($arr,$log);//�����߼��ṹ
			$db->fn_update('orders_latest',$field,$value);//ִ�и��²���
			$db->close();//�ر����ݿ�
			
			
		}
		
		
	}

/*$order = new Order('','1234567890','testest','10086','С��Ƥ','asdsadsadsafsafsagsag');

$order_dao = new OrderDao();
$order_dao->insertOrder($order);
*/




?>