<?php
/**
 * �Í���/�������N���X
 *
 * 2010/02/04	nakanishi
 */

/* Uid �N���v�g �R�~���j�e�B�^�O�p*/
class UidCrypt {

	/* �Í����̎� */
	private $key = '******';
	
	/* �������x�N�g�� */
	private $iv;
	
	/* ���\�[�X */
	private $resource;
	
	/**
	 * �R���X�g���N�^
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
	 * �Í���
	 *
	 * @param	string	�Í������镶����
	 * @return	string	�Í�����̕�����
	 */
	public function encrypt($target) {
		
		mcrypt_generic_init($this->resource, $this->key, $this->iv);
		$encrypted_data = mcrypt_generic($this->resource, base64_encode($target));
		mcrypt_generic_deinit($this->resource);
		
		return bin2hex($encrypted_data);
	}
	
	/**
	 * ������
	 *
	 * @param	string	�������镶����
	 * @return	string	������̕�����
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
	 * �f�X�g���N�^
	 */
	public function __destruct() {
		
		// ���W���[�������
		mcrypt_module_close($this->resource);
	}
}

class Crypt {

	/* �Í����̎� */
	private $key = 'violaSCB';
	
	/* �������x�N�g�� */
	private $iv;
	
	/* ���\�[�X */
	private $resource;
	
	/**
	 * �R���X�g���N�^
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
	 * �Í���
	 *
	 * @param	string	�Í������镶����
	 * @return	string	�Í�����̕�����
	 */
	public function encrypt($target) {
		
		mcrypt_generic_init($this->resource, $this->key, $this->iv);
		$encrypted_data = mcrypt_generic($this->resource, base64_encode($target));
		mcrypt_generic_deinit($this->resource);
		
		return bin2hex($encrypted_data);
	}
	
	/**
	 * ������
	 *
	 * @param	string	�������镶����
	 * @return	string	������̕�����
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
	 * �f�X�g���N�^
	 */
	public function __destruct() {
		
		// ���W���[�������
		mcrypt_module_close($this->resource);
	}
}
