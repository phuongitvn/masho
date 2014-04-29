<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Kho quân khí|Linh Triều Bình Ca</title>
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
</head>
<body style="background-color:#000000;color:#ffffff">
<a name="top" id="top"></a>
<div style="font-size:x-small;">

<div style="text-align:center; background-color:#3366FF;color:#ffffff;">Quân đoàn {{$app.ot_profile.handle}}<br />Kho quân khí</div>

{{if $app.kbn == "" || $app.kbn == 1 }}
<div style="text-align:center">Vũ khí / <a href="{{"/other/item.php?kbn=2&id="|cat:$form.id|cnvgw}}">Đồ phòng thủ</a></div>
{{elseif $app.kbn == 2 }}
<div style="text-align:center"><a href="{{"/other/item.php?id="|cat:$form.id|cnvgw}}">Vũ khí</a> / Đồ phòng thủ</div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">
<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center">
<tr>
{{if $app.list}}
<!-- * -->
{{foreach from=$app.list item=item name=deckf}}
<td width="70"><img src="http://{{$app.domain.img}}/item/{{$item.itemid}}.gif" alt="" width="70" height="70" /></td>
{{if $smarty.foreach.deckf.iteration % 3 == 0}}</tr><tr>{{/if}}
<!-- * -->
{{/foreach}}
</tr>
</table>
</div>
{{else}}
không có vũ khí, đồ phòng thủ<br />
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/other/item.php" parm="&id="|cat:$form.id}}
</div>

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">Về Quân đoàn {{$app.ot_profile.handle}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>



<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
