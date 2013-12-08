/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referring to this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'mtk\'">' + entity + '</span>' + html;
	}
	var icons = {
		'mtk-behance': '&#x21;',
		'mtk-skype': '&#x22;',
		'mtk-instagram': '&#x23;',
		'mtk-spotify': '&#x24;',
		'mtk-pinterest': '&#x25;',
		'mtk-arrow-left': '&#xe600;',
		'mtk-arrow-down': '&#xe601;',
		'mtk-arrow-up': '&#xe602;',
		'mtk-arrow-right': '&#xe603;',
		'mtk-keyboard': '&#xe604;',
		'mtk-erase': '&#xe605;',
		'mtk-pencil': '&#xe606;',
		'mtk-youtube': '&#x26;',
		'mtk-home': '&#x27;',
		'mtk-group': '&#x28;',
		'mtk-heart': '&#x29;',
		'mtk-heart-empty': '&#x2a;',
		'mtk-mobile': '&#x2b;',
		'mtk-tablet': '&#x2c;',
		'mtk-laptop': '&#x2d;',
		'mtk-desktop': '&#x2e;',
		'mtk-ellipsis-vertical': '&#xe607;',
		'mtk-calendar-empty': '&#xe608;',
		'mtk-calendar': '&#xe609;',
		'mtk-linkedin': '&#x2f;',
		'mtk-soundcloud': '&#x30;',
		'mtk-github': '&#x31;',
		'mtk-google-plus': '&#x32;',
		'mtk-facebook': '&#x33;',
		'mtk-twitter': '&#x34;',
		'mtk-feed': '&#x35;',
		'mtk-deviantart': '&#x36;',
		'mtk-steam': '&#x37;',
		'mtk-forrst': '&#x38;',
		'mtk-dribbble': '&#x39;',
		'mtk-vimeo': '&#x3a;',
		'mtk-foursquare': '&#x3b;',
		'mtk-lastfm': '&#x3c;',
		'mtk-tumblr': '&#x3d;',
		'mtk-blogger': '&#x3e;',
		'mtk-wordpress': '&#x3f;',
		'mtk-flickr': '&#x40;',
		'mtk-grid': '&#x41;',
		'mtk-drawer': '&#x42;',
		'mtk-drawer2': '&#x43;',
		'mtk-earth': '&#x44;',
		'mtk-uniF7E4': '&#x45;',
		'mtk-uniF7E5': '&#x46;',
		'mtk-uniF7E6': '&#x47;',
		'mtk-location': '&#xe0a6;',
		'mtk-location2': '&#xe0a8;',
		'mtk-bubbles': '&#xe0e4;',
		'mtk-bubbles2': '&#xe0e6;',
		'mtk-bubbles3': '&#xe0e7;',
		'mtk-meter-slow': '&#xe182;',
		'mtk-meter-fast': '&#xe184;',
		'mtk-meter-medium': '&#xe183;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/mtk-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
