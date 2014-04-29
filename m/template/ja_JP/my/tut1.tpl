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
<div style="text-align:center; background-color:#CC6699;">Trang riêng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="75" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Chúc mừng quân đoàn {{$app.profile.handle}} được thành lập! Ngay bây giờ, hãy đi chinh phục thử thách và tham gia chiến đấu để tăng sức mạnh quân đoàn. Nhưng đầu tiên, tìm diệt Yêu tướng ở Chiến trường Tây Nguyên đã nhé!
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" />
<div style="text-align:center;"><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span><a href="{{"/my/index.php?ss="|cat:$app.ss|cnvgw}}" accesskey="5">Chinh phục Thử thách</a><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" />

<div style="text-align:center; background-color:#CC6699;border-color:#CC6699;border-style:solid;"><span style="color:#000000;">Vào rừng sâu tìm phi tiêu truyền thuyết</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="84" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_p.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<table cellspacing="0" cellpadding="0">
<tr>
 <td>Quân đoàn trưởng: {{$app.card.name}} ({{$app.card.rank}})</td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(1)</td>
</tr>
<tr>
 <td>Quân năng: {{$app.profile.level}}</td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(2)</td>
</tr>
<tr>
 <td>Binh lính: {{$app.deck.follower}}</td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(3)</td>
</tr>
<tr>
 <td>Điểm kinh nghiệm: {{$app.profile.exp}} </td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(4)</td>
</tr>
<tr>
 <td>Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}} - <span style="color:#ff0000;">Cần {{if $app.profile.rsv_time_min == 0}}{{$app.profile.rsv_time_sec}} giây{{else}}{{$app.profile.rsv_time_min}} phút{{/if}} để hồi phục</span><br />{{/if}}</td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(5)</td>
</tr>
<tr>
 <td>Vàng: {{$app.profile.money}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /></td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(6)</td>
</tr>
<tr>
 <td>Ngọc: <a href="{{"/coin/"|cnvgw}}">{{$app.profile.coin}}</a> <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /></td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(7)</td>
</tr>
<tr>
 <td>Tỷ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/  Bại {{$app.profile.lose}})</span> </td>
 <td style="font-style:italic; color:#7bdfff; font-size:80%;">(8)</td>
</tr>
</table>
</td></tr>
</table>
<div style="font-style:italic; color:#ffff00; font-size:100%;">
 <div>
 <span style="color:#7bdfff;">(1)</span> Tên quân đoàn trưởng bạn vừa chọn
 </div>
 <div>
 <span style="color:#7bdfff;">(2)</span> Cấp độ của quân đoàn, tăng theo điểm kinh nghiệm
 </div>
 <div>
 <span style="color:#7bdfff;">(3)</span> Tổng số Binh của 5 Card cộng lại
 </div>
 <div>
 <span style="color:#7bdfff;">(4)</span> Có được khi thực hiện thử thách và chiến đấu
 </div>
 <div>
 <span style="color:#7bdfff;">(5)</span> Dùng để thực hiện thử thách và chiến đấu, tăng theo số quân năng
 </div>
 <div>
 <span style="color:#7bdfff;">(6)</span> Đơn vị tiền tệ riêng của game, không mua được bằng tiền và không có giá trị quy đổi ra tiền mặt
 </div>
 <div>
 <span style="color:#7bdfff;">(7)</span> Đơn vị tiền tệ riêng của game, mua được bằng tiền và không có giá trị quy đổi ra tiền mặt
 </div>
 <div>
 <span style="color:#7bdfff;">(8)</span> Tỷ lệ Phần trăm (%) thắng - thua khi tham gia chiến đấu
 </div>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="33%" align="center"><img src="http://{{$app.domain.img}}/btn_card_g.gif" width="69" height="29" /></td>
<td width="33%" align="center"><a href="{{"/my/index.php?ss="|cat:$app.ss|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_quest.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><img src="http://{{$app.domain.img}}/btn_fight_g.gif" width="69" height="29" /></td>
</tr>
</table>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center; background-color:#CC6699;"><span style="size:small; color:#{{$app.color.text}};">Chức năng đoàn quân</span></div>
<span style="color:#ff9900;">Vé số:</span> Đổi vé số để được thêm nhiều Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;">Shop:</span> Trang bị quân khí, khôi phục năng lượng...<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#00ffff;">Quân khí:</span> Kiểm soát trang bị binh lực của quân đoàn<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff9900;">Đồng minh:</span> Liên kết với nhiều đồng minh để tăng sức mạnh quân đoàn<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;">Kho báu:</span> Lưu trữ những vật báu giành được<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#33ff00;">Nhật trình Chiến trường:</span> Xem lại thông tin những lần thực hiện nhiệm vụ<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="color:#33ff00;">Trợ giúp:</span> Giải đáp các vấn đề của Linh Triều Bình Ca<br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#CC6699;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
</div>
</body>
</html>
