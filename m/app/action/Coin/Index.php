<?php
/**
 *  Coin/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_CoinIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
		"ss" => array(),
    );

}

/**
 *  coin_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CoinIndex extends M_ActionClass
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
     *  coin_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $member_id = $this->af->get('opensocial_owner_id');
        //プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
        $profile = $userManager->getProfile($member_id);
		$this->af->setApp("tut_num", $profile['tut_num']);
    	$this->af->setApp("profile", $profile);
        $deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("deck", $deck);
		$nextExp = $userManager->getNextExpContByLevel($profile['level']);
			$diffExp = $nextExp - $profile['exp'];
			$this->af->setApp("diffExp", $diffExp);
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp("card", $card);
	    return 'coin_index';
		}


 }


?>
