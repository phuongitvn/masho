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
{{if $app.list}}
<div style="text-align:center; background-color:#cccccc; display: -wap-marquee;-wap-marquee-loop:"><span style="font-size:x-small;color:#000000;">
{{foreach from=$app.list item=item name=evlg}}
{{$item.reg_time|date_format2}}
{{if $item.status == "0"}}
Bạn vừa thắng tấn công của quân đoàn {{$item.friendname}}
{{elseif $item.status == "1"}}
Bạn vừa thua tấn công của quân đoàn {{$item.friendname}}
{{elseif $item.status == "2"}}
Quân đoàn {{$item.friendname}} yêu cầu bạn cứu viện 
{{elseif $item.status == "5"}}
Quân đoàn {{$item.friendname}} vừa gia nhập Linh triều Bình Ca
{{elseif $item.status == "6"}}
Quân đoàn {{$item.friendname}} đã trở thành quân đồng minh
{{elseif $item.status == "7"}}
Quân đoàn {{$item.friendname}} mời bạn làm đồng minh
{{elseif $item.status == "8"}}
Quân đoàn {{$item.friendname}} đã loại bạn khỏi danh sách đồng minh
{{elseif $item.status == "9"}}
Quân đoàn {{$item.friendname}} từ chối làm đồng minh
{{elseif $item.status == "A"}}
Quân đoàn {{$item.friendname}} vừa tặng Card cho bạn
{{elseif $item.status == "B"}}
Quân đoàn {{$item.friendname}} vừa tặng báu vật cho bạn
{{elseif $item.status == "C"}}
Quân đoàn {{$item.friendname}} nhận được quà báu vật nhờ thắng khi viện trợ
{{/if}}
{{/foreach}}
{{/if}}
</span></div>
<div style="font-size:x-small;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.bouns =="GET"}}
<div style="text-align:center;"><a href="{{"/gacha/index.php?bonus=1"|cnvgw}}"><img src="http://{{$app.domain.img}}/bonus.gif" width="160" height="48" /></a></div>
<div style="text-align:right;"><a href="{{"/qa/detail.php?id=140"|cnvgw}}">Xem thêm Quà đăng nhập</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
<div style="background-color:#{{$app.color.sub}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="background-color:#{{$app.color.main}};color:#{{$app.color.text}};text-align:center;">
{{*Chiến trường {{$app.stage}} ({{$app.title}})*}}Trang riêng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="84" align="center">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_p.jpg" width="80" height="109" /><br />
<span style="font-size:x-small;"><a href="{{"/my/wall.php"|cnvgw}}">Thông tin quân đoàn </a></span>
</td>
<td valign="middle"><span style="font-size:x-small;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
Quân đoàn trưởng: {{$app.card.name}} ({{$app.card.rank}})<br />
Quân năng: {{$app.profile.level}}<br />
Quân binh: {{$app.deck.follower}}<br />
Điểm kinh nghiệm: {{$app.profile.exp}} {{if $app.diffExp}}(Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>){{/if}}<br />
Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}} - <span style="color:#ff0000;">Cần {{if $app.profile.rsv_time_min == 0}}{{$app.profile.rsv_time_sec}} giây{{else}}{{$app.profile.rsv_time_min}} phút{{/if}} để hồi phục</span><br />{{/if}}
Vàng: {{$app.profile.money}} <img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
Ngọc: <a href="{{"/coin/"|cnvgw}}">{{$app.profile.coin}}</a> <img src="http://{{$app.domain.img}}/ngoc.gif" width="10" height="8" /><br />
Tỷ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/Bại {{$app.profile.lose}})</span></td></tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /></div>
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
<div style="text-align:center; background-color:#{{$app.color.main}};"><span style="size:small; color:#{{$app.color.text}};">Tin tức</span></div>
<div>
- (21/07) Kể từ thời điểm 10h ngày 21/07/2011, Linh Triều Bình Ca sẽ tiến hành reset lại tài khoản trong 2 phiên bản Close Beta và Open Beta.<br/>
<br/>
- (21/07) Linh Triều Bình Ca phiên bản Grand Open có thêm một số tính năng mới<br/>
<br />
<div style="text-align:right;font-size:x-small;">
<a href="{{"/ranking/level.php"|cnvgw}}">Top 100</a> | <a href="{{"/my/notice.php"|cnvgw}}">Xem thêm</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>

{{if $app.event_result}}
<div style="text-align:center; background-color:#{{$app.color.main}};"><span style="size:small; color:#{{$app.color.text}};">Tin Event</span></div>
<div>
- Người may mắn của {{$app.event_result.week_text}} là <a href="{{"/other/wall.php?id="|cat:$app.event_result.memberid|cnvgw}}">{{$app.event_result.handle}}</a>. Được tặng {{if $app.event_result.name}}{{$app.event_result.name}}{{else}}{{$app.event_result.amount}} Ngọc{{/if}}. Xin chúc mừng!<br/>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
{{/if}}


<div style="text-align:center; background-color:#{{$app.color.main}};"><span style="size:small; color:#{{$app.color.text}};">Người đưa tin</span></div>
{{if $app.list}}
{{foreach from=$app.list item=item name=evlg}}
{{if $item.status == "0"}}
{{if $item.trap == 1}}
- Bạn vừa thắng tấn công của <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> nhờ sử dụng lá bùa
{{else}}
{{if $item.lnk == 1}}
- Bạn vừa <a href="{{"/my/fight.php?id="|cat:$item.ddn|cat:"&oid="|cat:$item.friendid|cnvgw}}">thắng</a> tấn công của <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a>
{{else}}
- Bạn vừa thắng tấn công của <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> với tỉ số {{$item.win}} thắng {{$item.lose}} bại
{{/if}}
{{/if}}
{{elseif $item.status == "1"}}
{{if $item.lnk == 1}}
- Bạn vừa <a href="{{"/my/fight.php?id="|cat:$item.ddn|cat:"&oid="|cat:$item.friendid|cnvgw}}">thua</a> tấn công của <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a>
{{else}}
- Bạn vừa thua tấn công của Quân đoàn {{$item.friendname}} với tỉ số {{$item.win}} thắng {{$item.lose}} bại
{{/if}}
{{elseif $item.status == "2"}}
- Bạn nhận được <a href="{{"/help/entry.php?id="|cat:$item.ddn|cat:"&fid="|cat:$item.friendid|cat:"&oid="|cat:$item.otherid|cnvgw}}">yêu cầu cứu viện</a> từ <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">quân đoàn {{$item.friendname}}</a>
{{elseif $item.status == "5"}}
- Quân đoàn bạn mời <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">quân đoàn {{$item.friendname}}</a> tham chiến
{{elseif $item.status == "6"}}
- <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> đã trở thành đồng minh
{{elseif $item.status == "7"}}
- <a href="{{"/friend/approve/"|cnvgw}}">Quân đoàn {{$item.friendname}}</a> vừa mời bạn làm đồng minh
{{elseif $item.status == "8"}}
 - <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> đã loại bạn ra khỏi danh sách đồng minh 
{{elseif $item.status == "9"}}
 - <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> từ chối lời mời làm đồng minh 
{{elseif $item.status == "A"}}
 - Bạn được <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> tặng Card <a href="{{"/card/pre.php"|cnvgw}}"> {{$item.namerank}}</a>
{{elseif $item.status == "B"}}
 - Bạn được <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.friendname}} </a> tặng báu vật <a href="{{"/treasure/detail.php?tid="|cat:$item.trid|cnvgw}}">{{$item.trname}}</a>
{{elseif $item.status == "C"}}
 - Được <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">quân đoàn {{$item.friendname}}</a> tặng báu vật <a href="{{"/treasure/detail.php?tid="|cat:$item.trid|cnvgw}}">{{$item.trname}}</a> nhờ cứu viện thắng
{{/if}} ({{$item.reg_time|date_format2}})<br />
{{/foreach}}
{{/if}}
{{if $app.list2}}
{{foreach from=$app.list2 item=item}}
- Bạn nhận được <a href="{{"/my/wall.php"|cnvgw}}">lời nhắn</a> từ <a href="{{"/other/wall.php?id="|cat:$item.owner_user_id|cnvgw}}">Quân đoàn {{$item.user_name|escape}}</a> ({{$item.created|date_format2}})<br />
{{/foreach}}
{{/if}}
<div style="text-align:right;font-size:x-small;"><a href="{{"/my/event.php"|cnvgw}}">Xem thêm</a></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};"><span style="size:small; color:#{{$app.color.text}};">Thông tin Đồng minh</span></div>
{{if $app.listF}}
{{foreach from=$app.listF item=item name=frlg}}
- <a href="{{"/other/wall.php?id="|cat:$item.memberid|cnvgw}}">Quân đoàn {{$item.friendname}}</a> ({{$item.reg_time|date_format2}})<br />
{{if $item.status == 0}}
{{$item.stagename}}<br />
{{elseif $item.status == 1}}
Hoàn thành gói <span style="color:#ffff00;">{{$item.seriesname}}</span>, đạt 2 gói báu vật đủ!<br />
{{elseif $item.status == 2}}
Đăng kí Card muốn có {{$item.bushoname}} ({{$item.rank}})!<br />
{{elseif $item.status == 3}}
Giành được card {{if $item.rank =="A"}}rất{{elseif $item.rank =="B"}}{{/if}} hiếm"{{$item.bushoname}} (<span style="color:#ffff00;">{{$item.rank}}</span>)"!<br />
{{/if}}
{{/foreach}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="text-align:right;font-size:x-small;"><a href="{{"/my/comm.php"|cnvgw}}">Xem thêm</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
Không có thông tin đồng minh<br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#{{$app.color.main}};"><span style="size:small; color:#{{$app.color.text}};">Chức năng Quân đoàn</span></div>
<div style="margin-bottom:1ex"><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span><a href="{{"/gacha/?ssid="|cat:$app.ssid|cnvgw}}">Vé số</a>: Đổi vé số để được thêm nhiều Card</div>
<div style="margin-bottom:1ex"><span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=27}}</span><a href="{{"/item/"|cnvgw}}">Shop</a>: Trang bị quân khí, khôi phục năng lượng...</div>
<div style="margin-bottom:1ex"><span style="color:#00ffff;">{{include file="parts/emoji.tpl" id=28}}</span><a href="{{"/item/?md=1"|cnvgw}}">Quân khí</a>: Kiểm soát trang bị binh lực của quân đoàn</div>
<div style="margin-bottom:1ex"><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=9}}</span><a href="{{"/my/friend/list/"|cnvgw}}">Đồng minh</a>: Liên kết với nhiều đồng minh để tăng sức mạnh quân đoàn</div>
<div style="margin-bottom:1ex"><span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=30}}</span><a href="{{"/my/treasure.php"|cnvgw}}">Kho báu</a>: Lưu trữ những vật báu giành được</div>
<div style="margin-bottom:1ex"><span style="color:#33ff00;">{{include file="parts/emoji.tpl" id=12}}</span><a href="{{"/diary/"|cnvgw}}">Nhật trình Chiến trường</a>: Xem lại thông tin những lần thực hiện nhiệm vụ</div>
<div><span style="color:#33ff00;">{{include file="parts/emoji.tpl" id=31}}</span><a href="{{"/qa/"|cnvgw}}">Trợ giúp</a>: Giải đáp các vấn đề của Linh Triều Bình Ca</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
