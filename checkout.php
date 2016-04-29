<!DOCTYPE html>
<!--
    This will be the detailed information for the "" watch
        The user should be able to choose a product from this table by clicking
        on the corresponding image, which should lead to a new page that provides 
        additional details about the product, e.g., more images, detailed 
        description, etc.     
        On the detailed description page, the user should be able to order a 
        product by filling a form. The form should allow the user to enter the 
        product identifier, quantity, first name, last name, phone number, 
        shipping address, shipping method (e.g., overnight, 2-days expedited,
        6-days ground), credit card information, and anything else that you 
        think makes sense for your business.
-->
<html>
    <head>
        <title>Motorola - Moto Watch </title>
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
        <h1>Motorola</h1>
        <h2>Moto Watch</h2>
        
        <img class="product_image" src="images/product_images/motorola.png" alt="This can be a background watch picture">

        <div class="description_text">
        The Moto 360 is the most attractive Android Wear device you can buy right now, with a design that's more reminiscent of a regular watch. Even so, it suffers from poor battery life, just like other early smartwatches, and it has a higher price, too.
        </div>

        <div class="specs_text">
            Price: $300
            <br>Product Model: MOTO-WATCH
        </div>
        
        <form name="purchase_email" id="purchase_form" action="MAILTO:orders@thewatchguyz.com?subject=Watch%20Order" onsubmit="return validateEmail()" method="post" enctype="text/plain"> 
            <table>
                <caption style="font-size:30px">ORDER FORM</caption>
                <tr class="order_product_details">
                    <td>
                        Product Model<br>
                        <input type="text" name="Product Model" required>
                    </td>
                    <td>
                        Size<br>
                        <input type="text" name="Size" required>
                    </td>
                    <td>
                        Quantity<br>
                        <input type="text" name="Quantity" required> 
                    </td>
                </tr>
                <tr class="order_contact_details">
                    <td>
                        First Name<br>
                        <input type="text" name="First Name" required>
                    </td>
                    <td>
                        Last Name<br>
                        <input type="text" name="Last Name" required>
                    </td>
                     <td>
                         Phone<br>
                        <input type="text" name="Phone Number" required>
                    </td>
                </tr>

                <tr class="order_address_details">
                    <td> Street<br>
                        <input type="text" name="Street" required>
                    </td>
                    <td>
                        City<br>
                        <input type="text" name="City" required>
                    </td>
                    <td>
                        <ul>
                            <li>State<br><input type="text" name="State" size="5" required></li>
                            <li style="padding-left: 22px">Zip Code<br><input type="text" name="Zip Code" size="3" required></li>
                        </ul>
                    </td>

                </tr>
                
                <tr>
                    <td>
                        <div style="text-align: center; padding-bottom: 8px">Shipping Method</div>
                        <input type="radio" name="Shipping Info" value="Overnight">Overnight ($20)<br>
                        <input type="radio" name="Shipping Info" value="2-Day Expedited">2-Day Expedited ($10)<br>
                        <input type="radio" name="Shipping Info" value="6-Day Ground" checked>6-Day Ground (Free)<br>
                    </td>
                    <td colspan="2" style="text-align: center">
                        Notes<br>
                        <textarea name="Notes" form="purchase_form" style="margin: 0px; height: 106px; width: 356px;"></textarea>
                    </td>
                </tr>
                
                <tr class="credit_card_details">
                    <td colspan="3"><label style="padding-right: 5px; font-size: 20px">Credit Card Number </label><input type="text" name="Credit Card Number" required style="width: 40%"></td>
                </tr>   
                
                <tr>
                    <td colspan="3" class="submit_cell"><input type="submit" style="width:300px;height:40px;"></td>
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