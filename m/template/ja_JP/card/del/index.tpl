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
<div style="text-align:center; background-color:#006600;">Bán Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

Bạn chắc chắn muốn bán Card này?
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}.jpg" width="160" height="218" /><br />
<div style="font-size:small;">{{$app.card.name}}({{$app.card.rank}})</div>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Năng lực: <span style="color:#00ff00;">Công </span>{{$app.m_busho.offense}} <span style="color:#00ff00;">Thủ </span>{{$app.m_busho.defense}} <span style="color:#00ff00;">Binh </span>{{$app.m_busho.follower}}<br />
Giới tính:{{if $app.m_busho.gender =="1"}}♂ Nam{{elseif $app.m_busho.gender =="2"}}♀ Nữ{{/if}}<br />
Công lực: {{$app.card.offense}}<br />
Thủ lực: {{$app.card.defense}}<br />
Binh lực: {{$app.card.follower}}<br />
Tỉ lệ thắng: {{$app.card.rate}}% ({{$app.card.win}} Thắng/{{$app.card.lose}} Thua)<br />
Đặc năng: <span style="color:#ffff00;"> {{$app.card.sec_name}} ({{if $app.card.sec_kbn =="1"}}Tấn công{{elseif $app.card.sec_kbn =="2"}}Phòng vệ{{else}}Đặc biệt{{/if}})</span><br />
Cấp độ: {{$app.card.level}}<br />

{{if $app.profile.money <> ""}}
Vàng : {{$app.profile.money}} &raquo; <span style="color:#ffff00;">{{$app.after}}</span> <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<div style="text-align:center;">
<form action="{{"/card/del/index.php"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="card_del_complete" />
<input type="hidden" name="seq" value="{{$form.seq}}" />
<input type="hidden" name="q" value="{{$form.q}}" />
<input type="hidden" name="ssid" value="{{$form.ssid}}" />
{{include file="parts/emoji.tpl" id=26}}<input type="submit" value="Bán" accesskey="5" />
</form>
</div>



<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
