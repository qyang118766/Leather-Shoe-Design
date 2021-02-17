
<?
/*
 * class Order dao class 封装对所有订单执行数据库操作类
 */
include_once("D:\Leather Shoe Design\class\mysql_class.php");
include_once("D:\Leather Shoe Design\class\order_class.php");

	class OrderDao{//对订单信息与数据库交换的操作进行封装
		function insertOrder($order){//向数据库中插入一个订单信息
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$id=$order->id;
			$user_id=$order->user_id;
			$user_name=$order->user_name;
			$product_id=$order->product_id;
			$product_name=$order->product_name;
			$components_list=$order->components_list;
			
			//$dateCreated=$order->dateCreated;
			//方法风险未知
			$db->fn_insert('orders_latest','id,user_id,user_name,product_id,product_name,components_list',"'$id','$user_id','$user_name','$product_id','$product_name','$components_list'");//执行插入操作order_latest
	
			$db->fn_insert('orders_all','id,user_id,user_name,product_id,product_name,components_list',"'$id','$user_id','$user_name','$product_id','$product_name','$components_list'");//执行插入操作order_all
			
			$db->close();//关闭数据库
		}
		
		function deleteOrder($arr,$log){//从数据库中删除一个订单（此类方法代码可以进一步优化，目前可以实现，但冗余代码和方法调用不是最佳选择）
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//构造逻辑结构
			//echo $db->where($arr,$log);
			$db->fn_delete('orders_latest');//执行删除操作
			$db->close();//关闭数据库
			
		}
		
		function deleteAll(){
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$db->fn_delete('orders_latest',NULL);//执行删除操作
			$db->close();//关闭数据库
		}
			
		function selectOrder($arr,$log,$fields){//从数据库中查询订单信息
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			
			$db->where($arr,$log);//构造逻辑结构
			
			$result=$db->fn_select('orders_latest',$fields);//执行查询操作
			//print_r($result);
			return $result;
			$db->close();//关闭数据库
		
		}
		
		function numOrder(){
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$result=$db->fn_count('orders_latest',NULL);
			return $result;
		}
		
		
		function updateOrder($field,$value,$arr,$log){//更新订单信息
			$db =  new mysql('localhost','root','','shoe_design',"GBK");
			$db->where($arr,$log);//构造逻辑结构
			$db->fn_update('orders_latest',$field,$value);//执行更新操作
			$db->close();//关闭数据库
			
			
		}
		
		
	}

/*$order = new Order('','1234567890','testest','10086','小羊皮','asdsadsadsafsafsagsag');

$order_dao = new OrderDao();
$order_dao->insertOrder($order);
*/




?>