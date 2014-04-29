<?php
/**
 *  My/Treasure.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_treasure Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyTreasure extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "mode" => array(),
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
 *  my_treasure action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyTreasure extends M_ActionClass
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
     *  my_treasure action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
		$userManager = $this->backend->getManager("User");
		$treasureManager = $this->backend->getManager("Treasure");

		$member_id = $this->af->get('opensocial_owner_id');
		$mode = $this->af->get('mode');
		$this->af->setApp("mode", $mode);
        $other_id = $this->af->get('id');

		$limit = 10;
		$p = $this->af->get("p");
		if(!$p || !is_numeric($p)){
			$p = 1;
			$this->af->set("p", $p);
		}

		if($other_id == ""){
			//コンプリートチェック
			$compChk = $treasureManager->getTrComp($member_id);
			$this->af->setApp("compChk", $compChk);
//var_dump($compChk);
			//コンプリート数&シリーズ所持数
			$numChk = $treasureManager->getTrcoNum($member_id);
			$this->af->setApp("numChk", $numChk);

			$cntNum = $numChk['OwnNum'];
			$this->af->setApp("cntNum", $cntNum);
//var_dump($cntNum);

			$navi = $treasureManager->getPagerSource($cntNum, $limit, $p, 10);
		}else{
	        $ot_profile = $userManager->getProfile($other_id);
			//ID存在CHK
	        if(count($ot_profile) == 0){
	            return "error_404";
	        }
	        $this->af->setApp("ot_profile", $ot_profile);
			//コンプリートチェック
			$compChk = $treasureManager->getTrComp($other_id);
			$this->af->setApp("compChk", $compChk);

			//コンプリート数&シリーズ所持数
			$numChk = $treasureManager->getTrcoNum($other_id);
			$this->af->setApp("numChk", $numChk);

			$cntNum = $numChk['OwnNum'];
			$this->af->setApp("cntNum", $cntNum);
			$navi = $treasureManager->getPagerSource($cntNum, $limit, $p, 10);
		}

		$this->af->setApp("navi", $navi);

        return 'my_treasure';
    }
}

?>
