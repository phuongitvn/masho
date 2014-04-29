<?php /* Smarty version 2.6.26, created on 2013-11-13 23:14:23
         compiled from my/tut5.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'my/tut5.tpl', 32, false),array('modifier', 'cnvgw', 'my/tut5.tpl', 32, false),)), $this); ?>
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

<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['sub']; ?>
;"><span style="color:#ffffff;">Chiến trường Tây Nguyên (Trận mở màn)</span></div>
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;border-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;border-style:solid;"><span style="color:#000000;">Hỏi Già làng kinh nghiệm diệt voi dữ</span></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['tut_num'] == 5): ?>
Chúc mừng quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
 lên cấp, <span style="color:#ff0000;">giành được điểm kỹ năng và thêm Card.</span> Tiếp theo, hãy thử trải nghiệm cảm giác so tài <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/index.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">chiến đấu</a> với đối thủ khác nhé!
<?php elseif ($this->_tpl_vars['app']['tut_num'] == 10): ?>
Chúc mừng Quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
 đã thắng trận đầu tiên và trở thành quân đoàn thực thụ. Bây giờ thì quân đoàn bạn đã sẵn sàng tinh thần để bước vào cuộc chinh phục Yêu tướng cũng như hành trình thử thách dài phía trước rồi phải không?
<?php endif; ?>
</span></td></tr>
</table>
</div>
<div style="text-align:center;background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
Với mỗi lần tăng quân năng, các Card trong cỗ bài sẽ được cộng ngẫu nhiên 1 điểm kỹ năng vào năng lực Công, Thủ hay Binh. Cùng với đó, quân đoàn của bạn cũng được nhận thêm 1 Card là phần thưởng lên cấp.<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;">
<table border="0" width="200" cellspacing="0" cellpadding="0" align="center"><tr valign="top">
<td width="40"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['1']; ?>
_s.jpg" width="38" /></td>
<td width="40"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['2']; ?>
_s.jpg" width="38" /></td>
<td width="40"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['3']; ?>
_s.jpg" width="38" /></td>
<td width="40"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['4']; ?>
_s.jpg" width="38" /></td>
<td width="40"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['card']['5']; ?>
_s.jpg" width="38" /></td>
</tr><tr>
<?php if ($this->_tpl_vars['app']['rfP']): ?>
<?php $_from = $this->_tpl_vars['app']['rfP']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rfp'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rfp']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['rfp']['iteration']++;
?>
<td><span style="font-size:x-small;"><span style="color:#00ff00;"><?php if ($this->_tpl_vars['item'] == 'o'): ?>Công<?php elseif ($this->_tpl_vars['item'] == 'd'): ?>Thủ<?php elseif ($this->_tpl_vars['item'] == 'f'): ?>Binh<?php endif; ?></span>+1</span></td>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</tr></table></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#33ff00;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Card</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>


<?php if ($this->_tpl_vars['app']['busho']): ?>
<?php $_from = $this->_tpl_vars['app']['busho']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['wish'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wish']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['wish']['iteration']++;
?>
<div style="text-align:center;">
Lên cấp và giành được Card<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['bushoid']; ?>
.jpg" width="160" height="218" />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><?php if ($this->_tpl_vars['app']['tut_num'] == 5): ?><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 63)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/index.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Chiến đấu</a><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 63)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><?php elseif ($this->_tpl_vars['app']['tut_num'] == 10): ?><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/index.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đến trang hành trình</a><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><?php endif; ?></div>

</div>
</body>
</html>