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
<div style="text-align:center; background-color:#820000; color:#ffffff;">{{include file="parts/emoji.tpl" id=10}}Mời đồng minh</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.status == 2}}
Đã là đồng minh với Quân đoàn {{$app.friend.handle}}<br />
{{elseif $app.status == 3}}
Bạn không thể mời Quân đoàn {{$app.friend.handle}} làm đồng minh do lúc trước đã từng từ chối (bị từ chối) lời mời đồng minh với quân đoàn này hoặc đã loại bỏ (bị loại bỏ) ra ngoài danh sách đồng minh
<br />
{{else}}

{{if $app.isFrApply == false}}
Số lượng đồng minh của Quân đoàn {{$app.friend.handle}} đã đạt mức tối đa. Bạn không thể mời thêm được.<br />
{{elseif $app.isApply == false}}
Số lượng đồng minh đã đạt mức tối đa. Bạn không thể mời thêm được. <br />
{{else}}
Bạn vừa gửi lời mời làm đồng minh đến Quân đoàn {{$app.friend.handle}}<br />
{{/if}}
{{/if}}

<div style="text-align:center;">
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />
<a href="{{"/other/?id="|cat:$form.id|cnvgw}}">Quân đoàn {{$app.friend.handle}}</a><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />

{{if $app.nums.rest > 1}}<a href="{{"/other/list.php?md=fr"|cnvgw}}"> Mời đồng minh khác</a>{{else}}<a href="{{"/friend/approve/?mode=send"|cnvgw}}">Danh sách mời đồng minh</a>{{/if}}<br />
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
