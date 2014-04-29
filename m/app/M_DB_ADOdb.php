<?php
require_once 'Ethna/class/DB/Ethna_DB_ADOdb.php';
class M_DB_ADOdb extends Ethna_DB_ADOdb {
	function connect() {
		$ret = parent::connect();
		$this->query("set character set 'utf8'");
		return $ret;
	}
	function getRow($query, $inputarr = false)
	{
		$ret = parent::getRow($query, $inputarr);
		return $ret;
	}
	function insertId() {
		return $this->db->Insert_ID();
	}
}
?>