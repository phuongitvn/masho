<?php
/**
 *  M_UrlHandler.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  URLHandler class.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_UrlHandler extends Ethna_UrlHandler
{
    /** @var    array   Action Mapping */
    /*
    var $action_map = array(
    	'index' => array(
    		'/reg' => array(
    			'action' => 'reg'
    		)
    	),
    );
    */

    /**
     *  get M_UrlHandler class instance.
     *
     *  @access public
     */
    function &getInstance($class_name = null)
    {
        $instance =& parent::getInstance(__CLASS__);
        return $instance;
    }

    // {{{ normalize gateway request method.
    /**
     *  normalize request(via user defined gateway)
     *
     *  @access private
     */
    //function _normalizeRequest_User($http_vars)
    //{
    //    return $http_vars;
    //}
    // }}}

    // {{{ generate gateway path method.
    /**
     *  generate path(via user defined gateway)
     *
     *  @access private
     */
    /*
    function _getPath_User($action, $param)
    {
        return array("/user", array());
    }
     */
    // }}}

    // {{{ filter 
    // }}}

    function requestToAction($http_vars)
    {
    	die('mosi mosi');
        if (isset($http_vars['__url_handler__']) == false
            || isset($this->action_map[$http_vars['__url_handler__']]) == false) {
            return array();
        }
        $url_handler = $http_vars['__url_handler__'];
        $action_map = $this->action_map[$url_handler];
        // parameter fix
        $method = sprintf("_normalizeRequest_%s", ucfirst($url_handler));
        if (method_exists($this, $method)) {
            $http_vars = $this->$method($http_vars);
        }
        // normalize
        if (isset($http_vars['__url_info__'])) {
            $path = $http_vars['__url_info__'];
        } else {
            $path = "";
        }
        list($path, $is_slash) = $this->_normalizePath($path);
        $mapper = Net_URL_Mapper::getInstance($http_vars['__url_handler__']);
        foreach ($this->action_map[$http_vars['__url_handler__']] as $key => $value) {
            $mapper->connect($key, $value);
        }
        $result = $mapper->match($path);
        $http_vars = $this->buildActionParameter($http_vars, $result['action']);
        unset($result['action']);
        $http_vars = array_merge($http_vars, $result);
        return $http_vars;
    }
}

// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
?>