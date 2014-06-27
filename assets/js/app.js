
var is_front_page;
var is_category;
var is_single;
var is_page;
var is_taxonomy;

var rateIt = function(ele, rating, noStar, rating_float) {
  if(rating % 1 === 0) {
    for (var i = 0; i < rating; i++) {
      ele.append('<i class="icon icon-star"></i> ');
    }
    for (var i = 0; i < noStar; i++) {
      ele.append('<i class="icon icon-star-empty"></i> ');
    }
  } else {
    rating = Math.round(rating) - 1; // Set rating to rounded down.
    noStar = 4 - rating;
    for (var i = 0; i < rating; i++) {
      ele.append('<i class="icon icon-star"></i> ');
    }
    ele.append('<i class="icon icon-star-half-full"></i> ');
    for (var i = 0; i < noStar; i++) {
      ele.append('<i class="icon icon-star-empty"></i> ');
    }
  }
}

$(document).ready(function() {

  if(is_category == "true" ) {
    $(window).bind("load", function() {
      applyMasonry('.post_item_wrap', '.post_list');
    });
  }

  if(is_single) {
    $('.rating').empty(); 
    rateIt($('.rating'), rating, noStar, rating_float);
  }

});

$(window).bind("load", function() {
  applyMasonry('li', '.post_list'); 
});

function applyMasonry(innerSelector, outerSelector) {
  if(Masonry) {
    $container = $(outerSelector).masonry();
    $container.masonry({
      itemSelector: innerSelector, 
    });
  }
}
