<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<html>
<head>
    <title>AJAX</title>
    <!-- Jquery library which will be used for Jquery AJAX tutorial -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- comments have been added for explanation, you may want to remove them if you copy this code, since the
         comments in html will be visible publicly. -->
</head>
<body>
<!-- You can display any form validation errors here. Since we are using Jquery AJAX, we will not use and you can remove it-->
<?php echo validation_errors(); ?>
<!-- Open the form with CI form_open(). One benefit of using this is CSRF tokens are automatically included in 
     the form when you use form_open. Change 'demo/ajax_form' below to the controller method you are submitting
    this form to. However, since we are going to use AJAX to submit form, we'll specify URL parameter there. 
    Notice the 'demoform' ID assigned to form which will be used later in Jquery. Change as per your needs.-->
<?php echo form_open('demo/ajax_form','id="demoform"'); ?>

<h5>Name</h5>
<input type="text" name="name" value="" size="30" />

<h5>Date of Birth</h5>
<input type="text" name="dob" value="" size="20" />

<h5>Email Address</h5>
<input type="text" name="email" value="" size="80" />

<div><input type="submit" value="Submit" /></div>

<?php echo form_close(); ?>

<!-- Below Div area will be used to display success and error messages-->
<div id="form_msg"></div>
<script>
    // start javascript here
    // Catch the submit event of #demoform (demoform is the ID of the above form) through Jquery. 
    // Make sure Jquery is loaded either locally or through a CDN.
    $( "#demoform" ).submit(function( event ) {
        // event.preventDefault() will make sure that the default form is not submitted normally when 
        // you click the submit button. This is important
        event.preventDefault();
        
    // Start jquery ajax below    
    $.ajax({
        method: "POST",
        // site_url() returns the url including/excluding index.php. This is recommended.
        // uri_string() returns the current URI where the form is loaded. If the form needs to be submitted to 
        // a different controller menthod, change this value accordingly.
        url: "<?php echo site_url().'/' . uri_string();?>",
        // $("#demoform").serializeArray() serializes all the values in the form into an array for submissing.
        // This is very important for submitting the form correcly.
        // If you are extracting the form values individually and submitting them, make sure CSRF token name and hash
        // values are also passed, otherwise you will face a 403 Forbidden error while submitting the form,
        // in case you have CSRF protection enabled. Here, since CSRF token name and token hash are automatically created
        // as hidden fields with CI form_open() method, they are also passed in the serialized array and things 
        // work automatically.
        data: $("#demoform").serializeArray()
    })
        .done(function( return_data ) {
            alert("it is working");
            // This loop is executed when ajax call is done and control is returned back. 
            // Display return_data like below if you want to examine raw data returned in case of any issues.
            //alert( "Data returned: " + return_data );
            try {
                // TRY block when there is no exception. Since data was JSON encoded within controller,
                // we are using jquery $.parseJSON method to parse the emncoded data.
                ret = $.parseJSON(return_data);
                if(ret.error === 'Y' ) { 
                    // if error indicator was set, append the return message to form_message div element.
                $("#form_msg").empty().append(ret.message);
              }
              else {
                  // if no error, display success message. You may want to perform other business business logic as
                  // per you application here.
                  $("#form_msg").empty().append(ret.message);
                  $( "#form_msg" ).append( '<p style="color:green"> Refreshing the page in 2 seconds.. </p>' );
                  // Since the form was submitted using AJAX, you will want to refresh the page since the CSRF 
                  // token hash may be invalidated. Also, the form values will be reset with page refresh.
                    function redirect_delay() {
                        // location.reload(true) will load the same page again. TRUE will make sure page is
                        // reloaded from server and not from browser cache.
                        location.reload(true);
                    }
                    // This will wait for the specified time and execute redirect_delay() function. In the below case,
                    // we are waiting 2000 milliseconds (2 seconds) before refreshing the page.
                    setTimeout(redirect_delay, 2000);
              }
            }
            catch(e) {
               // Catch any exceptions here and handle as needed. Use console.log(e) to write the exception to 
               // browser console, only in the development environment.
               //console.log(e) ;
               // return false will ensure code execution is stopped here. Make sure it is in lower case
               // i.e. 'false' and not 'FALSE' .
               return false ; 
              }          
    });
});
</script>    
</body>
</html>