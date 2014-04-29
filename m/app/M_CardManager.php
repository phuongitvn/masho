<?php
/**
 *  M_CardManager.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */
class M_CardManager extends M_Manager
{
	/**
	* 合成成功確率取得
	*
	*/
	function getComposeOdd($rank){

		//11/01/06変更　以前：VR50 HG50 A50 B70 C90
		//11/03/04変更　以前：VR70 HG70 A70 B80 C90
		switch($rank){
			case "A":
				$rs = 40;
				break;
			case "B":
				$rs = 50;
				break;
			case "C":
				$rs = 60;
				break;
			case "D":
				$rs = 70;
				break;
			case "E":
				$rs = 80;
				break;
		}
		return $rs;

	}

	/**
	* クエストLVUP時カードランク+レベル取得
	*
	*/
	function getLvupCard(){

		$ranNum = mt_rand(1,10000);

		if($ranNum <= 1){
			$rs['rank_num'] = 5;
			$rs['rank'] = "A";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 3){
			$rs['rank_num'] = 4;
			$rs['rank'] = "B";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 500){
			$rs['rank_num'] = 3;
			$rs['rank'] = "C";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 2500){
			$rs['rank_num'] = 2;
			$rs['rank'] = "D";
			$rs['bushoseq'] = mt_rand(1,22);
		}else{
			$rs['rank_num'] = 1;
			$rs['rank'] = "E";
			$rs['bushoseq'] = mt_rand(1,22);
		}

		//カードLVは1固定
		$rs['level'] = 1;

		return $rs;

	}

   /**
	* ガチャ札デモ表示
	*
	*/
	function getGachaDemo($type){

		$sq['0'] = mt_rand(1,22);
		$sq['1'] = mt_rand(1,22);
		$sq['2'] = mt_rand(1,22);
		$rank['0'] = "C";
		$rank['1'] = "B";

		if($type == ""){
			$rank['2'] = "D";
		}elseif($type == "GOLD"){
			$rank['2'] = "A";
		}

		for ($i=0; $i<=2; $i++) {

$sql = <<<EOD
SELECT
  bushoid
FROM
 m_busho 
WHERE
 rank = '{$rank[$i]}'
AND
 seq  = {$sq[$i]}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs[$i] = $db->getOne($sql);

		}

		return $rs;

	}

   /**
	* ガチャ札ぷらちな 専用　ランク+レベル取得
	*
	*/
	function getGachaPtCard(){

		$ranNum = mt_rand(1,100);
		$lvNum = mt_rand(1,100);

		if($ranNum <= 10){
			$rs['rank_num'] = 5;
			$rs['rank'] = "A";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 50){
			$rs['rank_num'] = 4;
			$rs['rank'] = "B";
			$rs['bushoseq'] = mt_rand(1,22);
		}else{
			$rs['rank_num'] = 3;
			$rs['rank'] = "C";
			$rs['bushoseq'] = mt_rand(1,22);
		}

		if($lvNum <= 3){
			$rs['level'] = 5;
		}elseif($lvNum <= 7){
			$rs['level'] = 4;
		}elseif($lvNum <= 12){
			$rs['level'] = 3;
		}elseif($lvNum <= 30){
			$rs['level'] = 2;
		}else{
			$rs['level'] = 1;
		}

		if($rs['rank'] == "B"){
			$rs['level'] = $rs['level'] + 2;
		}elseif($rs['rank'] == "C"){
			$rs['level'] = $rs['level'] + 4;
		}

		return $rs;

	}

   /**
	* ガチャ札GOLD 専用　ランク+レベル取得
	*
	*/
	function getGachaGoldCard(){

		$ranNum = mt_rand(1,100);
		$lvNum = mt_rand(1,100);

		if($ranNum <= 5){
			$rs['rank_num'] = 5;
			$rs['rank'] = "A";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 30){
			$rs['rank_num'] = 4;
			$rs['rank'] = "B";
			$rs['bushoseq'] = mt_rand(1,22);
		}else{
			$rs['rank_num'] = 3;
			$rs['rank'] = "C";
			$rs['bushoseq'] = mt_rand(1,22);
		}

		if($lvNum <= 3){
			$rs['level'] = 5;
		}elseif($lvNum <= 7){
			$rs['level'] = 4;
		}elseif($lvNum <= 12){
			$rs['level'] = 3;
		}elseif($lvNum <= 30){
			$rs['level'] = 2;
		}else{
			$rs['level'] = 1;
		}

		return $rs;

	}

   /**
	* ガチャ札ランク+レベル取得
	*
	*/
	function getGachaCard(){

		$ranNum = mt_rand(1,10000);
		$lvNum = mt_rand(1,100);

		if($ranNum <= 2){
			$rs['rank_num'] = 5;
			$rs['rank'] = "A";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 302){
			$rs['rank_num'] = 4;
			$rs['rank'] = "B";
			$rs['bushoseq'] = mt_rand(1,22);
		}elseif($ranNum <= 2500){
			$rs['rank_num'] = 3;
			$rs['rank'] = "C";
			$rs['bushoseq'] = mt_rand(1,22);
		}else{
			$rs['rank_num'] = 2;
			$rs['rank'] = "D";
			$rs['bushoseq'] = mt_rand(1,22);
		}

		if($lvNum <= 3){
			$rs['level'] = 5;
		}elseif($lvNum <= 7){
			$rs['level'] = 4;
		}elseif($lvNum <= 12){
			$rs['level'] = 3;
		}elseif($lvNum <= 30){
			$rs['level'] = 2;
		}else{
			$rs['level'] = 1;
		}

		return $rs;

	}

	/**
	* ガチャカード情報取得(m_bushoから必要情報取得)
	*
	*/
	function getGachaCardInfo($seq , $rank ){

		$seq = mysql_real_escape_string($seq);
		$rank = mysql_real_escape_string($rank);

$sql = <<<EOD
SELECT
  bushoid
 ,rank
 ,name
 ,sec_name 
 ,sec_expla
FROM
 m_busho 
WHERE
 rank = '{$rank}'
AND
 seq  = {$seq}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

   /**
	* カードリスト件数取得
	*
	*/
	function getCardlistCount($member_id ,$status){

		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);

		if($status == "all"){
			$status = " (status = 0 OR status = 1) ";
		}else{
			$status = "  status = " .$status ;
		}

$sql = <<<EOD
SELECT
  count(memberid) as cnt
FROM
 t_card
WHERE
 memberid = {$member_id}
AND
{$status}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

   /**
	* カードリスト件数取得
	*
	*/
	function getTbdCardSeq($member_id){
		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  cardseq
FROM
 t_card
WHERE
 memberid = {$member_id}
AND
 status = '3' 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

   /**
	* カードリスト件数取得
	*
	*/
	function getTbdCardSeqRow($member_id){
		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  cardseq
FROM
 t_card
WHERE
 memberid = {$member_id}
AND
 status = '3' 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

	/**
	* カードリスト取得
	*
	*/
	function getCardlist($member_id ,$status ,$sort,$limit="" ,$offset=""){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$sort = mysql_real_escape_string($sort);
		$limit = mysql_real_escape_string($limit);
		$offset = mysql_real_escape_string($offset);

		$sqlOrder = "";
		switch($sort){
			case "off":
				$sqlOrder = " ORDER BY t_card.offense DESC ";
				break;
			case "def":
				$sqlOrder = " ORDER BY t_card.defense DESC ";
				break;
			case "lv":
				$sqlOrder = " ORDER BY t_card.level DESC, m_busho.rank_num DESC, t_card.offense DESC, m_busho.rubi ";
				break;
			case "ulv":
				$sqlOrder = " ORDER BY t_card.level , m_busho.rank_num , t_card.offense , m_busho.rubi ";
				break;
			case "rk":
				$sqlOrder = " ORDER BY m_busho.rank_num DESC, m_busho.rubi, t_card.level DESC, t_card.offense DESC ";
				break;
			case "urk":
				$sqlOrder = " ORDER BY m_busho.rank_num , m_busho.rubi, t_card.level , t_card.offense  ";
				break;
			case "ork":
				$sqlOrder = " ORDER BY m_busho.rank_num DESC, t_card.level DESC, t_card.offense DESC, m_busho.rubi ";
				break;
			case "rb":
				$sqlOrder = " ORDER BY m_busho.`eng`, m_busho.rank_num DESC, t_card.level DESC, t_card.offense DESC ";
				break;
			default:
				$sqlOrder = " ORDER BY m_busho.rank_num DESC, m_busho.rubi, t_card.level DESC, t_card.offense DESC ";
				break;
		}
		if($status == "all"){
			$status = " (status = 0 OR status = 1) ";
		}else{
			$status = "  status = " .$status ;
		}
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
  t_card.bushoid
 ,t_card.cardseq
 ,t_card.level
 ,t_card.offense
 ,t_card.defense
 ,t_card.follower
 ,m_busho.name
 ,m_busho.seq
 ,m_busho.rank
 ,m_busho.rank_num
 ,m_busho.rubi
FROM
 t_card
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 memberid = {$member_id}
AND
{$status}
{$sqlOrder}
{$sqlLimit}
{$sqlOffset}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);
		if(Ethna::isError($rs) || $rs === false){
			return array();
		}
		//武将属性取得
		foreach($rs as $k => $v){
			$rs[$k]["name_rank"] = $rs[$k]["name"]."(".$rs[$k]["rank"] . ")";
		}

		return $rs;

	}

	/**
	* カード情報取得
	*
	*/
	function getCardInfo($member_id , $seq = False , $status = False){

		$member_id = mysql_real_escape_string($member_id);
		$seq = mysql_real_escape_string($seq);
		$status = mysql_real_escape_string($status);

$sql = <<<EOD
SELECT
  cardseq
 ,status
 ,bushoid
 ,level
 ,offense
 ,defense
 ,follower
 ,win_f
 ,lose_f
 ,win_m
 ,lose_m
FROM
 t_card
WHERE
 memberid = {$member_id}
EOD;
		if($status== True){
$sql .= <<<EOD
 AND
 status   = {$status}
EOD;
		}
		if($seq== True){
$sql .= <<<EOD
 AND
 cardseq  = {$seq}
EOD;
		}
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		//勝率の計算
		$rs['win']  = $rs['win_f']  + $rs['win_m'];
		$rs['lose'] = $rs['lose_f'] + $rs['lose_m'];

		if($rs['win'] == 0 && $rs['lose'] == 0 ){
			$rs['rate'] = "0";
		}else{
			$rs['rate'] = floor($rs['win'] *100 / ($rs['win']+$rs['lose'] ));
		}

		return $rs;

	}

	/**
	* 欲しいカードリスト取得
	*
	*/
	function getWishlistCount($member_id ,$status ,$seq="" ,$rank=""){
		//status　0:登録時 1:中止　

		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$seq = mysql_real_escape_string($seq);
		$rank = mysql_real_escape_string($rank);

		$where = "";
		if($seq != ""){
			$where = " AND seq = " .$seq;
		}
		if($rank != ""){
			$where .= " AND rank = '" .$rank ."'";
		}

$sql = <<<EOD
SELECT
 count(status)
FROM
 t_wish
WHERE
 memberid = {$member_id}
AND
 status = 0 
{$where}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		return $rs;

	}

	/**
	* 欲しいカードリスト取得
	*
	*/
	function getWishlist($member_id ,$status ,$seq="" ,$rank="",$friend_id){
		//status　0:登録時 1:中止　
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$seq = mysql_real_escape_string($seq);
		$rank = mysql_real_escape_string($rank);
		$friend_id = mysql_real_escape_string($friend_id);

		$where = "";
		if($seq != ""){
			$where = " AND t_wish.seq = " .$seq;
		}
		if($rank != ""){
			$where .= " AND t_wish.rank = '" .$rank ."'";
		}

$sql = <<<EOD
SELECT
  t_wish.seq
 ,t_wish.rank
 ,m_busho.bushoid
 ,m_busho.name
 ,m_busho.rank
 ,m_busho.rank_num
FROM
 t_wish
INNER JOIN
 m_busho 
ON
 t_wish.seq = m_busho.seq 
AND
 t_wish.rank = m_busho.rank 
WHERE
 memberid = {$member_id}
AND
 status = 0 
{$where}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//武将属性取得
		foreach($rs as $k => $v){
			$rs[$k]["name_rank"] = $rs[$k]["name"]."(".$rs[$k]["rank"] . ")";
			//同盟の欲しいカードを保有しているかCHK
			if($friend_id != ""){
				$ret = $this->chkOwnCard($rs[$k]["bushoid"],$friend_id);
				if($ret == 0){
					$rs[$k]["own"] = 0;
				}else{
					$rs[$k]["own"] = $ret[0]['status'];
				}
			}

		}

		return $rs;

	}

	/**
	* 武将IDカード保有CHK
	*
	*/
	function chkOwnCard($id,$member_id){

		$member_id = mysql_real_escape_string($member_id);
		$id = mysql_real_escape_string($id);

$sql = <<<EOD
SELECT
  cardseq
 ,status
 ,level
FROM
 t_card
WHERE
 bushoid = '{$id}'
AND
 memberid = '{$member_id}'
AND
 status IN (1,2)
ORDER BY level 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		//件数　0
		if(count($rs) == 0){
			return 0;
		}else{
			return $rs;
		}

	}

	/**
	* 武将属性取得
	*
	*/
	function getCardAtt($id){
		$id = mysql_real_escape_string($id);
$sql = <<<EOD
SELECT
  bushoid
 ,seq
 ,rank
 ,rank_num
 ,name
 ,rubi
 ,gender
 ,expla
 ,offense
 ,defense
 ,follower
 ,sec_name
 ,sec_kbn
 ,sec_expla
 ,eff_expla
 ,type
 ,1koto_win 
 ,1koto_lose 
FROM
 m_busho
WHERE
 bushoid = '{$id}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		$rs['nameRank'] = $rs['name']."(".$rs['rank'] . ")";

		return $rs;

	}

	/**
	* 陣形効果取得
	*
	*/
	function getFormNo($deck){

		$formNo = 0;

		$seqNum  = array_count_values($deck['bushoseq']);
		$rankNum = array_count_values($deck['rank']);
		$genNum  = array_count_values($deck['gender']);
		$typeNum = array_count_values($deck['sec_kbn']);
		$mMASHO_SEQ = $this->config->get('mMASHO_SEQ');

		//性別
		if(count($genNum) == 1){
			if($deck['gender'][1] == 1){
				$formNo = 55;
			}else{
				$formNo = 56;
			}
		}
		//奥義タイプ
		if(count($typeNum) == 1){
			if($deck['sec_kbn'][1] == 1){
				$formNo = 52;
			}elseif($deck['sec_kbn'][1] == 2){
				$formNo = 53;
			}elseif($deck['sec_kbn'][1] == 3){
				$formNo = 54;
			}
		}

		//武将連番
		if(count($seqNum) == 2){

			if(array_key_exists('2',array_flip($seqNum))){
				//2武田信玄
				if(array_key_exists('2',$seqNum) && $seqNum[2] == 3 ){
					if( array_key_exists('3',$seqNum) && $seqNum[3] == 2){
						$formNo = 35;
					}elseif( array_key_exists('14',$seqNum) && $seqNum[14] == 2){
						$formNo = 19;
					}
				}elseif(array_key_exists('2',$seqNum) && $seqNum[2] == 2 ){
					if( array_key_exists('3',$seqNum) && $seqNum[3] == 3){
						$formNo = 36;
					}elseif( array_key_exists('14',$seqNum) && $seqNum[14] == 3){
						$formNo = 20;
					}
				}
				//7織田信長
				if(array_key_exists('7',$seqNum) && $seqNum[7] == 3 ){
					if( array_key_exists('17',$seqNum) && $seqNum[17] == 2){
						$formNo = 43;
					}elseif( array_key_exists('21',$seqNum) && $seqNum[21] == 2){
						$formNo = 21;
					}elseif( array_key_exists('22',$seqNum) && $seqNum[22] == 2){
						$formNo = 39;
					}
				}elseif(array_key_exists('7',$seqNum) && $seqNum[7] == 2 ){
					if( array_key_exists('17',$seqNum) && $seqNum[17] == 3){
						$formNo = 44;
					}elseif( array_key_exists('21',$seqNum) && $seqNum[21] == 3){
						$formNo = 22;
					}elseif( array_key_exists('22',$seqNum) && $seqNum[22] == 3){
						$formNo = 40;
					}
				}
				//6直江兼続
				if(array_key_exists('6',$seqNum) && $seqNum[6] == 3 ){
					if( array_key_exists('28',$seqNum) && $seqNum[28] == 2){
						$formNo = 41;
					}elseif( array_key_exists('14',$seqNum) && $seqNum[14] == 2){
						$formNo = 37;
					}
				}elseif(array_key_exists('6',$seqNum) && $seqNum[6] == 2 ){
					if( array_key_exists('28',$seqNum) && $seqNum[28] == 3){
						$formNo = 42;
					}elseif( array_key_exists('14',$seqNum) && $seqNum[14] == 3){
						$formNo = 38;
					}
				}
				//8島津義弘
				if(array_key_exists('8',$seqNum) && $seqNum[8] == 3 ){
					if( array_key_exists('5',$seqNum) && $seqNum[5] == 2){
						$formNo = 27;
					}elseif( array_key_exists('23',$seqNum) && $seqNum[23] == 2){
						$formNo = 49;
					}
				}elseif(array_key_exists('8',$seqNum) && $seqNum[8] == 2 ){
					if( array_key_exists('5',$seqNum) && $seqNum[5] == 3){
						$formNo = 28;
					}elseif( array_key_exists('23',$seqNum) && $seqNum[23] == 3){
						$formNo = 50;
					}
				}
				if(array_key_exists('9',$seqNum) && $seqNum[9] == 3 && array_key_exists('29',$seqNum) && $seqNum[29] == 2){
						$formNo = 23;
				}elseif(array_key_exists('9',$seqNum) && $seqNum[9] == 2 && array_key_exists('29',$seqNum) && $seqNum[29] == 3){
						$formNo = 24;
				}elseif(array_key_exists('13',$seqNum) && $seqNum[13] == 3 && array_key_exists('24',$seqNum) && $seqNum[24] == 2){
						$formNo = 25;
				}elseif(array_key_exists('13',$seqNum) && $seqNum[13] == 2 && array_key_exists('24',$seqNum) && $seqNum[24] == 3){
						$formNo = 26;
				}elseif(array_key_exists('16',$seqNum) && $seqNum[16] == 3 && array_key_exists('12',$seqNum) && $seqNum[12] == 2){
						$formNo = 29;
				}elseif(array_key_exists('16',$seqNum) && $seqNum[16] == 2 && array_key_exists('12',$seqNum) && $seqNum[12] == 3){
						$formNo = 30;
				}elseif(array_key_exists('11',$seqNum) && $seqNum[11] == 3 && array_key_exists('20',$seqNum) && $seqNum[20] == 2){
						$formNo = 31;
				}elseif(array_key_exists('11',$seqNum) && $seqNum[11] == 2 && array_key_exists('20',$seqNum) && $seqNum[20] == 3){
						$formNo = 32;
				}elseif(array_key_exists('10',$seqNum) && $seqNum[10] == 3 && array_key_exists('15',$seqNum) && $seqNum[15] == 2){
						$formNo = 33;
				}elseif(array_key_exists('10',$seqNum) && $seqNum[10] == 2 && array_key_exists('15',$seqNum) && $seqNum[15] == 3){
						$formNo = 34;
				}elseif(array_key_exists('26',$seqNum) && $seqNum[26] == 3 && array_key_exists('21',$seqNum) && $seqNum[21] == 2){
						$formNo = 45;
				}elseif(array_key_exists('26',$seqNum) && $seqNum[26] == 2 && array_key_exists('21',$seqNum) && $seqNum[21] == 3){
						$formNo = 46;
				}elseif(array_key_exists('30',$seqNum) && $seqNum[30] == 3 && array_key_exists('4',$seqNum) && $seqNum[4] == 2){
						$formNo = 47;
				}elseif(array_key_exists('30',$seqNum) && $seqNum[30] == 2 && array_key_exists('4',$seqNum) && $seqNum[4] == 3){
						$formNo = 48;
				}
			}
			//フルハウス　フォーカード
			if(count($rankNum) == 1){
				if(array_key_exists('2',array_flip($seqNum)) ){
						$formNo = 18;
				}elseif( array_key_exists('4',array_flip($seqNum))){
					if($genNum['1'] >= 4){
						$formNo = 16;
					}elseif($genNum['2'] >= 4){
						$formNo = 17;
					}
				}
			}elseif(count($rankNum) == 2){
				if(array_key_exists('4',array_flip($seqNum))){
					//4つある武将連番を特定
					$flipSeqNum = array_flip($seqNum);
					$fourBushoSeq = $flipSeqNum['4'];
					//4つあるランクを特定
					$flipRankNum = array_flip($rankNum);
					$fourRank = $flipRankNum['4'];
					for ($m=1; $m<=5; $m++) {
						if( $deck['bushoseq'][$m] == $fourBushoSeq && $deck['rank'][$m] == $fourRank){
							$coNo ++;
						}
					}
					if($coNo == 4){
						if($genNum['1'] >= 4){
							$formNo = 16;
						}elseif($genNum['2'] >= 4){
							$formNo = 17;
						}
					}
				}elseif(array_key_exists('3',array_flip($seqNum)) && array_key_exists('3',array_flip($rankNum))){
					if( array_key_exists('2',array_flip($seqNum)) && array_key_exists('2',array_flip($rankNum))){
						//3つある武将連番を特定
						$flipSeqNum = array_flip($seqNum);
						$threeBushoSeq = $flipSeqNum['3'];
						//3つあるランクを特定
						$flipRankNum = array_flip($rankNum);
						$threeRank = $flipRankNum['3'];
						$coNo = 0;
						for ($m=1; $m<=5; $m++) {
							if( $deck['bushoseq'][$m] == $threeBushoSeq && $deck['rank'][$m] == $threeRank){
								$coNo ++;
							}
						}
						if($coNo == 3){
							$formNo = 18;
						}
					}
				}
			}

			//魔将との比較 51
			$refMasho = array_intersect($mMASHO_SEQ , $deck['bushoseq']);
			if(count($refMasho) == 2){
				$formNo = 51;
			}
		}elseif(count($seqNum) == 1){
			//魔将との比較 51
			$refMasho = array_intersect($mMASHO_SEQ , $deck['bushoseq']);
			if(count($refMasho) == 1){
				$formNo = 51;
			}
			if(count($rankNum) == 1){
				if($deck['gender']['1'] == 1){
					$formNo = 12;
				}else{
					$formNo = 13;
				}
			}elseif(count($rankNum) == 2){
				if($deck['gender']['1'] == 1){
					$formNo = 16;
				}else{
					$formNo = 17;
				}
			}elseif(count($rankNum) == 5){
				if($deck['gender']['1'] == 1){
					$formNo = 14;
				}else{
					$formNo = 15;
				}
			}
		}elseif(count($seqNum) == 5){
			if(count($rankNum) == 1){
				//マスタとの比較 1-11
				for ($i=1; $i<=11; $i++) {
					$mArray = "mFORM_".$i;
					$mForm[$i] = $this->config->get($mArray);
					$diff[$i] = array_diff($deck['bushoseq'],$mForm[$i]);
					if( count($diff[$i]) == 0 ){
						$formNo = $i;
					}
				}
			}

			//魔将との比較 51
			$refMasho = array_intersect($mMASHO_SEQ , $deck['bushoseq']);
			if(count($refMasho) == 5){
				$formNo = 51;
			}
		}elseif(count($seqNum) == 3){
			//魔将との比較 51
			$refMasho = array_intersect($mMASHO_SEQ , $deck['bushoseq']);
			if(count($refMasho) == 3){
				$formNo = 51;
			}
		}elseif(count($seqNum) == 4){
			//魔将との比較 51
			$refMasho = array_intersect($mMASHO_SEQ , $deck['bushoseq']);
			if(count($refMasho) == 4){
				$formNo = 51;
			}
		}

		//formNo 名称 テキスト
		if($formNo == 0){
			$rs['formno'] = 0;
		}else{
			$rs = $this->getFormAtt($formNo);
		}
		return $rs;

	}

   /**
	* 陣形マスタ取得
	*
	*/
	function getFormAtt($no){
		$no = mysql_real_escape_string($no);
$sql = <<<EOD
SELECT
  formno
 ,name
 ,to1
 ,min1
 ,to2
 ,min2
 ,form_expla
 ,eff_expla
FROM
 m_form
WHERE
 formno = {$no}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

	/**
	* カード表示情報取得(t_cardとm_bushoから必要情報取得)
	*
	*/
	function getDispCardInfo($member_id , $seq){
		$member_id = mysql_real_escape_string($member_id);
		$seq = mysql_real_escape_string($seq);
$sql = <<<EOD
SELECT
  t_card.cardseq
 ,t_card.bushoid
 ,t_card.level
 ,t_card.offense
 ,t_card.defense
 ,t_card.follower
 ,t_card.status
 ,t_card.win_f
 ,t_card.lose_f
 ,t_card.win_m
 ,t_card.lose_m
 ,m_busho.seq
 ,m_busho.name
 ,m_busho.rank
 ,m_busho.rank_num
 ,m_busho.sec_name 
 ,m_busho.sec_kbn 
 ,m_busho.ratio_off 
 ,m_busho.ratio_def 
 ,m_busho.ratio_fol 
 ,m_busho.1koto_win 
 ,m_busho.1koto_lose 
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 t_card.memberid = {$member_id} 
AND
 t_card.cardseq  = {$seq}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}
		//勝率の計算
		$rs['win']  = $rs['win_f']  + $rs['win_m'];
		$rs['lose'] = $rs['lose_f'] + $rs['lose_m'];

		if($rs['win'] == 0 && $rs['lose'] == 0 ){
			$rs['rate'] = "0";
		}else{
			$rs['rate'] = floor($rs['win'] *100 / ($rs['win']+$rs['lose'] ));
		}

		return $rs;

	}

	/**
	* 同ランク同武将カード情報取得(t_cardからbushoidが同じカード取得)
	*
	*/
	function getSameIdCardCount($member_id , $bushoid ,$status, $cardseq){
		$member_id = mysql_real_escape_string($member_id);
		$bushoid = mysql_real_escape_string($bushoid);
		$status = mysql_real_escape_string($status);
		$cardseq = mysql_real_escape_string($cardseq);
$sql = <<<EOD
SELECT
  count(cardseq) 
FROM
 t_card 
WHERE
 memberid = {$member_id} 
AND
 bushoid = '{$bushoid}' 
AND
 status = {$status} 
AND 
 cardseq != {$cardseq} 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* 同ランク同武将カード情報取得(t_cardからbushoidが同じカード取得)
	*
	*/
	function getSameIdCardList($member_id , $bushoid ,$status, $cardseq){
		$member_id = mysql_real_escape_string($member_id);
		$bushoid = mysql_real_escape_string($bushoid);
		$status = mysql_real_escape_string($status);
		$cardseq = mysql_real_escape_string($cardseq);
$sql = <<<EOD
SELECT
  t_card.bushoid
 ,cardseq
 ,level
 ,t_card.offense
 ,t_card.defense
 ,t_card.follower
 ,m_busho.name
 ,m_busho.rank
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 memberid = {$member_id} 
AND
 t_card.bushoid = '{$bushoid}'
AND
 status = {$status}
AND 
 cardseq != {$cardseq}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* 異ランク同武将 + 同ランク異武将 カード情報取得(t_cardから rank OR seq が同じカード取得)
	*
	*/
	function getSameSeqOrRankCardCount($member_id , $rank_num, $seq ,$status, $cardseq, $gold_mode=FALSE){
		$member_id = mysql_real_escape_string($member_id);
		$seq = mysql_real_escape_string($seq);
		$rank_num = mysql_real_escape_string($rank_num);
		$status = mysql_real_escape_string($status);
		$cardseq = mysql_real_escape_string($cardseq);
		$rank_num_con = $gold_mode ? " and rank_num <> {$rank_num}" : " OR rank_num = {$rank_num}";

$sql = <<<EOD
SELECT
  count(cardseq) 
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 memberid = {$member_id}
AND
 status = '{$status}' 
AND 
 cardseq != {$cardseq} 
AND
 ( seq = {$seq} {$rank_num_con} )
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* 異ランク同武将 + 同ランク異武将カード情報取得(t_cardから rank OR seq が同じカード取得)
	*
	*/
	function getSameSeqOrRankCardList($member_id , $rank_num, $seq ,$status, $cardseq, $gold_mode=FALSE){
		$member_id = mysql_real_escape_string($member_id);
		$seq = mysql_real_escape_string($seq);
		$rank_num = mysql_real_escape_string($rank_num);
		$status = mysql_real_escape_string($status);
		$cardseq = mysql_real_escape_string($cardseq);
		$rank_num_con = $gold_mode ? " and rank_num <> {$rank_num}" : " OR rank_num = {$rank_num}";
$sql = <<<EOD
SELECT
  t_card.bushoid
 ,cardseq
 ,level
 ,t_card.offense
 ,t_card.defense
 ,t_card.follower
 ,m_busho.name
 ,m_busho.rank
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 memberid = {$member_id} 
AND
 status = {$status}
AND 
 cardseq != {$cardseq}
AND
 ( seq = {$seq} {$rank_num_con} )
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* 同ランク異武将カード情報取得(t_cardからrankが同じカード取得)
	*
	*/
	function getSameRankCardCount($member_id , $rank_num ,$status, $cardseq){
		$member_id = mysql_real_escape_string($member_id);
		$rank_num = mysql_real_escape_string($rank_num);
		$status = mysql_real_escape_string($status);
		$cardseq = mysql_real_escape_string($cardseq);

$sql = <<<EOD
SELECT
  count(cardseq) 
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 memberid = {$member_id}
AND
 rank_num = {$rank_num} 
AND
 status = '{$status}' 
AND 
 cardseq != {$cardseq} 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* 同ランク異武将カード情報取得(t_cardからrankが同じカード取得)
	*
	*/
	function getSameRankCardList($member_id , $rank_num ,$status, $cardseq){
		$member_id = mysql_real_escape_string($member_id);
		$rank_num = mysql_real_escape_string($rank_num);
		$status = mysql_real_escape_string($status);
		$cardseq = mysql_real_escape_string($cardseq);
$sql = <<<EOD
SELECT
  t_card.bushoid
 ,cardseq
 ,level
 ,t_card.offense
 ,t_card.defense
 ,t_card.follower
 ,m_busho.name
 ,m_busho.rank
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 memberid = {$member_id} 
AND
 rank_num = {$rank_num} 
AND
 status = {$status}
AND 
 cardseq != {$cardseq}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}


	/**
	* 同武将 次ランク情報取得
	*
	*/
	function getNextBushoId($bushoid){
		$bushoid = mysql_real_escape_string($bushoid);
		$base = $this->getCardAtt($bushoid);
		$seq = $base['seq'];
		$num = $base['rank_num'];

		if($num == 5){
			return 0;
		}else{
			$rank_num = $num + 1;
$sql = <<<EOD
SELECT
  bushoid
FROM
 m_busho
WHERE
 seq = {$seq}
AND 
 rank_num = {$rank_num}
EOD;

			$db = $this->backend->getDb();
			$rs = $db->getOne($sql);

			if(Ethna::isError($rs) || $rs === false){
				return "";
			}

			return $rs;
		}
	}

	/**
	 * カードステータス更新（入替)
	 */
	function updateCardStatus($params){
		if(!$params["memberid"] || !is_numeric($params["memberid"])){
			return false;
		}
		if(!$params["cardseq"] || !is_numeric($params["cardseq"])){
			return false;
		}

		$sets = array();
		if(isset($params["status"])){
			$sets[] = "status='".mysql_real_escape_string($params['status'])."'";
		}
		if(isset($params["rank"])){
			$sets[] = "rank='".mysql_real_escape_string($params['rank'])."'";
		}
		if(isset($params["level"])){
			$sets[] = "level='".mysql_real_escape_string($params['level'])."'";
		}
		if(isset($params["bushoid"])){
			$sets[] = "bushoid='".mysql_real_escape_string($params['bushoid'])."'";
		}
		//加算タイプ
		if(isset($params["offense"])){
			$sets[] = "offense = offense + ".mysql_real_escape_string($params['offense']);
		}
		if(isset($params["defense"])){
			$sets[] = "defense = defense + ".mysql_real_escape_string($params['defense']);
		}
		if(isset($params["follower"])){
			$sets[] = "follower = follower + ".mysql_real_escape_string($params['follower']);
		}
		if(isset($params["win_f"])){
			$sets[] = "win_f = win_f + ".mysql_real_escape_string($params['win_f']);
		}
		if(isset($params["lose_f"])){
			$sets[] = "lose_f = lose_f + ".mysql_real_escape_string($params['lose_f']);
		}
		if(isset($params["win_m"])){
			$sets[] = "win_m = win_m + ".mysql_real_escape_string($params['win_m']);
		}
		if(isset($params["lose_m"])){
			$sets[] = "lose_m = lose_m + ".mysql_real_escape_string($params['lose_m']);
		}

		//セットされていれば変換
		if(isset($params["del_time"])){
			$sets[] = "del_time = now() ";
		}
		if(count($sets) == 0){
			//更新データなし
			return true;
		}

		$sets[] = "upd_time = now() ";
		$set = implode(",", $sets);

$sql = <<<EOD
UPDATE
 t_card
SET
 {$set}
WHERE
 memberid = {$params["memberid"]}
AND
 cardseq = {$params["cardseq"]}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;
	}

	/**
	* カード登録
	*
	*/
	function cardInsert($member_id ,$status ,$bushoid, $level,$init){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$bushoid = mysql_real_escape_string($bushoid);
		$level = mysql_real_escape_string($level);
		$init = mysql_real_escape_string($init);

//不正対策
		if($member_id == "9905" || $member_id == "8911016" || $member_id == "3911346" || $member_id == "6705998" || $member_id == "41065387" || $member_id == "36033039"){
		//LOG書き出し ファイル名設定
		$userManager = $this->backend->getManager("User");
		$profile = $userManager->getProfile($member_id);
		$filename = dirname(dirname(dirname(__FILE__)))."/logs/fusei" .date("ymd") .".log";
		$log  = date("Y-m-d H:i:s");
		$log .= "\n" .$_SERVER['REQUEST_URI'];
		$log .= "\nmemberid=".$member_id;
		$log .= "\n st=".$status;
		$log .= "\nbushoid=".$bushoid;
		$log .= "\nlevel=".$level;
		$log .= "\ninit=".$init;
		$log .= "\nprof:".print_r($profile,true)."\n";
		file_put_contents($filename, $log, FILE_APPEND);
		}

		//通常は$init="" で呼び出し、設定するのは新規登録時のみ
		//110121追加	$init がVR,HG,Aの時はガチャぷらちな
		if($init == "" || $init == "A" || $init == "B" || $init == "C"){
		//offense  defense  follower　はデフォルト2
		//t_user.cardseq 取得して+1
			$table ="t_user";
			$column = "card_seq";
			$where = "memberid = '" .$member_id."'";
			$ret = $this->incrementColumn($table ,$column ,$where);
			if( $ret == false){
				return false;
			}

$sql = <<<EOD
SELECT
  card_seq
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;

			$db = $this->backend->getDb();
			$cardseq = $db->getOne($sql);

			if(Ethna::isError($cardseq) || $cardseq === false){
				return false;
			}

		}else{
			$cardseq = $init;
		}

		//110121追加	$init がVR,HG,Aの時はガチャぷらちなで強化ptランダム付与
		$maxPt = mt_rand(11,20);
		if($init == "A" || $init == "B" || $init == "C"){	//総量11～20
			$val1 = mt_rand(0,$maxPt);
			$val2 = mt_rand(0,($maxPt - $val1) );
			$val3 = $maxPt - $val1 - $val2;
			$ofP = $val1 + 2;
			$deP = $val2 + 2;
			$foP = $val3 + 2;
		}else{
			$ofP = 2;
			$deP = 2;
			$foP = 2;
		}

$sql = <<<EOD
INSERT INTO
 t_card
(
  memberid
 ,cardseq
 ,status
 ,bushoid
 ,level
 ,offense
 ,defense
 ,follower
 ,reg_time
 ,upd_time
)
VALUES
(
  {$member_id}
 ,{$cardseq}
 ,'{$status}'
 ,'{$bushoid}'
 ,{$level}
 ,{$ofP}
 ,{$deP}
 ,{$foP}
 ,now()
 ,now()
)
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		//統計情報記録
		$ret = $this->writeCardStat($bushoid,$num="1");
		if($ret === False){
			return False;
		}

		return $cardseq;

	}



	/**
	 * 欲しいカードリスト更新
	 */
	function updateWishStatus($params){
		if(!$params["memberid"] || !is_numeric($params["memberid"])){
			return false;
		}
		if(!$params["seq"] || !is_numeric($params["seq"])){
			return false;
		}
		$rank = mysql_real_escape_string($params['rank']);

		if(isset($params["status"])){
			$set = " status='".mysql_real_escape_string($params['status'])."'";
		}

$sql = <<<EOD
UPDATE
 t_wish
SET
 {$set}
 ,upd_time = now()
WHERE
 memberid = {$params["memberid"]}
AND
 seq = {$params["seq"]}
AND
 rank = '{$rank}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;
	}

	/**
	* 欲しいカード登録
	*
	*/
	function wishCardInsert($member_id ,$status ,$seq, $rank){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$seq = mysql_real_escape_string($seq);
		$rank = mysql_real_escape_string($rank);

$sql = <<<EOD
INSERT INTO
 t_wish
(
  memberid
 ,seq
 ,rank
 ,status
 ,reg_time
 ,upd_time
)
VALUES
(
  {$member_id}
 ,{$seq}
 ,'{$rank}'
 ,'{$status}'
 ,now()
 ,now()
)
 ON DUPLICATE KEY 
UPDATE 
 status = '0' 
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;

	}

	/**
	* デッキ変更時の最大攻撃力/防御力計算(リアリティ処理)
	*
	*/
	function getMaxPower($member_id){
		$member_id = mysql_real_escape_string($member_id);
		$fightManager = $this->backend->getManager("Fight");
		$itemManager  = $this->backend->getManager("Item");

		//デッキのカードをOffense降順
		$offMaxCard = $this->getCardlist($member_id,$status='0',$sort="off",$limit="" ,$offset="");
		//デッキのカードをDefense降順
		$defMaxCard = $this->getCardlist($member_id,$status='0',$sort="def",$limit="" ,$offset="");
		//calcFightPower はカード配列の添え字が1～5のためスライド
		for($i=0;$i < 5;$i++){
			$n = 4 - $i;
			$offMaxCard [$n + 1] = $offMaxCard [$n];
			$defMaxCard [$n + 1] = $defMaxCard [$n];
		}

/*
$filename = dirname(dirname(dirname(__FILE__)))."/logs/calc_" .date("Ymd") .".log";
$log  = date("Y-m-d H:i:s");
$log .= "OffCard:\n" .print_r($offMaxCard,true)."\n";
$log .= "DefCard:\n" .print_r($defMaxCard,true)."\n";
*/
		//保有武器アイテムをOffense降順
		$offMyItem1 = $itemManager->getMyItems($member_id ,1 ,$unit="",$diff="",$limit="" ,$offset="");
		//保有防具アイテムをOffense降順
		$offMyItem2 = $itemManager->getMyItems($member_id ,2 ,$unit="",$diff="1",$limit="" ,$offset="");
		//保有武器アイテムをDefense降順
		$defMyItem1 = $itemManager->getMyItems($member_id ,1 ,$unit="",$diff="1",$limit="" ,$offset="");
		//保有防具アイテムをDefense降順
		$defMyItem2 = $itemManager->getMyItems($member_id ,2 ,$unit="",$diff="",$limit="" ,$offset="");
/*
$log .= "offITEM1:\n" .print_r($offMyItem1,true)."\n";
$log .= "offITEM2:\n" .print_r($offMyItem2,true)."\n";
$log .= "defITEM1:\n" .print_r($defMyItem1,true)."\n";
$log .= "defITEM2:\n" .print_r($defMyItem2,true)."\n";
*/

		//武器攻撃力
		$OffPower1 = $fightManager->calcFightPower($offMaxCard,$offMyItem1,"o");
		//防具攻撃力
		$OffPower2 = $fightManager->calcFightPower($offMaxCard,$offMyItem2,"o");
		//武器防御力
		$DefPower1 = $fightManager->calcFightPower($defMaxCard,$defMyItem1,"d");
		//防具防御力
		$DefPower2 = $fightManager->calcFightPower($defMaxCard,$defMyItem2,"d");

/*
$log .= "OFF1:\n" .print_r($OffPower1,true)."\n";
$log .= "OFF2:\n" .print_r($OffPower2,true)."\n";
$log .= "DEF1:\n" .print_r($DefPower1,true)."\n";
$log .= "DEF2:\n" .print_r($DefPower2,true)."\n";
*/
		for($i=1 ;$i<=5;$i++){
			$rs["buki_off"]  += $OffPower1[$i];
			$rs["buki_def"]  += $DefPower1[$i];
			$rs["bougu_off"] += $OffPower2[$i];
			$rs["bougu_def"] += $DefPower2[$i];
		}
/*
$log .= "bukiOFF:\n" .print_r($rs["buki_off"],true)."\n";
$log .= "bukiDEF:\n" .print_r($rs["buki_def"],true)."\n";
$log .= "bouguOFF:\n" .print_r($rs["bougu_off"],true)."\n";
$log .= "bouguDEF:\n" .print_r($rs["bougu_def"],true)."\n";
file_put_contents($filename, $log, FILE_APPEND);
*/

		return $rs;

	}

	/**
	* 武将カード保有件数取得
	*
	*/
	function getMybushoCardCount($member_id , $bushoid ){
		$member_id = mysql_real_escape_string($member_id);
		$bushoid = mysql_real_escape_string($bushoid);

		//status条件を追加	11/2/16

$sql = <<<EOD
SELECT
  count(cardseq) 
FROM
 t_card 
WHERE
 memberid = '{$member_id}' 
AND
 bushoid = '{$bushoid}'
AND
 status IN (0,1,2,3)
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* カード発行枚数登録
	*
	*/
	function writeCardStat($bushoid,$num){
		$num = mysql_real_escape_string($num);
		$bushoid = mysql_real_escape_string($bushoid);

		$date = sprintf("%06d", date('ymd'));
		$busho = $this->getCardAtt($bushoid);
		$bushoseq = $busho['seq'];
		$rank = $busho['rank'];
		$rank_num = $busho['rank_num'];

$sql = <<<EOD
INSERT INTO
 v_statistic
(
  date
 ,bushoid
 ,bushoseq
 ,rank
 ,rank_num
 ,circulation
)
VALUES
(
  '{$date}'
 ,'{$bushoid}'
 ,'{$bushoseq}'
 ,'{$rank}'
 ,'{$rank_num}'
 ,{$num}
) 
 ON DUPLICATE KEY 
UPDATE 
 circulation = circulation + {$num} ,upd_time = now() 
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;

	}

	/**
	* レアカード発生状況
	*
	*/
	function getRareCardStat($term){
		$term = mysql_real_escape_string($term);
		$thDate = date('ymd' ,mktime(0,0,0,date("m"),date("d") - $term,date("y")));
		$rs = array();

$sql1 = <<<EOD
SELECT
  bushoid
 ,circulation 
FROM
 v_statistic
WHERE
 rank = 'VR' 
AND
 date >= $thDate 
ORDER BY upd_time DESC 
LIMIT 1 
EOD;
//var_dump($sql1);
		$db = $this->backend->getDb();
		$rs1 = $db->getAll($sql1);

		if(Ethna::isError($rs1) || $rs1 === false){
			return "";
		}

$sql2 = <<<EOD
SELECT
  bushoid
 ,circulation 
FROM
 v_statistic
WHERE
 rank = 'HG' 
AND
 date >= $thDate 
ORDER BY upd_time DESC 
LIMIT 1 
EOD;
//var_dump($sql2);
		$db = $this->backend->getDb();
		$rs2 = $db->getAll($sql2);

		if(Ethna::isError($rs2) ){
			return "";
		}

		if(! empty($rs1['0'])){
			$rs['0'] = $rs1['0'];
		}
		if(! empty($rs2['0'])){
			$rs['1'] = $rs2['0'];
		}

		$userManager = $this->backend->getManager("User");
		$lgManager = $this->backend->getManager("Lg");

		if((!empty($rs1['0'])) || (!empty($rs2['0']))){
			foreach($rs as $k => $v){
				//カード情報
				$ret = $this->getCardAtt($rs[$k]["bushoid"]);
				$rs[$k]['sec_name'] = $ret['sec_name'];
				$rs[$k]['eff_expla'] = substr($ret['eff_expla'],0, strpos($ret['eff_expla'],"(" ) );
				//ユーザ取得
				$rgu  = $lgManager->getRareGetUser($ret['seq'],$ret['rank'],$term);
				$ret2 =	$userManager->getSimpleProfile($rgu['memberid']);
				$rs[$k]['handle'] = $ret2['handle'];
				if( is_numeric(substr($rgu['stagecycle'],0,1)) ){
					$rs[$k]['id'] = substr($rgu['stagecycle'],0,1);
					$rs[$k]['stage'] = $userManager->getStageName($rs[$k]['id']);
				}else{
					$rs[$k]['id'] = 9;
				}
				//}
			}
		}

		return $rs;

	}

	/**
	 * カード一括売却
	 */
	function delCardOnce($member_id, $del ){
		$member_id = mysql_real_escape_string($member_id);

		//11/2/7
		$cardFileMax = $this->config->get("cardFileMax");
		//削除対象なし
		if(!is_array($del) || count($del) == 0){
			return true;
		}

		$del_in = implode(",", $del);
//var_dump($del_in);
$sql = <<<EOD
UPDATE
 t_card
SET
  status = 6
 ,del_time = now()
WHERE
 memberid = {$member_id}
AND
 cardseq IN ({$del_in})
EOD;

		$db = $this->backend->getDb();
		$ret = $db->query($sql);

		if(Ethna::isError($ret) || $ret === false){
			return false;
		}

		return true;
	}

}
?>
