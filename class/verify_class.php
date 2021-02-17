<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<?
//验证用户输入信息合法性正则判断


class verify{//检查用户信息输入合法性
	function isUSN($username){//验证用户名是否合法，只能是数字，字母大小写，特殊符号，中文组成，4-16位
		$match='/^[a-zA-Zxa0-xff_][0-9a-zA-Zxa0-xff_]{4,16}$/';
		if(empty($username) || strlen($username)<4 ||  strlen($username)>16){
			//echo "输入非法，请输入介于6-20位的密码，由字母数字以及特殊符号构成";
			return false;	
			
		}else if(preg_match($match,$username)){
			//echo "验证成功";
			return true;
		}else{
			//echo "输入非法";
			return false;	
		}
	}


	function isPWD($password){//验证密码是否符合要求（6-20位，且只有数字和字母以及特殊符号组成）
		$match='/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/';
		if(empty($password) || strlen($password)<6 ||  strlen($password)>20){
			//echo "输入非法，请输入介于6-20位的密码，由字母数字以及特殊符号构成";
			return false;	
			
		}else if(preg_match($match,$password)){
			//echo "验证成功";
			return true;
		}else{
			//echo "输入非法";
			return false;	
		}
		
	}
	
	function isEMAIL($email){
		$match='/^[\w\d]+[\w\d-.]*@[\w\d-.]+\.[\w\d]{2,10}$/i';
		if(empty($email) || strlen($email)<4 || strlen($email)>50){
			//echo "输入非法";
			return false;
		}else if(preg_match($match,$email)){
			//echo "输入正确";
			return true;
		}else{
			//echo "输入不正确";
			return false;	
		}		
		
	}
	
	function isPHO($phone){
		$match='/^1[345678]{1}\d{9}$/';
		if(empty($phone) || strlen($phone)!=11){
			//echo "位数不正确";
			return false;
		}else if(preg_match($match,$phone)){
			//echo "输入正确";
			return true;
		}else{
			//echo "输入不正确";
			return false;	
		}		
		
		
		
	}
	
	function isQQ($QQ){
		$match='/^[1-9][0-9]{4,}$/';
		if(empty($QQ) || strlen($QQ)<=4){
			//echo "位数不正确";
			return false;
		}else if(preg_match($match,$QQ)){
			//echo "输入正确";
			return true;
		}else{
			//echo "输入不正确";
			return false;	
		}		
		
		
		
	}
	
	
	
}


//$phone=14376656471;
//$verify = new verify;
//
//$verify->isPHO($phone);







?>