
<?php
/*
 *  The purpose of this file is to connect to a MYSQL databse with the variable
 *      "pdo". Requiring this file allows other php files to use this pdo variable
*/
    //for production
//    $db_server_name = "instdav.ics.uci.edu";
//    $db_name = "inf124grp17";
//    $db_user_name = "inf124grp17";
//    $db_password = "4ru&RuHU";
    
    //for testing
    $db_server_name = "localhost";
    $db_name = "inf124grp17";
    $db_user_name = "root";
    $db_password = "";
    //connects to the db
    $pdo = new PDO("mysql:host=$db_server_name;dbname=$db_name", $db_user_name, $db_password);
        
    //sets the error mode attribute to throw exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>