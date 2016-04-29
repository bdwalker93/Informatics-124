<?php
//    //requiring our db variable
//    require_once 'pdo.php';
//    
//    //get the product id number to determine which information to load
//    $productIdNumber = $_GET['productID'];
//    
//    //queries the product_description table for the entire row filled with all of
//    //      the product information using a prepared statement
//    $sql = 'SELECT *
//            FROM product_descriptions
//            WHERE id = :productIdNumber';
//    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':productIdNumber', $productIdNumber);
//    $stmt->execute();
//    $productInfo = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php 
    require_once 'pdo.php';
    
    $orderID = $_GET['orderID'];
    $sql = "SELECT *
            FROM order_information
            WHERE order_id = :orderID"; 
    $stmt = $conn -> prepare($sql);
    $stmt->bindParam(':orderID', $orderID);
    $stmt->execute();
    $customerInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    /*foreach($conn->query($sql) as $row) {
        print $customerInfo['order_id'] ."&nbsp";
        print $customerInfo['first_name'] . "&nbsp";
        print $customerInfo['product_id'] . "&nbsp";
        print $customerInfo['shipping_speed'] . "</br>";
    }*/
    

?>
<html>
    <head>
        <title>Order Confirmation</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="style_sheets/navigation_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/body_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/confirmation_style.css">
       
        
    </head>
    <body>
       
         <!--        This is the navigator-->
        <nav>
         <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="meet_the_team.html">Meet The Team</a></li>
            <li style="float:right"><a class="theme_color" href="about.html">About Us</a></li>

        </ul>
        </nav>
         
<!--         Start of page-->
        <h1>
            <?php   
                
                echo "Order Confirmation";
            ?>
        </h1>
        <h2>
            <?php 
                
                echo "Hello " . $customerInfo['first_name'] . ",";
            ?>
        </h2>
        <div>
            <?php
                echo "Thank you for shopping at Watch Guyz. We would like to confirm your order and "
                 . " let you know that your order is on the way. Your order number and delivery date is display below. If you "
                        . "would like to view or change the status of your order please contact us on Watch Guyz.";
                ?>
        </div>
        <br>
        <div class="box">
            <br>
        </div>

        <table>
            <tr>
                <td>
                    <?php
                        echo"The order was sent to :" . "<div style='color:red;'>". $customerInfo['first_name'] ."</div>". "<br>";
                        //print"\r\n";
                        echo"Order Number: #" . $customerInfo['order_id'];
                        echo"The order was sent to :" . $customerInfo['street'].$customerInfo['city'] . $customerInfo['state']. $customerInfo['zip_code']. "<br>";                    ?>
                </td>
                <td>
                    <?php
                        //echo"Expected delivery date on:" . "<br>";
                        //echo "date etc" . "<br>";
                        echo "Shipping Speed: " . $customerInfo['shipping_type']. "<br>";
                        echo "speed of shpping";
                        
                        
                        
                    ?>
                </td>

            </tr>

        </table>
        <hr/>
        <br>
        <table>
            <tr>
                <td>
                    <p>picture of the product that was ordered</p>
                </td>
                <td>
                    <p>description  load</p>
                </td>
                <td>
                    <p>price</p>
                </td>
            </tr>
        </table>

        <br>
        <br>

         <!--        This is the footer-->
        <footer>
            <ul>
            <li><Div style="font-size: 20px;
                     ">University of California, Irvine</div></li>
            <li><Div style="font-size: 20px;">Informatics 124/ CS 137</div></li>
            <li style="float:right;">Spring 2016</li>
            </ul>
        </footer>
        <?php
        $conn = null;
        ?>
    </body>
</html>