$( document ).ready(function() {
    console.log( "ready homies!" );
	//open menu
	$('.navbar-toggler').on('click', function(event){
		event.preventDefault();
		$('#main-nav').addClass('is-visible');
	});
	//close menu
	$('#main-nav .close-menu, #main-nav li a').on('click', function(event){
	//event.preventDefault();
		$('#main-nav').removeClass('is-visible');
	});

});