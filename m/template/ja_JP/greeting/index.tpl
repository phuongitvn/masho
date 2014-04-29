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
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=9}}Chào hỏi</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.min > 0 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<span style="color:#ff0000;">Cần {{if $app.hour > 0}}{{$app.hour}} giờ {{/if}}{{$app.min}} phút để có thể tiếp tục Chào hỏi</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}

{{if $app.nicoP == 0}}
{{else}}
Bạn vừa nhận thêm <span style="color:#ffff00;font-size:medium;">{{$app.nicoP}}</span> điểm thân thiện. Số điểm thân thiện bạn đang có là <span style="color:#ffff00;font-size:medium;">{{$app.my_profile.friend_pt}}</span>điểm<br />
{{/if}}

<div style="background-color:#3366FF;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td width="85" align="center"><img src="http://{{$app.domain.www}}/img/card/{{$app.profile.prof}}_s.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">{{$app.msg}}</span>
</td></tr></table>
</div>


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<div style="text-align:center;">
[ Lưu ý ]<br />
</div>
- Sau <span style="color:#ff0000;">mỗi 2 giờ</span> bạn lại có thể thực hiện Chào hỏi<br />
- Tùy thuộc vào độ hữu hảo với đồng minh, bạn có thể nhận được điểm thân thiện nhiều hay ít<br />
- Thời gian tính lượt Chào hỏi mỗi ngày tối đa là đến 0 giờ<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

<div style="text-align:center;">
{{include file="parts/emoji_vn.tpl" id=22}}<a href="{{"/my/index.php"|cnvgw}}">Về Trang riêng</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/my/friend/list/"|cnvgw}}">Về Danh sách đồng minh</a><br />
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
