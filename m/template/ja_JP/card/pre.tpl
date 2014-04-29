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
<div style="text-align:center; background-color:#006600;">Card(Hộp quà)</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài : <a href="{{"/card/deck.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">5</a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card : <a href="{{"/card/file.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">{{$app.cntF}}/36  </a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà: {{$app.cnt}}/9 

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Danh sách Card trong hộp quà </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
Hộp quà có thể lưu được tối đa 9 Card quà tặng từ quân đồng minh <br />

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/card/wish/"|cnvgw}}"> Đăng kí Card muốn có </a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center">
<tr>

{{if $app.list}}
<!-- * -->
{{foreach from=$app.list item=item name=deckf}}

<td width="70">
{{if $item.bushoid == "non"}}
<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="73" height="99" alt="" /><br />
{{else}}
<a href="{{"/card/?mode=3&id="|cat:$item.bushoid|cat:"&seq="|cat:$item.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}"><img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}_s.jpg" width="73" height="99" alt="" /></a><br />
{{/if}}
<span style="font-size:x-small;text-align:left;">
{{if $item.bushoid == "non"}}
&nbsp;<br />
&nbsp;<br />
{{else}}
<span style="color:#ff0000;">Lv</span>{{$item.level}} <span style="color:#00ff00;">Công </span>{{$item.offense}}<br />
<span style="color:#00ff00;">Thủ </span>{{$item.defense}} <span style="color:#00ff00;">Quân binh </span>{{$item.follower}}<br />
{{/if}}
</span></td>

{{if $smarty.foreach.deckf.iteration % 3 == 0}}</tr><tr>{{/if}}


<!-- * -->
{{/foreach}}

</tr>
</table>


{{else}}
Không có card <br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/card/wish/"|cnvgw}}">Đăng kí Card muốn có </a></div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
