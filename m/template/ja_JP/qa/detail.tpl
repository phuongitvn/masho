<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Trợ giúp|Linh Triều Bình Ca</title>
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
<div style="text-align:center; background-color:#cc99ff;">{{$app.title.name}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<table border="0" width="100%" height="100" cellpadding="0" cellspacing="0">
<tr>
<td><span style="font-size:x-small;"><span style="color:#ff0000;">Hỏi: </span>{{$app.qa.question}}</span></td>
<td width="80" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
</tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#000000;">
<span style="color:#ffff00;">Trả lời: </span>{{$app.qa.answer}}
</div>



{{if $app.rel}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
Câu hỏi liên quan<br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<!-- * -->
{{foreach from=$app.rel item=item}}
<a href="{{"/qa/detail.php?id="|cat:$item.qaid|cnvgw}}">{{$item.question}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{/foreach}}
<!-- * -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
{{/if}}


<div style="background-color:#cc99ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<a href="{{"/qa/gr.php?c="|cat:$app.qa.cateid|cnvgw}}">{{$app.title.name}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/qa/"|cnvgw}}">Về trang trợ giúp</a>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#cc99ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
