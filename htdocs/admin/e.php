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
<h1>Show user up level log's</h1>

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
$min_level = @$_GET['lv'];
$w = '';
if (!empty($min_level)) {
 $w = ' where lv.level>='.$min_level.' ';
}
$dates = $db->getAll('select u.memberid, u.handle, lv.reg_time, lv.level from lg_level lv left join t_user u on lv.memberid=u.memberid '.$w.'order by reg_time desc limit 100');
echo '<table><tbody><tr><th>no</th><th>id</th><th>name</th><th>level</th><th>date</th></tr>';
$i=0;
foreach ($dates as $row) {
                echo '<tr><td>';
                echo implode('</td><td>', array(
			++$i,
                        $row['memberid'],
                        $row['handle'],
                        $row['level'],
                        $row['reg_time']
                ));
                echo '</td></tr>';
}
echo '</tbody></table>';

?>
</body>
</html>
