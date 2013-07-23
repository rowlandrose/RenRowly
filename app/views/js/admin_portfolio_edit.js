$(document).ready(function()
{
	CKEDITOR.replace( 'portfolio_body', {
		allowedContent: true
	} );

	$('#form_portfolio_edit').submit(function(e) { 
		e.preventDefault();
		edit_portfolio_piece($(this).find('#portfolio_title').val(), $(this).find('#portfolio_date').val(), $(this).find('#portfolio_preview_image_url').val(), CKEDITOR.instances.portfolio_body.getData(), $('#portfolio_id').val());
	});
});

function edit_portfolio_piece(title, date, preview_image, body, id)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'edit_portfolio_piece',
				title: title,
				date: date, 
				preview_image: preview_image,
				body: body,
				id: id }
	}).done(function( msg ) {
		if(msg == 'success') {
			// Success
			window.location = '/admin/portfolio';
		} else {
			// Failure
			$('#results').html(msg);
		}
	});
}