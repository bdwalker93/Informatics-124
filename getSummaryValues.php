<?php
    //load db variable
    require_once 'pdo.php';
    //getting orderID to match with the database
    $productID = $_GET['productID'];
    $zipCode = $_GET['zipCode'];
    $shippingCost = $_GET['shippingCost'];
    
    //query to get customer information base on the orderID number and join it wiht productID to get product description and image.
    $sqlProduct = "SELECT *
            FROM product_descriptions
            WHERE id = :productID"; 
    
    $sqlTax = "SELECT *
            FROM tax_rates
            WHERE zip_code = :zipCode";
    
    //getting product price
    $stmtProduct = $conn -> prepare($sqlProduct);
    $stmtProduct->bindParam(':productID', $productID);
    $stmtProduct->execute();
    $infoProduct = $stmtProduct->fetch(PDO::FETCH_ASSOC);

    //getting the tax rate
    $stmtTax = $conn -> prepare($sqlTax);
    $stmtTax->bindParam(':zipCode', $zipCode);
    $stmtTax->execute();
    $infoTax = $stmtTax->fetch(PDO::FETCH_ASSOC);
    
    $total = ($infoProduct['price'] + ($infoProduct['price'] * $infoTax['tax_rate'])) + $shippingCost;
    $subTotal = ($infoProduct['price'] + $shippingCost);
    
    //returns city, state
    echo $infoProduct['price'].",".$shippingCost.",".sprintf("%.2f", $subTotal).",".sprintf("%.2f", $total);
?>