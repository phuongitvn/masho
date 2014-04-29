<?php /* Smarty version 2.6.26, created on 2013-11-13 23:26:39
         compiled from card/pcomplist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'card/pcomplist.tpl', 31, false),array('modifier', 'cat', 'card/pcomplist.tpl', 109, false),array('function', 'cycle', 'card/pcomplist.tpl', 101, false),)), $this); ?>
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
<div style="background-color:#33ff00;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Kết hợp Card </div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<?php if ($this->_tpl_vars['app']['cnt'] == 0): ?>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
Hình như không có card trong kho Card! Ngay bây giờ hãy thử  vận may với <a href="<?php echo ((is_array($_tmp="/gacha/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Cửa hàng may mắn</a> nhé!</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php elseif ($this->_tpl_vars['app']['okNum'] == 0): ?>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
 Bạn không có Card nào có thể sử dụng để kết hợp. Hãy thử vận may với <a href="<?php echo ((is_array($_tmp="/gacha/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" >Cửa hàng may mắn</a> nhé!</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">Điểm kỹ năng | <a href="<?php echo ((is_array($_tmp="/card/complist.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Level đặc năng </a><!-- | <a href="<?php echo ((is_array($_tmp="/card/del/mul.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Bán Card</a>--></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php else: ?>

<div style="text-align:center">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">Điểm kỹ năng | <a href="<?php echo ((is_array($_tmp="/card/complist.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Level đặc năng</a><!-- | <a href="<?php echo ((is_array($_tmp="/card/del/mul.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Bán Card</a>--></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['st'] == "" || $this->_tpl_vars['app']['st'] == 'ork'): ?>Độ hiếm / <a href="<?php echo ((is_array($_tmp="/card/pcomplist.php?st=lv")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Level </a> / <a href="<?php echo ((is_array($_tmp="/card/pcomplist.php?st=rb")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tên</a>
<?php elseif ($this->_tpl_vars['app']['st'] == 'rb'): ?>
<a href="<?php echo ((is_array($_tmp="/card/pcomplist.php?st=ork")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Độ hiếm </a> / <a href="<?php echo ((is_array($_tmp="/card/pcomplist.php?st=lv")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Level </a> / Tên 
<?php elseif ($this->_tpl_vars['app']['st'] == 'lv'): ?>
<a href="<?php echo ((is_array($_tmp="/card/pcomplist.php?st=ork")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Độ hiếm</a> / Level  / <a href="<?php echo ((is_array($_tmp="/card/pcomplist.php?st=rb")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tên</a>
<?php endif; ?>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#005128;">
<?php if ($this->_tpl_vars['app']['pGcnt'] == 0 && $this->_tpl_vars['app']['pScnt'] == 0): ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">Tượng mèo vàng giúp kết hợp những Card cùng tên nhưng khác độ hiếm với <span style="color:#ffff00;"> Xác xuất thành công 100%!</span><br />
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 72)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/?unit=2&kbn=4&order=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mua ngay!</a>
</span></td></tr></table>
<?php else: ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/161.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<?php if ($this->_tpl_vars['app']['pGcnt'] > 0): ?>Bạn đang có <span style="color:#ff0000;"><?php echo $this->_tpl_vars['app']['pGcnt']; ?>
</span> tượng mèo vàng  <br /><?php endif; ?>Sử dụng để kết hợp Card không cùng cấp độ với <span style="color:#ff0000;">Xác suất thành công 100%!</span>
<?php if ($this->_tpl_vars['app']['pGcnt'] == 0): ?><br /><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 72)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/?act=item_confirm&num=1&id=161")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mua ngay!</a><?php endif; ?>
</span></td></tr></table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/162.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;color:#ffffff;">
<?php if ($this->_tpl_vars['app']['pScnt'] > 0): ?>Bạn đang có <span style="color:#ff0000;"><?php echo $this->_tpl_vars['app']['pScnt']; ?>
</span> tượng mèo bạc <br /><?php endif; ?>
Sử dụng để kết hợp Card với <span style="color:#ff0000;">xác suất thành công 100%!</span>
<?php if ($this->_tpl_vars['app']['pScnt'] == 0): ?><br /><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 72)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/?act=item_confirm&num=1&id=162")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mua ngay!</a><?php endif; ?>
</span></td></tr></table>
<?php endif; ?>
</div>
<?php if ($this->_tpl_vars['app']['pGcnt'] == 0): ?><div style="text-align:right"><a href="<?php echo ((is_array($_tmp="/qa/detail.php?id=142")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tìm hiểu về tượng mèo</a></div><?php endif; ?>

<?php if ($this->_tpl_vars['app']['pGcnt'] > 0): ?><span style="color:#ffff00;text-decoration:blink;">Tượng mèo vàng giúp kết hợp được cả những Card cùng tên nhưng khác độ hiếm với xác suất thành công 100%</span><br /><?php endif; ?>
Bạn có  <?php if ($this->_tpl_vars['app']['pGcnt'] > 0): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['okNum']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['okNum']; ?>
<?php endif; ?> Card có thể sử dụng để kết hợp <br />
<div style="text-align:right"><a href="<?php echo ((is_array($_tmp="/qa/detail.php?id=43")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tìm hiểu về kết hợp Card</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['app']['list']): ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['st'] == "" || $this->_tpl_vars['app']['st'] == 'ork'): ?><div style="text-align:center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager2.tpl", 'smarty_include_vars' => array('url' => "/card/pcomplist.php?st=ork")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php elseif ($this->_tpl_vars['app']['st'] == 'rb'): ?><div style="text-align:center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager2.tpl", 'smarty_include_vars' => array('url' => "/card/pcomplist.php?st=rb")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php elseif ($this->_tpl_vars['app']['st'] == 'lv'): ?><div style="text-align:center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager2.tpl", 'smarty_include_vars' => array('url' => "/card/pcomplist.php?st=lv")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<?php $_from = $this->_tpl_vars['app']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmp'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmp']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['cmp']['iteration']++;
?>
<div style="background-color:<?php echo smarty_function_cycle(array('name' => 'cyc','values' => "#000000;,#333333;"), $this);?>
">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="90" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['bushoid']; ?>
_m.jpg" width="40" height="55" /></td>
<td><span style="font-size:x-small;">
<?php echo $this->_tpl_vars['item']['name']; ?>
(<?php echo $this->_tpl_vars['item']['rank']; ?>
)<br />
<span style="color:#ff0000;">Lv </span><?php echo $this->_tpl_vars['item']['level']; ?>
 <span style="color:#00ff00;">Công </span><?php echo $this->_tpl_vars['item']['offense']; ?>
<br />
<span style="color:#00ff00;">Thủ  </span><?php echo $this->_tpl_vars['item']['defense']; ?>
 <span style="color:#00ff00;">Binh  </span><?php echo $this->_tpl_vars['item']['follower']; ?>
<br />
<span style="color:#0000ff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 68)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/card/pcompose.php?seq=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['cardseq']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['cardseq'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chọn làm Card đích</a><br />
</span></td></tr></table>
</div>
<?php endforeach; endif; unset($_from); ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><?php if ($this->_tpl_vars['app']['st'] == "" || $this->_tpl_vars['app']['st'] == 'ork'): ?>
<div style="text-align:center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager2.tpl", 'smarty_include_vars' => array('url' => "/card/pcomplist.php?st=ork")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><?php elseif ($this->_tpl_vars['app']['st'] == 'rb'): ?>
<div style="text-align:center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager2.tpl", 'smarty_include_vars' => array('url' => "/card/pcomplist.php?st=rb")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php elseif ($this->_tpl_vars['app']['st'] == 'lv'): ?>
<div style="text-align:center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager2.tpl", 'smarty_include_vars' => array('url' => "/card/pcomplist.php?st=lv")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endif; ?>

<!-- toTop -->
<div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Lên đầu trang</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 63)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Cỗ bài: <a href="<?php echo ((is_array($_tmp="/card/deck.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">5  </a><br />
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 70)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Kho Card: <a href="<?php echo ((is_array($_tmp="/card/file.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['cnt']; ?>
/36  </a><br />
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Hộp quà: <a href="<?php echo ((is_array($_tmp="/card/pre.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['cntP']; ?>
/9 </a><br />

<!-- footer -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>