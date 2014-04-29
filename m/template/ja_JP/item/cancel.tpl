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

<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ff9900;">Hủy mua</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="text-align:center;"><img src="http://{{$app.domain.img}}/hdr/item.gif" width="240" height="60" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ff0000;">Đã hủy mua</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.item.kbn == 9 }}
<a href="{{"/event/"|cat:$app.qid.evid|cat:"/item.php?cid="|cat:$app.qid.cid|cat:"&qid="|cat:$app.qid.questid|cnvgw}}">Quay lại sự kiện</a>
{{else}}
{{if $app.item.money > 0 }}
<a href="{{"/item/?unit=1&order=1&kbn="|cat:$app.item.kbn|cnvgw}}">Quay lại shop</a>
{{else}}
<a href="{{"/item/?unit=2&order=1&kbn="|cat:$app.item.kbn|cnvgw}}">Quay lại shop</a>
{{/if}}
{{/if}}
</div>
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff9900;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
