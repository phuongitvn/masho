<?php /* Smarty version 2.6.26, created on 2013-11-13 23:19:51
         compiled from quest/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'quest/detail.tpl', 56, false),array('modifier', 'cnvgw', 'quest/detail.tpl', 56, false),)), $this); ?>
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
;"><span style="color:#ffffff;">Chiến trường <?php echo $this->_tpl_vars['app']['stage']; ?>
 (<?php echo $this->_tpl_vars['app']['title']; ?>
)</span></div>

<?php if ($this->_tpl_vars['app']['tut_num'] <= 3 || $this->_tpl_vars['app']['tut_num'] == 5 || $this->_tpl_vars['app']['tut_num'] == 10): ?>
<div style="background-color:#000049;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['tut_num'] == 1): ?>
Trạng thái đó!<span style="color:#ff0000;">Tỉ lệ đạt được</span> là 10%. năng lượng đã tiêu hao sẽ khôi phục mỗi lần 1/3 <span style="color:#ffff00;"></span>
<?php elseif ($this->_tpl_vars['app']['tut_num'] == 2): ?>
Hãy hướng tới mục tiêu là 100% trong trạng thái đó. A chỉ 1 lần nữa thôi quân năng sẽ tăng! <span style="color:#ffff00;"></span>Ôi...hồi hộp quá!
<?php elseif ($this->_tpl_vars['app']['tut_num'] == 3): ?>
Xin chúc mừng <span style="color:#ff0000;">Quân đoàn</span><span style="color:#ff0000;"> Level mỗi card đã tăng lên</span><span style="color:#ff0000;"></span>Lên trình thì <span style="color:#ff0000;">Năng lượng</span>cũng tăng lên, ngoài ra còn hồi phục hoàn toàn nữa Đang từng bước tiến lên
<?php elseif ($this->_tpl_vars['app']['tut_num'] == 5): ?>
Đã tìm thấy báu vật rồi! Xem đó là báu vật gì nào Nếu có được 5 báu vật cùng 1 <span style="color:#ffff00;">gói thì sẽ được 1 gói báu vật đấy</span>!
<?php endif; ?>
</span></td></tr>
</table>
</div>
<?php endif; ?>

<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;border-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;border-style:solid;"><span style="color:#000000;"><?php echo $this->_tpl_vars['app']['disp']['name']; ?>
</span></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<?php if (isset ( $this->_tpl_vars['app']['getTr'] )): ?>
<div style="text-align:center;">
<div>
<embed src="/img/swf/itemget.swf" quality="high" bgcolor="#000000" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
<div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/tr_get<?php echo $this->_tpl_vars['app']['getTr']['tr_seriesid']; ?>
.gif" width="90" height="30" /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/treasure/<?php echo $this->_tpl_vars['app']['getTr']['treasureid']; ?>
.gif" width="50" height="50" />
</div>
<div>
<?php if (isset ( $this->_tpl_vars['app']['comp']['itemid'] )): ?>
Có được báu vật <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/treasure/?tid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['getTr']['tr_seriesid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['getTr']['tr_seriesid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&q=") : smarty_modifier_cat($_tmp, "&q=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['getTr']['name']; ?>
</a>Hoàn thành Gói <?php echo $this->_tpl_vars['app']['getTr']['seriesname']; ?>

<?php else: ?>
Gói <?php echo $this->_tpl_vars['app']['getTr']['seriesname']; ?>
<br />
&nbsp;<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/treasure/?tid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['getTr']['tr_seriesid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['getTr']['tr_seriesid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&q=") : smarty_modifier_cat($_tmp, "&q=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['getTr']['name']; ?>
</a>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
</div>
<?php if (isset ( $this->_tpl_vars['app']['comp']['itemid'] )): ?>
<div style="text-align:center; background-color:#ff9900;border-color:#ff9900;border-style:solid;"><span style="color:#000000;">Có được món đồ</span></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<table border="0" cellspacing="0" cellpadding="0" align="center"><tr>
<td width="90" align="center" colspan="2"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/tr_comp.gif" width="90" height="30" /></td></tr>
<tr>
<td width="55" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['app']['comp']['itemid']; ?>
.gif" width="50" height="50" /></td>
<td valign="top"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?act=item_confirm&num=1&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['comp']['itemid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['comp']['itemid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&q=") : smarty_modifier_cat($_tmp, "&q=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><span style="font-size:x-small;"><?php echo $this->_tpl_vars['app']['comp']['name']; ?>
</span></a><br />
<span style="font-size:x-small;"><?php echo $this->_tpl_vars['app']['comp']['expla']; ?>
<br />
<?php if ($this->_tpl_vars['app']['comp']['kbn'] == 1 || $this->_tpl_vars['app']['comp']['kbn'] == 2): ?>
Công <?php echo $this->_tpl_vars['app']['comp']['offense']; ?>
<br />
Thủ <?php echo $this->_tpl_vars['app']['comp']['defense']; ?>
<?php endif; ?></span></td></tr></table>
<?php endif; ?>
<div style="background-color:#66cccc;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['app']['getItem'] )): ?>
<div style="text-align:center">
<div>
<embed src="/img/swf/itemget.swf" quality="high" bgcolor="#000000" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
<div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['app']['getItem']['itemid']; ?>
.gif" width="50" height="50" />
<span style="font-size:x-small;">
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/confirm.php?num=1&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['getItem']['itemid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['getItem']['itemid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&q=") : smarty_modifier_cat($_tmp, "&q=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['q'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['getItem']['name']; ?>
</a>
</span>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['app']['broken']): ?>
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ff9900;">Món đồ đã hỏng</div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<?php $_from = $this->_tpl_vars['app']['broken']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center"><tr valign="top">
<td width="80" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['item']['itemid']; ?>
.gif" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['item']['kbn'] == 1): ?>Vũ khí<?php elseif ($this->_tpl_vars['item']['kbn'] == 2): ?>Đồ phòng thủ<?php endif; ?>: <?php echo $this->_tpl_vars['item']['name']; ?>
<br />
<?php if ($this->_tpl_vars['item']['kbn'] == 1 || $this->_tpl_vars['item']['kbn'] == 2): ?>Tính năng: Công +<?php echo $this->_tpl_vars['item']['offense']; ?>
 Thủ +<?php echo $this->_tpl_vars['item']['defense']; ?>
<br /><?php endif; ?>
<?php if ($this->_tpl_vars['item']['money'] == 0 && $this->_tpl_vars['item']['coin'] == 0): ?>
<span style="color:#ff0000;">Đồ không bán</span><br />
<?php if ($this->_tpl_vars['item']['questname'] > 0): ?>
Thử thách [<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/detail.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['questid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['questid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><span style="color:#ffff00;"><?php echo $this->_tpl_vars['item']['questname']; ?>
</span></a>]
<?php endif; ?>
<?php elseif ($this->_tpl_vars['item']['coin'] == 0): ?>
<?php if ($this->_tpl_vars['item']['num'] > 0): ?>
Giá: <?php echo $this->_tpl_vars['item']['money']; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
Đang có: <?php echo $this->_tpl_vars['item']['has']; ?>
<br />
Vàng: <?php echo $this->_tpl_vars['item']['own']; ?>
 &raquo;
<?php if (isset ( $this->_tpl_vars['item']['after'] )): ?>
<span style="color:#ff0000;"><?php echo $this->_tpl_vars['item']['after']; ?>
</span><br />
<form action="<?php echo ((is_array($_tmp="/item/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="POST">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/needitem.tpl", 'smarty_include_vars' => array('max' => $this->_tpl_vars['item']['max'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="act" value="item_confirm">
<input type="hidden" name="q" value="<?php echo $this->_tpl_vars['app']['q']; ?>
">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['itemid']; ?>
" />
<input type="submit" value="Mua" />
</form>
<?php else: ?>
<span style="color:#ff0000;">Không đủ Vàng!</span><br />
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
</span></td></tr></table>
<?php endforeach; endif; unset($_from); ?>

<div style="background-color:#ff9900;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<?php endif; ?>



<?php if (isset ( $this->_tpl_vars['app']['masho'] )): ?>
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp="/boss/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/masho_app.gif" width="200" height="60" /><br />Yêu tướng xuất hiện </a></div>
<?php endif; ?>

<?php if (! isset ( $this->_tpl_vars['app']['getItem'] ) && ! isset ( $this->_tpl_vars['app']['getTr'] )): ?>
<div>
<embed src="/img/swf/loading<?php echo $this->_tpl_vars['app']['st_ran']; ?>
.swf" quality="high" bgcolor="#000000" allowScriptAccess="sameDomain" width="100%" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</div>
<?php endif; ?>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="100" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/a/<?php if ($this->_tpl_vars['app']['done'] == 1): ?>8<?php else: ?><?php echo $this->_tpl_vars['app']['aImg']; ?>
<?php endif; ?>.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['mode'] != 'disp'): ?>
<span style="text-decoration:blink;">Thử thách thành công</span>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<span style="color:#00ffff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 33)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Tỉ lệ thành công: <?php if ($this->_tpl_vars['app']['done'] == 1): ?>100<?php else: ?><?php echo $this->_tpl_vars['app']['disp']['aRate']; ?>
<?php endif; ?>%<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['ar'] == 10): ?>
<span style="text-decoration:blink;">Hoàn thành thử thách!</span>
<?php else: ?>
<?php if ($this->_tpl_vars['app']['tut_num'] == 5): ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/detail.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5"><?php if ($this->_tpl_vars['app']['mode'] == 'disp'): ?>Chinh phục Thử thách<?php else: ?>Chinh phục Thử thách<?php endif; ?></a><?php endif; ?><?php endif; ?>
</span></td></tr></table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<?php if ($this->_tpl_vars['app']['ar'] == 1): ?>
<div style="background-color:#000066;">
<table border="0" width="98%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="70"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/tut.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;"><?php echo $this->_tpl_vars['app_ne']['word']['expla_l']; ?>
</span></td></tr></table>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php else: ?>
<!--2nd-->
<?php if ($this->_tpl_vars['app']['mode'] != 'disp'): ?>
<div style="background-color:#000066;">
<table border="0" width="98%" cellspacing="0" cellpadding="0">
<tr valign="top"><td><span style="font-size:x-small;"><?php echo $this->_tpl_vars['app']['disp']['expla_s']; ?>
</span></td></tr></table>
</div>
<?php endif; ?>
<!--2nd-->
<?php if (isset ( $this->_tpl_vars['app']['scn'] )): ?>
<div style="text-align:center;background-color:#000066;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/scn/<?php echo $this->_tpl_vars['app']['scn']; ?>
.gif" width="240" height="45" />
</div>
<?php endif; ?>
<?php endif; ?>

<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['sub']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="background-color:#993366;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 32)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Điểm kinh nghiệm: <?php echo $this->_tpl_vars['app']['profile']['exp']; ?>
 &raquo; <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['disp']['exp']; ?>
</span>/<?php echo $this->_tpl_vars['app']['nextExp']; ?>
 (Cần <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['diffExp']; ?>
</span>)<br />
&nbsp;<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/e/<?php echo $this->_tpl_vars['app']['eImg']; ?>
.gif" width="160" height="16" /><br />
<span style="color:#ffff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Vàng: <?php if ($this->_tpl_vars['form']['orgM'] == ""): ?><?php echo $this->_tpl_vars['app']['profile']['money']; ?>
<?php else: ?><?php echo $this->_tpl_vars['form']['orgM']; ?>
<?php endif; ?> &raquo; <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['disp']['money']; ?>
</span><br />
<span style="color:#ff33cc;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 19)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>Năng lượng: <?php if ($this->_tpl_vars['app']['profile']['genki'] != $this->_tpl_vars['app']['disp']['genki']): ?><?php if ($this->_tpl_vars['form']['ex_genki'] == ""): ?><?php echo $this->_tpl_vars['app']['profile']['genki']; ?>
<?php else: ?><?php echo $this->_tpl_vars['form']['ex_genki']; ?>
<?php endif; ?> &raquo; <?php endif; ?>
<span style="color:#ff0000;"><?php echo $this->_tpl_vars['app']['disp']['genki']; ?>
</span><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
</div>

<?php if ($this->_tpl_vars['app']['tut_num'] > 17): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<?php if ($this->_tpl_vars['app']['profile']['stage'] > 1): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/quest/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['cstage']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['cstage'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Về Thử thách</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp="/quest/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"> Về Thử thách</a>
<?php endif; ?>
</div>

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

</div>
</body>
</html>