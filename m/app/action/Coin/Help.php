<?php
/**
 *  Coin/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

class M_Form_CoinHelp extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
    );

}

/**
 *  coin_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CoinHelp extends M_ActionClass
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
	        return 'coin_help';
		

	}//reload NO END

    
}

?>
