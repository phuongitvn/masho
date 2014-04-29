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
<div style="text-align:center; background-color:#006600;">Bán Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.not == 1}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ff0000;"> Hãy chọn những Card muốn bán </span>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/card/del/mul.php"|cnvgw}}">Quay lại </a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{else}}
{{if $app.cnt == 0}}
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="75" style="text-align:center;"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Kho Card của bạn đã cạn rồi. Hãy Chinh phục <a href="{{"/quest/"|cnvgw}}">Thử thách</a>, tham gia <a href="{{"/other/list.php"|cnvgw}}">chiến đấu </a> hoặc sử dụng Vé số ở <a href="{{"/gacha/rd.php"|cnvgw}}">Cửa hàng may mắn</a> để lấy thêm Card nhé.
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}

{{if $form.select == "done"}}		<!--Màn hình kết thúc-->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Bạn vừa bán các Card đã chọn <br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/card/del/mul.php"|cnvgw}}">Tiếp tục Bán Card </a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{*
{{foreach from=$app.list item=item name=cmp}}
{{$item.name}}({{$item.rank}})<br />
{{/foreach}}
*}}

{{elseif $form.select == "1"}}		<!--Màn hình xác nhận-->

{{if $app.list}}
<form action="http://{{$app.domain.www}}/card/del/mul.php" method="POST">
<input type="hidden" name="ssid" value="{{$form.ssid}}" />
<input type="hidden" name="select" value="done" />
<input type="hidden" name="after" value="{{$app.after}}" />
Danh sách Card bạn muốn bán<br />
Vàng: {{$app.profile.money}} &raquo; <span style="color:#ffff00;">{{$app.after}}</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" />

<div style="text-align:center;"><input type="submit" value="Bán" /></div>
{{foreach from=$app.list item=item name=cmp}}
<input type="hidden" name="del['{{$smarty.foreach.cmp.iteration}}']" value="{{$item.cardseq}}" />
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="middle">
<td width="40" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">
{{$item.name}}({{$item.rank}})<br />
<span style="color:#ff0000;">Lv </span>{{$item.level}} <span style="color:#00ff00;">Công </span>{{$item.offense}}<br />
<span style="color:#00ff00;">Thủ </span>{{$item.defense}} <span style="color:#00ff00;">Binh  </span>{{$item.follower}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</span></td></tr></table>
</div>
{{/foreach}}
{{/if}}

{{if $app.list}}
<div style="text-align:center;"><input type="submit" value="Bán" /></div>
</form>
{{/if}}

{{else}}							<!--Màn hình lựa chọn -->


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{if $app.st == "" || $app.st == "urk" }}
Độ hiếm / <a href="{{"/card/del/mul.php?st=ulv"|cnvgw}}">Level</a> / <a href="{{"/card/del/mul.php?st=rb"|cnvgw}}">Tên</a>
{{elseif $app.st == "rb" }}
<a href="{{"/card/del/mul.php?st=urk"|cnvgw}}">Độ hiếm</a> / <a href="{{"/card/del/mul.php?st=ulv"|cnvgw}}">Level</a> / Tên{{elseif $app.st == "ulv" }}
<a href="{{"/card/del/mul.php?st=urk"|cnvgw}}">Độ hiếm</a> / Level / <a href="{{"/card/del/mul.php?st=rb"|cnvgw}}">Tên</a>
{{/if}}
</div>

Bạn đang có {{$app.cnt}} Card <br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />

{{if $app.list}}
<form action="http://{{$app.domain.www}}/card/del/mul.php" method="POST">
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="hidden" name="select" value="1" />Chọn Card muốn bán <br />
<div style="text-align:center;"><input type="submit" value="Bán" /></div>

{{foreach from=$app.list item=item name=cmp}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#333333;"}}">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="middle">
<td width="10" align="center"><input name="del_greet['{{$smarty.foreach.cmp.iteration}}']" type="checkbox" value="{{$item.cardseq}}" /></td>
<td width="40" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">
{{$item.name}}({{$item.rank}})<br />
<span style="color:#ff0000;">Lv</span>{{$item.level}} <span style="color:#00ff00;">Công </span>{{$item.offense}}<br />
<span style="color:#00ff00;">Thủ  </span>{{$item.defense}} <span style="color:#00ff00;">Binh </span>{{$item.follower}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</span></td></tr></table>
</div>
{{/foreach}}
{{/if}}

{{if $app.list}}
Chọn Card muốn bán<br />
<div style="text-align:center;"><input type="submit" value="Bán" /></div>
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.cnt > 18}}<div style="text-align:center">{{include file="parts/pager.tpl" url="/card/del/mul.php" parm="&st="|cat:$form.st }}</div>{{/if}}
{{/if}}

<!-- toTop -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Lên đầu trang</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài: <a href="{{"/card/deck.php"|cnvgw}}"> 5</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card: <a href="{{"/card/file.php"|cnvgw}}">{{$app.cnt}}/36</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà: <a href="{{"/card/pre.php"|cnvgw}}">{{$app.cntP}}/9</a><br />

{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
