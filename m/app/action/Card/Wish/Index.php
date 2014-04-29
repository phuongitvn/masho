<?php
/**
 *  Card/Wish/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_rcv_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_CardWishIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
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
 *  my_rcv_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardWishIndex extends M_ActionClass
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
     *  my_rcv_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $cardManager = $this->backend->getManager("Card");
        $member_id = $this->af->get('opensocial_owner_id');

		$wlist = $cardManager->getWishlist($member_id ,$status="0" ,$seq="" ,$rank="",$friend_id="");	//status　0:登録時 1:中止　2:プレゼント
		$rNum = 3 - count($wlist);
        $this->af->setApp("rNum", $rNum);
        $this->af->setApp("wlist", $wlist);

        return 'card_wish_index';
    }
}

?>
