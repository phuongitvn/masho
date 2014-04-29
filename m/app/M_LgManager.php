<?php
/**
 *  M_LgManager.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  M_LgmoneyManager
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_LgManager extends M_Manager
{
	/**
	* lg_event登録(同盟通信)
	*
	*/

	function writeEventLog($member_id ,$friend_id,$status,$id,$other_id,$win,$lose,$trid){

		$d = date('d');
		$member_id = mysql_real_escape_string($member_id);
		$friend_id = mysql_real_escape_string($friend_id);
		$status = mysql_real_escape_string($status);
		$id = mysql_real_escape_string($id);
		$other_id = mysql_real_escape_string($other_id);
		$win = mysql_real_escape_string($win);
		$lose = mysql_real_escape_string($lose);
		$trid = mysql_real_escape_string($trid);
		//0：ファイト撃退　1：ファイト敗北　2：助太刀依頼  5：友達参戦 6：同盟　7：申請された　8：削除された 9：断られた
		//A：カードプレ　B：お宝プレ　C：助太刀でお宝もらう

$sql = <<<EOD
INSERT INTO
 lg_event
(
  memberid
 ,friendid
 ,dd
 ,status
 ,ddn
 ,otherid
 ,win
 ,lose
 ,trid
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$friend_id}'
 ,'{$d}'
 ,'{$status}'
 ,'{$id}'
 ,'{$other_id}'
 ,'{$win}'
 ,'{$lose}'
 ,'{$trid}'
 ,now()
)
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		/*
		//msgAPIで送信(GREE
 		//titleフィールドは全角13文字
		//bodyフィールドは全角50文字
		switch($status){
			case "0":
				//*********"１２３４５６７８９０１２３"
				$s_title = "ﾌｧｲﾄ&#xE6FD;よっし♪撃退&#xE6F5;";
				//*****"１２３４５６７８９０１２３４５６７８９０"
				$msg = "やった&#xE6FD;ﾌｧｲﾄで襲われたけどﾅｲｽ防御&#xE753;";
				break;
			case "1":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE757;ﾌｧｲﾄ凹ﾏｼﾞか…敗北&#xE700;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "ﾔﾊﾞｲ&#xE702;速攻で軍強化+防御ｱｲﾃﾑ配備なのﾗ";
				break;
			case "2":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE695;ﾍﾙﾌﾟ&#xE695;助けなきゃ！";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "同盟から助太刀依頼ﾀﾞﾖ&#xE733;";
				break;
			case "5":
				//*********"１２３４５６７８９０１２３"
				$s_title = "招待成功&#xE727;ｶﾞﾁｬGOLD&#xE71A;GET";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "&#xE727;招待した軍が参戦!げんきも+1UP&#xE6ED;";
				break;
			case "6":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE72A;やりー&#xE63E;ﾆｺﾆｺしよ&#xE713;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "&#xE72A;同盟軍が増えました♪早速ﾆｺﾆｺしてみﾖ&#xE6F0;";
				break;
			case "7":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE73B;早くはやく～&#xE733;ﾆｺﾆｺしよ";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "同盟申請&#xE717;届いてるﾖﾝ♪同盟増やせばつぉくなる&#xE6FD;";
				break;
			case "8":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE72E;ﾏﾒに軍強化やんなきゃ&#xE72E;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "&#xE757;同盟追放されました…&#xE6F4;";
				break;
			case "9":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE72C;ｸﾖｸﾖすんな！他軍誘ぉう&#xE729;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "&#xE72B;同盟申請が却下…他にもｲｯﾊﾟｲいるよ&#xE72C;";
				break;
			case "A":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE685;ｶｰﾄﾞ&#xE6FA;もらったよ&#xE694;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "もらったｶｰﾄﾞ&#xE685;ﾌﾟﾚ箱で確認♪同盟にお返しもﾈ&#xE6F8;";
				break;
			case "B":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE71B;お宝&#xE6FA;もらった&#xE6ED;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "&#xE71B;お宝&#xE71B;ﾍﾟｰｼﾞで確認なのﾗ 同盟にお返しもﾈ&#xE6F8;";
				break;
			case "C":
				//*********"１２３４５６７８９０１２３"
				$s_title = "&#xE726;同盟がやりましたっ&#xE726;";
				//*****"１２３４５６７８９０１２３４５６７８９"
				$msg = "&#xE642;助太刀勝利でお宝GET&#xE71B;ﾃﾞｯｽ感謝ｺﾒしよ～&#xE729;";
				break;
		}

		if($status != "1"){
			$sRes = sendMsg($member_id,$s_title,$msg);
		}
		*/
		return true;

	}

	/**
	* イベントログ存在チェック
	*
	*/
	function existsEventLog($member_id,$friend_id,$status){
		$escapedId = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);
		$status = mysql_real_escape_string($status);
$sql = <<<EOD
SELECT
  count(dd) 
FROM
 lg_event
WHERE
 memberid = '{$escapedId}'
AND
 friendid = '{$escapedFriendId}'
AND
 status ='{$status}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;

	}


	/**
	* lg_friend登録(同盟通信)
	*
	*/
	function writeFriendLog($member_id ,$status,$stage,$seriesid,$trid,$seq,$rank){
		$d = date('d');
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		//0：クエスト進捗（ステージクリア)　1：お宝コンプ 2：欲しいカード　3：ガチャ（レアカード)
		$stage = mysql_real_escape_string($stage);
		$seriesid = mysql_real_escape_string($seriesid);
		$trid = mysql_real_escape_string($trid);
		$seq = mysql_real_escape_string($seq);
		$rank = mysql_real_escape_string($rank);

$sql = <<<EOD
INSERT INTO
 lg_friend
(
  memberid
 ,dd
 ,status
 ,stagecycle
 ,seriesid
 ,trid
 ,seq
 ,rank
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$d}'
 ,'{$status}'
 ,'{$stage}'
 ,'{$seriesid}'
 ,'{$trid}'
 ,'{$seq}'
 ,'{$rank}'
 ,now()
)
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;

	}


	/**
	* 伝令リスト取得
	*
	*/
	function getEventLoglist($member_id ,$limit="" ,$offset=""){

		$d = date('d');
		$member_id = mysql_real_escape_string($member_id);
		$limit = mysql_real_escape_string($limit);
		$offset = mysql_real_escape_string($offset);

		$sqlLimit = "";
		if($limit != ""){
			$sqlLimit = " LIMIT " .$limit;
		}
		$sqlOffset = "";
		if($offset != ""){
			$sqlOffset = " OFFSET " .$offset;
		}

$sql = <<<EOD
SELECT
  memberid
 ,friendid
 ,dd
 ,status
 ,ddn
 ,otherid
 ,win
 ,lose
 ,trid
 ,reg_time
FROM
 lg_event
WHERE
 memberid = {$member_id} 
ORDER BY reg_time DESC 
{$sqlLimit}
{$sqlOffset}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		$userManager = $this->backend->getManager("User");
		//友達名称
		foreach($rs as $k => $v){
			$ret = $userManager->getSimpleProfile($rs[$k]['friendid']);
			$rs[$k]['friendname'] = $ret['handle'];
			//lg_fightの存在CHK
			if($rs[$k]['status'] == 0 || $rs[$k]['status'] == 1){
				$ret2 = $this->getFightLog($rs[$k]['friendid'],$member_id,$rs[$k]['ddn']);
				if($ret2 !== False){
					$rs[$k]['lnk'] = 1;
				}
			}
			//護符の使用CHK
			if($rs[$k]['win'] == 0 && $rs[$k]['lose'] == 0 ){
				$rs[$k]['trap'] = 1;
			}
			//カード名称取得
			if($rs[$k]['status'] == "A"){
				$cardManager = $this->backend->getManager("Card");
				$card = $cardManager->getDispCardInfo($member_id , $rs[$k]['otherid']);
				$rs[$k]['namerank'] = $card['name']."(".$card['rank'].")";
			}
			//お宝取得
			if($rs[$k]['status'] == "B" || $rs[$k]['status'] == "C"){
				$treasureManager = $this->backend->getManager("Treasure");
				$getTr = $treasureManager->TrDtInfo($rs[$k]['trid']);
				$getSr = $treasureManager->TrSeriInfo($getTr['tr_seriesid']);
				$rs[$k]['trname'] = $getSr['name']." thuộc Gói ".$getTr['name'];
			}

		}

		return $rs;

	}


	/**
	* レアカードGETユーザ取得
	*
	*/
	function getRareGetUser($seq,$rank,$term){

		$d = date('d');
		$seq = mysql_real_escape_string($seq);
		$rank = mysql_real_escape_string($rank);
		$term = mysql_real_escape_string($term);
 		$thDate = sprintf("%02d", date('d' ,mktime(0,0,0,date("m"),date("d") - $term,date("y"))));

$sql = <<<EOD
SELECT
  memberid 
 ,stagecycle 
FROM
 lg_friend
WHERE
 seq = '{$seq}'
AND
 rank = '{$rank}'
AND
 status = '3'
AND
 dd >= '{$thDate}' 
ORDER BY reg_time DESC 
LIMIT 1 
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		return $rs;

	}


	/**
	* 同盟通信リスト取得
	*
	*/
	function getFriendLoglist($member_id ,$limit="" ,$offset=""){

		$d = date('d');
		$member_id = mysql_real_escape_string($member_id);
		$limit = mysql_real_escape_string($limit);
		$offset = mysql_real_escape_string($offset);

		$sqlLimit = "";
		if($limit != ""){
			$sqlLimit = " LIMIT " .$limit;
		}
		$sqlOffset = "";
		if($offset != ""){
			$sqlOffset = " OFFSET " .$offset;
		}

$sql = <<<EOD
SELECT
 lg_friend.memberid
 ,dd
 ,lg_friend.status
 ,stagecycle
 ,seriesid
 ,trid
 ,seq
 ,rank
 ,lg_friend.reg_time
FROM
 lg_friend
INNER JOIN
 t_friend
ON
 t_friend.friendid = lg_friend.memberid
WHERE
 t_friend.memberid = {$member_id}
AND
 t_friend.status = 2
ORDER BY lg_friend.reg_time DESC 
{$sqlLimit}
{$sqlOffset}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		$userManager = $this->backend->getManager("User");
		$treasureManager = $this->backend->getManager("Treasure");
		$cardManager = $this->backend->getManager("Card");
		$itemManager = $this->backend->getManager("Item");
		$cyTitle = $this->config->get('cyTitle');

		foreach($rs as $k => $v){
			$ret = $userManager->getSimpleProfile($rs[$k]['memberid']);
			$rs[$k]['friendname'] = $ret['handle'];
			switch($rs[$k]['status']){
				case "0":	//クエスト進捗（ステージクリア)
					$pstage = substr($rs[$k]['stagecycle'],0,1);
					$cstage = $pstage + 1;
					$rs[$k]['stagename']  = 'Toàn thắng Chiến trường '.$userManager->getStageName($pstage).", ";
					$rs[$k]['stagename'] .= 'bước vào Trận mở màn Chiến trường '. $userManager->getStageName($cstage);
					break;
				case "1":	//お宝コンプ
					$ret = $treasureManager->TrSeriInfo($rs[$k]['seriesid']);
					$rs[$k]['seriesname'] = $ret['name'];
					break;
				case "2":	//欲しいカード
					$ret = $cardManager->getGachaCardInfo($rs[$k]['seq'] , $rs[$k]['rank'] );
					$rs[$k]['bushoname'] = $ret['name'];
					break;
				case "3":	//ガチャ（レアカード)
					$ret = $cardManager->getGachaCardInfo($rs[$k]['seq'] , $rs[$k]['rank'] );
					$rs[$k]['bushoname'] = $ret['name'];
					break;
				case "4":	//ｲﾍﾞﾝﾄでアイテムGET
					$ret = $itemManager->getItemData($rs[$k]['trid']);
					$rs[$k]['itemname'] = $ret['name'];
					break;
			}
		}

		return $rs;

	}

	/**
	* 助太刀登録
	*
	*/

	function writeHelpLog($member_id ,$other_id,$times,$trid){

		$ddn = sprintf("%02d", date('d')).$times;
		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);
		$times = mysql_real_escape_string($times);
		$trid = mysql_real_escape_string($trid);

$sql = <<<EOD
INSERT INTO
 lg_help
(
  ddn
 ,memberid
 ,otherid
 ,trid
 ,reg_time
)
VALUES
(
  '{$ddn}'
 ,'{$member_id}'
 ,'{$other_id}'
 ,'{$trid}'
 ,now()
)
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;

	}

	/**
	* 助太刀情報取得
	*
	*/
	function getHelpLog($member_id ,$other_id,$ddn){
		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);
		$ddn = mysql_real_escape_string($ddn);

$sql = <<<EOD
SELECT
  memberid
 ,otherid
 ,ddn
 ,friendid
 ,trid
 ,entry_flg
 ,reg_time
 ,upd_time
FROM
 lg_help
WHERE
 memberid = '{$member_id}'
AND
 otherid = '{$other_id}'
AND
 ddn = '{$ddn}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		if(count($rs) == 0){
			return False;
		}

		return $rs;

	}

	/**
	* 助太刀参戦
	*
	*/

	function updateHelpLog($help_id ,$other_id,$ddn,$member_id,$winner){

		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);
		$help_id = mysql_real_escape_string($help_id);
		$ddn = mysql_real_escape_string($ddn);
		$winner = mysql_real_escape_string($winner);

		//既に助太刀完了でないかのCHK
		$chk = $this->getHelpLog($help_id ,$other_id,$ddn);

		if($chk['entry_flg'] == 0){

$sql = <<<EOD
UPDATE
 lg_help
SET
  friendid = '{$member_id}' 
 ,entry_flg = '{$winner}' 
 ,upd_time = now()
WHERE
 memberid = '{$help_id}' 
AND
 otherid = '{$other_id}' 
AND
 ddn = '{$ddn}' 
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);

			if(Ethna::isError($rs) || $rs === false){
				return false;
			}

			return true;

		}else{
			return $chk;
		}

	}


	/**
	* ファイトログ取得
	*
	*/
	function getFightLog($member_id ,$other_id,$ddn){
		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);
		$ddn = mysql_real_escape_string($ddn);

$sql = <<<EOD
SELECT
  ddn
 ,memberid
 ,otherid
 ,friendid
 ,trid
 ,winner
 ,win
 ,lose
 ,exp
 ,money
 ,genki
 ,formno
 ,ot_formno
 ,winner1
 ,winner2
 ,winner3
 ,winner4
 ,winner5
 ,bushoid1
 ,bushoid2
 ,bushoid3
 ,bushoid4
 ,bushoid5
 ,ot_bushoid1
 ,ot_bushoid2
 ,ot_bushoid3
 ,ot_bushoid4
 ,ot_bushoid5
 ,level1
 ,level2
 ,level3
 ,level4
 ,level5
 ,ot_level1
 ,ot_level2
 ,ot_level3
 ,ot_level4
 ,ot_level5
 ,damage1
 ,damage2
 ,damage3
 ,damage4
 ,damage5
 ,reg_time
FROM
 lg_fight
WHERE
 memberid = '{$member_id}'
AND
 otherid = '{$other_id}'
AND
 ddn = '{$ddn}'
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		if(count($rs) == 0){
			return False;
		}

		return $rs;

	}

	/**
	* 魔将ファイト回数取得
	*
	*/
	function getMashoFightCnt($member_id ,$stagecycle){

		$member_id = mysql_real_escape_string($member_id);
		$stagecycle = mysql_real_escape_string($stagecycle);
		$dd = sprintf("%02d", date('d'));

$sql = <<<EOD
SELECT
 count(times) 
FROM
 lg_masho
WHERE
 memberid = '{$member_id}'
AND
 stagecycle = '{$stagecycle}'
AND
 dd = '{$dd}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;

	}

	function writeLevelLog($member_id, $level) {
		$member_id = mysql_real_escape_string($member_id);
		$level = mysql_real_escape_string($level);
$sql = <<<EOD
INSERT INTO
 lg_level
(
	memberid,
	level,
	reg_time
)
VALUES
(
	'{$member_id}',
	'{$level}',
	now()
)
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;
	}

	/**
	* 魔将ファイトログ登録
	*
	*/

	function writeMashoFightLog($member_id ,$stagecycle,$times,$friend,$profile,$myOffP,$myDefP,$myFol,$win,$rcv){

		$dd = sprintf("%02d", date('d'));
		$member_id = mysql_real_escape_string($member_id);
		$stagecycle = mysql_real_escape_string($stagecycle);
		$times = mysql_real_escape_string($times);
		$win = mysql_real_escape_string($win);
		$rcv = mysql_real_escape_string($rcv);

$sql = <<<EOD
INSERT INTO
 lg_masho
(
  memberid
 ,stagecycle
 ,dd
 ,times
 ,friend1
 ,friend2
 ,coeff1
 ,coeff2
 ,card_seq1
 ,card_seq2
 ,card_seq3
 ,card_seq4
 ,card_seq5
 ,offense
 ,defense
 ,follower
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$stagecycle}'
 ,'{$dd}'
 ,'{$times}'
 ,'{$friend[0]["friendid"]}'
 ,'{$friend[1]["friendid"]}'
 ,'{$friend[0]["coeff"]}'
 ,'{$friend[1]["coeff"]}'
 ,'{$profile["deck1"]}'
 ,'{$profile["deck2"]}'
 ,'{$profile["deck3"]}'
 ,'{$profile["deck4"]}'
 ,'{$profile["deck5"]}'
 ,'{$myOffP}'
 ,'{$myDefP}'
 ,'{$myFol}'
 ,now()
) 
 ON DUPLICATE KEY 
UPDATE 
 win = '{$win}' , rcv = '{$rcv}' 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;

	}
}
?>
