<?php
/**
 *  Help/Entry.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  help_entry form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_HelpEntry extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "id" => array(),
        "oid" => array(),
        "fid" => array(),
    );


}

/**
 *  help_entry action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_HelpEntry extends M_ActionClass
{
    /**
     *  preprocess help_entry action.
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
     *  Entry action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $userManager = $this->backend->getManager("User");
        $lgManager = $this->backend->getManager("Lg");
		$treasureManager = $this->backend->getManager("Treasure");

        $member_id = $this->af->get('opensocial_owner_id');
        $friend_id = $this->af->get('fid');
        $other_id = $this->af->get('oid');
        $ddn = $this->af->get('id');

		//lg_help 取得
		$help = $lgManager->getHelpLog($friend_id ,$other_id,$ddn);
		$this->af->setApp("help", $help);

		//お宝個別情報
		if($help['trid'] != ""){
			$tr = $treasureManager->TrDtInfo($help['trid']);
			$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
			$this->af->setApp("tr", $tr);
			$this->af->setApp("sr", $sr);
		}
		//助太刀した人の情報
		if($help['friendid'] != ""){
			$fr_profile = $userManager->getSimpleProfile($help['friendid']);
			$this->af->setApp("fr_profile", $fr_profile);
		}
        $profile = $userManager->getSimpleProfile($friend_id);
        $ot_profile = $userManager->getSimpleProfile($other_id);
		$this->af->setApp("profile", $profile);
		$this->af->setApp("ot_profile", $ot_profile);

        return 'help_entry';
    }
}

?>
