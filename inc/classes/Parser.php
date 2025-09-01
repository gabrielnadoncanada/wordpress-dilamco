<?php
namespace Architronix;

class Parser{
    public $string;

    public function __construct($string) {
        defined('HDOM_TYPE_ELEMENT')    || define('HDOM_TYPE_ELEMENT', 1);
        defined('HDOM_TYPE_COMMENT')    || define('HDOM_TYPE_COMMENT', 2);
        defined('HDOM_TYPE_TEXT')       || define('HDOM_TYPE_TEXT', 3);
        defined('HDOM_TYPE_ENDTAG')     || define('HDOM_TYPE_ENDTAG', 4);
        defined('HDOM_TYPE_ROOT')       || define('HDOM_TYPE_ROOT', 5);
        defined('HDOM_TYPE_UNKNOWN')    || define('HDOM_TYPE_UNKNOWN', 6);
        defined('HDOM_QUOTE_DOUBLE')    || define('HDOM_QUOTE_DOUBLE', 0);
        defined('HDOM_QUOTE_SINGLE')    || define('HDOM_QUOTE_SINGLE', 1);
        defined('HDOM_QUOTE_NO')        || define('HDOM_QUOTE_NO', 3);
        defined('HDOM_INFO_BEGIN')      || define('HDOM_INFO_BEGIN', 0);
        defined('HDOM_INFO_END')        || define('HDOM_INFO_END', 1);
        defined('HDOM_INFO_QUOTE')      || define('HDOM_INFO_QUOTE', 2);
        defined('HDOM_INFO_SPACE')      || define('HDOM_INFO_SPACE', 3);
        defined('HDOM_INFO_TEXT')       || define('HDOM_INFO_TEXT', 4);
        defined('HDOM_INFO_INNER')      || define('HDOM_INFO_INNER', 5);
        defined('HDOM_INFO_OUTER')      || define('HDOM_INFO_OUTER', 6);
        defined('HDOM_INFO_ENDSPACE')   || define('HDOM_INFO_ENDSPACE', 7);

        defined('DEFAULT_TARGET_CHARSET') || define('DEFAULT_TARGET_CHARSET', 'UTF-8');
        defined('DEFAULT_BR_TEXT')      || define('DEFAULT_BR_TEXT', "\r\n");
        defined('DEFAULT_SPAN_TEXT')    || define('DEFAULT_SPAN_TEXT', ' ');
        defined('MAX_FILE_SIZE')        || define('MAX_FILE_SIZE', 600000);
        defined('HDOM_SMARTY_AS_TEXT')        || define('HDOM_SMARTY_AS_TEXT', 1);

        $this->string = $this->str_get_html($string);
    }

    private function str_get_html(
        $str,
        $lowercase = true,
        $forceTagsClosed = true,
        $target_charset = DEFAULT_TARGET_CHARSET,
        $stripRN = true,
        $defaultBRText = DEFAULT_BR_TEXT,
        $defaultSpanText = DEFAULT_SPAN_TEXT)
    {
        $dom = new Document(
            null,
            $lowercase,
            $forceTagsClosed,
            $target_charset,
            $stripRN,
            $defaultBRText,
            $defaultSpanText
        );
    
        if (empty($str) || strlen($str) > MAX_FILE_SIZE) {
            $dom->clear();
            return false;
        }
    
        return $dom->load($str, $lowercase, $stripRN);
    }

    public static function dump_html_tree($node, $show_attr = true, $deep = 0){
        $node->dump($node);
    }
}