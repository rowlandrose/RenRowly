$(document).ready(function()
{
	CKEDITOR.replace( 'portfolio_body', {
		allowedContent: true
	} );

	$('#form_portfolio_new').submit(function(e) { 
		e.preventDefault();
		create_portfolio_piece($(this).find('#portfolio_title').val(), $(this).find('#portfolio_date').val(), $(this).find('#portfolio_preview_image_url').val(), CKEDITOR.instances.portfolio_body.getData());
	});
});

function create_portfolio_piece(title, date, preview_image, body)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'create_portfolio_piece',
				title: title,
				date: date, 
				preview_image: preview_image,
				body: body }
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