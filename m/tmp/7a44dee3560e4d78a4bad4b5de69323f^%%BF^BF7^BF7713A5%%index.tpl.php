<?php /* Smarty version 2.6.26, created on 2013-11-13 23:20:42
         compiled from item/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'item/index.tpl', 32, false),array('modifier', 'cnvgw', 'item/index.tpl', 32, false),array('modifier', 'number_format', 'item/index.tpl', 88, false),array('modifier', 'default', 'item/index.tpl', 96, false),array('function', 'cycle', 'item/index.tpl', 72, false),)), $this); ?>
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

<div style="background-color:#ff0000;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<div style="text-align:center; background-color:#<?php if ($this->_tpl_vars['app']['md'] == 1): ?>993366<?php else: ?>ff9900<?php endif; ?>;"><?php if ($this->_tpl_vars['app']['md'] == 1): ?>Kho quân khí <?php echo $this->_tpl_vars['app']['user']['handle']; ?>
<?php else: ?>Shop<?php endif; ?></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php if ($this->_tpl_vars['app']['md'] != 1): ?>
<div style="text-align:center;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/hdr/item.gif" width="240" height="60" /></div>
<?php endif; ?>

<div style="background-color:#333333;">
<?php if ($this->_tpl_vars['app']['kbn'] == "" || $this->_tpl_vars['app']['kbn'] == 1): ?>
<div style="text-align:center">Vũ Khí / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?kbn=2&unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đồ phòng thủ</a> / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?kbn=4&unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Khác</a></div>
<?php elseif ($this->_tpl_vars['app']['kbn'] == 2): ?>
<div style="text-align:center"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?kbn=1&unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Vũ Khí</a> / Đồ phòng thủ / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?kbn=4&unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Khác</a></div>
<?php elseif ($this->_tpl_vars['app']['kbn'] == 4): ?>
<div style="text-align:center"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?kbn=1&unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Vũ Khí</a> / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?kbn=2&unit=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đồ phòng thủ</a> / Khác</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['app']['md'] == 1): ?>
<?php if ($this->_tpl_vars['app']['unit'] == 3): ?>
<div style="text-align:center">Đồ mua / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=4&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Chiến lợi phẩm</a></div>
<?php elseif ($this->_tpl_vars['app']['unit'] == 4): ?>
<div style="text-align:center"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=3&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đồ mua</a> / Chiến lợi phẩm</div>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['app']['unit'] == "" || $this->_tpl_vars['app']['unit'] == 1): ?>
<div style="text-align:center">Vàng / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=2&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Ngọc</a></div>
<?php elseif ($this->_tpl_vars['app']['unit'] == 2): ?>
<div style="text-align:center"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?unit=1&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Vàng</a> / Ngọc</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['order'] == "" || $this->_tpl_vars['app']['order'] == 1): ?>
<div style="text-align:center"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?order=2&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&unit=") : smarty_modifier_cat($_tmp, "&unit=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đắt</a> / Rẻ</div>
<?php elseif ($this->_tpl_vars['app']['order'] == 2): ?>
<div style="text-align:center">Đắt / <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="/item/?order=1&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&unit=") : smarty_modifier_cat($_tmp, "&unit=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Rẻ</a></div>
<?php endif; ?>
<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['app']['unit'] == "" || $this->_tpl_vars['app']['unit'] == 1): ?>
Số Vàng sở hữu: <?php echo $this->_tpl_vars['app']['user']['money']; ?>
 <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" />
<?php elseif ($this->_tpl_vars['app']['unit'] == 2): ?>
Số Ngọc sở hữu: <?php echo $this->_tpl_vars['app']['user']['coin']; ?>
 <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/ngoc.gif" width="10" height="8" />
<?php endif; ?>

<div style="background-color:#ffffff;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>

<?php if ($this->_tpl_vars['app']['item']): ?>
<div>Đang có <?php echo $this->_tpl_vars['app']['navi']['lines']['total']; ?>
 / Hiển thị <?php echo $this->_tpl_vars['app']['navi']['lines']['from']; ?>
-<?php echo $this->_tpl_vars['app']['navi']['lines']['to']; ?>
 </div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /><br />
<!-- * -->
<?php $_from = $this->_tpl_vars['app']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div style="background-color:<?php echo smarty_function_cycle(array('values' => "#000000;,#000000;"), $this);?>
">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="80"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/item/<?php echo $this->_tpl_vars['item']['itemid']; ?>
.gif" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" width="70" height="70" /></td>
<td width="120"><span style="font-size:x-small;">
<?php if ($this->_tpl_vars['app']['md'] <> 1): ?>
<?php if ($this->_tpl_vars['app']['unit'] == "" || $this->_tpl_vars['app']['unit'] == 1): ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/item/confirm.php?unit=1&num=1&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['itemid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['itemid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/item/confirm.php?unit=2&num=1&id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['itemid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['itemid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">
<?php endif; ?>
<?php endif; ?>
<?php echo $this->_tpl_vars['item']['name']; ?>
</a><br />

<?php if ($this->_tpl_vars['app']['md'] <> 1): ?>
<?php if ($this->_tpl_vars['app']['unit'] == "" || $this->_tpl_vars['app']['unit'] == 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Giá: <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['money'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/vang.gif" width="10" height="8" /><br />
<?php elseif ($this->_tpl_vars['app']['unit'] == 2): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 22)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Giá: <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['coin'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 <img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/ngoc.gif" width="10" height="8" /><br />
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['app']['kbn'] == 1 || $this->_tpl_vars['app']['kbn'] == 2): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 31)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Công <?php echo $this->_tpl_vars['item']['offense']; ?>
 / Thủ <?php echo $this->_tpl_vars['item']['defense']; ?>
<br />
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji.tpl", 'smarty_include_vars' => array('id' => 16)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>Đang có: <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['num'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
<br />

<?php if ($this->_tpl_vars['app']['md'] <> 1): ?>
<?php if ($this->_tpl_vars['app']['unit'] == "" || $this->_tpl_vars['app']['unit'] == 1): ?>

<?php if ($this->_tpl_vars['item']['max'] == 0): ?>
<span style="color:#ff0000;">Bạn không đủ <a href="<?php echo ((is_array($_tmp="/coin/convert.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Vàng</a></span>
<?php else: ?>
<form action="<?php echo ((is_array($_tmp="/item/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="POST">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/maxitem.tpl", 'smarty_include_vars' => array('max' => $this->_tpl_vars['item']['max'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="act" value="item_confirm" />
<input type="hidden" name="unit" value="1" />
<input type="hidden" name="order" value="<?php echo $this->_tpl_vars['app']['order']; ?>
" />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['itemid']; ?>
" />
<input type="submit" value="Mua" />
</form>
<?php endif; ?>

<?php elseif ($this->_tpl_vars['app']['unit'] == 2): ?>
<?php if ($this->_tpl_vars['item']['max'] == 0): ?>
<span style="color:#ff0000;">Bạn không đủ <a href="<?php echo ((is_array($_tmp="/coin/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Ngọc</a></span>
<?php else: ?>
<form action="<?php echo ((is_array($_tmp="/item/index.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="POST">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/maxitem.tpl", 'smarty_include_vars' => array('max' => $this->_tpl_vars['item']['max'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="act" value="item_confirm" />
<input type="hidden" name="unit" value="2" />
<input type="hidden" name="order" value="<?php echo $this->_tpl_vars['app']['order']; ?>
" />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['itemid']; ?>
" />
<input type="submit" value="Mua" />
</form>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
</span>
</td></tr>
</table>

</div>

<?php endforeach; endif; unset($_from); ?>
<!-- * -->
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="5" /><br />
<div style="text-align:center">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/pager.tpl", 'smarty_include_vars' => array('url' => "/item/",'parm' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['kbn'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&unit=") : smarty_modifier_cat($_tmp, "&unit=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['unit']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['unit'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&order=") : smarty_modifier_cat($_tmp, "&order=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['order']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['order'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "&md=") : smarty_modifier_cat($_tmp, "&md=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['md']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['md'])))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php else: ?>
<div style="text-align:center">
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<?php if ($this->_tpl_vars['app']['md'] == 1): ?>
<span style="color:#ff0000;">Bạn chưa có món đồ nào</span><br />
<?php else: ?>
<span style="color:#ff0000;">Với LV hiện tại, bạn không thể mua món đồ nào</span><br />
<?php endif; ?>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['app']['md'] == 1): ?>
<div style="background-color:#993366;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="2" /><br />
<?php endif; ?>

<div style="text-align:center">
<?php if ($this->_tpl_vars['form']['md'] == 1 && $this->_tpl_vars['form']['unit'] != 4): ?>
<?php if ($this->_tpl_vars['form']['kbn'] == ""): ?>
<a href="<?php echo ((is_array($_tmp="/item/?unit=1&order=1&kbn=1")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Shop</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/item/?unit=1&order=1&kbn=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['kbn']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['kbn'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Shop</a>
<?php endif; ?>
<?php endif; ?>
<br />
</div>

<img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="10" /><br />
<div style="background-color:#<?php if ($this->_tpl_vars['app']['md'] == 1): ?>993366<?php else: ?>ff9900<?php endif; ?>;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1" /></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>