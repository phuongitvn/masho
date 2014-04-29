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
<title>Linh Triều Bình Ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Hợp nhất đặc năng </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<!-- * -->


{{if $app.level >= 1 && $app.level <= 20}}
Xin chúc mừng! Bạn đã hợp nhất đặc năng thành công!<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/card/{{$app.bid}}.jpg" width="160" height="218" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.up == 0}}
<span style="color:#ffff00;">Cấp độ đặc năng của Card đã tăng thêm 1 đơn vị và hiệu quả đặc năng mạnh lên!</span><br />
{{else}}
<span style="color:#ffff00;">Cấp độ đặc năng của Card đã tăng thêm 1 đơn vị, hiệu quả đặc năng mạnh lên và Card đạt đến độ hiếm {{$app.card.rank}}<br />
Tên đặc năng [{{$app.card.sec_name}}]<br />
</span>{{$app.card.sec_name}}<br />
{{/if}}

<span style="color:#ff0000;">Level đặc năng</span>: {{$app.org.level}} &raquo; <span style="color:#ffff00;">{{$app.level}}</span><br />
<span style="color:#00ff00;">Công</span>: {{$app.card.offense}} &raquo; {{$app.card.offense}}<br />
<span style="color:#00ff00;">Thủ</span>: {{$app.card.defense}} &raquo; {{$app.card.defense}}<br />
<span style="color:#00ff00;">Binh</span>: {{$app.card.follower}} &raquo; {{$app.card.follower}}<br />

{{elseif $app.level == 0}}
<span style="color:#ff0000;">Hợp nhất đặc năng thất bại!</span><span style="color:#ffff00;"> Nhưng điểm kỹ năng của Card đã tăng rồi nhé!</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/card/{{$app.bid}}_s.jpg" width="80" height="109" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<span style="color:#ff0000;">Level đặc năng không thay đổi …</span><br />

<span style="color:#ff0000;">Level đặc năng </span>:{{$app.card.level}} &raquo; {{$app.card.level}}<br />
<span style="color:#00ff00;">Công</span>: {{$app.org.O}} &raquo; <span style="color:#ffff00;">{{$app.card.offense}}</span><br />
<span style="color:#00ff00;">Thủ</span>: {{$app.org.D}} &raquo; <span style="color:#ffff00;">{{$app.card.defense}}</span><br />
<span style="color:#00ff00;">Binh</span>: {{$app.org.F}} &raquo; <span style="color:#ffff00;">{{$app.card.follower}}</span><br />

<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
{{if $app.scnt > 0}}Bạn đang có <span style="color:#ffff00;">{{$app.scnt}}</span> Tượng Thần<br />{{/if}}
<span style="color:#ffff00;">Tượng thần giúp hợp nhất đặc năng những Card có cấp độ từ 1-9</span> với xác suất thành công 100%<span style="color:#ffff00;"> mà không cần sử dụng Card nguyên liệu</span>
{{if $app.scnt == 0}}<br /><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=160"|cnvgw}}">Mua ngay</a>
{{else}}<br /><span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/complist.php"|cnvgw}}">Sử dụng</a>{{/if}}
</span></td></tr></table>
</div>

{{else}}
{{/if}}

{{if $app.tbdCnt > 0}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<img src="http://{{$app.domain.img}}/card/{{$app.tbdCard.bushoid}}.jpg" width="80" height="109" />
<img src="http://{{$app.domain.img}}/spacer.gif" width="10" height="1" />{{$app.tbdCard.name}} ({{$app.tbdCard.rank}}) Chuyển đến kho Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}


<!-- Card chưa thu thập -->
{{if $app.stay > 0 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#945092;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="{{"/card/?mode=2&id="|cat:$app.stay.bushoid|cat:"&seq="|cat:$app.stay.cardseq|cnvgw}}"><img src="http://{{$app.domain.www}}/img/card/{{$app.stay.bushoid}}.jpg" width="160" height="218" /></a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
<span style="font-size:x-small;">
<span style="color:#ffff00;">{{$app.stay.name}} ({{$app.stay.rank}}) LV{{$app.stay.level}}</span><br />
Đặc năng: {{$app.stay.sec_name}}<br />
{{$app.stay.sec_expla}}
</span>
<div style="text-align:center;">
<span style="color:#ff0000;">Kho Card của bạn đã đầy (36). Hãy kết hợp Card, bán hoặc tặng cho đồng minh để có thể lấy thêm Card mới</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/file.php"|cnvgw}}">Đến kho Card</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/card/del/?seq="|cat:$app.stay.cardseq|cat:"&q="|cat:$app.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Bán Card</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#945092;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{/if}}



<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/complist.php"|cnvgw}}">Tiếp tục Kết hợp </a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span><a href="{{"/card/file.php"|cnvgw}}">Về Kho Card</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

<!-- footer -->
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
