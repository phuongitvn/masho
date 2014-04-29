<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 *  Utilクラス
 *
 *  @author     nakanishi
 */


class Util
{

    /**
     * mbgaからのアクセスあるかどうかを判定した結果を返す
     *
     * @return  bool
     */
    static public function fromMbga() {
		return TRUE;

		// Authorizationヘッダの取得
        $headers = getallheaders();
		//<<mbga>>POST リクエストでContent-Typeがapplication/x-www-form-urlencoded の場合ボディパラメータを取得
		$bodys = file_get_contents("php://input");

//	$auth = 'test=aaa';
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

		if($_SERVER['QUERY_STRING']){
	        $queries = array_merge($queries, explode('&', $_SERVER['QUERY_STRING']));
		}
		//<<mbga>>POST リクエストでContent-Typeがapplication/x-www-form-urlencoded の場合ボディパラメータを取得
		if($method =="POST" && substr($headers['Content-Type'],0,33) == "application/x-www-form-urlencoded" ) {
	        $queries = array_merge($queries, explode('&', $bodys));
		}

        // ソート
        asort($queries);

        // 認証用要素
        $url    = urlencode("http://{$_SERVER['SERVER_NAME']}{$_SERVER['PHP_SELF']}");
        $query  = urlencode(implode("&", $queries));

		$token_secret = $oauth['oauth_token_secret'];
        // サーバ側生成Oauthsignature
        $selfSign = base64_encode(hash_hmac('sha1', "$method&$url&$query", "$CONSUMER_SECRET&$token_secret", true));

        return ($selfSign == urldecode($oauth['oauth_signature']));

		/* debug MODE*/
		//return True;

    }


    static public function fromGreeLifeCycle() {

		// Authorizationヘッダの取得
        $headers = getallheaders();

//LOG書き出し
$filename = dirname(dirname(__FILE__))."/logs/greeLc_" .date("ymd") .".log";
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
            "oauth_version=1.0",
        );
		$token_secret = $oauth['oauth_token_secret'];
        $method = $_SERVER['REQUEST_METHOD'];

        $queries = array_merge($queries, explode('&', $_SERVER['QUERY_STRING']));

        // ソート
        asort($queries);

$log .= "\n" .print_r($_SERVER['QUERY_STRING'],true)."\n";
$log .= "\n" .print_r($queries,true)."\n";

        // 認証用要素
        $url    = urlencode("http://{$_SERVER['SERVER_NAME']}{$_SERVER['PHP_SELF']}");
        $query  = urlencode(implode("&", $queries));

        // サーバ側生成Oauthsignature
        $selfSign = base64_encode(hash_hmac('sha1', "$method&$url&$query", "$CONSUMER_SECRET&$token_secret", true));
$log .= "\n" .print_r($method,true)."\n";
$log .= "\n" .print_r($url,true)."\n";
$log .= "\n" .print_r($query,true)."\n";
$log .= "\n" .print_r($token_secret,true)."\n";
$log .= "\n" .print_r($selfSign,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);

        return ($selfSign == urldecode($oauth['oauth_signature']));

    }


    /**
     * パラメータ取得関数
     *
     * @return	string
     */
	public function getparam($params ,$is_start=False){
	    $paramArray = array();
	    foreach($params as $key => $value){
	        if(is_array($value) == True){
	            $paramArray[] = "'".$key ."'=" .getparam($value ,False);
	        }else{
	            $paramArray[] = "'".$key ."'='" .$value ."'";
	        }
	    }
	    $ret = implode(" " ,$paramArray);
	    if($is_start == False){
	        $ret = "array(" .$ret .")";
	   }
	   return $ret;
	}

	public function header($str, $replace = "", $code =""){
		
		$strEsc = strtr($str, array("\r"=>"", "\n"=>""));
		
		if ($replace && $code) {
			header($strEsc, $replace, $code);
		} elseif ($replace && !$code) {
			header($strEsc, $replace);
		} else{
			header($strEsc);
		}
	}
}

function dispFriends() {
	return array(
		'entry' => array(
			'hasApp' => 1,
			'nickname' => 'tsuge',
			'profileUrl' => 'http://www.moba.vn/',
			'birthday' => '1981-12-29',
			'gender' => '1'
		)
	);
}
function d($v, $lv=0) {
	foreach ($v as $k=>$v2) {
		echo _indent($lv).htmlspecialchars($k).'('.gettype($v2).'):'.htmlspecialchars($v2)."\n";
		if (is_array($v2) || is_object($v) && $lv < 2) {
			d($v2, $lv+1);
		}
	}
}
function _indent($lv) {
	$ret = array();
	for ($i=0; $i<$lv; $i++)
		$ret[] = '';
	return implode("\t", $ret);
}
function chkBlackList($member_id, $other_id) {
	return array('entry' => array('id' => 0));
}
function getTxt($viewer_id,$txtGroup,$reqTxts) {
	return array();
}
function sendMsg() {
	return TRUE;
}
?>