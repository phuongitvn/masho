<?php
/**
 *  Item/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  item_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_ItemIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "md" => array(),
        "p" => array(),
        "kbn" => array(),
        "unit" => array(),
        "order" => array(),
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
 *  item_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_ItemIndex extends M_ActionClass
{
    /**
     *  preprocess item_index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            return 'error';
        }
        $sample = $this->af->get('sample');
        return null;
        */

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

        $itemManager = $this->backend->getManager("Item");
        $userManager = $this->backend->getManager("User");

        $member_id = $this->af->get('opensocial_owner_id');
        //プロフィール情報
        $profile = $userManager->getProfile($member_id);

		//モード
        $md = $this->af->get('md');

		//武器、防具、その他
        $kbn = $this->af->get('kbn');
        if($kbn == ""){
            $kbn = 1;
            $this->af->set('kbn' ,$kbn);
        }
		//小判かモバコインか
        $unit = $this->af->get('unit');
        if($unit == ""){
			if($md == 1){
	            $unit = 3;	//購入品
			}else{
	            $unit = 1;	//小判
			}
            $this->af->set('unit' ,$unit);
        }
		//表示順序
        $order = $this->af->get('order');
        if($order == ""){
            $order = 1; // 安い(昇順)
            $this->af->set('order' ,$order);
        }

		$user = $itemManager->getItemRelatedData($member_id);
        $this->af->setApp('user',$user);

        $limit = 10;

        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }

        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

		$sum1 = $itemManager->getMyItemSum($member_id ,$dispKbn="1",$unit);	//保有武器アイテムの個数の合計
		$sum2 = $itemManager->getMyItemSum($member_id ,$dispKbn="2",$unit);	//保有防具アイテムの個数の合計
        $this->af->setApp("sum1", $sum1);
        $this->af->setApp("sum2", $sum2);
        //アイテム数取得
		if($md == 1){
    	    $cnt  = $itemManager->getMyItemCount($member_id ,$kbn,$unit);//保有アイテムから取得
		}else{
    	    $cnt = $itemManager->getItemCount($kbn, $unit,$profile['stage']);//マスタから取得
		}

        if($cnt > 0){
			if($md == 1){
			    $item = $itemManager->getMyItems($member_id ,$kbn , $unit,$diff="",$limit ,$offset);
	        }else{
	        	if($unit==1){
			    	$item = $itemManager->getItems($member_id ,$kbn , $user['money'] ,$profile['stage'], $unit,$order,$limit ,$offset);
			    }else if($unit==2){
			    	$item = $itemManager->getItems($member_id ,$kbn , $user['coin'] ,$profile['stage'], $unit,$order,$limit ,$offset);
			    }
			}
            //ページャーセット
            $navi = $itemManager->getPagerSource($cnt, $limit, $p, 10);
        }

        $this->af->setApp("item", $item);
        
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);

        $this->af->setApp("kbn", $kbn);
        $this->af->setApp("unit", $unit);
        $this->af->setApp("order", $order);
        $this->af->setApp("md", $md);

        return 'item_index';
    }
}

?>
