<?php /* Smarty version 2.6.26, created on 2013-11-13 23:25:33
         compiled from fight/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'fight/index.tpl', 85, false),array('modifier', 'cat', 'fight/index.tpl', 96, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<style type="text/css">
<?php echo '
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
'; ?>

</style>
<title>Linh triều Bình Ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Màn hình chiến đấu</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<!-- * -->
<table border="0" width="100%" height="" cellspacing="0" cellpadding="0">
<tr>
<td width="90" align="center"><span style="font-size:x-small;">Tấn công</span></td>
<td width="50" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></td>
<td width="90" align="center"><span style="font-size:x-small;">Phòng bị</span></td>
</tr>
<tr>
<td width="90" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/img/card/<?php echo $this->_tpl_vars['app']['my_profile']['prof']; ?>
_s.jpg" alt="" width="80" height="109" /></td>
<td width="50" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></td>
<td width="90" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['www']; ?>
/img/card/<?php echo $this->_tpl_vars['app']['other_profile']['prof']; ?>
_s.jpg" alt="" width="80" height="109" /></td>
</tr>
<tr>
<td width="90" align="center"><span style="font-size:x-small;">Quân đoàn <?php echo $this->_tpl_vars['app']['my_profile']['handle']; ?>
</span></td>
<td width="50" align="center"><span style="font-size:x-small;">VS</span></td>
<td width="90" align="center"><span style="font-size:x-small;">Quân đoàn <?php echo $this->_tpl_vars['app']['other_profile']['handle']; ?>
</span></td>
</tr>
</table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
Quân năng: <?php echo $this->_tpl_vars['app']['my_profile']['level']; ?>
 vs <?php echo $this->_tpl_vars['app']['other_profile']['level']; ?>
<br />
Tỉ lệ thắng: <?php echo $this->_tpl_vars['app']['my_profile']['rate']; ?>
% vs <?php echo $this->_tpl_vars['app']['other_profile']['rate']; ?>
%<br />
Quân binh: <?php echo $this->_tpl_vars['app']['my_deck']['follower']; ?>
<?php if ($this->_tpl_vars['app']['diff']['follower'] > 0): ?> (<span style="color:#ffff00;">+<?php echo $this->_tpl_vars['app']['diff']['follower']; ?>
</span>)<?php endif; ?>  vs <?php echo $this->_tpl_vars['app']['ot_deck']['follower']; ?>
<br />
Công: <?php echo $this->_tpl_vars['app']['my_deck']['offense']; ?>
<?php if ($this->_tpl_vars['app']['diff']['offense'] > 0): ?> (<span style="color:#ffff00;">+<?php echo $this->_tpl_vars['app']['diff']['offense']; ?>
</span>)<?php endif; ?> vs <?php echo $this->_tpl_vars['app']['ot_deck']['offense']; ?>
<br />
Thủ: <?php echo $this->_tpl_vars['app']['my_deck']['defense']; ?>
<?php if ($this->_tpl_vars['app']['diff']['defense'] > 0): ?> (<span style="color:#ffff00;">+<?php echo $this->_tpl_vars['app']['diff']['defense']; ?>
</span>)<?php endif; ?> vs 
<?php echo $this->_tpl_vars['app']['ot_deck']['defense']; ?>

<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['tr']['treasureid'] > 0): ?>
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Báu vật tìm kiếm</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="80" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/treasure/<?php echo $this->_tpl_vars['app']['tr']['treasureid']; ?>
.gif" width="70" height="70" />
</td><td><span style="font-size:x-small;">
Báu vật: <?php echo $this->_tpl_vars['app']['tr']['name']; ?>
<br />
Gói: <?php echo $this->_tpl_vars['app']['sr']['name']; ?>
<br />
</span></td></tr></table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endif; ?><div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Cỗ bài chiến đấu</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><?php if ($this->_tpl_vars['app']['form']['formno'] > 0): ?>
<div style="text-align:center; text-decoration:blink; color:#ffff00; font-weight:bold; font-size:medium">
<?php echo $this->_tpl_vars['app']['form']['name']; ?>
<br/>
<span style="text-decoration:blink;color:#ffff00;font-size:small">Đang triển khai đội hình chiến thuật!!</span></a>
</div>
<?php else: ?>
<span style="color:#ff0000;">Không có đội hình hiệu quả</span><br />
<?php endif; ?>
<div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['1']; ?>
_m.jpg" width="38" /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="2" height="1" />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['2']; ?>
_m.jpg" width="38" /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="2" height="1" />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['3']; ?>
_m.jpg" width="38" /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="2" height="1" />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['4']; ?>
_m.jpg" width="38" /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="2" height="1" />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['5']; ?>
_m.jpg" width="38" />
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<form action="<?php echo ((is_array($_tmp="/card/deck.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="POST">
<input type="hidden" name="oid" value="<?php echo $this->_tpl_vars['form']['id']; ?>
" />
<input type="hidden" name="fid" value="<?php echo $this->_tpl_vars['form']['fid']; ?>
" />
<input type="hidden" name="ts" value="<?php echo $this->_tpl_vars['form']['ts']; ?>
" />
<input type="hidden" name="trid" value="<?php echo $this->_tpl_vars['form']['trid']; ?>
" />
<input type="submit" value="Tổ chức cỗ bài" /><br />
</form>
</div><div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if (isset ( $this->_tpl_vars['app']['trid'] )): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/fight/do.php?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&id=") : smarty_modifier_cat($_tmp, "&id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&fid=") : smarty_modifier_cat($_tmp, "&fid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['fid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['fid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ts=") : smarty_modifier_cat($_tmp, "&ts=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['ts']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['ts'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&trid=") : smarty_modifier_cat($_tmp, "&trid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['trid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['trid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Chiến đấu!</a><br />
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/fight/do.php?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&id=") : smarty_modifier_cat($_tmp, "&id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&fid=") : smarty_modifier_cat($_tmp, "&fid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['fid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['fid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ts=") : smarty_modifier_cat($_tmp, "&ts=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['ts']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['ts'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&trid=") : smarty_modifier_cat($_tmp, "&trid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['trid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['trid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Chiến đấu!</a><br />
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
</div>

<!-- footer -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>