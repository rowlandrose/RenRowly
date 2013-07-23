$(document).ready(function()
{
	$('#login_form').submit(function(e) { 
		e.preventDefault();
		check_login($(this).find('input[name=username]').val(), $(this).find('input[name=password]').val());
	});
});

function check_login(user, pass)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'login_check',
				user: user,
				pass: pass }
	}).done(function( msg ) {
		if(msg == 'reload') {
			// Success
			location.reload();
		} else {
			// Failure
			$('#results').html(msg);
		}
	});
}