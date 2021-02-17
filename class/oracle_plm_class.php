<?
/*
*用于操作flex服务器oracle的类，主要作用比较局限，功能简约
*/
class oracle{
	 private $connection;//主机url地址，会经常变，所以每次重启EC2，需要更换
    
	 
	 function __construct($connection){//初始化数据库信息
     	$this->connection=$connection;
     	$this->connect($this->connection);

     }
	 
	 function connect($connection){//连接数据库
      //$conn = $connection;//oci_connect($this->name, $this->pass, "//".$this->host."/".$this->db);
	  	if (!$connection) {
 	 		$e = oci_error();
  			print htmlentities($e['message']);
  			exit;
     	}
	 }
	 
	 function select($fileds,$table,$conditions){
		 $sql = "select ".$fileds." from ".$table." where ".$conditions;
		 //echo $sql;
		 $stmt=oci_parse($this->connection,$sql);//编译语句
		 oci_execute($stmt,OCI_DEFAULT);//执行语句
		 $result=array();
		 while($row=oci_fetch_row($stmt)) {
    		//echo  $row [ 0 ].$row [ 1 ]. "<br>\n" ;
			$result[]=$row;	
		}
		
		oci_free_statement($stmt);
		return $result;	 
	 }
	 
	 
	 function closeDB($connection){//关闭连接
		 return oci_close($connection);
	}
}
/*$connection = oci_connect('pds', 'pds', '//18.163.77.36/WIND');
$db_conn = new oracle($connection);
$res=$db_conn->select("PTC_STR_1TYPEINFOLCSMATERIAL,PRIMARYIMAGEURL","pds.lcsmaterial","PTC_STR_1TYPEINFOLCSMATERIAL='quarter0' or PTC_STR_1TYPEINFOLCSMATERIAL='vamp1'");
//print_r($res);
for($i=0;$i<count($res);$i++){
	echo $res[$i][0]." ".$res[$i][1]."<br >";
}
$db_conn->closeDB($connection);*/
?>