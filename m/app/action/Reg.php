<?php
class M_Form_Reg extends M_ActionForm
{
	var $form = array(

		"opensocial_owner_id" => array(),
	);
}

class M_Action_Reg extends M_ActionClass
{
	function prepare() {
		if(is_array($_GET) == True){
			foreach($_GET as $key=> $value){
				$this->af->set($key ,$value);
			}
		}
		if(is_array($_POST) == True){
			foreach($_POST as $key=> $value){
				$this->af->set($key ,$value);
			}
		}

		$domain = $this->config->get("url");
		$this->af->setApp('domain' ,$domain);
	}

	function perform() {
		//mbga　GWチェック
		$ret = Util::fromMbga();

		//メンテナンス状態取得
		$batchManager = $this->backend->getManager("Batch");
		$mt_flg = $batchManager->getMaintainanceStatus();
		if($mt_flg == 1){
			return 'maintain';
		}

		if($ret == False){
			return 'error_sys';
		}

		//会員登録チェック
		$user_id = $this->af->get('opensocial_owner_id');
		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");

		$chk = $userManager->existsUser($user_id);
		if($chk == True){
				$profile = $userManager->getProfile($user_id);
				$ssid = $userManager->getSsId();
				$this->af->setApp("ssid", $ssid);
				$this->af->setApp("profile", $profile);
				$card = $cardManager->getCardAtt($profile['prof']);
				$this->af->setApp("card", $card);
				$stage = $userManager->getStageName($profile['stage']);
				$this->af->setApp("stage", $stage);
		  	if($profile['tut_num'] < 10){
				return 'my_indextut';
			}elseif($profile['tut_num'] == 10 || $profile['tut_num'] == 11){
				return 'quest_tut3';
			}elseif($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){
				return 'my_indextutf';
			}elseif($profile['tut_num'] == 18){
				return 'my_indextutl';
			}else{
				return 'my_index';
			}
		}

		$reg['o'] = $this->config->get('reg_o');
		$reg['d'] = $this->config->get('reg_d');
		$reg['b'] = $this->config->get('reg_b');
		$this->af->setApp("reg", $reg);

		return 'reg';
	}
}

?>