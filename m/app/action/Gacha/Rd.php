<?php
/**
 *  Gacha/Rd.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_GachaRd extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
		"opensocial_owner_id" => array(),

    );


}

class M_Action_GachaRd extends M_ActionClass
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
     *  Rd action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $member_id = $this->af->get('opensocial_owner_id');
        $cardManager = $this->backend->getManager("Card");
		$domain = $this->config->get("url");
		$www = $domain['www'];

        //リロード対策(ガチャ)
		$ssid = $cardManager->getSsId();
		$endUrl = "?url=http%3A%2F%2F".$www."%2Fgacha%2Findex.php%3Fssid%3D" .$ssid;

		//指定URLへの遷移(302)
		header("Location: $endUrl");
		exit;

    }
}

?>
