<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Câu hỏi|Linh Triều Bình Ca</title>
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
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#cc99ff;">Trợ Giúp</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<table border="0" width="100%" height="100" cellpadding="0" cellspacing="0">
<tr>
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">Nếu có bất cứ điều gì không hiểu hãy hỏi tôi nhé!
</span></td>
</tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{if $app.cate}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<!-- * -->
{{foreach from=$app.cate item=item}}
<div style="background-color:{{cycle values="#000000;,#333333;"}}">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
{{include file="parts/emoji.tpl" id=4}}<a href="{{"/qa/gr.php?c="|cat:$item.cateid|cnvgw}}">{{$item.name}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
{{/foreach}}
<!-- * -->

<!--
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/item/" parm="&kbn="|cat:$app.kbn|cat:"&unit="|cat:$app.unit|cat:"&order="|cat:$app.order|cat:"&md="|cat:$app.md}}
</div>
-->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
{{include file="parts/emoji.tpl" id=4}}<a href="{{"/qa/gr.php"|cnvgw}}">Xem tất cả các câu hỏi</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
<div style="text-align:center">
Không có câu hỏi
</div>
{{/if}}


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#cc99ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
