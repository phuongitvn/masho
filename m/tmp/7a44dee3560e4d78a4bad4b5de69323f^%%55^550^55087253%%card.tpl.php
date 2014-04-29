<?php /* Smarty version 2.6.26, created on 2013-11-13 23:20:00
         compiled from quest/card.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'quest/card.tpl', 83, false),array('modifier', 'cat', 'quest/card.tpl', 106, false),)), $this); ?>
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
<?php if ($this->_tpl_vars['form']['id'] == 'fg' || $this->_tpl_vars['app']['fg'] == 'fg'): ?>
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Chiến đấu</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php else: ?>
<div style="text-align:center;background-color:#<?php echo $this->_tpl_vars['app']['color']['sub']; ?>
;color:#ffffff;">Chiến trường <?php echo $this->_tpl_vars['app']['stage']; ?>
 (<?php echo $this->_tpl_vars['app']['title']; ?>
)</div>
<?php if (isset ( $this->_tpl_vars['app']['masho'] )): ?>
<?php else: ?>
<div style="text-align:center;border-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;border-style:solid;background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;"><?php echo $this->_tpl_vars['app']['disp']['name']; ?>
</div>
<?php endif; ?>
<?php endif; ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<?php if (isset ( $this->_tpl_vars['app']['masho'] ) || $this->_tpl_vars['form']['id'] == 'ms' || $this->_tpl_vars['app']['dotGo'] == 1): ?>
<?php elseif ($this->_tpl_vars['form']['id'] == 'fg'): ?>
<div style="text-align:center;background-color:#820000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php else: ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="middle">
<td width="90" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/a/<?php if ($this->_tpl_vars['app']['done'] == 1): ?>8<?php else: ?><?php echo $this->_tpl_vars['app']['aImg']; ?>
<?php endif; ?>.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['disp']['aRate'] > 0): ?>
<div style="font-size:x-small;"><span style="text-decoration:blink;">Hoàn thành thử thách </span></div>
<span style="color:#00ffff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 33)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Tỉ lệ hoàn thành: <?php if ($this->_tpl_vars['app']['done'] == 1): ?>100<?php else: ?><?php echo $this->_tpl_vars['app']['disp']['aRate']; ?>
<?php endif; ?>%
<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php elseif ($this->_tpl_vars['app']['done'] == 1): ?>
<div style="font-size:x-small;"><span style="text-decoration:blink;">Hoàn thành thử thách </span></div>
<span style="color:#00ffff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 33)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Tỉ lệ hoàn thành: 100%<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endif; ?>
</span></td></tr></table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="text-align:center;background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['app']['masho'] ) || $this->_tpl_vars['form']['id'] == 'ms' || $this->_tpl_vars['app']['dotGo'] == 1): ?>
<?php else: ?>
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
<td><span style="font-size:x-small;"><span style="color:#00ff00;"><?php if ($this->_tpl_vars['item'] == 'o'): ?>Công<?php elseif ($this->_tpl_vars['item'] == 'd'): ?>Thủ<?php elseif ($this->_tpl_vars['item'] == 'f'): ?>Binh<?php endif; ?></span> +1</span></td>
<?php if ($this->_foreach['rfp']['iteration'] % 5 == 0): ?></tr><tr><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</tr></table></div>
<?php if ($this->_tpl_vars['app']['org']['fol'] > 0): ?>
Quân năng quân đoàn tăng đến cấp độ <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['profile']['level']; ?>
</span> <br />
Các Card trên cỗ bài đã được nhận điểm kĩ năng !<br />
Binh: <?php echo $this->_tpl_vars['app']['org']['fol']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['fol'] < $this->_tpl_vars['app']['deck']['follower']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['follower']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['follower']; ?>
<?php endif; ?><br />
Công lực: <?php echo $this->_tpl_vars['app']['org']['off']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['off'] < $this->_tpl_vars['app']['deck']['offense']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
<?php endif; ?><br />
Thủ lực: <?php echo $this->_tpl_vars['app']['org']['def']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['org']['def'] < $this->_tpl_vars['app']['deck']['defense']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
<?php endif; ?><br />
<?php if ($this->_tpl_vars['app']['org']['off'] == $this->_tpl_vars['app']['deck']['offense'] || $this->_tpl_vars['app']['org']['def'] == $this->_tpl_vars['app']['deck']['defense']): ?>
<span style="color:#ff0000;">Mua vũ khí và Đồ phòng thủ thì sức mạnh sẽ tăng!</span><br />
<?php if ($this->_tpl_vars['form']['cl'] != 1): ?>
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp="/item/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mua</a></div>
<?php endif; ?>
<?php endif; ?>
<?php else: ?>
Quân binh: <?php echo $this->_tpl_vars['app']['deck']['follower']; ?>
<br />
Công: <?php echo $this->_tpl_vars['app']['deck']['offense']; ?>
<br />
Thủ: <?php echo $this->_tpl_vars['app']['deck']['defense']; ?>
<br />
<?php endif; ?>
<?php endif; ?>
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
<?php if ($this->_tpl_vars['item']['seq'] > 22): ?><span style="color:#ffff00;">Đánh được yêu tướng, giành được Card!</span><?php else: ?>Lên cấp và giành được Card<?php endif; ?><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />

<?php if ($this->_tpl_vars['form']['cl'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['bushoid']; ?>
.jpg" width="160" height="218" />
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/card/?mode=2&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['bushoid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['bushoid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&seq=") : smarty_modifier_cat($_tmp, "&seq=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['cardseq']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['cardseq'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['bushoid']; ?>
.jpg" width="160" height="218" /></a>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
</div>
<span style="font-size:x-small;text-align:center;">
<span style="color:#ffff00;"><?php echo $this->_tpl_vars['item']['name']; ?>
 (<?php echo $this->_tpl_vars['item']['rank']; ?>
) Lv<?php echo $this->_tpl_vars['item']['level']; ?>
</span><br />
Đặc năng: <?php echo $this->_tpl_vars['item']['sec_name']; ?>
<br />
<?php echo $this->_tpl_vars['item']['sec_expla']; ?>

</span>

<?php if ($this->_tpl_vars['form']['cl'] == 1): ?>
<?php if ($this->_tpl_vars['app']['tbdCnt'] > 0): ?><span style="color:#ff0000;">Kho Card của bạn đã đầy (36). Hãy kết hợp Card, bán hoặc tặng cho đồng minh để có thể lấy thêm Card mới.</span><br /><?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['app']['tbdCnt'] > 0): ?>
<div style="text-align:center;">
<?php if ($this->_tpl_vars['app']['cntF'] >= 36): ?>
<span style="color:#ff0000;">Kho Card của bạn đã đầy (36). Hãy kết hợp Card, bán hoặc tặng cho đồng minh để có thể lấy thêm Card mới.</span><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp="/card/file.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Về Kho Card</a><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/card/set.php?seq=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['cardseq']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['cardseq'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&q=") : smarty_modifier_cat($_tmp, "&q=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chuyển Card đến Kho</a><br />
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/card/del/?seq=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['cardseq']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['cardseq'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&q=") : smarty_modifier_cat($_tmp, "&q=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Bán Card</a>
</div>
<?php else: ?>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['form']['cl'] != 1): ?>
<?php if ($this->_tpl_vars['app']['tbdCnt'] > 0): ?>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<?php if (isset ( $this->_tpl_vars['app']['masho'] )): ?>
<?php if ($this->_tpl_vars['app']['stgEnd'] == 1): ?>
<a href="<?php echo ((is_array($_tmp="/quest/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Về Thử thách</a>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/scn/<?php echo $this->_tpl_vars['app']['scn']; ?>
.gif" width="240" height="45" /><br />
<a href="<?php echo ((is_array($_tmp="/quest/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chiến trường tiếp theo <?php echo $this->_tpl_vars['app']['stageN']; ?>
|</a>
<?php endif; ?>
<?php else: ?>
<!--Lên trình khi chiến đấu-->
<?php if ($this->_tpl_vars['form']['fg'] == 1): ?>
<a href="<?php echo ((is_array($_tmp="/other/list.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Tiếp tục chiến đấu</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/disp.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Chinh phục Thử thách</a>
<?php endif; ?>
<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 70)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/card/file.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Về Kho Card</a>
<?php endif; ?>
</div>
<?php endif; ?>
<?php endif; ?>




<?php if ($this->_tpl_vars['app']['tut_num'] > 17): ?>
<?php if ($this->_tpl_vars['form']['cl'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/next.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&rfp=") : smarty_modifier_cat($_tmp, "&rfp=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['rfp']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['rfp'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&gR=") : smarty_modifier_cat($_tmp, "&gR=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['gR']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['gR'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><span style="font-size:medium;">Tiếp theo</span></a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="20" /><br />
<?php else: ?>
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
<?php endif; ?>
<?php endif; ?>

</div>
</body>
</html>