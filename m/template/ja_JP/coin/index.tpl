<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Mua Ngọc</title>
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center; background-color:#820000;">Mua Ngọc</div>
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="color:#FFCC99;text-align:center;"> Giúp bạn có thêm Ngọc để mua các món đồ cần thiết cho quân đoàn.</div>
<div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="84" align="center">
<img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_p.jpg" width="80" height="109" /><br />
<span style="font-size:x-small;"><a href="{{"/my/greet/list/?cl=1"|cnvgw}}">Thông tin quân đoàn</a></span>
</td>
<td><span style="font-size:x-small;">
Quân đoàn trưởng: {{$app.card.name}}({{$app.card.rank}})<br />
Quân năng: Lv{{$app.profile.level}}<br />
Binh lính: {{$app.deck.follower}}<br />
Điểm kinh nghiệm: {{$app.profile.exp}} (Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>)<br />
Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}} - <span style="color:#ff0000;">Cần {{if $app.profile.rsv_time_min == 0}}{{$app.profile.rsv_time_sec}} giây {{else}}{{$app.profile.rsv_time_min}} phút {{/if}} để hồi phục</span><br />{{/if}}
Vàng: {{$app.profile.money}}<img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
Ngọc: <a href="{{"/coin/"|cnvgw}}">{{$app.profile.coin}} </a> <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /><br />
Tỷ lệ thắng: {{$app.profile.rate}}% ({{$app.profile.win}} Thắng {{$app.profile.lose}} Bại)</span></td></tr>
</table>
<img width="1" height="5" src="http://{{$app.domain.img}}/spacer.gif">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td width="160" align="left">Xin chào <a href="{{"/my/index.php"|cnvgw}}" style="color:#00FF00;"><i>{{$app.profile.handle}}</i></a></td><td></td></tr>
<tr><td width="160" align="left">Mã số nạp Ngọc của bạn</td><td align="left"><span style="background-color:#66CCFF;text-align:center; padding:0px 5px 0px 5px;">{{$app.profile.memberid|id2smsid}}</span></td></tr>
<tr><td width="160" align="left">Số Ngọc hiện có:</td><td align="left"><span style="color:#FFFF00">{{$app.profile.coin}} <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /></span></td></tr>
<tr valign="top"><td width="160" align="left">Số Vàng hiện có: </td><td align="left"><span style="color:#FFFF00">{{$app.profile.money}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /></span></td></tr>
</table>
<div>
<p>Để nạp NGỌC bạn soạn tin nhắn theo cú pháp:<br />
<span style="font-weiht:bold; color:#FFFF00">NGOC {{$app.profile.memberid|id2smsid}}</span> Gửi <span style="font-weiht:bold; color:#FFFF00">7549</span> (Phí 5.000/SMS) Bạn sẽ nhận được 100 ngọc.<br />
<span style="font-weiht:bold; color:#FFFF00">NGOC {{$app.profile.memberid|id2smsid}}</span> Gửi <span style="font-weiht:bold; color:#FFFF00">7649</span> (Phí 10.000/SMS) Bạn sẽ có 200 ngọc và được tặng thêm 10 ngọc. Tổng cộng: 210 ngọc.<br />
<span style="font-weiht:bold; color:#FFFF00">NGOC {{$app.profile.memberid|id2smsid}}</span> Gửi <span style="font-weiht:bold; color:#FFFF00">7749</span> (Phí 15.000/SMS) Bạn sẽ có 300 ngọc và được tặng thêm 20 ngọc. Tổng cộng: 320 ngọc.</p>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{*
<div style="text-align:center; background-color:#e7657b;"><span style="size:small; color:#ffffff;">Tin tức</span></div>
<div style="background-color:#ffcfff; color:black">
Hiện tại, hệ thống dịch vụ của Viettel đang xảy ra sự cố nên việc nạp Ngọc từ các đầu số Viettel tạm thời có vấn đề. Linh Triều Bình Ca rất xin lỗi các bạn vì sự cố đáng tiếc này.<br/>
Linh Triều Bình Ca đang cố gắng khắc phục trong thời gian sớm nhất có thể. <br/>
Cảm ơn sự ủng hộ của tất cả các bạn!<span style="color:red; font-weight:bold"></span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
*}}

<img width="1" height="5" src="http://{{$app.domain.img}}/spacer.gif">
<div style="text-align:center;"><a href="sms:7549?body=NGOC {{$app.profile.memberid|id2smsid}}"><img src="http://{{$app.domain.img}}/mua50coin.gif" alt=""/></a></div>
<div style="text-align:center;"><a href="sms:7649?body=NGOC {{$app.profile.memberid|id2smsid}}"><img src="http://{{$app.domain.img}}/mua100coin.gif" alt=""/></a></div>
<div style="text-align:center;"><a href="sms:7749?body=NGOC {{$app.profile.memberid|id2smsid}}"><img src="http://{{$app.domain.img}}/mua150coin.gif" alt=""/></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" />
<div style="text-align:center;"><a href="{{"/coin/convert.php"|cnvgw}}">Trang Đổi Ngọc</a></div>
{{include file="parts/footer.tpl"}}
</body>
</html>
