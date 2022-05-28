<?php
    session_start();
    ini_set("display_errors", 1);
    ini_set("display_startup_error", 1);
    error_reporting(E_ALL);

    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'garbage_correcter_ms');

    try{
        $db_connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    catch(PDOException $e){
        echo "Error In Connection" . $e->getmessage();
    }

    // mysqli_connection
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    function clead_input($input){
        $input = trim($input);
        $input = striplashes($input);
        $input = htmlspecialchars($input, ENT_QUOTES, "UTF-8");
        return $input;
    }
?>