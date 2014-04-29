<?php
/**
 *  Callback.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Callback form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_Callback extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "paymentId" => array(),
        "orderedTime" => array(),
        "status" => array(),
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
 *  Callback action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Callback extends M_ActionClass
{
    /**
     *  preprocess Callback action.
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
     *  Callback action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {
        $member_id = $this->af->get('opensocial_owner_id');
        $pay_id = $this->af->get('paymentId');
        $updated = $this->af->get('orderedTime');
        $status = $this->af->get('status');//OKは2


$filename = dirname(dirname(dirname(dirname(__FILE__))))."/logs/payi_" .date("ymd") .".log";
$log  = date("Y-m-d H:i:s");
$log .= " " .$_SERVER['REQUEST_URI'];
$log .= " [" .Util::getparam($_POST ,True) ."]";
$log .= "\n";

		//oAuth の妥当性検証
		// Authorizationヘッダの取得
        $headers = getallheaders();
		//POST リクエストでContent-Typeがapplication/x-www-form-urlencoded の場合ボディパラメータを取得
		$bodys = file_get_contents("php://input");

$log .= "\n" .print_r($headers,true)."\n";
$log .= "body:" .print_r($bodys,true)."\n";
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
			//orderedTime "2010-12-14 11:11:11" という文字列が"2010-12-14+20%3A38%3A17"とログには記録
			//だが+ではなく%20(半角スペースに)
			$qst = explode('&', $_SERVER['QUERY_STRING']);
			for ($qq=0; $qq < count($qst); $qq++) {
				$enqst[$qq] = str_replace("+","%20",$qst[$qq]);
			}
$log .= "enqst:" .print_r($enqst,true)."\n";
	        $queries = array_merge($queries, $enqst);
		}
		//POST リクエストでContent-Typeがapplication/x-www-form-urlencoded の場合ボディパラメータを取得
		if($method =="POST" && substr($headers['Content-Type'],0,33) == "application/x-www-form-urlencoded" ){
	        $queries = array_merge($queries, explode('&', $bodys));
		}


        // ソート
        asort($queries);

$log .= "qst:" .print_r($_SERVER['QUERY_STRING'],true)."\n";
$log .= "\n" .print_r($queries,true)."\n";

        // 認証用要素	RFC3986形式の場合はurlencodeではなく、rawurlencode
        $url    = rawurlencode("http://{$_SERVER['SERVER_NAME']}{$_SERVER['PHP_SELF']}");
        $query  = rawurlencode(implode("&", $queries));

		$base = $method ."&". $url ."&". $query;

        // サーバ側生成Oauthsignature
		$token_secret = $oauth['oauth_token_secret'];
        $selfSign = base64_encode(hash_hmac('sha1', "$method&$url&$query", "$CONSUMER_SECRET&$token_secret", true));


$log .= "\n" .print_r($base,true)."\n";
$log .= "\n" .print_r($selfSign,true)."\n";

	if($selfSign == urldecode($oauth['oauth_signature'])){

		//OKなら
        $itemManager = $this->backend->getManager("Item");
       	$cardManager = $this->backend->getManager("Card");
       	$fightManager = $this->backend->getManager("Fight");

		//viewer とpaymentid に対してstatusを確認
		$pay_info = $itemManager->getPaymentInfo($member_id, $pay_id, 0);

		if($pay_info['itemid']){
	        //アイテム情報取得
	        $item = $itemManager->getItemData($pay_info['itemid']);
		}else{
            return 'error_sys';
        }


$log .= "pay:\n" .print_r($pay_info,true)."\n";


		//リアリティ処理
		if($item['kbn'] == 1 || $item['kbn'] == 2 ){

			//保有XXアイテムをYY力で降順(XXは武器か防具、Yはkbn=1:Off,kbn=2:Def)
			$nowItem = $itemManager->getMyItems($member_id ,$item['kbn'] ,$unit="",$union="",$limit="" ,$offset="");
			//購入予定アイテムの配列(複数個でも可)
			$candiItem = array( count($nowItem) => 
				array(
	                'itemid' => $pay_info['itemid'],
	                'num'    => $pay_info['amount'],
	                'times'  => 'NULL',
	                'name'  => $item["name"],
	                'offense'  => $item["offense"],
	                'defense'  => $item["defense"],
				),
	        );
			//攻撃力用アイテム配列
			$dataArray = $nowItem + $candiItem;		//配列をマージ
			foreach ($dataArray as $key => $row) {	// 列方向の配列を得る
			    $itemid[$key] = $row['itemid'];
			    $num[$key] = $row['num'];
			    $times[$key] = $row['times'];
			    $name[$key] = $row['name'];
			    $offense[$key] = $row['offense'];
			    $defense[$key] = $row['defense'];
			}
			array_multisort($offense, SORT_DESC, $dataArray);
			$offItem = $dataArray;

			//防御力用アイテム配列
			$dataArray = $nowItem + $candiItem;		//配列をマージ
			foreach ($dataArray as $key => $row) {	// 列方向の配列を得る
			    $itemid[$key] = $row['itemid'];
			    $num[$key] = $row['num'];
			    $times[$key] = $row['times'];
			    $name[$key] = $row['name'];
			    $offense[$key] = $row['offense'];
			    $defense[$key] = $row['defense'];
			}
			array_multisort($defense, SORT_DESC, $dataArray);
			$defItem = $dataArray;
	/*
	echo "<br>ITEMo<br>";
	var_dump($offItem);
	echo "<br>ITEMd<br>";
	var_dump($defItem);
	*/
			//デッキのカードをOffense降順
			$offMaxCard = $cardManager->getCardlist($member_id,0,$sort="off",$limit="" ,$offset="");
			//デッキのカードをDefense降順
			$defMaxCard = $cardManager->getCardlist($member_id,0,$sort="def",$limit="" ,$offset="");
			//calcFightPower はカード配列の添え字が1～5のためスライド
			for($i=0;$i < 5;$i++){
				$n = 4 - $i;
				$offMaxCard [$n + 1] = $offMaxCard [$n];
				$defMaxCard [$n + 1] = $defMaxCard [$n];
			}
	/*
	echo "<br>OffCard<br>";
	var_dump($offMaxCard);
	echo "<br>DefCard<br>";
	var_dump($defMaxCard);
	*/
			//購入後の最大XX攻撃力(XXは武器か防具)
			$afterKbnOffPower = $fightManager->calcFightPower($offMaxCard,$offItem,"o");
			//購入後の最大XX防御力((XXは武器か防具)
			$afterKbnDefPower = $fightManager->calcFightPower($defMaxCard,$defItem,"d");
	/*
	echo "<br>afterOFF<br>";
	var_dump($afterOffPower);
	echo "<br>afterDEF<br>";
	var_dump($afterDefPower);
	*/
			for($i=1 ;$i<=5;$i++){
				$kbnOffPower += $afterKbnOffPower[$i];
				$kbnDefPower += $afterKbnDefPower[$i];
			}

		}

		if($item['kbn'] == 1 ){
			$buki_off = $kbnOffPower;
			$buki_def = $kbnDefPower;
		}elseif($item['kbn'] == 2 ){
			$bougu_off = $kbnOffPower;
			$bougu_def = $kbnDefPower;
		}

		//アイテムの加算処理を実行
        //トランザクション開始
        $db = $this->backend->getDb();
        $ret = $db->query('START TRANSACTION');
        if($ret == False){
            return 'error_sys';
        }

        //アイテム購入処理
		$ret = $itemManager->buyItem($member_id ,$pay_info['itemid'] ,$item['kbn'],$pay_info['amount'] ,$item['rest'],$pay_info['price'],$buki_off,$buki_def,$bougu_off,$bougu_def,$lg_dest="",$ss_id="" ,$pay_id,$status);


//EV
		if($item['kbn'] == 9 ){
	        $eventManager = $this->backend->getManager("Event");
			$qid = $eventManager->getEventQId($member_id,$pay_info['itemid']);
			if($qid){
				//該当のt_ev_questのdopeをセット
				$ret2 = $eventManager->setDopeToEvQuest($member_id ,$qid['evid'],$qid['questid'],$pay_info['itemid']);
			}else{
				$ret2 = True;
			}
//STR
		}elseif($item['kbn'] == "s" ){
			$storageManager = $this->backend->getManager("Storage");
			$ret2 = $storageManager->setNewStorage($member_id);
		}else{
			$ret2 = True;
		}

$log .= "ret:\n" .print_r($ret,true)."\n";
$log .= "ret2:\n" .print_r($ret,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);

        if($ret === False || $ret2 === False){
            $db->query('ROLLBACK');
            return 'error_sys';
        }

        //トランザクション終了
        $ret = $db->query('COMMIT');
        if($ret === False){
            return 'error_sys';
        }

	}//GREE CHK

		return 'ok';
    }
}

?>
