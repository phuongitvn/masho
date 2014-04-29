<?php
require ('nusoap/nusoap.php');
function smsGateway($User_ID, $Message, $Service_ID, $Command_Code,$Request_ID) {
	global $HTTP_RAW_POST_DATA;
	$result='';
	
	//for release: $connect=mysql_connect("210.245.87.70", "masho", "1406masho2011") or die(mysql_error());
	$connect=mysql_connect("localhost", "masho", "v6AznEYQU94RZCaX") or die(mysql_error());
	mysql_select_db("masho") or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	//insert lg_soap
	$sql_lg_soap="insert into lg_soap(soap_user_id,	soap_message,soap_service_id,soap_command_code,soap_request_id,soap_raw_request,remote_addr,created,modified) values ('".$User_ID."','".$Message."','".$Service_ID."','".$Command_Code."','".$Request_ID."','".$HTTP_RAW_POST_DATA."','".@$_SERVER['REMOTE_ADDR']."',now(),now())";
	try{
		$ret = mysql_query($sql_lg_soap) or die(mysql_error());
		if (strtoupper($Command_Code) == 'TRU' && $Service_ID == '7049')
			return 'Xin chao Anh Tru2!';

		if($ret === true){
			$lg_soap_id=mysql_insert_id();
		}else{
			throw new Exception("can't insert lg_soap");
		}
		
		 //end insert lg_soap
		if(!in_array($Service_ID, array("7549","7649","7749"))){
			throw new Exception("Not Support ".$Service_ID);
		}
		if(strtoupper($Command_Code)!=='NGOC'){
			throw new Exception("Invalid Command Code!");
		}
		$Message2 = str_replace ( "20%", " ", $Message );
		$Message3=explode(" ",$Message2);
		if( (count($Message3)>1&&count($Message3)<3) && strtoupper($Message3[0])==="NGOC"){
			$memberid=base_convert($Message3[1], 36, 10);
			$memberid=mysql_real_escape_string($memberid);
			$addpoint="";
			mysql_query('START TRANSACTION',$connect);
			mysql_query("BEGIN", $connect);
			if($Service_ID === "7549" ){
				$addpoint="100 Ngoc. Chuc ban vui ve cung Linh Trieu Binh Ca!";
				$sql ="UPDATE t_user SET coin=coin+100 WHERE memberid =".$memberid;
		        $rs = mysql_query($sql) or die($sql.'('.mysql_error().')');
		        
	        }else if($Service_ID === "7649"){
	        	$addpoint="200 Ngoc va duoc tang them 10 Ngoc. Chuc ban vui ve cung Linh Trieu Binh Ca!";
				$sql = "UPDATE t_user SET coin=coin+210 WHERE memberid = ".$memberid;
		        $rs = mysql_query($sql) or die(mysql_error());
		        
	        }else if($Service_ID === "7749"){
	        	$addpoint="300 Ngoc va duoc tang them 20 Ngoc. Chuc Ban vui ve cung Linh Trieu Binh Ca!";
				$sql = "UPDATE t_user SET coin=coin+320 WHERE memberid = ".$memberid;
		        $rs = mysql_query($sql) or die(mysql_error());
	        }
	        if($rs === false){
	        	mysql_query('ROLLBACK',$connect);
		        throw new Exception("User Invalid Infomation");
		    }
		    $result="Ban da mua thanh cong ".$addpoint." !";
	        $sql_lg_soap_update ="UPDATE lg_soap SET result='".$result."' WHERE id =".$lg_soap_id;
	         $ret1 = mysql_query($sql_lg_soap_update);
	         $sql_lg_poin_insert="INSERT INTO lg_point							(memberid,add_point,description,operator,user_agent,remote_addr,reg_time)
									VALUES									('".$memberid."','+".$addpoint."','".$result."','smsGateway','".$_SERVER["HTTP_USER_AGENT"]."','".$_SERVER["REMOTE_ADDR"]."',now())";
	         $ret2 = mysql_query($sql_lg_poin_insert);
	        if($ret1 === false || $ret2===false){
	        	mysql_query('ROLLBACK',$connect);
	            throw new Exception('System error');
	        }
	        mysql_query('COMMIT',$connect);
	      	mysql_close($connect);
  
		}else if( (count($Message3)>1&&count($Message3)<3) && strtoupper($Message3[0])==="FORGOT"){
			$username=mysql_real_escape_string($Message3[1]);
			$sql ="select * from t_user WHERE handle ='".$username."'";
		    $rs = mysql_query($sql) or die($sql.'('.mysql_error().')');
		    $num_rows = mysql_num_rows($rs);
		    if ($num_rows){
		    	mysql_query('START TRANSACTION',$connect);
				mysql_query("BEGIN", $connect);
	    		while ($row = mysql_fetch_row($rs)){
				    $passnew = generatePassword();
				    $pwd = sha1('masho'.$passnew);
					$sql = "UPDATE t_user SET password='".$pwd."' WHERE handle = '".$username."'";
				    $rs = mysql_query($sql) or die(mysql_error());
				    if($rs === false){
		        		mysql_query('ROLLBACK',$connect);
			        	throw new Exception("System error");
		    		}
		    		$result="Xin chao ".$username." Ban duoc cap mat khau moi la ".$passnew.". Chuc ban vui ve cung Linh Trieu Binh ca!";
			    }
			    mysql_query('COMMIT',$connect);
	      		mysql_close($connect);
		    }else{
		    	$result="Khong ton tai ten dang nhap ".$username.". Moi ban nhap lai!";
		    }
		}else {
			throw new Exception("Invalid Message!");
		}
	}catch(Exception $ex){
		$result = 'error';
		$sql_lg_soap_update ="UPDATE lg_soap SET result='".$result."',is_error=1,error_detail = '".$ex->getMessage()."' WHERE id =".$lg_soap_id;
         $ret = mysql_query($sql_lg_soap_update);
         mysql_close($connect);
	}
	return $result;
}
function generatePassword() {
		$seed = 'abcdefghijklmnopqrstuvwxyz0123456789';
		srand();
		$count = rand(6, 12);
		$p = '';
		for ($i=0; $i<$count; $i++) {
			$p .= substr($seed, rand(0, strlen($seed)-1), 1);
		}
		return $p;
}
$server = new soap_server ();
$server -> configureWSDL ( 'smsGateway', 'urn:message' );
$server -> register ( 
					"smsGateway", 
					array (
								'User_ID' => 'xsd:string', 
								'Message' => 'xsd:string', 
								'Service_ID' => 'xsd:string', 
								'Command_Code' => 'xsd:string', 
								'Operator' => 'xsd:string',
								'Request_ID' => 'xsd:string' ), array ('result' => 'xsd:string' ), 'urn:message', 
					'urn:message#smsGateway' );
$HTTP_RAW_POST_DATA = isset ( $HTTP_RAW_POST_DATA ) ? $HTTP_RAW_POST_DATA : '';
$server -> service ( $HTTP_RAW_POST_DATA );
?>