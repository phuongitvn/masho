<?php
/**
 *  Treasure/Trap/Complete.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */


class M_Form_TreasureTrapComplete extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

	"opensocial_owner_id" => array(),
	"tid" => array(),
	"ssid" => array(),
	"wh" => array(),
	"num" => array(),
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
class M_Action_TreasureTrapComplete extends M_ActionClass
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
     *  Complete action implementation.
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
        $ss_id = $this->af->get('ssid');
        $num = $this->af->get('num');
        $wh = $this->af->get('wh');
		$this->af->setApp("wh", $wh);

		//���ȏ����`�F�b�N
		$ownChk = $treasureManager->getTrindOwn($member_id,$trId,0);
		$this->af->setApp("ownChk", $ownChk);
		if($ownChk == 0){
			return 'treasure_trap_err';
		}

        $isReload = $userManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
            //return 'error_reload';
        }else{

			//�ۗL�아��
			$has = $userManager->getProfile($member_id);
  			//�g�����U�N�V�����J�n
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
			//t_user���X�V
	        $table  = " t_user ";
			$column = "trap".$wh."num";
			$status = $has[$column] - $num;
			$where  = " memberid = '".$member_id."'";
	        $ret1 = $userManager->updateColumn($table ,$column ,$status, $where);
			//t_treasure���X�V
			$ret2 = $treasureManager->updateTrStatus($member_id,$trId,9,$wh,$num);
			//ssid�o�^
	        $ret3 = $userManager->updSession($member_id ,$ss_id);
	        if($ret1 === False || $ret2 === False || $ret3 === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //�g�����U�N�V�����I��
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
		}

		return 'treasure_trap_complete';

	}
}

?>
