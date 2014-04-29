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
<div style="text-align:center; background-color:#820000; color:#ffffff;"><span style="color:#ffffff;"> Lời mời đồng minh</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;background-color:#993366; border-color:#993366; border-style:solid;"><span style="color:#ffffff;">{{if $app.mode =="send"}}Đang mời {{else}}Được mời {{/if}}làm đồng minh</span></div>


Đồng minh : <a href="{{"/my/friend/list/"|cnvgw}}">{{$app.nums.friend}}</a>/{{$app.nums.max}}<br />
{{if $app.mode =="send"}}
Đang mời: {{$app.nums.send}}<br />
Được mời: <a href="{{"/friend/approve/"|cnvgw}}">{{$app.nums.rcv}}</a><br />
{{else}}
Đang mời: <a href="{{"/friend/approve/?mode=send"|cnvgw}}">{{$app.nums.send}}</a><br />
Được mời: {{$app.nums.rcv}}<br />
{{/if}}
Còn mời được: {{if $app.nums.rest > 0}}<a href="{{"/other/list.php?md=fr"|cnvgw}}">{{$app.nums.rest}}</a><br />- <a href="{{"/other/list.php?md=fr"|cnvgw}}">Kêu gọi </a>đồng minh{{else}}<span style="color:#ff0000;">0quân<br /> - Số lượng đồng minh đến giới hạn trên </span>{{/if}}<br />

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if $app.mode =="send"}}
<div style="text-align:center;">Đang mời/<a href="{{"/friend/approve/"|cnvgw}}">Được mời</a></div>
{{else}}
<div style="text-align:center;"><a href="{{"/friend/approve/?mode=send"|cnvgw}}">Đang mời</a> /Được mời</div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<!-- * -->
{{if !$app.list}}
{{if $app.mode =="send"}}Bạn chưa mời quân đoàn nào làm đồng minh{{else}}Hiện tại không có lời mời nào cần xác nhận {{/if}}
{{/if}}

{{foreach from=$app.list item=friend}}
<div style="background-color:{{cycle values="#000000;,#333333;"}}">
<table border="0" width="100%" height="64" cellspacing="0" cellpadding="0">
<tr>
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/{{$friend.prof}}_s.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
{{if $app.mode =="send"}}
<a href="{{"/other/?id="|cat:$friend.memberid|cnvgw}}">
{{else}}
<a href="{{"/other/?id="|cat:$friend.friendid|cnvgw}}">
{{/if}}
Quân đoàn {{$friend.handle}} </a><br />
{{include file="parts/emoji.tpl" id=4}}Quân năng: {{$friend.level}}<br />
{{if $app.mode =="send"}}
{{include file="parts/emoji.tpl" id=9}}<a href="{{"/friend/approve/complete.php?res=4&id="|cat:$friend.memberid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Hủy mời</a>
{{else}}
{{include file="parts/emoji.tpl" id=3}}<a href="{{"/friend/approve/complete.php?res=2&id="|cat:$friend.friendid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Đồng ý</a>&nbsp;&nbsp;
{{include file="parts/emoji.tpl" id=9}}<a href="{{"/friend/approve/complete.php?res=3&id="|cat:$friend.friendid|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Từ chối</a>
{{/if}}
</span></td></tr></table>
</div>
{{/foreach}}
<!-- * -->

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/friend/approve/" parm="&mode="|cat:$form.mode}}

</div>
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
