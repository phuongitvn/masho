<?php
/**
 *  Card/Wish/Complete.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_rcv_complete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_CardWishComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "bseq" => array(),
        "bid" => array(),
        "rank" => array(),
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
 *  my_rcv_complete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardWishComplete extends M_ActionClass
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
     *  my_rcv_complete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {

        $cardManager = $this->backend->getManager("Card");
        $lgManager = $this->backend->getManager("Lg");
        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $bid = $this->af->get('bid');
        $seq = $this->af->get('bseq');
        $rank = $this->af->get('rank');
        $this->af->setApp("rank", $rank);
        $card = $cardManager->getCardAtt($bid);
        $this->af->setApp("name", $card['name']);

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

		$wish1 = $cardManager->getWishlistCount($member_id ,$status="0" ,$seq ,$rank);
		$wish = $cardManager->getWishlistCount($member_id ,$status="0" ,$nseq="" ,$nrank="");
        $this->af->setApp("wish", $wish);

		//ナビゲーション用
        $cnt['file'] = $cardManager->getCardlistCount($member_id ,$status="1");
        $cnt['pre']  = $cardManager->getCardlistCount($member_id ,$status="2");
        $this->af->setApp("cnt", $cnt);

        if($isReload == True){
            //return 'error_reload';
		}elseif($wish1 == 1){
			//重複でNG
			$this->af->setApp("err", "1");
		}elseif($wish == 3){
			//登録できない
			$this->af->setApp("err", "3");
        }else{

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }

			//t_wish へINSERT
			$ret1 = $cardManager->wishCardInsert($member_id ,$status="0" ,$seq, $rank);
			//lg_friend(同盟通信)
			$ret2 = $lgManager->writeFriendLog($member_id ,$status="2",$stage="",$seriesid="",$trid="",$seq,$rank);
			//ssid登録
	        $ret3 = $cardManager->updSession($member_id ,$ss_id);

	        if($ret1 === False || $ret2 === False || $ret3 === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
		}

        return 'card_wish_complete';
    }
}

?>
