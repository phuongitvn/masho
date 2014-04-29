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
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">{{if $form.op == "sj"}}Hợp nhất đặc năng {{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if isset($app.hlv)}}
<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<span style="color:#ffff00;">Không thể sử dụng để hợp nhất những Card có level đặc năng lớn hơn 10</span>
</span></td></tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:right"><a href="{{"/qa/detail.php?id=160"|cnvgw}}">Tìm hiểu về Tượng thần</a></div>
{{else}}

<div style="text-align:center;color:#ff0000;">{{if $form.op == "sj"}} Không có Tượng thần{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/{{if $form.op == "sj"}}160{{/if}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
{{if $form.op == "sj"}}Sử dụng thay Card nguyên liệu, giúp tăng thêm 1 cấp độ đặc năng đối với những Card có cấp độ đặc năng từ 1-9.{{/if}}<span style="color:#ffff00;">xác suất thành công 100%!</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span>{{if $form.op == "sj"}}<a href="{{"/item/?act=item_confirm&num=1&id=160"|cnvgw}}">{{elseif $form.sc == "pg"}}<a href="{{"/item/?act=item_confirm&num=1&id=161"|cnvgw}}">{{elseif $form.sc == "ps"}}<a href="{{"/item/?act=item_confirm&num=1&id=162"|cnvgw}}">{{/if}}Mua ngay!</a>
</span></td></tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $form.op == "sj"}}
<div style="text-align:right"><a href="{{"/qa/detail.php?id=160"|cnvgw}}">Tìm hiểu về Tượng thần</a></div>
{{/if}}

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $form.op == "sj"}}<a href="{{"/card/complist.php"|cnvgw}}">Về Hợp nhất đặc năng </a>{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
