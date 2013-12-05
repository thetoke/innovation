
$(document).ready(function() {

	$('#secondary').hover(function(){
		$('.frame').removeClass('collapsed');
	}, function(){
		$('.frame').addClass('collapsed');
	});

	$('a', '#secondary').on('click', function(e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr('href'),
			data: {ajax: 1},
			success: function(data) {
				console.log(data);
				$('#main').empty().append(data);
			}
		});
	});
});
