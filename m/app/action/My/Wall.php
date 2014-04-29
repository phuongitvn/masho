<?php
class M_Form_MyWall extends M_ActionForm {
	var $form = array(
		'opensocial_owner_id' => array(),
		'status' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'status'
		),
		'p' => array()
	);
}

class M_Action_MyWall extends M_ActionClass {
	function prepare() {
		return parent::prepare();
	}

	function perform() {
		$userManager = $this->backend->getManager('User');
		$itemManager = $this->backend->getManager('Item');
		$infoManager = $this->backend->getManager('Info');

		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);

		$status = trim($this->af->get('status'));
		if (! empty($status)) {
			if (mb_strlen($status) > 250) {
				$this->af->setApp('err', 'Nội dung chia sẻ không được lớn hơn 250 ký tự');
				$this->af->setApp('status', $status);
			} else {
				$ret = $infoManager->addInfos(
					$member_id,
					$member_id,
					$infoManager->content_type_ids['status'],
					array('summary' => $status)
				);

				if ($ret) {
					$domain = $this->config->get('url');
					$www = $domain['www'];
					$endUrl = "?url=http%3A%2F%2F".$www."%2Fmy%2Fwall.php".rawurlencode('?').session_name().rawurlencode('=').session_id();
					header("Location: $endUrl");
					exit;
				} else {
					$this->af->setApp('err', 'error');
				}
			}
		}

		$rcv_id = $this->config->get('kibiItemid');
		$rcv = $itemManager->getKbn4Count($member_id,$rcv_id);
		$this->af->setApp('rcv', $rcv);

		if($profile['friend_pt'] >= 100 || $rcv > 0){
			//リロード対策(げんき回復)
			$ssid = $userManager->getSsId();
			$this->af->setApp('ssid', $ssid);
		}

		$limit = 10;
		$cnt = $infoManager->countWall($member_id);
		if ($cnt > 0) {
			$p = $this->af->get('p');
			if ((empty($p)) || (!is_numeric($p))) {
				$p = 1;
				$this->af->set('p', $p);
			}
			$offset = ($p-1) * $limit;
			$wall = $infoManager->getWall($member_id, $offset.','.$limit);
			$navi = $infoManager->getPagerSource($cnt, $limit, $p, $limit);
			$this->af->setApp('list', $wall);
			$this->af->setApp('cnt', $cnt);
			$this->af->setApp('navi', $navi);
			$this->af->setApp('limit', $limit);
		}

		return 'my_wall';
	}
}

?>