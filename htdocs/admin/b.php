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
<h1>Calculate active user (update truoc khi 10 phut)</h1>
<div>
<?php
require('DB.php');
$db = new DB();

$dates = $db->getAll('select count(*) as c from t_session where upd_time >= DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 10 MINUTE)');
echo $dates[0]['c'];
?>
</div>

</body>
</html>

