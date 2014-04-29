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
<div style="text-align:center; background-color:#820000;">Tiếp tục chiến đấu</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />

{{if $form.trid != ""}}
<div style="text-align:center;"><a href="{{"/other/list.php?md=tr&tid="|cat:$form.trid|cnvgw}}" accesskey="5">
{{else}}
<div style="text-align:center;"><a href="{{"/other/list.php"|cnvgw}}" accesskey="5">
{{/if}}
{{include file="parts/emoji.tpl" id=26}}Tiếp tục chiến đấu</a></div>

<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="20" /><br />

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
