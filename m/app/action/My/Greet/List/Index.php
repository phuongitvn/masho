<?php
/**
 *  My/Greet/List/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_greet_list_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyGreetListIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "p"         => array(),
        "del_greet" => array(
            'type'          => array(VAR_TYPE_INT),    // 入力値型
        ),
        "select"    => array(),
        //"formid" => array(),
        //"cl" => array(),
    );

}

/**
 *  my_greet_list_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyGreetListIndex extends M_ActionClass
{
    /**
     *  preprocess of my_greet_list_index Action.
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
     *  my_greet_list_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $greetManager = $this->backend->getManager("Greet");
        $itemManager = $this->backend->getManager("Item");

        $member_id = $this->af->get('opensocial_owner_id');
        //$form_id = $this->af->get('formid');

        $profile = $userManager->getProfile($member_id);
        $this->af->setApp("profile", $profile);

		if($profile['gtxtid'] != NULL){
			$txt = getTxt($member_id,$txtGroup="comments",$profile['gtxtid']);
			//0 監査中 1 監査結果OK 2 削除 3 監査結果NG 
			if($txt['entry']['0']['status'] == 2 || $txt['entry']['0']['status'] == 3 ){
				$comnt = "コメント";
			}else{
				$comnt = $txt['entry']['0']['data'];
			}
		}else{
			$comnt = "コメント";
		}
        $this->af->setApp('comment' ,$comnt);

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

		/*
        $isReload = Util::isReload($member_id ,$form_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
            return 'error_reload';
        }
		*/

		/*
        //アラートクリア
        if($this->af->get('cl') == "1"){
            $greetManager->clearAlert($member_id);
        }
		*/

        //削除設定あり
        $select = $this->af->get("select");
        $del_greet = $this->af->get("del_greet");
        if($select != ""){
            //トランザクション開始
            $db = $this->backend->getDb();
            $ret = $db->query('BEGIN');
            if($ret == False){
                return 'error_sys';
            }

            $ret = $greetManager->delGreet($member_id, $select, $del_greet , $limit, $offset);
            if($ret === False){
                $db->query('ROLLBACK');
                return 'error_sys';
            }

            //トランザクション終了
            $ret = $db->query('COMMIT');
            if($ret === False){
                return 'error_sys';
            }

            $p = 1;
            $this->af->set("p", $p);
            $offset = ($p - 1) * $limit;
        }

        //あいさつされた一覧
        $cnt = $greetManager->getGreetListCount($member_id ,$status="0");

        if($cnt > 0){

            $list = $greetManager->getGreetList($member_id ,$status="0" ,$limit ,$offset);

            //ページャーセット
			//11/2/4 10→5件に
            $navi = $greetManager->getPagerSource($cnt, $limit, $p, 5);
        }

        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);

		//きびだんご個数取得 116
		$rcv_id = $this->config->get('kibiItemid');
		$rcv = $itemManager->getKbn4Count($member_id,$rcv_id);
        $this->af->setApp("rcv", $rcv);

		if($profile['friend_pt'] >= 100 || $rcv > 0){
	        //リロード対策(げんき回復)
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
		}

        return 'my_greet_list_index';
    }
}

?>
