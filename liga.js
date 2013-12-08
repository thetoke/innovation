/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
	'use strict';
	function supportsProperty(p) {
		var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
			i,
			div = document.createElement('div'),
			ret = p in div.style;
		if (!ret) {
			p = p.charAt(0).toUpperCase() + p.substr(1);
			for (i = 0; i < prefixes.length; i += 1) {
				ret = prefixes[i] + p in div.style;
				if (ret) {
					break;
				}
			}
		}
		return ret;
	}
	var icons;
	if (!supportsProperty('fontFeatureSettings')) {
		icons = {
			'behance': '&#x21;',
			'skype': '&#x22;',
			'instagram': '&#x23;',
			'spotify': '&#x24;',
			'pinterest': '&#x25;',
			'youtube': '&#x26;',
			'linkedin': '&#x2f;',
			'soundcloud': '&#x30;',
			'github': '&#x31;',
			'googleplus': '&#x32;',
			'facebook': '&#x33;',
			'twitter': '&#x34;',
			'rssfeed': '&#x35;',
			'deviantart': '&#x36;',
			'steam': '&#x37;',
			'forrst': '&#x38;',
			'dribble': '&#x39;',
			'vimeo': '&#x3a;',
			'foursquare': '&#x3b;',
			'lastfm': '&#x3c;',
			'tumblr': '&#x3d;',
			'blogger': '&#x3e;',
			'wordpress': '&#x3f;',
			'flickr': '&#x40;',
			'0': 0
		};
		delete icons['0'];
		window.icomoonLiga = function (els) {
			var classes,
				el,
				i,
				innerHTML,
				key;
			els = els || document.getElementsByTagName('*');
			if (!els.length) {
				els = [els];
			}
			for (i = 0; ; i += 1) {
				el = els[i];
				if (!el) {
					break;
				}
				classes = el.className;
				if (/mtk-/.test(classes)) {
					innerHTML = el.innerHTML;
					if (innerHTML && innerHTML.length > 1) {
						for (key in icons) {
							if (icons.hasOwnProperty(key)) {
								innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
							}
						}
						el.innerHTML = innerHTML;
					}
				}
			}
		};
		window.icomoonLiga();
	}
}());