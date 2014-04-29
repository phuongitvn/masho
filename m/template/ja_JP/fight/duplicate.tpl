<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
<title>Linh triều Bình Ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">Tìm đối thủ chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="75" align="center"><img src="http://{{$app.domain.img}}/thumb/amkus{{if $app.times == 4}}3{{elseif $app.times == 3}}2{{/if}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.times == 4}}
Mỗi ngày chỉ được chiến đấu 1 lần với đối thủ mình đã thắng. <span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=62}}</span>Hãy tìm nhiều đối thủ khác.<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=64}}</span>
{{elseif $app.times == 3}}
Bạn vẫn chưa thắng, mỗi ngày chỉ được chiến đấu với cùng 1 đối thủ 3 lần thôi. <span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=62}}</span>Hãy chiến đấu với nhiều đối thủ khác<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=64}}</span>
{{/if}}
</span></td></tr></table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="text-align:center;">
{{if $app.times == 3}}
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=27}}</span><a href="{{"/item/"|cnvgw}}">Chuẩn bị vũ khí</a><span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=27}}</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}
{{include file="parts/emoji.tpl" id=26}}<a href="{{"/other/list.php"|cnvgw}}" accesskey="5">Tìm đối thủ chiến đấu</a>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
