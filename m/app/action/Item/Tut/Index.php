<?php
/**
 *  Item/Tut/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  item_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_ItemTutIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "md" => array(),
        "p" => array(),
        "kbn" => array(),
        "unit" => array(),
        "order" => array(),
        "ssid" => array(),
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  item_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_ItemTutIndex extends M_ActionClass
{
    /**
     *  preprocess item_index action.
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
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $itemManager = $this->backend->getManager("Item");
        $cardManager = $this->backend->getManager("Card");

        $member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
    	$this->af->setApp("tut_num", $profile['tut_num']);

		if($profile['tut_num'] <= 11){
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
    		return 'item_tut_index';
		}elseif($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
	        $this->af->setApp("profile", $profile);
			$card = $cardManager->getCardAtt($profile['prof']);
			$this->af->setApp("card", $card);
			$stage = $userManager->getStageName($profile['stage']);
			$this->af->setApp("stage", $stage);
	    	return 'my_indextutf';
		}else{
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
	        $this->af->setApp("profile", $profile);
			$card = $cardManager->getCardAtt($profile['prof']);
			$this->af->setApp("card", $card);
			$stage = $userManager->getStageName($profile['stage']);
			$this->af->setApp("stage", $stage);
	    	return 'my_index';
		}


    }
}

?>
