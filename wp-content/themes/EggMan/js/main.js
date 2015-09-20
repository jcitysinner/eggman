$(document).ready(function() {
  
  var menuWidth = 0;

  $('.menu .item').each(function() {

    menuWidth = menuWidth + $(this).outerWidth(true);

  });

  //$('.menu').width(menuWidth);


  // $.ajax({
    
  //   url: "http://data.streetfoodapp.com/1.1/vendors/egg-man",
  //   dataType: 'jsonp',
  //   success: function(results){
  //       console.log(results);
  //   }

  // });


  //  $.ajax({
  //     dataType: "JSONP",
  //     url: "http://data.streetfoodapp.com/1.1/vendors/egg-man",
  //     success: function(data) {
  //         console.log(data);
  //     },
  //     error: function(error) {
  //         console.log(error);
  //     }
  // });


  // $.ajax({
  //     dataType: "jsonp",
  //     url: themeurl + "/_objects/jsonp-wrapper.php",
  //     success: function(data) {
  //         $("#json-result").html(JSON.stringify(data));
  //     },
  //     error: function(error) {
  //         console.log(error);
  //     }
  // });


  $('.press .lmore').click(function() {

    console.log('test');


    $("<div>").load("media-posts", function() {
          $('.press ul .last').hide();
          $(".press ul").append($(this).html());
    });

    //$('.press ul').load('media-posts');

  });


  $("#contact-open-trigger").click(function(e) {

    e.preventDefault();

    $('body').css('overflow-y', 'hidden');

    $('.contact-form-wrap').fadeIn();

  });

  $("#contact-close").click(function(e) {

    e.preventDefault();

    $('body').css('overflow-y', 'auto');

    $('.contact-form-wrap').fadeOut();

  });
  

});


