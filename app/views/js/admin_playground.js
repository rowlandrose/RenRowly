$(document).ready(function()
{
	$('.delete').click(function() { 
		var entry_id = $(this).attr('id');
		var answer = confirm('Delete "' + $('.title_' + entry_id).html() + '"?');
		if(answer) {
			$.ajax({
				type: "POST",
				url: "index.php",
				data: { ajax: 'delete_playground',
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
	$('.move_up').click(function() { 
		var entry_id = $(this).attr('id');
		var current_order = $(this).parent().find('.view_order').val();
		$.ajax({
			type: "POST",
			url: "index.php",
			data: { ajax: 'playground_move_up',
					id: entry_id,
					current_order: current_order }
		}).done(function( msg ) {
			if(msg == 'success') {
				location.reload();
			} else {
				alert('Error. Could not move up in order.');
			}
		});
	});
	$('.move_down').click(function() { 
		var entry_id = $(this).attr('id');
		var current_order = $(this).parent().find('.view_order').val();
		$.ajax({
			type: "POST",
			url: "index.php",
			data: { ajax: 'playground_move_down',
					id: entry_id,
					current_order: current_order }
		}).done(function( msg ) {
			if(msg == 'success') {
				location.reload();
			} else {
				alert('Error. Could not move down in order.');
			}
		});
	});
});