<?php /* Smarty version 2.6.26, created on 2013-11-13 23:30:04
         compiled from other/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'other/index.tpl', 26, false),array('modifier', 'cnvgw', 'other/index.tpl', 26, false),array('modifier', 'date_format', 'other/index.tpl', 85, false),)), $this); ?>
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
<title>Linh Triều Bình Ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#330066;color:#ffffff;"><div style="text-align:center;"><?php if ($this->_tpl_vars['app']['kbn'] == 2 || $this->_tpl_vars['app']['kbn'] == 3): ?>Quân đồng minh <?php endif; ?>[Quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
]</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">
<?php if ($this->_tpl_vars['app']['kbn'] == 1): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/fight/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&trid=") : smarty_modifier_cat($_tmp, "&trid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['trid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['trid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chiến đấu</a> / <!-- Mỗi ngày chỉ được chào hỏi tối đa 3 lần với 1 đồng minh-->
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/greeting/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chào hỏi</a> / <!-- Khi số lượng đồng minh đạt giới hạn trên thì sẽ không thể đẩy/ấn được  -->
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/friend/apply/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mời làm đồng minh</a>
<?php elseif ($this->_tpl_vars['app']['kbn'] == 2 || $this->_tpl_vars['app']['kbn'] == 3): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/greeting/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chào hỏi</a> / 
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/card/file.php?mode=pre&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tặng quà</a>
<?php endif; ?>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td width="85" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['profile']['prof']; ?>
_s.jpg" alt="" width="80" height="109" /></td>
<td><span style="font-size:x-small;">
Quân đoàn trưởng: <?php echo $this->_tpl_vars['app']['card']['name']; ?>
 (<?php echo $this->_tpl_vars['app']['card']['rank']; ?>
)<br />
Quân năng: <?php echo $this->_tpl_vars['app']['profile']['level']; ?>
<br />
Danh hiệu: <?php echo $this->_tpl_vars['app']['stageName']; ?>
 (<?php echo $this->_tpl_vars['app']['cycle']; ?>
)<br />
Tỉ lệ thắng: <?php echo $this->_tpl_vars['app']['profile']['rate']; ?>
% (Thắng <?php echo $this->_tpl_vars['app']['profile']['win']; ?>
/Thua <?php echo $this->_tpl_vars['app']['profile']['lose']; ?>
)<br />
Đồng minh: <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/friend/list/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['profile']['friend_num']; ?>
</a>/<?php echo $this->_tpl_vars['app']['maxFr']; ?>
<br />
Gói báu vật đủ: <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/treasure.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php if ($this->_tpl_vars['app']['numChk']['CompNum'] == 0): ?>0<?php else: ?><?php echo $this->_tpl_vars['app']['numChk']['CompNum']; ?>
 Gói<?php endif; ?></a><br />
Vũ khí/Đồ phòng thủ: <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/item.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">
<?php echo $this->_tpl_vars['app']['sum1']; ?>
/<?php echo $this->_tpl_vars['app']['sum2']; ?>
</a><br />
 Tổng Card: 
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/card.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['cnt']; ?>
/41</a><br />
</span></td>
</tr>
</table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:right;">
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/history.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Lịch sử với Quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
</a><br/>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chia sẻ của Quân đoàn <?php echo $this->_tpl_vars['app']['profile']['handle']; ?>
</a>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br /><?php if ($this->_tpl_vars['app']['kbn'] == 2 || $this->_tpl_vars['app']['kbn'] == 3): ?>
<div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/friend/approve/confirm.php?res=5&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['profile']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['profile']['memberid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Hủy bỏ đồng minh</a><br />
</div>
<?php endif; ?>
</div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><?php if ($this->_tpl_vars['app']['kbn'] == 2 || $this->_tpl_vars['app']['kbn'] == 3): ?>
<div style="background-color:#33ff00;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#006600;">Card muốn có</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php if ($this->_tpl_vars['app']['wlist']): ?>
<?php $_from = $this->_tpl_vars['app']['wlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['wish'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wish']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['wish']['iteration']++;
?><?php echo $this->_tpl_vars['item']['name']; ?>
(<?php echo $this->_tpl_vars['item']['rank']; ?>
)
<div style="text-align:right;"><?php if ($this->_tpl_vars['item']['own'] == 0): ?><span style="color:#ff0000;">Không có</span><?php elseif ($this->_tpl_vars['item']['own'] == 1): ?><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/card/file.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tặng quà</a><?php elseif ($this->_tpl_vars['item']['own'] == 2): ?><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/card/pre.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tặng quà</a><?php endif; ?></div><?php endforeach; endif; unset($_from); ?>
<div style="background-color:#33ff00;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php else: ?>
<span style="color:#ff0000;">Chưa được đăng kí</span><br />
<div style="background-color:#33ff00;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php endif; ?>
<?php endif; ?><div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
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
</div><?php if ($this->_tpl_vars['app']['listN']): ?>
<?php $_from = $this->_tpl_vars['app']['listN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="60" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['item']['prof']; ?>
_s.jpg" alt="" width="60" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['form']['opensocial_owner_id'] == $this->_tpl_vars['item']['friendid']): ?><a href="<?php echo ((is_array($_tmp="/my/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php else: ?><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php endif; ?>Quân đoàn <?php echo $this->_tpl_vars['item']['handle']; ?>
</a><br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['upd_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M ngày %d tháng %m") : smarty_modifier_date_format($_tmp, "%H:%M ngày %d tháng %m")); ?>
<br />
<?php if ($this->_tpl_vars['item']['gtxtid'] == NULL): ?>
<?php else: ?>
<?php if ($this->_tpl_vars['item']['insp'] == '2'): ?>
<span style="color:#ff0000;">Nội dung chào hỏi đã bị xóa sau khi kiểm duyệt </span>
<?php else: ?>
<?php echo $this->_tpl_vars['item']['comnt']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['form']['opensocial_owner_id'] == $this->_tpl_vars['item']['friendid']): ?><div style="text-align:right;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/greeting/hello.php?tid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['gtxtid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['gtxtid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&id=") : smarty_modifier_cat($_tmp, "&id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['id'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">sửa</a></div><?php endif; ?>
<?php endif; ?>
</span></td></tr></table>

<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<span style="color:#ff0000;"> Hiện không có Chào hỏi nào</span>
<?php endif; ?><!-- footer -->
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