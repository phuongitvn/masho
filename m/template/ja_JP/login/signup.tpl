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
<body style="font-family:Tahoma; font-size:x-small;color:#000000;word-wrap: break-word; background:#000000; color:#FFFFFF;">
<a name="top" id="top"></a>
<div style="margin:0">
	<div style="background-color:#ff0000;height:22px;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>
	<div style="height:22px;text-align:center; background-color:#820000;font-size:medium;">Đăng ký</div>
	<div style="background-color:#ff0000;height:22px;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>
	<img src="http://{{$app.domain.img}}/top_{{$app.st}}{{$app.ran}}.gif" width="240" /><br />
	<div style="height:22px; background:#F5F5F5;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>

{{if $app.can_not_signup}}
	<div style="background-color:#000049; padding:10px;">
		Giai đoạn OpenBeta chỉ mở thêm cho 2000 user mới. Hiện số User đăng ký đã đủ, mong bạn quay lại 10h ngày 21/7. Cảm ơn bạn !
	</div>
{{else}}
	<div style="background-color:#000049; padding:10px;">Bạn đã có tài khoản Moba? Rất đơn giản, chỉ cần chấp nhận <a href="{{"/login/policy.php"|cnvgw}}">Điều khoản sử dụng</a> và gia nhập Linh triều Bình ca ngay nào!!!</div>
	<div style="height:22px; background:#F5F5F5;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1"></div>
	<div style="height:22px;text-align:center; background-color:#820000;font-size:medium;">Đăng ký</div>
	<div style="padding-left:5px;"><form action="{{"/login/signup.php"|cnvgw}}" method="post">
		<input name="code" type="hidden" value="{{$app.code|escape}}" />
		<div style="padding:6px 0px 0px 0px;color:#FFFF00;">Tên đăng nhập</div>
		<div>
			<input name="id" type="text" style="width:80%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:3px 0 0 0;" value="{{$app.id|escape}}" />
			<a href="#1"><img src="http://{{$app.domain.img}}/helpmuacoin.gif" alt=""/></a>
			{{if is_error('id')}}
			<div style="color:red">{{message name="id"}}</div>
			{{/if}}
		</div>
		<div style="padding:6px 0px 0px 0px;color:#FFFF00;">Mật khẩu</div>
		<div>
			<input name="pwd" type="password" style="width:80%; background:#D1F3F8; border:1px #7CC6DE solid; padding:3px 2px;margin:3px 0 0 0;" />
			<a href="#2"><img src="http://{{$app.domain.img}}/helpmuacoin.gif" alt="" /></a>
			{{if is_error('pwd')}}
			<div style="color:red">{{message name="pwd"}}</div>
			{{/if}}
		</div>
		<div style="padding:6px 0px 0px 0px;color:#FFFF00;">Gõ lại mật khẩu</div>
		<div>
			<input name="pwd2" type="password" style="width:80%; background:#D1F3F8; border:1px #7CC6DE solid; padding:3px 2px;margin:3px 0 0 0;" />
		</div>
		<div style="padding:6px 0px 0px 0px;color:#FFFF00;">Email</div>
		<div>
			<input name="email" type="text" style="width:80%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:3px 0 0 0;" value="{{$app.email|escape}}" />
			<a href="#3"><img src="http://{{$app.domain.img}}/helpmuacoin.gif" alt="" /></a>
			{{if is_error('email')}}
			<div style="color:red">{{message name="email"}}</div>
			{{/if}}
		</div>
		<div style="padding:6px 0px 0px 0px;color:#FFFF00;">Số điện thoại</div>
		<div>
			<input name="tel" type="text" style="width:80%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:3px 0 0px 0;" value="{{$app.tel|escape}}" />
			<a href="#4"><img src="http://{{$app.domain.img}}/helpmuacoin.gif" alt="" /></a>
			{{if is_error('tel')}}
			<div style="color:red">{{message name="tel"}}</div>
			{{/if}}
			{{if $app.code}}
			<div style="color:red">Bạn phải đăng ký bằng số điện thoại nhận lời mời để được quà tặng</div>
			{{/if}}
		</div>
		<div style="padding:6px 0px 0px 0px;">
			<input name="accept" type="checkbox" value="1" checked="checked" />Tôi đã đọc và đồng ý với <a href="{{"/login/policy.php"|cnvgw}}" style="color:#FF33CC;">Điều khoản sử dụng</a> của Linh Triều Bình Ca
			{{if is_error('accept')}}
			<div style="color:red">{{message name="accept"}}</div>
			{{/if}}
		</div>
		<div style="text-align:center; padding:10px 0px;">
			<input name="btn" type="submit" value="Đăng ký" style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#51111E;" />
		</div>
	</form>
	</div>
<div style="padding:10px 5px; margin-bottom:5px; background:#333333; font-size:x-small;">
	<p><b style="color:#00ffff;">Tên đăng nhập đúng phải đạt những yêu cầu sau</b><a name="1"></a><br/>
	&nbsp;&nbsp;&nbsp;- Không trùng với tên đăng nhập đã có.<br/>
	&nbsp;&nbsp;&nbsp;- Độ dài từ 4-16 ký tự<br/>
	&nbsp;&nbsp;&nbsp;- Không sử dụng tiếng Việt có dấu<br/>
	&nbsp;&nbsp;&nbsp;- Không sử dụng các ký tự đặc biệt ngoài những ký tự bao gồm các chữ cái thường từ a-z, 0-9 và dấu shift trừ "_"<br/>
	</p>
	
	<p><b style="color:#00ffff;">Mật khẩu đúng phải đạt những yêu cầu sau</b><a name="2"></a><br/>
	&nbsp;&nbsp;&nbsp;- Độ dài từ 4-16 ký tự<br/>
	&nbsp;&nbsp;&nbsp;- Không sử dụng tiếng Việt có dấu<br/>
	&nbsp;&nbsp;&nbsp;- Ký tự đầu tiên phải là 1 trong số chữ cái từ a-z
	&nbsp;&nbsp;&nbsp;- Không sử dụng các ký tự đặc biệt ngoài những ký tự bao gồm các chữ cái thường từ a-z, 0-9 và dấu shift trừ "_"<br/></p>	<p><b style="color:#00ffff;">Email đúng phải đạt những yêu cầu sau</b><a name="3"></a><br/>
	&nbsp;&nbsp;&nbsp;- Không được trùng với email đã có<br/>
	&nbsp;&nbsp;&nbsp;- Những email có định dạng sau không được chấp nhận<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Abc.example.com (thiếu ký tự @)<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* A@b@c@example.com (Sử dụng nhiều hơn 1 ký tự @)<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* ()[]\;:,<>@example.com (Sử dụng các ký tự đặc biệt trước @)<br/>
	&nbsp;&nbsp;&nbsp;- Được phép sử dụng 37 ký tự bao gồm các chữ cái thường từ a-z, 0-9 và dấu shift trừ "_"<br/>
	&nbsp;&nbsp;&nbsp;- Địa chỉ email phải chính xác để sử dụng cho việc kích hoạt tài khoản<br/></p>	<p><b style="color:#00ffff;">Số điện thoại đúng phải đạt những yêu cầu sau</b><a name="4"></a><br/>
	&nbsp;&nbsp;&nbsp;- Không được trùng với số điện thoại đã có<br/>
	&nbsp;&nbsp;&nbsp;- Độ dài số điện thoại phải là 10 ký tự (đối với đầu số 09) và 11 ký tự (đối với các đầu số 01)<br/>
	&nbsp;&nbsp;&nbsp;- Chỉ được sử dụng các chữ số từ 0-9<br/>
	&nbsp;&nbsp;&nbsp;- Phải bắt đầu bằng các đầu số: 09, 012, 016, 018, 019<br/></p>
{{/if}}

	<div style="text-align:center;"><a href="{{"/login/forgot.php"|cnvgw}}">Quên mật khẩu</a> | <a href="{{"/login/index.php"|cnvgw}}">Đăng nhập</a></div>
	<div style="text-align:center;">{{include file="parts/emoji_vn.tpl" id=2}}<a href="{{"/"|cnvgw}}" accesskey="1">Trang chủ</a></div>
</div>
</body>
</html>
