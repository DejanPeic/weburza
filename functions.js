$(document).ready(function(){
 'use strict';

    (function () {

        var myForm = $('.contact-form'),
			jsLastname =  $('.jslastname'),
			jsFirstname = $('.jsname'),
			jsEmail = $('.jsemail'),
			jsInfo = $('.jsinfo'),
			jsInvalidMail = $('.jsinvalidemail'),
            myFormAttr = myForm.attr('action');

        jsInfo.hide();
        $('#contactbutton').click(function (e) {
            let names = $('#names').val(),
                lastname = $('#lastname').val(),
                email = $('#email').val(),
                adminemail = $('#adminemail').val(),
                message = $('#message').val(),
                botcheck = $('#check').val(),
                formData = $(myForm).serialize();
            // check is mail VALID
            // http://stackoverflow.com/questions/201323/using-a-regular-expression-to-validate-an-email-address/1917982#1917982
            // From https://html.spec.whatwg.org/multipage/forms.html#valid-e-mail-address
            // If you have a problem with this implementation, report a bug against the above spec
            let reg = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            // if name is empty
            if ("" === names || "Write your name" === names) {
                jsFirstname.hide().fadeIn(1000);
            } else {
                jsFirstname.hide();
            }
            if ("" === lastname || "Write your lastname" === lastname) {
                jsLastname.hide().fadeIn(1000);
            } else {
               jsLastname.hide();
            }
            if ("" === email) {
                jsEmail.hide().fadeIn(1000);
            } else if (false === reg.test(email)) {
                jsInvalidMail.hide().fadeIn(1000);
                jsEmail.hide();
            } else {
                jsEmail.hide();
                jsInvalidMail.hide();
            }
            
            // if mail adress IS VALID and everything is COOL...
            if (reg.test(email) && 0 !== names.length && 0 === botcheck.length && 0 !== lastname.length && "Write your lastname" !== lastname && "Write your name" !== names ) {
                $(jsEmail,jsLastname,jsFirstname,jsInvalidMail).hide();
                $('.contact-form')[0].reset();
                jsInfo.hide().fadeIn(1000, function () {
                    $(this).delay(7000).fadeOut(1000);
                });

                let request = $.ajax({
                    type: 'POST', // php method
                    url: myFormAttr,
                    cache: 'false',
                    data: formData // what will data contain
                });
                // check is data sent successfully...
               // request.done( function( response ) {
                 //$( myForm ).text( formData );
                 //} );
                request.fail(function (jqXHR, textStatus, error) {
                    // Ignore incomplete requests, likely due to navigating away from the page...
                    if (jqXHR.readyState < 4) {

                        return true;

                    } else {

                        $('.jsinfo').hide();

                        alert('Something went wrong! Mail Was NOT sent. Please try again later.');

                    }

                });
            }//end if statment for VALID mail
            //prevent Redirection...
            e.preventDefault();
        });

    })();

	
	//Let's be nice and try not to kill the browser with insane amount of scroll events... 
	var scrollTimeout,
	throttle = 20, 
	$window = $(window),
	windowOffset = $(window).scrollTop(),
	nav = $( ".sticky-nav" ),
	offset = nav.offset();

$window.on('scroll', function () {
 //NOTE TO SELF: probably it is better solution to clone element and append ( cloned element with fixed class )    
	if (!scrollTimeout) {
        scrollTimeout = setTimeout(function () {
            if ( $window.scrollTop() > offset.top){
			nav.addClass('fixed');
			} else {
				nav.removeClass('fixed');
			} 
            scrollTimeout = null;
        }, throttle);
    }
   
});
	$window.on('resize', function () {
		//Remove the sticky so we can calculate position again... 
		nav.removeClass('fixed');
		//Update the offset again (DUH!!)
		offset = nav.offset();
		});
	
});