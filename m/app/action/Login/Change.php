<?php
/**
 *  Login/Forgot.php
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
class M_Form_LoginChange extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
	   /*
		*  TODO: Write form definition which this action uses.
		*  @see http://ethna.jp/ethna-document-dev_guide-form.html
		*
		*  Example(You can omit all elements except for "type" one) :
		*
		*  'sample' => array(
		*	  // Form definition
		*	  'type'		=> VAR_TYPE_INT,	// Input type
		*	  'form_type'   => FORM_TYPE_TEXT,  // Form type
		*	  'name'		=> 'Sample',		// Display name
		*  
		*	  //  Validator (executes Validator by written order.)
		*	  'required'	=> true,			// Required Option(true/false)
		*	  'min'		 => null,			// Minimum value
		*	  'max'		 => null,			// Maximum value
		*	  'regexp'	  => null,			// String by Regexp
		*	  'mbregexp'	=> null,			// Multibype string by Regexp
		*	  'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp 
		*
		*	  //  Filter
		*	  'filter'	  => 'sample',		// Optional Input filter to convert input
		*	  'custom'	  => null,			// Optional method name which
		*										// is defined in this(parent) class.
		*  ),
		*/
		
		'pass_old' => array(
			'name' => 'pass_old',
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT
		),
		'pass_new' => array(
			'name' => 'pass_new',
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT
		),
		'repass_news' => array(
			'name' => 'repass_news',
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT
		),
		'btn' => array(
			'name' => 'btn',
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT
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
class M_Action_LoginChange extends M_ActionClass
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
	{	
		$btn = $this->af->get('btn');
		$pass_old = $this->af->get('pass_old');
		$pass_new = $this->af->get('pass_new');
		$repass_news = $this->af->get('repass_news');
		$this->af->setApp("pass_old_input", $pass_old);
		$this->af->setApp("pass_new_input", $pass_new);
		$this->af->setApp("repass_news_input", $repass_news);
		
		$userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $friendManager = $this->backend->getManager("Friend");
        $treasureManager = $this->backend->getManager("Treasure");
 
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
			if (empty($pass_old)) {
				$this->ae->addObject(
					'pass_old',
					Ethna::raiseNotice('Vui lòng nhập mật khẩu cũ')
				);
				return 'login_change';
			}
			if (empty($pass_new)) {
					$this->ae->addObject(
						'pass_new',
						Ethna::raiseNotice('Vui lòng nhập mật khẩu mới')
					);
					return 'login_change';
			}else if (! $this->_isValidPassword($pass_new)) {
				$this->ae->addObject(
					'pass_new',
					Ethna::raiseNotice('Vui lòng nhập mật khẩu mới')
				);
				return 'login_change';
			}
			if (empty($repass_news)) {
					$this->ae->addObject(
						'repass_news',
						Ethna::raiseNotice('Vui lòng nhập lại mật khẩu mới')
					);
					return 'login_change';
			} 
			
			if ($pass_new != $repass_news) {
				$this->ae->addObject(
					'repass_news',
					Ethna::raiseNotice('Nhập lại mật khẩu không đúng. Xin vui lòng thao tác lại')
				);
				return 'login_change';
			}
			$supportManager = $this->backend->getManager('Support');
$ret=$supportManager->checkPass($profile["memberid"],sha1('masho'.$pass_old));
			if ($ret == false) {
				$this->ae->addObject(
					'pass_old',
					Ethna::raiseNotice('Mật khẩu cũ không chính xác')
				);
				return 'login_change';
			}
	$rs=$supportManager->setPass($profile["memberid"],sha1('masho'.$pass_new));
		//$rs=$userManager->login($profile["handle"],$$pass_new);
			return 'login_changesuccess';
		}
			return 'login_change';
	
	}
	function _isValidPassword($pwd) {
		return preg_match('/^[a-zA-Z0-9_]{4,16}$/', $pwd);
	}
	
}

?>
