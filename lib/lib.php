<?php

 function generateString($length)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        for($i = 0; $i < $length; $i++)
        {
            str_shuffle($chars);
            $result .= $chars[rand(0, (strlen($chars) - 1))];
        }
        return $result;
    }
    
    function getExcerpt($str, $length)
    {
        if (strlen($str) > $length)
        {
            $pos = strpos($str, " ", $length);
            return '"'.substr($str, 0, $pos).'... "';
        }
        return '"'.$str.'"';
    }
    
    function cleanVar($var)
    {
        return ($var = stripslashes(htmlspecialchars($var)));
    }

    function cleanArray(array $array)
    {
        foreach ($array as &$var)
            $var = cleanVar($var);
        return $array;
    }
        
    function isSetVar($var)
    {
        if (isset($var) && !empty($var))
            return true;
        return false;
    }
        
    function isSetArray(array $array)
    {
        foreach ($array as $var)
        {
            if (isSetVar($var) == false)
                return false;
        }
        return true;
    }
    
        function restricLogin(){
        
        if(!isset($_SESSION['auth'])) {
            $_SESSION['flash']['danger'][] = "Accès interdit, authentification requise";
            header('Location:index.php?p=login');
            exit();
        }
    }
    
    
?>
