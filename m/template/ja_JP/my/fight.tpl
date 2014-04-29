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
<div style="text-align:center; background-color:#820000;">Kết quả chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<!-- * -->
<div style="text-align:center;"><span style="font-size:x-small;color:#ffff00;"> Quân đoàn {{$app.my_profile.handle}}</span> VS <span style="font-size:x-small;color:#ff0000;"> Quân đoàn {{$app.ot_profile.handle}}</span></div>

<!-- Hiệu quả đội hình -->
{{if $app.my_profile.formno > 0 ||  $app.ot_profile.formno > 0 }}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}
{{if $app.fight.ot_formno > 0 }}
<span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.my_profile.handle}}</span><span style="font-size:x-small;color:#ffff00;">[{{$app.dispMyForm.name}}] </span>}<br />{{/if}}
{{if $app.fight.formno > 0 }}
<span style="font-size:x-small;color:#ff0000;">Quân đoàn {{$app.ot_profile.handle}}</span><span style="font-size:x-small;color:#ff0000;"> [{{$app.dispOtForm.name}}]</span><br />{{/if}}

<!-- round1 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ nhất<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.1.sec_name}}: Lv{{$app.fight.ot_level1}}</span>
<span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.1.sec_name}}: Lv{{$app.fight.level1}}</span><br />
{{if $app.fight.winner1 == 2}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid1}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid1}}_g.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.1.name}}</span> tấn công rồi! Nhưng <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.1.name}}</span> phát huy {{$app.fight.damage1}} khả năng phòng vệ và đánh trả tuyệt vời!<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.1.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid1}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid1}}_s.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.1.name}}</span> tấn công rồi! Khả năng phòng vệ của <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.1.name}}</span> vẫn còn yếu nên bại trận
<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.1.1koto_lose}}]</span>
{{/if}}


<!-- round2 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 2<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.2.sec_name}}: Lv{{$app.fight.ot_level2}}</span>
 <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.2.sec_name}}: Lv{{$app.fight.level2}}</span><br />
{{if $app.fight.winner2 == 2}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid2}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid2}}_g.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.2.name}}</span> tấn công rồi! Nhưng <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.2.name}}</span> phát huy {{$app.fight.damage2}} khả năng phòng vệ và đánh trả tuyệt vời!<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.2.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid2}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid2}}_s.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.2.name}}</span> tấn công rồi! Khả năng phòng vệ của <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.2.name}}</span> còn yếu nên bại trận <span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.2.1koto_lose}}]</span>
{{/if}}

<!-- round3 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 3<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.3.sec_name}}: Lv{{$app.fight.ot_level3}}</span>
 <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.3.sec_name}}: Lv{{$app.fight.level3}}</span><br />
{{if $app.fight.winner3 == 2}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid3}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid3}}_g.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.3.name}}</span> tấn công rồi! Nhưng <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.3.name}}</span> phát huy {{$app.fight.damage3}} khả năng phòng vệ và đánh trả tuyệt vời!<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.3.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid3}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid3}}_s.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.3.name}}</span> tấn công rồi! Khả năng phòng vệ của <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.3.name}}</span> còn yếu nên bại trận<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.3.1koto_lose}}]</span>
{{/if}}

<!-- round4 -->
{{if $app.fight.winner4 == "" }}
{{else}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 4<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.4.sec_name}}: Lv{{$app.fight.ot_level4}}</span>
 <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.4.sec_name}}: Lv{{$app.fight.level4}}</span><br />
{{if $app.fight.winner4 == 2}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid4}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid4}}_g.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.4.name}}</span> tấn công rồi! Nhưng <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.4.name}}</span> phát huy {{$app.fight.damage4}} khả năng phòng vệ và đánh trả tuyệt vời!<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.4.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid4}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid4}}_s.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.4.name}}</span> tấn công rồi! Khả năng phòng vệ của <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.4.name}}</span> còn yếu nên bại trận <span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.4.1koto_lose}}]</span>
{{/if}}
{{/if}}

<!-- round5 -->
{{if $app.fight.winner5 == "" }}
{{else}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 5<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.5.sec_name}}: Lv{{$app.fight.ot_level5}}</span>
 <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.5.sec_name}}: Lv{{$app.fight.level5}}</span><br />
{{if $app.fight.winner5 == 2}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid5}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid5}}_g.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.5.name}}</span> tấn công rồi! Nhưng <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.5.name}}</span> phát huy {{$app.fight.damage5}} khả năng phòng vệ và đánh trả tuyệt vời!<span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.5.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.fight.ot_bushoid5}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.fight.bushoid5}}_s.jpg" alt="" width="80" height="109" />
</div>
Đã bị <span style="font-size:x-small;color:#ff0000;">{{$app.myDispCard.5.name}}</span> tấn công rồi! Khả năng phòng vệ của <span style="font-size:x-small;color:#ffff00;">{{$app.otDispCard.5.name}}</span> còn yếu nên bại trận <span style="font-size:x-small;color:#ffff00;"> [{{$app.otDispCard.5.1koto_lose}}]</span>
{{/if}}
{{/if}}

<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<!-- result -->
<div style="background-color:#333333;color:#ffffff;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
<span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.my_profile.handle}}</span> {{$app.fight.lose}} - {{$app.fight.win}} <span style="font-size:x-small;color:#ff0000;"> Quân đoàn {{$app.ot_profile.handle}}</span>.
{{if $app.fight.lose == 5 && $app.fight.win == 0}} Đại thắng!<br />
{{elseif $app.fight.lose == 4 && $app.fight.win == 1}} Thắng áp đảo!<br />
{{elseif $app.fight.lose == 3 && $app.fight.win == 2}} Thắng may mắn!<br />
{{elseif $app.fight.lose == 2 && $app.fight.win == 3}} Thua nhục nhã!<br />
{{elseif $app.fight.lose == 1 && $app.fight.win == 4}} Thảm bại!<br />
{{elseif $app.fight.lose == 0 && $app.fight.win == 5}} Đại bại!<br />
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="3" /><br />
</div>

{{if $app.tr.treasureid > 0}}
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center;background-color:#66cccc;color:#000000;">Báu vật</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="80" style="text-align:center;"><img src="http://{{$app.domain.img}}/treasure/{{$app.tr.treasureid}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<span style="color:#ff0000;">{{$app.tr.srname}}của gói [{{$app.tr.name}}]đã bị lấy mất</span>
</span></td></tr></table>
{{/if}}


<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
