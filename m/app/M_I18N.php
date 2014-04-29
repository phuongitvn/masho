<?php

class M_I18N extends Ethna_I18N
{
    function setLanguage($locale, $systemencoding = null, $clientencoding = null)
    {
        setlocale(LC_ALL, $locale . ($systemencoding !== null ? "." . $systemencoding : ""));
        /*setlocale(
        	LC_COLLATE | LC_CTYPE | LC_MONETARY | LC_NUMERIC | LC_MESSAGES
        , $locale . ($systemencoding !== null ? "." . $systemencoding : ""));*/

        if ($this->use_gettext) {
            bind_textdomain_codeset($locale, $clientencoding);
            bindtextdomain($locale, $this->locale_dir);
            textdomain($locale);
        }

        $this->locale = $locale;
        $this->systemencoding = $systemencoding;
        $this->clientencoding = $clientencoding;

        //  強制的にメッセージカタログ再生成
        if (!$this->use_gettext) {
            $this->messages = $this->_makeEthnaMsgCatalog();
        }
    }
    function setTimeZone($timezone = 'UTC')
    {
        //   date.timezone 設定は PHP 5.1.0 以降でのみ
        //   利用可能
        //ini_set('date.timezone', $timezone);
    } 
}
?>