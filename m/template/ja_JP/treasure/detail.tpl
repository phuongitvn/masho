<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh triều bình ca </title>
<style type="text/css">
{{literal}}
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
{{/literal}}
</style></head><body style="background-color:#000000;color:#ffffff"><a name="top" id="top"></a><div style="font-size:x-small;">{{if $form.oid != "" && $app.mode == "pre"}}<div style="text-align:center; background-color:#330066;color:#ffffff;">Tặng cho Quân đoàn {{$app.other.handle}}</div>{{/if}}<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br /><div style="text-align:center; background-color:#66cccc;color:#000000;">{{if $app.mode == "pre"}}Chọn từ vật báu của quân mình{{elseif $app.mode == "choice"}}Báu vật đang tìm{{else}}{{if $app.ownChk == 0}} Báu vật đang tìm{{else}}Thông tin Báu vật{{/if}}{{/if}}</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div><div style="text-align:center;"><span style="color:#ffff00;">Gói {{$app.sirInfo.name}}</span></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="text-align:center; font-size:small;">{{$app.detailInfo.name}}</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="text-align:center;">{{if $app.mode == "choice" && $app.ownChk == 0}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" border="0" />{{else}}{{if $app.ownChk > 0}}<img src="http://{{$app.domain.img}}/treasure/{{$app.trId}}.gif" width="70" height="70" border="0" />{{else}}<img src="http://{{$app.domain.img}}/treasure/0.gif" width="70" height="70" border="0" />{{/if}}{{/if}}</div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{$app.detailInfo.expla}}<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />{{if $app.mode == "pre"}}{{if $app.sirCompFlg == "1" && $app.preownChk == "0"}}Báu vật Quân đoàn :  {{$app.ownChk}}<br />Báu vật Quân đoàn {{$app.other.handle}}{{$app.othChk}}<br /><span style="color:#ff0000;">Vật báu thuộc gói đủ để tạo gói báu vật chỉ có thể tặng khi có 2  trở lên</span><br />{{elseif $app.CmOthFlg == "1"}}Báu vật Quân đoàn :  {{$app.ownChk}}<br />Báu vật Quân đoàn {{$app.other.handle}}{{$app.othChk}}<br /><span style="color:#ff0000;">Trường hợp quân đoàn được tặng sẽ hoàn thành gói báu vật với vật báu này thì không thể tặng được. </span><br />{{else}}Báu vật Quân đoàn: {{$app.ownChk}} &raquo; {{$app.preownChk}}<br />Báu vật Quân đoàn {{$app.other.handle}}: {{$app.othChk}} &raquo; {{$app.preothChk}}<br /><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><div style="text-align:center;"><form action="http://{{$app.domain.www}}/treasure/index.php" method="POST"><input type="hidden" name="act" value="treasure_confirm" /><input type="hidden" name="oid" value="{{$form.oid}}" /><input type="hidden" name="tid" value="{{$app.trId}}" /><input type="hidden" name="ssid" value="{{$app.ssid}}" /><input type="submit" value="Tặng" /></form></div>{{/if}}{{else}}<!--Thông thường-->{{if $app.ownChk > 0}}Quân đoàn đang có:  {{$app.ownChk}}<br />{{/if}}{{if $app.sirCompFlg == "1" }}<!--Hoàn thành-->{{if $app.mode == "choice"}}<div style="text-align:center;"><a href="{{"/other/list.php?md=tr&tid="|cat:$app.trId|cnvgw}}">Chiến đấu giành vật báu</a></div>{{else}}{{if $app.ownChk > 1}}<div style="text-align:center;"><a href="{{"/my/friend/list/?md=tp&cid="|cat:$app.trId|cnvgw}}">Tặng Báu vật</a></div>{{/if}}{{/if}}{{else}}<!--Chưa hoàn thành-->{{if $app.mode == "choice"}}{{else}}{{if $app.ownChk > 0}}Bùa: {{if $app.on.trap1num == 0}}không có{{else}}{{$app.on.trap1num}}{{/if}}<br />Bùa siêu hạng: {{if $app.on.trap2num == 0}}không có{{else}}{{$app.on.trap2num}}{{/if}}<br />└<a href="{{"/treasure/trap/?tid="|cat:$app.trId|cnvgw}}">Dán bùa</a><br />{{/if}}{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="15" /><br /><div style="text-align:center;"><a href="{{"/other/list.php?md=tr&tid="|cat:$app.trId|cnvgw}}">Chiến đấu giành báu vật</a></div>{{if $app.mode == "choice"}}{{else}}{{if $app.ownChk > 0}}<div style="text-align:center;"><a href="{{"/my/friend/list/?md=tp&cid="|cat:$app.trId|cnvgw}}">Tặng báu vật</a></div>{{/if}}{{/if}}{{/if}}{{/if}}<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br /><!-- footer --><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br /><div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>{{include file="parts/footer.tpl"}}</div></body></html>