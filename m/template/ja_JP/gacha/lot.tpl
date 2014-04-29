<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh triều bình ca </title>
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
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ff33ff;">Cửa hàng may mắn</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.card.rank_num >= 4}}
<div style="text-align:center; text-decoration:blink; color:#ffff00; font-weight:bold; font-size:medium">
RÚT ĐƯỢC CARD HIẾM!
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

{{if isset($app.rfp) }}
Xin chúc mừng! Bạn đã trúng <span style="color:#ffff00;">{{$app.busho.name}}({{$app.card.rank}})</span>, đồng thời điểm kỹ năng cũng tăng rất mạnh {{if $app.card.rank_num >= 3}}({{if $app.card.rank_num == 5}}<span style="color:#ffff00;"></span>{{elseif $app.card.rank_num == 4}}<span style="color:#ffff00;"></span>{{/if}}Đã gửi tin đến đồng minh){{/if}}<br />
{{else}}
Xin chúc mừng! <span style="color:#ffff00;"></span>Bạn vừa rút thăm trúng Card {{$app.busho.name}}({{$app.card.rank}}){{if $app.card.rank_num >= 3}}( {{if $app.card.rank_num == 5}}<span style="color:#ffff00;">Kim cương</span>{{elseif $app.card.rank_num == 4}}<span style="color:#ffff00;">Vàng</span>{{/if}}Đã gửi tin đến đồng minh){{/if}}<br />
{{/if}}
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/card/{{$app.busho.bushoid}}.jpg" width="160" height="218" /></div>
Tên Card: <span style="color:#ffff00;">{{$app.busho.name}}</span><br />
Độ hiếm: {{if $app.card.rank_num == 5}}<span style="color:#ffff00;">A</span>{{elseif $app.card.rank_num == 4}}<span style="color:#ffff;">B</span>{{elseif $app.card.rank_num == 3}}C{{elseif $app.card.rank_num == 2}}D{{elseif $app.card.rank_num == 1}}E{{/if}}<br />
<span style="color:#ff0000;"> Đặc năng Lv</span>: {{$app.card.level}}<br />
{{if isset($app.rfp) }}
<span style="color:#00ff00;">Công</span>: {{if $app.rfp.offense > 2}}2 &raquo; <span style="color:#ffff00;">{{$app.rfp.offense}}</span>{{else}}2{{/if}}<br />
<span style="color:#00ff00;">Thủ</span>: {{if $app.rfp.defense > 2}}2 &raquo; <span style="color:#ffff00;">{{$app.rfp.defense}}</span>{{else}}2{{/if}}<br />
<span style="color:#00ff00;">Binh</span>: {{if $app.rfp.follower > 2}}2 &raquo; <span style="color:#ffff00;">{{$app.rfp.follower}}</span>{{else}}2{{/if}}<br />
{{else}}
<span style="color:#00ff00;">Công</span>: 2<br />
<span style="color:#00ff00;">Thủ</span>: 2<br />
<span style="color:#00ff00;">Binh</span>: 2<br />
{{/if}}
Đặc năng: <span style="color:#ffff00;">{{$app.busho.sec_name}}</span><br />
[ {{$app.busho.sec_expla}} ]<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if isset($app.profile) }}<div style="text-align:right;">Điểm thân thiện: {{if $app.profile.friend_pt >= 100}}<span style="color:#ffff00;">{{else}}<span style="color:#ff0000;">{{/if}}{{$app.profile.friend_pt}}</span>pt<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /></div>
{{/if}}

<div style="text-align:center;">
{{include file="parts/emoji.tpl" id=26}}<a href="{{"/gacha/?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Tiếp tục rút thăm Card</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/card/file.php"|cnvgw}}">Về kho Card</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{*
{{if $app.card.rank_num >= 3}}
<form action="mood:send" method="post">
<input type="hidden" name="callbackurl" value="http://{{$app.domain.www}}/my/index.php">
<input type="hidden" name="body" value="{{$app.busho.name}}（{{$app.card.rank}})gặp may♪">
<input type="submit" value="Góc tâm sự "/>
</form>
{{/if}}<br />
*}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff33ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
