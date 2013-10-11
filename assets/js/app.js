

function frontPageScripts() {
  var show;

  $('#category_select a').click(function(e) {
    e.preventDefault();
    if(!this.hasClass('active') {
      this.parent().parent().children().children().removeClass('active');
      this.addClass('active');
      var show = this.attr('rel');
      if(show == "book") {
        $('.post_list .film').fadeOut();
      } else if (show =="film") {
        $('.post_list .book').fadeOut();
      } else {
        $('.post_list li').fadeIn();
      }
    }
  });
}
