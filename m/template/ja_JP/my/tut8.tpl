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
<div style="text-align:center; background-color:#820000;">Kết quả trận đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;"><span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.profile.handle}}</span> VS <span style="font-size:x-small;color:#ff0000;">Quân đoàn Tiểu Minh Nữ</span></div>

<!-- Banner thắng bại -->
<div style="text-align:center;">
<embed src="/img/swf/win.swf?img1=/img/card/{{$app.deck.prof}}_p.jpg" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
<span style="color:#ffff00;">Chú ý: </span> Đây là cuộc đấu của Công và Thủ giữa các Card. Nếu Card của bạn có Công lực cao hơn Thủ lực của Card đối phương thì bạn sẽ giành chiến thắng và ngược lại. Đương nhiên, Card thua sẽ không rực rỡ như Card thắng
<!-- round1 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">Trận chiến thứ nhất<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.1.sec_name}} (Lv{{$app.myDispCard.1.level}})</span> &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.1.sec_name}} (Lv1)</span><br />
{{if $app.otDispCard.1.damage == 0}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.1.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.1.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.1.name}}</span> tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.1.name}}</span> <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.1.1koto_lose}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.1.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.1.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.1.name}}</span> đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.1.name}}</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.1.1koto_win}}]</span>
{{/if}}

<!-- round2 -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">Trận chiến thứ 2<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.2.sec_name}} (Lv{{$app.myDispCard.2.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.2.sec_name}} (Lv{{if $app.type == "b"}}2{{else}}1{{/if}})</span><br />
{{if $app.otDispCard.2.damage == 0}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.2.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.2.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.2.name}}</span>  tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.2.name}}</span> [{{$app.myDispCard.2.1koto_lose}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.2.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.2.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.2.name}}</span> đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.2.name}}</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.2.1koto_win}}]</span>
{{/if}}

<!-- round3 -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">Trận chiến thứ 3<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.3.sec_name}} (Lv{{$app.myDispCard.3.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.3.sec_name}} (Lv{{if $app.type == "d"}}2{{else}}1{{/if}})</span><br />
{{if $app.otDispCard.3.damage == 0}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.3.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.3.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.3.name}}</span> tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.3.name}}</span> <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.3.1koto_lose}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.3.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.3.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.3.name}}</span> đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.3.name}}</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.3.1koto_win}}]</span>
{{/if}}

<!-- round4 -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">Trận chiến thứ 4<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.4.sec_name}} (Lv{{$app.myDispCard.4.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.4.sec_name}} (Lv{{if $app.type == "o"}}2{{else}}1{{/if}})</span><br />
{{if $app.otDispCard.4.damage == 0}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.4.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.4.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.4.name}}</span> tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.4.name}}</span> <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.4.1koto_lose}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.4.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.4.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.4.name}}</span> đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.4.name}}</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.4.1koto_win}}]</span>
{{/if}}

<!-- round5 -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">Trận chiến thứ 5<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.5.sec_name}} (Lv{{$app.myDispCard.5.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.5.sec_name}} (Lv1)</span><br />
{{if $app.otDispCard.5.damage == 0}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.5.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.5.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.5.name}}</span> tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.5.name}}</span> <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.5.1koto_lose}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.5.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.5.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.5.name}}</span> đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.5.name}}</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.5.1koto_win}}]</span>
{{/if}}


<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<!-- result -->
<div style="background-color:#333333;color:#ffffff;">
<span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.profile.handle}}</span> 3 thắng 2 thua <span style="font-size:x-small;color:#ff0000;">Tiểu Minh Nữ</span><br />
Thắng sát nút!<br />
Điểm kinh nghiệm: +2<br />
Vàng: +10<br />
Tỉ lẹ thắng: 100% (1 thắng 0 thua)<br />
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="75" align="center"><img src="http://{{$app.domain.img}}/thumb/amkus1.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Với việc chiến thắng đối phương, <span style="color:#00ffff;">điểm kinh nghiệm và vàng sẽ được tăng lên</span> và khi đạt tới số điểm kinh nghiệm nhất định thì quân năng của bạn cũng sẽ tăng theo.<span style="color:#ff9900;">Tuy nhiên:</span> giống như tham gia thử thách, mỗi lần làm nhiệm vụ bạn lại mất một số năng lượng nhất định. Vì vậy, bạn cần phải cân nhắc giữa việc  <span style="color:#ff0000;">tham gia thử thách hoặc chiến đấu.</span>
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />

<div style="text-align:center;">{{include file="parts/emoji.tpl" id=26}}<a href="{{"/my/index.php?ss="|cat:$app.ss|cnvgw}}" accesskey="5">Tiếp tục chinh phục thử thách</a></div>


</div>
</body>
</html>
