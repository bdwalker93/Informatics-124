<?php

 //load db variable
    require_once 'pdo.php';
    
    //product info
    $productID = $_GET['product_id'];
    $size = $_GET['size'];
    $quantity = $_GET['quantity'];
    
    //personal info
    $firstName = $_GET['first_name'];
    $lastName = $_GET['last_name'];
    $phoneNumber = $_GET['phone_number'];
    $street = $_GET['street'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zipCode = $_GET['zip_code'];
    
    //order details
    $orderCost = $_GET['order_cost'];
    $shippingType = $_GET['shipping_info'];
    $creditCardNum = $_GET['credit_card_number'];
    $creditCardExpr = $_GET['credit_card_expiration'];
    $notes = $_GET['notes'];
       
    //adds order to db
    $sqlInsert = "INSERT 
            INTO order_information(product_id,  order_cost,  size,  quantity,  first_name,  last_name,  phone_number,  street,  city,  state,  zip_code,  shipping_type,  credit_card_number,  credit_card_expiration,  notes)
                           VALUES(:product_id, :order_cost, :size, :quantity, :first_name, :last_name, :phone_number, :street, :city, :state, :zip_code, :shipping_type, :credit_card_number, :credit_card_expiration, :notes)
            "; 
    $stmtInsert = $conn -> prepare($sqlInsert);
    $stmtInsert->bindParam(':product_id', $productID);
    $stmtInsert->bindParam(':order_cost', $orderCost);
    $stmtInsert->bindParam(':size', $size);
    $stmtInsert->bindParam(':quantity', $quantity);
    $stmtInsert->bindParam(':first_name', $firstName);
    $stmtInsert->bindParam(':last_name', $lastName);
    $stmtInsert->bindParam(':phone_number', $phoneNumber);
    $stmtInsert->bindParam(':street', $street);
    $stmtInsert->bindParam(':city', $city);
    $stmtInsert->bindParam(':state', $state);
    $stmtInsert->bindParam(':zip_code', $zipCode);
    $stmtInsert->bindParam(':shipping_type', $shippingType);
    $stmtInsert->bindParam(':credit_card_number', $creditCardNum);
    $stmtInsert->bindParam(':credit_card_expiration', $creditCardExpr);
    $stmtInsert->bindParam(':notes', $notes);
    $stmtInsert->execute();

    
    //gets the order number of the last entry
    $sqlID = "SELECT order_id 
              FROM order_information
              ORDER BY order_id DESC
              LIMIT 1;";
    
    $stmtID = $conn -> prepare($sqlID);
    $stmtID->execute();
    $orderID = $stmtID->fetch(PDO::FETCH_ASSOC);
    
    header("Location: confirmation.php?orderID=".$orderID['order_id']);
    exit;
       
    ?>