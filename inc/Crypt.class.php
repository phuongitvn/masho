<?php
/**
 * 暗号化/複合化クラス
 *
 * 2010/02/04	nakanishi
 */

/* Uid クリプト コミュニティタグ用*/
class UidCrypt {

	/* 暗号化の種 */
	private $key = '******';
	
	/* 初期化ベクトル */
	private $iv;
	
	/* リソース */
	private $resource;
	
	/**
	 * コンストラクタ
	 */
	public function __construct() {
	
                // <8e><96><91>O<8f><88><97><9d>
                $this->resource = mcrypt_module_open(MCRYPT_BLOWFISH, '',  MCRYPT_MODE_CBC, '');

                $ivSize = mcrypt_enc_get_iv_size($this->resource);
                $this->iv = substr(md5($this->key), 0, $ivSize);

		$keySize = mcrypt_enc_get_key_size($this->resource);
		$this->key = substr(md5($this->key), 0, $keySize);
	}
	
	/**
	 * 暗号化
	 *
	 * @param	string	暗号化する文字列
	 * @return	string	暗号化後の文字列
	 */
	public function encrypt($target) {
		
		mcrypt_generic_init($this->resource, $this->key, $this->iv);
		$encrypted_data = mcrypt_generic($this->resource, base64_encode($target));
		mcrypt_generic_deinit($this->resource);
		
		return bin2hex($encrypted_data);
	}
	
	/**
	 * 複合化
	 *
	 * @param	string	複合する文字列
	 * @return	string	複合後の文字列
	 */
	public function decrypt($target) {
		
		mcrypt_generic_init($this->resource, $this->key, $this->iv);
//                $base64_decrypted_data = mdecrypt_generic($this->resource, $target);
		$base64_decrypted_data = mdecrypt_generic($this->resource, pack("H*", $target));
		mcrypt_generic_deinit($this->resource);
		
                return base64_decode($base64_decrypted_data);
//		return base64_decode(rtrim($base64_decrypted_data, "\0"));
	}
	
	/**
	 * デストラクタ
	 */
	public function __destruct() {
		
		// モジュールを閉じる
		mcrypt_module_close($this->resource);
	}
}

class Crypt {

	/* 暗号化の種 */
	private $key = 'violaSCB';
	
	/* 初期化ベクトル */
	private $iv;
	
	/* リソース */
	private $resource;
	
	/**
	 * コンストラクタ
	 */
	public function __construct() {
	
                // <8e><96><91>O<8f><88><97><9d>
                $this->resource = mcrypt_module_open(MCRYPT_BLOWFISH, '',  MCRYPT_MODE_CBC, '');

                $ivSize = mcrypt_enc_get_iv_size($this->resource);
                $this->iv = substr(md5($this->key), 0, $ivSize);

		$keySize = mcrypt_enc_get_key_size($this->resource);
		$this->key = substr(md5($this->key), 0, $keySize);
	}
	
	/**
	 * 暗号化
	 *
	 * @param	string	暗号化する文字列
	 * @return	string	暗号化後の文字列
	 */
	public function encrypt($target) {
		
		mcrypt_generic_init($this->resource, $this->key, $this->iv);
		$encrypted_data = mcrypt_generic($this->resource, base64_encode($target));
		mcrypt_generic_deinit($this->resource);
		
		return bin2hex($encrypted_data);
	}
	
	/**
	 * 複合化
	 *
	 * @param	string	複合する文字列
	 * @return	string	複合後の文字列
	 */
	public function decrypt($target) {
		
		mcrypt_generic_init($this->resource, $this->key, $this->iv);
//                $base64_decrypted_data = mdecrypt_generic($this->resource, $target);
		$base64_decrypted_data = mdecrypt_generic($this->resource, pack("H*", $target));
		mcrypt_generic_deinit($this->resource);
		
                return base64_decode($base64_decrypted_data);
//		return base64_decode(rtrim($base64_decrypted_data, "\0"));
	}
	
	/**
	 * デストラクタ
	 */
	public function __destruct() {
		
		// モジュールを閉じる
		mcrypt_module_close($this->resource);
	}
}
