<?php
    //requiring our db variable
    require_once 'pdo.php';
    
    //we need to do a get/post rereival for the product type so we can query the 
    //      db
    
    //queries the product_description table for the entire row filled with all of
    //      the product information
    $query = $pdo->query("Select * from product_descriptions");
    $productInfo = $query->fetch(PDO::FETCH_ASSOC);    
?>

<html>
    <head>
        <title>
        <?php            
            //outputting the title here
            echo $productInfo['product_title'];
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
                echo $productInfo['product_brand'];
            ?>
        </h1>
        <h2>
            <?php 
                //pulls the product_name from the db
                echo $productInfo['product_name']; 
            ?>
        </h2>
        
        <img class="product_image" src="images/product_images/samsung.jpg" alt="This can be a background watch picture">

        <div class="description_text">
            <?php      
                //pulls the product_description from the db 
                echo $productInfo['product_description'];
            ?>
        </div>

        <div class="specs_text">
            
            <?php 
                //pulls the product_price from the db
                echo "Price: $".$productInfo['product_price']; 
            
                echo "<br>Product Number: ".$productInfo['product_id']; 

            ?>
        </div>
               
        
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