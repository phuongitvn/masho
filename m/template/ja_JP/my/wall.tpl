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
<div style="background-color:#993366;">
<div style="text-align:center;font-size:small;">Thông tin quân đoàn {{$app.profile.handle}}</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="85" align="center"><img src="http://{{$app.domain.www}}/img/card/{{$app.profile.prof}}_p.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/my/power.php"|cnvgw}}">Quân năng</a><br />
<a href="{{"/my/friend/list/"|cnvgw}}">Đồng minh</a><br />
<a href="{{"/card/wish/?ssid="|cat:$app.ssid|cnvgw}}">Card ước</a><br />
<a href="{{"/my/treasure.php"|cnvgw}}">Kho báu</a><br />
<a href="{{"/my/history.php"|cnvgw}}">Lịch sử quân đoàn</a><br />
Điểm thân thiện ({{if $app.profile.friend_pt >= 100}}<span style="color:#ffff00;">{{else}}<span style="color:#ff0000;">{{/if}}{{$app.profile.friend_pt}}</span>)<br />
{{if $app.profile.friend_pt >= 100 || $app.rcv > 0 }}
<a href="{{"/my/rcv/index.php?ssid="|cat:$app.ssid|cnvgw}}">Hồi phục năng lượng</a>
{{else}}
{{*- <span style="color:#ff0000;">Không thể hồi phục năng lượng</span><br />*}}
<a href="{{"/item/?unit=2&order=1&kbn=4"|cnvgw}}">Mua Phở thần công để hồi phục</a>
{{/if}}
</span><br/><a href="{{"/my/profile.php"|cnvgw}}">Hồ sơ cá nhân</a><br /><a href="{{"/my/invite.php"|cnvgw}}">Gửi lời mời</a><br/></td></tr></table><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="text-align:right;"><a href="{{"/my/greet/list/index.php"|cnvgw}}">Lịch sử Chào hỏi</a><br/></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br /></div><div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ffcc00; color:#000000;">Chia sẻ</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" />
</div>
<div>
<form method="post" style="padding-right:6px;">
<textarea name="status" rows="2" style="width:100%">{{$app.status|escape}}</textarea><br/>
<input type="submit" value="Gửi chia sẻ" />
</form>
<div style="color:red; font-weight:bold">
{{$app.err|escape}}
</div>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.list}}
{{foreach from=$app.list item=item}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="60" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.user_prof}}_s.jpg" alt="" width="60" /></td>
<td><span style="font-size:x-small;"><a href="{{"/other/wall.php?id="|cat:$item.owner_user_id|cnvgw}}"> Quân đoàn {{$item.user_name}}</a><br />
{{$item.modified|date_format2}}<br />
{{$item.summary|escape}}</span></td>
</tr>
</table>
</div>
{{/foreach}}
{{else}}
<span style="color:#ff0000;">Hãy chia sẻ cảm xúc và suy nghĩ của bạn với mọi người nào!</span>
{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/my/wall.php"}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>