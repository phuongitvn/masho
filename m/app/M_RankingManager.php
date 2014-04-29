<?php
class M_RankingManager extends M_Manager {
	function getLevelRanking($limit=100) {
		$db = $this->backend->getDB('r');

$sql = <<<EOD
SELECT
memberid
,handle
,level
FROM
t_user
WHERE
del_flg=0
ORDER BY
level desc
LIMIT
{$limit}
EOD;

		$rs = $db->getAll($sql);
		if(Ethna::isError($rs) || empty($rs)){
			return False;
		}

		return $rs;
	}
}
?>