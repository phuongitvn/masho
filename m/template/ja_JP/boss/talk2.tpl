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
<div style="text-align:center; background-color:#820000;">Lên Danh hiệu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
Đạt Danh hiệu mới [<span style="color:#ffff00;">{{$app.stage}} - {{$app.title}}</span>]
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Tăng sức mạnh nhờ chiến thắng Yêu tướng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
Các Card trên cỗ bài đã nhận thêm được điểm kỹ năng!<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
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
<td><span style="font-size:x-small;"><span style="color:#00ff00;">{{if $item == "o"}}Công{{elseif $item == "d"}}Thủ{{elseif $item == "f"}}Binh{{/if}}</span> +1</span></td>
{{if $smarty.foreach.rfp.iteration % 5 == 0}}</tr><tr>{{/if}}
{{/foreach}}
{{/if}}

</tr></table></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />


<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Chiến lợi phẩm</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<img src="http://{{$app.domain.img}}/item/137.gif" width="70" height="70" /><img src="http://{{$app.domain.img}}/spacer.gif" width="5" height="1" /><span style="color:#ffff00;">Giành được 2 lá Bùa!</span>
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="background-color:#CCCCCC;color:#000000;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
Điểm kinh nghiệm: +{{$app.masho.get_exp}}<br />
Vàng: +{{$app.masho.get_money}}<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
</div>


{{if $app.profile.stage > 1 && $app.profile.cl_masho == 0}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#945092;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="{{"/boss/card.php?ssid="|cat:$app.ssid|cnvgw}}"><span style="font-size:small;">Tiếp theo</span></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#945092;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />
<div style="text-align:center;"><a href="{{"/quest/"|cnvgw}}">Về Thử thách</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br />

<div style="background-color:#820000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
{{/if}}

</div>
</body>
</html>
