<?php
function smarty_modifier_smsid2id($smsid) {
 return base_convert($smsid, 36, 10);
}
?>