<?php
/**
 *  Coin/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_CoinConvert extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
    	"opensocial_owner_id" => array(),
		"ss" => array(),
    );

}

/**
 *  coin_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CoinConvert extends M_ActionClass
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
     *  coin_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
    	$userManager = $this->backend->getManager("User");
        $member_id = $this->af->get('opensocial_owner_id');
        $profile = $userManager->getProfile($member_id);
    	$this->af->setApp("profile", $profile);
    	$doi = $this->af->get('doi');
    	if($doi != NULL){
    		$db = $this->backend->getDb();
	        $r = $db->query('START TRANSACTION');
	        if($r == False){
	            return 'error_sys';
	        }
    		switch($doi){
    			case 1:
    				if((int)$profile['coin'] >= 100){   				$ret=$userManager->cointToMoney($member_id,$profile['coin'],$profile['money'],100,1000);
    				}else{
    					return 'coin_cancel';
    				}
    				break;
    			case 2:
    				if((int)$profile['coin'] >= 200){    				$ret=$userManager->cointToMoney($member_id,$profile['coin'],$profile['money'],200,2000);
    				}else{
    					return 'coin_cancel';
    				}
    				break;
    			case 3:
    				if((int)$profile['coin'] >= 400){    				$ret=$userManager->cointToMoney($member_id,$profile['coin'],$profile['money'],400,4000);
    				}else{
    					return 'coin_cancel';
    				}
    				break;
    			case 4:
    				if((int)$profile['coin'] >= 800){    				$ret=$userManager->cointToMoney($member_id,$profile['coin'],$profile['money'],800,8000);
    				}else{
    					return 'coin_cancel';
    				}
    				break;
    			case 5:
    				if((int)$profile['coin'] >= 1000){    				$ret=$userManager->cointToMoney($member_id,$profile['coin'],$profile['money'],1000,10000);
    				}else{
    					return 'coin_cancel';
    				}
    				break;
    		}
    		if($ret === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
        	}
        	$ret = $db->query('COMMIT');
        	if($ret === False){
            	return 'error_sys';
        	}
			$profile_new = $userManager->getProfile($member_id);
			$this->af->setApp("profile_new", $profile_new);
    		return 'coin_complete';
    	}else{
	    	return 'coin_convert';
	    }
		

	}//reload NO END

    
}

?>