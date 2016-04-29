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
         
         <form action="order_form_validation.php" method="get">
            <!--Handles all of the contents on the left side of the page-->
           <div class="left_container" >

               <!--This is for product details-->
               <div class="product_information_container">
                   <hr>
                   <h2>Product Information</h2>
                   <hr>

                   <table class="product_table">
                        <tr class="product_table_row" >
                           <td class="image_col" colspan="2">
                               <?php      
                                       echo "<img class='product_image' src='".$productInfo['image_path']."' alt='This is an image of the: ".$productInfo['brand']." - ".$productInfo['name']."'>";
                               ?>                        
                           </td>

                       </tr>

                       <tr class="product_table_row">
                           <td class="product_table_col">
                               Product Brand 
                           </td>
                           <td class="product_table_col">
                               <label><?php echo $productInfo['brand']; ?></label>
                           </td>
                       </tr>


                       <tr class="product_table_row">
                           <td class="product_table_col">
                               Product Name 
                           </td>
                           <td class="product_table_col">
                               <label><?php echo $productInfo['name']; ?></label>
                           </td>
                       </tr>

                       <tr class="product_table_row">
                           <td class="product_table_col">
                               Product ID 
                           </td>
                           <td class="product_table_col">
                               <label>#<?php echo $productInfo['id'] ?></label>
                           </td>
                       </tr>

                       <tr class="product_table_row">
                           <td class="product_table_col">
                               Size
                           </td>
                           <td class="product_table_col">
                               <input type="text" name="size" required>
                           </td>
                       </tr>


                       <tr class="product_table_row">
                           <td class="product_table_col">
                               Quantity
                           </td>
                           <td class="product_table_col">
                               <input type="text" name="quantity" required>
                           </td>
                       </tr>                           
                   </table>
               </div>

               <!--This is for personal details-->    
               <div class="personal_information_container">
                   <hr>
                   <h2>Personal Information</h2>
                   <hr>

                   <table class="personal_table">
                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               First name 
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="first_name" required>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Last name 
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="last_name" required>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Phone Number
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="phone_number" required>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Street
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="street" required>
                           </td>
                       </tr>

                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Zip Code
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="zip_code" required>
                           </td>
                       </tr>

                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               City
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="city" required>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               State 
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="state" required>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Shipping Method
                           </td>
                           <td class="shipping_col">
                               <div style="float: top">
                                   <input type="radio" name="Shipping Info" value="Overnight">Overnight ($20)<br>
                               </div>
                               <div style="float: top">
                                   <input type="radio" name="Shipping Info" value="2-Day Expedited">2-Day Expedited ($10)<br>
                               </div>
                               <div style="float: top">
                                   <input type="radio" name="Shipping Info" value="6-Day Ground" checked>6-Day Ground (Free)<br>
                               </div>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Credit Card Number
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="credit_card_number" required>
                           </td>
                       </tr>

                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Credit Card Expiration
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="credit_card_expiration" required>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="notes_column">
                               Notes
                           </td>
                           <td class="notes_column">
                               <textarea name="Notes" class="notes" form="purchase_form"></textarea>
                           </td>
                       </tr>
                   </table>
               </div>

           </div>

            <!--This is the right containter-->
           <div class="right_container" >  
               <!--Order summary box-->
               <h3>Order Summary</h3>
               <hr>
               <table class="order_summary_table">
                   <tr class="order_summary_row">
                       <td class="order_summary_col_name">
                           Items:
                       </td>
                       <td class="order_summary_col">
                           $8.06
                       </td>
                   </tr>

                   <tr class="order_summary_row">
                     <td class="order_summary_col_name">
                       Shipping & handling:
                     </td>
                     <td class="order_summary_col">
                       $0.00
                     </td>
                   </tr>

                   <tr class="order_summary_row">
                     <td></td>
                     <td class="order_summary_col"><hr class=""></td>
                   </tr>


                   <tr class="order_summary_row">
                     <td class="order_summary_col_name">
                       Total before tax:
                     </td>
                     <td class="order_summary_col">
                       $8.06
                     </td>
                   </tr>


                   <tr class="order_summary_row">
                     <td class="order_summary_col_name">
                       Estimated tax:
                     </td>
                     <td class="order_summary_col">
                       $0.00
                     </td>
                   </tr>


                   <tr class="order_summary_row">
                     <td class="order_summary_col">
                       Total:
                     </td>
                     <td class="order_summary_col">
                       $8.06
                     </td>
                   </tr>


                   <tr class="order_summary_row">
                     <td colspan="2" class="cell-separator"><hr class="a-spacing-mini a-divider-normal"></td>
                   </tr>

                   <tr>
                     <td class="order_summary_col_name">
                       Order total:
                     </td>
                     <td class="order_summary_col">
                       $0.00
                     </td>
                   </tr>
                </table>
               
                <hr>

                <!--submit button-->
                <div class="submit_button_container">
                    <input class="order_button" type="submit" value="Place Your Order">
                </div>
                    
            </div>  
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