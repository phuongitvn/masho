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
<div style="text-align:center; background-color:#006600;">Chuyển đến kho Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="text-align:center;">
<div style="font-size:x-small;">Đã chuyển Card {{$app.card.name}} ({{$app.card.rank}}) đến kho Card</div><br />
<img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}.jpg" width="160" height="218" />

</div>



<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if $form.q <> ""}}
{{if $form.q == "fg"}}
<div style="text-align:center;">{{include file="parts/emoji.tpl" id=26}}<a href="{{"/other/list.php"|cnvgw}}" accesskey="5">Tiếp tục chiến đấu</a></div>
{{elseif $form.q == "ms"}}
<div style="text-align:center;"><a href="{{"/quest/index.php"|cnvgw}}">Về Thử thách</a></div>
{{else}}
<div style="text-align:center;"><a href="{{"/quest/disp.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Tiếp tục Thử thách</a></div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
