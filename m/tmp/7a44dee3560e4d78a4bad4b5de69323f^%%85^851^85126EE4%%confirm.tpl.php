<?php /* Smarty version 2.6.26, created on 2013-11-13 23:20:36
         compiled from item/confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'item/confirm.tpl', 55, false),array('modifier', 'cnvgw', 'item/confirm.tpl', 55, false),array('modifier', 'number_format', 'item/confirm.tpl', 61, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<?php if ($this->_tpl_vars['form']['unit'] <> ""): ?>
<title>Xác nhận mua | Linh Triều Bình Ca</title>
<?php else: ?>
<title>Linh Triều Bình Ca</title>
<?php endif; ?>
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
<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#ff9900;"><?php if ($this->_tpl_vars['form']['unit'] <> ""): ?>Xác nhận mua<?php else: ?>Thông tin về Item<?php endif; ?></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<div style="text-align:center;">
<?php echo $this->_tpl_vars['app']['item']['name']; ?>
 [<?php echo $this->_tpl_vars['app']['item']['kbnname']; ?>
]<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['app']['item']['itemid']; ?>
.gif" alt="<?php echo $this->_tpl_vars['app']['item']['itemname']; ?>
" width="70" height="70" /><br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>

<!-- Giai thich Item -->
<div style="background-color:#333333;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php echo $this->_tpl_vars['app']['item']['expla']; ?>
<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
<!-- giải thích item -->


<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
[Thông tin về Item]<br />
<?php if ($this->_tpl_vars['app']['qid'] <> ""): ?>
<?php if ($this->_tpl_vars['app']['dontGo'] == 1): ?>
Quest: <!--<?php echo $this->_tpl_vars['app']['qname']; ?>
--><br />
* item không thể mua được trong shop. Có thể có được tại quest tiếp theo<br />
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<?php else: ?>
Quest<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/detail.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['qid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['qid'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['newss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['newss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><?php echo $this->_tpl_vars['app']['qname']; ?>
</a><br />
Item không thể mua được trong shop. Có thể có được tại quest bên trên<br />
<?php endif; ?>
<div style="text-align:center;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/disp.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"  accesskey="5">đến quest hiện tại</a></div>
<?php else: ?>
<?php if ($this->_tpl_vars['app']['item']['money'] > 0): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Giá: <?php echo ((is_array($_tmp=$this->_tpl_vars['app']['item']['money'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Giá: <?php echo ((is_array($_tmp=$this->_tpl_vars['app']['item']['coin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/ngoc.gif" width="10" height="8" /><br />
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['item']['kbn'] == 1 || $this->_tpl_vars['app']['item']['kbn'] == 2): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 54)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Công lực: <?php echo $this->_tpl_vars['app']['item']['offense']; ?>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 53)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Thủ lực: <?php echo $this->_tpl_vars['app']['item']['defense']; ?>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 47)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php if ($this->_tpl_vars['app']['item']['rest'] == 30): ?>Độ bền: thường<br /><?php elseif ($this->_tpl_vars['app']['item']['rest'] == 60): ?>Độ bền: bền<br />
<?php endif; ?>
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />

<?php if ($this->_tpl_vars['app']['item']['kbn'] == 1 || $this->_tpl_vars['app']['item']['kbn'] == 2 || $this->_tpl_vars['app']['item']['kbn'] == 4): ?>
<div style="background-color:#993366;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
[Trạng thái đoàn quân]<br />
<?php if ($this->_tpl_vars['form']['unit'] <> ""): ?>
Số lượng mua: <span style="color:#ffff00;"><?php echo $this->_tpl_vars['form']['num']; ?>
</span><br />
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['qid'] == ""): ?>
<?php if ($this->_tpl_vars['app']['item']['money'] > 0): ?>
Vàng: <?php echo $this->_tpl_vars['app']['user']['money']; ?>
 &raquo; <span style="color:#ff0000;"><?php if ($this->_tpl_vars['app']['user']['money'] >= $this->_tpl_vars['app']['item']['money']): ?><?php echo $this->_tpl_vars['app']['after']['money']; ?>
<?php else: ?>không đủ<?php endif; ?></span><br />
<?php else: ?>
Ngọc: <?php echo $this->_tpl_vars['app']['user']['coin']; ?>
 &raquo; <span style="color:#ff0000;"><?php if ($this->_tpl_vars['app']['user']['coin'] >= ( $this->_tpl_vars['app']['item']['coin'] * $this->_tpl_vars['app']['item_num'] )): ?><?php echo $this->_tpl_vars['app']['after']['coin']; ?>
<?php else: ?>không đủ<?php endif; ?></span><br />
<?php endif; ?>
Đang có: <?php echo $this->_tpl_vars['app']['own']['num']; ?>
 &raquo; <span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['after']['own']; ?>
</span><br />

<?php endif; ?>
<?php if ($this->_tpl_vars['app']['item']['kbn'] == 4): ?>
Công lực: <?php echo $this->_tpl_vars['app']['nowOffPower']; ?>
<br />
Thủ lực: <?php echo $this->_tpl_vars['app']['nowDefPower']; ?>
<br />
<?php else: ?>
Công lực: <?php echo $this->_tpl_vars['app']['nowOffPower']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['nowOffPower'] < $this->_tpl_vars['app']['afterOffPower']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['afterOffPower']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['afterOffPower']; ?>
<?php endif; ?><br />
Thủ lực: <?php echo $this->_tpl_vars['app']['nowDefPower']; ?>
 &raquo; <?php if ($this->_tpl_vars['app']['nowDefPower'] < $this->_tpl_vars['app']['afterDefPower']): ?><span style="color:#ffff00;"><?php echo $this->_tpl_vars['app']['afterDefPower']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['app']['afterDefPower']; ?>
<?php endif; ?><br />
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" />
</div>
<?php elseif ($this->_tpl_vars['app']['item']['kbn'] == 's'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Thời hạn có hiệu lực 1 tháng<br />
<?php endif; ?>

<!--item riêng/ từng item-->
<?php if ($this->_tpl_vars['form']['md'] == 1): ?>
<?php if ($this->_tpl_vars['app']['item']['itemid'] == 115 || $this->_tpl_vars['app']['item']['itemid'] == 139 || $this->_tpl_vars['app']['item']['itemid'] == 140): ?>
<div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/gacha/?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['newss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['newss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">đến cửa hàng vé số Gacha</a>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
<?php elseif ($this->_tpl_vars['app']['item']['itemid'] == 116): ?>
<div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/my/rcv/index.php?ssid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['newss']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['newss'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Hồi phục năng lượng</a>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
<?php elseif ($this->_tpl_vars['app']['item']['itemid'] == 137 || $this->_tpl_vars['app']['item']['itemid'] == 138): ?>
<div style="text-align:center;">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp="/my/treasure.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chọn những báu vật có dán lá bùa</a>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
</div>
<?php endif; ?>
<?php endif; ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center;">
<?php if ($this->_tpl_vars['app']['qid'] == ""): ?>
<?php if ($this->_tpl_vars['app']['user']['money'] >= $this->_tpl_vars['app']['item']['money'] && $this->_tpl_vars['app']['item']['money'] > 0): ?>
<form action="<?php echo ((is_array($_tmp="/item/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="POST">
<input type="hidden" name="act" value="item_complete" />
<input type="hidden" name="q" value="<?php echo $this->_tpl_vars['app']['q']; ?>
" />
<input type="hidden" name="ev" value="<?php echo $this->_tpl_vars['form']['ev']; ?>
" />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['id']; ?>
" />
<input type="hidden" name="orgMoney" value="<?php echo $this->_tpl_vars['app']['user']['money']; ?>
" />
<input type="hidden" name="Money" value="<?php echo $this->_tpl_vars['app']['after']['money']; ?>
" />
<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['form']['num']; ?>
" />
<input type="hidden" name="orgOff" value="<?php echo $this->_tpl_vars['app']['nowOffPower']; ?>
" />
<input type="hidden" name="Off" value="<?php echo $this->_tpl_vars['app']['afterOffPower']; ?>
" />
<input type="hidden" name="orgDef" value="<?php echo $this->_tpl_vars['app']['nowDefPower']; ?>
" />
<input type="hidden" name="Def" value="<?php echo $this->_tpl_vars['app']['afterDefPower']; ?>
" />
<input type="hidden" name="kbnO" value="<?php echo $this->_tpl_vars['app']['kbnO']; ?>
" />
<input type="hidden" name="kbnD" value="<?php echo $this->_tpl_vars['app']['kbnD']; ?>
" />

<input type="hidden" name="orgNum" value="<?php echo $this->_tpl_vars['app']['own']['num']; ?>
" />
<input type="hidden" name="Num" value="<?php echo $this->_tpl_vars['app']['after']['own']; ?>
" />
<input type="hidden" name="ssid" value="<?php echo $this->_tpl_vars['app']['ssid']; ?>
" />
<input type="submit" value="Mua" />
</form>
<?php elseif ($this->_tpl_vars['app']['item']['money'] == 0 && $this->_tpl_vars['app']['item']['coin'] > 0 && $this->_tpl_vars['app']['user']['coin'] >= ( $this->_tpl_vars['app']['item']['coin'] * $this->_tpl_vars['app']['item_num'] )): ?>
<form action="<?php echo ((is_array($_tmp="/item/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="POST">
<input type="hidden" name="act" value="item_complete" />
<input type="hidden" name="q" value="<?php echo $this->_tpl_vars['app']['q']; ?>
" />
<input type="hidden" name="ev" value="<?php echo $this->_tpl_vars['form']['ev']; ?>
" />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['id']; ?>
" />
<input type="hidden" name="orgMoney" value="<?php echo $this->_tpl_vars['app']['user']['coin']; ?>
" /><input type="hidden" name="order" value="<?php echo $this->_tpl_vars['app'][$this->_tpl_vars['order']]; ?>
" />

<input type="hidden" name="unit" value="<?php echo $this->_tpl_vars['app'][$this->_tpl_vars['unit']]; ?>
" />

<input type="hidden" name="Money" value="<?php echo $this->_tpl_vars['app']['after']['coin']; ?>
" />
<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['form']['num']; ?>
" />
<input type="hidden" name="orgOff" value="<?php echo $this->_tpl_vars['app']['nowOffPower']; ?>
" />
<input type="hidden" name="Off" value="<?php echo $this->_tpl_vars['app']['afterOffPower']; ?>
" />
<input type="hidden" name="orgDef" value="<?php echo $this->_tpl_vars['app']['nowDefPower']; ?>
" />
<input type="hidden" name="Def" value="<?php echo $this->_tpl_vars['app']['afterDefPower']; ?>
" />
<input type="hidden" name="kbnO" value="<?php echo $this->_tpl_vars['app']['kbnO']; ?>
" />
<input type="hidden" name="kbnD" value="<?php echo $this->_tpl_vars['app']['kbnD']; ?>
" />

<input type="hidden" name="orgNum" value="<?php echo $this->_tpl_vars['app']['own']['num']; ?>
" />
<input type="hidden" name="Num" value="<?php echo $this->_tpl_vars['app']['after']['own']; ?>
" />
<input type="hidden" name="ssid" value="<?php echo $this->_tpl_vars['app']['ssid']; ?>
" />
<input type="submit" value="Mua" />
</form>
<?php endif; ?>
<?php endif; ?>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<?php if ($this->_tpl_vars['form']['md'] == 1): ?>
<?php if ($this->_tpl_vars['app']['item']['money'] > 0): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/item/?unit=1&order=1&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['item']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['item']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đến shop</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/item/?unit=2&order=1&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['item']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['item']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đến shop</a>
<?php endif; ?>
<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<a href="<?php echo ((is_array($_tmp="/item/?md=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quay lại đồ đang có</a>
<?php else: ?>
<?php if ($this->_tpl_vars['form']['q'] == ""): ?>
<?php if ($this->_tpl_vars['app']['item']['money'] > 0): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=1&order=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&kbn=") : smarty_modifier_cat($_tmp, "&kbn=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['item']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['item']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quay lại shop</a><br/>
<a href="<?php echo ((is_array($_tmp="/coin/convert.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tới trang đổi Ngọc</a><br/>
<a href="<?php echo ((is_array($_tmp="/quest/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tới trang Thử thách</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=2&order=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&kbn=") : smarty_modifier_cat($_tmp, "&kbn=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['item']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['item']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quay lại shop</a><br/>
<a href="<?php echo ((is_array($_tmp="/coin/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Tới trang mua Ngọc</a>
<?php endif; ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 26)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['form']['ev'] == ""): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/quest/disp.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Về Thử thách</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/event/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['ev']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['ev'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "/detail.php?id=") : smarty_modifier_cat($_tmp, "/detail.php?id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['q']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['q'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&ssid=") : smarty_modifier_cat($_tmp, "&ssid=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['ssid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['ssid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quay trở lại event</a>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<br /><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
</div>

<!-- footer -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#ff9900;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
</body>
</html>