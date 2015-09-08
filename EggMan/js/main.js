$(document).ready(function() {
  
  var menuWidth = 0;

  $('.menu .item').each(function() {

    menuWidth = menuWidth + $(this).outerWidth(true);

  });

  $('.menu').width(menuWidth);

});