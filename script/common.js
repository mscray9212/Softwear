$(document).ready(function() {
    $("#same_address").change(function() {
        if ($("#same_address").prop('checked') == true) {
            $(".billing_address").hide();
        } else if ($("#same_address").prop('checked') == false) {
            $(".billing_address").show();
        }
    });
});

$(document).ready(function() {
    $('#name').on('blur', function() {
        var input = $(this);
        var is_name = input.val();
        if (is_name) {
            input.removeClass("invalid");
            $('#first_name_mssg').remove()
        } else {
            input.addClass("invalid");
            outputErrorMessage($(this),
                '<p class="errorMessage" id="first_name_mssg">This field cannot be left blank.</p>'
            );
        }
    });
});

$(document).ready(function() {
    $('#Lname').on('blur', function() {
        var input = $(this);
        var is_name1 = input.val();
        if (is_name1) {
            input.removeClass("invalid");
            $('#last_name_mssg').remove()
        } else {
            input.addClass("invalid");
            outputErrorMessage($(this),
                '<p class="errorMessage" id="last_name_mssg">This field cannot be left blank.</p>'
            );
        }
        //if(is_name){input.removeClass("error_show").addClass("error");}
        //else{input.removeClass("error").addClass("error_show");}
    });
});

$(document).ready(function() {
    $('#dob').on('blur', function() {
        var input = $(this);
        var is_name1 = input.val();
        if (is_name1) {
            input.removeClass("invalid");
            $('#dob_mssg').remove()
        } else {
            input.addClass("invalid");
            outputErrorMessage($(this),
                '<p class="errorMessage" id="dob_mssg">This field cannot be left blank.</p>'
            );
        }
        //if(is_name){input.removeClass("error_show").addClass("error");}
        //else{input.removeClass("error").addClass("error_show");}
    });
});

$(document).ready(function() {
    $('#email').on('blur', function() {
        var input = $(this);
        var email = input.val();
        var re =
            /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email = re.test(input.val());
        //test to make sure field is not empty
        if (email) {
            input.removeClass("invalid");
            $('#username_mssg').remove()
            //test to make sure input is valid
            if (is_email) {
                input.removeClass("invalid");
                $('#username_hint').remove()
                input.removeClass("error_show").addClass("error");
            } else {
                input.addClass("invalid");
                outputErrorMessage($(this),
                    '<p class="errorMessage" id="username_hint">Enter a valid email address.<br>Ex: Username@domain.com</p>'
                );
                input.removeClass("error").addClass("error_show");
            }
        } else {
            input.addClass("invalid");
            outputErrorMessage($(this),
                '<p class="errorMessage" id="username_mssg">This field cannot be left blank.</p>'
            );
        }
    });
});

$(document).ready(function() {
    $('#telephone').on('blur', function() {
        var input = $(this);
        var value = input.val();
        var filter = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        var is_telephone = filter.test(input.val());
        if (value.length > 0) {
            if (is_telephone) {
                input.removeClass("invalid");
                $('.errorMessage').remove()
            } else {
                input.addClass("invalid");
                outputErrorMessage($(this),
                    '<p class="errorMessage" id="tlf_one_mssg">Enter a valid telephone number.<br>Ex: 555-555-5555</p>'
                );
            }
            if (is_telephone) {
                input.removeClass("error_show").addClass("error");
            } else {
                input.removeClass("error").addClass("error_show");
            }
        } else {
            input.removeClass("invalid");
            $('#tlf_one_mssg').remove()
            input.removeClass("error_show").addClass("error");
        }
    });
});

$(document).ready(function() {
    $('#telephone2').on('blur', function() {
        var input = $('#telephone2');
        var value = input.val();
        var filter = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        var is_telephone = filter.test(input.val());
        if (value.length > 0) {
            if (is_telephone) {
                input.removeClass("invalid");
                $('.errorMessage').remove()
            } else {
                input.addClass("invalid");
                outputErrorMessage($(this),
                    '<p class="errorMessage" id="tlf_two_mssg">Enter a valid telephone number.<br>Ex: 555-555-5555</p>'
                );
            }
            if (is_telephone) {
                input.removeClass("error_show").addClass("error");
            } else {
                input.removeClass("error").addClass("error_show");
            }
        } else {
            input.removeClass("invalid");
            $('#tlf_two_mssg').remove()
            input.removeClass("error_show").addClass("error");
        }
    });
});

$(document).ready(function() {
    $('#order_number').on('input', function() {
        var input = $(this);
        var is_order = input.val();
        if (is_order) {
            input.removeClass("invalid").addClass("valid");
            $('.errorMessage').remove()
        } else {
            input.addClass("invalid");
            outputErrorMessage($(this),
                '<p class="errorMessage">Enter a Order Number.</p>');
        }
        if (is_order) {
            input.removeClass("error_show").addClass("error");
        } else {
            input.removeClass("error").addClass("error_show");
        }
    });
});

$(document).ready(function() {
    $('#password').on('blur', function() {
        var input = $(this);
        var p = $('#confpassword')
        var is_password = input.val();
        var password = $("#password").val();
        var confirmPassword = $("#confpassword").val();
        if (is_password.length >= 8) {
            input.removeClass("invalid");
            $('.password_mssg').remove()
            if (confirmPassword) {
                if (password == confirmPassword) {
                    input.removeClass("invalid");
                    p.removeClass("invalid");
                    $('.password_match_mssg').remove();
                    //document.getElementById("submit").disabled = false;
                } else {
                    input.addClass("invalid");
                    p.addClass("invalid");
                    //document.getElementById("submit").disabled = true;
                    outputErrorMessage($('#password'),
                        '<p class="errorMessage password_match_mssg">Passwords do not match.<br>Tyr Again!</p>'
                    );
                }
            }
        } else if (is_password == 0) {
            input.addClass("invalid");
            //document.getElementById("submit").disabled = true;
            outputErrorMessage($(this),
                '<p class="errorMessage password_mssg">This field cannot be left blank.</p>'
            );
        } else {
            input.addClass("invalid");
            //document.getElementById("submit").disabled = false;
            outputErrorMessage($(this),
                '<p class="errorMessage password_mssg">Password must have 8 - 14 characters</p>'
            );
        }
    });
});

$(document).ready(function() {
    $('#password').on('input', function() {
        var input = $(this);
        var is_password = input.val();
        if (is_password.length > 0) {
            outputErrorMessage($(this),
                '<p class="strength">Password Strength: <span id="weak">Weak! Try Harder</span></p>'
            )
        }
        if (is_password.length > 5) {
            outputErrorMessage($(this),
                '<p class="strength">Password Strength: <span id="medium">Medium...</span></p>'
            )
        }
        if (is_password.length > 7) {
            outputErrorMessage($(this),
                '<p class="strength">Password Strength: <span id="strong">Strong</span></p>')
        }
    });
});

$(document).ready(function() {
    $('#confpassword').on('blur', function() {
        var input = $(this);
        var p = $('#password')
        var is_password = input.val();
        var password = $("#password").val();
        var confirmPassword = $("#confpassword").val();
        if (is_password.length >= 8) {
            input.removeClass("invalid");
            $('.password_two_mssg').remove();
            if (password == confirmPassword) {
                input.removeClass("invalid");
                p.removeClass("invalid");
                $('.password_match_mssg').remove();
                //document.getElementById("submit").disabled = false;
            } else {
                input.addClass("invalid");
                p.addClass("invalid");
                //document.getElementById("submit").disabled = true;
                outputErrorMessage($('#password'),
                    '<p class="errorMessage password_match_mssg">Passwords do not match.<br>Tyr Again!</p>'
                );
            }
        } else if (is_password.length == 0) {
            input.addClass("invalid");
            //document.getElementById("submit").disabled = true;
            outputErrorMessage($(this),
                '<p class="errorMessage password_two_mssg">This field cannot be left blank.</p>'
            );
        } else {
            input.addClass("invalid");
            //document.getElementById("submit").disabled = true;
            outputErrorMessage($(this),
                '<p class="errorMessage password_two_mssg">Password must have 8 - 14 characters</p>'
            );
        }
    });
});

$(document).ready(function() {
    $('#product_name').on('blur', function() {
        var input = $(this);
        var product_name = input.val();
        if (product_name) {
            input.removeClass("invalid");
            $('#product_name_mssg').remove()
        } else {
            input.addClass("invalid");
            outputErrorMessage($(this),
                '<p class="errorMessage" id="product_name_mssg">This field cannot be left blank.</p>'
            );
        }
    });
});


function validate_add_product_form() {
    var isFormValid = true;
    $(".add_product .required input").each(function(index, value) {
        if ($.trim($(value).val()).length == 0) {
            isFormValid = false;
        }
    });
    if ($('#product_description').val().length == 0 || $('#product_description').val().length > 800) {
        isFormValid = false;
    }
    if (isFormValid) {
        return true;
    } else {
        $('#feedback').removeClass('hidden');
        return false;
    }
}

function validate_sing_up_form() {
    var isFormValid = true;
    $(".sign_up .required input").each(function(index, value) {
        if ($.trim($(value).val()).length == 0) {
            isFormValid = false;
        }
    });
    if (isFormValid) {
        return true;
    } else {
        $('#feedback').removeClass('hidden');
        return false;
    }
}

$('#product_description').keyup(function () {
    var max = 500;
    var len = $(this).val().length;
    var counter = $('#charNum');
    var char = max - len;
    if (len >= max) {

        counter.css( "color", "#c0392b" );
        counter.text( char + ' characters');

    } else {

        counter.css( "color", "#27ae60" );
        $('#charNum').text(char + ' characters left');
    }
});

$(document).ready(function() {
    $('#subject').on('input', function() {
        var input = $(this);
        var is_subject = input.val();
        if (is_subject) {
            input.removeClass("invalid").addClass("valid");
        } else {
            input.addClass("invalid");
        }
    });
});

$(document).ready(function() {
    $('#message').keyup(function(event) {
        var input = $(this);
        var message = $(this).val();
        console.log(message);
        if (message) {
            input.removeClass("invalid").addClass("valid");
        } else {
            input.addClass("invalid");
        }
    });
});

$(document).ready(function() {
    $('#product_price').on('blur', function() {
        var input = $(this);
        var price = input.val();
        if (price) {
            input.removeClass("invalid");
            $('#product_price_mssg').remove();
        } else {
            input.addClass("invalid");
        };
    });
});

$("#product_category" ).change(function() {
    var category = $('#product_category');
    var sub_e = $('.electronic_sub');
    var sub_b = $('.book_sub');

    if (category.val() == 'books') {
            sub_e.addClass("hidden");
            sub_b.removeClass("hidden");
    }
    else {
        sub_b.addClass("hidden");
        sub_e.removeClass("hidden");
    }
});

$("#product_category" ).change(function() {
    var category = $('#product_category');
    var sub_e = $('.electronic_sub');
    var sub_b = $('.book_sub');

    if (category.val() == 'books') {
        $('.book_details').removeClass("hidden");
        sub_e.addClass("hidden");
        sub_b.removeClass("hidden");
    }
    else {
        $('.book_details').addClass("hidden");
        sub_b.addClass("hidden");
        sub_e.removeClass("hidden");
    }
});



function outputErrorMessage($inputField, errorMessage) {
    // If there is a previous message
    if (!$inputField.next().length == 0) {
        // Remove the previous message
        $inputField.next().remove();
    } // end if
    // Show the error message
    $inputField.after(errorMessage);
} // end function outputErrorMessage($inputField, errorMessage)
