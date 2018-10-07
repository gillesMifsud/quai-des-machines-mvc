<?php

 class PDOFactory
    {
      public static function getConnection()
      {
        $dsn = 'mysql:dbname=quai_machines;host=localhost';
        $user = 'root';
        $pass = '';
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        $db = new PDO($dsn,$user,$pass,$options);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
      }
    }
?>
