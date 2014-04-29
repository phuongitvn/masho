<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Cửa hàng may mắn|Linh Triều Bình Ca</title>
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
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ff33ff;">Cửa hàng may mắn</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/hdr/gacha.gif" width="240" height="60" /></div>

{{if $app.bonus}}
<div>
Quân đoàn {{$profile.hanlde}} vừa nhận được quà đăng nhập là vé số miễn phí. Mau đi rút thăm Card nào!
</div>
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=72}}</span><a href="{{"/item/?unit=2&kbn=4&order=1"|cnvgw}}">Thêm vé số đặc biệt để thêm nhiều cơ hội may mắn</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.gcnt == 0 && $app.gFcnt == 0 && $app.gGcnt == 0 && $app.gPcnt == 0}}
Chào mừng bạn đến với Cửa hàng may mắn!<br />

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

Dưới đây là danh sách vé số bạn đang có<br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số đặc biệt: <span style="color:#ffff00;">0</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, kèm theo điểm kỹ năng</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số Vàng: <span style="color:#ffff00;">0</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, thậm chí là card hiếm và rất hiếm</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số thường: <span style="color:#ffff00;">0</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng D, nếu may mắn có thể còn được Card hiếm đấy</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số miễn phí: <span style="color:#ffff00;">0</span><br />
<span style="color:#ff0000;"> - Là quà tặng mỗi ngày khi đăng nhập, rút thăm được từ Card hạng D trở lên</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card:{{$app.cnt}}/36<br />
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$app.disp.0}}_s.jpg" width="60" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.disp.1}}_s.jpg" width="60" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.disp.2}}_s.jpg" width="60" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/item/?unit=2&kbn=4&order=1"|cnvgw}}">Mua thêm vé số</a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />
{{else}}
Chào mừng bạn đến với Cửa hàng may mắn!<br />
Dưới đây là danh sách vé số bạn đang có<br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số đặc biệt: <span style="color:#ffff00;">{{$app.gPcnt|default:0}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, kèm theo điểm kỹ năng</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số Vàng: <span style="color:#ffff00;">{{$app.gGcnt|default:0}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, thậm chí là card hiếm và rất hiếm</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số thường: <span style="color:#ffff00;">{{$app.gcnt|default:0}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng D, nếu may mắn có thể còn được Card hiếm đấy</span><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số miễn phí: <span style="color:#ffff00;">{{$app.gFcnt|default:0}}</span><br />
<span style="color:#ff0000;"> - Là quà tặng mỗi ngày khi đăng nhập, rút thăm được từ Card hạng D trở lên</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{if $app.cnt >= 36}}
<!--demo-->
<span style="color:#ffff00;">Có phải bạn muốn thêm nhiều Card hiếm và rất hiếm?</span>
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$app.disp.0}}_s.jpg" width="60" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.disp.1}}_s.jpg" width="60" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.disp.2}}_s.jpg" width="60" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff0000;"> Hiện tại, kho Card của bạn đã đầy (36), hãy kết hợp Card, bán hoặc tặng cho đồng minh để có thể thêm Card mới</span>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card: 36/36<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/card/file.php"|cnvgw}}">Tới kho Card</a></div>
{{else}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<!--demo-->
<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/card/{{$app.disp.0}}_s.jpg" width="60" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.disp.1}}_s.jpg" width="60" /><img src="http://{{$app.domain.img}}/spacer.gif" width="2" height="1" />
<img src="http://{{$app.domain.img}}/card/{{$app.disp.2}}_s.jpg" width="60" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />

{{if $app.gcnt == 0 && $app.gGcnt == 0 && $app.gPcnt == 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số miễn phí:  {{$app.gFcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gFcnt}}</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card: {{$app.cnt}} &raquo; <span style="color:#ffff00;">{{$app.af_cnt}}</span>/36<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_gcha_f.gif" width="160" height="80" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{elseif $app.gFcnt == 0 && $app.gGcnt == 0 && $app.gPcnt == 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số thường: {{$app.gcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gcnt}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng D, nếu may mắn có thể còn được Card hiếm đấy</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card: {{$app.cnt}} &raquo; <span style="color:#ffff00;">{{$app.af_cnt}}</span>/36<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_gcha.gif" width="160" height="80" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{elseif $app.gcnt == 0 && $app.gFcnt == 0 && $app.gPcnt == 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số Vàng: {{$app.gGcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gGcnt}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, thậm chí là card hiếm và rất hiếm</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card: {{$app.cnt}} &raquo; <span style="color:#ffff00;">{{$app.af_cnt}}</span>/36<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_gcha_g.gif" width="160" height="80" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{elseif $app.gcnt == 0 && $app.gFcnt == 0 && $app.gGcnt == 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số đặc biệt: {{$app.gPcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gPcnt}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, kèm theo điểm kỹ năng</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card: {{$app.cnt}} &raquo; <span style="color:#ffff00;">{{$app.af_cnt}}</span>/36<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?ssid="|cat:$app.ssid|cnvgw}}" accesskey="5"><img src="http://{{$app.domain.img}}/btn_gcha_p.gif" width="160" height="80" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{else}}
Vui lòng chọn hình thức rút thăm Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Kho Card: {{$app.cnt}} &raquo; <span style="color:#ffff00;">{{$app.af_cnt}}</span>/36<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.gPcnt > 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số đặc biệt: {{$app.gPcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gPcnt}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, kèm theo điểm kỹ năng</span><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?kb=gP&ssid="|cat:$app.ssid|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_gcha_p.gif" width="120" height="60" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

{{if $app.gGcnt > 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số Vàng: {{$app.gGcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gGcnt}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng C, thậm chí là card hiếm và rất hiếm</span><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?kb=gG&ssid="|cat:$app.ssid|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_gcha_g.gif" width="120" height="60" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

{{if $app.gcnt > 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số thường: {{$app.gcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gcnt}}</span><br />
<span style="color:#ff0000;"> - Luôn rút được Card từ hạng D, nếu may mắn có thể còn được Card hiếm đấy…</span><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?kb=gN&ssid="|cat:$app.ssid|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_gcha.gif" width="120" height="60" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

{{if $app.gFcnt > 0}}
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=1}}</span>Vé số miễn phí:  {{$app.gFcnt}} &raquo; <span style="color:#ff0000;">{{$app.af_gFcnt}}</span><br />
<div style="text-align:center;"><a href="{{"/gacha/do.php?kb=gF&ssid="|cat:$app.ssid|cnvgw}}"><img src="http://{{$app.domain.img}}/btn_gcha_f.gif" width="120" height="60" /></a></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{/if}}
{{/if}}
{{/if}}
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff33ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
