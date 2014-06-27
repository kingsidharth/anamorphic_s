
var is_front_page;
var is_category;
var is_single;
var is_page;
var is_taxonomy;

var documentData = new Object;


// 3 Value Array to RGB
var arrayRGB = function (array) {
  var rgb = 'rgb(';
  for (i = 0; i < array.length; i++) { 
    rgb += array[i];
    if(i < array.length -1) {
      rgb += ', ';
    }
  }
  rgb += ')';
  return rgb;
}

var arrayRGBA = function (array, opacity) {
  var rgba = 'rgba(';
  for (i = 0; i < array.length; i++) { 
    rgba += array[i];
    if(i < array.length -1) {
      rgba += ', ';
    }
  }

  rgba += ', ' + opacity;
  rgba += ')';
  return rgba;
}

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

  if (documentData.rating) {
    rateIt(documentData.rating, '.rating');
  }    

  documentData.imageHeight = $('#main_image_').height(); 
  documentData.mainImageUrl = $('#main_image_').attr('src');
  documentData.headlineAreaHeight = $('#headline_area').height();
  documentData.headlineAreaOffset = documentData.headlineAreaHeight + (16 * 5.2);

  $('.photo').css('top', (-1 * documentData.headlineAreaOffset) );
  $('.sidebar').css('padding-top', (documentData.imageHeight - documentData.headlineAreaOffset) );

  var background = new String;
  background += '<div id="background_area" ';
  if(documentData.mainImageUrl) {
    background += 'style="height: ';
    background += $('#header_area').outerHeight(true) + $('#headline_area').outerHeight(true) + 'px;"';
  } else {
    background += 'style="background-color: #0e2825; height:' + $('#header_area').outerHeight(true) + 'px;"' 
      + ' class="no-p_element"'; 
  }
  background += '>';
  background += '<div id="background" data-speed="10">&nbsp;</div></div><!-- #background_area -->';

  var jsGeneratedCSS = new String; 
  jsGeneratedCSS += '<style> ' + '#background:after { ';
  jsGeneratedCSS += 'background-image: url("' + documentData.mainImageUrl + '");'
  jsGeneratedCSS +=  '} </style>';

  $(document.body).append(jsGeneratedCSS);
  $(document.body).prepend(background);

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
