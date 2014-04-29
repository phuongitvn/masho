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
<div style="font-size:x-small;">{{if $form.id == "" }}
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{if $app.md == "" || $app.md == "bs" }}{{include file="parts/emoji.tpl" id=10}} Danh sách đồng minh{{else}} Tặng Báu vật{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<div style="text-align:center; background-color:#3366FF;color:#ffffff;">Danh sách đồng minh {{$app.ot_profile.handle}}</div>
{{/if}}{{if $form.id == "" }}
{{if $app.md == ""}}
Đồng minh: {{$app.nums.friend}}/{{$app.nums.max}}<br />
Đang mời: <a href="{{"/friend/approve/?mode=send"|cnvgw}}">{{$app.nums.send}}</a><br />
Được mời: <a href="{{"/friend/approve/"|cnvgw}}">{{$app.nums.rcv}}</a><br />
Còn mời được: {{if $app.nums.rest > 0}}<a href="{{"/other/list.php?md=fr"|cnvgw}}">{{$app.nums.rest}}</a><br />- <a href="{{"/other/list.php?md=fr"|cnvgw}}">Kêu gọi</a> đồng minh{{else}}<span style="color:#ff0000;">0<br />- Số lượng đồng minh đã đến giới hạn trên</span>{{/if}}<br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />{{if $app.st == "lv" }}
<div style="text-align:center;"> Quân năng/<a href="{{"/my/friend/list/?st=pt"|cnvgw}}">Độ hữu hảo</a></div>
{{else}}
<div style="text-align:center;"> <a href="{{"/my/friend/list/"|cnvgw}}">Quân năng</a>／Độ hữu hảo</div>
{{/if}}
{{/if}}
{{/if}}{{if $app.md == "tp"}}
Hãy chọn đồng minh để tặng quà<br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="75"><img src="http://{{$app.domain.img}}/treasure/{{$app.pre}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<span style="color:#ffff00;">{{$app.tr.name}}</span><br />
Gói {{$app.sr.name}}
</span></td></tr>
</table>
{{elseif $app.md == "cp" || $app.md == "wp" }}
Hãy chọn quân đồng minh để tặng quà.<br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if $app.md == "cp"}}
<div style="text-align:center;"><a href="{{"/my/friend/list/?md=wp&cid="|cat:$app.pre|cnvgw}}">Đồng minh đang đăng kí card muốn có</a></div>
{{elseif $app.md == "wp"}}
<div style="text-align:center;"><a href="{{"/my/friend/list/?md=cp&cid="|cat:$app.pre|cnvgw}}">Tìm kiếm từ danh sách đồng minh</a></div>
{{/if}}
{{elseif $app.md == "bs"}}
Khi đánh nhau với Yêu tướng thì có thể phân chia sức mạnh từ 2 đoàn quân  (Cômg lực, thủ lực, số lượng binh lính của quân mình tăng lên)<br />
{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>{{if $app.list}}
<!-- * -->
{{foreach from=$app.list item=item}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>
<td width="60" align="center"><a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.prof}}_s.jpg" alt="" width="60"  /></a></td>
<td><span style="font-size:x-small;">
{{if $app.md == "" }}
{{if $form.opensocial_owner_id == $item.friendid }}<a href="{{"/my/"|cnvgw}}">{{else}}<a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">{{/if}}Quân đoàn {{$item.handle}} </a>({{$item.lvname}})<br />
{{else}}
Quân đoàn <a href="{{"/other/wall.php?id="|cat:$item.friendid|cnvgw}}">{{$item.handle}}</a><br/>
{{/if}}{{if $app.md == "" }}
{{include file="parts/emoji.tpl" id=4}}Quân năng: {{$item.level}}<br />
{{if $form.id == "" }}
<a href="{{"/greeting/?id="|cat:$item.friendid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chào hỏi</a>
{{else}}
Đồng minh: {{$item.friend_num}}
{{/if}}
{{elseif $app.md == "tp" }}
Đang có: {{$item.has}}<br />
{{if $item.comp == 1}}
<span style="color:#ff0000;">Báu vật này giúp hoàn thành gói báu vật của đồng minh nên không thể tặng được.</span><br />
{{else}}
<a href="{{"/treasure/confirm.php?oid="|cat:$item.friendid|cat:"&tid="|cat:$app.pre|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Tặng</a>
{{/if}}
{{elseif $app.md == "cp" || $app.md == "wp"}}
Hộp quà: {{$item.has}}/9<br />
{{if $item.pre >= 9}}
<span style="color:#ff0000;">Hộp quà của đồng minh đã đầy. Bạn không thể tặng quà.</span>
{{else}}
<a href="{{"/card/confirm.php?oid="|cat:$item.friendid|cat:"&seq="|cat:$app.pre|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Tặng</a>
{{/if}}
{{elseif $app.md == "bs" }}
Quân năng : {{$item.level}}<br />
Công lực: {{$item.offense}}<br />
Thủ lực: {{$item.defense}}<br />
Quân binh: {{$item.follower}}<br />
{{if $item.entry_flg == "1"}}Đã chọn{{else}}<a href="{{"/boss/?eid="|cat:$item.friendid|cnvgw}}">Chọn quân đoàn này</a>{{/if}}<br />
{{/if}}
</span></td></tr></table>
</div>
<!-- * -->
{{/foreach}}
{{else}}
<span style="color:#ff0000;">
{{if $app.md == "wp"}}
Không có quân đoàn nào đăng kí card muốn có
{{else}}
Vẫn chưa có đồng minh<br />
{{if $form.id == "" }}
Cùng <a href="{{"/other/list.php?md=fr"|cnvgw}}">kêu gọi</a> đồng minh nào<br />
{{/if}}
{{/if}}
</span>
{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/my/friend/list/"  parm="&id="|cat:$form.id|cat:"&md="|cat:$app.md|cat:"&cid="|cat:$app.pre|cat:"&st="|cat:$form.st }}
</div><!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
