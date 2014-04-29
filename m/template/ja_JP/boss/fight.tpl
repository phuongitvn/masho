<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

<div>
{{$app.masho|htmlspecialchars_decode}}
</div>

<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Kết quả chiến đấu với Yêu tướng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" />
</td>
<td><span style="font-size:x-small;">
{{if $app.win == "run"}}{{elseif $app.win == "mas"}}Đáng tiếc! Bạn đã thua rồi!{{elseif $app.win == $app.memberid}}!{{else}}Đáng tiếc!{{/if}} Để đánh thắng Yêu tướng lần sau, hãy cũng cố quân đoàn, trang bị quân khí đầy đủ và tăng cường quân năng.
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}">Về Thử thách</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />


<!-- footer -->
<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
