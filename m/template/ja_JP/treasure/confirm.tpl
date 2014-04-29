<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Báu Vật|Linh Triều Bình Ca</title>
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
<div style="text-align:center; background-color:#66cccc;color:#000000;">Tặng quà </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="100" style="text-align:center;"><img src="http://{{$app.domain.img}}/treasure/{{$form.tid}}.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">Quà cho Quân đoàn {{$app.profile.handle}}<br />
<span style="color:#ffff00;">Gói {{$app.sr.name}}</span><br/>
{{$app.tr.name}}
</span></td>
</tr>
</table>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><span style="color:#ff0000;">Lưu ý</span></div>
<ol>
<li>Khi một báu vật đã đem tặng thì về cơ bản không thể lấy lại cho dù bạn đã có giao ước tặng báu vật với đồng minh và bị đơn phương hủy bỏ lời hẹn</li>
<li>Những vấn đề phát sinh từ việc tặng Báu vật không thuộc trách nhiệm giải quyết của Công ty cổ phần công nghệ di động R&S. Xin quý khách vui lòng tự dàn xếp</li>
<li>Khi trao đổi báu vật, tuyệt đối nghiêm cấm việc yêu cầu tiền mặt hoặc những thứ tương  đương với tiền mặt như: món đồ, ngọc, vàng... Trường hợp nào vi phạm trên đây sẽ bị xóa thành tích và loại bỏ quyền sử dụng Linh triều Bình ca mà không cần thông báo trước</li>
<li>Trong mọi trường hợp, không được bồi thường hay trả lại báu vật</li>
</ol>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
<form action="http://{{$app.domain.www}}" method="POST">
<input type="hidden" name="act" value="treasure_complete" />
<input type="hidden" name="oid" value="{{$form.oid}}" />
<input type="hidden" name="tid" value="{{$form.tid}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Tặng" />
</form>
</div>

<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#66cccc;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
