
$(document).ready(function() {

	$('#secondary').hover(function(){
		$('.frame').removeClass('collapsed');
	}, function(){
		$('.frame').addClass('collapsed');
	});

	$('a.ajax').bind('click', function(e) {
		e.preventDefault();
		ajaxify($(this).attr('href'));
	});
});


function ajaxify(href){
	$.ajax({
		url: href,
		data: {ajax: 1},
		success: function(data) {
			$('#main').empty().append(data);

			$('a.ajax').bind('click', function(e) {
				e.preventDefault();
				ajaxify($(this).attr('href'));
			});
		},
		error: function(){
			// use old school redirection
		}
	});

	history.pushState({}, "", $(this).attr('href'));
}
