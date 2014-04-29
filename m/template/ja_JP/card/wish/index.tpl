<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh Triều Bình Ca</title>
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
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Card Ước</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.rNum == 0}}
{{else}}
 Hãy đăng ký Card muốn có và từng bước thử thách với việc kết hợp Card nhé!<br />
<div style="text-align:center;"><a href="{{"/card/file.php?mode=wish&ssid="|cat:$form.ssid|cnvgw}}">Còn {{$app.rNum}} Card có thể đăng ký </a></div>
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.wlist}}
{{foreach from=$app.wlist item=item name=wish}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="100" style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="80" height="109" />
</td>
<td><span style="font-size:x-small;">
{{$item.name}}({{$item.rank}})<br />
<a href="{{"/card/wish/Cc.php?&bid="|cat:$item.bushoid|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Hủy đăng kí</a><br />

</span></td></tr></table>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/foreach}}
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
