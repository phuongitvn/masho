<?php
/**
 *  Other/Item.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  other_item Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_OtherItem extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "id" => array(),
        "kbn" => array(),
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
 *  other_item action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_OtherItem extends M_ActionClass
{
    /**
     *  preprocess of other_item Action.
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
     *  other_item action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
		
        $userManager = $this->backend->getManager("User");
        $itemManager = $this->backend->getManager("Item");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('id');

        $ot_profile = $userManager->getProfile($other_id);
		//ID存在CHK
        if(count($ot_profile) == 0){
            return "error_404";
        }
        $this->af->setApp("ot_profile", $ot_profile);

		//武器、防具、その他
        $kbn = $this->af->get('kbn');
        if($kbn == ""){
            $kbn = 1;
            $this->af->set('kbn' ,$kbn);
        }

        $this->af->setApp("kbn", $kbn);

       $limit = 9;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }
        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

        //保有アイテム数取得
		$cnt = $itemManager->getMyItemCount($other_id ,$kbn,$unit="");
        if($cnt > 0){
		    $list = $itemManager->getMyItems($other_id ,$kbn , $unit="",$diff="",$limit ,$offset);
			$existNum = count($list);	//存在するデータ数を取得
	        //ページャーセット
            $navi = $itemManager->getPagerSource($cnt, $limit, $p, 10);
        }

		//空枠追加
		for ($i=$existNum; $i<$limit; $i++) {
            $list[$i]["itemid"] = "non";
        }

        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);

        return 'other_item';
    }
}

?>
