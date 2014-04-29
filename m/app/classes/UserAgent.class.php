<?php
/**
 *  ユーザエージェント操作クラス
 *
 *  @author     nakanishi
 */
define('USER_AGENT_DOCOMO',   1);
define('USER_AGENT_AU',       2);
define('USER_AGENT_SOFTBANK', 3);
define('USER_AGENT_PC',       4);

class UserAgent
{
	// エージェント種別 (USER_AGENT_xxxx)
	private $agentType = '';


	/**
	 * コンストラクタ
	 */
	public function __construct() {

		// エージェント種別判定
		if (preg_match('/^Docomo/i', $this->getAgent())) {
			$this->agentType = USER_AGENT_DOCOMO;
		} elseif (preg_match('/^(J-PHONE|Vodafone|SoftBank)/i', $this->getAgent())) {
			$this->agentType = USER_AGENT_SOFTBANK;
		} elseif (preg_match('/^(KDDI)/i', $this->getAgent())) {
			$this->agentType = USER_AGENT_AU;
		} elseif (preg_match('/(UP.Browser)/i', $this->getAgent())) {
			$this->agentType = USER_AGENT_AU;
		} else {
			$this->agentType = USER_AGENT_PC;
		}
	}

	/**
	 * ユーザエージェント文字列を返す
	 *
	 * @return	string
	 */
	public function getAgent() {

		return $_SERVER['HTTP_USER_AGENT'];
	}

	/**
	 * エージェント種別を返す
	 *
	 * @return	int		USER_AGENT_xxx
	 */
	public function getAgentType() {
		return $this->agentType;
	}

	/**
	 * モバイル端末かどうかを返す
	 *
	 * @return	bool
	 */
	public function isMobile() {
		return ($this->agentType != USER_AGENT_PC);
	}

	/**
	 * 端末識別番号を返す
	 *
	 * @return	string	端末識別番号
	 */
	public function getUim($is_plane=False) {

		switch ($this->agentType) {

		  case USER_AGENT_DOCOMO:
			$uim = isset($_SERVER['HTTP_X_DCMGUID']) ? $_SERVER['HTTP_X_DCMGUID'] : null;
			break;

		  case USER_AGENT_AU:
			$uim = isset($_SERVER['HTTP_X_UP_SUBNO']) ? $_SERVER['HTTP_X_UP_SUBNO'] : null;
			break;

		  case USER_AGENT_SOFTBANK:
			if(isset($_SERVER['HTTP_X_JPHONE_UID'])){
                if($is_plane == True){
    				$uim = $_SERVER['HTTP_X_JPHONE_UID'];
                }else{
    				$uim = substr($_SERVER['HTTP_X_JPHONE_UID'], 1, strlen($_SERVER['HTTP_X_JPHONE_UID']));
                }
			}
			break;

		  default:
			$uim = '';
		}
		return $uim;
	}

	/**
	 * 機種を返す
	 *
	 * @return	string	機種
	 */
	public function getModel() {

        switch ($this->agentType) {

            case USER_AGENT_DOCOMO:
                preg_match('/^DoCoMo\/([0-9\.])+[\s|\/]([^\(]+)/i', $this->getAgent(), $matches);
                $model = $matches[2];
                break;

            case USER_AGENT_AU:
                preg_match('/^KDDI-([0-9A-Za-z]+)/i', $this->getAgent(), $matches);
                $model = $matches[1];
                break;

            case USER_AGENT_SOFTBANK:
                preg_match('/^(J-PHONE|Vodafone|SoftBank)\/[^\/]+\/([^\/]+)/i', $this->getAgent(), $matches);
                $model = $matches[2];
            break;

          default:
            $model = '';
        }
        return $model;
	}

	/**
	 * 画面解像度を返す
	 *
	 * @return	string	機種
	 */
	public function getScale() {

        switch ($this->agentType) {

            case USER_AGENT_AU:
                if (isset($_SERVER['HTTP_X_UP_DEVCAP_DEVICEPIXELS']) && !empty($_SERVER['HTTP_X_UP_DEVCAP_DEVICEPIXELS'])) {
                    list($width, $height) = explode(",", $_SERVER['HTTP_X_UP_DEVCAP_DEVICEPIXELS']);
                    $returns = array('width' => $width, 'height' => $height);
                } elseif (isset($_SERVER['HTTP_X_UP_DEVCAP_SCREENPIXELS']) && !empty($_SERVER['HTTP_X_UP_DEVCAP_SCREENPIXELS'])) {
                    list($width, $height) = explode(",", $_SERVER['HTTP_X_UP_DEVCAP_SCREENPIXELS']);
                    $returns = array('width' => $width, 'height' => $height);
                } else {
                    $returns = false;
                }
                break;

            case USER_AGENT_SOFTBANK:
                if (isset($_SERVER['HTTP_X_JPHONE_DISPLAY']) && !empty($_SERVER['HTTP_X_JPHONE_DISPLAY'])) {
                    list($width, $height) = explode("*", $_SERVER['HTTP_X_JPHONE_DISPLAY']);
                    $returns = array('width' => $width, 'height' => $height);
                }
                else {
                    $returns = false;
                }
                break;

            case USER_AGENT_DOCOMO:
            default:
                $returns = false;
                break;
        }
        return $returns;
	}

	/**
	 * クローラ判定
	 * @return	bool	true:クローラ、false:非クローラ
	 */
	function isCrawler($crawler_arr)
	{

		foreach ($crawler_arr as $val) {
			if (false !== strpos($_SERVER['HTTP_USER_AGENT'], $val)) {
				return true;
			}
		}

		return false;
	}

}
?>