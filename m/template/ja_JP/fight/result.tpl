<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style>
<title>Linh Triều Bình ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Kết quả chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<!-- * -->
<div style="text-align:center;"><span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.my_profile.handle}}</span> VS <span style="font-size:x-small;color:#ff0000;">Quân đoàn {{$app.ot_profile.handle}}</span></div><!-- banner thắng thua -->
{{if $app.winN < 3}}
<embed src="/img/swf/lose.swf?img1=/img/card/{{$app.my_profile.prof}}_p.jpg" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
{{else}}
<embed src="/img/swf/win.swf?img1=/img/card/{{$app.my_profile.prof}}_p.jpg" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
{{/if}}<!-- Hiệu quả đội hình -->
{{if $app.my_profile.formno > 0 ||  $app.ot_profile.formno > 0 }}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}
{{if $app.my_profile.formno > 0 }}
<span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.my_profile.handle}} </span><span style="font-size:x-small;color:#ffff00;">[{{$app.dispMyForm.name}}]</span><br />{{/if}}
{{if $app.ot_profile.formno > 0 }}
<span style="font-size:x-small;color:#ff0000;">Quân đoàn {{$app.ot_profile.handle}} </span><span style="font-size:x-small;color:#ff0000;">[{{$app.dispOtForm.name}}]</span><br />{{/if}}<!-- round1 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ nhất<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.1.sec_name}} (Lv{{$app.myDispCard.1.level}})</span> &gt;&lt;
 <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.1.sec_name}} (Lv{{$app.otDispCard.1.level}})</span><br />
{{if $app.fight.1 == 1}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.1.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.1.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.1.name}}</span> (Công {{$app.myOffP.1}}) đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.1.name}}</span> (Thủ {{$app.otDefP.1}}) bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.1.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.1.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.1.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.1.name}}</span> (Công {{$app.myOffP.1}}) tấn công nhưng không thể làm lung lay được sự phòng thủ chắc chắc của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.1.name}}</span> (Thủ {{$app.otDefP.1}})! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.1.1koto_lose}}]</span>
{{/if}}

<!-- round2 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 2<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.2.sec_name}} (Lv{{$app.myDispCard.2.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.2.sec_name}} (Lv{{$app.otDispCard.2.level}})</span><br />
{{if $app.fight.2 == 1}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.2.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.2.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.2.name}} (Công {{$app.myOffP.2}}) đánh bại </span><span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.2.name}}</span>(Thủ {{$app.otDefP.2}}) bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.2.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.2.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.2.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.2.name}}</span> (Công {{$app.myOffP.2}}) tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.2.name}}</span> (Thủ {{$app.otDefP.2}}) <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.2.1koto_lose}}]</span>
{{/if}}<!-- round3 -->
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 3<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.3.sec_name}} (Lv {{$app.myDispCard.3.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.3.sec_name}} (Lv {{$app.otDispCard.3.level}})</span><br />
{{if $app.fight.3 == 1}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.3.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.3.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.3.name}}</span> (Công {{$app.myOffP.3}}) đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.3.name}}</span> (Thủ {{$app.otDefP.3}}) bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.3.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.3.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.3.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.3.name}}</span> (Công {{$app.myOffP.3}}) tấn công nhưng không thể làm lung lay sự phòng thủ vững chắc của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.3.name}}</span> (Thủ {{$app.otDefP.3}}) <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.3.1koto_lose}}]</span>
{{/if}}<!-- round4 -->
{{*{{if $app.ext == 3 }}{{else}}*}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 4<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.4.sec_name}} (Lv {{$app.myDispCard.4.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.4.sec_name}} (Lv {{$app.otDispCard.4.level}})</span><br />
{{if $app.fight.4 == 1}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.4.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.4.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.4.name}}</span> (Công {{$app.myOffP.4}}) đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.4.name}} (Thủ {{$app.otDefP.4}})</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.4.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.4.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.4.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.4.name}}</span> (Công {{$app.myOffP.4}}) tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.4.name}}</span> (Thủ {{$app.otDefP.4}}) <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.4.1koto_lose}}]</span>
{{/if}}
{{*{{/if}}*}}<!-- round5 -->
{{*{{if $app.ext == 3 || $app.ext == 4}}{{else}}*}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 5<br />
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.5.sec_name}} (Lv {{$app.myDispCard.5.level}})</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.5.sec_name}} (Lv {{$app.otDispCard.5.level}})</span><br />
{{if $app.fight.5 == 1}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.5.bushoid}}_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.5.bushoid}}_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.5.name}}</span> (Công {{$app.myOffP.5}}) đánh bại <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.5.name}} (Thủ {{$app.otDefP.5}})</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.5.1koto_win}}]</span>
{{else}}
<img src="http://{{$app.domain.img}}/card/{{$app.myDispCard.5.bushoid}}_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://{{$app.domain.img}}/card/{{$app.otDispCard.5.bushoid}}_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;">{{$app.myDispCard.5.name}}</span> (Công {{$app.myOffP.5}}) tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;">{{$app.otDispCard.5.name}}</span> (Thủ {{$app.otDefP.5}}) <span style="font-size:x-small;color:#ffff00;">[{{$app.myDispCard.5.1koto_lose}}]</span>
{{/if}}
{{*{{/if}}*}}<!-- result -->
<div style="background-color:#333333;color:#ffffff;"><span style="font-size:x-small;color:#ffff00;">Quân đoàn {{$app.my_profile.handle}}</span> {{$app.winN}} - {{$app.loseN}}<span style="font-size:x-small;color:#ff0000;"> Quân đoàn {{$app.ot_profile.handle}}</span><br/>{{if $app.winN == 5 && $app.loseN == 0}}
Thắng áp đảo!{{elseif $app.winN == 4 && $app.loseN == 1}}
Thắng dễ dàng!{{elseif $app.winN == 3 && $app.loseN == 2}}
Thắng sát nút!{{elseif $app.winN == 2 && $app.loseN == 3}}
Thua với tỉ số sát nút!{{elseif $app.winN == 1 && $app.loseN == 4}}
Thua đậm!{{elseif $app.winN == 0 && $app.loseN == 5}}
Đại bại!{{/if}}<br />
{{if $app.winN >= 3}}
Điểm kinh nghiệm: +{{$app.spd.exp}}<br />
Vàng: +{{$app.spd.money}}<br />
Năng lượng: -3<br />
</div>
{{else}}
Điểm kinh nghiệm: +{{$app.spd.exp}}<br />
Vàng: -{{$app.spd.money}}<br />
Năng lượng: -3<br />
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span><a href="{{"/card/pcomplist.php"|cnvgw}}">Tăng sức mạnh cho Card và đấu lại</a><span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.comp == 0}}
<div style="text-align:center;"><span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=19}}</span><a href="{{"/help/request.php?tid="|cat:$form.trid|cat:"&ts="|cat:$app.ts|cat:"&oid="|cat:$app.oid|cnvgw}}">Nhờ đồng minh cứu viện</a><span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=19}}</span></div>
{{else}}
<span style="color:#ff0000;">Không thể nhờ đồng minh cứu viện</span>
{{/if}}
{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{if $app.already.handle != "" }}
<!-- Trường hợp user khác đã hoàn thành viện trợ  -->
<div style="text-align:center;color:#ff0000;">Quân đoàn {{$app.already.handle}} và Quân đoàn {{$app.ot_profile.handle}} đã viện trợ{{if $app.ret0.entry_flg == 1}} thắng{{else}} thua{{/if}}</div>
{{else}}{{if isset($app.tr) }}
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Báu vật</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="80" style="text-align:center;"><img src="http://{{$app.domain.img}}/treasure/{{$app.tr.treasureid}}.gif" width="70" height="70" />
</td><td><span style="font-size:x-small;">
{{if $app.ret0.trNotExists == 1}}
<div style="text-align:center;color:#ff0000;">Báu vật{{$app.tr.name}} - Gói {{$app.sr.name}} đã đủ gói hoặc vào tay quân đoàn khác nên không thể lấy được </div>
{{else}}
{{if $app.fr_profile.handle == "" }}
{{if $app.ret0.itemid == ""}}
Lấy được báu vật {{$app.tr.name}} thuộc Gói {{$app.sr.name}}!
{{else}}
<span style="color:#ffff00;">Lấy được Báu vật {{$app.tr.name}} thuộc Gói {{$app.sr.name}} và hoàn thành Gói báu vật </span><br />
{{/if}}
{{else}}
Quân đoàn {{$app.fr_profile.handle}} viện trợ và giành thắng lợi. Được Báu vật {{$app.tr.name}}, hoàn thành Gói {{$app.sr.name}}
{{/if}}
{{/if}}
</span></td></tr></table>
{{/if}}
{{/if}}{{if $app.ret0.itemid != "" && $app.fr_profile.handle == "" }}
<div style="text-align:center; background-color:#945092; border-color:#945092; border-style:solid;"><span style="color:#000000;">Đoạt được món đồ</span></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="80"><img src="http://{{$app.domain.img}}/item/{{$app.ret0.itemid}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">{{$app.ret0.name}}<br />{{$app.ret0.expla}}<br />
{{if $app.ret0.kbn == 1 || $app.ret0.kbn == 2}}
Tấn công {{$app.ret0.offense}}<br />
Phòng thủ {{$app.ret0.defense}}{{/if}}</span></td></tr></table>
{{/if}}{{if $app.ret0.restNum >= 0 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Món đồ bị hỏng</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center">
<tr><td width="60"><img src="http://{{$app.domain.img}}/item/{{$app.crash.itemid}}.gif" alt="{{$app.crash.name}}" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
{{if $app.crash.kbn == 1 }}Vũ khí: {{elseif $app.crash.kbn == 2}}Đồ phòng Thủ {{else}}Khác: {{/if}}{{$app.crash.name}}<br />
Công {{$app.crash.offense}} Thủ {{$app.crash.defense}}<br />
{{if $app.crash.money == 0 && $app.crash.coin == 0 }}
<span style="color:#ff0000;">Đồ không bán</span><br />
{{elseif $app.crash.coin == 0}}
Giá: {{$app.crash.money}}<img src="http://{{$app.domain.img}}/vang.gif" width="10" height="8" /><br />
{{/if}}
</span></td></tr></table>
{{/if}}<!-- Đánh giá lên trình -->
{{if $app.diffExp == 0 }}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/fight/next.php?fg="|cat:$app.fg|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Tiếp</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/other/list.php"|cnvgw}}" accesskey="5">{{include file="parts/emoji.tpl" id=26}}Tiếp tục chiến đấu</a></div>
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
{{/if}}
</div>
</body>
</html>