
var is_front_page;
var is_category;
var is_single;
var is_page;
var is_taxonomy;

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
