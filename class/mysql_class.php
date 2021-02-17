
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<?php
/*
 * class mysql
 */

   class mysql{//���ݿ�������


     private $host;
     private $name;
     private $pass;
     private $db;
     private $ut;



     function __construct($host,$name,$pass,$db,$ut){//��ʼ�����ݿ���Ϣ
     	$this->host=$host;
     	$this->name=$name;
     	$this->pass=$pass;
     	$this->db=$db;
     	$this->ut=$ut;
     	$this->connect();

     }


     function connect(){//�������ݿ�
      $conn=mysql_connect($this->host,$this->name,$this->pass) or die ($this->error());
      mysql_select_db($this->db,$conn) or die("���ݿ����Ӵ���δ���ҵ������ݿ⣺".$this->db);
      mysql_query("SET NAMES '$this->ut'");
     }

	function query($sql, $type = '') {
	    if(!($query = mysql_query($sql))) $this->show('Say:', mysql_error());
	    return $query;
	}

    function show($message = '', $sql = '') {
		if(!$sql) echo $message;
		else echo $message.'<br>'.$sql;
	}

    function affected_rows() {//��ѯ����޸Ľ��
		return mysql_affected_rows();
	}

	function result($query, $row) {
		return mysql_result($query, $row);
	}

	function num_rows($query) {
		return mysql_num_rows($query);
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		return mysql_insert_id();
	}

	function fetch_row($query) {
		return mysql_fetch_row($query);
	}

	function version() {
		return mysql_get_server_info();
	}

	function close() {
		return mysql_close();
	}


   //==============
   
    function where($options,$logic){//�߼���ϵ
		$where='';
		if(is_array($options)){
			$join=array();
			foreach($options as $key =>$val){
				
				$condition=$key.'='.'\''.$val.'\'';
				$join[]=$condition;//���߼���ϵ��������
				
			}		
			$where='WHERE '.join(" $logic ",$join);//�������е�Ԫ����and�����Է���sql���Ҫ��
		}else{
			if(NULL!=$options) $where='WHERE '.$options;	
		}
		
		$this->where=$where;
		return $this->where;
		
	}
	
	function order($field){//�߼���ϵ
		$order='';
		if(isset($field)){
			$order='order by '.$field;
		}
		
		$this->order=$order;
		return $this->order;
		
	} 
	 
   

    function fn_insert($table,$fields,$values){//��������
		$sql="INSERT INTO $table ($fields) value ($values)";
		//echo $sql;
    	$this->query($sql);
		
    }
	
	function fn_delete($table,$conditions){//ɾ������
		if($conditions == NULL){
			$sql="DELETE FROM $table";
		}else{
			$sql="DELETE FROM $table $this->where";
		}
		
		$this->query($sql);	
		//echo $sql;
	}
	
	function fn_update($table,$field,$value){//��������
		$sql="UPDATE $table SET $field = $value $this->where";
		//echo $sql;
		$this->query($sql);
	}
	
	function fn_select($table,$fields){//�鿴����
		$sql="SELECT $fields FROM $table $this->where";
		//echo $sql;
		$query=$this->query($sql);
		$result=array();
		while($row=$this->fetch_row($query)){
			//print_r($row);
			//return $row;
			$result[]=$row;	
		}
		return $result;
		
	}
	
	function fn_count($table,$conditon){//��ѯ������
		if($conditon !== NULL){
			$sql="SELECT COUNT(*) FROM $table $this->where";
		}else{
			$sql="SELECT COUNT(*) FROM $table";
		}
		//echo $sql;
		$query=$this->query($sql);
		if($rs=$this->fetch_row($query)){
			$total=$rs[0];
		}else{
			$total=0;
		}
		//echo $total;
		return $total;
	}
	
	function fn_join($fields,$table1,$table2,$field1,$field2,$field3,$key){//������
		$sql="SELECT $fields FROM $table1 inner join $table2 ON $table1.$field1=$table2.$field2 WHERE $table1.$field3='$key'";
		//$sql;
		$query=$this->query($sql);
		$result=array();
		while($row=$this->fetch_row($query)){
			$result[]=$row;	
		}
		//print_r($result);
		return $result;
		
	}
	function fn_search($fields,$table,$field,$key){//ģ��Ψһ����
		$sql="SELECT DISTINCT $fields FROM $table WHERE $field LIKE '%$key%'";
		//echo $sql;
		$query=$this->query($sql);
		$result=array();
		while($row=$this->fetch_row($query)){
			$result[]=$row;	
		}
		//print_r($result);
		return $result;
	}
	


   }


  //$db =  new mysql('localhost','root','','university_library',"GBK");

 // $db->fn_insert('test','id,name,age,gender',"'','����Ա','30','��'");



?>
