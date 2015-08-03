$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});


$().ready(function() {
	$(".sizeDrop li a").click(function(){
	  $(".sizeGroup").html($(this).text());
	});
	
	
	$("#newRegister").validate(
	      {
	        rules: 
	        {
	          new_email: 
	          {
	            required: true,
	            email: true
	          },
	          new_first: 
	          {
	            required: true
	          },
	          new_last: 
	          {
	            required: true
	          },
	          new_user: {
	          	required: true
	          },
	          new_passwd: {
	          	required: true,
	          	minlength: 6
	          },
	          check_passwd: {
	          	required: true,
	          	minlength: 6,
	          	equalTo: "#new_passwd"
	          },
	        },
	        messages: 
	        {
	          new_first: 
	          {
	            required: "Please enter your first name"
	          },
	          new_email: 
	          {
	            required: "Please enter your email address.",
	            email: "Please enter a valid email address"
	          },
	          new_last: 
	          {
	            required: "Please enter your last name"
	          },
	          new_user:
	          {
	          	required: "Please enter a user name"
	          },
	          new_passwd:
	          {
	          	required: "Please enter a password",
	          	minLength: "Password must be at least 6 characters long!"
			  },
			  check_passwd:
	          {
	          	required: "Please retype password",
	          	equalTo: "Passwords do not match"
			  }		        
	       }
	     
	  });
	  
	  $(".ccInput").validate (
	  	{
	  		rules:
	  		{
	  			ccNumberIn:
	  			{
	  				required: true,
	  				validCardNumber: true
	  			},
	  			fullNameIn:
	  			{
	  				required: true
	  			},
	  			expIn:
	  			{
	  				required: true
	  			},
	  			ccvIn:
	  			{
	  				required: true
	  			},
	  			firstShip:
	  			{
	  				required: true
	  			},
	  			lastShip:
	  			{
	  				required: true
	  			},
	  			addressShip:
	  			{
	  				required: true
	  			},
	  			cityShip:
	  			{
	  				required: true
	  			},
	  			stateShip:
	  			{
	  				required: true
	  			},
	  			zipShip:
	  			{
	  				required: true
	  			},
	  			firstBill:
	  			{
	  				required: true
	  			},
	  			lastBill:
	  			{
	  				required: true
	  			},
	  			addressBill:
	  			{
	  				required: true
	  			},
	  			cityBill:
	  			{
	  				required: true
	  			},
	  			stateBill:
	  			{
	  				required: true
	  			},
	  			zipBill:
	  			{
	  				required: true
	  			},
	  		},
	  		messages:
	  		{
	  			ccNumberIn:
	  			{
	  				required: "A card number is required",
	  				validCardNumber: "A valid card number is required"
	  			},
	  			fullNameIn:
	  			{
	  				required: "A name is required"
	  			},
	  			expIn:
	  			{
	  				required: "An expiration date is required"
	  			},
	  			ccvIn:
	  			{
	  				required: "A CCV is required"
	  			},
	  			firstShip:
	  			{
	  				required: "A first name for shipping is required"
	  			},
	  			lastShip:
	  			{
	  				required: "A last name for shipping is required"
	  			},
	  			addressShip:
	  			{
	  				required: "An address for shipping is required"
	  			},
	  			cityShip:
	  			{
	  				required: "A city for shipping is required"
	  			},
	  			stateShip:
	  			{
	  				required: "A state for shipping is required"
	  			},
	  			zipShip:
	  			{
	  				required: "A zip for shipping is required"
	  			},
	  			firstBill:
	  			{
	  				required: "A first name for billing is required"
	  			},
	  			lastBill:
	  			{
	  				required: "A last name for billing is required"
	  			},
	  			addressBill:
	  			{
	  				required: "An address for billing is required"
	  			},
	  			cityBill:
	  			{
	  				required: "A city for billing is required"
	  			},
	  			stateBill:
	  			{
	  				required: "A state for billing is required"
	  			},
	  			zipBill:
	  			{
	  				required: "A zip for billing is required"
	  			}
	  		}
	  	});
	  	
	  	$.validator.addMethod("validCardNumber", function(value, element) {
	    	if (/[^0-9-\s]+/.test(value)) return false;

				var nCheck = 0, nDigit = 0, bEven = false;
				value = value.replace(/\D/g, "");
			
				for (var n = value.length - 1; n >= 0; n--) {
					var cDigit = value.charAt(n),
						  nDigit = parseInt(cDigit, 10);
			
					if (bEven) {
						if ((nDigit *= 2) > 9) nDigit -= 9;
					}
			
					nCheck += nDigit;
					bEven = !bEven;
				}
			
				return (nCheck % 10) == 0;
	    	
	    }, "Please enter a valid card");
	    
	   $("input[name=location]").click(function(){
	   		$choice = $('input[name=location]:checked', '.ccInput').val()
   			if($choice == '0'){
	   			$("#firstBill").val($("#firstShip").val());
	   			$("#lastBill").val($("#lastShip").val());
	   			$("#addressBill").val($("#addressShip").val());
	   			$("#cityBill").val($("#cityShip").val());
	   			$("#stateBill").val($("#stateShip").val());
	   			$("#zipBill").val($("#zipShip").val());
	   		} else {
	   			$("#firstBill").val("");
	   			$("#lastBill").val("");
	   			$("#addressBill").val("");
	   			$("#cityBill").val("");
	   			$("#stateBill").val("");
	   			$("#zipBill").val("");
	   		}
		});
	  
	  $(function () {
		  var $text = $('.ccNumber');
		  var $input = $('#ccNumberIn');
		  $input.on('keydown', function () {
		  	$(".creditCardTemp").css("background-image", "url('creditcard.png')");
		  	$(".fullName").css("color", "white");
		  	$(".exp").css("color", "white");
		  	$(".ccNumber").css("color", "white");
		  	$(".logo").css("background-repeat", "no-repeat");
		  	if($input.val().length == 0){
		  		$(".logo").css("background-image", "none");
		  	}
		  	if($input.val().length == 1){
		  		if($input.val().substr(0,1) == "4"){
		  			$(".logo").css("background-image", "url('visa.png')");
		  		}
		  	}
		  	if($input.val().length == 1){
		  		if($input.val().substr(0,1) == "6"){
		  			$(".logo").css("background-image", "url('discover.png')");
		  		}
		  	}
		  	if($input.val().length == 2){
		  		if($input.val().substr(0,2) == "34" || $input.val().substr(0,2) == "37"){
		  			$(".logo").css("background-image", "url('american-express.png')");
		  		}
		  	}
		  	if($input.val().length == 2){
		  		if($input.val().substr(0,2) == "51" || $input.val().substr(0,2) == "52" || $input.val().substr(0,2) == "53" || $input.val().substr(0,2) == "54" || $input.val().substr(0,2) == "55"){
		  			$(".logo").css("background-image", "url('mastercard.png')");
		  		}
		  	}
		    setTimeout(function () {
		      $text.html($input.val());
		    }, 0);
	  	  }).blur(function() {
	  	  	if(!(Luhn($input))) {
	  	  		$("#ccError").text("Invalid card number!");
	  	  	} else{
	  	  		$("#ccError").text("");
	  	  	}
	  	  });
	  });
	  
	  $(function () {
		  var $text = $('.fullName');
		  var $input = $('#fullNameIn');
		  $input.on('keydown', function () {
		    setTimeout(function () {
		      $text.html($input.val());
		    }, 0);
	      });
	  });
	  
	  $(function () {
		  var $text = $('.exp');
		  var $input = $('#expIn');
		  $input.on('keydown', function () {
		    setTimeout(function () {
		      $text.html($input.val());
		    }, 0);
	      });
	  });
	  
	  $(function () {
		  var $text = $('.ccv');
		  var $input = $('#ccvIn');
		  $input.on('keydown', function () {
		    setTimeout(function () {
		      $text.html($input.val());
		    }, 0);
	      });
	  });
	  
	  $("#ccvIn").focus(function() {
	  	$(".creditCardTemp").css("display", "none");
	  	$(".creditCardBack").css("display", "block");
	  }).blur(function() {
	  	$(".creditCardTemp").css("display", "block");
	  	$(".creditCardBack").css("display", "none");
	  })
	  
	
	function Luhn(value){
		if (/[^0-9-\s]+/.test(value)) return false;

		var nCheck = 0, nDigit = 0, bEven = false;
		value = value.replace(/\D/g, "");
	
		for (var n = value.length - 1; n >= 0; n--) {
			var cDigit = value.charAt(n),
				  nDigit = parseInt(cDigit, 10);
	
			if (bEven) {
				if ((nDigit *= 2) > 9) nDigit -= 9;
			}
	
			nCheck += nDigit;
			bEven = !bEven;
		}
	
		return (nCheck % 10) == 0;
	}
});	

