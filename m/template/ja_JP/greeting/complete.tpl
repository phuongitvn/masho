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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{if $app.md == "cmnt"}}Comment{{else}}Chào hỏi{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

{{if $app.md == "cmnt"}}
{{else}}
{{if $app.nicoP == 0}}
{{else}}
<span style="color:#ffff00;font-size:medium;">{{$app.nicoP}}</span>Bổ sung point<span style="color:#ffff00;font-size:medium;">{{$app.my_profile.friend_pt}}</span>Thành point nikoniko<br />
{{/if}}
<div style="background-color:#3366FF;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td width="85" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_s.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">{{$app.nicoMsg}}</span></td></tr></table>
</div>
{{/if}}



{{if $app.msg == ""}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Nội dung dưới đây viết về{{if $app.md == "cmnt"}}comment{{else}}chào hỏi {{/if}}<br />
｢{{$app.comnt}}｣<br />
{{else}}
<span style="color:#ff0000;">{{$app.msg}}</span><br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


{{if $app.md == "cmnt"}}
<div style="text-align:center;"><a href="{{"/my/greet/list/?cl=1"|cnvgw}}">{{$app.profile.handle}}Quay lại trang quân </a></div>
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
【Chú ý】<br />
・Mỗi ngày có thể <span style="color:#ffff00;">chào hỏi nhiều lần </span>với 1 người<br />
・Đối với một người<span style="color:#ff0000;">một ngày chỉ được nhận point nikoniko 1 lần <br />
・Point nikoniko dành được thay đổi theo mối quan hệ và độ hữu hảo với đối tác <br />
・Chế độ thời gian được cài đặt là 0:00 hàng ngày<br />
・Nếu chọn nút quay lại thì chào hỏi sẽ không hiện ra <br />
・Lời chào hỏi đã viết có thể<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">kiểm tra, chỉnh sửa từ trang của đối tácﾞ</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">{{$app.profile.handle}}Quay lại trang quân</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<a href="{{"/my/friend/list/"|cnvgw}}">Đến danh sách quân đồng minh </a>
</div>
{{/if}}



<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
