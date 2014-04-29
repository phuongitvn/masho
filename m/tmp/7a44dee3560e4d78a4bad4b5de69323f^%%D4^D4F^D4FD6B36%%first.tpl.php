<?php /* Smarty version 2.6.26, created on 2013-11-13 23:19:02
         compiled from quest/first.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'quest/first.tpl', 40, false),array('modifier', 'cnvgw', 'quest/first.tpl', 40, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Bắt đầu chiến trường mới|Linh Triều Bình ca</title>
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
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['sub']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Thử thách</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;color:#ffff00;">Chiến trường <?php echo $this->_tpl_vars['app']['stage']; ?>
<?php if ($this->_tpl_vars['app']['md'] == 'nosight'): ?> (Toàn thắng)<?php else: ?>(Trận mở màn)<?php endif; ?></div>

<?php if ($this->_tpl_vars['app']['md'] == 'nosight'): ?>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="70" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" />
</td>
<td><span style="font-size:x-small;">
 Đợi một chút trước khi tiếp tục thử thách Quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
 nhé! Đã bỏ công đánh bại Yêu tướng thì hãy dành thời gian xem qua Card Yêu tướng vừa chiêu mộ được nhé!
</span></td></tr>
</table>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/boss/card.php?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><span style="font-size:medium;">Xem Card Yêu tướng </span></a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<div style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/scn/<?php echo $this->_tpl_vars['app']['scn']; ?>
.gif" width="240" height="45" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<?php echo $this->_tpl_vars['app_ne']['word']['first_cmnt']; ?>
<br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/detail.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['questid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['questid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Thực hiện thử thách</a>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endif; ?>

<!-- footer -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
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