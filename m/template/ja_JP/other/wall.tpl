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
<div style="background-color:#330066;color:#ffffff;"><div style="text-align:center;">{{if $app.kbn == 2 || $app.kbn == 3 }}Quân đồng minh {{/if}}[Quân đoàn {{$app.profile.handle}}]</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">
{{if $app.kbn == 1 }}
<a href="{{"/fight/?id="|cat:$app.profile.memberid|cat:"&trid="|cat:$app.trid|cnvgw}}">Chiến đấu</a> / <!-- Mỗi ngày chỉ được chào hỏi tối đa 3 lần với 1 đồng minh-->
<a href="{{"/greeting/?id="|cat:$app.profile.memberid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chào hỏi</a> / <!-- Khi số lượng đồng minh đạt giới hạn trên thì sẽ không thể đẩy/ấn được  -->
<a href="{{"/friend/apply/?id="|cat:$app.profile.memberid|cnvgw}}">Mời làm đồng minh</a>
{{elseif $app.kbn == 2 || $app.kbn == 3 }}
<a href="{{"/greeting/?id="|cat:$app.profile.memberid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chào hỏi</a> / 
<a href="{{"/card/file.php?mode=pre&id="|cat:$app.profile.memberid|cnvgw}}">Tặng quà</a>
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td width="85" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_s.jpg" alt="" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
Quân đoàn trưởng: {{$app.card.name}} ({{$app.card.rank}})<br />
Quân năng: {{$app.profile.level}}<br />
Danh hiệu: {{$app.stageName}} ({{$app.cycle}})<br />
Tỉ lệ thắng: {{$app.profile.rate}}% (Thắng {{$app.profile.win}}/Thua {{$app.profile.lose}})<br />
Đồng minh: <a href="{{"/my/friend/list/?id="|cat:$app.profile.memberid|cnvgw}}">{{$app.profile.friend_num}}</a>/{{$app.maxFr}}<br />
Gói báu vật đủ: <a href="{{"/my/treasure.php?id="|cat:$app.profile.memberid|cnvgw}}">{{if $app.numChk.CompNum == 0}}0{{else}}{{$app.numChk.CompNum}} Gói{{/if}}</a><br />
Vũ khí/Đồ phòng thủ: <a href="{{"/other/item.php?id="|cat:$app.profile.memberid|cnvgw}}">
{{$app.sum1}}/{{$app.sum2}}</a><br />
 Tổng Card: 
<a href="{{"/other/card.php?id="|cat:$app.profile.memberid|cnvgw}}">{{$app.cnt_card}}/41</a><br />
</span></td>
</tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:right;">
<a href="{{"/other/history.php?id="|cat:$app.profile.memberid|cnvgw}}">Lịch sử với Quân đoàn {{$app.profile.handle}}</a><br/>
<a href="{{"/other/index.php?id="|cat:$app.profile.memberid|cnvgw}}">Lịch sử Chào hỏi</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />{{if $app.kbn == 2 || $app.kbn == 3 }}
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/friend/approve/confirm.php?res=5&id="|cat:$app.profile.memberid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Hủy bỏ đồng minh</a><br />
</div>
{{/if}}
</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{if $app.kbn == 2 || $app.kbn == 3 }}
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Card muốn có</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.wlist}}
{{foreach from=$app.wlist item=item name=wish}}{{$item.name}}({{$item.rank}})
<div style="text-align:right;">{{if $item.own == 0 }}<span style="color:#ff0000;">Không có</span>{{elseif $item.own == 1 }}<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=30}}</span><a href="{{"/card/file.php"|cnvgw}}">Tặng quà</a>{{elseif $item.own == 2 }}<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=30}}</span><a href="{{"/card/pre.php"|cnvgw}}">Tặng quà</a>{{/if}}</div>{{/foreach}}
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<span style="color:#ff0000;">Chưa được đăng kí</span><br />
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}
{{/if}}<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ffcc00; color:#000000;">Chia sẻ</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" />
</div><div style="padding-right:6px;"><form method="post"><textarea name="status" rows="2" style="width:100%;">{{$app.status|escape}}</textarea><br/><input type="submit" value="Gửi chia sẻ" /></form><div style="color:red; font-weight:bold">{{$app.err|escape}}</div></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{if $app.list}}{{foreach from=$app.list item=item}}<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td width="60" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.user_prof}}_s.jpg" alt="" width="60" /></td><td><span style="font-size:x-small;"><a href="{{"/other/wall.php?id="|cat:$item.owner_user_id|cnvgw}}"> Quân đoàn {{$item.user_name}}</a><br />{{$item.modified|date_format2}}<br />{{$item.summary|escape}}</span></td></tr></table></div>{{/foreach}}{{else}}<span style="color:#ff0000;">Hãy chia sẻ cảm xúc và suy nghĩ của bạn với mọi người nào!</span>{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="text-align:center">{{assign var="other_id" value=$form.id}}{{include file="parts/pager2.tpl" url="/other/wall.php?id=$other_id"}}</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
