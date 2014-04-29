<?php
define('DB_HOST', '210.245.87.70');
define('DB_USER', 'masho');
define('DB_PASS', '1406masho2011');
define('DB_NAME', 'masho');
define('DB_CHARSET', 'utf8');

class DB {
	var $conn;
	var $dbname;
	var $charset;
	var $is_auto_connect;
	var $special_values;
	var $table_prefix;

	function DB($is_auto_connect = TRUE) {
		$this->is_auto_connect = $is_auto_connect;
		$this->charset = $this->dbname = $this->conn = NULL;
		$this->special_values = array(
			'NOW()'=> 1,
			'CURRENT_DATE'=> 1,
			'CURRENT_TIMESTAMP' => 1
		);
	}

	function getInstance() {
		static $instance = NULL;
		if ($instance == NULL)
			$instance = new DB;
		return $instance;
	}

	function isConnect() {
		return $this->conn != NULL;
	}

	function selectDb($db_name) {
		if (mysql_select_db($db_name, $this->conn) === FALSE) {
			$this->close();
			return false;
		}
		$this->dbname = $db_name;
		return true;
	}

	function setCharset($charset) {
		if (! $this->conn) {
			if ($this->is_auto_connect) {
				if ($this->connect(DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHARSET) === FALSE)
					return false;
			} else {
				return false;
			}
		}

		if ($this->query("set character set '".$this->escape($charset)."'") === FALSE) {
			if ($this->query("set names '".$this->escape($charset)."'") === FALSE)
				return false;
		}
		$this->charset = $charset;
		return true;
	}

	function connect($host, $dbname, $id, $pwd, $charset = NULL) 
	{
		$this->conn = mysql_connect($host, $id, $pwd, true);
		if (! $this->conn) {
			if (function_exists('err_log'))
				err_log("db connection failed(host:$host,id:$id,charset:$charset)".$this->getError());
			$this->conn = NULL;
			return false;
		}

		if ($this->selectDb($dbname) === FALSE) {
			if (function_exists('err_log'))
				err_log("select db failed(host:$host,name:$dbname,id:$id,charset:$charset)".$this->getError());
			$this->close();
			return false;
		}

		if (! empty($charset)) {
			if ($this->setCharset($charset) === FALSE) {
				$this->close();
				return false;
			}
		}

		if (function_exists('debug_log'))
			debug_log("create db connection(host:$host,name:$dbname,id:$id,charset:$charset)");
		return true;
	}

	function getError() {
		if ($this->conn)
			return mysql_error($this->conn);
		return mysql_error();
	}

	function query($sql) {
		if (! $this->conn) {
			if ($this->is_auto_connect) {
				if ($this->connect(DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHARSET) === FALSE)
					return false;
			} else {
				return false;
			}
		}
		if (function_exists('debug_log'))
			debug_log($sql);
		$ret = mysql_query($sql, $this->conn);
		if ($ret === FALSE)
			if (function_exists('warn_log'))
				warn_log('invalid sql:'.$sql.'('.$this->getError().')');

		return $ret;
	}

	function fetchRow($query_result) {
		return mysql_fetch_row($query_result);
	}

	function fetchAll($query_result, $key_field=NULL) {
		$ret = array();
		if ($query_result === FALSE)
			return $ret;

		if ($key_field) {
			while ($row = mysql_fetch_assoc($query_result))
				$ret[$row[$key_field]] = $row;
		} else {
			while ($row = mysql_fetch_assoc($query_result))
				$ret[] = $row;
		}
		return $ret;
	}

	function getAll($sql, $key_field=NULL) {
		$query_result = $this->query($sql);
		return $this->fetchAll($query_result, $key_field);
	}

	//MEMO: UNION‚É‘Î‚·‚écount‚ª–ï‰î‚¾‚Á‚½‚Ì‚Å‚Ð‚Æ‚Ü‚¸‘¦‹»‚Å
	function countAll($sql, $key_field=NULL) {
		$query_result = $this->query($sql);
		return mysql_num_rows($query_result);
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

	function select($tablename, $fields, $where=NULL, $order_by=NULL, $limit=NULL, $is_distinct = FALSE, $key_field=NULL) {
		$sql = $this->makeSelectSql($tablename, $fields, $where, $order_by, $limit, $is_distinct);
		$query_result = $this->query($sql);
		return $this->fetchAll($query_result, $key_field);
	}

	function select1($tablename, $fields, $where=NULL, $order_by=NULL, $key_field=NULL) {
		$tmp = $this->select($tablename, $fields, $where, $order_by, 1, FALSE, $key_field);
		if (count($tmp) > 0)
			return $tmp[0];
		return false;
	}

	function countSelect($tablename, $fields, $where=NULL, $limit=NULL, $is_distinct = FALSE) {
		return $this->countAll(
			$this->makeSelectSql($tablename, $fields, $where, NULL, $limit, $is_distinct)
		);
	}

	function makeSelectSql($tablename, $fields, $where=NULL, $order_by=NULL, $limit=NULL, $is_distinct = FALSE) {
		$sql = 'select ';
		if ($is_distinct)
			$sql .= 'distinct ';
		$sql .= implode(',',$this->escapeField($fields)).' from '.$this->getTableName($tablename);
		if (!empty($where))
			$sql.=' where '.$where;
		if (!empty($order_by))
			$sql.=' order by '.$order_by;
		if (!empty($limit))
			$sql.=' limit '.$limit;
		return $sql;
	}

	function getTableName($tablename) {
		return $this->table_prefix.$tablename;
	}

	function insert($tablename, $key_value_map) {
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
					$sql_values[] = "'".$this->escape($v)."'";
				}
			}
		}
		$sql = 'insert into '.$this->getTableName($tablename)
			.'('.implode(',',$sql_fields).") values(".implode(",", $sql_values).")";
		$tmp_ret = $this->query($sql);
		if ($tmp_ret === FALSE)
			return $tmp_ret;

		return mysql_insert_id($this->conn);
	}

	function update($tablename, $key_value_map, $where) {
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
					$sql_array[] = $this->escapeField($k)."='".$this->escape($v)."'";
				}
			}
		}
		$sql = 'update '.$this->getTableName($tablename)
			.' set '.implode(',',$sql_array);
		if ($where)
			$sql .= ' where '.$where;
		return $this->query($sql);
	}
	
	function delete($tablename, $where) {
		$sql = 'delete from '.$this->getTableName($tablename);
		if ($where)
			$sql .= ' where '.$where;
		return $this->query($sql);
	}

	function close() {
		@mysql_close($this->conn);
		$this->conn = NULL;
	}

	function escape($src) {
		if (! $this->conn) {
			if ($this->is_auto_connect) {
				if ($this->connect(DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHARSET) === FALSE)
					return mysql_real_escape_string($src);	// TODO: bad code
			} else {
				return mysql_real_escape_string($src);	// TODO: bad code
			}
		}
		return mysql_real_escape_string($src, $this->conn);
	}
	
	function begin() {
		return $this->query('begin');
	}
	function commit() {
		return $this->query('commit');
	}
	function rollback() {
		return $this->query('rollback');
	}
}
