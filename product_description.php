<?php
    //requiring our db variable
    require_once 'pdo.php';
    
    //get the product id number to determine which information to load
    $productIdNumber = $_GET['productID'];
    
    //queries the product_description table for the entire row filled with all of
    //      the product information using a prepared statement
    $sql = 'SELECT *
            FROM product_descriptions
            WHERE id = :productIdNumber';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productIdNumber', $productIdNumber);
    $stmt->execute();
    $productInfo = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <title>
        <?php            
            //outputting the title here
            echo $productInfo['title'];
        ?>
        </title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="style_sheets/navigation_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/body_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/product_description_style.css">
        
        <script src="email_validation.js"></script>

        
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
                //pulls the product_brand from the db
                echo $productInfo['brand'];
            ?>
        </h1>
        <h2>
            <?php 
                //pulls the product_name from the db
                echo $productInfo['name']; 
            ?>
        </h2>
        
        <?php      
                echo "<img class='product_image' src='".$productInfo['image_path']."' alt='This is an image of the: ".$productInfo['brand']." - ".$productInfo['name']."'>";
        ?>
        
        <div class="description_text">
            <?php      
                //pulls the product_description from the db 
                echo $productInfo['description'];
            ?>
        </div>

        <div class="specs_text">
            
            <?php 
                //pulls the product_price from the db
                echo "Price: $".$productInfo['price']; 
            
                echo "<br>Product ID: #".$productInfo['id']; 

            ?>
        </div>
         
        <!--Checkout button linking to checkout page-->
        <form class="checkout_button_form" action="checkout.php">
            <?php
                echo "<input type='hidden' name='productID' value='".$productIdNumber."'>";
            ?>
            <input class="checkout_button" type="submit" value="Buy It Now!">
        </form>
        
         <!--        This is the footer-->
        <footer>
            <ul>
            <li><Div style="font-size: 20px;">University of California, Irvine</div></li>
            <li><Div style="font-size: 20px;">Informatics 124/ CS 137</div></li>
            <li style="float:right;">Spring 2016</li>
            </ul>
        </footer>
    </body>
</html>