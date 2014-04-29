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
<div style="text-align:center; background-color:#006600;">Card ước</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.err == 1 }}
Bạn đã đăng ký Card <span style="color:#ff0000;">{{$app.name}}({{$app.rank}})</span>.<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
{{elseif $app.err == 3 }}
Bạn có thể đăng ký được tối đa<span style="color:#ff0000;"> 3 Card</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Bạn vừa đăng ký Card <span style="color:#ffff00;">{{$app.name}}({{$app.rank}})</span>. Đã gửi tin đến đồng minh
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

{{if $app.isReload == True}}
{{if $app.wish == 3}}<span style="color:#ff0000;">Bạn không thể đăng ký thêm Card</span><br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.wish == 2}}Bạn còn có thể đăng ký<span style="color:#ffff00;"> 1 </span>Card nữa<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/card/wish/?ssid="|cat:$app.ssid|cnvgw}}">Tiếp tục đăng ký Card</a></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.wish == 1}}Bạn còn có thể đăng ký<span style="color:#ffff00;"> 2 </span>Card nữa<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/card/wish/?ssid="|cat:$app.ssid|cnvgw}}">Tiếp tục đăng ký Card</a></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
{{else}}
{{if $app.wish == 2}}<span style="color:#ff0000;">Bạn không thể đăng ký thêm Card</span><br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.wish == 1}}Bạn còn có thể đăng ký<span style="color:#ffff00;"> 1 </span>Card nữa<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/card/wish/?ssid="|cat:$app.ssid|cnvgw}}">Tiếp tục đăng ký Card</a></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{elseif $app.wish == 0}}Bạn còn có thể đăng ký<span style="color:#ffff00;"> 2 </span>Card nữa<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/card/wish/?ssid="|cat:$app.ssid|cnvgw}}">Tiếp tục đăng ký Card</a></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
{{/if}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài: <a href="{{"/card/deck.php"|cnvgw}}">5</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card: <a href="{{"/card/file.php"|cnvgw}}">{{$app.cnt.file}}/36</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà: <a href="{{"/card/pre.php"|cnvgw}}">{{$app.cnt.pre}}/9</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}




<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
