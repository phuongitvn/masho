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


<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">Lịch sử Quân đoàn {{$app.profile.handle}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
Ngày gia nhập: {{$app.profile.reg_time|date_format:"%d/%m/%Y"}}<br />
Quân năng: {{$app.profile.level}}<br />
Quân binh: {{$app.deck.follower}}<br />
Vàng: {{$app.profile.money}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
Tỷ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/ Bại {{$app.profile.lose}})<br />
Đồng minh: <a href="{{"/my/friend/list/"|cnvgw}}">{{$app.nums.friend}}/{{$app.nums.max}}</a><br />
Vũ khí: {{$app.sum1}}<br />
Đồ phòng thủ: {{$app.sum2}}<br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;">[Thử thách]</div>
Hoàn thành: {{$app.quest.archieve}}%<br />
Chiến trường: {{$app.quest.stagename}}<br />
Qua trận: {{$app.quest.clear}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;">[Card]</div>
Tổng Card:<a href="{{"/card/deck.php"|cnvgw}}">Cỗ bài 5 + Kho Card {{$app.cntF}}</a><br />
Đã kết hợp: {{$app.profile.total_comp}}<br />
- Đặc năng Lv: {{$app.profile.total_lvcomp}}<br />
- Điểm kỹ năng: {{$app.profile.total_ptcomp}}<br />
Tỷ lệ thành công:<br />
- Đặc năng Lv: {{$app.profile.rate_lvcomp}}%<br />
- Điểm kỹ năng: {{$app.profile.rate_ptcomp}}%<br />

{{if $app.wlist_num <> 0}}
{{if $app.wlist}}
Card Ước: <a href="{{"/card/wish/"|cnvgw}}">{{$app.wlist_num}}</a><br />
<!-- * -->
{{foreach from=$app.wlist item=item name=wish}}
- {{$item.name_rank}} <br />
<!-- * -->
{{/foreach}}
{{/if}}
{{else}}
Card Ước: <a href="{{"/card/wish/"|cnvgw}}"><span style="color:#ff0000;">Chưa đăng ký</span></a><br />
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;">[Năng lực]</div>
Công lực: {{$app.deck.offense}}<br />
Thủ lực: {{$app.deck.defense}}<br />
Lần tham chiến: {{$app.profile.fight_num}}<br />
Tỷ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/ Bại {{$app.profile.lose}}）<br />
- Tấn công: {{$app.profile.rate_act}}% (Thắng {{$app.profile.win_act}}/ Bại {{$app.profile.lose_act}})<br />
- Phòng bị: {{$app.profile.rate_pas}}% (Thắng {{$app.profile.win_pas}}/ Bại {{$app.profile.lose_pas}})<br />
Thắng nhờ viện trợ: {{$app.profile.rate_hlp}}%(Thắng {{$app.profile.win_hlp}}/ Bại {{$app.profile.lose_hlp}})<br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<div style="text-align:center;">[Vật báu]</div>
Tỷ lệ hoàn thành: {{$app.numChk.archieve}}%<br />
Gói hoàn thành: <a href="{{"/my/treasure.php"|cnvgw}}">{{if $app.numChk.CompNum == 0}}<span style="color:#ff0000;">Chưa có</span>{{else}}{{$app.numChk.CompNum}}{{/if}}</a><br />

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
