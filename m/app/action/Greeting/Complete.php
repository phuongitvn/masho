<?php
/**
 *  Greeting/Complete.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_GreetingComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "md" => array(),
        "id" => array(),
        "tid" => array(),
        'comnt' => array(
            'name'         => 'あいさつ',
            'type'         => VAR_TYPE_STRING,
            'form_type'    => FORM_TYPE_TEXTAREA,
            'max'          => 100,
            'max_error'    => "100文字以内で入力してください",
            'required'    => true,
        ),

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
 *  greeting_hello action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_GreetingComplete extends M_ActionClass
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
     *  greeting_hello action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $greetManager = $this->backend->getManager("Greet");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $friend_id = $this->af->get('id');
        $txt_id = $this->af->get('tid');
        $comnt = $this->af->get('comnt');
        $md = $this->af->get('md');
		$this->af->setApp('md' ,$md);

		// Authorizationヘッダの取得
        $headers = getallheaders();
		//<<mbga>>POST リクエストでContent-Typeがapplication/x-www-form-urlencoded の場合ボディパラメータを取得
		$bodys = file_get_contents("php://input");

//LOG書き出し
$filename = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/logs/hlo_" .date("ymd") .".log";
$log  = date("Y-m-d H:i:s");
$log .= "\n" .print_r($headers,true)."\n";
$log .= "\n" .print_r($bodys,true)."\n";

        if (!$auth = $headers['Authorization']) {
            return false; // これがないとそもそもアウト
        }
        $pairs   = explode(',', $auth);
        foreach ($pairs as $pair) {
            list($key, $value) = explode('=', $pair);
            $oauth[trim($key)] = preg_replace('/^"(.*)"$/', '$1', $value);
        }
        // 共通設定ファイルの読み込み
        global $CONSUMER_KEY, $CONSUMER_SECRET;
        if(is_null($CONSUMER_KEY)==True){
            require_once($_SERVER['DOCUMENT_ROOT'] . '/../oauth/mbga.php');
        }

        // クエリーストリング処理
        $queries = array(
            "oauth_consumer_key={$CONSUMER_KEY}",
            "oauth_nonce={$oauth['oauth_nonce']}",
            "oauth_signature_method=HMAC-SHA1",
            "oauth_timestamp={$oauth['oauth_timestamp']}",
            "oauth_token={$oauth['oauth_token']}",
            "oauth_token_secret={$oauth['oauth_token_secret']}",
            "oauth_version=1.0"
        );

        $method = $_SERVER['REQUEST_METHOD'];

        $queries = array_merge($queries, explode('&', $_SERVER['QUERY_STRING']));
		//POST リクエストでContent-Typeがapplication/x-www-form-urlencoded の場合ボディパラメータを取得 (auのみ）
		$carrierNo = $this->backend->useragent->getAgentType();
		if($method =="POST" && substr($headers['Content-Type'],0,33) == "application/x-www-form-urlencoded" ) {
			
			$prm = explode('&', $bodys);
            foreach($prm as $key=> $value){
				$param[$key] = explode('=', $value);
			}
			for ($n=0; $n<count($param); $n++) {
				if($param[$n]['0'] == "comnt"){
					//コメント内容の[%英小文字]を[%大文字]に %cc %2c %a2 などを%CC %2C %A2
					$strU = preg_replace('/(%[\da-f]{2})/e', "strtoupper('$1');", $param[$n]['1']);
					//$strU = strtoupper($param[$n]['1']);
					$prm[$n] = "comnt=".$strU;
				}
			}
	        $queries = array_merge($queries, $prm);
		}

        // ソート
        asort($queries);

$log .= "\n" .print_r($_SERVER['QUERY_STRING'],true)."\n";
$log .= "\n" .print_r($queries,true)."\n";

        // 認証用要素
        $url    = urlencode("http://{$_SERVER['SERVER_NAME']}{$_SERVER['PHP_SELF']}");
        $query  = urlencode(implode("&", $queries));

		$token_secret = $oauth['oauth_token_secret'];
        // サーバ側生成Oauthsignature
        $selfSign = base64_encode(hash_hmac('sha1', "$method&$url&$query", "$CONSUMER_SECRET&$token_secret", true));

$log .= "\n" .print_r($method,true)."\n";
$log .= "\n" .print_r($url,true)."\n";
$log .= "\n" .print_r($query,true)."\n";
$log .= "\n" .print_r($token_secret,true)."\n";
$log .= "\n" .print_r($selfSign,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);

	//mbga 独自CHK
	//if($selfSign == urldecode($oauth['oauth_signature'])){

		//BlackListCHK
		$black = chkBlackList($member_id,$friend_id);
		if($black['entry']['id'] == $friend_id && $black['entry']['ignorelistId'] == $member_id){
            return "error_black";
		}

		if($md ==""){
	        //本人チェック
	        if($member_id == $friend_id){
	            $this->af->setApp('error' ,"1");
	            return 'error_my';
	        }
	        //プロフィール情報
	        $profile = $userManager->getProfile($friend_id);
	        if(count($profile) == 0){
	            return 'error_404';
	        }
	        $this->af->setApp("profile", $profile);

			//BlackList
			$black = chkBlackList($member_id,$friend_id);

		}

		if (Ethna_Util::isDuplicatePost()) {
		  // 二重POSTの場合
		  return 'greeting_hello';
		}

		$err = 1;
		//コメント内容のCHK		11/2/21
		if(strlen($comnt) == 0){
			$err = 0;
		}elseif(strlen($comnt) > 200){
			$err = 100;
		}
		if($err != 1){
		    $this->af->setApp('err' ,$err);
		  	return 'greeting_err';
		}

		if($md =="cmnt"){
			$txtGroup ="comments";
			$phr = "ひとことコメント";
    	    $profile = $userManager->getProfile($member_id);
		}else{
			$txtGroup ="hello";
			$phr = "あいさつ";
	        $profile = $userManager->getProfile($friend_id);
		}
        $this->af->setApp("profile", $profile);

		if($black['entry']['id'] == $member_id && $black['entry']['ignorelistId'] == $friend_id){
			$msg = "このユーザーにあいさつはできません。";
            $this->af->setApp('msg' ,$msg);
		}else{
			//GREEは即時監査無
			//NG WORD CHK
			//$ngChk = ngWordChk($member_id,$comnt);
			//if($ngChk['ngword']['valid']){

				//API内でUTF8に変換して送信
				if($txt_id == 0){
					$ret1 = makeTxt($member_id,$txtGroup,$comnt);//POST

					$txtId = $ret1['entry']['0']['textId'];
					$txtStatus = "";
				}else{
					$ret1 = updTxt($member_id,$txtGroup,$txt_id,$comnt);//PUT
					$txt  = getTxt($member_id,$txtGroup,$txt_id);//GET
					$txtId = $txt_id;
					$txtStatus = $txt['entry']['0']['status'];
				}

				if($md =="cmnt"){
					//t_user をUPD
			        $user = array();
			        $user["memberid"] = $member_id;
        			$user["gtxtid"]  = $txtId;
			        $user["comm_upd"] = 1;
			        $ret2 = $userManager->updateUser($user);
			        if($ret2 === False){
			            return 'error_sys';
			        }
				}else{
					//同盟状態からニコニコP取得
					$nicoP = $friendManager->getFriendKbn($member_id ,$friend_id);
					//本日既にあいさつしているか取得
					$helloNum = $greetManager->existsHello($member_id ,$friend_id);
					if($helloNum == 1){
						$nicoP = 0;
					}
			        //トランザクション開始
			        $db = $this->backend->getDb();
			        $ret = $db->query('START TRANSACTION');
			        if($ret == False){
			            return 'error_sys';
			        }
					//lg_greetingにIDを記録	num= 1(固定)をセット
					$ret2 = $greetManager->setTxtData($member_id ,$friend_id,$txtId,$txtStatus);
					//あいさつ回数を加算
					$ret3 = $friendManager->setNicoPoint($member_id ,$friend_id,$nicoP,$kbn="hello");
			        if($ret2 === False || $ret3 === False ){
			            $db->query('ROLLBACK');
			            return 'error_sys';
			        }
			        //トランザクション終了
			        $ret = $db->query('COMMIT');
			        if($ret === False){
			            return 'error_sys';
			        }

					//ニコニココメント表示
					$cmt = $friendManager->getNicoCmt($profile['prof']);
					if($nicoP == 1){
						$nicoMsg = $cmt['nico_cmt_nt'];
					}elseif($nicoP == 2 || $nicoP == 3){
						$nicoMsg = $cmt['nico_cmt_f'];
					}
					if($helloNum == 1){
						$nicoMsg = $cmt['nico_cmt_ov'];
					}
			        $my_profile = $userManager->getProfile($member_id);
			        $this->af->setApp("my_profile", $my_profile);
			        $this->af->setApp("nicoP", $nicoP);
			        $this->af->setApp("nicoMsg", $nicoMsg);
				}

				//文字コード変換して出力
			    $carrierNo = $this->backend->useragent->getAgentType();
				if($carrierNo == 1 || $carrierNo == 2){
					mb_language("Japanese");
					$comnt = mb_convert_encoding($comnt, "UTF-8", "SJIS");
				}
		        $this->af->setApp("comnt", $comnt);
/*　GREEは即時監査無
			}else{
				$msg = "ご入力頂いた".$phr."は送信できません。";
	            $this->af->setApp('msg' ,$msg);
			}
*/
		}

	//}//mbgaCHKEND
        return 'greeting_complete';
    }
}

?>
