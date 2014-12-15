<?php
function truncate($string, $length = 80, $etc = '...',   $break_words = false, $middle = false){
    if ($length == 0)
        return '';

    if (is_callable('mb_strlen')) {
        if (mb_detect_encoding($string, 'UTF-8, ISO-8859-1') === 'UTF-8') {
            // $string has utf-8 encoding
            if (mb_strlen($string) > $length) {
                $length -= min($length, mb_strlen($etc));
                if (!$break_words && !$middle) {
                    $string = preg_replace('/\s+?(\S+)?$/u', '', mb_substr($string, 0, $length + 1));
                } 
                if (!$middle) {
                    return mb_substr($string, 0, $length) . $etc;
                } else {
                    return mb_substr($string, 0, $length / 2) . $etc . mb_substr($string, - $length / 2);
                } 
            } else {
                return $string;
            } 
        } 
    } 
    // $string has no utf-8 encoding
    if (strlen($string) > $length) {
        $length -= min($length, strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length + 1));
        } 
        if (!$middle) {
            return substr($string, 0, $length) . $etc;
        } else {
            return substr($string, 0, $length / 2) . $etc . substr($string, - $length / 2);
        } 
    } else {
        return $string;
    } 
} 


?>