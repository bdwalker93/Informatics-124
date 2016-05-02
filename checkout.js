function order_validation(){    
    //checking the product info
    var size = document.forms["order_form"]["size"].value;
    var quantity = document.forms["order_form"]["quantity"].value;
    
//     //checking the size
//    if(!parseInt(size)>0)
//    {
//        alert("Enter a positive number for size");
//        return false;
//    }

    //checking the quantity
    if(!parseInt(quantity)>0)
    {
        alert("Enter a positive number for quantity");
        return false;
    }
        
    var firstName = document.forms["order_form"]["first_name"].value;
    var lastName = document.forms["order_form"]["last_name"].value
    var phoneNumber = document.forms["order_form"]["phone_number"].value;
//    var street = document.forms["purchase_email"]["street"].value;
    var city = document.forms["order_form"]["city"].value;
    var state = document.forms["order_form"]["state"].value;
    var zipCode = document.forms["order_form"]["zip_code"].value;
    var creditCardNumber = document.forms["order_form"]["credit_card_number"].value;
    var creditCardExpiration = document.forms["order_form"]["credit_card_expiration"].value;
    
    var nonNumberPattern = /^[a-zA-Z]+/;
    var phonePattern = /^[0-9]{10}$/;
    var zipPattern = /^[0-9]{5}$/;
    var statePattern = /^[a-zA-z]{2}$/;
    var creditPattern = /^[0-9]{16}$/;
    var creditExprPattern = /^([0-9]{2}[//][0-9]{2})$/;
    
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

    
    //checking the city
    if(!nonNumberPattern.test(city))
    {
        alert("Cities cannot have any numbers in them!");
        return (false);
    }
    
    //checking the state
    if(!statePattern.test(state))
    {
        alert("States cannot have any numbers in them and must be only 2 letters!");
        return (false);
    }
    
    //checking the zipcode
    if(document.forms["order_form"]["tax_valid"].value === "no")
    {
        alert("Zip code is invalid! Enter a valid zip code!");
        return (false);
    }
        
    //validating the credit card number
    if(!creditPattern.test(creditCardNumber))
    {
        alert("Credit card number must be 16 digits long!");
        return (false);
    }
    
    if(!creditExprPattern.test(creditCardExpiration))
    {
        alert("Expiration date must be in the form: mm/yy");
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

function validZip(zipCode)
{
       var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function()
    {
        //4== finished and 200 means good
        if(xhr.readyState === 4 && xhr.status === 200)
        {
            //gets the response
            var result = xhr.responseText;
           
           //super bad way of checking but there is a issue with comparing stright responses?
            if(result.length <= 2)
                document.forms["order_form"]["tax_valid"].value = "no";
            else
                document.forms["order_form"]["tax_valid"].value = "yes";
        }
    };
    
    xhr.open("GET","validZip.php?zipCode=" + zipCode, true);
    xhr.send(); 
}

function updateEntireSummary(productID){
        //checks the shipping radio buttons
    if(document.getElementById('shiping1').checked)
        shippingCost = "20.00";
    else if(document.getElementById('shiping2').checked)
        shippingCost = "10.00";
    else if(document.getElementById('shiping3').checked)
        shippingCost = "0.00";
    
    var zipCode = document.getElementById('zip_box').value;
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function()
    {
        //4== finished and 200 means good
        if(xhr.readyState === 4 && xhr.status === 200)
        {
            //gets the response
            var result = xhr.responseText;         
            
            //splits the response to itemcost, shipping, subtotal, order total
            var ar = result.split(",");
            
            //maybe add the update item price for the future
            
            //updates shipping (not really necessary to do it this way)
            document.getElementsByClassName("shipping_label")[0].innerHTML = ar[1];
    
            //updates the estimated tax
            document.getElementsByClassName("tax_label")[0].innerHTML = ar[2]; 
            
            //updates the before tax
            document.getElementsByClassName("before_tax_label")[0].innerHTML = ar[3];         
            
            //updates the order total
            document.getElementsByClassName("order_total")[0].innerHTML = ar[4]; 
            
            //updates the hidden field
            document.getElementById("hidden_order_total").value = ar[4];           
        }
    };
    
    xhr.open("GET","getSummaryValues.php?zipCode=" + zipCode + "&productID=" + productID + "&shippingCost=" + shippingCost, true);
    xhr.send();
}


//code to verify credit card numbers
function detectCardType(number) {
    
//    Sample card numbers: 
//            '8800000000000000': 'UNIONPAY',
//            '4026000000000000': 'ELECTRON',
//            '5019000000000000': 'DANKORT',
//            '5018000000000000': 'MAESTRO',
//            '3528000000000000': 'JCB',
//            '6360000000000000': 'INTERPAYMENT',
//            '4916338506082832': 'VISA',
//            '5280934283171080': 'MASTERCARD',
//            '6011894492395579': 'DISCOVER',
//            '345936346788903': 'AMEX',
    var re = {
        electron: /^(4026|417500|4405|4508|4844|4913|4917)\d+$/,
        maestro: /^(5018|5020|5038|5612|5893|6304|6759|6761|6762|6763|0604|6390)\d+$/,
        dankort: /^(5019)\d+$/,
        interpayment: /^(636)\d+$/,
        unionpay: /^(62|88)\d+$/,
        visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
        mastercard: /^5[1-5][0-9]{14}$/,
        amex: /^3[47][0-9]{13}$/,
        diners: /^3(?:0[0-5]|[68][0-9])[0-9]{11}$/,
        discover: /^6(?:011|5[0-9]{2})[0-9]{12}$/,
        jcb: /^(?:2131|1800|35\d{3})\d{11}$/
    };
    if (re.electron.test(number)) {
        return 'ELECTRON';
    } else if (re.maestro.test(number)) {
        return 'MAESTRO';
    } else if (re.dankort.test(number)) {
        return 'DANKORT';
    } else if (re.interpayment.test(number)) {
        return 'INTERPAYMENT';
    } else if (re.unionpay.test(number)) {
        return 'UNIONPAY';
    } else if (re.visa.test(number)) {
        return 'VISA';
    } else if (re.mastercard.test(number)) {
        return 'MASTERCARD';
    } else if (re.amex.test(number)) {
        return 'AMEX';
    } else if (re.diners.test(number)) {
        return 'DINERS';
    } else if (re.discover.test(number)) {
        return 'DISCOVER';
    } else if (re.jcb.test(number)) {
        return 'JCB';
    } else {
        return undefined;
    }
}