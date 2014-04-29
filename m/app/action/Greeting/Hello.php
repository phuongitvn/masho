<?php
/**
 *  Greeting/Hello.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_GreetingHello extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "md" => array(),
        "id" => array(),
        "tid" => array(),
        'comnt' => array(
            'name'         => '文章',
            'type'         => VAR_TYPE_STRING,
            'form_type'    => FORM_TYPE_TEXTAREA,
            'max'          => 100,
            'max_error'    => "100文字以内で入力してください",
            'required'    => true,
        ),
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
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
 *  greeting_hello action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_GreetingHello extends M_ActionClass
{
    /**
     *  preprocess of my_p_day Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  greeting_hello action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");
        $greetManager = $this->backend->getManager("Greet");

        $member_id = $this->af->get('opensocial_owner_id');
        $md = $this->af->get('md');
        $friend_id = $this->af->get('id');
        $txt_id = $this->af->get('tid');
		$this->af->setApp('md' ,$md);

		//BlackListCHK
		$black = chkBlackList($member_id,$friend_id);
		if($black['entry']['id'] == $friend_id && $black['entry']['ignorelistId'] == $member_id){
            return "error_black";
		}

		if($md ==""){
	        //本人チェック
	        if($member_id == $friend_id){
	            $this->af->setApp('error' ,"1");
	            return 'error_my';
	        }

	        //プロフィール情報
	        $profile = $userManager->getProfile($friend_id);
	        if(count($profile) == 0){
	            return 'error_404';
	        }
	        $this->af->setApp("profile", $profile);
		}

		//11/2/2 ニコニコがはじめてでない場合　txt_idを取得
		if($txt_id == ""){
			//当日ニコニコ回数を取得
			$times = $greetManager->existsGreeting($member_id ,$friend_id);

			if($times > 1){
				$txt_id = $userManager->getGreetTxtid($member_id ,$friend_id);
			}
		}

		if($txt_id != ""){

			if($md == "cmnt"){
				$txtGroup="comments";
			}else{
				$txtGroup="hello";
			}
			$txt = getTxt($member_id,$txtGroup,$txt_id); //GREEはtxtGroup不要

			//配列か判定
			if(is_array($txt)){
				//if(substr($txt,0,3) != "404"){	//初期状態txtidがNULLでは配列ではなく404が返却される
				//0 監査中 1 監査結果OK 2 削除 3 監査結果NG 
				if($txt['entry']['0']['status'] == 2 || $txt['entry']['0']['status'] == 3 ){
			        $this->af->setApp('insp',"2");
				}else{
					$comnt = $txt['entry']['0']['data'];
			        $this->af->setApp('txtdata' ,$comnt);
				}

			}

		}
		return 'greeting_hello';
    }
}

?>
