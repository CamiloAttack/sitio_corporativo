   $(window).resize(function(){

		if($(window).height() <= 768){
	 
			$('.topbar .row div').addClass('text-center');

		}

		if($(window).height() >= 768){

			$('#telefono_top').removeClass('text-center');

		}
	     
	});
	$(document).ready(function() {


		if($(window).height() <= 768){
	 
			$('.topbar .row div').addClass('text-center');

		}

		if($(window).height() >= 768){

			$('#telefono_top').removeClass('text-center');

		}


  $("#submit_btn").click(function(){
        
        //get input field values
        var user_name = $('input[name=name]').val();
        var user_email = $('input[name=email]').val();
        var user_motivo = $('input[name=motivo]').val();
        var user_message = $('textarea[name=message]').val();
        var error_contacto_text = "";
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if (user_name == "") {
            $('input[name=name]').css('border-color', '#e41919');
          //  error_contacto_text += " Ingrese nombre ";
            proceed = false;
        }
        if (user_email == "") {
            $('input[name=email]').css('border-color', '#e41919');
          //  error_contacto_text += " -Ingrese Email- ";            
            proceed = false;
        }else{
      
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (!emailRegex.test(user_email)) {
                $('input[name=email]').css('border-color', '#e41919');
           //     error_contacto_text += " -Email invalido- ";                  
                proceed = false;
            } 


        }
        if (user_motivo == "") {
 
            $('input[name=motivo]').css('border-color', '#e41919');
           // error_contacto_text += " -Ingrese Mensaje-";                      
            proceed = false;
        }
    
        
        if (user_message == "") {
            $('textarea[name=message]').css('border-color', '#e41919');
           // error_contacto_text += " -Ingrese Mensaje-";                      
            proceed = false;
        }


        if (!proceed) {
        $("#error_contacto").text("Datos incorrectos").show().animate({
        
            opacity: '1',
            height: '41px',
            
        }).css('margin-top','-20px');
          
        }   
        //everything looks good! proceed...
        if (proceed) {

            $("#error_contacto").text("").css('padding','0px').animate({
        
            height: '0px',
          
        });

            //data to be sent to server
            post_data = {
                'userName': user_name,
                'userEmail': user_email,
                'userMotivo': user_motivo,
                'userMessage': user_message                
            };
            
            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){
            
                //load json data from server and output message     
                if (response.type == 'error') {
                    output = '<div class="error">' + response.text + '</div>';
                }
                else {
                
                    output = '<div class="success">' + response.text + '</div>';
                    
                    //reset values in all input fields
                    $('#contact_form input').val('');
                    $('#contact_form textarea').val('');
                    $("#error_contacto").text("Mensaje enviado");
                }
                
                $("#result").hide().html(output).slideDown();
            }, 'json');
            
        }
        
        return false;
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form input, #contact_form textarea").keyup(function(){
        $("#contact_form input, #contact_form textarea").css('border-color', '');
        $("#result").slideUp();
    });
    

});