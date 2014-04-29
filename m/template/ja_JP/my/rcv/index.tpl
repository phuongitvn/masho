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
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.profile.friend_pt >= 100}}
Điểm thân thiện: {{$app.profile.friend_pt}}<br />
{{/if}}
Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span> / {{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}}<span style="color:#ff0000;">(Cần {{if $app.profile.rsv_time_min != NULL}}{{$app.profile.rsv_time_min}} phút {{/if}}{{$app.profile.rsv_time_sec}} giây để hồi phục)</span><br />{{/if}}
{{if $app.profile.friend_pt >= 100}}
Số lần có thể hồi phục: Còn {{$app.rcvNum}} lần<br />
{{/if}}

{{if $app.cnt > 0}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="75" align="center"><img src="http://{{$app.domain.img}}/item/116.gif" alt="Phở thần công" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/my/rcv/complete.php?q="|cat:$form.q|cat:"&ev="|cat:$form.ev|cat:"&kb="|cat:$app.cnt|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Sử dụng Phở thần công</a>
</span></td></tr></table>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.rcvNum > 0 && $app.profile.friend_pt >= 100}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Bạn có sử dụng 100 điểm thân thiện để hồi phục hoàn toàn năng lượng không? 
<div style="text-align:center;"><a href="{{"/my/rcv/complete.php?q="|cat:$form.q|cat:"&ev="|cat:$form.ev|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Có</a>／{{if $form.q == ""}}<a href="{{"/my/greet/list/?cl=1"|cnvgw}}">{{else}}{{if $form.ev == ""}}<a href="{{"/quest/"|cnvgw}}">{{else}}<a href="{{"/event/"|cat:$form.ev|cat:"/index.php"|cnvgw}}">{{/if}}{{/if}}Không</a></div>
{{/if}}
{{else}}
{{if $app.rcvNum == 0}}
<span style="color:#ffff00;">Hôm nay chỉ có thể hồi phục năng lượng đến đây </span>
{{else}}
{{if $app.profile.friend_pt >= 100 }}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Bạn có sử dụng 100 điểm thân thiện để hồi phục hoàn toàn năng lượng không? 
<div style="text-align:center;"><a href="{{"/my/rcv/complete.php?q="|cat:$form.q|cat:"&ev="|cat:$form.ev|cat:"&ssid="|cat:$form.ssid|cnvgw}}">Có</a>／{{if $form.q == ""}}<a href="{{"/my/greet/list/?cl=1"|cnvgw}}">{{else}}{{if $form.ev == ""}}<a href="{{"/quest/"|cnvgw}}">{{else}}<a href="{{"/event/"|cat:$form.ev|cat:"/index.php"|cnvgw}}">{{/if}}{{/if}}Không</a></div>
{{/if}}
{{/if}}
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
