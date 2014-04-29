<?php
class M_SupportManager extends M_Manager {
	function setForgotCode($memberid,$code){
		$memberid = mysql_real_escape_string($memberid);
		$code=mysql_real_escape_string($code);
$sql = <<<EOD
INSERT INTO
 lg_forgot_code
(
  memberid
 ,code
 ,created
)
VALUES
(
  '{$memberid }'
 ,'{$code}'
 ,CURRENT_TIMESTAMP
)
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}
		return True;
	}
	function checkForgotCode($code){
		$code = mysql_real_escape_string($code);
$sql = <<<EOD
SELECT
 *
FROM
 lg_forgot_code
WHERE
 code = '{$code}'
 AND
 is_used = '0'	
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		return $rs;
	}
	function updateForgotCode($id){
		$id = mysql_real_escape_string($id);
$sql = <<<EOD
UPDATE
 lg_forgot_code
SET
  is_used = '1'	
WHERE
  id = '{$id}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);
		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
		return True;
	}
	function getInfoUser($memberid){
		$memberid = mysql_real_escape_string($memberid);
$sql = <<<EOD
SELECT
 *
FROM
 t_user
WHERE
 memberid = '{$memberid}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		return $rs;
	}
	function checkPass($memberid,$pwd){
		$memberid = mysql_real_escape_string($memberid);
		$pwd=mysql_real_escape_string($pwd);
$sql = <<<EOD
SELECT
 *
FROM
 t_user
WHERE
 memberid = '{$memberid}'
 AND
 password = '{$pwd}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		return $rs;
	}
	function setPass($memberid,$pwd){
		$memberid = mysql_real_escape_string($memberid);
		$pwd=mysql_real_escape_string($pwd);
$sql = <<<EOD
UPDATE
 t_user
SET
  password='{$pwd}'
WHERE
  memberid = '{$memberid}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
		return True;
	}
	function existMail($email){
		$email = mysql_real_escape_string($email);
$sql = <<<EOD
SELECT
 *
FROM
 t_user
WHERE
 email  = '{$email}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		return $rs;
	}
	function existTel($tel){
		$tel = mysql_real_escape_string($tel);
$sql = <<<EOD
SELECT
 *
FROM
 t_user
WHERE
 tel  = '{$tel }'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		
		return $rs;
	}
	function updateProfile($memberid,$email,$tel){
		$memberid = mysql_real_escape_string($memberid);
		$email = mysql_real_escape_string($email);
		$tel=mysql_real_escape_string($tel);
$sql = <<<EOD
UPDATE
 t_user
SET
  email='{$email}'
  ,tel='{$tel}'
WHERE
  memberid = '{$memberid}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
		return True;
	}

	
}
?>