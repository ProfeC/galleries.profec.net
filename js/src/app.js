
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

