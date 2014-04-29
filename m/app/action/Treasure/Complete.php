<?php
/**
 *  Card/Complete.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_form form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_TreasureComplete extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

	"opensocial_owner_id" => array(),
	"oid" => array(),
	"tid" => array(),
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
 *  card_form action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_TreasureComplete extends M_ActionClass
{
    /**
     *  preprocess card_form action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {

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
		$treasureManager = $this->backend->getManager("Treasure");
        $friendManager = $this->backend->getManager("Friend");

		$member_id = $this->af->get('opensocial_owner_id');
		$ss_id = $this->af->get('ssid');
		$trId = $this->af->get('tid');
		$other_id = $this->af->get('oid');

		$other= $userManager->getDeckProfile($other_id);
		$this->af->setApp("other", $other);

		//所持チェック
		$ownChk = $treasureManager->getTrindOwn($member_id,$trId,0);
		if($ownChk == 0){
	        return 'treasure_404';
		}
		//あげるとコンプかCHK
		$comp = $treasureManager->chkTrSeriesComp($other_id,$trId);
		if($comp == 1){
	        $this->af->setApp("comp", $comp);
	        return 'treasure_404';
		}
		//同盟CHK
		$fr_st = $friendManager->existsFriend($member_id ,$other_id);
		if($fr_st != 2){
	        $this->af->setApp("fr_st", $fr_st);
	        return 'treasure_404';
		}


		$isReload = $treasureManager->isReload($member_id ,$ss_id);
		$this->af->setApp("isReload", $isReload);

		//お宝個別情報
		$detailInfo = $treasureManager->TrDtInfo($trId);
		$this->af->setApp("detailInfo", $detailInfo);

		//シリーズ情報
		$sirInfo = $treasureManager->TrSeriInfo($detailInfo['tr_seriesid']);
		$this->af->setApp("sirInfo", $sirInfo);

		if($isReload == True){
			//return 'error_reload';
		} else {

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
			//ssid登録
	        $ret = $userManager->updSession($member_id ,$ss_id);
			//プレゼント処理(ニコニコポイント5)
			$trPre = $treasureManager->trPresent($member_id,$other_id,$trId,$nicoP="5");
	        if($ret === False || $trPre === False ){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }



		}

        return 'treasure_complete';
    }
}

?>
