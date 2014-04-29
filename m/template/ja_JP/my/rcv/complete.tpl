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
<div style="text-align:center; background-color:#993366; color:#ffffff;">Hồi phục năng lượng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="90" style="text-align:center;"><img src="http://{{$app.domain.img}}/thumb/amkus3.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Xuất phát nào! Quân đoàn {{$app.profile.handle}}! Có năng lượng thì việc gì cũng làm được!</span></td></tr></table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.isReload }}
{{if $form.kb > 0}}
Đã dùng Phở thần công (Còn {{$app.cntR|default:0}} bát)<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.cntR < 2 }}
<div style="text-align:center;"><a href="{{"/item/?unit=2&order=1&kbn=4"|cnvgw}}">Mua Phở thần công</a></div>
{{/if}}
{{else}}
Điểm thân thiện: {{$app.profile.friend_pt}}<br />
{{/if}}
Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>／{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}}<span style="color:#ff0000;">(Cần {{if $app.profile.rsv_time_min != NULL}}{{$app.profile.rsv_time_min}} phút {{/if}}{{$app.profile.rsv_time_sec}} giây để hồi phục)</span><br />{{/if}}
{{if $form.kb > 0}}
{{else}}
Số lần có thể dùng Điểm thân thiện: Còn {{$app.rcvNum}} lần<br />
{{/if}}

{{else}}

{{if $form.kb > 0}}
Đã dùng Phở thần công (Còn {{$app.cntR|default:0}} bát)<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.cntR < 2 }}
<div style="text-align:center;"><a href="{{"/item/?unit=2&order=1&kbn=4"|cnvgw}}">Mua Phở thần công</a></div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{else}}
Điểm thân thiện: {{$app.org.friend_pt}} &raquo; <span style="color:#ff0000;">{{$app.profile.friend_pt}}</span><br />
{{/if}}
Năng lượng: {{$app.org.genki}} &raquo; <span style="color:#ffff00;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $form.kb > 0}}
{{else}}
Số lần có thể dùng Điểm thân thiện: Còn <span style="color:#ff0000;">{{$app.rcvNum}}</span> lần<br />
{{/if}}

{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Năng lượng đã hồi phục hoàn toàn!
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />


{{if $form.q <> ""}}
<div style="text-align:center;">
{{if $form.ev == ""}}
<a href="{{"/quest/disp.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Chinh phục Thử thách</a>
{{else}}
<a href="{{"/event/"|cat:$form.ev|cat:"/detail.php?id="|cat:$form.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Về Sự kiện</a>
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
{{else}}
<!--sự kiệm-->
{{if $app.gTL.min != NULL}}
<div style="text-align:center;"><a href="{{"/event/"|cat:$app.evid|cat:"/index.php"|cnvgw}}"><img src="http://{{$app.domain.img}}/evnt/{{$app.evid}}.gif" width="200" height="60" /><br /><span style="color:#ffff00;">Còn{{if $app.gTL.day == 0}}{{if $app.gTL.hour == 0}}{{$app.gTL.min}}phút{{else}}{{$app.gTL.hour}}giờ{{$app.gTL.min}}phút{{/if}}{{else}}{{$app.gTL.day}}ngày và{{if $app.gTL.hour == 0}}{{$app.gTL.min}}phút{{else}}{{$app.gTL.hour}}giờ{{/if}}{{/if}}</span></a></div>
{{/if}}
{{/if}}

<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}">Đến Danh sách Thử thách</a></div><div style="text-align:center;"><a href="{{"/other/list.php"|cnvgw}}">Đến Trang Chiến đấu</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
