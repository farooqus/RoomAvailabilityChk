	/* Date & time picker 
	* default option set to all only future dates
	* dates_list array can be populate with booked date on load to avoid server request, and improve UI
	*/
	var dates_list =[];
	$(function () {
		$('#bookDate').datetimepicker({
			minDate: false,
			minDate: moment(),
			disabledDates:dates_list 
		});
	});

	/* Array to make no of room dataset */
	var numberRoom = [];
	for(var i=1;i<=100; i++)
	{
		numberRoom.push(i.toString()); 
	}
	
	/* autocomplete for number of room
	* max results set to 5
	* min type in set to 1
	*/
	$(function() {
		$( "#no_of_rooms" ).autocomplete({      
		minLength:1,
		source: function(req, response) {
			var results = $.ui.autocomplete.filter(numberRoom, req.term);
			response(results.slice(0, 5)); //for getting 5 results
			}
		});
	});	
	
	/* AJAX call to get booked dates */
	var requestProcess = false;
	$('#showresults').hide();
	$(document).on('keydown', '#no_of_rooms', 
		function(){
			if (requestProcess) { // don't do anything if an AJAX request is pending
				return;
			}
			$('#submit').click(function(){				
				var queryStr = $( "form" ).serialize();
				console.log(queryStr);				
				$.ajax({
					type: "POST",
					url: "app/LoadData.php?"+queryStr, 
					datatype : "json",
					success: function(book_list) 
					{						
						var result = $.parseJSON(book_list);
						$('#showresults').empty().show();
						$.each(result, function(key, value) {						
						 $('#showresults').append(
							  $('<div />').val(key).html(value)
						  );
						})					
						requestProcess = false;
						$('#showresults').delay(8000).fadeOut(300);												
					}
				});
				$(document).off('click');
			});
			requestProcess = true;
		}
	);
	
	/* Validation Default*/		
	$.validator.setDefaults({
		submitHandler: function () {		
		}
	});

	/* Form validation */
	$(document).ready( function () {	
		$( "#roomRegister" ).validate({
			rules: {				
				date: {
					required: true,
				},
				staylength: {
					required: true,
					 digits: true,
					 maxlength: 200
				},
				no_of_rooms: {
					required: true,
					 digits: true,
					 maxlength: 200
				}
				
			},
			messages: {				
				date: {
					required: "Please select booking date",
				},
				staylength: {
					required: "Please enter duration of your stay",
				},
				no_of_rooms: {
					required: "Please enter number of room(s)",
				}

			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				// Add the `help-block` class to the error element
				error.addClass( "help-block" );

				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
			},
			unhighlight: function (element, errorClass, validClass) {
				$( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
			}
		} );
	});	