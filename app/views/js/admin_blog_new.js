$(document).ready(function()
{
	CKEDITOR.replace( 'blog_body' );

	$('#form_blog_new').submit(function(e) { 
		e.preventDefault();
		create_blog_post($(this).find('#blog_title').val(), CKEDITOR.instances.blog_body.getData());
	});
});

function create_blog_post(title, body)
{
	$('#results').html(LOADING_HTML);
	$.ajax({
		type: "POST",
		url: "index.php",
		data: { ajax: 'create_blog_post',
				title: title,
				body: body }
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