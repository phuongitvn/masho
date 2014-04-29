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
<title>Linh Triều Bình Ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000; color:#ffffff;">Xác nhận {{if $form.res == 2}}đồng minh{{elseif $form.res == 3 }}từ chối{{elseif $form.res == 4 }}ngừng mời{{elseif $form.res == 5 }}hủy làm đồng minh{{/if}}</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
{{if $app.maxFriend == 1}} Số lượng đồng minh đến giới hạn trên <br />
 Nếu tăng level thì có thể tăng số lượng đồng minh<br />{{else}}{{if $form.res == "2"}}Bạn vừa trở thành đồng minh với Quân đoàn <span style="color:#ff0000;">{{$app.profile.handle}}{{include file="parts/emoji.tpl" id=19}}</span>{{elseif $form.res == "3"}}Bạn đã từ chối lời mời đồng minh của Quân đoàn <span style="color:#0000ff;">{{$app.profile.handle}}{{include file="parts/emoji.tpl" id=20}}</span>{{elseif $form.res == "4"}}Bạn vừa hủy bỏ lời mời làm đồng minh với quân đoàn<span style="color:#0000ff;"> {{$app.profile.handle}}{{include file="parts/emoji.tpl" id=20}}</span>{{elseif $form.res == "5"}}Bạn đã hủy làm đồng minh với Quân đoàn<span style="color:#0000ff;"> {{$app.profile.handle}}{{include file="parts/emoji.tpl" id=20}}</span>{{/if}}
<br />
{{/if}}

<div style="text-align:center;">
<a href="{{"/my/friend/list/"|cnvgw}}"> Danh sách đồng minh</a>
</div>

<div style="text-align:left;">
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</div>
</body>
</html>
