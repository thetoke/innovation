
$(document).ready(function() {

	$('#secondary, .site-title').hover(function(){
		$('.frame').removeClass('collapsed');
	}, function() {
		$('.frame').addClass('collapsed');
	});

	$('a.ajax').on('click', function(e) {
		e.preventDefault();
		$('li', '#secondary').removeClass('active');
		$(this).parent().addClass('active');
		ajaxify($(this).attr('href'));
	});

});


function ajaxify(href){
	$.ajax({
		url: href,
		data: {ajax: 1},
		beforeSend: function() {
			$('.frame').addClass('collapsed');
		},
		success: function(data) {
			$('body, html').animate({
				scrollTop: 0
			}, 1000);

			$('#main').fadeOut(500, function(){
				$('#main').empty().append(data).fadeIn(500, function(){
					$('a.ajax', '#main').on('click', function(e) {
						e.preventDefault();
						ajaxify($(this).attr('href'));
					});
				});
			});

		},
		error: function(){
			// use old school redirection
		}
	});

	history.pushState({}, "", href);
}
