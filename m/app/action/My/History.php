<?php
/**
 *  My/History.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_MyHistory extends M_ActionForm
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
 *  my_history action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyHistory extends M_ActionClass
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
     *  my_history action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");
        $friendManager = $this->backend->getManager("Friend");
        $questManager = $this->backend->getManager("Quest");
		$treasureManager = $this->backend->getManager("Treasure");

        $member_id = $this->af->get('opensocial_owner_id');
        //プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
        $profile = $userManager->getProfile($member_id);
        $deck = $userManager->getDeckProfile($member_id);
		$profile['fight_num'] = $profile['win'] + $profile['lose'];

		//合成詳細
		$profile['total_lvcomp'] = $profile['ok_compose'] + $profile['ng_compose'];
		$profile['total_ptcomp'] = $profile['ok_pcomp'] + $profile['ng_pcomp'];
		$profile['total_comp'] = $profile['total_lvcomp'] + $profile['total_ptcomp'];

        $this->af->setApp("deck", $deck);
        $this->af->setApp("profile", $profile);
		//同盟数
        $nums['friend'] = $friendManager->getFriendlistCount($member_id ,$status="2",$kbn="");
		$nums['max'] = $userManager->getMaxFriendContByLevel($profile['level']);
        $this->af->setApp("nums", $nums);
		//アイテム
		$sum1 = $itemManager->getMyItemSum($member_id ,$dispKbn="1",$unit);	//保有武器アイテムの個数の合計
		$sum2 = $itemManager->getMyItemSum($member_id ,$dispKbn="2",$unit);	//保有防具アイテムの個数の合計
        $this->af->setApp("sum1", $sum1);
        $this->af->setApp("sum2", $sum2);

		//クエストの状況
		$quest['archieve'] = $questManager->getQuestArchieve($member_id);
		$quest['stagename'] = $userManager->getStageName($profile['stage']);
		$quest['clear'] = $userManager->getClearStageName($profile['stage']);
		$this->af->setApp("quest", $quest);

		//欲しいカード
		$wlist = $cardManager->getWishlist($member_id ,$status="0" ,$seq="" ,$rank="",$friend_id="");
		$wlist_num = count($wlist);
		$this->af->setApp("wlist", $wlist);
		$this->af->setApp("wlist_num", $wlist_num);
        //ファイルデッキのカードリスト
        $cntF = $cardManager->getCardlistCount($member_id ,$status="1");
		$this->af->setApp("cntF", $cntF);
		//お宝関連
		$maxTr = $treasureManager->TrSerindNum($series_id="");
		$numChk = $treasureManager->getTrcoNum($member_id);
		$numChk['archieve'] = floor($numChk['OwnNum']/$maxTr*100);
		$this->af->setApp("numChk", $numChk);

        return 'my_history';
    }
}

?>
