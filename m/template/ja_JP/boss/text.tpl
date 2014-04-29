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
<div style="text-align:center; background-color:#820000;">Kết quả chiến đấu với Yêu tướng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" />
</td>
<td><span style="font-size:x-small;">
{{if $app.win == "run"}}Không được bỏ chạy lseif $app.win == "mas"}}Bạn thua rồi・・・{{elseif $app.win == $app.memberid}}Làm được rồi！{{else}}Không được làm gì bất chính！{{/if}}Để thắng được ma tướng thì cần phải tăng sức mạnh lên hoặc cần phải mua thật nhiều vũ khí và đồ phòng thủ mạnh・・・
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}">Quay lại nhiệm vụ</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />


<!-- footer -->
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
