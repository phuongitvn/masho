<?php
/**
 *  My/Fight/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_fight_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyFightIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "p"         => array(),
        "cl" => array(),
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
 *  my_fight_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyFightIndex extends M_ActionClass
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
     *  my_fight_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
 
        $fightManager = $this->backend->getManager("Fight");
        $member_id = $this->af->get('opensocial_owner_id');

        $limit = 10;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }
        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

		/*
        //アラートクリア
        if($this->af->get('cl') == "1"){
            $fightManager->clearAlert($member_id);
        }
		*/

        //ファイト一覧
        $cnt = $fightManager->getFightlistCount($member_id);
        if($cnt > 0){

            $list = $fightManager->getFightlist($member_id ,$limit ,$offset);

            //ページャーセット
            $navi = $fightManager->getPagerSource($cnt, $limit, $p, 10);
        }

        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);

        return 'my_fight_index';
    }
}

?>
