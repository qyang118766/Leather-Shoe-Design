<?
/*
*用于操作flex服务器oracle的类，主要作用比较局限，功能简约
*/
class oracle{
	 private $host;//主机url地址，会经常变，所以每次重启EC2，需要更换
     private $name;
     private $pass;
     private $db;
     private $ut;
	 
	 function __construct($host,$name,$pass,$db,$ut){//初始化数据库信息
     	$this->host=$host;
     	$this->name=$name;
     	$this->pass=$pass;
     	$this->db=$db;
     	$this->ut=$ut;
     	$this->connect();

     }
	 
	 function connect(){//连接数据库
      $conn = oci_connect($this->name, $this->pass, "//".$this->host."/".$this->db);
	  	if (!$conn) {
 	 		$e = oci_error();
  			print htmlentities($e['message']);
  			exit;
	  	}else{
			echo "yes";
		}
     }	
}

$db_conn = new oracle("18.163.41.90","pds","pds","WIND","GBK");

?>