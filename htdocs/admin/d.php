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
<h1>Calculate user rankin</h1>

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

$dates = $db->getAll('select * from t_user order by level desc limit 100');
echo '<table><tbody><tr><th>rank</th><th>id</th><th>name</th><th>email</th><th>phone</th><th>coin</th><th>time</th><th>level</th><th>stage</th><th>cycle</th></tr>';
$i=0;
foreach ($dates as $row) {
                echo '<tr><td>';
                echo implode('</td><td>', array(
			++$i,
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

?>
</body>
</html>
