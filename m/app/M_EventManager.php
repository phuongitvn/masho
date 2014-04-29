<?php
/**
 *  M_Manager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_EventManager extends M_Manager
{

    //イベント終了までの時間を設定
    function getTimeLeft(){

		$evEndTime = $this->config->get("evEndTime");
        $rcv = strtotime($evEndTime);
        $now = mktime();

        $diff = $rcv - $now;

        if($diff > 0){
			$day  = floor($diff / 86400);

            $thour = $diff - ($day * 86400);
			$hour  = floor($thour / 3600);

            $tmin = $thour - ($hour * 3600);
			$min  = floor($tmin / 60);
        }

        $ret['day'] = $day;
        $ret['hour'] = $hour;
        $ret['min'] = $min;

        return $ret;

    }

    /**
    * dope からイベントコース取得
    *
    */
    function getEventQId($member_id,$dope){

		$gTL = $this->getTimeLeft();
		if($gTL['min'] == NULL){
	        return False;
		}else{
			$evid = $this->config->get("evid");
		}
$sql = <<<EOD
SELECT
 courseid
FROM
 m_event
WHERE
 eventid = {$evid}
AND
 dope LIKE '%{$dope}%'
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		$cid = $rs."1";

$sql2 = <<<EOD
SELECT
 max(questid)
FROM
 t_ev_quest
WHERE
 memberid = {$member_id} 
AND
 eventid = {$evid} 
AND
 done = 1
AND
 questid LIKE '{$cid}%' 
EOD;
//var_dump($sql2);
        $db = $this->backend->getDb();
        $rs2 = $db->getOne($sql2);

        if(Ethna::isError($rs2) || $rs2 === false){
            return False;
        }

		$rslt['questid'] = $rs2;
		$rslt['evid'] = $evid;

        return $rslt;

    }

    /**
    * イベント数取得
    *
    */
    function getActiveEventNum(){

		$tday = date('ymd',mktime(0,0,0,date("m"),date("d"),date("y")));

$sql = <<<EOD
SELECT
 count(eventid)
FROM
 m_event
WHERE
 startdate <= {$tday}
AND
 enddate >= {$tday}
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
    * イベント状態取得
    *
    */
    function getEventCourse($member_id){
		$itemManager = $this->backend->getManager("Item");
		$tday = date('ymd',mktime(0,0,0,date("m"),date("d"),date("y")));

$sql = <<<EOD
SELECT
  eventid
 ,courseid
 ,prizeid
 ,num
 ,dope
 ,startdate
 ,enddate
FROM
 m_event
WHERE
 startdate <= {$tday}
AND
 enddate >= {$tday}
ORDER BY courseid 
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		foreach($rs as $k => $v){
			$rs[$k]['done'] = $this->getStatusEventCourse($member_id,$rs[$k]['eventid'],$rs[$k]['courseid']);
			if($rs[$k]['done'] == 3){
			}elseif($rs[$k]['done'] == -1 || $rs[$k]['done'] == 0 ){
				$rs[$k]['cur'] = 1;
			}elseif($rs[$k]['done'] == 1){
				$rs[$k]['cur'] = 2;
			}elseif($rs[$k]['done'] == 2){
				$rs[$k]['cur'] = 3;
			}
			$ret = $itemManager->getItemData($rs[$k]['prizeid']);
			if($rs[$k]['courseid'] > 2){
				$rs[$k]['shrt'] = substr($ret['expla'],0,20)."…";
			}
			$rs[$k]['name'] =$ret['name'];
			switch($rs[$k]['courseid']){
		        case "1":
		            $rs[$k]['rank'] = "E";
		            break;
		        case "2":
		            $rs[$k]['rank'] = "D";
		            break;
		        case "3":
		            $rs[$k]['rank'] = "C";
		            break;
		        case "4":
		            $rs[$k]['rank'] = "B";
		            break;
		        case "5":
		            $rs[$k]['rank'] = "A";
		            break;
			}
		}

        return $rs;

    }

    /**
    * イベント実施状態取得
    *
    */
    function getStatusEventCourse($member_id,$eid,$cid){


$sql = <<<EOD
SELECT
 done
FROM
 t_event
WHERE
 memberid = {$member_id} 
AND
 eventid = {$eid} 
AND
 courseid = {$cid} 
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) ){
            return False;
        }
		if( $rs === false ){
            return -1;
		}

        return $rs;

    }

    /**
    * イベントクリア状態取得
    *
    */
    function getClearedEventCourseNum($member_id,$eid){


$sql = <<<EOD
SELECT
 count(done)
FROM
 t_event
WHERE
 memberid = {$member_id} 
AND
 eventid = {$eid} 
AND
 done = 3
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);
        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }

    /**
    * イベント状態更新t_event(INSかUPD)
    *
    */
    function setEvent($member_id ,$evid,$cid ){
        $member_id = mysql_real_escape_string($member_id);
        $cid = mysql_real_escape_string($cid);

//#2	//t_ev_quest のdone=1 のレコード数を取得
		$doneNum = $this->getDoneEvQuestNum($member_id, $evid, $cid );
		if($doneNum > 3){
			$doneNum = 3;
		}
$sql = <<<EOD
INSERT INTO
 t_event
(
  memberid
 ,eventid
 ,courseid
 ,done
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$evid}'
 ,'{$cid}'
 ,0
 ,now()
)
 ON DUPLICATE KEY UPDATE 
  done = {$doneNum} 
 ,upd_time = now() 
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
    * クエスト完了レコード数
    *
    */
    function getDoneEvQuestNum($member_id, $evid, $cid ){
        $member_id = mysql_real_escape_string($member_id);
        $evid = mysql_real_escape_string($evid);
        $questId = mysql_real_escape_string($cid)."1%";

$sql = <<<EOD
SELECT
  count(done)
FROM
 t_ev_quest
WHERE
 memberid = '{$member_id}'
AND
 eventid = '{$evid}'
AND
 questid LIKE '{$questId}'
AND
 done = 1
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);
        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		return $rs;

    }

    /**
    * クエストチェック
    *
    */
    function expEvQuest($member_id, $ev_id, $quest_id ){
		//該当クエスト　1回でもやったことがあればレコード有さらにdone=1 ならクリア
        $member_id = mysql_real_escape_string($member_id);
        $ev_id = mysql_real_escape_string($ev_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
$sql = <<<EOD
SELECT
  done
 ,archieve
 ,dope
 ,coeff
FROM
 t_ev_quest
WHERE
 memberid = '{$member_id}'
AND
 eventid = '{$ev_id}'
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
    * クエスト更新t_ev_quest(INSかUPD)
    *
    */
    function setEvQuest($member_id ,$evid,$quest_id, $archieve){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
        $archieve = mysql_real_escape_string($archieve);

//#2
		//3桁のCHK
		if(strlen($escapedQuestId) != 3){
            return False;
		}

$sql = <<<EOD
INSERT INTO
 t_ev_quest
(
  memberid
 ,eventid
 ,questid
 ,done
 ,archieve
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$evid}'
 ,'{$escapedQuestId}'
 ,0
 ,0
 ,now()
)
 ON DUPLICATE KEY UPDATE 
 archieve = {$archieve} 
EOD;

if($archieve == 100){
$sql .= <<<EOD
 ,done = 1 
EOD;

}
$sql .= <<<EOD
 ,upd_time = now() 
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
    * クエストdope登録t_ev_quest
    *
    */
    function setDopeToEvQuest($member_id ,$evid,$quest_id,$dope){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);

$sql = <<<EOD
UPDATE
 t_ev_quest
SET
 dope = {$dope} 
 ,upd_time = now() 
WHERE
 memberid = {$member_id} 
AND
 eventid = {$evid} 
AND
 questid  = '{$escapedQuestId}'
AND
 done = 1
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
    * クエストcoeff登録t_ev_quest
    *
    */
    function setCoeffToEvQuest($member_id ,$evid,$quest_id,$coeff){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);

$sql = <<<EOD
UPDATE
 t_ev_quest
SET
 coeff = {$coeff} 
 ,upd_time = now() 
WHERE
 memberid = {$member_id} 
AND
 eventid = {$evid} 
AND
 questid  = '{$escapedQuestId}'
AND
 done = 1
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
     * クエストパラメータ取得
     */
    function getEvQuest($quest_id){
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
 ,enemy1
 ,enemy2
 ,enemy3
 ,enemy4
 ,enemy5
 ,enemy_formno
 ,enemy_thumb
 ,enemy_expla
 ,enemy_cmnt
 ,enemy_min
 ,enemy_max
FROM
 m_ev_quest
WHERE
  questid  = '{$escapedQuestId}'
EOD;
//var_dump($sql);
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
     * イベントファイト記録
     */
    function setEvFightLog($member_id ,$evid,$quest_id,$fight){
        $member_id = mysql_real_escape_string($member_id);
        $escapedQuestId = mysql_real_escape_string($quest_id);
        $evid = mysql_real_escape_string($evid);

//lg_ev_fightへ書き込み
$sql = <<<EOD
INSERT INTO
 lg_ev_fight
(
  memberid
 ,eventid
 ,questid
 ,winner
 ,win
 ,lose
 ,coeff
 ,formno
 ,dope
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
 ,level1
 ,level2
 ,level3
 ,level4
 ,level5
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$evid}'
 ,'{$escapedQuestId}'
 ,'{$fight["winner"]}'
 ,'{$fight["winN"]}'
 ,'{$fight["loseN"]}'
 ,'{$fight["coeff"]}'
 ,'{$fight["formno"]}'
 ,'{$fight["dope"]}'
 ,'{$fight["1"]}'
 ,'{$fight["2"]}'
 ,'{$fight["3"]}'
 ,'{$fight["4"]}'
 ,'{$fight["5"]}'
 ,'{$fight["mbid1"]}'
 ,'{$fight["mbid2"]}'
 ,'{$fight["mbid3"]}'
 ,'{$fight["mbid4"]}'
 ,'{$fight["mbid5"]}'
 ,'{$fight["mlv1"]}'
 ,'{$fight["mlv2"]}'
 ,'{$fight["mlv3"]}'
 ,'{$fight["mlv4"]}'
 ,'{$fight["mlv5"]}'
 ,now()
)
EOD;

        $db = $this->backend->getDb();
        $rs = $db->query($sql);
        if (Ethna::isError($rs) || $rs== False) {
            return False;
        }

        return True;
    }




}
?>
