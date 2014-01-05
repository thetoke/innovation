var Konami = function (callback) {
	var konami = {
		addEvent: function (obj, type, fn, ref_obj) {
			if (obj.addEventListener) {
				obj.addEventListener(type, fn, false);
			}
			else if (obj.attachEvent) {
				// IE
				obj["e" + type + fn] = fn;
				obj[type + fn] = function () {
					obj["e" + type + fn](window.event, ref_obj);
				};
				obj.attachEvent("on" + type, obj[type + fn]);
			}
		},
		input: "",
		pattern: "38384040373937396665",
		load: function (link) {
			this.addEvent(document, "keydown", function (e, ref_obj) {
				if (ref_obj) { konami = ref_obj; }
				konami.input += e ? e.keyCode : event.keyCode;
				if (konami.input.length > konami.pattern.length){
					konami.input = konami.input.substr((konami.input.length - konami.pattern.length));
				}
				if (konami.input === konami.pattern) {
					konami.code(link);
					konami.input = "";
					e.preventDefault();
					return false;
				}
			}, this);
			this.iphone.load(link);
		},
		code: function (link) {
			window.location = link;
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
					if (e.touches.length === 1 && konami.iphone.capture === true) {
						var touch = e.touches[0];
						konami.iphone.stop_x = touch.pageX;
						konami.iphone.stop_y = touch.pageY;
						konami.iphone.tap = false;
						konami.iphone.capture = false;
						konami.iphone.check_direction();
					}
				});
				konami.addEvent(document, "touchend", function () {
					if (konami.iphone.tap === true) { konami.iphone.check_direction(link); }
				}, false);
				konami.addEvent(document, "touchstart", function (evt) {
					konami.iphone.start_x = evt.changedTouches[0].pageX;
					konami.iphone.start_y = evt.changedTouches[0].pageY;
					konami.iphone.tap = true;
					konami.iphone.capture = true;
				});
			},
			check_direction: function (link) {
				var x_magnitude = Math.abs(this.start_x - this.stop_x),
				y_magnitude = Math.abs(this.start_y - this.stop_y),
				x = ((this.start_x - this.stop_x) < 0) ? "RIGHT" : "LEFT",
				y = ((this.start_y - this.stop_y) < 0) ? "DOWN" : "UP",
				result = (x_magnitude > y_magnitude) ? x : y;
				result = (this.tap === true) ? "TAP" : result;

				if (result === this.keys[0]) { this.keys = this.keys.slice(1, this.keys.length); }
				if (this.keys.length === 0) {
					this.keys = this.orig_keys;
					this.code(link);
				}
			}
		}
	};

	typeof callback === "string" && konami.load(callback);
	if (typeof callback === "function") {
		konami.code = callback;
		konami.load();
	}

	return konami;
};

var scrollBottom = function(){
	return $(document).height() - $(window).height() - $(window).scrollTop();
}

var canHandleOrientation;
if (window.DeviceOrientationEvent) {
    window.addEventListener("deviceorientation", handleOrientation, false);
}

function handleOrientation(event){
  alert("Orientation:" + event.alpha + ", " + event.beta + ", " + event.gamma);
  canHandleOrientation = event; // will be either null or with event data
}

function uQSP(uri, key, value) {
  var re = new RegExp("([?|&])" + key + "=.*?(&|$)", "i");
  separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  }
  else {
    return uri + separator + key + "=" + value;
  }
}

// Title bug for ajax
var setTitle = function(value) { $('title', 'head').text(value); };

var setBodyClass = function(value) { $('body').removeClass().addClass(value); };

// ajaxification (if the browser supports history.pushState)
function ajaxify(href) {

	$('.spinner').removeClass('bounceOut').addClass('animated bounceIn');

	$('.site-title').fadeOut();
	$('#primary').removeClass('bounceInUp').addClass('animated bounceOutDown');

	if ($(window).scrollTop() !== 0){
		$('body, html').animate({
			scrollTop: 0
		}, 0);
	}

	if ($(window).innerWidth() <= 992) {
		$('.frame').addClass('collapsed');
	}
	$('#main').load(uQSP(href, "ajax", 1), {ajax: 1}, function(responseText, textStatus, XMLHttpRequest) {
		setTimeout(function(){$('#primary').removeClass('bounceOutDown').addClass('bounceInUp'); $('.site-footer').css({ transform: "translateY(" + scrollBottom()/2 + "px)" }); }, 600);
		$('.frame').addClass('collapsed');
		$('.spinner').removeClass('bounceIn').addClass('bounceOut');

		$("a", ".post-navigation").each(function(){
			$(this).addClass('ajax');
		});

		$('a.ajax', '#main').on('click', function(e) {
			e.preventDefault();
			$('li', '#secondary').removeClass('active');
			ajaxify($(this).attr('href'));
		});

		$('a', '.post-preview').on('click',function(){
			$(this).addClass('animated flipOutY')
		});

		setTimeout(function(){$('.site-title').css('background-image', "url("+$('h1:first-child', '#main').attr('data-bgi')+")").fadeIn(150); }, 300);

		history.pushState({}, "", href);
	});
}

// Konami
var easter_egg = new Konami(),
konamighost,
konamisound;
easter_egg.code = function() {
	if (!$('.konami').hasClass('active')) {
		$('.konami').addClass('active');
		konamighost = setInterval(function () {
			$('.ghost').toggleClass('step2');
		}, 500);
	}
	else {
		var node = $('.ghost', '.konami').first().clone();
		node.css("top", (Math.ceil(Math.random() * 90) + 5)+"%");
		$('.konami').append(node.clone(true));
	}
	konamisound.play();
};
easter_egg.load();

$(document).ready(function() {

	// if the screen size is small
	if ($(window).innerWidth() <= 992) {
		$('body').removeClass('overflow-fix');
		$('.frame').addClass('collapsed');
	} // if the screen size is large
	else {
		$('.site-footer').css({ transform: "translateY(" + scrollBottom()/2 + "px)" });
	}

	// parallax header
	$(window).scroll(function() {
		if ($(window).innerWidth() > 992) {
			var scroll = $(window).scrollTop(), slowScroll = scroll/2;
			$('.site-title').css({ transform: "translateY(-" + slowScroll + "px)" });
			$('.entry-title').css("background-position", "0 -" + slowScroll + "px");
		}
	});

	// parallax footer
	$(window).scroll(function() {
		if ($(window).innerWidth() > 992) {
			var scroll = scrollBottom(), slowScroll = scroll/2;
			$('.site-footer').css({ transform: "translateY(" + slowScroll + "px)" });
		}
	});

	$(window).resize(function(){
		if ($(window).innerWidth() <= 992) {
			$('.site-footer, .site-header').css({ transform: "translateY(0px)" });
			$('.entry-title').css("background-position", "0 0");
		}
	});

	if (canHandleOrientation) {
		alert("device orientation");
		$('body').addClass('hellyesdeviceorientation');
		window.addEventListener('deviceorientation', function(eventData) {
			if ($(window).innerWidth() <= 992) {
				var yTilt = Math.round((-eventData.beta + 90) * (40/180));
				var xTilt = Math.round(-eventData.gamma * (20/180));
				if (xTilt > 0) {
					xTilt = -xTilt;
				} else if (xTilt < -40) {
					xTilt = -(xTilt + 80);
				}

				var backgroundPositionValue = yTilt + 'px ' + xTilt + "px";
				$('.entry-title').css("background-position", backgroundPositionValue);
			}
		}, false);
	}

	// Toggles collapsed class to nav (desktop)
	$('#secondary').hover(function() {
		if ($(window).innerWidth() > 992) {
			$('.frame').removeClass('collapsed');
		}
	}, function() {
		if ($(window).innerWidth() > 992) {
			$('.frame').addClass('collapsed');
		}
	});

	// Toggles collapsed class to nav (mobile)
	$('h1.widget-title').click(function(){
		if ($(window).innerWidth() <= 992) {
			if ($('.frame').hasClass('collapsed')) {
				$('body').addClass('overflow-fix');
				$('.frame').removeClass('collapsed');
			} else {
				$('body').removeClass('overflow-fix');
				$('.frame').addClass('collapsed');
			}
		}
	});

	// adds ajax class to links after content and before comments (@TODO: Add this on the server instead of client)
	$("a", ".post-navigation").each(function(){
		$(this).addClass('ajax');
	});

	// adds ajax class to links after content and before comments (@TODO: Add this on the server instead of client)
	$("a", ".entry-meta").each(function(){
		if (!$(this).hasClass('post-edit-link')) { $(this).addClass('ajax'); }
	});

	// Make ajax request
	$('a.ajax').on('click', function(e) {
		e.preventDefault();
		$('.frame').addClass('collapsed');
		$('li', '#secondary').removeClass('active');
		if ($(window).innerWidth() <= 992) {
			$('body').removeClass('overflow-fix');
		}
		$(this).parent().addClass('active');
		ajaxify($(this).attr('href'));
	});

	// update BG image on site
	$('.site-title').css('background-image', "url("+$('h1:first-child', '#main').attr('data-bgi')+")");

	// preload konami sound
	konamisound = soundManager.createSound({
		id: 'boo',
		url: $("audio", ".konami").attr("src"),
		autoLoad: true,
		autoPlay: false,
		onload: function() {
			// move konami stuff below up
		},
		volume: 75
	});

});
