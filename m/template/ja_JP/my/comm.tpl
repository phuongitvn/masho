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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=10}}Thông tin đồng minh</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.list}}

{{foreach from=$app.list item=item name=evlg}}
{{if $item.status == 3 && $item.rank =="C"}}
{{else}}
- Quân đoàn <a href="{{"/other/?id="|cat:$item.memberid|cnvgw}}">{{$item.friendname}}</a> ({{if $smarty.now|date_format:'%d/%m/%y' == $item.reg_time|date_format:'%d/%m/%Y'}}{{$item.reg_time|date_format:"%H:%M"}}{{else}}{{$item.reg_time|date_format:"%d/%m"}}{{/if}}) <br />

{{if $item.status == 0}}
{{$item.stagename}}<br />
{{elseif $item.status == 1}}
<span style="color:#ffff00;">Hoàn thành Gói {{$item.seriesname}}</span>!<br />
{{elseif $item.status == 2}}
Đăng kí Card muốn có {{$item.bushoname}} ({{$item.rank}})!<br />
{{elseif $item.status == 3}}
Giành được Card {{if $item.rank =="A"}}rất {{elseif $item.rank =="B"}}{{/if}}hiếm {{$item.bushoname}}(<span style="color:#ffff00;">{{$item.rank}}</span>)<br />
{{elseif $item.status == 4}}
Nhận được <span style="color:#ffff00;">{{$item.itemname}}</span> khi tham gia sự kiện!<br />
{{/if}}
{{/if}}
<!-- * -->
{{/foreach}}
{{else}}
Không có thông tin đồng minh<br />
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
