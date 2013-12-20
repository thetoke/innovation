
$(document).ready(function() {

	$('#secondary, .site-title, .site-footer').hover(function(){
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

	$('.site-title').css('background-image', $('h1:first-child', '#main').css('background-image'));
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
					$('.site-title').css('background-image', $('h1:first-child', '#main').css('background-image'));
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
