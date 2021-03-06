/*!
*
* ProfeC.net Photo Gallery Development JavaScripts
* Generated: 2014-07-23 @ 21:06:20
*
*/



$(document).foundation();

// Justified Images
$(window).load(function(){

    // collect
    bestHeight = 200;
    images = $('#gallery img').toArray();
    maxWidth = $('#content').width();

    // resize
    justifiedImageRows(bestHeight, images, maxWidth);
});

// Freewall
var wall = new freewall("#free-wall");
wall.reset({
    selector: '.brick',
    animate: false,
    cache: false,
    cellW: 250,
    cellH: 250,
    fixSize: null,
    gutterY: 15,
    gutterX: 15,
    onResize: function() {
        wall.fitWidth();
    }
});

// wall.container.find('.brick img').load(function() {
//     wall.fitWidth();
// });


// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; args.callee = args.callee.caller; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());


// place any jQuery/helper plugins in here, instead of separate, slower script files.


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