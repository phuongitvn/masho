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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=10}}Mời đồng minh</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<table border="0" width="100%" height="64" cellspacing="0" cellpadding="0">
<tr>
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.friend.prof}}.jpg" alt="" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">Quân đoàn {{$app.friend.handle}}</a><br />
{{include file="parts/emoji.tpl" id=4}}Quân năng: {{$app.friend.level}}<br />
{{include file="parts/emoji.tpl" id=7}}Đồng minh: {{$app.friend.friend_num}}</span></td>
</tr>
</table>

{{if $app.isCompleted == true}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">Lời mời đồng minh đã được gửi đến quân đoàn {{$app.friend.handle}}.</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">Quân đoàn {{$app.friend.handle}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/friend/approve/?mode=send"|cnvgw}}">Lời mời đồng minh</a><br />

{{elseif $app.isApply == true && $app.isFrApply == true}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">Bạn muốn mời Quân đoàn {{$app.friend.handle}} làm đồng minh?</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">

<form action="http://{{$app.domain.www}}" method="POST">
<input type="hidden" name="act" value="friend_apply_complete" />
<input type="hidden" name="id" value="{{$form.id}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Có" />
</form>

<form action="{{"/other/list.php?md=fr"|cnvgw}}" method="POST">
<input type="hidden" name="id" value="{{$form.id}}" />
<input type="submit" value="Không" /><br />
</form>

{{elseif $app.isApply == false}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">Số lượng đồng minh đã đạt mức tối đa {{$app.maxc}}. Bạn không thể mời thêm được. </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">

<a href="{{"/friend/approve/index.php?mode=send"|cnvgw}}">Về Lời mời đồng minh</a>
{{elseif $app.isFrApply == false}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">{{$app.friend.handle}}Số lượng đồng minh đã đạt mức tối đa, bạn không thể mời thêm đồng minh</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">

<a href="{{"/friend/approve/index.php?mode=send"|cnvgw}}">Về Lời mời đồng minh</a>

{{/if}}
</div>
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
