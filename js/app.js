$('#mobile-menu-checkbox').click(function() {
    if ($('#search-checkbox').prop('checked', true)) {
        $('#search-checkbox').prop('checked', false); 
    }
})
$('#search-checkbox').click(function() {
    if ($('#mobile-menu-checkbox').prop('checked', true)) {
        $('#mobile-menu-checkbox').prop('checked', false); 
    }
})


$( ".tea-nav" ).mouseenter(function() {
    $('.tea-menu').addClass('tea-hover');
});
$( ".tea-nav" ).mouseleave(function() {
    $('.tea-menu').removeClass('tea-hover');
});
$('.tea-menu').mouseenter(function() {
  $('.tea-menu').addClass('tea-hover');
});
$( ".tea-menu" ).mouseleave(function() {
    $('.tea-menu').removeClass('tea-hover');
});
$( ".teaware-nav" ).mouseenter(function() {
    $('.teaware-menu').addClass('teaware-hover');
});
$( ".teaware-nav" ).mouseleave(function() {
    $('.teaware-menu').removeClass('teaware-hover');
});
$('.teaware-menu').mouseenter(function() {
  $('.teaware-menu').addClass('teaware-hover');
});
$( ".teaware-menu" ).mouseleave(function() {
    $('.teaware-menu').removeClass('teaware-hover');
});
$( ".about-nav" ).mouseenter(function() {
    $('.about-menu').addClass('about-hover');
});
$( ".about-nav" ).mouseleave(function() {
    $('.about-menu').removeClass('about-hover');
});
$('.about-menu').mouseenter(function() {
  $('.about-menu').addClass('about-hover');
});
$( ".about-menu" ).mouseleave(function() {
    $('.about-menu').removeClass('about-hover');
});
$( ".account-nav" ).mouseenter(function() {
    $('.account-menu').addClass('account-hover');
});
$( ".account-nav" ).mouseleave(function() {
    $('.account-menu').removeClass('account-hover');
});
$('.account-menu').mouseenter(function() {
  $('.account-menu').addClass('account-hover');
});
$( ".account-menu" ).mouseleave(function() {
    $('.account-menu').removeClass('account-hover');
});

//form input validation
$( ".input" ).keyup(function() {
    var $this  = $(this);
   $this.css('background-color', '#efefef');
});

function validateEmail(email) {
    var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
    if(!regex.test(email)){
        return false;
    } else {
        return true;
    }
}
function hasError(input) {
    input.addClass('shatter');
    input.css('background-color', '#fcbeba');
        setTimeout(function(){
            input.removeClass('shatter');
        }, 500);
    return event.preventDefault();  
}


//Register Form
var $registerEmail = $('#register-email');
var $registerPassword= $('#register-password');
var $registerFirstName = $('#register-first-name');
var $registerLastName = $('#register-last-name');

$( ".registerForm" ).submit(function( event ) { 
    var $this = $(this);
    if ($registerEmail.val().length != 0) {
        if (!validateEmail($registerEmail.val())) {
                hasError($registerEmail);  
            } else {
            //all OK
            }
    } else {
        hasError($registerEmail);  
    }
    //firstName
    if ($registerFirstName.val().length != 0) {
        //all ok
    } else {
        hasError($registerFirstName);  
    };
    //last Name
    if ($registerLastName.val().length != 0) {
        //all ok
    } else {
        hasError($registerLastName);  
    };
    
    //password
    if ($registerPassword.val().length != 0) {
        if ($registerPassword.val().length < 5) {
            hasError($registerPassword);  
        } else {
            //all OK
        }
    } else {
        hasError($registerPassword);  
    };
});

//Login Form
var $loginEmail = $('#login-email');
var $loginPassword = $('#login-password');


$( ".loginForm" ).submit(function( event ) { 
    var $this = $(this);
    if ($loginEmail.val().length != 0) {
        if (!validateEmail($loginEmail.val())) {
                hasError($loginEmail);  
            } else {
            //all OK
            }
    } else {
        hasError($loginEmail);  
    }
    //password
    if ($loginPassword.val().length != 0) {
        //all ok
    } else {
        hasError($loginPassword);  
    };
});


//Contact Form
var $contactName = $('#contact-name');
var $contactEmail = $('#contact-email');
var $contactPhone = $('#contact-phone');
var $contactMessage = $('#contact-message');

$( ".contactForm" ).submit(function( event ) { 
    var $this = $(this);
    //email
    if ($contactEmail.val().length != 0) {
        if (!validateEmail($contactEmail.val())) {
                hasError($contactEmail);  
            } else {
            //all OK
            }
    } else {
        hasError($contactEmail);  
    }
    //message
    if ($contactMessage.val().length != 0) {
        //all ok
    } else {
        hasError($contactMessage);  
    };
    //name
    if ($contactName.val().length != 0) {
        //all ok
    } else {
        hasError($contactName);  
    };
    //phone
    if ($contactPhone.val().length != 0) {
        if ($contactPhone.val().length < 7) {
            hasError($contactPhone);  
        } else {
            //all OK
        }
    } else {
        hasError($contactPhone);  
    };
});

//personal details Form
var $firstName = $('#first-name');
var $lastName = $('#last-name');
//other details can be NULL

$( ".personalDetails" ).submit(function( event ) { 
    var $this = $(this);
    //firstname
    if ($firstName.val().length != 0) {
        //all ok
    } else {
        hasError($firstName);  
    };
    //lastname
    if ($lastName.val().length != 0) {
        //all ok
    } else {
        hasError($lastName);  
    };

});


//new product Form
var $category = $('#category');
var $subCategory = $('#sub-category');
var $flavor = $('#flavor');
var $name = $('#name');
var $quantity = $('#quantity');
var $price = $('#price');
// var $description = $('#description');
// var $subDescription = $('#sub-description');

$( ".newProductForm" ).submit(function( event ) { 

    //name
    if ($name .val().length != 0) {
        //all ok
    } else {
        hasError($name );  
    };
    //$quantity
    if ($quantity.val() > 0) {
        //all ok
    } else {
        hasError($quantity);  
    };
    //price
    if ($price.val() > 0) {
        //all ok
    } else {
        hasError($price);  
    };

    //$subCategory
    if ($subCategory.val() > 0) {
        //all ok
    } else {
        hasError($subCategory);  
    };
    if ($category.val() == "1") {
        if ($flavor.val() != "x" ) {
            //all ok
        } else {
            hasError($flavor);
        }
    }
});


$( ".editProductForm" ).submit(function( event ) { 

    //name
    if ($name .val().length != 0) {
        //all ok
    } else {
        hasError($name );  
    };
    //$quantity
    if ($quantity.val() > 0) {
        //all ok
    } else {
        hasError($quantity);  
    };
    //price
    if ($price.val() > 0) {
        //all ok
    } else {
        hasError($price);  
    };

    //$subCategory
    if ($subCategory.val() > 0) {
        //all ok
    } else {
        hasError($subCategory);  
    };
    if ($category.val() == "1") {
        if ($flavor.val() != "x" ) {
            //all ok
        } else {
            hasError($flavor);
        }
    }
});







































