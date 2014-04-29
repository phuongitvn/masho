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
<div style="font-size:x-small;text-align:left;">
	
<div style="text-align:center; background-color:#000000; color:#ffffff;">
Bạn đã chọn <span style="color:#ffff00;">Đội hình {{if $form.type == "o" }}1{{elseif $form.type == "d" }}2{{elseif $form.type == "b" }}3{{/if}}</span>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Hãy nhìn xuống phía dưới và chiêm ngưỡng quân đoàn của bạn nhé !
</span>
</td></tr>
</table></div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">

<form action="http://{{$app.domain.www}}/reg.php" method="POST">
<input type="hidden" name="act" value="regcomplete" />
<input type="hidden" name="type" value="{{$form.type}}" />
<input type="hidden" name="ss" value="{{$app.ssid}}" />
<input type="submit" value="OK" />
</form>

<form action="http://{{$app.domain.www}}/reg.php" method="POST">
<input type="hidden" name="act" value="index" />
<input type="submit" value="Làm lại" />
</form>

</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $form.type == "o" }}
<div style="text-align:center; background-color:#ff6900; color:#ffffff;">
{{elseif $form.type == "d" }}
<div style="text-align:center; background-color:#3969FF; color:#ffffff;">
{{elseif $form.type == "b" }}
<div style="text-align:center; background-color:#399A6B; color:#ffffff;">
{{/if}}
<span style="color:#ffff00;">Đội hình {{if $form.type == "o" }}1{{elseif $form.type == "d" }}2{{elseif $form.type == "b" }}3{{/if}}</span>
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#993300; color:#ffffff;">Cách xem card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />

<span style="color:#ffff00;"></span>Mỗi Card sẽ tương ứng với một linh thú mà bạn sở hữu, nhìn vào Card đó, bạn sẽ thấy được một số đặc điểm nổi bật như sau: <br/><br/><span style="color:#66ff33;"> Độ hiếm của Card</span>: <br/>Trong lá bài, độ hiếm của Card sẽ được thể hiện chủ yếu thông qua 2 đặc điểm: màu sắc và số sao. Có 5 mức thể hiện độ hiếm của Card là <span style="color:#ffff00;">A &gt; B &gt; C &gt; D &gt; E </span> (cấp độ giảm dần)<br/><br/>
<span style="color:#ffff00;"></span><span style="color:#66ff33;">Năng lực cơ bản:</span> thể hiện xác suất được nhận thêm điểm kỹ năng đối với 1 trong 3 năng lực (Công - Thủ - Binh) của Card khi lên cấp. Có 5 mức độ như sau (giảm dần) <span style="color:#ffff00;">A &gt; B &gt; C &gt; D &gt; E</span>.Trong đó: <br/>
<span style="color:#ffff00;">Công:</span> Là sức mạnh tấn công của Card<br/>
<span style="color:#ffff00;">Thủ: </span>Là khả năng phòng thủ trước những đòn tấn công của đối phương<br/>
<span style="color:#ffff00;">Binh:</span> Là số quân binh của mỗi Card<br/>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.card}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<!-- * -->
{{foreach from=$app.card item=item}}
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="100" align="center"><img src="http://{{$app.domain.img}}/card/{{$item.bid}}_s.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<span style="color:#ffff00;">{{$item.name}} ({{$item.rank}})</span><br />
Công {{$item.offense}} Thủ {{$item.defense}} Binh {{$item.follower}}<br />
<span style="color:#ffff00;">Đặc năng: {{$item.sec_name}}</span><br />
{{$item.sec_expla}}
</span></td></tr></table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<!-- * -->
{{/foreach}}
{{/if}}

<div style="text-align:center;">

<form action="http://{{$app.domain.www}}/reg.php" method="POST">
<input type="hidden" name="act" value="regcomplete" />
<input type="hidden" name="type" value="{{$form.type}}" />
<input type="hidden" name="ss" value="{{$app.ssid}}" />
<input type="submit" value="OK" />
</form>

<form action="http://{{$app.domain.www}}/reg.php" method="POST">
<input type="hidden" name="act" value="index" />
<input type="submit" value="Làm lại" />
</form>
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer2.tpl"}}
</div>
</body>
</html>
