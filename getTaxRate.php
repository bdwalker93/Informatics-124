<?php
    //requiring our db variable
    require_once 'pdo.php';
    
    //get the product id number to determine which information to load
    $zipCode = $_GET['zipCode'];
    
    //queries the product_description table for the entire row filled with all of
    //      the product information using a prepared statement
    $sql = 'SELECT *
            FROM tax_rates
            WHERE zip_code = :zipCode';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':zipCode', $zipCode);
    $stmt->execute();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //returns city, state
    echo $info['tax_rate'].",".$info['tax_region'];
?>

<?php
    $conn = null;
?>  