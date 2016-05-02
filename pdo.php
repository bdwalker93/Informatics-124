
<?php
/*
 *  The purpose of this file is to connect to a MYSQL databse with the variable
 *      "pdo". Requiring this file allows other php files to use this pdo variable
*/

    //for production
    $db_server_name = "sylvester-mccoy-v3.ics.uci.edu";
    $db_name = "inf124grp17";
    $db_user_name = "inf124grp17";
    $db_password = "4ru&RuHU";

    try 
    {

        //connects to the db
        $conn = new PDO("mysql:host=$db_server_name;dbname=$db_name", $db_user_name, $db_password);

        //sets the error mode attribute to throw exceptions
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch (PDOException $e) {
       exit("DB ERROR!");
    }

?>