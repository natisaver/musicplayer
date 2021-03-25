//jQuery detects state of readiness 
//SHORT FORM VERSION:
//$(function() {
//});
$( document ).ready(function() {
    console.log( "ready!" );

// # is for id of the span, . is for classes
    $("#hideLogin").click(function() {
    	console.log("heyja");
    	$("#loginForm").hide();
    	$("#registerForm").show();
    	
    });

    $("#hideRegister").click(function() {
    	console.log("wink");
    	$("#loginForm").show();
    	$("#registerForm").hide();
    	
    });


});

