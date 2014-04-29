<?php
/**
 *  M_LgmoneyManager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  M_LgmoneyManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_QaManager extends M_Manager
{
    /**
    * カテゴリ名称取得
    *
    */
    function getQaCategory($cid){
        $cId = mysql_real_escape_string($cid);

		if($cId == 0){
$sql = <<<EOD
SELECT
  cateid
 ,name
FROM
 m_qa_cate
ORDER BY cateid
EOD;
		}else{
$sql = <<<EOD
SELECT
  cateid
 ,name
FROM
 m_qa_cate
WHERE
 cateid = '{$cId}' 
EOD;
		}

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }
 
    /**
    * カテゴリ取得
    *
    */
    function getQuestionsByCategory($cid){
        $cId = mysql_real_escape_string($cid);

		if($cId == 0){
$sql = <<<EOD
SELECT
  qaid
 ,question
FROM
 m_qa
ORDER BY qaid
EOD;
		}else{
$sql = <<<EOD
SELECT
  qaid
 ,question
FROM
 m_qa
WHERE
 cateid = '{$cId}' 
ORDER BY qaid
EOD;
		}

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }

    /**
    * Q&A取得
    *
    */
    function getQuestionAnswer($qaid){
        $qaId = mysql_real_escape_string($qaid);

$sql = <<<EOD
SELECT
  qaid
 ,cateid
 ,question
 ,answer
 ,rel1
 ,rel2
 ,rel3
 ,rel4
 ,rel5
FROM
 m_qa
WHERE
 qaid = {$qaId}
EOD;
        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }

    /**
    * 最大件数取得
    *
    */
    function getMaxIds(){

$sql = <<<EOD
SELECT
  max(qaid)
FROM
 m_qa
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

$sql2 = <<<EOD
SELECT
  max(cateid)
FROM
 m_qa_cate
EOD;

        $db = $this->backend->getDb();
        $rs2 = $db->getOne($sql2);

        if(Ethna::isError($rs2) || $rs2 === false){
            return False;
        }

		$result['qaid'] = $rs;
		$result['cateid'] = $rs2;

        return $result;

    }

}
?>
