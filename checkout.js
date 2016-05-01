function order_validation(){
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
    var phonePattern = /^[0-9]{10}/;
    var zipPattern = /^[0-9]{5}/;
    var creditPattern = /^[0-9]{16}/;
    
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

//validates product info fields
function validateProductInfo(){
    var size = document.forms["order_form"]["size"].value;
    var quantity = document.forms["order_form"]["quantity"].value;
    
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