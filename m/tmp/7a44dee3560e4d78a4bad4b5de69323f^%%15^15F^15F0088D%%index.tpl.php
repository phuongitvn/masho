<?php /* Smarty version 2.6.26, created on 2013-11-13 23:19:21
         compiled from quest/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'quest/index.tpl', 42, false),array('modifier', 'cnvgw', 'quest/index.tpl', 42, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>Linh Triều Bình ca</title>
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
<div style="text-align:center;background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Thử thách </div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<?php if (isset ( $this->_tpl_vars['app']['scn'] )): ?>
<div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/scn/<?php echo $this->_tpl_vars['app']['scn']; ?>
.gif" width="240" height="45" />
</div>
<?php endif; ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;color:#ffff00;">Chiến trường <?php echo $this->_tpl_vars['app']['stage']; ?>
 (<?php echo $this->_tpl_vars['app']['title']; ?>
)</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />

<?php if ($this->_tpl_vars['app']['cs'] > 1): ?>
<!-- navi -->
<div style="text-align:center;"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>
<?php if ($this->_tpl_vars['form']['id'] == ""): ?>
<?php if ($this->_tpl_vars['app']['profile']['stage'] == 1): ?>
<?php else: ?>
<td width="80"><span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['pid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['pid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">&laquo; Chiến trường trước</a></span></td><td width="20">|</td>
<td width="80"> </td>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['form']['id'] == 1): ?>
<td width="80"> </td><td width="20">|</td>
<td width="80"><span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['nid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['nid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chiến trường tiếp theo &raquo; </a></span></td>
<?php elseif ($this->_tpl_vars['app']['profile']['stage'] == $this->_tpl_vars['form']['id']): ?>
<td width="80"><span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['pid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['pid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"> &laquo; Chiến trường trước</a></span></td><td width="20">|</td>
<td width="80"> </td>
<?php else: ?>
<td width="80"><span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['pid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['pid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"> &laquo; Chiến trường trước</a></span></td><td width="20">|</td>
<td width="80"><span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['nid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['nid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chiến trường tiếp theo &raquo; </a></span></td>
<?php endif; ?>
<?php endif; ?>
</tr></table></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['app']['masho'] )): ?>
<div style="background-color:#000049;text-align:center;"><a href="<?php echo ((is_array($_tmp="/boss/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/masho_app.gif" width="200" height="60" /><br />
<span style="text-decoration:blink;font-size:medium;">Yêu tướng xuất hiện!</span></a></div>
<?php endif; ?>

<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 32)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Điểm kinh nghiệm: <?php echo $this->_tpl_vars['app']['profile']['exp']; ?>
 (Cần <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['diffExp']; ?>
</span>)<br />
<span style="color:#ffff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Vàng: <?php echo $this->_tpl_vars['app']['profile']['money']; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
<span style="color:#ff33cc;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 19)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Năng lượng: <span style="color:#ff0000;"><?php echo $this->_tpl_vars['app']['profile']['genki']; ?>
</span>/<?php echo $this->_tpl_vars['app']['profile']['max_genki']; ?>
<br />
<?php if ($this->_tpl_vars['app']['profile']['rsv_time_sec'] != NULL): ?> - <span style="color:#ff0000;">Cần <?php if ($this->_tpl_vars['app']['profile']['rsv_time_min'] == 0): ?><?php echo $this->_tpl_vars['app']['profile']['rsv_time_sec']; ?>
 giây <?php else: ?><?php echo $this->_tpl_vars['app']['profile']['rsv_time_min']; ?>
 phút <?php endif; ?>để khôi phục</span><br /><?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<div style="text-align:right;">
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/diary/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['id'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Nhật trình chiến trường</a>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>


<?php if ($this->_tpl_vars['app']['list']): ?>
<!-- * -->
<?php $_from = $this->_tpl_vars['app']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;"><?php echo $this->_tpl_vars['item']['name']; ?>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/a/<?php echo $this->_tpl_vars['item']['aImg']; ?>
.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<span style="color:#00ffff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 33)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span> Tỉ lệ thành công: <?php echo $this->_tpl_vars['item']['archieve']; ?>
%<br />
<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 32)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Điểm kinh nghiệm: + <?php echo $this->_tpl_vars['item']['exp']; ?>
<br />
<span style="color:#ffff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Vàng: +<?php echo $this->_tpl_vars['item']['money']; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
<span style="color:#ff33cc;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 19)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Năng lượng: <span style="color:#ff0000;"><?php echo $this->_tpl_vars['item']['req_genki']; ?>
</span>
</span></td></tr></table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<?php if ($this->_tpl_vars['item']['item1'] > 0): ?>
<span style="color:#00ff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 8)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span> Món đồ cần dùng<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['item']['item1']; ?>
.gif" width="50" height="50" />×<?php echo $this->_tpl_vars['item']['num1']; ?>
 <?php endif; ?>
<?php if ($this->_tpl_vars['item']['item2'] > 0): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['item']['item2']; ?>
.gif" width="50" height="50" /> x <?php echo $this->_tpl_vars['item']['num2']; ?>
 <?php endif; ?>
<?php if ($this->_tpl_vars['item']['item3'] > 0): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['item']['item3']; ?>
.gif" width="50" height="50" /> x <?php echo $this->_tpl_vars['item']['num3']; ?>
<?php endif; ?>
<br />
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/detail.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['questid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['questid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Bắt đầu thử thách</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align: right;"><a href="#top">Lên đầu trang</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

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