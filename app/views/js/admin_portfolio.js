$(document).ready(function()
{
	$('.delete').click(function() { 
		var entry_id = $(this).attr('id');
		var answer = confirm('Delete "' + $('.title_' + entry_id).html() + '"?');
		if(answer) {
			$.ajax({
				type: "POST",
				url: "index.php",
				data: { ajax: 'delete_portfolio',
						id: entry_id }
			}).done(function( msg ) {
				if(msg == 'success') {
					location.reload();
				} else {
					alert('Error. Could not delete entry.');
				}
			});
		}
	});
});