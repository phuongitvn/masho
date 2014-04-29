<?php
/**
 *  Item/Select.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  item_select form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_ItemSelect extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "id" => array(),
        "mb1" => array(),
        "mb2" => array(),
        "mb3" => array(),
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
 *  item_select action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_ItemSelect extends M_ActionClass
{
    /**
     *  preprocess item_select action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            return 'error';
        }
        $sample = $this->af->get('sample');
        return null;
        */

        return parent::prepare();
    }

    /**
     *  Select action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $userManager = $this->backend->getManager("User");
        $itemManager = $this->backend->getManager("Item");
        $questManager = $this->backend->getManager("Quest");

        $member_id = $this->af->get('opensocial_owner_id');
        $quest_id = $this->af->get('id');
		$this->af->setApp("id", $quest_id);
		$need = $questManager->getQuest($quest_id);
		$this->af->setApp("need", $need);

        //リロード対策
		$ssid = $itemManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        $profile = $userManager->getProfile($member_id);
        $this->af->setApp("profile", $profile);

		//購入が必要な個数
		$mustBuy = array();
        $mustBuy['1'] = $this->af->get('mb1');
        $mustBuy['2'] = $this->af->get('mb2');
        $mustBuy['3'] = $this->af->get('mb3');
		$this->af->setApp("mustBuy", $mustBuy);

		for ($i=1; $i<=3; $i++) {
			$id ="item".$i;
			$item[$i] = $itemManager->getItemData($need[$id]);

			if($profile['money'] >= $item[$i]['money'] ){
				$after[$i] = $profile['money'] - $item[$i]['money'];
			}

			if($item[$i]['questid'] != ""){
				$disp[$i] = $questManager->getQuest($item[$i]['questid']);
			}
		}

		$this->af->setApp("item1", $item['1']);
		$this->af->setApp("item2", $item['2']);
		$this->af->setApp("item3", $item['3']);
		$this->af->setApp("after", $after);
		$this->af->setApp("disp", $disp);

        return 'item_select';
    }
}

?>
