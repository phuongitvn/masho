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


<form action="http://{{$app.domain.www}}/greeting/hello.php" method="POST">

{{if $app.insp == "2"}}
<span style="color:#ff0000;">Theo kết quả kiểm tra, dữ kiệu đăng kí của bạn không phù hợp</span><br />
{{/if}}

<div style="text-align:center;"><textarea name="comnt" rows="2" cols="20">{{$app.txtdata}}</textarea><br /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
[Chú ý]<br />
・<span style="color:#ff0000;"> Không nhập những thông tin cá nhân hay những thông tin chỉ riêng cá nhân bạn có</span><br />
・<span style="color:#ff0000;">Không thể sử dụng chữ hình tượng/ xuống dòng </span><br />
・<span style="color:#ff0000;">Nhập </span>dưới 100 kí tự<br />

<div style="text-align:center;">
{{uniqid}}
<input type="hidden" name="act" value="greeting_complete" />
<input type="hidden" name="md" value="{{$form.md}}" />
<input type="hidden" name="id" value="{{$form.id}}" />
<input type="hidden" name="tid" value="{{$form.tid}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="{{if $app.md == "cmnt"}}Đăng kí comment {{else}}Chào{{/if}}" />
</div>

</form>


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
