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
<div style="text-align:center; background-color:#006600;">Hợp nhất đặc năng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.cnt == 0}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Bạn chưa có Card nào trong Kho! Ngay bây giờ <a href="{{"/gacha/rd.php"|cnvgw}}">hãy thử sức với </a>vé số nào ♪
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{elseif $app.okNum == 0}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">Bạn không có Card để Hợp nhất đặc năng. <a href="{{"/item/?act=item_confirm&num=1&id=160"|cnvgw}}">Nếu có Tượng thần thì </a>có thể sử dụng thay Card để hợp nhất đấy♪
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center"><a href="{{"/card/pcomplist.php"|cnvgw}}">Điểm kỹ năng </a>|Level đặc năng <!--|<a href="{{"/card/del/mul.php"|cnvgw}}">Bán đồng loạt </a>--></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}

<div style="text-align:center">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center"><a href="{{"/card/pcomplist.php"|cnvgw}}">Điểm kỹ năng </a>|Level đặc năng <!--|<a href="{{"/card/del/mul.php"|cnvgw}}">Bán đồng loạt </a>--></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.st == "" || $app.st == "rk" }}
Độ hiếm/ <a href="{{"/card/complist.php?st=lv"|cnvgw}}">Level </a>/<a href="{{"/card/complist.php?st=rb"|cnvgw}}">Tên </a>
{{elseif $app.st == "rb" }}
<a href="{{"/card/complist.php?st=rk"|cnvgw}}">Độ hiếm</a>/<a href="{{"/card/complist.php?st=lv"|cnvgw}}">Level</a>/Tên 
{{elseif $app.st == "lv" }}
<a href="{{"/card/complist.php?st=rk"|cnvgw}}">Độ hiếm</a>/Level/<a href="{{"/card/complist.php?st=rb"|cnvgw}}">Tên </a>
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#005128;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/160.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
{{if $app.scnt > 0}}Bạn đang có <span style="color:#ffff00;">{{$app.scnt}}</span> Tượng thần<br />{{/if}}
<span style="color:#ffff00;">Sử dụng để hợp nhất đặc năng các Card từ cấp độ 1-9 với </span>xác suất thành công 100%<span style="color:#ffff00;"></span>
{{if $app.scnt == 0}}<br /><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/confirm.php?num=1&id=160"|cnvgw}}">Mua ngay!</a>{{/if}}
</span></td></tr></table>
</div>
{{if $app.scnt == 0}}<div style="text-align:right"><a href="{{"/qa/detail.php?id=141"|cnvgw}}">Tìm hiểu về tượng thần</a></div>{{/if}}

{{if $app.scnt > 0}}<span style="color:#ffff00;text-decoration:blink;">Nâng cao đặc năng cho Card nhờ lợi ích của Tượng thần!</span><br />{{/if}}
Bạn có {{$app.okNum}} Card có thể hợp nhất đặc năng <br />
<div style="text-align:right"><a href="{{"/qa/detail.php?id=137"|cnvgw}}">Tìm hiểu về Hợp nhất đặc năng</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}


{{if $app.list}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/complist.php" }}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{foreach from=$app.list item=item name=cmp}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="90" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">
{{$item.name}}({{$item.rank}})<br />
<span style="color:#ff0000;">Lv </span>{{$item.level}} <span style="color:#00ff00;">Công  </span>{{$item.offense}}<br />
<span style="color:#00ff00;">Thủ  </span>{{$item.defense}} <span style="color:#00ff00;">Binh </span>{{$item.follower}}<br />
<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/compose.php?seq="|cat:$item.cardseq|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chọn làm Card đích</a><br />
</span></td></tr></table>
</div>
{{/foreach}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/complist.php" }}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<!-- toTop -->
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Lên đầu trang</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài : <a href="{{"/card/deck.php"|cnvgw}}">5</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card : <a href="{{"/card/file.php"|cnvgw}}">{{$app.cnt}}/36</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà : <a href="{{"/card/pre.php"|cnvgw}}">{{$app.cntP}}/9</a><br />

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
