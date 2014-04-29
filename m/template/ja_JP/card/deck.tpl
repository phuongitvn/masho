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
<div style="text-align:center; background-color:#006600;">Cỗ bài</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>


<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=63}}</span>Cỗ bài: 5 <br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=70}}</span>Kho Card: <a href="{{"/card/file.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">{{$app.cntF}}/36 </a><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=30}}</span>Hộp quà: <a href="{{"/card/pre.php?oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">{{$app.cntP}}/9 </a><br />

<!--Kho -->
{{* <span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=27}}</span>Kho quân khí: <a href="{{"/item/?act=item_confirm&num=1&id=200"|cnvgw}}">Mua</a><br />
<span style="color:#ff0000;">{{include file="parts/emoji.tpl" id=27}}</span>Hộp quà tặng: 
*}}
{{if $app.mode == "edit"}}
<div style="text-align:center;"><img src="http://{{$app.domain.img}}/card/{{$app.busho.bushoid}}_s.jpg" width="80" height="109" /></div>
{{/if}}
<div style="background-color:#ffffff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{if $app.mode == "edit"}}
Hãy chọn quân bài rút khỏi cỗ bài <br />
{{else}}
{{if isset($app.msg) }}<div style="text-align:center;color:#ffff00;">{{$app.msg}}</div>{{/if}}
<div style="background-color:#33ff00;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Cỗ bài hiện tại</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{/if}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if $app.mode <> "edit"}}
{{if $app.form.formno > 0 }}
<div style="text-align:center; text-decoration:blink; color:#ffff00; font-weight:bold; font-size:medium">
{{$app.form.name}}<br/>
<span style="text-decoration:blink;color:#ffff00;font-size:small">Đang triển khai đội hình!!</span></a>
</div>
{{*{{$app.form.form_expla}}<br />
<span style="color:#ffff00;">Hiệu quả:{{$app.form.eff_expla}}</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="2" /><br />*}}
{{else}}
<span style="color:#ff0000;">Không có đội hình hiệu quả</span><br />
{{/if}}
{{/if}}

<table border="0" cellspacing="0" cellpadding="0" align="center"><tr><td width="85">
{{if $app.mode == "edit"}}
<a href="{{"/card/chg.php?deck=1&seq="|cat:$app.busho.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{else}}
{{if $form.oid == ""}}
<a href="{{"/card/?mode=1&deck=1&id="|cat:$app.bid.1|cat:"&seq="|cat:$app.deck.deck1|cnvgw}}">
{{else}}
<a href="{{"/card/?mode=1&deck=1&id="|cat:$app.bid.1|cat:"&seq="|cat:$app.deck.deck1|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/card/{{$app.bid.1}}_s.jpg" width="80" height="109" /></a></td><td width="40"><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td><td width="85">
{{if $app.mode == "edit"}}
<a href="{{"/card/chg.php?deck=2&seq="|cat:$app.busho.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{else}}
{{if $form.oid == ""}}
<a href="{{"/card/?mode=1&deck=2&id="|cat:$app.bid.2|cat:"&seq="|cat:$app.deck.deck2|cnvgw}}">
{{else}}
<a href="{{"/card/?mode=1&deck=2&id="|cat:$app.bid.2|cat:"&seq="|cat:$app.deck.deck2|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/card/{{$app.bid.2}}_s.jpg" width="80" height="109" /></a></td></tr>
<tr><td width="85"><span style="font-size:x-small;text-align:left;"><span style="color:#ff0000;">Lv </span>{{$app.card.1.level}} <span style="color:#00ff00;">Công </span>{{$app.card.1.offense}}<br /><span style="color:#00ff00;">Thủ  </span>{{$app.card.1.defense}} <span style="color:#00ff00;">Binh </span>{{$app.card.1.follower}}<br /></span></td><td width="40"><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td><td width="85"><span style="font-size:x-small;text-align:left;"><span style="color:#ff0000;">Lv </span>{{$app.card.2.level}} <span style="color:#00ff00;">Công  </span>{{$app.card.2.offense}}<br /><span style="color:#00ff00;">Thủ </span>{{$app.card.2.defense}} <span style="color:#00ff00;">Binh </span>{{$app.card.2.follower}}<br /></span></td></tr>
<tr>
<td width="65"></td><td width="80">
{{if $app.mode == "edit"}}
<a href="{{"/card/chg.php?deck=3&seq="|cat:$app.busho.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{else}}
{{if $form.oid == ""}}
<a href="{{"/card/?mode=1&deck=3&id="|cat:$app.bid.3|cat:"&seq="|cat:$app.deck.deck3|cnvgw}}">
{{else}}
<a href="{{"/card/?mode=1&deck=3&id="|cat:$app.bid.3|cat:"&seq="|cat:$app.deck.deck3|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/card/{{$app.bid.3}}_s.jpg" width="80" height="109" /></a></td><td width="65"></td></tr>
<tr><td width="65"></td><td width="80"><span style="font-size:x-small;text-align:left;"><span style="color:#ff0000;">Lv </span>{{$app.card.3.level}} <span style="color:#00ff00;">Công </span>{{$app.card.3.offense}}<br /><span style="color:#00ff00;">Thủ  </span>{{$app.card.3.defense}} <span style="color:#00ff00;">Binh  </span>{{$app.card.3.follower}}<br /></span></td><td width="65"></td></tr><tr><td width="85">
{{if $app.mode == "edit"}}
<a href="{{"/card/chg.php?deck=4&seq="|cat:$app.busho.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{else}}
{{if $form.oid == ""}}
<a href="{{"/card/?mode=1&deck=4&id="|cat:$app.bid.4|cat:"&seq="|cat:$app.deck.deck4|cnvgw}}">
{{else}}
<a href="{{"/card/?mode=1&deck=4&id="|cat:$app.bid.4|cat:"&seq="|cat:$app.deck.deck4|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/card/{{$app.bid.4}}_s.jpg" width="80" height="109" /></a></td>
<td width="40"><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td><td width="85">
{{if $app.mode == "edit"}}
<a href="{{"/card/chg.php?deck=5&seq="|cat:$app.busho.cardseq|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{else}}
{{if $form.oid == ""}}
<a href="{{"/card/?mode=1&deck=5&id="|cat:$app.bid.5|cat:"&seq="|cat:$app.deck.deck5|cnvgw}}">
{{else}}
<a href="{{"/card/?mode=1&deck=5&id="|cat:$app.bid.5|cat:"&seq="|cat:$app.deck.deck5|cat:"&oid="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&trid="|cat:$form.trid|cat:"&ts="|cat:$form.ts|cnvgw}}">
{{/if}}
{{/if}}
<img src="http://{{$app.domain.img}}/card/{{$app.bid.5}}_s.jpg" width="80" height="109" /></a></td></tr>
<tr><td width="85"><span style="font-size:x-small;text-align:left;"><span style="color:#ff0000;">Lv </span>{{$app.card.4.level}} <span style="color:#00ff00;">Công  </span>{{$app.card.4.offense}}<br /><span style="color:#00ff00;">Thủ  </span>{{$app.card.4.defense}} <span style="color:#00ff00;">Binh </span>{{$app.card.4.follower}}<br /></span></td><td width="40"><img src="http://{{$app.domain.img}}/spacer.gif" width="40" height="1" /></td><td width="85"><span style="font-size:x-small;text-align:left;"><span style="color:#ff0000;">Lv </span>{{$app.card.5.level}} <span style="color:#00ff00;">Công  </span>{{$app.card.5.offense}}<br /><span style="color:#00ff00;">Thủ  </span>{{$app.card.5.defense}} <span style="color:#00ff00;">Binh </span>{{$app.card.5.follower}}<br /></span></td></tr>
</table>


{{if $app.mode <> "edit"}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

<!--<div style="font-size:x-small;color:#ff0000;">Trường hợp kết hợp card của cỗ bài thì hãy quay lại kho Card và kết hợp" </div>-->

{{if $form.oid <> ""}}
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
{{include file="parts/emoji.tpl" id=26}}<a href="{{"/fight/?id="|cat:$form.oid|cat:"&fid="|cat:$form.fid|cat:"&ts="|cat:$form.ts|cat:"&trid="|cat:$form.trid|cnvgw}}" accesskey="5">Chiến đấu！</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
</div>
{{/if}}
{{/if}}

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if isset($app.masho) }}
<!--MASHO-->
<div style="background-color:#000049;text-align:center;">
<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<a href="{{"/boss/"|cnvgw}}"><img src="http://{{$app.domain.img}}/masho_app.gif" width="200" height="60" /><br />
<span style="text-decoration:blink;font-size:medium;">Yêu tướng xuất hiện!</span></a></div>
<!--MASHO-->
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
