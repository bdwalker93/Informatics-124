function validateEmail(){
    var productModel = document.forms["purchase_email"]["Product Model"].value;
    var size = document.forms["purchase_email"]["Size"].value;
    var quantity = document.forms["purchase_email"]["Quantity"].value;
    var firstName = document.forms["purchase_email"]["First Name"].value;
    var lastName = document.forms["purchase_email"]["Last Name"].value
    var phoneNumber = document.forms["purchase_email"]["Phone Number"].value;
//    var street = document.forms["purchase_email"]["Street"].value;
    var city = document.forms["purchase_email"]["City"].value;
    var state = document.forms["purchase_email"]["State"].value;
    var zipCode = document.forms["purchase_email"]["Zip Code"].value;
    var creditCardNumber = document.forms["purchase_email"]["Credit Card Number"].value;
    
    var nonNumberPattern = /^[a-zA-Z]+/;
    var phonePattern = /^[0-9]{10}/;
    var zipPattern = /^[0-9]{5}/;
    var creditPattern = /^[0-9]{16}/;

    //checking the product model
    productModel = productModel.toUpperCase();
    if(productModel !== "AP-QUE-II-CUP" 
            && productModel !== "ROYAL-OAK-OFFSHORE"
            && productModel !== "IWATCH"
            && productModel !== "FERERRI"
            && productModel !== "WBC"
            && productModel !== "SPIRIT-OF-BIG-BANG"
            && productModel !== "S2-SMART-WATCH"
            && productModel !== "MOTO-WATCH"
            && productModel !== "SIENNA"
            && productModel !== "MR-BRAINWASH")
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
    
    //validating the credit card number
    if(!creditPattern.test(creditCardNumber))
    {
        //we could do another check in here to make sure it is a legitamate credit 
        //  card, but it will be hard for people to test (since they probably dont
        //  want to find a valid credit card number
//        var sum = 0;
//        for (var i = 0; i < val.length; i++) {
//            var intVal = parseInt(val.substr(i, 1));
//            if (i % 2 == 0) {
//                intVal *= 2;
//                if (intVal > 9) {
//                    intVal = 1 + (intVal % 10);
//                }
//            }
//            sum += intVal;
//        }
//        return (sum % 10) == 0;
//    
        alert("Credit card number must be 16 digits long!");
        return (false);
    }
}

//AJAX function
function getZipInfo(zipCode){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function()
    {
        //4== finished and 200 means good
        if(xhr.readyState === 4 && xhr.status === 200)
        {
            //gets the response
            var result = xhr.responseText;
           
           //splits the response to city and state
            var ar = result.split(",");
            
            //makes sure user didnt aalready type something in city field
            if(document.forms["order_form"]["city"].value ==="")
                document.forms["order_form"]["city"].value = ar[0];
            
            //makes sure user didnt aalready type something in state field
            if(document.forms["order_form"]["state"].value ==="")
                document.forms["order_form"]["state"].value = ar[1];
        }
    };
    
    xhr.open("GET","getCityState.php?zipCode=" + zipCode, true);
    xhr.send();
}


function updateShipping(type){
    var shippingCost = "-1";
    
    if(type === "Overnight")
        shippingCost = "20.00";
    else if(type === "2-Day Expedited")
        shippingCost = "10.00";
    else if(type === "6-Day Ground")
        shippingCost = "0.00";

    //sets the order summary value
    document.getElementsByClassName("tax_label")[0].innerHTML = shippingCost;
    
}
