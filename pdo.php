
<?php
/*
 *  The purpose of this file is to connect to a MYSQL databse with the variable
 *      "pdo". Requiring this file allows other php files to use this pdo variable
*/
    $db_server_name = "";
    $db_name = "";
    $db_user_name = "";
    $db_password = "";
    
    //connects to the db
    $pdo = new PDO($db_server_name, $db_name,$db_user_name, $db_password);

    //sets the error mode attribute to throw exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>