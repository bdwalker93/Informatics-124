<!DOCTYPE html>
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
        <title>Watch Guyz - Checkout</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="style_sheets/navigation_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/body_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/checkout_style.css">
        
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

         <!--Start of page-->
         
         
         <h1>Checkout</h1>
         

         <!--Handles all of the contents on the left side of the page-->
        <div class="left_container" >
            
            <!--This is for product details-->
           Maybe a product image here
           <br>Maybe a watch size here if aplicable
            <br>maybe a quantity here
             <br> <br>
             
            <!--This is for personal details-->               
            <table class="checkout_table">
                <tr class="checkout_table_row">
                    <td class="checkout_table_col">
                        First name 
                    </td>
                    <td class="checkout_table_col">
                        <input type="text" name="first_name" required>
                    </td>
                </tr>
                <tr class="checkout_table_row">
                    <td class="checkout_table_col">
                        Last name 
                    </td>
                    <td class="checkout_table_col">
                        <input type="text" name="last_name" required>
                    </td>
                </tr>
            </table>
        </div>
         
        <div class="right_container" >  
            <!--Order summary box-->
            <table class="order_summary_table">
                <tr class="">
                    <td class="">
                        Items:
                    </td>
                    <td class="">
                        $8.06
                    </td>
                </tr>

                <tr data-testid="" class="">
                  <td class="">
                    Shipping & handling:
                  </td>
                  <td class="">
                    $0.00
                  </td>
                </tr>

                <tr class="">
                  <td></td>
                  <td class=""><hr class=""></td>
                </tr>


                <tr data-testid="" class="">
                  <td class="">
                    Total before tax:
                  </td>
                  <td class="">
                    $8.06
                  </td>
                </tr>


                <tr data-testid="" class="">
                  <td class="">
                    Estimated tax to be collected:*
                  </td>
                  <td class="">
                    $0.00
                  </td>
                </tr>


                <tr data-testid="" class="">
                  <td class="">
                    Total:
                  </td>
                  <td class="">
                    $8.06
                  </td>
                </tr>


                <tr data-testid="" class="">
                  <td class="">
                    Gift Card:
                  </td>
                  <td class="">
                    -$8.06
                  </td>
                </tr>


                <tr class="">
                  <td colspan="2" class="cell-separator"><hr class="a-spacing-mini a-divider-normal"></td>
                </tr>
                <tr data-testid="">
                  <td class="">
                    Order total:
                  </td>
                  <td class="">
                    $0.00
                  </td>
                </tr>
            </table>
        </div>      			
        
        
         <!--        This is the footer-->
        <footer>
            <ul style="position: fixed; bottom: 0; width: 100%">
            <li><Div style="font-size: 20px;">University of California, Irvine</div></li>
            <li><Div style="font-size: 20px;">Informatics 124/ CS 137</div></li>
            <li style="float:right;">Spring 2016</li>
            </ul>
        </footer>
    </body>
</html>