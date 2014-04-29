<?php /* Smarty version 2.6.26, created on 2013-11-13 23:14:34
         compiled from my/tut12.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'my/tut12.tpl', 28, false),array('modifier', 'cat', 'my/tut12.tpl', 74, false),)), $this); ?>
﻿<?php echo '<?xml'; ?>
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
<div style="font-size:x-small;">
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Nếu còn thắc mắc, bạn có thể tham khảo thông tin trong phần <a href="<?php echo ((is_array($_tmp="/qa/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Trợ giúp</a> ở chức năng của quân đoàn. Nhưng trước tiên, hãy tiếp tục thử thách để đánh bại Yêu tướng nhé!
</span></td></tr></table>
</div>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['sub']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;text-align:center;">
Trang riêng</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="84" align="center">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['profile']['prof']; ?>
_p.jpg" width="80" height="109" /><br />
<span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp="/my/greet/list/?cl=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Thông tin quân đoàn </a></span>
</td>
<td><span style="font-size:x-small;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
Quân đoàn trưởng: <?php echo $this->_tpl_vars['app']['card']['name']; ?>
 (<?php echo $this->_tpl_vars['app']['card']['rank']; ?>
)<br />
Quân năng: <?php echo $this->_tpl_vars['app']['profile']['level']; ?>
<br />
Binh lính: <?php echo $this->_tpl_vars['app']['deck']['follower']; ?>
<br />
Điểm kinh nghiệm: <?php echo $this->_tpl_vars['app']['profile']['exp']; ?>
 (Cần <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['diffExp']; ?>
</span>)<br />
Năng lượng: <span style="color:#ff0000;"><?php echo $this->_tpl_vars['app']['profile']['genki']; ?>
</span>/<?php echo $this->_tpl_vars['app']['profile']['max_genki']; ?>
<br />
<?php if ($this->_tpl_vars['app']['profile']['rsv_time_sec'] != NULL): ?>└<span style="color:#ff0000;">Cần <?php if ($this->_tpl_vars['app']['profile']['rsv_time_min'] == 0): ?><?php echo $this->_tpl_vars['app']['profile']['rsv_time_sec']; ?>
 giây<?php else: ?><?php echo $this->_tpl_vars['app']['profile']['rsv_time_min']; ?>
 phút<?php endif; ?> để hồi phục</span><br /><?php endif; ?>
Vàng: <?php echo $this->_tpl_vars['app']['profile']['money']; ?>
 <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
Ngọc: <a href="<?php echo ((is_array($_tmp="/coin/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['profile']['coin']; ?>
</a> <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/ngoc.gif" width="10" height="8" /><br />
Tỷ lệ thắng: <?php echo $this->_tpl_vars['app']['profile']['rate']; ?>
% (Thắng <?php echo $this->_tpl_vars['app']['profile']['win']; ?>
/  Bại <?php echo $this->_tpl_vars['app']['profile']['lose']; ?>
)</span></td></tr>
</table>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#D95F41;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="33%" align="center"><a href="<?php echo ((is_array($_tmp="/card/deck.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/btn_card.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><a href="<?php echo ((is_array($_tmp="/quest/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/btn_quest.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><a href="<?php echo ((is_array($_tmp="/other/list.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/btn_fight.gif" width="69" height="29" /></a></td>
</tr>
</table>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />


<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><span style="size:small; color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Chức năng đoàn quân</span></div>
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/gacha/?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Vé số</a>: Đổi vé số để được thêm nhiều Card<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 27)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Shop</a>: Trang bị quân khí, khôi phục năng lượng...<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#00ffff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 28)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/?md=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân khí</a>: Kiểm soát trang bị binh lực của quân đoàn<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 9)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/my/friend/list/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đồng minh</a>: Liên kết với nhiều đồng minh để tăng sức mạnh quân đoàn<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/my/treasure.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Kho báu</a>: Lưu trữ những vật báu giành được<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#33ff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 12)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/diary/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Nhật trình Chiến trường</a>: Xem lại thông tin những lần thực hiện nhiệm vụ<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#33ff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 31)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/qa/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Trợ giúp</a>: Giải đáp các vấn đề của Linh Triều Bình Ca<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>