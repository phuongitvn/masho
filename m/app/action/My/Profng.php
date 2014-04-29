<?php
/**
 *  My/Profng.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_MyProfng extends M_ActionForm
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
class M_Action_MyProfng extends M_ActionClass
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


//TUT
		$swfmillManager = $this->backend->getManager('Swfmill');
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ss');

        $isReload = $userManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
			//prof_gcnt 進める
			$ss = $userManager->getSsId();
	        $this->af->setApp("ss", $ss);
			return 'my_continue';
		}else{
//TUT
			$p_seq = mt_rand(1,22);
			$p_card = $cardManager->getGachaCardInfo($p_seq , $p_rank = "C" );
			$prof = $p_card['bushoid'];
			//bushoidを更新
	        $ncard = array();
	        $ncard["memberid"] = $member_id;
	        $ncard["cardseq"]  = 1;
	        $ncard["bushoid"]  = $prof;

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
			//t_user 更新
			$ret1 = $userManager->setProfCard($member_id,$prof);
			//セッション更新
			$ret3 = $userManager->updSession($member_id ,$ss_id);
			//t_card 更新
			$ret4 = $cardManager->updateCardStatus($ncard);
	        if($ret1 === False || $ret3 === False || $ret4 === False ){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
		}

//TUT
		$newss = $userManager->getSsId();
		$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fmy%2Findex.php%3Fss%3D".$newss;
		// XMLコンパイル
		$xmlString = $swfmillManager->compileXml('gacha0.xml', $replaceStrings);
		// XML出力実行
		$swfmillManager->executeSwfmill($xmlString);


    }
}

?>
