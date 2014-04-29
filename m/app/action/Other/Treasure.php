<?php
/**
 *  Other/Treasure.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  other_treasure Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_OtherTreasure extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
       /*
        *  TODO: Write form definition which this action uses.
        *  @see http://ethna.jp/ethna-document-dev_guide-form.html
        *
        *  Example(You can omit all elements except for "type" one) :
        *
        *  'sample' => array(
        *      // Form definition
        *      'type'        => VAR_TYPE_INT,    // Input type
        *      'form_type'   => FORM_TYPE_TEXT,  // Form type
        *      'name'        => 'Sample',        // Display name
        *
        *      //  Validator (executes Validator by written order.)
        *      'required'    => true,            // Required Option(true/false)
        *      'min'         => null,            // Minimum value
        *      'max'         => null,            // Maximum value
        *      'regexp'      => null,            // String by Regexp
        *      'mbregexp'    => null,            // Multibype string by Regexp
        *      'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
        *
        *      //  Filter
        *      'filter'      => 'sample',        // Optional Input filter to convert input
        *      'custom'      => null,            // Optional method name which
        *                                        // is defined in this(parent) class.
        *  ),
        */
        "opensocial_owner_id" => array(),
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
 *  other_treasure action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_OtherTreasure extends M_ActionClass
{
    /**
     *  preprocess of other_p_day Action.
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
     *  other_treasure action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager    = $this->backend->getManager("User");

        $member_id = $this->af->get('opensocial_owner_id');

        //プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
        $profile = $userManager->getProfile($member_id);

        $this->af->setApp("profile", $profile);



        return 'other_treasure';
    }
}

?>
