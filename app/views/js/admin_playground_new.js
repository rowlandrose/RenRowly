$(document).ready(function()
{
	$('#form_playground_new').submit(function(e) { 
		e.preventDefault();
		create_playground_link($(this).find('#playground_title').val(), $(this).find('#playground_url').val(), $(this).find('#playground_image').val());
	});
});

function create_playground_link(title, url, image)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'create_playground_link',
				title: title,
				url: url,
				image: image }
	}).done(function( msg ) {
		if(msg == 'success') {
			// Success
			window.location = '/admin/playground';
		} else {
			// Failure
			$('#results').html(msg);
		}
	});
}