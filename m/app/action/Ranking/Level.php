<?php
class M_Form_RankingLevel extends M_ActionForm {
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"uid" => array(),
		"tid" => array(),

	);
}

class M_Action_RankingLevel extends M_ActionClass {
	function prepare() {
		return parent::prepare();
	}

	function perform() {
		$rankingManager = $this->backend->getManager("Ranking");
		$ret = $rankingManager->getLevelRanking();
		$top_user = array_shift($ret);

		$this->af->setApp('top_user', $top_user);
		$this->af->setApp('ranking', $ret);

		return 'ranking_level';
	}
}

?>
