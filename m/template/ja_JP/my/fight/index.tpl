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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=9}}Danh sách thắng thua chiến đấu{{include file="parts/emoji.tpl" id=9}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" />
</div>

<!-- * -->
{{if $app.list}}
{{foreach from=$app.list item=item}}
<div style="background-color:{{cycle name="cyc" values="#000000;,#cccccc;"}}">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="font-size:x-small;color:{{cycle name="cyc2" values="#ffffff;,#000000;"}}"">
<a href="{{"/other/?id="|cat:$item.memberid|cnvgw}}">{{$item.handle}}</a>Bị tấn công {{if $item.winner == "2"}}chiến thắng。{{else}}Thua trận{{/if}}<br /></span>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
</div>
{{/foreach}}
{{if $app.navi.totalPage > 1}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
{{include file="parts/pager.tpl" url="/my/fight/"}}
</div>
{{/if}}
{{else}}
Không có kết quả thắng thua
{{/if}}

<!-- * -->

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="background-color:#ff690c;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
