<?php
function smarty_modifier_id2smsid($id)
{
	$smsid = base_convert($id, 10, 36);
	while (strlen($smsid) < 4) {
		$smsid = '0'.$smsid;
	}
	return $smsid;
}
?>