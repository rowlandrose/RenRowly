$(document).ready(function()
{
	CKEDITOR.replace( 'blog_body', {
		allowedContent: true
	} );

	$('#form_blog_edit').submit(function(e) { 
		e.preventDefault();
		edit_blog_post($(this).find('#blog_title').val(), CKEDITOR.instances.blog_body.getData(), $('#blog_id').val());
	});
});

function edit_blog_post(title, body, id)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'edit_blog_post',
				title: title,
				body: body,
				id: id }
	}).done(function( msg ) {
		if(msg == 'success') {
			// Success
			window.location = '/admin/blog';
		} else {
			// Failure
			$('#results').html(msg);
		}
	});
}