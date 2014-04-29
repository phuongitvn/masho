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
<div style="background-color:#993366;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#993366;">Tặng quà</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}_g.jpg" width="80" height="109" />
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff0000;">Đã tặng Card  {{$app.card.name}}({{$app.card.rank}})</span>cho Quân đoàn {{$app.other.handle}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

<div style="text-align:center;"><a href="{{"/card/file.php?mode=pre&id="|cat:$app.other.memberid|cnvgw}}">Tặng tiếp</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span><a href="{{"/card/file.php"|cnvgw}}">Về Kho Card</a></div>

{{if $app.tbdCnt > 0}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<img src="http://{{$app.domain.img}}/card/{{$app.tbdCard.bushoid}}_s.jpg" width="80" height="109" />
<img src="http://{{$app.domain.img}}/spacer.gif" width="10" height="1" />{{$app.tbdCard.name}}({{$app.tbdCard.rank}})Chuyển đến Kho Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}


<!-- Card chưa thu/ tập hợp -->
{{if $app.stay > 0 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#945092;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="{{"/card/?mode=2&id="|cat:$app.stay.bushoid|cat:"&seq="|cat:$app.stay.cardseq|cnvgw}}"><img src="http://{{$app.domain.www}}/img/card/{{$app.stay.bushoid}}.jpg" width="160" height="218" /></a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
<span style="font-size:x-small;">
<span style="color:#ffff00;">{{$app.stay.name}}({{$app.stay.rank}}) LV{{$app.stay.level}}</span><br />
Đặc năng: {{$app.stay.sec_name}}<br />
{{$app.stay.sec_expla}}
</span>
<div style="text-align:center;">
<span style="color:#ff0000;">Kho Card của bạn đã đầy (36). Hãy kết hợp Card, bán hoặc tặng quà cho đồng minh để có thể lấy thêm Card mới.</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/file.php"|cnvgw}}">Đến kho Card</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/del/?seq="|cat:$app.stay.cardseq|cat:"&q="|cat:$app.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Bán Card này </a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#945092;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{/if}}


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
