<?php /* Smarty version 2.6.26, created on 2013-11-13 23:17:21
         compiled from my/greet/list/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'my/greet/list/index.tpl', 27, false),array('modifier', 'cat', 'my/greet/list/index.tpl', 29, false),array('modifier', 'date_format', 'my/greet/list/index.tpl', 51, false),array('function', 'cycle', 'my/greet/list/index.tpl', 45, false),)), $this); ?>
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
<div style="background-color:#993366;">
<div style="text-align:center;font-size:small;">Thông tin quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
</div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="85" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/img/card/<?php echo $this->_tpl_vars['app']['profile']['prof']; ?>
_p.jpg" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
<a href="<?php echo ((is_array($_tmp="/my/power.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân năng</a><br />
<a href="<?php echo ((is_array($_tmp="/my/friend/list/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đồng minh</a><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/card/wish/?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Card ước</a><br />
<a href="<?php echo ((is_array($_tmp="/my/treasure.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Kho báu</a><br /><a href="<?php echo ((is_array($_tmp="/my/history.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Lịch sử quân đoàn</a><br />Điểm thân thiện (<?php if ($this->_tpl_vars['app']['profile']['friend_pt'] >= 100): ?><span style="color:#ffff00;"><?php else: ?><span style="color:#ff0000;"><?php endif; ?><?php echo $this->_tpl_vars['app']['profile']['friend_pt']; ?>
</span>)<br />
<?php if ($this->_tpl_vars['app']['profile']['friend_pt'] >= 100 || $this->_tpl_vars['app']['rcv'] > 0): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/rcv/index.php?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Hồi phục năng lượng</a><?php else: ?><a href="<?php echo ((is_array($_tmp="/item/?unit=2&order=1&kbn=4")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mua Phở thần công để hồi phục</a>
<?php endif; ?>
<br />
<a href="<?php echo ((is_array($_tmp="/my/profile.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Hồ sơ cá nhân</a><br />
<a href="<?php echo ((is_array($_tmp="/my/invite.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Gửi lời mời</a><br/>
</span></td></tr></table><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><div style="text-align:right;"><a href="<?php echo ((is_array($_tmp="/my/wall.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chia sẻ</a><br/></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br /></div><div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ffcc00; color:#000000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 9)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Lịch sử Chào hỏi<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 9)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" />
</div>
<?php if ($this->_tpl_vars['app']['list']): ?>
<!-- * -->

<?php $_from = $this->_tpl_vars['app']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div style="background-color:<?php echo smarty_function_cycle(array('name' => 'cyc','values' => "#000000;,#333333;"), $this);?>
">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="60" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['prof']; ?>
_s.jpg" alt="" width="60" /></td>
<td><span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"> Quân đoàn <?php echo $this->_tpl_vars['item']['handle']; ?>
</a><br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['upd_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, " %H:%M ngày %d tháng %m") : smarty_modifier_date_format($_tmp, " %H:%M ngày %d tháng %m")); ?>
<br />
<?php echo $this->_tpl_vars['item']['comnt']; ?>
</span></td>
</tr>
</table>
</div>
<!-- * -->
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<span style="color:#ff0000;">Không có Chào hỏi</span>
<?php endif; ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager.tpl", 'smarty_include_vars' => array('url' => "/my/greet/list/")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<!-- footer -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#820000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>