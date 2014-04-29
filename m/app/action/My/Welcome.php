<?php
/**
 *  My/Welcome.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_MyWelcome extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
    );

}

/**
 *  my_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyWelcome extends M_ActionClass
{
    /**
     *  preprocess of my_p_day Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  my_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $questManager = $this->backend->getManager("Quest");
        $member_id = $this->af->get('opensocial_owner_id');

        $profile = $userManager->getProfile($member_id);
        $deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("deck", $deck);
		//武将名とランクを取得
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp("card", $card);
		//現在ステージ名＋色の取得
		$stage = $userManager->getStageName($profile['stage']);
		$this->af->setApp("stage", $stage);
		$color = $userManager->getStageColor($profile['stage']);
		$this->af->setApp("color", $color);
		$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
		$this->af->setApp("title", $title);

		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);
        $this->af->setApp("profile", $profile);
        return 'my_indextutl';


    }
}

?>
