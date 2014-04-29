<html>
<head>
<title>Change profile</title>
<style>
table{
	border-top:1px solid #663300;
	border-left:1px solid #663300;
	border-collapse:collapse;
	border-spacing:0;
	background-color:#ffffff;
	empty-cells:show;
}
th{
	border-right:1px solid #663300;
	border-bottom:1px solid #663300;
	color:#330000;
	background-color:#996633;
	background-position:left top;
	padding:0.3em 1em;
	text-align:center;
}
td{
	border-right:1px solid #663300;
	border-bottom:1px solid #663300;
	padding:0.3em 1em;
}
</style>
</head>
<body>
<h1>Change profile</h1>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
function _log($v,$lv=4) {
echo '<div>'.htmlspecialchars($v).'</div>';
}
$message_stocks = array();
function smsid2id($smsid) {
	return base_convert($smsid, 36, 10);
}
function id2smsid($id) {
	$smsid = base_convert($id, 10, 36);
	while (strlen($smsid) < 4) {
		$smsid = '0'.$smsid;
	}
	return $smsid;
}
function debug_log($v) {
	global $message_stocks;
	$message_stocks[] = $v;
}
function err_log($v) {
	global $message_stocks;
	$message_stocks[] = $v;
	var_dump($v);
}
function warn_log($v) {
	global $message_stocks;
	$message_stocks[] = $v;
	var_dump($v);
}
function info_log($v) {
	global $message_stocks;
	$message_stocks[] = $v;
}

$id = @$_GET['id'];
$tel = @$_GET['tel'];
$email = @$_GET['email'];
$btn = @$_GET['btn'];
$err = '';
$success = FALSE;
require('DB.php');
$db = new DB();
$db->connect(
	'210.245.87.70',
	'masho',
	'masho',
	'1406masho2011',
	'utf8'
);
if (! empty($id)) {
}
if ((! empty($btn)) && (! empty($id)) && (! empty($pwd))) {
	$handle = $db->escape($id);
	$user = $db->select1(
		't_user',
		array('^*'),
		'handle=\''.$handle.'\''
	);
	if ($user === FALSE) {
		$err .= 'can not find user('.htmlspecialchars($id).')<br/>';
	} else {
		$ret = $db->update(
			't_user',
			array(
				'password' => gen_pass($pwd)
			),
			'memberid='.$user['memberid']
		);
		if ($ret === FALSE) {
			$err .= 'can not change password<br/>';
		}
		$ret = $db->insert(
			'lg_admin',
			array(
				'action' => 'change password',
				'memberid' => $user['memberid'],
				'request' => 'change password to '.$pwd,
				'response' => $ret.': '.serialize($message_stocks),
				'old_value' => $user['password'],
				'ext_data' => serialize($user),
				'reg_time' => 'CURRENT_TIMESTAMP'
			)
		);
		if ($ret === FALSE) {
			$err .= 'can not add log<br/>';
		}
		$success = $ret;
	}
}
?>

<div style="color:red; font-weight:bold"><?=$err?></div>

<?php
if (! empty($success)) {
?>
<div>
Profile updated.
</div>
<?php
}
?>

<form method="get">
<div>
	<strong>id: </strong>
	<input type="text" name="id" value="<?=htmlspecialchars($id)?>" />
</div>
<div>
	<strong>pwd: </strong>
	<input type="text" name="email" value="<?=htmlspecialchars($user['email']?>" />
</div>
<div>
	<strong>tel: </strong>
	<input type="text" name="email" value="<?=htmlspecialchars($user['tel'])?>" />
</div>
<div>
	<input type="submit" name="btn" value="submit" />
</div>
</form>

<div>
Luu y: khong thay doi email va sdt cua moba.
</div>

</body>
</html>
