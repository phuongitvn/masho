<html>
<head>
<title>Calculate paid for LTBC</title>
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
function getUnitPrice($soap_service_id) {
	switch ($soap_service_id) {
		case '7049':
			return 500;
		case '7149':
			return 1000;
		case '7249':
			return 2000;
		case '7349':
			return 3000;
		case '7449':
			return 4000;
		case '7549':
			return 5000;
		case '7649':
			return 10000;
		case '7749':
			return 15000;
	}
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

$dates = $db->getAll('select soap_service_id, date_format(created, \'%Y-%m-%d\') as paid_date, count(*) as paid_count from lg_soap group by soap_service_id, paid_date order by soap_service_id, paid_date');

echo '<table><tbody>';
$before_service_id = NULL;
$total = 0;
foreach ($dates as $d) {
	if ($d['soap_service_id'] != $before_service_id) {
		/*
		if (! is_null($before_service_id)) {
			echo '</tbody></table>';
		}
		echo '<table><tbody>';
		echo '<tr><th colspan="3">'.$d['soap_service_id'].'</th></tr>';
		echo '<tr>';
		echo '<td>date</td>';
		echo '<td>count</td>';
		echo '<td>price</td>';
		echo '</tr>';
		*/
		echo '<tr><th colspan="3">'.$d['soap_service_id'].'</th></tr>';
		$before_service_id = $d['soap_service_id'];
	}
	echo '<tr>';
	echo '<td>'.$d['paid_date'].'</td>';
	echo '<td>'.$d['paid_count'].'</td>';
	echo '<td>'.number_format(getUnitPrice($d['soap_service_id']) * ((int)$d['paid_count'])).'</td>';
	echo '</tr>';
	$total += getUnitPrice($d['soap_service_id']) * ((int)$d['paid_count']);
}
?>
</tbody>
</table>
<strong>Total: <?=number_format($total)?></strong>
</body>
</html>
