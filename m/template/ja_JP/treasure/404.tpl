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
<div style="background-color:#0000ff;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#66cccc;color:#000000;">Báu vật</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />

{{if isset($app.comp)}}
<span style="color:#ff0000;">Nếu đối phương sẽ hoàn thành gói báu vật với báu vật này thì không thể tặng được</span><br />
{{elseif isset($app.fr_st)}}
<span style="color:#ff0000;">Không thể tặng quà cho những quân không phải quân đồng minh </span><br />
{{else}}
<span style="color:#ff0000;">Báu vật này không còn nữa </span>
{{/if}}

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</div>
</body>
</html>
