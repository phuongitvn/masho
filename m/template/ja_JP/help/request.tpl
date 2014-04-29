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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=10}}Kêu gọi cứu trợ</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.nums.friend == 0}}
Bạn không có đồng minh để kêu gọi cứu trợ. <br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center"><a href="{{"/other/list.php?md=fr"|cnvgw}}">Kêu gọi đồng minh</a></div>
{{else}}
Đã gửi yêu cầu cứu trợ đến những đồng minh dưới đây!
<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.list}}
<!-- * -->
{{foreach from=$app.list item=item}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" height="40" cellspacing="0" cellpadding="0">
<tr>
<td width="80" align="center">
<img src="http://{{$app.domain.img}}/card/{{$item.prof}}_s.jpg" alt="" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/other/?id="|cat:$item.friendid|cnvgw}}">Quân đoàn {{$item.handle}}</a>({{$item.lvname}})<br />
{{include file="parts/emoji.tpl" id=4}}Quân năng: {{$item.level}}<br />
</span></td></tr></table>
</div>
<!-- * -->
{{/foreach}}
{{/if}}

{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
