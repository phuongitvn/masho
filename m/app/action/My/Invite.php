<?php
class M_Form_MyInvite extends M_ActionForm {
	var $form = array(
		'opensocial_owner_id' => array(),
		'ssid' => array(),
		'tel' => array()
	);
}

class M_Action_MyInvite extends M_ActionClass {
	function prepare() {
		return parent::prepare();
	}

	function perform() {
		$userManager = $this->backend->getManager('User');
		$friendManager = $this->backend->getManager('Friend');

		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);

		$ssid = $this->af->get('ssid');
		$tel = $this->af->get('tel');
		if (! empty($tel)) {
			$isReload = $userManager->isReload($member_id ,$ssid);
			if (! $isReload) {
				$ret = $friendManager->inviteLTBC($member_id, $tel);
				if (is_object($ret)) {
					if ($ret->SendSMSResult == 1) {
						$message = 'Bạn vừa gửi lời mời tham gia LTBC đến '.$tel;
					} else {
						$err = 'Hiện tại chức năng này đang bị lỗi. Bạn vui lòng thử lại sau ít phút nữa';
					}
				} else {
					switch ($ret) {
					case -1:
						$err = 'Số điện thoại không đúng. Vui lòng xem hướng dẫn chi tiết';
						break;
					case -2:
						$err = 'Số điện thoại này đã tồn tại. Xin vui lòng chọn số điện thoại khác';
						break;
					case -3:
						$err = 'Bạn phải đợi 1 tuần để có thể tiếp tục gửi lời mời đến cùng số điện thoại';
						break;
					case -4:
						$err = 'Bạn chỉ được gửi tối đa 5 lời mời mỗi ngày';
						break;
					}
				}
				if (! empty($err)) {
					$this->af->setApp('err', $err);
				}
				if (! empty($message)) {
					$this->af->setApp('message', $message);
				}
			}
			$this->af->setApp('tel', $tel);
		}

		$ssid = $userManager->getSsId();
		$this->af->setApp('ssid', $ssid);

		return 'my_invite';
	}
}

?>