<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<?
//��֤�û�������Ϣ�Ϸ��������ж�


class verify{//����û���Ϣ����Ϸ���
	function isUSN($username){//��֤�û����Ƿ�Ϸ���ֻ�������֣���ĸ��Сд��������ţ�������ɣ�4-16λ
		$match='/^[a-zA-Zxa0-xff_][0-9a-zA-Zxa0-xff_]{4,16}$/';
		if(empty($username) || strlen($username)<4 ||  strlen($username)>16){
			//echo "����Ƿ������������6-20λ�����룬����ĸ�����Լ�������Ź���";
			return false;	
			
		}else if(preg_match($match,$username)){
			//echo "��֤�ɹ�";
			return true;
		}else{
			//echo "����Ƿ�";
			return false;	
		}
	}


	function isPWD($password){//��֤�����Ƿ����Ҫ��6-20λ����ֻ�����ֺ���ĸ�Լ����������ɣ�
		$match='/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/';
		if(empty($password) || strlen($password)<6 ||  strlen($password)>20){
			//echo "����Ƿ������������6-20λ�����룬����ĸ�����Լ�������Ź���";
			return false;	
			
		}else if(preg_match($match,$password)){
			//echo "��֤�ɹ�";
			return true;
		}else{
			//echo "����Ƿ�";
			return false;	
		}
		
	}
	
	function isEMAIL($email){
		$match='/^[\w\d]+[\w\d-.]*@[\w\d-.]+\.[\w\d]{2,10}$/i';
		if(empty($email) || strlen($email)<4 || strlen($email)>50){
			//echo "����Ƿ�";
			return false;
		}else if(preg_match($match,$email)){
			//echo "������ȷ";
			return true;
		}else{
			//echo "���벻��ȷ";
			return false;	
		}		
		
	}
	
	function isPHO($phone){
		$match='/^1[345678]{1}\d{9}$/';
		if(empty($phone) || strlen($phone)!=11){
			//echo "λ������ȷ";
			return false;
		}else if(preg_match($match,$phone)){
			//echo "������ȷ";
			return true;
		}else{
			//echo "���벻��ȷ";
			return false;	
		}		
		
		
		
	}
	
	function isQQ($QQ){
		$match='/^[1-9][0-9]{4,}$/';
		if(empty($QQ) || strlen($QQ)<=4){
			//echo "λ������ȷ";
			return false;
		}else if(preg_match($match,$QQ)){
			//echo "������ȷ";
			return true;
		}else{
			//echo "���벻��ȷ";
			return false;	
		}		
		
		
		
	}
	
	
	
}


//$phone=14376656471;
//$verify = new verify;
//
//$verify->isPHO($phone);







?>