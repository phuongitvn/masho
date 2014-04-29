<?php /* Smarty version 2.6.26, created on 2013-11-13 23:20:39
         compiled from item/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'item/complete.tpl', 63, false),array('modifier', 'cat', 'item/complete.tpl', 66, false),)), $this); ?>
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
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="background-color:#ff9900; text-align:center;">Hoàn thành Mua</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />


Bạn đã mua <?php echo $this->_tpl_vars['app']['item']['name']; ?>
!<br /><br />
<?php if ($this->_tpl_vars['app']['payid'] == ""): ?>
<?php if ($this->_tpl_vars['app']['item']['money'] > 0): ?>
Vàng: <?php echo $this->_tpl_vars['form']['orgMoney']; ?>
 &raquo; <span style="color:#ff0000;"><?php echo $this->_tpl_vars['form']['Money']; ?>
</span><br/>
<?php else: ?>
Ngọc: <?php echo $this->_tpl_vars['form']['orgMoney']; ?>
 &raquo; <span style="color:#ff0000;"><?php echo $this->_tpl_vars['form']['Money']; ?>
</span><br/>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['app']['payid'] == ""): ?>

Đang có: <?php echo $this->_tpl_vars['form']['orgNum']; ?>
 &raquo; <span style="color:#ffff00;"><?php echo $this->_tpl_vars['form']['Num']; ?>
</span><br />
<?php if ($this->_tpl_vars['app']['item']['kbn'] == 4): ?>
Công lực: <?php echo $this->_tpl_vars['form']['orgOff']; ?>
<br />
Thủ lực: <?php echo $this->_tpl_vars['form']['orgDef']; ?>
<br />
<?php else: ?>
Công lực: <?php echo $this->_tpl_vars['form']['orgOff']; ?>
 &raquo; <?php if ($this->_tpl_vars['form']['orgOff'] < $this->_tpl_vars['form']['Off']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['form']['Off']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['form']['Off']; ?>
<?php endif; ?><br />
Thủ lực: <?php echo $this->_tpl_vars['form']['orgDef']; ?>
 &raquo; <?php if ($this->_tpl_vars['form']['orgDef'] < $this->_tpl_vars['form']['Def']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['form']['Def']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['form']['Def']; ?>
<?php endif; ?><br />
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['app']['item']['kbn'] != 9): ?>
Đang có<?php echo $this->_tpl_vars['app']['orgNum']; ?>
 &raquo; <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['Num']; ?>
</span><br />
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['item']['kbn'] == 1): ?>
Công lực: <?php echo $this->_tpl_vars['app']['org']['kbn_off']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['kbn_off'] < $this->_tpl_vars['app']['deck']['offense']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
<?php endif; ?><br />
Thủ lực: <?php echo $this->_tpl_vars['app']['org']['kbn_def']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['kbn_def'] < $this->_tpl_vars['app']['deck']['defense']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
<?php endif; ?><br />
<?php elseif ($this->_tpl_vars['app']['item']['kbn'] == 2): ?>
Công lực: <?php echo $this->_tpl_vars['app']['org']['kbn_off']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['kbn_off'] < $this->_tpl_vars['app']['deck']['offense']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
<?php endif; ?><br />
Thủ lực: <?php echo $this->_tpl_vars['app']['org']['kbn_def']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['kbn_def'] < $this->_tpl_vars['app']['deck']['defense']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
<?php endif; ?><br />
<?php endif; ?>

<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<?php if ($this->_tpl_vars['app']['q'] == ""): ?>
	<?php if ($this->_tpl_vars['app']['payid'] != ""): ?>
	<a href="<?php echo ((is_array($_tmp="/item/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tiếp tục mua đồ</a><br />
	<?php else: ?>	<!--<?php if ($this->_tpl_vars['app']['item']['kbn'] == 9): ?>
			<?php if (isset ( $this->_tpl_vars['app']['qid'] )): ?>
	<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/event/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['qid']['evid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['qid']['evid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "/start.php?id=") : smarty_modifier_cat($_tmp, "/start.php?id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['qid']['questid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['qid']['questid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Về Sự kiện</a>
			<?php else: ?>
	<a href="<?php echo ((is_array($_tmp="/item/?unit=2&order=1&kbn=4")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tiếp tục mua đồ</a>
			<?php endif; ?>
		<?php else: ?>
	<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/item/?unit=2&order=1&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tiếp tục mua đồ</a><br />-->	<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&kbn=") : smarty_modifier_cat($_tmp, "&kbn=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['item']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['item']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tiếp tục mua đồ</a><br />
	<?php endif; ?>
<?php if ($this->_tpl_vars['app']['item']['itemid'] == 115 || $this->_tpl_vars['app']['item']['itemid'] == 139 || $this->_tpl_vars['app']['item']['itemid'] == 140 || $this->_tpl_vars['app']['item']['itemid'] == 141): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/gacha/?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đến Cửa hàng may mắn</a><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php elseif ($this->_tpl_vars['app']['item']['itemid'] == 116): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/rcv/index.php?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Hồi phục năng lượng</a><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php elseif ($this->_tpl_vars['app']['item']['itemid'] == 160): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp="/card/complist.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Hợp nhất đặc năng bằng Tượng thần</a><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php elseif ($this->_tpl_vars['app']['item']['itemid'] == 161 || $this->_tpl_vars['app']['item']['itemid'] == 162): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp="/card/pcomplist.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Sử dụng Tượng mèo để kết hợp Card</a><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endif; ?>
<?php endif; ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['form']['ev'] == ""): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/disp.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&orgM=") : smarty_modifier_cat($_tmp, "&orgM=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['orgMoney']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['orgMoney'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Về Thử thách</a><br />
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/event/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['ev']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['ev'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "/detail.php?id=") : smarty_modifier_cat($_tmp, "/detail.php?id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Về Sự kiện</a><br />
<?php endif; ?>
<?php endif; ?>
</div>

<!-- footer -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff9900;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
</body>
</html>