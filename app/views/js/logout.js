$(document).ready(function()
{
	$('#logout_form').submit(function(e) { 
		e.preventDefault();
		logout();
	});
});

function logout()
{
	$('#logout_results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'logout' }
	}).done(function( msg ) {
		if(msg == 'reload') {
			// Success
			location.reload();
		} else {
			// Failure
			$('#logout_results').html(msg);
		}
	});
}