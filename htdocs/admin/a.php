<html>
<head>
<title>Calculate user for LTBC</title>
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
<h1>Calculate user for LTBC</h1>

<?php
function _log($v,$lv=4) {
echo '<div>'.htmlspecialchars($v).'</div>';
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

require('DB.php');
$db = new DB();
$db->connect(
	'210.245.89.59',
	'masho',
	'masho',
	'1406masho2011',
	'utf8'
);

$dates = $db->getAll('select date_format(reg_time,\'%Y-%m-%d\') as reg_date from t_user group by reg_date order by reg_date desc');

foreach ($dates as $d) {
	$ret = $db->select(
		't_user',
		array('^*'),
		'date_format(reg_time, \'%Y-%m-%d\') = \''.$d['reg_date'].'\'',
		'reg_time desc'
	);
	echo '<h2>'.$d['reg_date'].' ('.count($ret).')</h2>';
	echo '<table><tbody><tr><th>id</th><th>name</th><th>email</th><th>phone</th><th>coin</th><th>time</th><th>level</th><th>stage</th><th>cycle</th></tr>';
	foreach ($ret as $row) {
		echo '<tr><td>';
		echo implode('</td><td>', array(
			$row['memberid'],
			$row['handle'],
			$row['email'],
			$row['tel'],
			$row['coin'],
			$row['reg_time'],
			$row['level'],
			$row['stage'],
			((int)$row['cl_cycle'])+1,
		));
		echo '</td></tr>';
	}
	echo '</tbody></table>';
}

/*$dates = $db->getAll('select * from t_user order by level desc limit 100');
echo '<table><tbody><tr><th>id</th><th>name</th><th>email</th><th>phone</th><th>co
in</th><th>time</th><th>level</th><th>stage</th><th>cycle</th></tr>';
foreach ($dates as $row) {
                echo '<tr><td>';
                echo implode('</td><td>', array(
                        $row['memberid'],
                        $row['handle'],
                        $row['email'],
                        $row['tel'],
                        $row['coin'],
                        $row['reg_time'],
                        $row['level'],
                        $row['stage'],
                        ((int)$row['cl_cycle'])+1,
                ));
                echo '</td></tr>';
}
echo '</tbody></table>';
*/
?>
</body>
</html>
