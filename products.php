<!DOCTYPE html>
<!--
    This will be the page that has all of the watches on it

        Display a list of products (at least 10) available for sale in a table 
        with multiple rows and column, where each product is shown within a 
        separate cell.

        Display an image for each product available for sale in each cell.

        Display the price and other key information (e.g., color, material, etc.)
        associated with each product in the corresponding table cell.

        The user should be able to choose a product from this table by clicking 
        on the corresponding image, which should lead to a new page that provides 
        additional details about the product, e.g., more images, detailed 
        description, etc. 
-->
<html>
    <head>
        <title>Products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="style_sheets/navigation_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/body_style.css">
        <link rel="stylesheet" type="text/css" href="style_sheets/products_style.css">
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
        
        <!--        Page contents-->
        <h1>Men's Watches</h1>
        
        <?php
    require_once 'pdo.php';
    
    $sql = 'SELECT *
            FROM product_descriptions';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $productInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

echo "<table align = 'center'> ";
$i = 0;
if (count($productInfo) > 0) {
    // output data of each row
    echo "<tr>";
    foreach($productInfo as $row) {
        if ($i%3 == 0 && $i> 0) echo "</tr>";
        if ($i%3 == 0 && $i> 0) echo "<tr>";
        
        echo '<td class="item_cell">';
        echo "<a href='product_description.php?productID=$row[id]' >";
        echo "<img class = 'product_image' src=$row[image_path] alt=$row[name]>  <br> ";
        echo "<b> $row[brand] </b> <br> $row[name] <br> <span class='price_text'> $$row[price]</span> ";
        echo '</a>';
        echo "</td>";
        
        $i++;
    }
echo "</tr>";
} else {
    echo "0 results";
}

echo "</table>";



?>
        

        
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
