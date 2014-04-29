<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$key = @$_GET['key'];
$email = @$_GET['email'];
$tel = @$_GET['tel'];
$handle = @$_GET['handle'];
$like = @$_GET['like'];
if (empty($key)) {
	$email = 1;
	$tel = 1;
	$handle = 1;
	$like = 1;
}
?>
<html>
<head>
<title>Calculate user for LTBC</title>
<script type="text/javascript">
function active(moba_id) {
	alert('chua lam');
}
</script>
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
<h1>Search SMS</h1>

<form>
<input type="text" name="key" value="<?=$key?>" />
<input type="checkbox" name="email" value="1" <?php echo empty($email) ? '' : 'checked'; ?>/>email
<input type="checkbox" name="tel" value="1" <?php echo empty($tel) ? '' : 'checked'; ?> />tel
<input type="checkbox" name="handle" value="1" <?php echo empty($handle) ? '' : 'checked'; ?> />handle
<input type="checkbox" name="like" value="1" <?php echo empty($like) ? '' : 'checked'; ?> />like
<input type="submit" />
</form>

<?php
function _log($v,$lv=4) {
echo '<div>'.htmlspecialchars($v).'</div>';
}

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
//_log($v, 4);
}
function err_log($v) {
_log($v, 1);
}
function warn_log($v) {
_log($v, 2);
}
function info_log($v) {
_log($v,3 );
}

if (! empty($key)) {
	require('DB.php');
	$db = new DB();
	$db->connect(
		'210.245.89.59',
		'masho',
		'masho',
		'1406masho2011',
		'utf8'
	);
	$db_moba = new DB();
	$db_moba->connect(
		'data.moba.vn',
		'sns_v2',
		'tsugetest',
		'tsugetest21',
		'utf8'
	);
	$db_moba->table_prefix = 'sns_';
	$key = $db->escape($key);
	$w_masho = '';
	$fields = array();
	if (! empty($handle))
		$fields[] = 'handle';
	if (! empty($email))
		$fields[] = 'email';
	if (! empty($tel))
		$fields[] = 'tel';

	if (empty($like)) {
		$w_ary = array();
		foreach ($fields as $field) {
			$w_ary[] = $field.'=\''.$key.'\'';
		}
		$w_masho = implode(' or ', $w_ary);
	} else {
		$w_ary = array();
		foreach ($fields as $field) {
			$w_ary[] = $field.' like \'%'.$key.'%\'';
		}
		$w_masho = implode(' or ', $w_ary);
	}
	$masho_ret = $db->select(
		't_user',
		array(
			'memberid',
			'memberid',
			'handle',
			'email',
			'tel',
			'coin',
			'reg_time',
			'level',
			'stage',
			'cl_cycle'
		),
		$w_masho,
		NULL,
		30,
		FALSE,
		'handle'
		
	);
	foreach ($masho_ret as &$row1) {
		$smsid = id2smsid($row1['memberid']);
		$row1['smsid'] = $smsid;
		$sms_ret = $db->select(
			'lg_soap',
			array(
				'^id as soap_id',
				'soap_service_id',
				'soap_message',
				'^result as soap_result',
				'error_detail',
				'^created as soap_created',
			),
			'soap_message like \'%'.$smsid.'%\'',
			NULL
		);
		$row1['soap'] = $sms_ret;
		$row1['moba_id'] = '';
		$row1['is_active'] = '';
		$row1['moba_reg_date'] = '';
	}

	$fields = array();
	if (! empty($handle))
		$fields[] = 'login_name';
	if (! empty($email))
		$fields[] = 'email';
	if (! empty($tel))
		$fields[] = 'phone_no';

	$w_moba = '';
	if (empty($like)) {
		$w_ary = array();
		foreach ($fields as $field) {
			$w_ary[] = $field.'=\''.$key.'\'';
		}
		$w_moba = implode(' or ', $w_ary);
	} else {
		$w_ary = array();
		foreach ($fields as $field) {
			$w_ary[] = $field.' like \'%'.$key.'%\'';
		}
		$w_moba = implode(' or ', $w_ary);
	}
	$moba_ret = $db_moba->select(
		'users',
		array(
			'id',
			'login_name',
			'phone_no',
			'email',
			'is_active',
			'created'
		),
		$w_moba,
		NULL,
		30
	);
	foreach ($moba_ret as $moba_row) {
		if (! array_key_exists($moba_row['login_name'], $masho_ret)) {
			$masho_ret[$moba_row['login_name']] = array(
				'memberid' => '',
				'smsid' => '',
				'handle' => $moba_row['login_name'],
				'email' => $moba_row['email'],
				'tel' => $moba_row['phone_no'],
				'coin' => '',
				'reg_time' => '',
				'level' => '',
			);
		}
		$masho_ret[$moba_row['login_name']]['moba_id'] = $moba_row['id'];
		$masho_ret[$moba_row['login_name']]['is_active'] = $moba_row['is_active'];
		$masho_ret[$moba_row['login_name']]['moba_reg_date'] = $moba_row['created'];
	}

	echo '<table><tbody><tr><th>id</th><th>smsid</th><th>handle</th><th>email</th><th>phone</th><th>coin</th><th>time</th><th>level</th><th>moba-reg</th><th>active</th><th>action</th></tr>';
	foreach ($masho_ret as $row) {
		echo '<tr><td>';
		echo implode('</td><td>', array(
			$row['memberid'],
			$row['smsid'],
			$row['handle'],
			$row['email'],
			$row['tel'],
			$row['coin'],
			$row['reg_time'],
			$row['level'],
			$row['moba_reg_date'],
			$row['is_active'],
			(empty($row['is_active']) ? ('<input type="button" value="active" onclick="active(\''.$row['moba_id'].'\')" /><br/>') : '')
			.('<a href="change_pass.php?id='.rawurlencode($row['handle']).'">pass</a>')
		));
		echo '</td></tr>';
		if (!empty($row['soap'])) {
			foreach ($row['soap'] as $soap) {
				echo '<tr><td colspan="5"></td><td>';
				echo implode('</td><td>', array(
					$soap['soap_id'],
					$soap['soap_service_id'],
					$soap['soap_message'],
					$soap['soap_result'],
					$soap['error_detail'],
					$soap['soap_created']
				));
				echo '</td></tr>';
			}
		}
		echo '</td></tr>';
	}

	echo '</tbody></table>';
}
?>

<h2>number info</h2>
<table>
<tbody>
<?php
$numbers = array(
	'Vinaphone' => array('091', '094', '0123', '0124', '0125', '0127', '0129',),
	'Mobiphone' =>  array('090', '093', '0121', '0122', '0126', '0128',),
	'Viettel' =>  array('097', '098', '0163', '0164', '0165', '0166', '0167', '0168', '0169',),
	'EVN' =>  array('096', '0188',),
	'Sphone' =>  array('095',),
	'Vietnam Mobi' =>  array('092',),
	'Beeline' =>  array('0199',)
);
$j = 0;
echo '<tr>';
foreach ($numbers as $k => $v) {
	$j = max($j, count($v));
	echo '<th>'.htmlspecialchars($k).'</th>';
}
echo '</tr>';

for ($i=0; $i<$j; $i++) {
	echo '<tr>';
	foreach ($numbers as $k => $v) {
		echo '<td>'.(empty($v[$i]) ? '' : $v[$i]).'</td>';
	}
	echo '</tr>';
}
?>
</tbody>
</table>
</body>
</html>
