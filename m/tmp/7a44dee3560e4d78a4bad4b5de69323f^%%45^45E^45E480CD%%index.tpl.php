<?php /* Smarty version 2.6.26, created on 2014-04-29 17:35:12
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'index.tpl', 17, false),array('modifier', 'cat', 'index.tpl', 17, false),array('function', 'cycle', 'index.tpl', 17, false),)), $this); ?>
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

</style></head><body style="background-color:#000000;color:#ffffff"><a name="top" id="top"></a><div style="font-size:x-small;"><div style="text-align:center"><?php if ($this->_tpl_vars['app']['st'] == 'tut'): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/top_reg<?php echo $this->_tpl_vars['app']['ran']; ?>
.gif" width="240" /><br /><?php elseif ($this->_tpl_vars['app']['st'] == 'reg'): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/top_<?php echo $this->_tpl_vars['app']['st']; ?>
<?php echo $this->_tpl_vars['app']['ran']; ?>
.jpg" width="240" /><br /><?php else: ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/top_<?php echo $this->_tpl_vars['app']['st']; ?>
<?php echo $this->_tpl_vars['app']['ran']; ?>
.gif" width="240" /><br /><?php endif; ?>&copy;Copyright 2011 by SocialGame.vn . All rights reserved.</div><?php if ($this->_tpl_vars['app']['st'] == 'reg'): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center; background-color:#e7657b;"><span style="size:small; color:#ffffff;">Tin tức</span></div><div style="background-color:#ffcfff; color:black">- (21/07) <a href="<?php echo ((is_array($_tmp="/my/campaign.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" style="color:#000000">Event "Top Quân đoàn" -Tặng Iphone 4!</a><br/><br/>- (21/07) Linh Triều Bình Ca phiên bản Grand Open chính thức ra mắt cộng đồng Game thủ vào 10h ngày 21/07/2011<br/><br/><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center;font-size:medium;"><a href="<?php echo ((is_array($_tmp="/login/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đăng nhập</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center;font-size:medium;"><a href="<?php echo ((is_array($_tmp="/login/signup.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đăng ký</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><?php elseif ($this->_tpl_vars['app']['st'] == 'tut'): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center;font-size:medium;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/index.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chơi tiếp</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><?php elseif ($this->_tpl_vars['app']['st'] == 'my'): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji_vn.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><a href="<?php echo ((is_array($_tmp="/my/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="2">Trang riêng</a> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji_vn.tpl", 'smarty_include_vars' => array('id' => 44)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><a href="<?php echo ((is_array($_tmp="/login/logout.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Thoát</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><?php endif; ?><?php if ($this->_tpl_vars['app']['st'] == 'reg' || $this->_tpl_vars['app']['st'] == 'tut'): ?><div style="background-color:#000049;"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top"><td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/thumb/ama_hk.gif" width="70" height="70" /></td><td><span style="font-size:x-small;">Các Yêu tướng luôn xuất hiện đột ngột và nguy hiểm. Gia nhập Linh Triều Bình Ca ngay để xây dựng quân đội, liên kết với các đồng minh làm nhiệm vụ giải cứu thế giới muông thú.</span></td></tr></table></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><div style="background-color:#33ff00;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br /><div style="text-align:center; background-color:#006600;">Chào mừng đến với Linh Triều Bình Ca</div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div><div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div><div style="background-color:#ffccff;"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top"><td><span style="font-size:x-small;color:#000000;">Đăng nhập Linh Triều Bình Ca mỗi ngày, đi tìm báu vật hay ghé thăm shop để nhận các vé số may mắn và có cơ hội rút thăm Card</span></span></td><td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/tut_gacha.gif" width="70" height="70" /></td></tr></table><div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top"><td width="75" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/tut_fight.gif" width="70" height="70" /></td><td><span style="font-size:x-small;color:#000000;">Hãy vận dụng tài năng để sắp đặt, kết hợp, nâng cấp các Card trong cỗ bài, tạo nên quân đoàn hùng mạnh chiến đấu với Yêu tướng và các đối thủ khác</span></span></td></tr></table><div style="background-color:#006600;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div></div><?php elseif ($this->_tpl_vars['app']['st'] == 'my'): ?><div style="text-align:center; background-color:#820000;"><span style="size:small; color:#ffffff;">Tin tức</span></div><div style="background-color:#000049;">- (21/07) Công bố giải thưởng Top game thủ LTBC giai đoạn Open Beta (15/07- 21/07). <a href="<?php echo ((is_array($_tmp="/ranking/level2.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chi tiết</a><br /><br />- (21/07) Kể từ thời điểm 10h ngày 21/07/2011, Linh Triều Bình Ca sẽ tiến hành reset lại tài khoản trong 2 phiên bản Close Beta và Open Beta.<br /><br />- (21/07) Linh Triều Bình Ca phiên bản Grand Open có thêm một số tính năng mới<br/><br/><div style="text-align:right;font-size:x-small;"><a href="<?php echo ((is_array($_tmp="/ranking/level.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Top 100</a> | <a href="<?php echo ((is_array($_tmp="/my/notice.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Xem thêm</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><?php if ($this->_tpl_vars['app']['event_result']): ?><div style="text-align:center; background-color:#820000;"><span style="size:small; color:#ffffff;">Tin Event</span></div><div><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td width="70" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['event_result']['prof']; ?>
_s.jpg" alt="" width="60" /></td><td><div style="font-size:x-small;">Người may mắn của <?php echo $this->_tpl_vars['app']['event_result']['week_text']; ?>
</div><div style="font-size:x-small;">Người may mắn của <?php echo $this->_tpl_vars['app']['event_result']['week_text']; ?>
 là <a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['event_result']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['event_result']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['event_result']['handle']; ?>
</a>. Được tặng <?php if ($this->_tpl_vars['app']['event_result']['name']): ?><?php echo $this->_tpl_vars['app']['event_result']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['app']['event_result']['amount']; ?>
 Ngọc<?php endif; ?>. Xin chúc mừng!</div></td></tr></table></div><?php endif; ?></div><?php if ($this->_tpl_vars['app']['newC']): ?><div style="text-align:center; background-color:#820000;"><span style="size:small; color:#ffffff;">Quân đoàn mới gia nhập</span></div><div style="background-color:<?php echo smarty_function_cycle(array('values' => "#000000;,#333333;"), $this);?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br /><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td width="60" align="center"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['newC']['0']['prof']; ?>
_p.jpg" alt="" width="60" /></td><td><span style="font-size:x-small;"><?php if ($this->_tpl_vars['app']['tut_num'] > 17): ?><?php if ($this->_tpl_vars['form']['opensocial_owner_id'] == $this->_tpl_vars['app']['newC']['0']['memberid']): ?><a href="<?php echo ((is_array($_tmp="/my/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php else: ?><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/wall.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['newC']['0']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['newC']['0']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php endif; ?>Quân đoàn <?php echo $this->_tpl_vars['app']['newC']['0']['handle']; ?>
</a><br />Quân năng: Lv<?php echo $this->_tpl_vars['app']['newC']['0']['level']; ?>
<br />Đồng minh: <?php echo $this->_tpl_vars['app']['newC']['0']['friend_num']; ?>
<br /><?php if ($this->_tpl_vars['form']['opensocial_owner_id'] == $this->_tpl_vars['app']['newC']['0']['memberid']): ?><?php else: ?><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/friend/apply/?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['newC']['0']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['newC']['0']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Mời làm đồng minh</a><?php endif; ?><?php else: ?>Quân đoàn <?php echo $this->_tpl_vars['app']['newC']['0']['handle']; ?>
<br />Quân năng: Lv<?php echo $this->_tpl_vars['app']['newC']['0']['level']; ?>
<br />Đồng minh: <?php echo $this->_tpl_vars['app']['newC']['0']['friend_num']; ?>
<br /><?php endif; ?></span></td></tr></table><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br /></div><?php else: ?><?php endif; ?><?php endif; ?><?php if ($this->_tpl_vars['app']['st'] == 'reg'): ?><div style="text-align:center;font-size:medium;"><a href="<?php echo ((is_array($_tmp="/login/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đăng nhập</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center;font-size:medium;"><a href="<?php echo ((is_array($_tmp="/login/signup.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đăng ký</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><?php elseif ($this->_tpl_vars['app']['st'] == 'tut'): ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><div style="text-align:center;font-size:medium;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/index.php?ss=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chơi tiếp</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><?php elseif ($this->_tpl_vars['app']['st'] == 'my'): ?><div style="text-align:center; background-color:#820000;height:13px;"> </div><div style="text-align:center;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji_vn.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><a href="<?php echo ((is_array($_tmp="/my/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="2">Trang riêng</a> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji_vn.tpl", 'smarty_include_vars' => array('id' => 44)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><a href="<?php echo ((is_array($_tmp="/login/logout.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5">Thoát</a></div><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br /><?php endif; ?><div style="text-align:center">Hỗ trợ: <a href="phuong.nguyen.itvn@gmail.com">phuong.nguyen.itvn@gmail.com</a><br/></div></div></body></html>