<?php
/**
 *  Help/Request.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  help_request form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_HelpRequest extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
		"oid" => array(),
		"ts" => array(),
		"tid" => array(),
    );


}

/**
 *  help_request action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_HelpRequest extends M_ActionClass
{
    /**
     *  preprocess help_request action.
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
     *  Request action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('oid');
        $times = $this->af->get('ts');
        $tr_id = $this->af->get('tid');
        $profile = $userManager->getProfile($member_id);

		$nums['friend'] = $friendManager->getFriendlistCount($member_id ,$status="2",$kbn="");
		$this->af->setApp("nums", $nums);

        if($nums['friend'] > 0){
			//助太刀依頼送信
			$list = $friendManager->reqHelpFight($member_id, $other_id,$times,$tr_id, $limit="10");
		}

        $this->af->setApp("list", $list);

        return 'help_request';
    }
}

?>
