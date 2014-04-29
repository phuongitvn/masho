<?php
/**
 *  Treasure/Trap/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  treasure_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_TreasureTrapIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
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
	"tid" => array(),
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
 *  treasure_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_TreasureTrapIndex extends M_ActionClass
{
    /**
     *  preprocess treasure_index action.
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
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {
		$userManager = $this->backend->getManager("User");
		$treasureManager = $this->backend->getManager("Treasure");
		$member_id = $this->af->get('opensocial_owner_id');
		$trId = $this->af->get('tid');
		$this->af->setApp("trId", $trId);

		//自己所持チェック
		$ownChk = $treasureManager->getTrindOwn($member_id,$trId,0);
		$this->af->setApp("ownChk", $ownChk);

		if($ownChk == 0){
			return 'treasure_trap_err';
		}else{

			//お宝個別情報
			$detailInfo = $treasureManager->TrDtInfo($trId);
			$this->af->setApp("detailInfo", $detailInfo);
			//保有護符数
			$has = $userManager->getProfile($member_id);
			$this->af->setApp("has", $has);
			//設定護符数
			$on = $treasureManager->getTrapNum($member_id,$trId);
			$on['trap2num'] = ceil($on['trap2num'] / 2);
			$this->af->setApp("on", $on);
			$max = $this->config->get('maxTrap');
			//最大設定個数算出
			for($i=1;$i<=2;$i++){
				$t="trap".$i."num";
				if($has[$t] >= ($max[$i] - $on[$t])){
					$num[$i] = $userManager->getSetNum(($max[$i] - $on[$t]));
				}else{
					$num[$i] = $userManager->getSetNum($has[$t]);
				}
			}
			$this->af->setApp("num", $num);

	        //リロード対策
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);

			return 'treasure_trap_index';
		}

	}
}

?>
