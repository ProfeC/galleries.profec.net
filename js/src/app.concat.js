/*!
*
* ProfeC.net Photo Gallery Development JavaScripts
* Generated: 2014-07-08 @ 07:45:19
*
*/



$(document).foundation();

// Start Google Analytics
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-524508-1']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
// End Google Analytics

var container = document.querySelector('#masonry');
var msnry = new Masonry( container, {
  // options...
  itemSelector: '.item',
  columnWidth: 200,
  gutter: 13
});

// Start of Woopra Code
/*
function woopraReady(tracker) {
	tracker.setDomain('profec.net');
	tracker.setIdleTimeout(600000);
	tracker.trackPageview({type:'pageview',url:window.location.pathname+window.location.search,title:document.title});
	return false;
}

(function() {
	var wsc = document.createElement('script');
	wsc.src = document.location.protocol+'//static.woopra.com/js/woopra.js';
	wsc.type = 'text/javascript';
	wsc.async = true;
	var ssc = document.getElementsByTagName('script')[0];
	ssc.parentNode.insertBefore(wsc, ssc);
})();
*/
// End of Woopra Code