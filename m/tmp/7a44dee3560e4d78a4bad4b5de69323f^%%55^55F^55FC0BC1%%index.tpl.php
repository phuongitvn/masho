<?php /* Smarty version 2.6.26, created on 2013-11-14 08:27:30
         compiled from my/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format2', 'my/index.tpl', 24, false),array('modifier', 'cnvgw', 'my/index.tpl', 54, false),array('modifier', 'cat', 'my/index.tpl', 109, false),array('modifier', 'escape', 'my/index.tpl', 157, false),)), $this); ?>
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
<?php if ($this->_tpl_vars['app']['list']): ?>
<div style="text-align:center; background-color:#cccccc; display: -wap-marquee;-wap-marquee-loop:"><span style="font-size:x-small;color:#000000;">
<?php $_from = $this->_tpl_vars['app']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['evlg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['evlg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['evlg']['iteration']++;
?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_time'])) ? $this->_run_mod_handler('date_format2', true, $_tmp) : smarty_modifier_date_format2($_tmp)); ?>

<?php if ($this->_tpl_vars['item']['status'] == '0'): ?>
Bạn vừa thắng tấn công của quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>

<?php elseif ($this->_tpl_vars['item']['status'] == '1'): ?>
Bạn vừa thua tấn công của quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>

<?php elseif ($this->_tpl_vars['item']['status'] == '2'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 yêu cầu bạn cứu viện 
<?php elseif ($this->_tpl_vars['item']['status'] == '5'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 vừa gia nhập Linh triều Bình Ca
<?php elseif ($this->_tpl_vars['item']['status'] == '6'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 đã trở thành quân đồng minh
<?php elseif ($this->_tpl_vars['item']['status'] == '7'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 mời bạn làm đồng minh
<?php elseif ($this->_tpl_vars['item']['status'] == '8'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 đã loại bạn khỏi danh sách đồng minh
<?php elseif ($this->_tpl_vars['item']['status'] == '9'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 từ chối làm đồng minh
<?php elseif ($this->_tpl_vars['item']['status'] == 'A'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 vừa tặng Card cho bạn
<?php elseif ($this->_tpl_vars['item']['status'] == 'B'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 vừa tặng báu vật cho bạn
<?php elseif ($this->_tpl_vars['item']['status'] == 'C'): ?>
Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 nhận được quà báu vật nhờ thắng khi viện trợ
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</span></div>
<div style="font-size:x-small;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['bouns'] == 'GET'): ?>
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp="/gacha/index.php?bonus=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/bonus.gif" width="160" height="48" /></a></div>
<div style="text-align:right;"><a href="<?php echo ((is_array($_tmp="/qa/detail.php?id=140")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Xem thêm Quà đăng nhập</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php endif; ?>
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['sub']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;text-align:center;">
Trang riêng</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="84" align="center">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['profile']['prof']; ?>
_p.jpg" width="80" height="109" /><br />
<span style="font-size:x-small;"><a href="<?php echo ((is_array($_tmp="/my/wall.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Thông tin quân đoàn </a></span>
</td>
<td valign="middle"><span style="font-size:x-small;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
Quân đoàn trưởng: <?php echo $this->_tpl_vars['app']['card']['name']; ?>
 (<?php echo $this->_tpl_vars['app']['card']['rank']; ?>
)<br />
Quân năng: <?php echo $this->_tpl_vars['app']['profile']['level']; ?>
<br />
Quân binh: <?php echo $this->_tpl_vars['app']['deck']['follower']; ?>
<br />
Điểm kinh nghiệm: <?php echo $this->_tpl_vars['app']['profile']['exp']; ?>
 <?php if ($this->_tpl_vars['app']['diffExp']): ?>(Cần <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['diffExp']; ?>
</span>)<?php endif; ?><br />
Năng lượng: <span style="color:#ff0000;"><?php echo $this->_tpl_vars['app']['profile']['genki']; ?>
</span>/<?php echo $this->_tpl_vars['app']['profile']['max_genki']; ?>
<br />
<?php if ($this->_tpl_vars['app']['profile']['rsv_time_sec'] != NULL): ?> - <span style="color:#ff0000;">Cần <?php if ($this->_tpl_vars['app']['profile']['rsv_time_min'] == 0): ?><?php echo $this->_tpl_vars['app']['profile']['rsv_time_sec']; ?>
 giây<?php else: ?><?php echo $this->_tpl_vars['app']['profile']['rsv_time_min']; ?>
 phút<?php endif; ?> để hồi phục</span><br /><?php endif; ?>
Vàng: <?php echo $this->_tpl_vars['app']['profile']['money']; ?>
 <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
Ngọc: <a href="<?php echo ((is_array($_tmp="/coin/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['profile']['coin']; ?>
</a> <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/ngoc.gif" width="10" height="8" /><br />
Tỷ lệ thắng: <?php echo $this->_tpl_vars['app']['profile']['rate']; ?>
% (Thắng <?php echo $this->_tpl_vars['app']['profile']['win']; ?>
/Bại <?php echo $this->_tpl_vars['app']['profile']['lose']; ?>
)</span></td></tr>
</table>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="33%" align="center"><a href="<?php echo ((is_array($_tmp="/card/deck.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/btn_card.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><a href="<?php echo ((is_array($_tmp="/quest/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/btn_quest.gif" width="69" height="29" /></a></td>
<td width="33%" align="center"><a href="<?php echo ((is_array($_tmp="/other/list.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/btn_fight.gif" width="69" height="29" /></a></td>
</tr>
</table>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><span style="size:small; color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Tin tức</span></div>
<div>
- (21/07) Kể từ thời điểm 10h ngày 21/07/2011, Linh Triều Bình Ca sẽ tiến hành reset lại tài khoản trong 2 phiên bản Close Beta và Open Beta.<br/>
<br/>
- (21/07) Linh Triều Bình Ca phiên bản Grand Open có thêm một số tính năng mới<br/>
<br />
<div style="text-align:right;font-size:x-small;">
<a href="<?php echo ((is_array($_tmp="/ranking/level.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Top 100</a> | <a href="<?php echo ((is_array($_tmp="/my/notice.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Xem thêm</a>
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>

<?php if ($this->_tpl_vars['app']['event_result']): ?>
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><span style="size:small; color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Tin Event</span></div>
<div>
- Người may mắn của <?php echo $this->_tpl_vars['app']['event_result']['week_text']; ?>
 là <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['event_result']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['event_result']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['event_result']['handle']; ?>
</a>. Được tặng <?php if ($this->_tpl_vars['app']['event_result']['name']): ?><?php echo $this->_tpl_vars['app']['event_result']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['app']['event_result']['amount']; ?>
 Ngọc<?php endif; ?>. Xin chúc mừng!<br/>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
<?php endif; ?>


<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><span style="size:small; color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Người đưa tin</span></div>
<?php if ($this->_tpl_vars['app']['list']): ?>
<?php $_from = $this->_tpl_vars['app']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['evlg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['evlg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['evlg']['iteration']++;
?>
<?php if ($this->_tpl_vars['item']['status'] == '0'): ?>
<?php if ($this->_tpl_vars['item']['trap'] == 1): ?>
- Bạn vừa thắng tấn công của <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> nhờ sử dụng lá bùa
<?php else: ?>
<?php if ($this->_tpl_vars['item']['lnk'] == 1): ?>
- Bạn vừa <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/my/fight.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['ddn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['ddn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&oid=") : smarty_modifier_cat($_tmp, "&oid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">thắng</a> tấn công của <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a>
<?php else: ?>
- Bạn vừa thắng tấn công của <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> với tỉ số <?php echo $this->_tpl_vars['item']['win']; ?>
 thắng <?php echo $this->_tpl_vars['item']['lose']; ?>
 bại
<?php endif; ?>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['item']['status'] == '1'): ?>
<?php if ($this->_tpl_vars['item']['lnk'] == 1): ?>
- Bạn vừa <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/my/fight.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['ddn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['ddn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&oid=") : smarty_modifier_cat($_tmp, "&oid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">thua</a> tấn công của <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a>
<?php else: ?>
- Bạn vừa thua tấn công của Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 với tỉ số <?php echo $this->_tpl_vars['item']['win']; ?>
 thắng <?php echo $this->_tpl_vars['item']['lose']; ?>
 bại
<?php endif; ?>
<?php elseif ($this->_tpl_vars['item']['status'] == '2'): ?>
- Bạn nhận được <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/help/entry.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['ddn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['ddn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&fid=") : smarty_modifier_cat($_tmp, "&fid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&oid=") : smarty_modifier_cat($_tmp, "&oid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['otherid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['otherid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">yêu cầu cứu viện</a> từ <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a>
<?php elseif ($this->_tpl_vars['item']['status'] == '5'): ?>
- Quân đoàn bạn mời <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> tham chiến
<?php elseif ($this->_tpl_vars['item']['status'] == '6'): ?>
- <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> đã trở thành đồng minh
<?php elseif ($this->_tpl_vars['item']['status'] == '7'): ?>
- <a href="<?php echo ((is_array($_tmp="/friend/approve/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> vừa mời bạn làm đồng minh
<?php elseif ($this->_tpl_vars['item']['status'] == '8'): ?>
 - <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> đã loại bạn ra khỏi danh sách đồng minh 
<?php elseif ($this->_tpl_vars['item']['status'] == '9'): ?>
 - <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> từ chối lời mời làm đồng minh 
<?php elseif ($this->_tpl_vars['item']['status'] == 'A'): ?>
 - Bạn được <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> tặng Card <a href="<?php echo ((is_array($_tmp="/card/pre.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"> <?php echo $this->_tpl_vars['item']['namerank']; ?>
</a>
<?php elseif ($this->_tpl_vars['item']['status'] == 'B'): ?>
 - Bạn được <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
 </a> tặng báu vật <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/treasure/detail.php?tid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['trid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['trid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['item']['trname']; ?>
</a>
<?php elseif ($this->_tpl_vars['item']['status'] == 'C'): ?>
 - Được <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['friendid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['friendid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> tặng báu vật <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/treasure/detail.php?tid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['trid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['trid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['item']['trname']; ?>
</a> nhờ cứu viện thắng
<?php endif; ?> (<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_time'])) ? $this->_run_mod_handler('date_format2', true, $_tmp) : smarty_modifier_date_format2($_tmp)); ?>
)<br />
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['list2']): ?>
<?php $_from = $this->_tpl_vars['app']['list2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
- Bạn nhận được <a href="<?php echo ((is_array($_tmp="/my/wall.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">lời nhắn</a> từ <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['owner_user_id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['owner_user_id'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['user_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['created'])) ? $this->_run_mod_handler('date_format2', true, $_tmp) : smarty_modifier_date_format2($_tmp)); ?>
)<br />
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<div style="text-align:right;font-size:x-small;"><a href="<?php echo ((is_array($_tmp="/my/event.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Xem thêm</a></div>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><span style="size:small; color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Thông tin Đồng minh</span></div>
<?php if ($this->_tpl_vars['app']['listF']): ?>
<?php $_from = $this->_tpl_vars['app']['listF']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['frlg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['frlg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['frlg']['iteration']++;
?>
- <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân đoàn <?php echo $this->_tpl_vars['item']['friendname']; ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_time'])) ? $this->_run_mod_handler('date_format2', true, $_tmp) : smarty_modifier_date_format2($_tmp)); ?>
)<br />
<?php if ($this->_tpl_vars['item']['status'] == 0): ?>
<?php echo $this->_tpl_vars['item']['stagename']; ?>
<br />
<?php elseif ($this->_tpl_vars['item']['status'] == 1): ?>
Hoàn thành gói <span style="color:#ffff00;"><?php echo $this->_tpl_vars['item']['seriesname']; ?>
</span>, đạt 2 gói báu vật đủ!<br />
<?php elseif ($this->_tpl_vars['item']['status'] == 2): ?>
Đăng kí Card muốn có <?php echo $this->_tpl_vars['item']['bushoname']; ?>
 (<?php echo $this->_tpl_vars['item']['rank']; ?>
)!<br />
<?php elseif ($this->_tpl_vars['item']['status'] == 3): ?>
Giành được card <?php if ($this->_tpl_vars['item']['rank'] == 'A'): ?>rất<?php elseif ($this->_tpl_vars['item']['rank'] == 'B'): ?><?php endif; ?> hiếm"<?php echo $this->_tpl_vars['item']['bushoname']; ?>
 (<span style="color:#ffff00;"><?php echo $this->_tpl_vars['item']['rank']; ?>
</span>)"!<br />
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
<div style="text-align:right;font-size:x-small;"><a href="<?php echo ((is_array($_tmp="/my/comm.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Xem thêm</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php else: ?>
Không có thông tin đồng minh<br />
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center; background-color:#<?php echo $this->_tpl_vars['app']['color']['main']; ?>
;"><span style="size:small; color:#<?php echo $this->_tpl_vars['app']['color']['text']; ?>
;">Chức năng Quân đoàn</span></div>
<div style="margin-bottom:1ex"><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/gacha/?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Vé số</a>: Đổi vé số để được thêm nhiều Card</div>
<div style="margin-bottom:1ex"><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 27)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Shop</a>: Trang bị quân khí, khôi phục năng lượng...</div>
<div style="margin-bottom:1ex"><span style="color:#00ffff;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 28)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/item/?md=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quân khí</a>: Kiểm soát trang bị binh lực của quân đoàn</div>
<div style="margin-bottom:1ex"><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 9)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/my/friend/list/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đồng minh</a>: Liên kết với nhiều đồng minh để tăng sức mạnh quân đoàn</div>
<div style="margin-bottom:1ex"><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 30)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/my/treasure.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Kho báu</a>: Lưu trữ những vật báu giành được</div>
<div style="margin-bottom:1ex"><span style="color:#33ff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 12)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/diary/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Nhật trình Chiến trường</a>: Xem lại thông tin những lần thực hiện nhiệm vụ</div>
<div><span style="color:#33ff00;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 31)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/qa/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Trợ giúp</a>: Giải đáp các vấn đề của Linh Triều Bình Ca</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="3" /><br />
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