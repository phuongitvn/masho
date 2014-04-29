<?php
/**
 *  My/Friend/List/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_friend_list_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyFriendListIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "id" => array(),
        "cid" => array(),
        "p" => array(),
        "st" => array(),
        "md" => array(),
        "clid" => array(),
    );

}

/**
 *  my_friend_list_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyFriendListIndex extends M_ActionClass
{
    /**
     *  preprocess of my_friend_list_index Action.
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
     *  my_friend_list_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");
        $cardManager = $this->backend->getManager("Card");
		$treasureManager = $this->backend->getManager("Treasure");

        $member_id = $this->af->get('opensocial_owner_id');
        $profile = $userManager->getProfile($member_id);
        $other_id = $this->af->get('id');
        $md = $this->af->get('md');
        $pre = $this->af->get('cid');
        $this->af->setApp("md", $md);
        $this->af->setApp("pre", $pre);
		
		if($md == "cp" || $md == "wp"){
	        $card = $cardManager->getDispCardInfo($member_id , $pre);
    	    $this->af->setApp("card", $card);
			$pid = $card['bushoid'];
		}elseif($md == "tp"){
			$tr = $treasureManager->TrDtInfo($pre);
			$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
    	    $this->af->setApp("tr", $tr);
    	    $this->af->setApp("sr", $sr);
			$pid = $pre;
		}elseif($md == "bs"){
        	$del_id = $this->af->get('clid');
			$ret = $friendManager->delBossFight($member_id,$del_id);
	        if($ret === False){
	            return 'error_sys';
	        }
		}else{
			$pid = "";
		}

        $st = $this->af->get('st');
		if($st == ""){
			$st="lv";
		}
        $this->af->setApp("st", $st);

		//11/2/4 10→5件に
        $limit = 5;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }

        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

		if($other_id == ""){
	        //同盟リスト
	        $nums['friend'] = $friendManager->getFriendlistCount($member_id ,$status="2",$kbn="");
			$nums['send']   = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="send");
			$nums['rcv']    = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="");
			$nums['max'] = $userManager->getMaxFriendContByLevel($profile['level']);
			$nums['rest'] = $nums['max'] - ( $nums['friend'] + $nums['send'] + $nums['rcv'] );
	        if($nums['friend'] > 0){
	            $list = $friendManager->getFriendlist($member_id ,$status="2",$kbn="",$md,$pid,$st,$limit ,$offset);
				if($md == "wp"){
					$total = count($list);
				}else{
					$total = $nums['friend'];
				}
	            //ページャーセット
				//11/2/4 10→5件に
	            $navi = $friendManager->getPagerSource($total, $limit, $p, 5);
	        }
		}else{
	        $ot_profile = $userManager->getProfile($other_id);
			//ID存在CHK
	        if(count($ot_profile) == 0){
	            return "error_404";
	        }
			//同盟リスト
	        $nums['friend'] = $friendManager->getFriendlistCount($other_id ,$status="2",$kbn="");
	        if($nums['friend'] > 0){
	            $list = $friendManager->getFriendlist($other_id ,$status="2",$kbn="",$md="",$pid="",$st="",$limit ,$offset);
	            //ページャーセット
				//11/2/4 10→5件に
	            $navi = $friendManager->getPagerSource($nums['friend'], $limit, $p, 5);
	        }
	        $this->af->setApp("ot_profile", $ot_profile);
		}

        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);
        $this->af->setApp("nums", $nums);

        //リロード対策
		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'my_friend_list_index';
    }
}

?>
