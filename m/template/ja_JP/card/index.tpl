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
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Thông tin Card</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<span style="color:#ff9900;"></span>Cỗ bài: <a href="{{"/card/deck.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">5</a><br />
<span style="color:#ff9900;"></span>Kho card: <a href="{{"/card/file.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">{{$app.cnt.file}}/36</a><br />
<span style="color:#ff9900;"></span>Hộp quà: <a href="{{"/card/pre.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">{{$app.cnt.pre}}/9</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;background-color:#333333;">
{{if $app.mode == 1}}<!--Chuyển tiếp từ cỗ bài -->
<span style="color:#0000ff;"></span><a href="{{"/card/file.php?mode=edit&deck="|cat:$app.deck|cat:"&seq="|cat:$app.card.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Thay Card khỏi Cỗ bài </a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 2}}<!-- フChuyển tiếp từ file　-->
<span style="color:#ff0000;"></span><a href="{{"/card/deck.php?mode=edit&seq="|cat:$app.card.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Đưa vào cỗ bài</a><span style="color:#0000ff;"> / </span><a href="{{"/card/pcompose.php?seq="|cat:$app.card.cardseq|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Kết hợp</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<span style="color:#ff0000;"></span>{{if $app.profile.level>9}}<a href="{{"/my/friend/list/?md=cp&cid="|cat:$app.card.cardseq|cnvgw}}">Tặng</a> <span style="color:#ff00ff;"> / </span>{{/if}}<a href="{{"/card/del/?seq="|cat:$app.card.cardseq|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Bán</a>
{{elseif $app.mode == 3}}<!-- Chuyển tiếp từ hộp quà　-->
<span style="color:#ff0000;"></span><a href="{{"/card/file.php?mode=add&seq="|cat:$app.card.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Chuyển đến kho Card</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 4}}<!-- chuyển tiếp từ mode quà tặng　-->
{{if $app.profile.level>9}}
<form action="{{"/card/confirm/"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="card_confirm" />
<input type="hidden" name="oid" value="{{$form.oid}}" />
<input type="hidden" name="seq" value="{{$app.card.cardseq}}" />
<input type="hidden" name="bid" value="{{$app.bushoid}}" />
<input type="hidden" name="name" value="{{$app.m_busho.name}}" />
<input type="hidden" name="rank" value="{{$app.m_busho.rank}}" />
<input type="hidden" name="level" value="{{$app.card.level}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Tặng card" />
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}
{{elseif $app.mode == 5}}<!-- Chuyển tiếp từ danh sách card muốn có　-->
<form action="{{"/card/wish/"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="card_wish_complete" />
<input type="hidden" name="bseq" value="{{$app.bseq}}" />
<input type="hidden" name="bid" value="{{$app.bushoid}}" />
<input type="hidden" name="rank" value="{{$app.m_busho.rank}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Đăng kí card này" />
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 6}}<!-- Chuyển tiếp từ hợp nhất cấp độ　-->
<a href="{{"/card/compose.php?seq="|cat:$form.org|cat:"&op="|cat:$form.seq|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chọn làm card để kết hợp</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 7}}<!-- Chuyển tiếp từ hợp nhất điểm　-->
<a href="{{"/card/pcompose.php?seq="|cat:$form.org|cat:"&op="|cat:$form.seq|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chọn làm card để kết hợp</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
{{$app.m_busho.name}}({{$app.m_busho.rank}})<br/>
<img src="http://{{$app.domain.img}}/card/{{$app.bushoid}}.jpg" width="160" height="218" />
</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{$app.m_busho.expla}}<br />
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
Năng lực: <span style="color:#00ff00;">Công</span> {{$app.m_busho.offense}} <span style="color:#00ff00;">Thủ</span> {{$app.m_busho.defense}} <span style="color:#00ff00;">Binh</span> {{$app.m_busho.follower}}<br />
Giới tính: {{if $app.m_busho.gender =="1"}}♂Nam{{elseif $app.m_busho.gender =="2"}}♀Nữ{{/if}}<br />
Công lực: {{$app.card.offense}}<br />
Thủ lực: {{$app.card.defense}}<br />
Binh lực: {{$app.card.follower}}<br />
Tỷ lệ thắng: {{$app.card.rate}}%(Thắng {{$app.card.win}} Bại {{$app.card.lose}})<br />
Đặc năng: <span style="color:#ffff00;">{{$app.m_busho.sec_name}} ({{if $app.m_busho.sec_kbn =="1"}}Tấn công{{elseif $app.m_busho.sec_kbn =="2"}}Phòng vệ {{else}}Đặc biệt {{/if}})</span><br />
Cấp độ: {{$app.card.level}}<br />
Hiệu ứng đặc năng: <span style="color:#ffff00;">{{$app.m_busho.eff_expla}}</span><br />

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<div style="text-align:center;background-color:#333333;">
{{if $app.mode == 1}}<!--Chuyển tiếp từ cỗ bài-->
<span style="color:#0000ff;"></span><a href="{{"/card/file.php?mode=edit&deck="|cat:$app.deck|cat:"&seq="|cat:$app.card.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Thay Card khỏi Cỗ bài </a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 2}}<!-- Chuyển tiếp từ file-->
<span style="color:#ff0000;"></span><a href="{{"/card/deck.php?mode=edit&seq="|cat:$app.card.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Đưa vào cỗ bài</a> <span style="color:#0000ff;"> / </span><a href="{{"/card/pcompose.php?seq="|cat:$app.card.cardseq|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Kết hợp</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />
<span style="color:#ff0000;"></span>{{if $app.profile.level>9}}<a href="{{"/my/friend/list/?md=cp&cid="|cat:$app.card.cardseq|cnvgw}}">Tặng</a> <span style="color:#ff00ff;"> / </span>{{/if}}<a href="{{"/card/del/?seq="|cat:$app.card.cardseq|cat:"&ssid="|cat:$app.ssid|cnvgw}}">Bán</a>
{{elseif $app.mode == 3}}<!-- Chuyển tiếp từ hộp quà　-->
<span style="color:#ff0000;"></span><a href="{{"/card/file.php?mode=add&seq="|cat:$app.card.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">Kho Card</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 4}}<!-- Chuyển tiếp từ mode quà tặng　-->
{{if $app.profile.level>9}}
<form action="{{"/card/"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="card_confirm" />
<input type="hidden" name="oid" value="{{$form.oid}}" />
<input type="hidden" name="seq" value="{{$app.card.cardseq}}" />
<input type="hidden" name="bid" value="{{$app.bushoid}}" />
<input type="hidden" name="name" value="{{$app.m_busho.name}}" />
<input type="hidden" name="rank" value="{{$app.m_busho.rank}}" />
<input type="hidden" name="level" value="{{$app.card.level}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Tặng card này" />
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{/if}}
{{elseif $app.mode == 5}}<!-- Chuyển tiếp từ danh sách card muốn có　-->
<form action="{{"/card/wish/"|cnvgw}}" method="POST">
<input type="hidden" name="act" value="card_wish_complete" />
<input type="hidden" name="bseq" value="{{$app.bseq}}" />
<input type="hidden" name="bid" value="{{$app.bushoid}}" />
<input type="hidden" name="rank" value="{{$app.m_busho.rank}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Đăng kí card này" />
</form>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 6}}<!-- Chuyển tiếp từ ....　-->
<a href="{{"/card/compose.php?seq="|cat:$form.org|cat:"&op="|cat:$form.seq|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chọn làm card hợp nhất</a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{elseif $app.mode == 7}}<!-- Chuyển tiếp từ hợp nhất điểm　-->
<a href="{{"/card/pcompose.php?seq="|cat:$form.org|cat:"&op="|cat:$form.seq|cat:"&ssid="|cat:$app.ssid|cnvgw}}" accesskey="5">Chọn làm Card nguyên liệu </a>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{/if}}
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
