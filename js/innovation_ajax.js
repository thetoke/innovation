function ajaxify(href){
	$.ajax({
		url: href,
		data: {ajax: 1},
		beforeSend: function() {
			$('.spinner').removeClass('bounceOut').addClass('animated bounceIn');
			$('#main').removeClass('fadeIn').addClass('fadeOut');
			$('body, html').animate({
				scrollTop: 0
			}, 1000);
		},
		success: function(data) {
			$('.spinner').removeClass('bounceIn').addClass('bounceOut');
			$('#main').empty().append(data).delay(500).show(function(){
				$(this).removeClass('fadeOut').addClass('fadeIn');
				$('.site-title').css('background-image', $('h1:first-child', '#main').css('background-image'));
				$('a.ajax', '#main').on('click', function(e) {
					e.preventDefault();
					ajaxify($(this).attr('href'));
				});
			});
			$('.frame').addClass('collapsed');
		},
		error: function(){
			// use old school redirection
		}
	});

	history.pushState({}, "", href);
}

$(document).ready(function() {

	$('#secondary, .site-title, .site-footer').hover(function(){
		if ($(window).innerWidth() > 992) {
			$('.frame').removeClass('collapsed');
		}
	}, function() {
		if ($(window).innerWidth() > 992) {
			$('.frame').addClass('collapsed');
		}
	});

	$('h1.widget-title').click(function(){
		if ($(window).innerWidth() <= 992) {
			$('.frame').toggleClass('collapsed');
		}
	});

	$('a.ajax').on('click', function(e) {
		e.preventDefault();
		$('li', '#secondary').removeClass('active');
		$(this).parent().addClass('active');
		ajaxify($(this).attr('href'));
	});

	$('.site-title').css('background-image', $('h1:first-child', '#main').css('background-image'));
});
