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
        
        <script src="checkout.js"></script>

        
    </head>
    <body>
       
         <!--        This is the navigator-->
        <nav>
         <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="meet_the_team.html">Meet The Team</a></li>
            <li style="float:right"><a class="theme_color" href="about.html">About Us</a></li>

        </ul>
        </nav>

         <!--Start of page-->
         
         
         
         <h1>Checkout</h1>
         
         <form name="order_form" id="purchase_form" action="updateOrderdb.php" onsubmit="return order_validation()" method="get">
<table>
 <tr>
     <td class="overall_table">        
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
                               #<label class="product_id"><?php echo $productInfo['id'] ?></label>
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
                               <input style="background-color: #d9d9d9" type="text" name="quantity" value="1" readonly>
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
                               <input id="zip_box" type="text" name="zip_code" onblur="validZip(this.value); getZipInfo(this.value);  updateEntireSummary(<?php echo $productInfo['id'] ?>)" required>
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
                                   <input id="shiping1" type="radio" name="shipping_info" value="Overnight" onclick="updateEntireSummary(<?php echo $productInfo['id'] ?>)">Overnight ($20)<br>
                               </div>
                               <div style="float: top">
                                   <input id="shiping2" type="radio" name="shipping_info" value="2-Day Expedited" onclick="updateEntireSummary(<?php echo $productInfo['id'] ?>)">2-Day Expedited ($10)<br>
                               </div>
                               <div style="float: top">
                                   <input id="shiping3" type="radio" name="shipping_info" value="6-Day Ground" onclick="updateEntireSummary(<?php echo $productInfo['id'] ?>)" checked>6-Day Ground (Free)<br>
                               </div>
                           </td>
                       </tr>


                       <tr class="personal_table_row">
                           <td class="personal_table_col">
                               Credit Card Number
                           </td>
                           <td class="personal_table_col">
                               <input type="text" name="credit_card_number" onblur="detectCardType(this.value)"required>
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
                               <textarea  name="notes" class="notes" form="purchase_form"></textarea>
                           </td>
                       </tr>
                   </table>
               </div>

           </div>
</td>  
<td class="overall_table">
            <!--This is the right containter-->
           <div class="right_container" >  
               <!--Order summary box-->
               <h3>Order Summary</h3>
               <hr>
               <table class="order_summary_table">
                   <tr class="order_summary_row">
                       <td class="order_summary_col_name">
                           Item:
                       </td>
                       <td class="order_summary_col">
                           $<label class="item_price_label"><?php echo $productInfo['price']; ?></label>
                       </td>
                   </tr>

                   <tr class="order_summary_row">
                     <td class="order_summary_col_name">
                       Shipping & handling:
                     </td>
                     <td class="order_summary_col">
                         $<label class="shipping_label">0.00</label>
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
                            $<label class="before_tax_label"><?php echo $productInfo['price']; ?></label>
                     </td>
                   </tr>


                   <tr class="order_summary_row">
                     <td class="order_summary_col_name">
                       Estimated tax:
                     </td>
                     <td class="order_summary_col">
                         $<label class="tax_label">0.00</label>
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
                        $<label class="order_total"><?php echo $productInfo['price']; ?></label>
                     </td>
                   </tr>
                </table>
               
                <hr>
                
                <!--For the product id-->
                <input name="product_id" type="hidden" value="<?php echo $productIdNumber ?>">

                <!--For the total cost-->
                <input id="hidden_order_total" name="order_cost" type="hidden" value="-9999">

                <!--For ensuring zip is valid-->
                <input name="tax_valid" type="hidden" value="no">

                <!--submit button-->
                <div class="submit_button_container">
                    <input class="order_button" type="submit" value="Place Your Order">
                </div>
                    
            </div>  
            
            
</td>
</tr>
</table>
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
 