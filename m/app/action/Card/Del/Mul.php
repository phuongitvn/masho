<?php
/**
 *  Card/Del.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_CardDelMul extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "ssid" => array(),
        "p"         => array(),
        "del_greet" => array(
            'type'          => array(VAR_TYPE_INT),    // 入力値型
        ),
        "select"    => array(),
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
 *  card_form action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardDelMul extends M_ActionClass
{
    /**
     *  preprocess card_form action.
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

        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        
        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $st = $this->af->get('st');
        $this->af->setApp("st", $st);

		if($st == ""){
			$st = "urk";
		}
		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");

		//件数制限	
        $limit = 18;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }
        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        //削除設定あり
        $select = $this->af->get("select");
        $del_greet = $this->af->get("del_greet");

		if($select == "done"){

	        if($isReload == True){
	            //return 'error_reload';
	        }else{
		        $del = $this->af->get("del");
		        $after = $this->af->get("after");
	            //トランザクション開始
	            $db = $this->backend->getDb();
	            $ret = $db->query('BEGIN');
	            if($ret == False){
	                return 'error_sys';
	            }
				
				//カード削除
	            $ret1 = $cardManager->delCardOnce($member_id, $del);

		        $user = array();
		        $user["memberid"] = $member_id;
		        $user["money"]   = $after;
		        $ret2 = $userManager->updateUser($user);
				//ssid登録
		        $ret3 = $userManager->updSession($member_id ,$ss_id);

		        if( $ret1 === False || $ret2 === False  || $ret3 === False ){
	                $db->query('ROLLBACK');
	                return 'error_sys';
	            }

	            //トランザクション終了
	            $ret = $db->query('COMMIT');
	            if($ret === False){
	                return 'error_sys';
	            }
			}

		}elseif($select == "1"){
	        //削除対象
			$del_cnt = count($del_greet);
	        if($del_cnt == 0){
       			$this->af->setApp("not", "1");
			}else{
		        $profile = $userManager->getProfile($member_id);
	       		$this->af->setApp("profile", $profile);
				$after = $profile['money'];
				$cbmoney = $this->config->get("cardCashBack");
				$del = array_values($del_greet);
				for ($i=0; $i< count($del); $i++) {
		            $disp[$i] = $cardManager->getDispCardInfo($member_id , $del[$i] );
					$after += $cbmoney[$disp[$i]['rank_num']];
				}
	       		$this->af->setApp("after", $after);
		        $this->af->setApp("del", $del);
		        $this->af->setApp("list", $disp);
	        }
        }else{
			//ページング処理

	        //ファイルデッキ
	        $cnt = $cardManager->getCardlistCount($member_id ,$stF="1");
	        if($cnt > 0){
	            $file = $cardManager->getCardlist($member_id ,$status="1", $st, $limit ,$offset);
	        }
	        $this->af->setApp("list", $file);

	        //ページャーセット
	        $navi = $cardManager->getPagerSource($cardFileMax, $limit, $p, 18);
	        $this->af->setApp("navi", $navi);

	        //リロード対策
			$ssid = $cardManager->getSsId();
	        $this->af->setApp("ssid", $ssid);

		}

		//ナビゲーション用
        $cnt = $cardManager->getCardlistCount($member_id ,$stF="1");
        $cntP  = $cardManager->getCardlistCount($member_id ,$sta="2");
	    $this->af->setApp("cnt", $cnt);
        $this->af->setApp("cntP", $cntP);

        return 'card_del_mul';
    }
}

?>
