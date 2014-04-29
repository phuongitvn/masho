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

{{if $form.id == "" }}
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#66cccc; color:#000000;">{{if $app.mode == "choice"}}Báu vật đang tìm{{else}}{{include file="parts/emoji.tpl" id=10}}Kho báu{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{else}}
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#66cccc; color:#000000;">{{if $app.mode == "pre"}}Tặng Báu vật{{else}}{{include file="parts/emoji.tpl" id=10}}Kho báu{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.mode == "pre"}}
{{else}}
<div style="text-align:center; background-color:#330066;color:#ffffff;">Quân đoàn {{$app.ot_profile.handle}}<br />Kho báu</div>
{{/if}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.mode == "pre"}}
<div style="text-align:center;"><a href="{{"/card/file.php?mode=pre&id="|cat:$form.id|cnvgw}}">Card</a>/Báu vật</div>
{{else}}
Số lượng gói vật báu đủ {{$app.numChk.CompNum}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Nếu thu thập được những Báu vật đã bị lấy mất thì có thể nhận được món đồ tốt từ người yêu cầu đi tìm vật báu<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.cntNum > 0 }}
{{if $app.mode == "pre"}}
Chọn từ những Báu vật Quân đoàn đang có
{{/if}}
<div> Đang có {{$app.navi.lines.total|number_format}} Gói Báu vật. Hiển thị {{$app.navi.lines.from|number_format}}-{{$app.navi.lines.to|number_format}}</div>
{{foreach from=$app.compChk item=item}}
{{if $item.OwnFlg == "1"}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="75" height="75"><img src="http://{{$app.domain.img}}/treasure/series/{{$item.seriesid}}.gif" width="70" height="70" />
</td>
<td><span style="font-size:x-small;">
{{if $app.mode == "pre"}}
<a href="{{"/treasure/index.php?tid="|cat:$item.seriesid|cat:"&mode=pre&oid="|cat:$form.id|cnvgw}}">
{{elseif $app.mode == "choice"}}
<a href="{{"/treasure/index.php?mode=choice&tid="|cat:$item.seriesid|cnvgw}}">
{{else}}
<!-- trường hơp người khác-->
{{if $form.id == "" }}
<a href="{{"/treasure/index.php?tid="|cat:$item.seriesid|cnvgw}}">
{{else}}
<a href="{{"/treasure/index.php?tid="|cat:$item.seriesid|cat:"&id="|cat:$form.id|cnvgw}}">
{{/if}}
<!-- trường hơp người khác-->
{{/if}}Gói {{$item.name}}</a><br />
{{if $item.CompFlg == "1"}}<span style="color:#ffff00;">({{$item.RegDate}})</span><br />
{{else}}
Đang có {{$item.UserNum}}/{{$item.SerindNum}} (Cần {{$item.Remainder}})<br />
{{/if}}
</span></td>

</tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
{{/foreach}}
{{else}}
{{if $form.mode == "choice" }}
<span style="color:#ff0000;">Quân đoàn của bạn không có Báu vật nào nên không thể tham gia chiến đấu để giành Báu vật muốn có</span><br />
{{else}}
<span style="color:#ff0000;">Không có Báu vật</span><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
Có được Báu vật khi Chinh phục thử thách<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}">Về Thử thách</a></div>
{{/if}}


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
