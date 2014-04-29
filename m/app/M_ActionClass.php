<?php
// vim: foldmethod=marker
/**
 *  M_ActionClass.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

// {{{ M_ActionClass
/**
 *  action execution class
 *
 *  @author     {$author}
 *  @package    M
 *  @access     public
 */
class M_ActionClass extends Ethna_ActionClass
{
    /**
     *  authenticate before executing action.
     *
     *  @access public
     *  @return string  Forward name.
     *                  (null if no errors. false if we have something wrong.)
     */
    function authenticate()
    {
        return parent::authenticate();
    }

    /**
     *  Preparation for executing action. (Form input check, etc.)
     *
     *  @access public
     *  @return string  Forward name.
     *                  (null if no errors. false if we have something wrong.)
     */
    function prepare()
    {
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

        $carrierNo = $this->backend->useragent->getAgentType();
        $this->af->setApp('crNo' ,$carrierNo);
//debug
//var_dump($domain);

        $parent = parent::prepare();

        if($parent == ""){

			//メンテナンス状態取得
	        $batchManager = $this->backend->getManager("Batch");
			$mt_flg = $batchManager->getMaintainanceStatus();
			if($mt_flg == 1){
                return 'maintain';
			}
            //mbga　GWチェック
            $ret = Util::fromMbga();
            if($ret == False){
                return 'error_pc';
            }

            //会員登録チェック
            $userManager    = $this->backend->getManager("User");
            $ret = $userManager->existsUser($this->af->get('opensocial_owner_id'));
            if($ret == False){
                return 'error_reg';
            }
        }

        return $parent;
    }

    /**
     *  execute action.
     *
     *  @access public
     *  @return string  Forward name.
     *                  (we does not forward if returns null.)
     */
    function perform()
    {
        return parent::perform();
    }
}
// }}}

?>
