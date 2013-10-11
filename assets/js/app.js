
var is_front_page;
var is_category;
var is_single;
var is_page;
var is_taxonomy;

$(document).ready(function() {
  $('#category_select a').click(function(e) {
    e.preventDefault();
    if(!$(this).hasClass('active')) {
      var target = $(this).attr('rel');
      $('#category_select a').removeClass('active');
      $(this).addClass('active');
      $('.post_list .' + target).fadeIn();      
      if (target == "book") {
        $('.post_list .film').fadeOut(function() {
          applyMasonry('.'+target, '.post_list');
        });
      } else if( target == "film") {
        $('.post_list .book').fadeOut(function() { 
          applyMasonry('.'+target, '.post_list');
        });
      } else {
        applyMasonry('.'+target, '.post_list');
      }
    }
  });

  /* _____ CATEGORY _____ */
  if(is_category == "true" ) {
    $(window).bind("load", function() {
      applyMasonry('.post_item_wrap', '.post_list');
    });
  }

  /* _____ TAXONOMY _____ */
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
