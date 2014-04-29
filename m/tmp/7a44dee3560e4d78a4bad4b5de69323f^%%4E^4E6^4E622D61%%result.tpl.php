<?php /* Smarty version 2.6.26, created on 2013-11-13 23:25:48
         compiled from fight/result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'fight/result.tpl', 147, false),array('modifier', 'cat', 'fight/result.tpl', 150, false),)), $this); ?>
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
<title>Linh Triều Bình ca</title>
</head>
<body style="background-color:#000000;color:#ffffff">
<div style="font-size:x-small;">
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Kết quả chiến đấu</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<!-- * -->
<div style="text-align:center;"><span style="font-size:x-small;color:#ffff00;">Quân đoàn <?php echo $this->_tpl_vars['app']['my_profile']['handle']; ?>
</span> VS <span style="font-size:x-small;color:#ff0000;">Quân đoàn <?php echo $this->_tpl_vars['app']['ot_profile']['handle']; ?>
</span></div><!-- banner thắng thua -->
<?php if ($this->_tpl_vars['app']['winN'] < 3): ?>
<embed src="/img/swf/lose.swf?img1=/img/card/<?php echo $this->_tpl_vars['app']['my_profile']['prof']; ?>
_p.jpg" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
<?php else: ?>
<embed src="/img/swf/win.swf?img1=/img/card/<?php echo $this->_tpl_vars['app']['my_profile']['prof']; ?>
_p.jpg" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
<?php endif; ?><!-- Hiệu quả đội hình -->
<?php if ($this->_tpl_vars['app']['my_profile']['formno'] > 0 || $this->_tpl_vars['app']['ot_profile']['formno'] > 0): ?>
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['my_profile']['formno'] > 0): ?>
<span style="font-size:x-small;color:#ffff00;">Quân đoàn <?php echo $this->_tpl_vars['app']['my_profile']['handle']; ?>
 </span><span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['dispMyForm']['name']; ?>
]</span><br /><?php endif; ?>
<?php if ($this->_tpl_vars['app']['ot_profile']['formno'] > 0): ?>
<span style="font-size:x-small;color:#ff0000;">Quân đoàn <?php echo $this->_tpl_vars['app']['ot_profile']['handle']; ?>
 </span><span style="font-size:x-small;color:#ff0000;">[<?php echo $this->_tpl_vars['app']['dispOtForm']['name']; ?>
]</span><br /><?php endif; ?><!-- round1 -->
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ nhất<br />
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['1']['sec_name']; ?>
 (Lv<?php echo $this->_tpl_vars['app']['myDispCard']['1']['level']; ?>
)</span> &gt;&lt;
 <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['1']['sec_name']; ?>
 (Lv<?php echo $this->_tpl_vars['app']['otDispCard']['1']['level']; ?>
)</span><br />
<?php if ($this->_tpl_vars['app']['fight']['1'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['1']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['1']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['1']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['1']; ?>
) đánh bại <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['1']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['1']; ?>
) bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['1']['1koto_win']; ?>
]</span>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['1']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['1']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['1']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['1']; ?>
) tấn công nhưng không thể làm lung lay được sự phòng thủ chắc chắc của <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['1']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['1']; ?>
)! <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['1']['1koto_lose']; ?>
]</span>
<?php endif; ?>

<!-- round2 -->
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 2<br />
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['2']['sec_name']; ?>
 (Lv<?php echo $this->_tpl_vars['app']['myDispCard']['2']['level']; ?>
)</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['2']['sec_name']; ?>
 (Lv<?php echo $this->_tpl_vars['app']['otDispCard']['2']['level']; ?>
)</span><br />
<?php if ($this->_tpl_vars['app']['fight']['2'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['2']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['2']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['2']['name']; ?>
 (Công <?php echo $this->_tpl_vars['app']['myOffP']['2']; ?>
) đánh bại </span><span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['2']['name']; ?>
</span>(Thủ <?php echo $this->_tpl_vars['app']['otDefP']['2']; ?>
) bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['2']['1koto_win']; ?>
]</span>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['2']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['2']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['2']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['2']; ?>
) tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['2']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['2']; ?>
) <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['2']['1koto_lose']; ?>
]</span>
<?php endif; ?><!-- round3 -->
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 3<br />
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['3']['sec_name']; ?>
 (Lv <?php echo $this->_tpl_vars['app']['myDispCard']['3']['level']; ?>
)</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['3']['sec_name']; ?>
 (Lv <?php echo $this->_tpl_vars['app']['otDispCard']['3']['level']; ?>
)</span><br />
<?php if ($this->_tpl_vars['app']['fight']['3'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['3']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['3']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['3']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['3']; ?>
) đánh bại <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['3']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['3']; ?>
) bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['3']['1koto_win']; ?>
]</span>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['3']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['3']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['3']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['3']; ?>
) tấn công nhưng không thể làm lung lay sự phòng thủ vững chắc của <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['3']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['3']; ?>
) <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['3']['1koto_lose']; ?>
]</span>
<?php endif; ?><!-- round4 -->
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 4<br />
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['4']['sec_name']; ?>
 (Lv <?php echo $this->_tpl_vars['app']['myDispCard']['4']['level']; ?>
)</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['4']['sec_name']; ?>
 (Lv <?php echo $this->_tpl_vars['app']['otDispCard']['4']['level']; ?>
)</span><br />
<?php if ($this->_tpl_vars['app']['fight']['4'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['4']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['4']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['4']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['4']; ?>
) đánh bại <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['4']['name']; ?>
 (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['4']; ?>
)</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['4']['1koto_win']; ?>
]</span>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['4']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['4']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['4']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['4']; ?>
) tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['4']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['4']; ?>
) <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['4']['1koto_lose']; ?>
]</span>
<?php endif; ?>
<!-- round5 -->
<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<div style="text-align:center;">Trận chiến thứ 5<br />
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['5']['sec_name']; ?>
 (Lv <?php echo $this->_tpl_vars['app']['myDispCard']['5']['level']; ?>
)</span>
 &gt;&lt; <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['5']['sec_name']; ?>
 (Lv <?php echo $this->_tpl_vars['app']['otDispCard']['5']['level']; ?>
)</span><br />
<?php if ($this->_tpl_vars['app']['fight']['5'] == 1): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['5']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['5']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['5']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['5']; ?>
) đánh bại <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['5']['name']; ?>
 (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['5']; ?>
)</span> bằng cách gây thương vong! <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['5']['1koto_win']; ?>
]</span>
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['myDispCard']['5']['bushoid']; ?>
_g.jpg" alt="" width="80" height="109" />
VS
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/card/<?php echo $this->_tpl_vars['app']['otDispCard']['5']['bushoid']; ?>
_s.jpg" alt="" width="80" height="109" />
</div>
<span style="font-size:x-small;color:#ffff00;"><?php echo $this->_tpl_vars['app']['myDispCard']['5']['name']; ?>
</span> (Công <?php echo $this->_tpl_vars['app']['myOffP']['5']; ?>
) tấn công nhưng không thể làm lung lay sự phòng thủ chắc chắn của <span style="font-size:x-small;color:#ff0000;"><?php echo $this->_tpl_vars['app']['otDispCard']['5']['name']; ?>
</span> (Thủ <?php echo $this->_tpl_vars['app']['otDefP']['5']; ?>
) <span style="font-size:x-small;color:#ffff00;">[<?php echo $this->_tpl_vars['app']['myDispCard']['5']['1koto_lose']; ?>
]</span>
<?php endif; ?>
<!-- result -->
<div style="background-color:#333333;color:#ffffff;"><span style="font-size:x-small;color:#ffff00;">Quân đoàn <?php echo $this->_tpl_vars['app']['my_profile']['handle']; ?>
</span> <?php echo $this->_tpl_vars['app']['winN']; ?>
 - <?php echo $this->_tpl_vars['app']['loseN']; ?>
<span style="font-size:x-small;color:#ff0000;"> Quân đoàn <?php echo $this->_tpl_vars['app']['ot_profile']['handle']; ?>
</span><br/><?php if ($this->_tpl_vars['app']['winN'] == 5 && $this->_tpl_vars['app']['loseN'] == 0): ?>
Thắng áp đảo!<?php elseif ($this->_tpl_vars['app']['winN'] == 4 && $this->_tpl_vars['app']['loseN'] == 1): ?>
Thắng dễ dàng!<?php elseif ($this->_tpl_vars['app']['winN'] == 3 && $this->_tpl_vars['app']['loseN'] == 2): ?>
Thắng sát nút!<?php elseif ($this->_tpl_vars['app']['winN'] == 2 && $this->_tpl_vars['app']['loseN'] == 3): ?>
Thua với tỉ số sát nút!<?php elseif ($this->_tpl_vars['app']['winN'] == 1 && $this->_tpl_vars['app']['loseN'] == 4): ?>
Thua đậm!<?php elseif ($this->_tpl_vars['app']['winN'] == 0 && $this->_tpl_vars['app']['loseN'] == 5): ?>
Đại bại!<?php endif; ?><br />
<?php if ($this->_tpl_vars['app']['winN'] >= 3): ?>
Điểm kinh nghiệm: +<?php echo $this->_tpl_vars['app']['spd']['exp']; ?>
<br />
Vàng: +<?php echo $this->_tpl_vars['app']['spd']['money']; ?>
<br />
Năng lượng: -3<br />
</div>
<?php else: ?>
Điểm kinh nghiệm: +<?php echo $this->_tpl_vars['app']['spd']['exp']; ?>
<br />
Vàng: -<?php echo $this->_tpl_vars['app']['spd']['money']; ?>
<br />
Năng lượng: -3<br />
</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 63)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp="/card/pcomplist.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tăng sức mạnh cho Card và đấu lại</a><span style="color:#ff9900;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 63)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php if ($this->_tpl_vars['app']['comp'] == 0): ?>
<div style="text-align:center;"><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 19)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/help/request.php?tid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['trid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['trid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ts=") : smarty_modifier_cat($_tmp, "&ts=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ts']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ts'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&oid=") : smarty_modifier_cat($_tmp, "&oid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['oid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['oid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Nhờ đồng minh cứu viện</a><span style="color:#ff0000;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 19)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span></div>
<?php else: ?>
<span style="color:#ff0000;">Không thể nhờ đồng minh cứu viện</span>
<?php endif; ?>
<?php endif; ?><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br /><?php if ($this->_tpl_vars['app']['already']['handle'] != ""): ?>
<!-- Trường hợp user khác đã hoàn thành viện trợ  -->
<div style="text-align:center;color:#ff0000;">Quân đoàn <?php echo $this->_tpl_vars['app']['already']['handle']; ?>
 và Quân đoàn <?php echo $this->_tpl_vars['app']['ot_profile']['handle']; ?>
 đã viện trợ<?php if ($this->_tpl_vars['app']['ret0']['entry_flg'] == 1): ?> thắng<?php else: ?> thua<?php endif; ?></div>
<?php else: ?><?php if (isset ( $this->_tpl_vars['app']['tr'] )): ?>
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Báu vật</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr valign="top">
<td width="80" style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/treasure/<?php echo $this->_tpl_vars['app']['tr']['treasureid']; ?>
.gif" width="70" height="70" />
</td><td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['ret0']['trNotExists'] == 1): ?>
<div style="text-align:center;color:#ff0000;">Báu vật<?php echo $this->_tpl_vars['app']['tr']['name']; ?>
 - Gói <?php echo $this->_tpl_vars['app']['sr']['name']; ?>
 đã đủ gói hoặc vào tay quân đoàn khác nên không thể lấy được </div>
<?php else: ?>
<?php if ($this->_tpl_vars['app']['fr_profile']['handle'] == ""): ?>
<?php if ($this->_tpl_vars['app']['ret0']['itemid'] == ""): ?>
Lấy được báu vật <?php echo $this->_tpl_vars['app']['tr']['name']; ?>
 thuộc Gói <?php echo $this->_tpl_vars['app']['sr']['name']; ?>
!
<?php else: ?>
<span style="color:#ffff00;">Lấy được Báu vật <?php echo $this->_tpl_vars['app']['tr']['name']; ?>
 thuộc Gói <?php echo $this->_tpl_vars['app']['sr']['name']; ?>
 và hoàn thành Gói báu vật </span><br />
<?php endif; ?>
<?php else: ?>
Quân đoàn <?php echo $this->_tpl_vars['app']['fr_profile']['handle']; ?>
 viện trợ và giành thắng lợi. Được Báu vật <?php echo $this->_tpl_vars['app']['tr']['name']; ?>
, hoàn thành Gói <?php echo $this->_tpl_vars['app']['sr']['name']; ?>

<?php endif; ?>
<?php endif; ?>
</span></td></tr></table>
<?php endif; ?>
<?php endif; ?><?php if ($this->_tpl_vars['app']['ret0']['itemid'] != "" && $this->_tpl_vars['app']['fr_profile']['handle'] == ""): ?>
<div style="text-align:center; background-color:#945092; border-color:#945092; border-style:solid;"><span style="color:#000000;">Đoạt được món đồ</span></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr valign="top"><td width="80"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['app']['ret0']['itemid']; ?>
.gif" width="70" height="70" /></td>
<td><span style="font-size:x-small;"><?php echo $this->_tpl_vars['app']['ret0']['name']; ?>
<br /><?php echo $this->_tpl_vars['app']['ret0']['expla']; ?>
<br />
<?php if ($this->_tpl_vars['app']['ret0']['kbn'] == 1 || $this->_tpl_vars['app']['ret0']['kbn'] == 2): ?>
Tấn công <?php echo $this->_tpl_vars['app']['ret0']['offense']; ?>
<br />
Phòng thủ <?php echo $this->_tpl_vars['app']['ret0']['defense']; ?>
<?php endif; ?></span></td></tr></table>
<?php endif; ?><?php if ($this->_tpl_vars['app']['ret0']['restNum'] >= 0): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#820000;">Món đồ bị hỏng</div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<table border="0" width="98%" cellspacing="0" cellpadding="0" align="center">
<tr><td width="60"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['app']['crash']['itemid']; ?>
.gif" alt="<?php echo $this->_tpl_vars['app']['crash']['name']; ?>
" width="70" height="70" /></td>
<td><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['crash']['kbn'] == 1): ?>Vũ khí: <?php elseif ($this->_tpl_vars['app']['crash']['kbn'] == 2): ?>Đồ phòng Thủ <?php else: ?>Khác: <?php endif; ?><?php echo $this->_tpl_vars['app']['crash']['name']; ?>
<br />
Công <?php echo $this->_tpl_vars['app']['crash']['offense']; ?>
 Thủ <?php echo $this->_tpl_vars['app']['crash']['defense']; ?>
<br />
<?php if ($this->_tpl_vars['app']['crash']['money'] == 0 && $this->_tpl_vars['app']['crash']['coin'] == 0): ?>
<span style="color:#ff0000;">Đồ không bán</span><br />
<?php elseif ($this->_tpl_vars['app']['crash']['coin'] == 0): ?>
Giá: <?php echo $this->_tpl_vars['app']['crash']['money']; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
<?php endif; ?>
</span></td></tr></table>
<?php endif; ?><!-- Đánh giá lên trình -->
<?php if ($this->_tpl_vars['app']['diffExp'] == 0): ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/fight/next.php?fg=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['fg']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['fg'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tiếp</a></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="20" /><br />
<?php else: ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="text-align:center;"><a href="<?php echo ((is_array($_tmp="/other/list.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="5"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Tiếp tục chiến đấu</a></div>
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
<?php endif; ?>
</div>
</body>
</html>