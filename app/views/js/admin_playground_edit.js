$(document).ready(function()
{
	$('#form_playground_edit').submit(function(e) { 
		e.preventDefault();
		edit_playground_link($(this).find('#playground_id').val(), $(this).find('#playground_title').val(), $(this).find('#playground_url').val(), $(this).find('#playground_image').val());
	});
});

function edit_playground_link(id, title, url, image)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'edit_playground_link',
				id: id, 
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