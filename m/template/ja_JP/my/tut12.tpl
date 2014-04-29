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
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="75" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Nếu còn thắc mắc, bạn có thể tham khảo thông tin trong phần <a href="{{"/qa/index.php"|cnvgw}}">Trợ giúp</a> ở chức năng của quân đoàn. Nhưng trước tiên, hãy tiếp tục thử thách để đánh bại Yêu tướng nhé!
</span></td></tr></table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="background-color:#{{$app.color.main}};color:#{{$app.color.text}};text-align:center;">
Trang riêng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="84" align="center">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_p.jpg" width="80" height="109" /><br />
<span style="font-size:x-small;"><a href="{{"/my/greet/list/?cl=1"|cnvgw}}">Thông tin quân đoàn </a></span>
</td>
<td><span style="font-size:x-small;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
Quân đoàn trưởng: {{$app.card.name}} ({{$app.card.rank}})<br />
Quân năng: {{$app.profile.level}}<br />
Binh lính: {{$app.deck.follower}}<br />
Điểm kinh nghiệm: {{$app.profile.exp}} (Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>)<br />
Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}}└<span style="color:#ff0000;">Cần {{if $app.profile.rsv_time_min == 0}}{{$app.profile.rsv_time_sec}} giây{{else}}{{$app.profile.rsv_time_min}} phút{{/if}} để hồi phục</span><br />{{/if}}
Vàng: {{$app.profile.money}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
Ngọc: <a href="{{"/coin/"|cnvgw}}">{{$app.profile.coin}}</a> <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /><br />
Tỷ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/  Bại {{$app.profile.lose}})</span></td></tr>
</table>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#D95F41;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="33%" align="center"><a href="{{"/card/deck.php"|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_card.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><a href="{{"/quest/"|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_quest.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><a href="{{"/other/list.php"|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_fight.gif" width="69" height="29" /></a></td>
</tr>
</table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />


<div style="text-align:center; background-color:#{{$app.color.main}};"><span style="size:small; color:#{{$app.color.text}};">Chức năng đoàn quân</span></div>
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span><a href="{{"/gacha/?ssid="|cat:$app.ssid|cnvgw}}">Vé số</a>: Đổi vé số để được thêm nhiều Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=27}}</span><a href="{{"/item/"|cnvgw}}">Shop</a>: Trang bị quân khí, khôi phục năng lượng...<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=28}}</span><a href="{{"/item/?md=1"|cnvgw}}">Quân khí</a>: Kiểm soát trang bị binh lực của quân đoàn<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=9}}</span><a href="{{"/my/friend/list/"|cnvgw}}">Đồng minh</a>: Liên kết với nhiều đồng minh để tăng sức mạnh quân đoàn<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=30}}</span><a href="{{"/my/treasure.php"|cnvgw}}">Kho báu</a>: Lưu trữ những vật báu giành được<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#33ff00;">{{include file="parts/emoji.tpl" id=12}}</span><a href="{{"/diary/"|cnvgw}}">Nhật trình Chiến trường</a>: Xem lại thông tin những lần thực hiện nhiệm vụ<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#33ff00;">{{include file="parts/emoji.tpl" id=31}}</span><a href="{{"/qa/"|cnvgw}}">Trợ giúp</a>: Giải đáp các vấn đề của Linh Triều Bình Ca<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
