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
<div style="text-align:center; background-color:#006600;">Kết hợp Card </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.cnt == 0}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Hình như không có card trong kho Card! Ngay bây giờ hãy thử  vận may với <a href="{{"/gacha/index.php"|cnvgw}}">Cửa hàng may mắn</a> nhé!</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{elseif $app.okNum == 0}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
 Bạn không có Card nào có thể sử dụng để kết hợp. Hãy thử vận may với <a href="{{"/gacha/index.php"|cnvgw}}" >Cửa hàng may mắn</a> nhé!</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">Điểm kỹ năng | <a href="{{"/card/complist.php"|cnvgw}}">Level đặc năng </a><!-- | <a href="{{"/card/del/mul.php"|cnvgw}}">Bán Card</a>--></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}

<div style="text-align:center">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">Điểm kỹ năng | <a href="{{"/card/complist.php"|cnvgw}}">Level đặc năng</a><!-- | <a href="{{"/card/del/mul.php"|cnvgw}}">Bán Card</a>--></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.st == "" || $app.st == "ork" }}Độ hiếm / <a href="{{"/card/pcomplist.php?st=lv"|cnvgw}}">Level </a> / <a href="{{"/card/pcomplist.php?st=rb"|cnvgw}}">Tên</a>
{{elseif $app.st == "rb" }}
<a href="{{"/card/pcomplist.php?st=ork"|cnvgw}}">Độ hiếm </a> / <a href="{{"/card/pcomplist.php?st=lv"|cnvgw}}">Level </a> / Tên 
{{elseif $app.st == "lv" }}
<a href="{{"/card/pcomplist.php?st=ork"|cnvgw}}">Độ hiếm</a> / Level  / <a href="{{"/card/pcomplist.php?st=rb"|cnvgw}}">Tên</a>
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#005128;">
{{if $app.pGcnt == 0 && $app.pScnt == 0}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">Tượng mèo vàng giúp kết hợp những Card cùng tên nhưng khác độ hiếm với <span style="color:#ffff00;"> Xác xuất thành công 100%!</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?unit=2&kbn=4&order=1"|cnvgw}}">Mua ngay!</a>
</span></td></tr></table>
{{else}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
{{if $app.pGcnt > 0}}Bạn đang có <span style="color:#ff0000;">{{$app.pGcnt}}</span> tượng mèo vàng  <br />{{/if}}Sử dụng để kết hợp Card không cùng cấp độ với <span style="color:#ff0000;">Xác suất thành công 100%!</span>
{{if $app.pGcnt == 0}}<br /><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=161"|cnvgw}}">Mua ngay!</a>{{/if}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
{{if $app.pScnt > 0}}Bạn đang có <span style="color:#ff0000;">{{$app.pScnt}}</span> tượng mèo bạc <br />{{/if}}
Sử dụng để kết hợp Card với <span style="color:#ff0000;">xác suất thành công 100%!</span>
{{if $app.pScnt == 0}}<br /><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?act=item_confirm&num=1&id=162"|cnvgw}}">Mua ngay!</a>{{/if}}
</span></td></tr></table>
{{/if}}
</div>
{{if $app.pGcnt == 0}}<div style="text-align:right"><a href="{{"/qa/detail.php?id=142"|cnvgw}}">Tìm hiểu về tượng mèo</a></div>{{/if}}

{{if $app.pGcnt > 0}}<span style="color:#ffff00;text-decoration:blink;">Tượng mèo vàng giúp kết hợp được cả những Card cùng tên nhưng khác độ hiếm với xác suất thành công 100%</span><br />{{/if}}
Bạn có  {{if $app.pGcnt > 0}}<span style="color:#ffff00;">{{$app.okNum}}</span>{{else}}{{$app.okNum}}{{/if}} Card có thể sử dụng để kết hợp <br />
<div style="text-align:right"><a href="{{"/qa/detail.php?id=43"|cnvgw}}">Tìm hiểu về kết hợp Card</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}

{{if $app.list}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.st == "" || $app.st == "ork" }}<div style="text-align:center">{{include file="parts/pager2.tpl" url="/card/pcomplist.php?st=ork" }}</div>{{elseif $app.st == "rb" }}<div style="text-align:center">{{include file="parts/pager2.tpl" url="/card/pcomplist.php?st=rb" }}</div>{{elseif $app.st == "lv" }}<div style="text-align:center">{{include file="parts/pager2.tpl" url="/card/pcomplist.php?st=lv"}}</div>{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{foreach from=$app.list item=item name=cmp}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="90" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">
{{$item.name}}({{$item.rank}})<br />
<span style="color:#ff0000;">Lv </span>{{$item.level}} <span style="color:#00ff00;">Công </span>{{$item.offense}}<br />
<span style="color:#00ff00;">Thủ  </span>{{$item.defense}} <span style="color:#00ff00;">Binh  </span>{{$item.follower}}<br />
<span style="color:#0000ff;">{{include file="parts/emoji.tpl" id=68}}</span><a href="{{"/card/pcompose.php?seq="|cat:$item.cardseq|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chọn làm Card đích</a><br />
</span></td></tr></table>
</div>
{{/foreach}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{if $app.st == "" || $app.st == "ork" }}
<div style="text-align:center">{{include file="parts/pager2.tpl" url="/card/pcomplist.php?st=ork" }}</div>{{elseif $app.st == "rb" }}
<div style="text-align:center">{{include file="parts/pager2.tpl" url="/card/pcomplist.php?st=rb" }}</div>
{{elseif $app.st == "lv" }}
<div style="text-align:center">{{include file="parts/pager2.tpl" url="/card/pcomplist.php?st=lv"}}</div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<!-- toTop -->
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Lên đầu trang</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài: <a href="{{"/card/deck.php"|cnvgw}}">5  </a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card: <a href="{{"/card/file.php"|cnvgw}}">{{$app.cnt}}/36  </a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà: <a href="{{"/card/pre.php"|cnvgw}}">{{$app.cntP}}/9 </a><br />

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
