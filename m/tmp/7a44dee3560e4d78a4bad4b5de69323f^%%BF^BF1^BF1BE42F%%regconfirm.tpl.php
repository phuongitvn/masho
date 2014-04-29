<?php /* Smarty version 2.6.26, created on 2013-11-13 22:57:46
         compiled from regconfirm.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh Triều Bình Ca</title>
<style type="text/css">
<?php echo '
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
'; ?>

</style>
</head>
<body style="background-color:#000000;color:#ffffff">
<a name="top" id="top"></a>
<div style="font-size:x-small;text-align:left;">
	
<div style="text-align:center; background-color:#000000; color:#ffffff;">
Bạn đã chọn <span style="color:#ffff00;">Đội hình <?php if ($this->_tpl_vars['form']['type'] == 'o'): ?>1<?php elseif ($this->_tpl_vars['form']['type'] == 'd'): ?>2<?php elseif ($this->_tpl_vars['form']['type'] == 'b'): ?>3<?php endif; ?></span>
</div>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Hãy nhìn xuống phía dưới và chiêm ngưỡng quân đoàn của bạn nhé !
</span>
</td></tr>
</table></div>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">

<form action="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/reg.php" method="POST">
<input type="hidden" name="act" value="regcomplete" />
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['form']['type']; ?>
" />
<input type="hidden" name="ss" value="<?php echo $this->_tpl_vars['app']['ssid']; ?>
" />
<input type="submit" value="OK" />
</form>

<form action="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/reg.php" method="POST">
<input type="hidden" name="act" value="index" />
<input type="submit" value="Làm lại" />
</form>

</div>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['form']['type'] == 'o'): ?>
<div style="text-align:center; background-color:#ff6900; color:#ffffff;">
<?php elseif ($this->_tpl_vars['form']['type'] == 'd'): ?>
<div style="text-align:center; background-color:#3969FF; color:#ffffff;">
<?php elseif ($this->_tpl_vars['form']['type'] == 'b'): ?>
<div style="text-align:center; background-color:#399A6B; color:#ffffff;">
<?php endif; ?>
<span style="color:#ffff00;">Đội hình <?php if ($this->_tpl_vars['form']['type'] == 'o'): ?>1<?php elseif ($this->_tpl_vars['form']['type'] == 'd'): ?>2<?php elseif ($this->_tpl_vars['form']['type'] == 'b'): ?>3<?php endif; ?></span>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#993300; color:#ffffff;">Cách xem card</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />

<span style="color:#ffff00;"></span>Mỗi Card sẽ tương ứng với một linh thú mà bạn sở hữu, nhìn vào Card đó, bạn sẽ thấy được một số đặc điểm nổi bật như sau: <br/><br/><span style="color:#66ff33;"> Độ hiếm của Card</span>: <br/>Trong lá bài, độ hiếm của Card sẽ được thể hiện chủ yếu thông qua 2 đặc điểm: màu sắc và số sao. Có 5 mức thể hiện độ hiếm của Card là <span style="color:#ffff00;">A &gt; B &gt; C &gt; D &gt; E </span> (cấp độ giảm dần)<br/><br/>
<span style="color:#ffff00;"></span><span style="color:#66ff33;">Năng lực cơ bản:</span> thể hiện xác suất được nhận thêm điểm kỹ năng đối với 1 trong 3 năng lực (Công - Thủ - Binh) của Card khi lên cấp. Có 5 mức độ như sau (giảm dần) <span style="color:#ffff00;">A &gt; B &gt; C &gt; D &gt; E</span>.Trong đó: <br/>
<span style="color:#ffff00;">Công:</span> Là sức mạnh tấn công của Card<br/>
<span style="color:#ffff00;">Thủ: </span>Là khả năng phòng thủ trước những đòn tấn công của đối phương<br/>
<span style="color:#ffff00;">Binh:</span> Là số quân binh của mỗi Card<br/>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['card']): ?><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<!-- * -->
<?php $_from = $this->_tpl_vars['app']['card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="100" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['bid']; ?>
_s.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<span style="color:#ffff00;"><?php echo $this->_tpl_vars['item']['name']; ?>
 (<?php echo $this->_tpl_vars['item']['rank']; ?>
)</span><br />
Công <?php echo $this->_tpl_vars['item']['offense']; ?>
 Thủ <?php echo $this->_tpl_vars['item']['defense']; ?>
 Binh <?php echo $this->_tpl_vars['item']['follower']; ?>
<br />
<span style="color:#ffff00;">Đặc năng: <?php echo $this->_tpl_vars['item']['sec_name']; ?>
</span><br />
<?php echo $this->_tpl_vars['item']['sec_expla']; ?>

</span></td></tr></table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<!-- * -->
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<div style="text-align:center;">

<form action="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/reg.php" method="POST">
<input type="hidden" name="act" value="regcomplete" />
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['form']['type']; ?>
" />
<input type="hidden" name="ss" value="<?php echo $this->_tpl_vars['app']['ssid']; ?>
" />
<input type="submit" value="OK" />
</form>

<form action="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/reg.php" method="POST">
<input type="hidden" name="act" value="index" />
<input type="submit" value="Làm lại" />
</form>
</div>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>