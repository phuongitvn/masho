<html>
<head>
<title>Change pssword</title>
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
<h1>Change password</h1>
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
function gen_pass($pwd) {
	return sha1('masho'.$pwd);
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
$pwd = @$_GET['pwd'];
$btn = @$_GET['btn'];
$err = '';
$success = FALSE;
$target_user_id = 0;
if ((! empty($btn)) && (! empty($id)) && (! empty($pwd))) {
	require('DB.php');
	$db = new DB();
	$db->connect(
		'210.245.87.70',
		'masho',
		'masho',
		'1406masho2011',
		'utf8'
	);
	$handle = $db->escape($id);
	$user = $db->select1(
		't_user',
		array('^*'),
		'handle=\''.$handle.'\''
	);
	$target_user_id = $user['memberid'];
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
User <?=$target_user_id?> password updated.
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
	<input type="text" name="pwd" value="<?=htmlspecialchars($pwd)?>" />
</div>
<div>
	<input type="submit" name="btn" value="submit" />
</div>
</form>

<div>
<a href="http://lt.socialgame.vn/?url=http%3A%2F%2Flt.socialgame.vn%2Flogin%2Findex.php">test login</a>
</div>

</body>
</html>
