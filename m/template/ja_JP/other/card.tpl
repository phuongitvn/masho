<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Danh sách card|Linh Triều Bình Ca</title>
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

<div style="text-align:center; background-color:#3366FF;color:#ffffff;">Quân đoàn {{$app.ot_profile.handle}}<br />Danh sách Card</div>


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr>

{{if $app.list}}
{{foreach from=$app.list item=item name=deckf}}
<td width="80">
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="80" height="109" /><br />
<span style="font-size:x-small;">{{$item.name_rank}}</span></td>
{{if $smarty.foreach.deckf.iteration % 3 == 0}}</tr><tr>{{/if}}
{{/foreach}}
</tr>
</table>
</div>
{{else}}
<span style="color:#ff0000;">Không có card</span><br />
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/other/card.php" parm="&id="|cat:$form.id }}
</div>

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />{{if $app.me == 1}}
<a href="{{"/my/profile.php"|cnvgw}}">Về Hồ sơ cá nhân</a><br />
{{else}}
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">Về Quân đoàn {{$app.ot_profile.handle}}</a><br />{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
