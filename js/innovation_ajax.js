var Konami = function (callback) {
	var konami = {
		addEvent: function (obj, type, fn, ref_obj) {
			if (obj.addEventListener)
				obj.addEventListener(type, fn, false);
			else if (obj.attachEvent) {
				// IE
				obj["e" + type + fn] = fn;
				obj[type + fn] = function () {
					obj["e" + type + fn](window.event, ref_obj);
				}
				obj.attachEvent("on" + type, obj[type + fn]);
			}
		},
		input: "",
		pattern: "38384040373937396665",
		load: function (link) {
			this.addEvent(document, "keydown", function (e, ref_obj) {
				if (ref_obj) konami = ref_obj; // IE
				konami.input += e ? e.keyCode : event.keyCode;
				if (konami.input.length > konami.pattern.length)
					konami.input = konami.input.substr((konami.input.length - konami.pattern.length));
				if (konami.input == konami.pattern) {
					konami.code(link);
					konami.input = "";
					e.preventDefault();
					return false;
				}
			}, this);
			this.iphone.load(link);
		},
		code: function (link) {
			window.location = link
		},
		iphone: {
			start_x: 0,
			start_y: 0,
			stop_x: 0,
			stop_y: 0,
			tap: false,
			capture: false,
			orig_keys: "",
			keys: ["UP", "UP", "DOWN", "DOWN", "LEFT", "RIGHT", "LEFT", "RIGHT", "TAP", "TAP"],
			code: function (link) {
				konami.code(link);
			},
			load: function (link) {
				this.orig_keys = this.keys;
				konami.addEvent(document, "touchmove", function (e) {
					if (e.touches.length == 1 && konami.iphone.capture == true) {
						var touch = e.touches[0];
						konami.iphone.stop_x = touch.pageX;
						konami.iphone.stop_y = touch.pageY;
						konami.iphone.tap = false;
						konami.iphone.capture = false;
						konami.iphone.check_direction();
					}
				});
				konami.addEvent(document, "touchend", function (evt) {
					if (konami.iphone.tap == true) konami.iphone.check_direction(link);
				}, false);
				konami.addEvent(document, "touchstart", function (evt) {
					konami.iphone.start_x = evt.changedTouches[0].pageX;
					konami.iphone.start_y = evt.changedTouches[0].pageY;
					konami.iphone.tap = true;
					konami.iphone.capture = true;
				});
			},
			check_direction: function (link) {
				x_magnitude = Math.abs(this.start_x - this.stop_x);
				y_magnitude = Math.abs(this.start_y - this.stop_y);
				x = ((this.start_x - this.stop_x) < 0) ? "RIGHT" : "LEFT";
				y = ((this.start_y - this.stop_y) < 0) ? "DOWN" : "UP";
				result = (x_magnitude > y_magnitude) ? x : y;
				result = (this.tap == true) ? "TAP" : result;

				if (result == this.keys[0]) this.keys = this.keys.slice(1, this.keys.length);
				if (this.keys.length == 0) {
					this.keys = this.orig_keys;
					this.code(link);
				}
			}
		}
	}

	typeof callback === "string" && konami.load(callback);
	if (typeof callback === "function") {
		konami.code = callback;
		konami.load();
	}

	return konami;
};

function ajaxify(href){
	$.ajax({
		url: href,
		data: {ajax: 1},
		beforeSend: function() {
			$('.spinner').removeClass('bounceOut').addClass('animated bounceIn');
			$('#main').removeClass('fadeIn').addClass('fadeOut');
			if ($(window).scrollTop() !== 0){
				$('body, html').animate({
					scrollTop: 0
				}, 1000);
			}
		},
		success: function(data) {
			$('.spinner').removeClass('bounceIn').addClass('bounceOut');
			$('#main').empty().append(data).show(function(){
				$(this).removeClass('fadeOut').addClass('fadeIn');
				$('.site-title').css('background-image', "url("+$('h1:first-child', '#main').attr('data-bgi')+")");
				$('.spinner').removeClass('animated');
					$("a", ".post-navigation").each(function(){
					$(this).addClass('ajax');
				});
				$("a", ".entry-meta").each(function(){
					if (!$(this).hasClass('post-edit-link')) $(this).addClass('ajax');
				});
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

var easter_egg = new Konami();
easter_egg.code = function() { console.log('Seinfeld logic here!'); }
easter_egg.load();

$(document).ready(function() {

	if ($(window).innerWidth() <= 992) {
		$('body').addClass('overflow-fix');
	}

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
			$('body').toggleClass('overflow-fix');
			$('.frame').toggleClass('collapsed');
		}
	});

	$("a", ".post-navigation").each(function(){
		$(this).addClass('ajax');
	});

	$("a", ".entry-meta").each(function(){
		if (!$(this).hasClass('post-edit-link')) $(this).addClass('ajax');
	});

	$('a.ajax').on('click', function(e) {
		e.preventDefault();
		$('li', '#secondary').removeClass('active');
		if ($(window).innerWidth() <= 992) {
			$('body').removeClass('overflow-fix');
		}
		$(this).parent().addClass('active');
		ajaxify($(this).attr('href'));
	});

	$('.site-title').css('background-image', "url("+$('h1:first-child', '#main').attr('data-bgi')+")");
});
