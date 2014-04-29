<?php
function smarty_modifier_date_format2($string)
{
	static $t_now;
	if (is_null($t_now))
		$t_now = time();

	$t = strtotime($string);
	$tdiff = $t_now - $t;
	if ($tdiff > 24 * 60 * 60) {
		return date('H:i d/m', $t);
	} else if ($tdiff > 60 * 60) {
		return floor($tdiff / 60 / 60) . ' Giờ trước';
	}
	return floor($tdiff / 60) . ' Phút trước';
}
