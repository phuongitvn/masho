<?php
/**
 *  Gacha/Do.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_GachaDo extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
		"opensocial_owner_id" => array(),
        "ssid" => array(),
        "kb" => array(),
    );


}

class M_Action_GachaDo extends M_ActionClass
{
    /**
     *  preprocess gacha_index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            return 'error';
        }
        $sample = $this->af->get('sample');
        return null;
        */

        return parent::prepare();
    }

    /**
     *  Do action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $member_id = $this->af->get('opensocial_owner_id');
        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

        $kb = $this->af->get('kb');
        $ssid = $this->af->get('ssid');

		//ガチャ札115
		$gachaId = $this->config->get('gachaItemid');
		//ガチャ札Free139
		$gachaFreeId = $this->config->get('gachaFreeItemid');
		//ガチャ札GOLD140 
		$gachaGoldId = $this->config->get('gachaGoldItemid');
		//ガチャ札Pt141
		$gachaPtId = $this->config->get('gachaPtItemid');

		//ガチャ札の数
		$gcnt = $itemManager->getKbn4Count($member_id,$gachaId);
		//ガチャ札Freeの数
		$gFcnt = $itemManager->getKbn4Count($member_id,$gachaFreeId);
		//ガチャ札GOLDの数
		$gGcnt = $itemManager->getKbn4Count($member_id,$gachaGoldId);
		//ガチャ札ぷらちなの数
		$gPcnt = $itemManager->getKbn4Count($member_id,$gachaPtId);

		if($kb == ""){
			if($gcnt == 0 && $gFcnt == 0){
				if( $gPcnt == 0){
					$kb = "gG";
				}elseif( $gGcnt == 0){
					$kb = "gP";
				}
			}
		}

		$swfmillManager = $this->backend->getManager('Swfmill');
		$param = "ssid%3D".$ssid."%26kb%3D".$kb;
		$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fgacha%2Flot.php%3F".$param;

		// XMLコンパイル
		if($kb == "gP"){
			$xmlString = $swfmillManager->compileXml('gacha3.xml', $replaceStrings);
		}elseif($kb == "gG"){
			$xmlString = $swfmillManager->compileXml('gacha2.xml', $replaceStrings);
		}else{
			$xmlString = $swfmillManager->compileXml('gacha.xml', $replaceStrings);
		}
		// XML出力実行
		$swfmillManager->executeSwfmill($xmlString);
	}
}

?>