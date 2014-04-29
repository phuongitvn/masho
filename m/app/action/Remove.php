<?php
/**
 *  Remove.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_Remove extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
		"opensocial_owner_id" => array(),
		"eventtype" => array(),
		"id" => array(),
    );

}

/**
 *  Remove action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Remove extends M_ActionClass
{
    /**
     *  preprocess Remove action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
        if(is_array($_GET) == True){
            foreach($_GET as $key=> $value){
                $this->af->set($key ,$value);
            }
        }
        if(is_array($_POST) == True){
            foreach($_POST as $key=> $value){
                $this->af->set($key ,$value);
            }
        }

        $domain = $this->config->get("url");
        $this->af->setApp('domain' ,$domain);
        //return parent::prepare();
    }

    /**
     *  Remove action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

		//GREE GWチェック
		$retGw = Util::fromGreeLifeCycle();

		if($retGw ){
			//LOG書き出し ファイル名設定
			$path = dirname(dirname(dirname(dirname(__FILE__)))) . '/logs/';
			$filename = $path ."remove_" .date("Ymd") .".log";
			$log  = date("Y-m-d H:i:s");
			$log .= " " .$_SERVER['REQUEST_URI'];
			$log .= "\n";
			file_put_contents($filename, $log, FILE_APPEND);

	        $userManager    = $this->backend->getManager("User");
	        $app_id = $this->af->get('opensocial_app_id');
	        $evtype = $this->af->get('eventtype');
	        $rawid = $this->af->get('id');
		}

		//メンテナンス状態取得
        $batchManager = $this->backend->getManager("Batch");
		$mt_flg = $batchManager->getMaintainanceStatus();

		if($mt_flg == 0  ){
			//id(退会者) を抽出して
			//eventtype=event.removeappなら　del_flg セット
			if($evtype == "event.removeapp"){
				//idが複数の場合が存在
				$ids = explode(",",$rawid);
				for ($n=0; $n<count($ids); $n++) {

			        $user = array();
			        $user["memberid"] = $ids[$n];
			        $user["del_flg"] = 1;
			        //トランザクション開始
			        $db = $this->backend->getDb();
			        $ret = $db->query('START TRANSACTION');
			        if($ret == False){
			            return 'error_sys';
			        }
					//t_user del_flg=1をセット
			        $ret1 = $userManager->updateUser($user);
					//t系テーブルの削除
					//t_session t_inviteは残す
					$ret2 = $userManager->deleteTables($ids[$n]);
			        if($ret1 === False || $ret2 === False ){
			            $db->query('ROLLBACK');
			            return 'error_sys';
			        }
			        //トランザクション終了
			        $ret = $db->query('COMMIT');
			        if($ret === False){
			            return 'error_sys';
			        }

	            }
			}

		}

        return 'ok';
    }
}

?>
