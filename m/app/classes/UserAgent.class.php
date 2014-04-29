<?php
/**
 *  �桼����������������饹
 *
 *  @author     nakanishi
 */
define('USER_AGENT_DOCOMO',   1);
define('USER_AGENT_AU',       2);
define('USER_AGENT_SOFTBANK', 3);
define('USER_AGENT_PC',       4);

class UserAgent
{
	// ����������ȼ��� (USER_AGENT_xxxx)
	private $agentType = '';


	/**
	 * ���󥹥ȥ饯��
	 */
	public function __construct() {

		// ����������ȼ���Ƚ��
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
	 * �桼�������������ʸ������֤�
	 *
	 * @return	string
	 */
	public function getAgent() {

		return $_SERVER['HTTP_USER_AGENT'];
	}

	/**
	 * ����������ȼ��̤��֤�
	 *
	 * @return	int		USER_AGENT_xxx
	 */
	public function getAgentType() {
		return $this->agentType;
	}

	/**
	 * ��Х���ü�����ɤ������֤�
	 *
	 * @return	bool
	 */
	public function isMobile() {
		return ($this->agentType != USER_AGENT_PC);
	}

	/**
	 * ü�������ֹ���֤�
	 *
	 * @return	string	ü�������ֹ�
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
	 * ������֤�
	 *
	 * @return	string	����
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
	 * ���̲����٤��֤�
	 *
	 * @return	string	����
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
	 * ������Ƚ��
	 * @return	bool	true:�����顢false:�󥯥���
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