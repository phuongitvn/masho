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

<div style="text-align:center; background-color:#{{$app.color.sub}};"><span style="color:#ffffff;">Chiến trường Tây Nguyên (Trận mở màn)</span></div>
<div style="text-align:center; background-color:#{{$app.color.main}};border-color:#{{$app.color.main}};border-style:solid;"><span style="color:#000000;">Hỏi Già làng kinh nghiệm diệt voi dữ</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="75" align="center"><img src="http://{{$app.domain.img}}/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.tut_num == 5}}
Chúc mừng quân đoàn {{$app.profile.handle}} lên cấp, <span style="color:#ff0000;">giành được điểm kỹ năng và thêm Card.</span> Tiếp theo, hãy thử trải nghiệm cảm giác so tài <a href="{{"/my/index.php?ss="|cat:$app.ss|cnvgw}}">chiến đấu</a> với đối thủ khác nhé!
{{elseif $app.tut_num == 10}}
Chúc mừng Quân đoàn {{$app.profile.handle}} đã thắng trận đầu tiên và trở thành quân đoàn thực thụ. Bây giờ thì quân đoàn bạn đã sẵn sàng tinh thần để bước vào cuộc chinh phục Yêu tướng cũng như hành trình thử thách dài phía trước rồi phải không?
{{/if}}
</span></td></tr>
</table>
</div>
<div style="text-align:center;background-color:#{{$app.color.main}};"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
Với mỗi lần tăng quân năng, các Card trong cỗ bài sẽ được cộng ngẫu nhiên 1 điểm kỹ năng vào năng lực Công, Thủ hay Binh. Cùng với đó, quân đoàn của bạn cũng được nhận thêm 1 Card là phần thưởng lên cấp.<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<table border="0" width="200" cellspacing="0" cellpadding="0" align="center"><tr valign="top">
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.1}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.2}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.3}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.4}}_s.jpg" width="38" /></td>
<td width="40"><img src="http://{{$app.domain.img}}/card/{{$app.card.5}}_s.jpg" width="38" /></td>
</tr><tr>
{{if $app.rfP}}
{{foreach from=$app.rfP item=item name=rfp}}
<td><span style="font-size:x-small;"><span style="color:#00ff00;">{{if $item == "o"}}Công{{elseif $item == "d"}}Thủ{{elseif $item == "f"}}Binh{{/if}}</span>+1</span></td>
{{/foreach}}
{{/if}}
</tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>


{{if $app.busho}}
{{foreach from=$app.busho item=item name=wish}}
<div style="text-align:center;">
Lên cấp và giành được Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />

<img src="http://{{$app.domain.img}}/card/{{$item.bushoid}}.jpg" width="160" height="218" />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
</div>
{{/foreach}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">{{if $app.tut_num == 5}}<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span><a href="{{"/my/index.php?ss="|cat:$app.ss|cnvgw}}" accesskey="5">Chiến đấu</a><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>{{elseif $app.tut_num == 10}}<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=30}}</span><a href="{{"/my/index.php?ss="|cat:$app.ss|cnvgw}}">Đến trang hành trình</a><span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=30}}</span>{{/if}}</div>

</div>
</body>
</html>
