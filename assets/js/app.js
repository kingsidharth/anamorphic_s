
var is_front_page;
var is_category;
var is_single;
var is_page;
var is_taxonomy;


// Rating Display Functions
var rating, rating_float, noStar;
var rateIt = function(rating, targetElement) {
  var noStar = 5 - rating;
  var rating_float = Math.round(rating*10)/10;
  var ratingHTML = "";

  if(rating % 1 === 0) {
    // If Full Rating (No Half-Star)
    for (var i = 0; i < rating; i++) {
      ratingHTML += "<i class=\"icon icon-star\"></i> ";
    }
    for (var i = 0; i < noStar; i++) {
      ratingHTML += "<i class=\"icon icon-star-empty\"></i> ";
    }
  } else {
    rating = Math.round(rating) - 1; // Set rating to rounded down.
    noStar = 4 - rating;
    for (var i = 0; i < rating; i++) {
      ratingHTML += "<i class=\"icon icon-star\"></i> ";
    }
    ratingHTML += "<i class=\"icon icon-star-half-full\"></i> ";
    for (var i = 0; i < noStar; i++) {
      ratingHTML += "<i class=\"icon icon-star-empty\"></i> ";
    }
  }

  $(targetElement).empty().html(ratingHTML);

  return $(targetElement);
}

$(document).ready(function() {

  if(is_category == "true" ) {
    $(window).bind("load", function() {
      applyMasonry('.post_item_wrap', '.post_list');
    });
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
