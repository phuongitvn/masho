<?php
/**
 *  Other/Card.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  other_card Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_OtherCard extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "id" => array(),
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
 *  other_card action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_OtherCard extends M_ActionClass
{
    /**
     *  preprocess of other_card Action.
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
     *  other_card action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
		$userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('id');
		if($member_id == $other_id){
			$this->af->setApp("me", "1");
		}
        $ot_profile = $userManager->getProfile($other_id);
		//ID存在CHK
        if(count($ot_profile) == 0){
            return "error_404";
        }
        $this->af->setApp("ot_profile", $ot_profile);

		//11/2/7
        //$cardFileMax = $this->config->get("cardFileMax");
		//$total = $cardFileMax + 5;
        $limit = 9;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }
        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

		$status = "all";	//デッキとファイル
		$st = "rk";
    	$cnt = $cardManager->getCardlistCount($other_id ,$status);
        if($cnt > 0){
            $list = $cardManager->getCardlist($other_id ,$status, $st, $limit ,$offset);
			$existNum = count($list);	//存在するデータ数を取得
            //ページャーセット
            
            $navi = $cardManager->getPagerSource($cnt, $limit, $p, 9);
        }

		//空枠追加	$cardFileMaxに応じて調整
		if($p == 5){
			$filMax = 5;
		}else{
			$filMax = $limit;
		}
		for ($i=$existNum; $i<$filMax; $i++) {
            $list[$i]["bushoid"] = "non";
            $list[$i]["name_rank"] = "　";
        }
        $this->af->setApp("cnt", $cnt);
        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);

        return 'other_card';
    }
}

?>
