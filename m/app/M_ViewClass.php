<?php
// vim: foldmethod=marker
/**
 *  M_ViewClass.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

// {{{ M_ViewClass
/**
 *  View class.
 *
 *  @author     {$author}
 *  @package    M
 *  @access     public
 */
class M_ViewClass extends Ethna_ViewClass
{
    // {{{ forward
    /**
     *  [オーバーライド] 遷移名に対応する画面を出力する
     *
     *  キャリア別テンプレートに対応するために用意
     *
     *  @access public
     */
    function forward() {

        $renderer =& $this->_getRenderer();

        /*
         * キャリア別テンプレートが存在すればそちらを優先する
         */
        list($name, $ext) = explode('.', $this->forward_path);
        $carrierNo = $this->backend->useragent->getAgentType();

        $carrierName = $this->config->get('carrier');
        $carrier = $carrierName[$carrierNo];

        $this->af->setApp("carrier_no",$carrierNo);

        //キャリア毎のテンプレート共通化より、SOFTBANKのみテンプレート切り替え
        if($carrierNo != USER_AGENT_DOCOMO){
            $tpl = $renderer->template_dir . $name . "_{$carrier}." . $ext;
            if (file_exists($tpl)) {
                $this->forward_path = $tpl;
                $this->af->setApp("templatePath", "_" .$carrier);
            }
        }

        //renderer再取得
        $renderer =& $this->_getRenderer();
        $this->_setDefault($renderer);
        $renderer->engine->force_compile = true;
        $test = $renderer->perform($this->forward_path, TRUE);
        //var_dump($renderer);
        //file_put_contents('/home/tsuge/tmp/log', $test);
        echo $test;
    }

    // }}}

    /**
     *  set common default value.
     *
     *  @access protected
     *  @param  object  M_Renderer  Renderer object.
     */
    function _setDefault(&$renderer)
    {
    }

}
// }}}

?>