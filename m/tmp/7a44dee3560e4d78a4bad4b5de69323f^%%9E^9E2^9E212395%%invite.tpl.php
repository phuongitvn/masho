<?php /* Smarty version 2.6.26, created on 2013-11-13 23:24:01
         compiled from my/invite.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'my/invite.tpl', 21, false),)), $this); ?>
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
<body style="font-family:Tahoma;color:#000000;word-wrap: break-word; background:#000000; color:#FFFFFF;  font-size:x-small"><a name="top" id="top"></a><div style="font-size:x-small;"><div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br /></div><div style="background-color:#820000;;color:#ffffff;text-align:center;">Mời bạn bè cùng tham gia Linh Triều Bình Ca!</div><div style="background-color:#ff0000"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1"></div><div style="background-color:#000049; padding:10px;">Nếu bạn của bạn cũng tham gia Linh Triều Bình Ca, bạn sẽ nhận được quà là 4000 Vàng!!<br/>Hãy mời thật nhiều bạn bè để cùng nhau có những trải nghiệm thú vị và làm gia tăng sức mạnh cho chính quân đoàn của mình nhé!<br/>Người được bạn mời khi đăng kí cũng sẽ được tặng 2000 Vàng.</div><div style="padding:10px 0px 0px 0px;color:#FFFF00;">Số điện thoại người nhận</div>
	<form method="post">
	<input type="hidden" name="ssid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['app']['ssid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<div><input name="tel" type="text" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:5px 0 3px 0;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['app']['tel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></div>
	<?php if ($this->_tpl_vars['app']['err']): ?>
	<div style="color:red"><?php echo ((is_array($_tmp=$this->_tpl_vars['app']['err'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['app']['message']): ?>
	<div style="font-weight:bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['app']['message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
	<?php endif; ?>

	<div style="text-align:center; padding:10px 0px;"><input name="btn" type="submit" value="Mời bạn" style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#51111E;" /></div>
	</form>
</div>

<div>
<div style="padding:10px 0px 0px 0px;color:#FFFF00; text-align:center">**Chú ý**</div>
<ul style="margin:0">
<li>Bạn đã mời được bạn mình 1 lần, thì trong 1 tuần bạn sẽ không mời thêm được nữa</li>
<li>Bạn sẽ không mời được những số điện thoại đã là thành viên từ trước đó</li>
<li>Bạn gửi lời mời nhưng bạn của bạn không đăng kí thì bạn sẽ không nhận được Vàng</li>
<li>Bạn được gửi lời mời đến 5 người trong 1 ngày</li>
</ul>
</div>

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