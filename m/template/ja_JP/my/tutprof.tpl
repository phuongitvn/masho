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
<div style="background-color:#CC0099;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#CC6699;">Chọn quân đoàn trưởng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="75" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.profcard.prof_gcnt > 0}}
Mỗi quân đoàn cần có một mãnh tướng được lựa chọn làm quân đoàn trưởng. Một quyết định thông minh sẽ đem lại những chiến thắng bất ngờ nhất. Hãy lựa chọn linh thú xứng đáng để dẫn dắt đoàn quân chiến đấu và vượt qua thử thách nhé !
</span>
{{else}}
Hãy lựa chọn linh thú xứng đáng để dẫn dắt đoàn quân chiến đấu và vượt qua thử thách nhé !<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=62}}</span>Chú ý: Việc lựa chọn quân đoàn trưởng mang tính ngẫu nhiên tuỳ thuộc vào người chơi, trong quá trình chơi bạn hoàn toàn có thể thay thế quân đoàn trưởng của mình bằng những linh thú mạnh mẽ hơn (hoặc đẹp hơn ^^!).<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=76}}</span>
{{/if}}
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<br/><span style="color:#ffff00;">Chú ý:</span> Việc lựa chọn quân đoàn trưởng mang tính ngẫu nhiên tuỳ thuộc vào người chơi, trong quá trình chơi bạn hoàn toàn có thể thay thế quân đoàn trưởng của mình bằng những linh thú mạnh mẽ hơn (hoặc đẹp hơn ^^!). <br/>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
{{$app.m_busho.name}}({{$app.m_busho.rank}})<br/>
<img src="http://{{$app.domain.img}}/card/{{$app.profcard.prof}}.jpg" width="160" height="218" />
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{$app.m_busho.expla}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="text-align:center;">
{{if $app.profcard.prof_gcnt > 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=25}}</span><a href="{{"/my/profng.php?ss="|cat:$app.ss|cnvgw}}">Lựa chọn Linh thú khác</a><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=25}}</span><br />
 - Bạn còn <span style="color:#ffff00;">{{$app.profcard.prof_gcnt}}</span> lần nữa<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/my/profok.php?ss="|cat:$app.ss|cnvgw}}">Chọn Card này làm quân đoàn trưởng!</a><br />
{{else}}
<a href="{{"/my/profok.php?ss="|cat:$app.ss|cnvgw}}">Chọn Card này làm quân đoàn trưởng!</a><br />
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
</body>
</html>
