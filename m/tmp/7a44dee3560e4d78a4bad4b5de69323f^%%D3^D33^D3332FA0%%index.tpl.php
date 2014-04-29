<?php /* Smarty version 2.6.26, created on 2014-04-29 17:37:42
         compiled from login/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cnvgw', 'login/index.tpl', 17, false),array('modifier', 'escape', 'login/index.tpl', 17, false),array('function', 'message', 'login/index.tpl', 17, false),)), $this); ?>
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

</style></head><body style="font-family:Tahoma;color:#000000;word-wrap: break-word; background:#000000; color:#FFFFFF;"><a name="top" id="top"></a><div style="margin:0;">    <div style="background-color:#ff0000;height:22px;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1"></div>    <div style="height:22px;text-align:center; background-color:#820000;">Đăng nhập</div>    <div style="background-color:#ff0000;height:22px;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1"></div>    <a href="<?php echo ((is_array($_tmp="/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/top_<?php echo $this->_tpl_vars['app']['st']; ?>
<?php echo $this->_tpl_vars['app']['ran']; ?>
.gif" width="240" /></a><br />    <div style="height:22px; background:#F5F5F5;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1"></div><div style="background-color:#000049; padding:10px;">Lãnh đạo đội quân chiến đấu? Thực hiện thử thách? Liên kết với đồng minh đánh bại kẻ thù? Đăng nhập bằng tài khoản Linh Triều Bình Ca để trải qua những cảm giác thú vị đó</div>    <div style="height:22px; background:#F5F5F5;"><img src="http://<?php echo $this->_tpl_vars['app']['domain']['img']; ?>
/spacer.gif" width="1" height="1"></div>    <div style="height:22px;text-align:center; background-color:#820000;">Đăng nhập</div>    <div style="padding-left:5px;"><form action="<?php echo ((is_array($_tmp="/login/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" method="post">    	<div style="padding:10px 0px 0px 0px;color:#FFFF00;">Tên đăng nhập</div>        <div><input name="id" type="text" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; font-weight:bold;padding:3px 2px;margin:5px 0 3px 0;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['app']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></div><?php if (is_error ( 'id' )): ?><div style="color:red"><?php echo smarty_function_message(array('name' => 'id'), $this);?>
</div><?php endif; ?>        <div style="padding:6px 0px 0px 0px;color:#FFFF00;">Mật khẩu</div>        <div><input name="pwd" type="password" style="width:90%; background:#D1F3F8; border:1px #7CC6DE solid; padding:3px 2px;margin:5px 0 3px 0;" /></div><?php if (is_error ( 'pwd' )): ?><div style="color:red"><?php echo smarty_function_message(array('name' => 'pwd'), $this);?>
</div><?php endif; ?>        <div style="text-align:center; padding:10px 0px;"><input name="btn" type="submit" value="Đăng nhập" style="cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#51111E;" /></div>    </form>    </div>    <div style="text-align:center;"><a href="<?php echo ((is_array($_tmp="/login/Forgot.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Quên mật khẩu</a> |<a href="<?php echo ((is_array($_tmp="/login/signup.php")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
">Đăng ký</a></div>    <div style="text-align:center;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "parts/emoji_vn.tpl", 'smarty_include_vars' => array('id' => 2)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><a href="<?php echo ((is_array($_tmp="/")) ? $this->_run_mod_handler('cnvgw', true, $_tmp) : smarty_modifier_cnvgw($_tmp)); ?>
" accesskey="1">Trang chủ</a></div></div></body></html>