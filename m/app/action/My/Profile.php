<?php
/**
 *  My/Profile.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  login_forgot Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_MyProfile extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
		'email' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'EMAIL'
		),
		'tel' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'TEL'
		),
		'btn' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'BTN'
		),
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed		   Converted result.
	 */
	/*
	function _filter_sample($value)
	{
		//  convert to upper case.
		return strtoupper($value);
	}
	*/
}

/**
 *  login_forgot action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_MyProfile extends M_ActionClass
{
	/**
	 *  preprocess of login_forgot Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
	 */
	function prepare()
	{
		$domain = $this->config->get("url");
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	/**
	 *  login_forgot action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{	$btn = $this->af->get('btn');
		$email = $this->af->get('email');
		$tel = $this->af->get('tel');
		
		$userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $friendManager = $this->backend->getManager("Friend");
        $treasureManager = $this->backend->getManager("Treasure");
 		$supportManager = $this->backend->getManager('Support');
        $member_id = $this->af->get('opensocial_owner_id');
        $profile = $userManager->getProfile($member_id);
		$this->af->setApp("tut_num", $profile['tut_num']);
		$profile['friend_num'] = $friendManager->getFriendlistCount($member_id,$sta="2",$kb="");
    	$this->af->setApp("profile", $profile);
        $deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("deck", $deck);
		$nextExp = $userManager->getNextExpContByLevel($profile['level']);
			$diffExp = $nextExp - $profile['exp'];
			$this->af->setApp("diffExp", $diffExp);
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp("card", $card);
		$maxFr = $userManager->getMaxFriendContByLevel($profile['level']);
        $this->af->setApp("maxFr", $maxFr);
        $numChk = $treasureManager->getTrcoNum($member_id);
        $this->af->setApp("numChk", $numChk);
        $cnt = $cardManager->getCardlistCount($member_id ,$status="0");
	    $cnt += $cardManager->getCardlistCount($member_id ,$status="1");
		$this->af->setApp("cnt", $cnt);
		if (!empty($btn)) {
			if (empty($email)) {
				$this->ae->addObject(
					'email',
					Ethna::raiseNotice('Vui lòng nhập địa chỉ email')
				);
				return 'my_profile';
			} else if (Ethna_Util::checkMailAddress($email) === FALSE) {
				$this->ae->addObject(
					'email',
					Ethna::raiseNotice('Địa chỉ email không đúng. Vui lòng nhập lại')
				);
				return 'my_profile';
			}
			if (empty($tel)) {
				$this->ae->addObject(
					'tel',
					Ethna::raiseNotice('Vui lòng nhập số điện thoại')
				);
				return 'my_profile';
			} else if (! $this->_isValidTel($tel)) {
				$this->ae->addObject(
					'tel',
					Ethna::raiseNotice('Số điện thoại không đúng. Vui lòng nhập lại')
				);
				return 'my_profile';
			}
			if($email != $profile["email"]){
				$ret=$supportManager->existMail($email);
				if($ret!=false){
					$this->ae->addObject(
										'email',
										Ethna::raiseNotice('Địa chỉ email này đã tồn tại. Xin vui lòng chọn địa chỉ email khác')
									);
					return 'my_profile';
				}
			}
			if($tel != $profile["tel"]){
				$ret=$supportManager->existTel($tel);
				if($ret!=false){
				$this->ae->addObject(
									'tel',
									Ethna::raiseNotice('Số điện thoại này đã tồn tại. Xin vui lòng chọn số điện thoại khác')
								);
				return 'my_profile';
				}
			}
			if($email != $profile["email"] || $tel != $profile["tel"]){
				$ret=$supportManager->updateProfile($member_id,$email,$tel);
				if($ret!=false){
					return 'my_profileupdatesuccess';
				}
			}else{
				return 'my_profile';
			}
		}else{
			return 'my_profile';
		}
	
	
	}
	function _isValidTel($tel) {
		$p1 = '/^01[2689][0-9]{8}$/';
		$p2 = '/^09[0-9]{8}$/';
		return (preg_match($p1, $tel) || preg_match($p2, $tel));
	}

	
}

?>
