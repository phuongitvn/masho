<?php
class M_InfoManager extends M_Manager {
	var $content_type_ids = array(
		'status' => '1',
		'diary' => '2',
		'photo' => '3',
		'friend' => '4', // ket ban roi
		//'' => '5',     // album?
		//'' => '6',     // wall?
		//'' => '7',     // game?
		//'' => '8',     // movie?
		'comment' => '9',
		'friend_requested' => '10',// muon ket ban
		'update_avatar' => '11',// update avatar
	);
	var $special_values = array(
		'NOW()'=> 1,
		'CURRENT_DATE'=> 1,
		'CURRENT_TIMESTAMP' => 1
	);

	function addInfos($owner_user_id, $user_wall_id, $content_type_id, $ext_datas=array()) {
		$base = array(
			'owner_user_id' => $owner_user_id,
			'user_wall_id' => $user_wall_id,
			'created' => 'CURRENT_TIMESTAMP'
		);
		$values = array_merge(
			$base,
			$ext_datas
		);

		$target_user_ids = $this->getFriendIds();
		if (! empty($ext_datas['target_user_id'])) {
			$target_user_ids = $this->_array_merge(
				$target_user_ids,
				$this->getFriendIds($ext_datas['target_user_id'])
			);
			$target_user_ids[$ext_datas['target_user_id']] = $ext_datas['target_user_id']; 
			unset($target_user_ids[$owner_user_id]);
		}

		// up to self and get source id
		//$this->db->begin();
		$db = $this->backend->getDb();
		$sql = $this->makeInsertSql(
			't_wall',
			array_merge(array(
				'user_id' => $owner_user_id,
				'owner_user_id' => $owner_user_id,
				'user_wall_id' => $user_wall_id,
				'content_type_id' => $content_type_id,
				'created' => 'CURRENT_TIMESTAMP',
				'modified' => 'CURRENT_TIMESTAMP'
			), $ext_datas)
		);
		$rs = $db->query($sql);
		if(Ethna::isError($rs) || $rs === FALSE)
			return FALSE;

		$source_id = $db->insertId();
		if ($source_id === FALSE) {
			return FALSE;
		}

		if (empty($ext_datas['content_id'])) {
			$ext_datas['content_id'] = $source_id;
			$sql = $this->makeUpdateSql(
				't_wall',
				array('content_id' => $source_id),
				'id='.$source_id
			);
			$ret = $db->query($sql);
			if (Ethna::isError($rs) || $ret === FALSE) {
				return FALSE;
			}
		}

		foreach ($target_user_ids as $target_user_id) {
			$sql = $this->makeInsertSql(
				't_wall',
				array_merge(array(
					'user_id' => $target_user_id,
					'owner_user_id' => $owner_user_id,
					'user_wall_id' => $user_wall_id,
					'content_type_id' => $content_type_id,
					'created' => 'CURRENT_TIMESTAMP',
					'modified' => 'CURRENT_TIMESTAMP'
				), $ext_datas)
			);
			$db->query($sql);
		}

		return TRUE;
	}

	function countWall($user_id) {
		$user_id = ((int)$user_id);
		//$w = 'info.user_id='.$user_id.' and (info.target_user_id='.$user_id.' or info.user_wall_id='.$user_id.' or info.owner_user_id='.$user_id.')';
		$w = 'info.user_id='.$user_id.' and (info.target_user_id='.$user_id.' or info.user_wall_id='.$user_id.')';

		$sql = 'select count(*) as c from t_wall info where '.$w;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);
		if(Ethna::isError($rs) || $rs === FALSE)
			return FALSE;

		return $rs;
	}

	function getWall($user_id, $limit=NULL) {
		$user_id = ((int)$user_id);
		//$w = 'info.user_id='.$user_id.' and (info.target_user_id='.$user_id.' or info.user_wall_id='.$user_id.' or info.owner_user_id='.$user_id.')';
		$w = 'info.user_id='.$user_id.' and (info.target_user_id='.$user_id.' or info.user_wall_id='.$user_id.')';

		$sql = $this->makeSelectSql(
			$this->from(),
			$this->field(),
			$w,
			'info.created desc',
			$limit
		);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);
		if(Ethna::isError($rs) || $rs === FALSE)
			return FALSE;

		return $rs;
	}

	function getWallByOther($user_id, $limit=NULL) {
		$user_id = ((int)$user_id);
		//$w = 'info.user_id='.$user_id.' and (info.target_user_id='.$user_id.' or info.user_wall_id='.$user_id.' or info.owner_user_id='.$user_id.')';
		$w = 'info.user_id='.$user_id.' and info.owner_user_id != '.$user_id.' and (info.target_user_id='.$user_id.' or info.user_wall_id='.$user_id.')';

		$sql = $this->makeSelectSql(
			$this->from(),
			$this->field(),
			$w,
			'info.created desc',
			$limit
		);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);
		if(Ethna::isError($rs) || $rs === FALSE)
			return FALSE;

		return $rs;
	}

	function getWallBlackList() {
		return array(
			$this->content_type_ids['photo'],
			$this->content_type_ids['friend'],
			$this->content_type_ids['friend_requested'],
			$this->content_type_ids['update_avatar'],
		);
	}

	function countFriendComment($user_id) {
		return 0;
	}

	function getFriendIds($target_user_id=NULL) {
		return array();
	}

	function updateWalls($owner_user_id, $content_type_id, $content_id, $update_values) {
	}

	function field() {
		return array(
			'info.id',
			'info.user_id',
			'info.owner_user_id',
			'info.user_wall_id',
			'info.summary',
			'info.like_count',
			'info.comment_count',
			'info.content_id',
			'info.content_type_id',
			'info.target_user_id',
			'info.target_content_id',
			'info.target_content_type_id',
			'info.thumbnail_url',
			'info.ext_info',
			'info.created',
			'info.modified',
			'^u1.`handle` as user_name',
			'^u2.`handle` as target_user_name',
			'^u1.`prof` as user_prof',
			'^u2.`prof` as target_user_prof',
		);
	}

	function from($user_infos='t_wall') {
		$u = 't_user';
		return $user_infos.' info left join '.$u.' u1 on info.owner_user_id=u1.memberid left join '.$u.' u2 on info.target_user_id=u2.memberid';
	}

	/*
	function read($id) {
		return $this->db->select1(
			$this->from(),
			$this->field(),
			'info.content_id='.((int)$id)
		);
	}

	function readWithComment($id, $offset=NULL,$limit=NULL) {
	}

	function like($owner_user_id, $content_type_id, $content_id, $table_name) {
	}

	function comment($user_id, $content_id, $content, $content_type_id, $comment_tbl_name, $parent_tbl_name, $field_owner_user_id, $field_content_id, $is_update_wall=TRUE) {
	}

	function countComment($id) {
		return 0;
	}

	function getFriendComment($user_id, $limit=NULL) {
	}

	function countHome() {
	}

	function countCommentForMe() {
	}

	function getCommentForMe($limit=NULL) {
	}

	function getHome($limit=NULL) {
	}

	function countMyWall() {
	}

	function getMyWall($limit=NULL) {
	}

	function countStatus($user_id = NULL) {
	}

	function getStatus($user_id = NULL, $limit=NULL) {
	}
	*/

	function _array_merge($a1, $a2) {
		$ret = $a1;
		foreach ($a2 as $k => $v) {
			$ret[$k] = $v;
		}
		return $ret;
	}

	function makeSelectSql($tablename, $fields, $where=NULL, $order_by=NULL, $limit=NULL, $is_distinct = FALSE) {
		$sql = 'select ';
		if ($is_distinct)
			$sql .= 'distinct ';
		$sql .= implode(',',$this->escapeField($fields)).' from '.$tablename;
		if (!empty($where))
			$sql.=' where '.$where;
		if (!empty($order_by))
			$sql.=' order by '.$order_by;
		if (!empty($limit))
			$sql.=' limit '.$limit;
		return $sql;
	}

	function makeInsertSql($tablename, $key_value_map) {
		$sql_fields = array();
		$sql_values = array();
		foreach ($key_value_map as $k => $v) {
			$sql_fields[] = $this->escapeField($k);
			if (is_null($v)) {
				$sql_values[] = 'null';
			} else if (array_key_exists(strtoupper($v), $this->special_values)) {
				$sql_values[] = $v;
			} else {
				if (strpos($v, '^') === 0) {
					$sql_values[] = substr($v, 1);
				} else {
					$sql_values[] = "'".mysql_real_escape_string($v)."'";
				}
			}
		}
		$sql = 'insert into '.$tablename
			.'('.implode(',',$sql_fields).") values(".implode(",", $sql_values).")";

		return $sql;
	}

	function makeUpdateSql($tablename, $key_value_map, $where) {
		$sql_array = array();
		foreach ($key_value_map as $k => $v) {
			if (is_null($v)) {
				$sql_array[] = $this->escapeField($k).'=null';
			} else if (array_key_exists(strtoupper($v), $this->special_values)) {
				$sql_array[] = $this->escapeField($k)."=$v";
			} else {
				if (strpos($v, '^') === 0) {
					$sql_array[] = $this->escapeField($k)."=".substr($v,1);
				} else {
					$sql_array[] = $this->escapeField($k)."='".mysql_real_escape_string($v)."'";
				}
			}
		}
		$sql = 'update '.$tablename
			.' set '.implode(',',$sql_array);
		if ($where)
			$sql .= ' where '.$where;
		return $sql;
	}

	function escapeField($src) {
		if (is_array($src)) {
			$target = $src;
			foreach ($target as &$v) {
				$v = $this->escapeField($v);
			}
			return $target;
		} else {
			if (strpos($src, '^') === 0)
				return substr($src, 1);
			$target = explode('.', $src);
			foreach ($target as &$v) {
				$v = '`'.$v.'`';
			}
			return implode('.', $target);
		}
	}
}
?>