<?php
/**
 *  My/Profok.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_MyProfok extends M_ActionForm
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
class M_Action_MyProfok extends M_ActionClass
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

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ss');

        $profile = $userManager->getProfile($member_id);

        $isReload = $userManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
			$ss = $userManager->getSsId();
	        $this->af->setApp("ss", $ss);
			return 'my_continue';
		}else{
//TUT
	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
			//軍団長決定　0->1
			$table ="t_user";
			$column = "tut_num";
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->incrementColumn($table ,$column ,$where);
			//セッション更新
			$ret2 = $userManager->updSession($member_id ,$ss_id);
	        if($ret1 === False || $ret2 === False ){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
			//次のssid発行
			$ss = $userManager->getSsId();
	        $this->af->setApp("ss", $ss);
	        $deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp("deck", $deck);
			//武将名とランクを取得
			$card = $cardManager->getCardAtt($profile['prof']);
			$this->af->setApp("card", $card);

	        $this->af->setApp("profile", $profile);
	        return 'my_tut1';
		}

    }
}

?>
