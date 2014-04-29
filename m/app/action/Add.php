<?php
/**
 *  Add.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Add form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_Add extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
		"eventtype" => array(),
		"id" => array(),
		"user_hash" => array(),
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
 *  Add action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Add extends M_ActionClass
{
    /**
     *  preprocess Add action.
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
     *  Add action implementation.
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
			$filename = $path ."ad_" .date("Ymd") .".log";
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
	        $userManager    = $this->backend->getManager("User");
	        $app_id = $this->af->get('opensocial_app_id');
	        $evtype = $this->af->get('eventtype');
	        $rawid = $this->af->get('id');
	        $rawhash = $this->af->get('user_hash');


			if($evtype == "event.addapp"){

				//idが複数の場合が存在
				$ids   = explode(",",$rawid);
				$hashs = explode(",",$rawhash);

				for ($n=0; $n<count($ids); $n++) {

					//t_user にレコードが存在するか
		            $exU = $userManager->existsRecord($ids[$n]);

					if($exU){
				        $user = array();
				        $user["memberid"]  = $ids[$n];
				        $user["user_hash"] = $hashs[$n];;

				        //トランザクション開始
				        $db = $this->backend->getDb();
				        $ret = $db->query('START TRANSACTION');
				        if($ret == False){
				            return 'error_sys';
				        }
						//t_user にhashをセット
				        $ret1 = $userManager->updateUser($user);
				        if($ret1 === False ){
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

		}

        return 'ok';
    }
}

?>
