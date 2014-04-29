<?php
/**
 *  Card/Wish/Cc.php
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
class M_Form_CardWishCc extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "bid" => array(),
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
class M_Action_CardWishCc extends M_ActionClass
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

        $member_id = $this->af->get('opensocial_owner_id');

        $bid = $this->af->get('bid');
        $card = $cardManager->getCardAtt($bid);
        $this->af->setApp("name", $card['name']);
        $this->af->setApp("rank", $card['rank']);

		$wish1 = $cardManager->getWishlistCount($member_id ,$status="0" ,$card['seq'] ,$card['rank']);

        if($wish1 == 1){
		
	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
	        $params = array();
        	$params["memberid"] = $member_id;
        	$params["seq"]  = $card['seq'];
        	$params["rank"] = $card['rank'];
        	$params["status"] = 1;
			$ret3 = $cardManager->updateWishStatus($params);

	        if($ret3 === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
		}

        return 'card_wish_cc';
    }
}

?>
