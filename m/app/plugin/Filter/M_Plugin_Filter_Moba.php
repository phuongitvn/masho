<?php
class M_Plugin_Filter_Moba extends Ethna_Filter {
	function preFilter() {
	}

	function postFilter() {
	}

	function preActionFilter2($action_name) {
		$session =& $this->controller->getSession();
		//if (! $session->session_start)
		//	$session->start();
		$id = $session->get('id');
		if (! empty($id)) {
			$this->controller->action_form->set('opensocial_owner_id', $id);
		} else {
			if (function_exists('getallheaders')) {
				$headers = getallheaders();
				if (! empty($headers['user_id'])) {
					$this->controller->action_form->set('opensocial_owner_id', $headers['user_id']);
				}
			}
		}
	}

	function postActionFilter() {
	}
}
?>