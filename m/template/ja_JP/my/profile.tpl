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
</style></head>
<body style="background-color:#000000;color:#ffffff">
<a name="top" id="top"></a>
<div style="font-size:x-small;">
<div style="background-color:#993366;">
<div style="text-align:center;font-size:small;">Hồ sơ cá nhân</div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="85" align="center"><img src="http://{{$app.domain.img}}/card/{{$app.profile.prof}}_p.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<span style="color:#ffff00">Quân đoàn trưởng:</span> <span style="color:#ffffff;">{{$app.card.name}}({{$app.card.rank}})</span><br />
<span style="color:#ffff00">Quân danh:</span> <span style="color:#ffffff;">{{$app.profile.handle}}</span><br />
<a href="{{"/my/power.php"|cnvgw}}">Quân năng:</a><span style="color:#ffffff;"> Lv{{$app.profile.level}}</span><br />
<a href="{{"/other/card.php?id="|cat:$app.profile.memberid|cnvgw}}">Tổng Card:</a><span style="color:#ffffff;"> {{$app.cnt}}</span>/41<br />
<a href="{{"/my/treasure.php"|cnvgw}}">Gói báu vật đủ:</a> <span style="color:#ffffff;"> {{if $app.numChk.CompNum == 0}}0{{else}}{{$app.numChk.CompNum}}{{/if}}</span>/{{$app.numChk.OwnNum}} Gói<br />
<a href="{{"/my/friend/list/"|cnvgw}}">Đồng minh:</a> <span style="color:#ffffff;"> {{$app.profile.friend_num}}</span>/{{$app.maxFr}}<br />
<span style="color:#ffff00">Điểm thân thiện:</span> ({{if $app.profile.friend_pt >= 100}}<span style="color:#ffff00;">{{else}}<span style="color:#ffffff;">{{/if}}{{$app.profile.friend_pt}}</span>)<br />
<span style="color:#ffff00">Điểm kinh nghiệm:</span><span style="color:#ffffff;"> {{$app.profile.exp}} </span>(Cần <span style="color:#ffff00;">{{$app.diffExp}}</span>)<br />
<span style="color:#ffff00">Năng lượng:</span><span style="color:#ff0000;"> {{$app.profile.genki}}</span>/{{$app.profile.max_genki}}<br />
</span></td></tr></table>
</div>
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ffcc00; color:#000000;">Thông tin đăng ký
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" />
</div>
<div style="padding:10px 0px 0px 5px;color:#FFFF00;"><a href="{{"/login/change.php"|cnvgw}}">Đổi mật khẩu</a></div>
<div style="padding-left:5px;"><form action="{{"/my/profile.php"|cnvgw}}" method="post">
		<div style="padding:10px 0px 0px 0px;color:#FFFF00;">Email</div>
		<div><input name="email" type="text" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:5px 0 3px 0;" value="{{$app.profile.email|escape}}"/></div>
	{{if is_error('email')}}
		<div style="color:red">{{message name="email"}}</div>
	{{/if}}	
	<div style="padding:10px 0px 0px 0px;color:#FFFF00;">Điện thoại</div>
	<div><input name="tel" type="text" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:5px 0 3px 0;" value="{{$app.profile.tel|escape}}"/></div>
	{{if is_error('tel')}}
		<div style="color:red">{{message name="tel"}}</div>
	{{/if}}
		<div style="text-align:center; padding:10px 0px;"><input name="btn" type="submit" value="Thay đổi" style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#51111E;" /></div>
	</form>
	</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
{{include file="parts/footer.tpl"}}
</body>
</html>
