<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Linh Triều Bình Ca</title>
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
</head>

<body style="background:#000000; color:#FFFFFF;">
<div style="font-size:x-small;">
	<div style="background-color:#CC6699;color:#000000;text-align:center; padding:3px;">Top 100 cao thủ</div>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="40" height="27" align="left" valign="middle">&nbsp;Rank</td>
		<td align="left" valign="middle">User name</td>
		<td width="44" align="center" valign="middle">Level</td>
	</tr>
	<tr>
		<td width="40" height="26" align="center" valign="top" style="color:#33FFFF;">1</td>
		<td align="left" valign="top"><a href="{{"/other/index.php?id="|cat:$app.top_user.memberid|cnvgw}}" style="color:#FFFF00;">{{$app.top_user.handle|escape}}</a></td>
		<td width="44" align="center" valign="top">{{$app.top_user.level}}</td>
	</tr>
	<tr>
		<td height="0"></td>
		<td></td>
		<td></td>
	</tr>
	</table>

	<div style="text-align:center; background-color:#cccccc; ">&nbsp;</div>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
{{foreach from=$app.ranking item=ranking_user name=ranking_loop}}
	<tr>
		<td width="40" height="26" align="center" valign="middle" style="color:#33FFFF;">{{$smarty.foreach.ranking_loop.iteration+1}}</td>
		<td align="left" valign="middle"><a href="{{"/other/index.php?id="|cat:$ranking_user.memberid|cnvgw}}" style="color:#FFFF00;">{{$ranking_user.handle}}</a></td>
		<td width="44" align="center" valign="middle">{{$ranking_user.level}}</td>
	</tr>
{{/foreach}}
	</table>

<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
