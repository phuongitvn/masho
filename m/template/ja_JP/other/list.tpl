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
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{if $app.md == "fr"}}Kêu gọi đồng minh{{else}}Tìm quân đoàn chiến đấu{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>{{if $app.md == "fr"}}
Tăng đồng minh để tăng sức mạnh! Bạn còn mời được<span style="color:#ffff00;"> {{$app.nums.rest}}</span> Quân đoàn làm đồng minh.<br />
<div>
<a href="{{"/other/list.php?md=fr&lv=h"|cnvgw}}"><span style="font-size:x-small;">Tìm đồng minh quân năng cao hơn</span></a><br />
<a href="{{"/other/list.php?md=fr&lv=l"|cnvgw}}"><span style="font-size:x-small;">Tìm đồng minh quân năng thấp hơn</span></a><br />
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<form action="{{"/other/list.php?md="|cat:$app.md|cnvgw}}" method="post">
<input type="text" name="q" value="{{$app.q|escape}}" />
<input style="font-size:x-small" type="submit" value="Tìm " />
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">Danh sách Quân đoàn</div>
{{elseif $app.md == "tr"}}
<div style="text-align:center;"><span style="color:#ffff00;">Báu vật tìm kiếm</span></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="80" style="text-align:center;">
{{if $app.own == 0 }}
<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" />
{{else}}
<img src="http://{{$app.domain.img}}/treasure/{{$app.tr.treasureid}}.gif" width="70" height="70" />
{{/if}}
</td><td><span style="font-size:x-small;">
Báu vật {{$app.tr.name}}<br />
Gói {{$app.sr.name}}<br />
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/other/list.php"|cnvgw}}"><span style="font-size:x-small;">Tìm kiếm không theo gói báu vật</span></a><br />
<a href="{{"/other/list.php?md=rv"|cnvgw}}"><span style="font-size:x-small;">Tìm kiếm từ những đối thủ mình đã thua</span></a>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{elseif $app.md == "rv"}}
<a href="{{"/my/treasure.php?mode=choice"|cnvgw}}"><span style="font-size:x-small;">Tìm kiếm từ gói báu vật muốn có</span></a><br />
<a href="{{"/other/list.php"|cnvgw}}"><span style="font-size:x-small;">Tìm kiếm đối thủ khác</span></a>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">Danh sách những đối thủ mình đã thua</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{if $app.lv == "" }}
Mới nhất | <a href="{{"/other/list.php?lv=old&md="|cat:$app.md|cnvgw}}">Cũ nhất</a> | <a href="{{"/other/list.php?lv=high&md="|cat:$app.md|cnvgw}}">LV tăng dần</a> | <a href="{{"/other/list.php?lv=low&md="|cat:$app.md|cnvgw}}">Lv giảm dần</a>
{{elseif $app.lv == "old" }}
<a href="{{"/other/list.php?&md="|cat:$app.md|cnvgw}}">Mới nhất</a> | Cũ nhất | <a href="{{"/other/list.php?lv=high&md="|cat:$app.md|cnvgw}}">LV tăng dần</a> | <a href="{{"/other/list.php?lv=low&md="|cat:$app.md|cnvgw}}">Lv giảm dần</a>
{{elseif $app.lv == "high" }}
<a href="{{"/other/list.php?&md="|cat:$app.md|cnvgw}}">Mới nhất</a> | <a href="{{"/other/list.php?lv=old&md="|cat:$app.md|cnvgw}}">Cũ nhất</a> | LV tăng dần | <a href="{{"/other/list.php?lv=low&md="|cat:$app.md|cnvgw}}">Lv giảm dần</a>
{{elseif $app.lv == "low" }}
<a href="{{"/other/list.php?&md="|cat:$app.md|cnvgw}}">Mới nhất</a> | <a href="{{"/other/list.php?lv=old&md="|cat:$app.md|cnvgw}}">Cũ nhất</a> | <a href="{{"/other/list.php?lv=high&md="|cat:$app.md|cnvgw}}">LV tăng dần</a> | Lv giảm dần
{{/if}}
</div>
{{else}}
<a href="{{"/my/treasure.php?mode=choice"|cnvgw}}"><span style="font-size:x-small;">Tìm kiếm từ gói báu vật muốn có</span></a><br />
<a href="{{"/other/list.php?md=rv"|cnvgw}}"><span style="font-size:x-small;">Tìm kiếm từ những đối thủ mình đã thua</span></a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<form action="{{"/other/list.php?md="|cat:$app.md|cnvgw}}" method="post">
<input type="text" name="q" value="{{$app.q|escape}}" />
<input style="font-size:x-small" type="submit" value="Tìm " />
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}<!-- * -->
{{if $app.list }}
{{foreach from=$app.list item=other}}
<div style="background-color:{{cycle values="#000000;,#333333;"}}">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>
<td width="60" align="center"><img src="http://{{$app.domain.img}}/card/{{$other.prof}}_s.jpg" alt="" width="60"  /></td>
<td><span style="font-size:x-small;">
{{if $app.md == "tr"}}
<a href="{{"/other/wall.php?id="|cat:$other.memberid|cat:"&tid="|cat:$app.trid|cnvgw}}">
{{elseif $app.md == "rv"}}
<a href="{{"/other/wall.php?id="|cat:$other.id|cnvgw}}">
{{else}}
<a href="{{"/other/wall.php?id="|cat:$other.memberid|cnvgw}}">
{{/if}}
Quân đoàn {{$other.handle}}</a><br />
Quân năng: Lv{{$other.level}}<br />
{{if $app.md == "fr"}}
Đồng minh: {{$other.friend_num}}<br />
<a href="{{"/friend/apply/?act=friend_apply_complete&id="|cat:$other.memberid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Kêu gọi đồng minh</a>
{{else}}
Thắng {{$other.win}} Bại {{$other.lose}} ({{$other.rate}}%)<br />
Quân binh: {{$other.follower}}
{{/if}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
{{/foreach}}
<!-- * -->
{{if $app.md != "fr"}}
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/other/list.php" parm="&lv="|cat:$app.lv|cat:"&md="|cat:$app.md }}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=55}}</span>Có thể mời cùng một đối thủ chiến đấu tối đa là 3 lần trong 1 ngày<br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=55}}</span>Bạn phải đợi đến ngày hôm sau mới có thể mời đối thủ mình đã chiến thắng chiến đấu tiếp
{{/if}}

{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.md == "tr"}}
<span style="color:#ff0000;">Không có đối thủ đang có báu vật</span><br />
{{else}}
<span style="color:#ff0000;">Không tìm thấy Quân đoàn nào</span><br />
{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<!-- footer -->

{{if $app.md != "fr"}}
<div style="text-align:center"><a href="{{"/other/list.php"|cnvgw}}">Tìm ngẫu nhiên</a></div>
{{else}}
<div style="text-align:center"><a href="{{"/other/list.php?md=fr"|cnvgw}}">Tìm ngẫu nhiên</a></div>
<div style="text-align:center">
<a href="{{"/my/friend/list/"|cnvgw}}">Danh sách đồng minh</a>
</div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
