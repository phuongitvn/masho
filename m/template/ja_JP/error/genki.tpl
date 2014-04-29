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
<div style="text-align:center; background-color:#820000; color:#ffffff;">Không đủ năng lượng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="90" style="text-align:center;"><img src="http://{{$app.domain.img}}/thumb/amkus1.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Chà quân đoàn {{$app.profile.handle}} vất vả quá! Mau phục hồi năng lượng nào.</span></td></tr></table>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="font-size:x-small;">{{if $app.fr=="fight"}}
<span style="color:#ff0000;">Năng lượng của quân đoàn bạn hiện không đủ để chiến đấu với đối thủ</span><br />

{{else}}
<span style="color:#ff0000;">Năng lượng của quân đoàn bạn hiện không đủ để thực hiện thử thách</span><br />{{/if}}
Năng lượng: <span style="color:#ff0000;">{{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
{{if $app.profile.rsv_time_sec != NULL}}<span style="color:#ff0000;">(Cần {{if $app.profile.rsv_time_min != NULL}}{{$app.profile.rsv_time_min }} phút{{/if}} {{$app.profile.rsv_time_sec}} giây để hồi phục)</span><br />{{/if}}

{{if $app.profile.friend_pt >= 100}}
{{if $app.cnt > 0}}
Sử dụng Phở thần công để hồi phục năng lượng ngay lập tức<br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="90" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/116.gif" alt="{{$item.name}}" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/my/rcv/?act=my_rcv_complete&q="|cat:$app.q|cat:"&kb="|cat:$app.cnt|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Sử dụng Phở thần công</a>
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ffff00;">Dùng điểm thân thiện có thể phục hồi được đấy</span><br />
Điểm thân thiện: {{$app.profile.friend_pt}}<br />
- <a href="{{"/my/rcv/index.php?q="|cat:$app.q|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Phục hồi năng lượng</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ffffff;">Cứ 100 điểm thân thiện thì có thể khôi phục năng lượng được 1 lần. Bạn đang có {{$app.profile.friend_pt}} điểm thân thiện. </span><br />
<a href="{{"/my/friend/list/"|cnvgw}}">Hãy chào hỏi đồng minh để tích lũy điểm thân thiện nhé!</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.cnt > 0}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Sử dụng Phở thần công để khôi phục năng lượng ngay lập tức<br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="90" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/116.gif" alt="{{$item.name}}" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/my/rcv/?act=my_rcv_complete&q="|cat:$app.q|cat:"&kb="|cat:$app.cnt|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Dùng Phở thần công</a>
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /></div>
{{else}}
Sử dụng Phở thần công để hồi phục năng lượng ngay lập tức<br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="90" style="text-align:center;"><img src="http://{{$app.domain.img}}/item/116.gif" alt="{{$item.name}}" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<a href="{{"/item/confirm.php?num=1&id=116"|cnvgw}}">Mua Phở thần công</a>
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}

{{/if}}


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if $app.q > 0}}
<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}">Về Thử thách</a></div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
