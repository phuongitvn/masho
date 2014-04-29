<?php /* Smarty version 2.6.26, created on 2013-11-13 22:57:50
         compiled from my/tutprof.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'my/tutprof.tpl', 56, false),array('modifier', 'cnvgw', 'my/tutprof.tpl', 56, false),)), $this); ?>
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
<div style="font-size:x-small;">
<div style="background-color:#CC0099;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#CC6699;">Chọn quân đoàn trưởng</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['profcard']['prof_gcnt'] > 0): ?>
Mỗi quân đoàn cần có một mãnh tướng được lựa chọn làm quân đoàn trưởng. Một quyết định thông minh sẽ đem lại những chiến thắng bất ngờ nhất. Hãy lựa chọn linh thú xứng đáng để dẫn dắt đoàn quân chiến đấu và vượt qua thử thách nhé !
</span>
<?php else: ?>
Hãy lựa chọn linh thú xứng đáng để dẫn dắt đoàn quân chiến đấu và vượt qua thử thách nhé !<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 62)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Chú ý: Việc lựa chọn quân đoàn trưởng mang tính ngẫu nhiên tuỳ thuộc vào người chơi, trong quá trình chơi bạn hoàn toàn có thể thay thế quân đoàn trưởng của mình bằng những linh thú mạnh mẽ hơn (hoặc đẹp hơn ^^!).<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 76)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>
<?php endif; ?>
</span></td></tr>
</table>
</div>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<br/><span style="color:#ffff00;">Chú ý:</span> Việc lựa chọn quân đoàn trưởng mang tính ngẫu nhiên tuỳ thuộc vào người chơi, trong quá trình chơi bạn hoàn toàn có thể thay thế quân đoàn trưởng của mình bằng những linh thú mạnh mẽ hơn (hoặc đẹp hơn ^^!). <br/>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;">
<?php echo $this->_tpl_vars['app']['m_busho']['name']; ?>
(<?php echo $this->_tpl_vars['app']['m_busho']['rank']; ?>
)<br/>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['profcard']['prof']; ?>
.jpg" width="160" height="218" />
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php echo $this->_tpl_vars['app']['m_busho']['expla']; ?>
<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />

<div style="text-align:center;">
<?php if ($this->_tpl_vars['app']['profcard']['prof_gcnt'] > 0): ?>
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 25)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/profng.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Lựa chọn Linh thú khác</a><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 25)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><br />
 - Bạn còn <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['profcard']['prof_gcnt']; ?>
</span> lần nữa<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/profok.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chọn Card này làm quân đoàn trưởng!</a><br />
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/profok.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chọn Card này làm quân đoàn trưởng!</a><br />
<?php endif; ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
</div>

<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
</body>
</html>