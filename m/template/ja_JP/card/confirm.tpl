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
<div style="background-color:#993366;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#993366;"> Tặng quà </div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>

<div style="text-align:center;">
{{$app.card.name}} ({{$app.card.rank}})<br />
<img src="http://{{$app.domain.img}}/card/{{$app.card.bushoid}}.jpg" width="160" height="218" /><br />
</div>
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff9900;">{{include file="parts/emoji.tpl" id=55}}</span><span style="color:#ff0000;">Sau khi tặng, năng lực của Card (cấp độ đặc năng, điểm kỹ năng) sẽ giảm về mức thấp nhất</span><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><span style="color:#ff0000;">Lưu ý</span></div>
1. Card đã làm quà tặng thì sẽ không lấy lại được cho dù bạn đã có giao ước đổi Card với đồng minh và bị đơn phương hủy bỏ lời hẹn.<br />
2. Những vấn đề phát sinh từ việc tặng quà không thuộc trách nhiệm giải quyết của Nhà phát hành. Xin quý khách vui lòng tự dàn xếp.<br />
3. Khi trao đổi Card, việc yêu cầu tiền mặt hoặc những thứ tương đương với tiền mặt như: món đồ, ngọc, vàng... bị nghiêm cấm. Trường hợp nào vi phạm trên đây bị phát hiện sẽ bị xóa thành tích và loại bỏ quyền sử dụng Linh Triều Bình Ca mà không cần thông báo trước.<br />
4. Trong mọi trường hợp sẽ không bồi thường hay trả lại Card<br />
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<form action="http://{{$app.domain.www}}" method="POST">
<input type="hidden" name="act" value="card_complete" />
<input type="hidden" name="oid" value="{{$form.oid}}" />
<input type="hidden" name="seq" value="{{$form.seq}}" />
<input type="hidden" name="ssid" value="{{$app.ssid}}" />
<input type="submit" value="Tặng" />
</form>
</div>
<!-- footer -->
<img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://{{$app.domain.img}}/spacer.gif" width="1" height="1" /></div>
{{include file="parts/footer.tpl"}}
</div>
</body>
</html>
