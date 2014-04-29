<?php
/**
 *  Card/Chg.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_chg form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardChg extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
		"deck" => array(),
		"seq" => array(),
    );

}

/**
 *  card_chg action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardChg extends M_ActionClass
{
    /**
     *  preprocess card_chg action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {

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
        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");
        $fightManager = $this->backend->getManager("Fight");
        $questManager = $this->backend->getManager("Quest");

        $member_id = $this->af->get('opensocial_owner_id');
        $deckno = $this->af->get('deck');
        $seq    = $this->af->get('seq');
		$no = "deck".$deckno;

		//デッキ位置からカードseq割り出し
		$org = $userManager->getDeckProfile($member_id);

		//seq がデッキに無いかCHK
		if($seq == $org['deck1'] || $seq == $org['deck2'] || $seq == $org['deck3'] || $seq == $org['deck4'] || $seq == $org['deck5']){
        	$this->af->setApp("err", "deck");
	        return 'card_404';
		}

		//外されるカード
		$minus = $cardManager->getCardInfo($member_id , $org[$no] , 0);
		//追加されるカード
		$plus  = $cardManager->getCardInfo($member_id , $seq , 1);

        //デッキ位置のカードをファイルへ　status0->1
        $card = array();
        $card["memberid"] = $member_id;
        $card["cardseq"]  = $org[$no];
        $card["status"]   = '1';

		//t_userのデッキ情報を更新
        $user = array();
        $user["memberid"] = $member_id;
        $user[$no]  	  = $seq;
		if($deckno == 1){
			$after = $cardManager->getCardInfo($member_id , $seq , 1);
	        $user["prof"]   = $after['bushoid'];
		}
		//デッキの合計値の加減
		$user["follower"] = $plus['follower'] - $minus['follower'];
		$user["offense"]  = $plus['offense'] - $minus['offense'];
		$user["defense"]  = $plus['defense'] - $minus['defense'];

		//ファイルをその位置のデッキへ status1->0
        $ncard = array();
        $ncard["memberid"] = $member_id;
        $ncard["cardseq"]  = $seq;
        $ncard["status"]   = '0';

        //トランザクション開始
        $db = $this->backend->getDb();
        $ret = $db->query('START TRANSACTION');
        if($ret == False){
            return 'error_sys';
        }

		//t_cardとt_user を併せて更新
        $ret0 = $cardManager->updateCardStatus($card);
        $ret1 = $userManager->updateUser($user);
        $ret2 = $cardManager->updateCardStatus($ncard);

        if($ret0 === False || $ret1 === False || $ret2 === False){
            $db->query('ROLLBACK');
            return 'error_sys';
        }

        //トランザクション終了
        $ret = $db->query('COMMIT');
        if($ret === False){
            return 'error_sys';
        }

		$msg = "Thay Card thành công!";
        $this->af->setApp("msg", $msg);

        //デッキ情報取得
        $deck = $userManager->getDeckProfile($member_id);
        $this->af->setApp("deck", $deck);

		for ($i=1; $i<=5; $i++) {
			$d = "deck".$i;
			//カード情報取得(t_card)
	        $card[$i] = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$bid[$i]  = $card[$i]['bushoid'];
			
			//武将属性取得
			$tmpCard = $cardManager->getCardAtt($bid[$i]);
			$disp[$i] = $tmpCard['nameRank'];
			//陣形効果用(デッキのarray の武将連番、ランク、性別、奥義タイプ取得)
			$deckCard['bushoseq'][$i] = $tmpCard['seq'];
			$deckCard['rank'][$i]     = $tmpCard['rank'];
			$deckCard['gender'][$i]   = $tmpCard['gender'];
			$deckCard['sec_kbn'][$i]  = $tmpCard['sec_kbn'];

		}

		//陣形効果No算出
		$form = $cardManager->getFormNo($deckCard);
		//リアリティ処理
		$afterP = $cardManager->getMaxPower($member_id);
		//ユーザテーブルt_user更新
        $userF = array();
        $userF["buki_off"]  = $afterP["buki_off"];
        $userF["buki_def"]  = $afterP["buki_def"];
        $userF["bougu_off"] = $afterP["bougu_off"];
        $userF["bougu_def"] = $afterP["bougu_def"];
        $userF["memberid"] = $member_id;
        $userF["formno"]   = $form['formno'];
        $retF = $userManager->updateUser($userF);
        if($retF === False){
            return 'error_sys';
        }

        //ファイルデッキのカードリスト
        $status = "1";
        $cntF = $cardManager->getCardlistCount($member_id ,$status);
        //プレゼント箱のカードリスト
        $status = "2";
        $cntP = $cardManager->getCardlistCount($member_id ,$status);

		//魔将出現条件
		$profile = $userManager->getProfile($member_id);
		if( $profile['cl_cycle'] > $profile['cl_masho']){
			$masho = $questManager->getMasho($profile['stage'],$profile['cl_cycle']);
        	$this->af->setApp("masho", $masho);
		}

        $this->af->setApp("cntF", $cntF);
        $this->af->setApp("cntP", $cntP);
        $this->af->setApp("bid", $bid);
        $this->af->setApp("disp", $disp);
        $this->af->setApp("card", $card);
        $this->af->setApp("form", $form);

        return 'card_deck';
    }
}

?>
