<?php
class M_Plugin_Filter_Output extends Ethna_Filter
{
    function prefilter()
    {
        ob_start(array($this, '_callback'));
    }

    function postfilter()
    {
        ob_end_flush();
    }

   function _callback($content)
    {
		return mb_convert_kana($content, "krn", 'SJIS-WIN');
		/* viola ADD
        $carrierNo = $this->backend->useragent->getAgentType();

		if($carrierNo == 3){
			return mb_convert_kana($content, "krn", 'UTF-8');
		}else{
			return mb_convert_kana($content, "krn", 'SJIS-WIN');
		}
		*/

    }
}
?>
