<?php
/**
 *  M_QuestManager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  M_QuestManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_QuestManager extends M_Manager
{

//TUT

    /**
    * 初期クエスト進捗登録 lg_quest＋t_quest
    *
    */
    function setFirstQuest($member_id){
        $member_id = mysql_real_escape_string($member_id);
//lg_quest
$sql1 = <<<EOD
INSERT INTO
 lg_quest
(
  memberid
 ,questid
 ,current
 ,archieve
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'111'
 ,0
 ,'90'
 ,now()
)
EOD;

        $db = $this->backend->getDb();
        $rs1 = $db->query($sql1);
        if (Ethna::isError($rs1) || $rs1 == False) {
            return False;
        }

//t_quest
$sql2 = <<<EOD
INSERT INTO
 t_quest
(
  memberid
 ,questid
 ,done
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'111'
 ,0
 ,now()
)
EOD;
        $db = $this->backend->getDb();
        $rs2 = $db->query($sql2);
        if (Ethna::isError($rs2) || $rs2 == False) {
            return False;
        }

        return True;
    }



    /**
    * 魔将戦での最大回復薬数取得
    *
    */
    function getMaxRcvNum(){

$sql = <<<EOD
SELECT
 max(rcv_num) 
FROM
 m_masho
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);
        if(Ethna::isError($rs) || $rs === false){
            return "";
        }
        return $rs;

    }

    /**
    * ステージ初期文言取得
    *
    */
    function getStage1stCmnt($id){
        $id = mysql_real_escape_string($id);
$sql = <<<EOD
SELECT
 first_cmnt
FROM
 m_stage
WHERE
 stageid = {$id}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return "";
        }

        $userManager  = $this->backend->getManager("User");
        $member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$rs = str_replace("●●",$profile['handle'],$rs);

        return $rs;

    }


    /**
     * 魔将ファイト情報取得
     */
    function getMashoPower($stage,$cl_cycle){
        $escapedStage = mysql_real_escape_string($stage);
        $escapedClcycle =mysql_real_escape_string($cl_cycle);

$sql = <<<EOD
SELECT
  mashoid
 ,seq
 ,rank
 ,name
 ,rcv_num
 ,expla
 ,end_cmnt
 ,offense
 ,defense
 ,follower
FROM
 m_masho
WHERE
  seq  = {$escapedStage}
AND
  rank  = '{$escapedClcycle}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return True;
        }

        return $rs;
    }

    /**
     * 最新クリアクエスト取得
     */
    function getNowQuestId($member_id){
        $member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  max(questid)
FROM
 t_quest
WHERE
 memberid = '{$member_id}'
AND
 done = 1
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);
        if(Ethna::isError($rs) || $rs === false){
            return True;
        }

        return $rs;
    }


    /**
     * クエスト達成率取得
     */
    function getQuestArchieve($member_id){
        $member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  count(questid)
FROM
 m_quest
WHERE
  stage != 0
EOD;

        $db = $this->backend->getDb();
        $rs1 = $db->getOne($sql);
        if(Ethna::isError($rs1) || $rs1 === false){
            return True;
        }

$sql = <<<EOD
SELECT
  count(memberid)
FROM
 t_quest
WHERE
 memberid = '{$member_id}'
AND
 done = 1
EOD;

        $db = $this->backend->getDb();
        $rs2 = $db->getOne($sql);
        if(Ethna::isError($rs2) || $rs2 === false){
            return True;
        }

		$rs = floor($rs2/$rs1*100);

        return $rs;
    }

    /**
     * 魔将情報取得
     */
    function getMasho($stage,$cl_cycle){
        $escapedQuestId = mysql_real_escape_string($stage). mysql_real_escape_string($cl_cycle). "9";

$sql = <<<EOD
SELECT
  m_quest.mashoid
 ,m_quest.get_exp
 ,m_quest.get_money
 ,m_quest.expla_l
 ,m_masho.name
 ,m_masho.rcv_num
 ,m_masho.expla
 ,m_masho.end_cmnt
FROM
 m_quest
INNER JOIN
 m_masho
ON
 m_quest.mashoid = m_masho.mashoid
AND
 m_masho.seq = {$stage}
AND
 m_masho.rank = {$cl_cycle}
WHERE
  questid  = '{$escapedQuestId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        $userManager  = $this->backend->getManager("User");
        $member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$rs['end_cmnt'] = str_replace("●●",$profile['handle'],$rs['end_cmnt']);
		$rs['expla_l'] = str_replace("●●",$profile['handle'],$rs['expla_l']);


        return $rs;
    }

    /**
     * クエストパラメータ取得
     */
    function getQuest($quest_id){
        $escapedQuestId = mysql_real_escape_string($quest_id);

$sql = <<<EOD
SELECT
  name
 ,stage
 ,title
 ,expla_l
 ,expla_s
 ,end_thumb
 ,end_bg
 ,end_cmnt
 ,req_genki
 ,exp
 ,max_money
 ,min_money
 ,speed
 ,margin
 ,item1
 ,num1
 ,item2
 ,num2
 ,item3
 ,num3
 ,drop_item
 ,drop_item_odd
 ,drop_tr
 ,drop_tr_odd
FROM
 m_quest
WHERE
  questid  = '{$escapedQuestId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return True;
        }

		//money生成
		if($rs['min_money'] == $rs['max_money']){
			$rs['money'] = $rs['min_money'];
		}else{
			$rs['money'] = mt_rand( $rs['min_money'],$rs['max_money'] );
		}
		//達成率生成
		if($rs['margin'] == 0){
			$rs['aRate'] = $rs['speed'];
		}else{
			$rs['aRate'] = mt_rand( $rs['speed'] - $rs['margin'] , $rs['speed'] + $rs['margin']);
		}

        $userManager  = $this->backend->getManager("User");
        $member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$rs['end_cmnt'] = str_replace("●●",$profile['handle'],$rs['end_cmnt']);
		$rs['expla_l'] = str_replace("●●",$profile['handle'],$rs['expla_l']);

        return $rs;
    }

    /**
    * クエストENDコメント取得
    *
    */
    function getQuestDiary($member_id ,$stage,$now){
        $member_id = mysql_real_escape_string($member_id);
        $stage = mysql_real_escape_string($stage);
        $now = mysql_real_escape_string($now);

$sql = <<<EOD
SELECT
  t_quest.questid
 ,m_quest.name
 ,m_quest.end_bg
 ,m_quest.end_cmnt
FROM
 t_quest 
INNER JOIN 
 m_quest 
ON m_quest.questid = t_quest.questid 
WHERE 
 m_quest.stage = {$stage} 
AND
 m_quest.questid <= {$now} 
AND
 t_quest.done = 1 
AND 
 t_quest.memberid = {$member_id} 
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

        $userManager  = $this->backend->getManager("User");
		$profile = $userManager->getProfile($member_id);
        foreach($rs as $k => $v){
			$rs[$k]['end_cmnt'] = str_replace("●●",$profile['handle'],$rs[$k]['end_cmnt']);
		}

        return $rs;

    }

    /**
    * クエストリスト取得
    *
    */
    function getQuestlist($member_id ,$stage,$only=""){
        $member_id = mysql_real_escape_string($member_id);
        $stage = mysql_real_escape_string($stage);
        $only = mysql_real_escape_string($only);

		$sqlOnly = "";
		if($only != ""){
			$sqlOnly = " AND questid = ".$only;
		}

$sql = <<<EOD
SELECT
  questid
 ,name
 ,stage
 ,title
 ,expla_l
 ,expla_s
 ,end_cmnt
 ,req_genki
 ,exp
 ,max_money
 ,min_money
 ,speed
 ,margin
 ,item1
 ,num1
 ,item2
 ,num2
 ,item3
 ,num3
FROM
 m_quest
WHERE
 stage = {$stage}
{$sqlOnly}
ORDER BY
 questid
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

        foreach($rs as $k => $v){

			//money表示
			if($rs[$k]['min_money'] == $rs[$k]['max_money']){
				$rs[$k]['money'] = $rs[$k]['min_money'];
			}else{
				$rs[$k]['money'] = $rs[$k]['min_money'] ." ~ ". $rs[$k]['max_money'];
			}
			//達成率取得
			$done = $this->expQuest($member_id ,$rs[$k]["questid"]);
			if($done['done'] == "1"){
					$rs[$k]["archieve"] = 100;
			}else{
				$ret = $this->existCurrentQuest($member_id ,$rs[$k]["questid"]);
				if($ret['num'] == 0){
					$rs[$k]["archieve"] = 0;
				}else{
					$rs[$k]["archieve"] = $ret['archieve'];
				}
			}
			$rs[$k]["aImg"] = $this->getOctDispImg($rs[$k]["archieve"]);
			$itemManager = $this->backend->getManager("Item");
	        //アイテム保持取得
			if($rs[$k]["item1"] != 0){
				$hasNum1 = $itemManager->existsMyItem($member_id ,$rs[$k]["item1"] ,$num="");
				if($rs[$k]["num1"] > $hasNum1 ){
					$rs[$k]["mustBuy1"] = $rs[$k]["num1"] - $hasNum1;
				}else{
					$rs[$k]["mustBuy1"] = 0;
				}
			}
			if($rs[$k]["item2"] != 0){
				$hasNum2 = $itemManager->existsMyItem($member_id ,$rs[$k]["item2"] ,$num="");
				if($rs[$k]["num2"] > $hasNum2 ){
					$rs[$k]["mustBuy2"] = $rs[$k]["num2"] - $hasNum2;
				}else{
					$rs[$k]["mustBuy2"] = 0;
				}
			}
			if($rs[$k]["item3"] != 0){
				$hasNum3 = $itemManager->existsMyItem($member_id ,$rs[$k]["item3"] ,$num="");
				if($rs[$k]["num3"] > $hasNum3 ){
					$rs[$k]["mustBuy3"] = $rs[$k]["num3"] - $hasNum3;
				}else{
					$rs[$k]["mustBuy3"] = 0;
				}
			}
        }

        return $rs;

    }

    /**
    * クエスト進捗登録 lg_quest
    *
    */
    function setCurrentQuest($member_id ,$quest_id , $archieve, $mode ){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
        $archieve = mysql_real_escape_string($archieve);
        $mode = mysql_real_escape_string($mode);
		//既に一度クリアしているクエストか確認
		$done = $this->expQuest($member_id ,$escapedQuestId);
		if($done['done'] == "1"){
			return True;
		}

        if($mode == 0){
$sql = <<<EOD
INSERT INTO
 lg_quest
(
  memberid
 ,questid
 ,current
 ,archieve
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$escapedQuestId}'
 ,0
 ,'{$archieve}'
 ,now()
)
EOD;
        }elseif($mode == 1 && $archieve == 100){
$sql = <<<EOD
UPDATE
 lg_quest
SET
  archieve = '{$archieve}'
 ,current = 1
 ,upd_time = now()
WHERE
  memberid = '{$member_id}'
AND
  questid = '{$escapedQuestId}'
AND
  current = 0
EOD;
			//達成率が100%になれば t_questも更新
			$ret = $this->doneQuest($member_id ,$quest_id, 1 );
			if ($ret == False) { return False; }
		}else{
$sql = <<<EOD
UPDATE
 lg_quest
SET
  archieve = '{$archieve}'
 ,upd_time = now()
WHERE
  memberid = '{$member_id}'
AND
  questid = '{$escapedQuestId}'
AND
  current = 0
EOD;
		}

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
        //エラーの場合の処理
            return False;
        }

        return True;
    }

    /**
    * クエスト実施中チェック lg_quest
    *
    */
    function existCurrentQuest($member_id ,$quest_id){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
$sql = <<<EOD
SELECT
 archieve
FROM
 lg_quest
WHERE
 memberid = '{$member_id}'
AND
 questid = '{$escapedQuestId}'
AND
 current = 0
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

		//レコード数
        $rs['num'] = count($rs);

		return $rs;

    }

    /**
    * クエスト体験チェック lg_quest
    *
    */
    function existLgQuest($member_id ,$quest_id){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
$sql = <<<EOD
SELECT
 archieve
FROM
 lg_quest
WHERE
 memberid = '{$member_id}'
AND
 questid = '{$escapedQuestId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

		//レコード数
        $rs['num'] = count($rs);

		return $rs;

    }

    /**
    * クエスト更新t_quest(INSかUPD)
    *
    */
    function doneQuest($member_id ,$quest_id,$mode){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
        $mode = mysql_real_escape_string($mode);
        if($mode == 0){
$sql = <<<EOD
INSERT INTO
 t_quest
(
  memberid
 ,questid
 ,done
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$escapedQuestId}'
 ,0
 ,now()
)
EOD;
        }elseif($mode == 1){
$sql = <<<EOD
UPDATE
 t_quest
SET
  done = '1'
WHERE
  memberid = '{$member_id}'
AND
  questid  = '{$escapedQuestId}'
EOD;

		}

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
        //エラーの場合の処理
            return False;
        }

        return True;
    }

    /**
    * クエストチェック
    *
    */
    function expQuest($member_id ,$quest_id ){
		//該当クエスト　1回でもやったことがあればレコード有さらにdone=1 ならクリア
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
$sql = <<<EOD
SELECT
 done
FROM
 t_quest
WHERE
 memberid = '{$member_id}'
AND
 questid = '{$escapedQuestId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

		//レコード数
        $rs['num'] = count($rs);

		return $rs;

    }

    /**
    * 周回挿入t_cycle(INSのみ)
    *
    */
    function doneCycle($member_id ,$stage, $cycle, $questseq){
        $member_id = mysql_real_escape_string($member_id);

		$cycle = $cycle + 1;
        $is_exists = $this->existsCycle($member_id ,$stage, $cycle, $questseq);

        if($is_exists == True){
            return True;
        }

        $escapedStage = mysql_real_escape_string($stage);
        $escapedCycle = mysql_real_escape_string($cycle);
        $escapedQuest = mysql_real_escape_string($questseq);

$sql = <<<EOD
INSERT INTO
 t_cycle
(
  memberid
 ,stageid
 ,cycleid
 ,questseq
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$escapedStage}'
 ,'{$escapedCycle}'
 ,'{$escapedQuest}'
 ,now()
)
EOD;

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
        //エラーの場合の処理
            return False;
        }

        return True;
    }

    /**
    * 周回チェック(行アリ)
    *
    */
    function existsCycle($member_id ,$stage, $cycle, $questseq){
        $member_id = mysql_real_escape_string($member_id);
        $stage = mysql_real_escape_string($stage);
        $cycle = mysql_real_escape_string($cycle);
        $questseq = mysql_real_escape_string($questseq);
		//該当クエスト　のレコード有無CHK

$sql = <<<EOD
SELECT
 memberid
FROM
 t_cycle
WHERE
 memberid = '{$member_id}'
AND
 stageid = '{$stage}'
AND
 cycleid = '{$cycle}'
AND
 questseq = '{$questseq}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

        if(count($rs) == 0){
            return False;
        }

        return True;

    }

    /**
    * 周回チェック(カウント) 
    *
    */
    function expCycle($member_id ,$stage, $cycle){
        $member_id = mysql_real_escape_string($member_id);
        $stage = mysql_real_escape_string($stage);
        $cycle = mysql_real_escape_string($cycle);
		//周回クリア数に1を加算して検索
		$cycle = $cycle + 1;

$sql = <<<EOD
SELECT
 count(questseq)
FROM
 t_cycle
WHERE
 memberid = '{$member_id}'
AND
 stageid = '{$stage}'
AND
 cycleid = '{$cycle}'
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

		return $rs;

    }

    /**
    * 周回毎のクエストタイトル取得
    *
    */
    function getQuestTitle($stage,$clmasho){
        $stage = mysql_real_escape_string($stage);
        $clmasho = mysql_real_escape_string($clmasho);
		$clmasho = $clmasho +1 ;

		$userManager = $this->backend->getManager("User");
		$maxId = $userManager->getStageMaxNum();
		if($stage > $maxId){
	        $cyTitle = $this->config->get('cyTitle');
			return $cyTitle['4'];
		}

$sql = <<<EOD
SELECT
  title
FROM
 m_cycle
WHERE
 stageid = {$stage}
AND
 cycleid = {$clmasho}
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;
    }

    /**
    * 周回毎のクエスト数チェック
    *
    */
    function getQuestNumByCycle($stage,$cycle){
        $stage = mysql_real_escape_string($stage);
        $cycle = mysql_real_escape_string($cycle);
		$cycle = $cycle +1 ;
$sql = <<<EOD
SELECT
  quest_num
FROM
 m_cycle
WHERE
 stageid = {$stage}
AND
 cycleid = {$cycle}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;
    }


    /**
    * 率画像計算
    *
    */
    function getDispImg($num){

		if($num < 5){
			$dispNo = 0;
		}elseif($num < 10){
			$dispNo = 5;
		}elseif($num < 15){
			$dispNo = 10;
		}elseif($num < 20){
			$dispNo = 15;
		}elseif($num < 25){
			$dispNo = 20;
		}elseif($num < 30){
			$dispNo = 25;
		}elseif($num < 35){
			$dispNo = 30;
		}elseif($num < 40){
			$dispNo = 35;
		}elseif($num < 45){
			$dispNo = 40;
		}elseif($num < 50){
			$dispNo = 45;
		}elseif($num < 55){
			$dispNo = 50;
		}elseif($num < 60){
			$dispNo = 55;
		}elseif($num < 65){
			$dispNo = 60;
		}elseif($num < 70){
			$dispNo = 65;
		}elseif($num < 75){
			$dispNo = 70;
		}elseif($num < 80){
			$dispNo = 75;
		}elseif($num < 85){
			$dispNo = 80;
		}elseif($num < 90){
			$dispNo = 85;
		}elseif($num < 95){
			$dispNo = 90;
		}elseif($num <= 99){
			$dispNo = 95;
		}elseif($num == 100){
			$dispNo = 100;
		}

        return $dispNo;
    }

    /**
    * 達成率画像計算
    *
    */
    function getOctDispImg($num){

		$shou = floor($num/14);

		if($num == 0){
			$dispNo = 0;
		}elseif($num == 100){
			$dispNo = 8;
		}elseif($num == 98 || $num == 99){
			$dispNo = 7;
		}else{
			$dispNo = $shou + 1;
		}

        return $dispNo;
    }

}
?>
