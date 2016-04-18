function validateEmail(){
    var productModel = document.forms["purchase_email"]["Product Model"].value;
    var size = document.forms["purchase_email"]["Size"].value;
    var quantity = document.forms["purchase_email"]["Quantity"].value;
    var firstName = document.forms["purchase_email"]["First Name"].value;
    var lastName = document.forms["purchase_email"]["Last Name"].value
    var phoneNumber = document.forms["purchase_email"]["Phone Number"].value;
    var street = document.forms["purchase_email"]["Street"].value;
    var city = document.forms["purchase_email"]["City"].value;
    var state = document.forms["purchase_email"]["State"].value;
    var zipCode = document.forms["purchase_email"]["Zip Code"].value;
    
    var nonNumberPattern = /^[a-zA-Z]+/;
    var phonePattern = /^[0-9]{10}/;
    var zipPattern = /^[0-9]{5}/;

    //checking the product model
    productModel = productModel.toUpperCase();
    if(productModel !== "AP-QUE-II-CUP" 
            && productModel !== "another model")
    {
        alert("Product Model Does Not Exist! (Enter the exact product model)");
        return (false);
    }
 
    //checking the size
    if(!parseInt(size)>0)
    {
        alert("Enter a positive number for size");
        return (false);
    }

    //checking the quantity
    if(!parseInt(quantity)>0)
    {
        alert("Enter a positive number for quantity");
        return (false);
    }
    
    //checking the first name
    if(!nonNumberPattern.test(firstName))
    {
        alert("No numbers allowed in first name");
        return (false);
    }
    
    //checking the last name
    if(!nonNumberPattern.test(lastName))
    {
        alert("No numbers allowed in last name");
        return (false);
    }
    
    //checking the phone number***
    if(!phonePattern.test(phoneNumber))
    {
        alert("Please enter a 10 digit phone number with only numbers");
        return (false);
    }
    
    //checking the street (needs no specific check because it can accept both
    //numbers and letters
    
    //checking the city
    if(!nonNumberPattern.test(city))
    {
        alert("Cities cannot have any numbers in them!");
        return (false);
    }
    
    //checking the state
    if(!nonNumberPattern.test(state))
    {
        alert("States cannot have any numbers in them!");
        return (false);
    }
    
    //checking the zipcode
    if(!zipPattern.test(zipCode))
    {
        alert("Zip codes must only be 5 digits long!");
        return (false);
    }
}
