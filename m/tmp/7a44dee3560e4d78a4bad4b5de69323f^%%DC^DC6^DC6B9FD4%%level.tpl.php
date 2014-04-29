<?php /* Smarty version 2.6.26, created on 2013-11-13 23:29:11
         compiled from ranking/level.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'ranking/level.tpl', 27, false),array('modifier', 'cnvgw', 'ranking/level.tpl', 27, false),array('modifier', 'escape', 'ranking/level.tpl', 27, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Linh Triều Bình Ca</title>
<style type="text/css">
<?php echo '
a:link{color:#ffff00;}
a:visited{color:#ffff00;}
'; ?>

</style>
</head>

<body style="background:#000000; color:#FFFFFF;">
<div style="font-size:x-small;">
	<div style="background-color:#CC6699;color:#000000;text-align:center; padding:3px;">Top 100 cao thủ</div>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="40" height="27" align="left" valign="middle">&nbsp;Rank</td>
		<td align="left" valign="middle">User name</td>
		<td width="44" align="center" valign="middle">Level</td>
	</tr>
	<tr>
		<td width="40" height="26" align="center" valign="top" style="color:#33FFFF;">1</td>
		<td align="left" valign="top"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/index.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['app']['top_user']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['app']['top_user']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" style="color:#FFFF00;"><?php echo ((is_array($_tmp=$this->_tpl_vars['app']['top_user']['handle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
		<td width="44" align="center" valign="top"><?php echo $this->_tpl_vars['app']['top_user']['level']; ?>
</td>
	</tr>
	<tr>
		<td height="0"></td>
		<td></td>
		<td></td>
	</tr>
	</table>

	<div style="text-align:center; background-color:#cccccc; ">&nbsp;</div>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php $_from = $this->_tpl_vars['app']['ranking']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ranking_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ranking_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ranking_user']):
        $this->_foreach['ranking_loop']['iteration']++;
?>
	<tr>
		<td width="40" height="26" align="center" valign="middle" style="color:#33FFFF;"><?php echo $this->_foreach['ranking_loop']['iteration']+1; ?>
</td>
		<td align="left" valign="middle"><a href="<?php echo ((is_array($_tmp=((is_array($_tmp="/other/index.php?id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['ranking_user']['memberid']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['ranking_user']['memberid'])))) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" style="color:#FFFF00;"><?php echo $this->_tpl_vars['ranking_user']['handle']; ?>
</a></td>
		<td width="44" align="center" valign="middle"><?php echo $this->_tpl_vars['ranking_user']['level']; ?>
</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	</table>

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