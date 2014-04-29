<?php
/**
 *  My/Power.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_power Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyPower extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
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
 *  my_power action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyPower extends M_ActionClass
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
     *  my_power action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");
        $member_id = $this->af->get('opensocial_owner_id');

        //プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
        $profile = $userManager->getProfile($member_id);
        $deck = $userManager->getDeckProfile($member_id);
		//武将名とランクを取得
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp("card", $card);
        $this->af->setApp("deck", $deck);


		$sum1 = $itemManager->getMyItemSum($member_id ,$dispKbn="1",$unit);	//保有武器アイテムの個数の合計
		$sum2 = $itemManager->getMyItemSum($member_id ,$dispKbn="2",$unit);	//保有防具アイテムの個数の合計
        $this->af->setApp("sum1", $sum1);
        $this->af->setApp("sum2", $sum2);

		//げんきの内訳 (11/1/11)
		$profile['lv_genki'] = $profile['max_genki'] - $profile['inv_cnt'];
        $this->af->setApp("profile", $profile);

        return 'my_power';
    }
}

?>
