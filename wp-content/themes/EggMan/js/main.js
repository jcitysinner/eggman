$(document).ready(function() {



//
// Open/Close Contact form
//
//

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

//
// Scroll to Schedule
//
//

  $('#schedule-trigger').click(function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $(".schedule").offset().top
    }, 700);
  });


//
// Moves twitter posts around Insta
//
//
$('.twitter-wrapper .twitter:last-child').prev('div').andSelf().appendTo(".twitter-wrapper.post");


//
// Pulls in press articles via ajax
// Fucntion located in ???
//
  $('.press .lmore').click(function() {
    var currentWidth = $(this).outerWidth();
    //console.log(currentWidth);
    $(this).css("width",currentWidth + "px");
    $(this).text('Loading\u2026').append( '<div class="loading"><svg><use xlink:href="#egg-cross"></use></svg></div>' );

    $("<div>").load("media-posts", function() {
      var mdata = $(this).html();
      $('.press ul .last').fadeOut( "slow", function() {
        $(".press ul").append(mdata);
      });
    });

  });


//
// Pulls in menu items via ajax
// Fucntion located in _inc / items / _menu_functions.php
//

$('.type-items').click(function() {
  var postid = $(this).attr('data-postid');
  var $container = $(".menu_target");
  var data = {
    action: 'menu_item', // Call function
    post_id: postid // Pass post id data
  };

  if (!$(this).hasClass('active')) {
    $('.item.active').removeClass('active');
    $(this).toggleClass('active');
    $(this).append( '<div class="loading"><svg><use xlink:href="#egg-cross"></use></svg></div>' );

    $.post(ajaxurl, data, function(response){
      $container.html(response);
      //console.log(response);
      $container.slideDown().addClass('open');
      $('.item .loading').fadeOut( 'fast', function() {
        $('.item .loading').remove();
      });
    });

  } else {
    $container.slideUp().removeClass('open');
    $(this).toggleClass('active');
  }
  return false;
});

$(".menu_target").on("click", ".close", function() {
  $('.item.active').removeClass('active');
  $(".menu_target").slideUp().removeClass('open');
});



//
// Pulls in Staff items via ajax
// Fucntion located in
//
$('.meet').click(function() {
  var $container = $(".team_target");
  var data = {
    action: 'staff_archive', // Call function
  };

 var currentWidth = $(this).outerWidth();
  console.log(currentWidth);
  $(this).css("width",currentWidth + "px");
  $(this).text('Loading\u2026').append( '<div class="loading"><svg><use xlink:href="#egg-cross"></use></svg></div>' );

 var currentHeight = $('.team').outerHeight();
 $('.team').css("min-height",currentHeight + "px");

    $.post(ajaxurl, data, function(response){
      $('.pre_target').fadeOut( "slow", function() {
        $(".pre_target").remove();
        $container.html(response);
        $container.slideDown();
      });
      //console.log(response);
    });
  return false;
});





//
// Check Schedule
//
//

function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
  return time;
}

  function checkMin(data) {
    if (data.toString().length > 1) {
      return ':'+data;
    } else {
      return '';
    }
  }

  function checkHour(data) {
    if (data.toString() > 12) {
      return data - 12;
    } else {
      return data;
    }
  }

  function checkPAM(data) {
    if (data.toString() > 12) {
      return 'PM';
    } else {
      return 'AM';
    }
  }


  function setOpen(data) {

    var schedule = false;
    var months = ['Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec'];

    if (data.open.length) {
      schedule = true;
    } else {
      schedule = false;
    }


    if (schedule) {

      for (i = 0; i < data.open.length; i++) {
        var thisDateOpen = new Date(data.open[i].start*1000);
        var thisDateClose =  new Date(data.open[i].end*1000);
        var thisDateMonth = months[thisDateOpen.getMonth()];
        var thisDateDate = thisDateOpen.getDate();
        var thisDateOpenHour = thisDateOpen.getHours();
        var thisDateCloseHour = thisDateClose.getHours();
        var thisDateOpenMin = thisDateOpen.getMinutes();
        var thisDateCloseMin = thisDateClose.getMinutes();
        var thisLat = data.open[i].latitude;
        var thisLong = data.open[i].longitude;

        var scheduleList = $('.schedule dl').html() + '<dt>'+ thisDateMonth +' '+ thisDateDate +'</dt> <dd> <div><strong>'+checkHour(thisDateOpenHour)+checkMin(thisDateOpenMin)+checkPAM(thisDateOpenHour)+' - '+checkHour(thisDateCloseHour)+checkMin(thisDateCloseMin)+checkPAM(thisDateCloseHour)+'</strong>'+data.open[i].display+'<a href="http://maps.google.com/maps?z=18&q='+ thisLat +',' + thisLong +'"><svg><use xlink:href="#maps-icon"></use></svg><span>View on Google Maps</span></a></div> </dd>';
        $('.schedule dl').html(scheduleList);
      }




    } else {
      var html = $('.schedule dl').html() + '<dt>THIS WEEKS SCHEDULE WILL BE POSTED SHORTLY.</dt> <dd></dd>';
      $('.schedule dl').html(html);
    }


    if (schedule) {

      var status = false;
      var currentTime = Date.now()/1000;
      var currentTimePlus = currentTime + (12*60*60) ;
      var info;
      var currentOpen = new Date(data.open[0].start*1000).getHours();
      var currentClose =  new Date(data.open[0].end*1000).getHours();
      var currentOpenMin = new Date(data.open[0].start*1000).getMinutes();
      var currentCloseMin =  new Date(data.open[0].end*1000).getMinutes();
      var thisLatN = data.open[0].latitude;
      var thisLongN = data.open[0].longitude;
      info = data.open[0].display;


      if (data.open[0].start > currentTime && data.open[0].end > currentTime ){
        $('#status-copy').html('<span>Currently Closed. Will be open at '+checkHour(currentOpen)+checkMin(currentOpenMin)+checkPAM(currentOpen)+ '</span>' + info);
        $('.status .controls').prepend('<a href="http://maps.google.com/maps?z=18&q='+ thisLatN +',' + thisLongN +'"><svg><use xlink:href="#maps-icon"></use></svg><span>View on Google Maps</span></a>');
        $('.status .loading').remove();
      }

      if (data.open[0].start < currentTimePlus  ){
        $('#status-copy').html('<span> Will be open at '+checkHour(currentOpen)+checkMin(currentOpenMin)+checkPAM(currentOpen)+  '</span>' + info);
        $('.status .controls').prepend('<a href="http://maps.google.com/maps?z=18&q='+ thisLatN +',' + thisLongN +'"><svg><use xlink:href="#maps-icon"></use></svg><span>View on Google Maps</span></a>');
        $('.status .loading').remove();
        $('.status').addClass('soon');
        $('.status').removeClass('closed');
      }

      if (data.open[0].start < currentTime && data.open[0].end > currentTime ){
        $('#status-copy').html('<span>Open Now Until '+checkHour(currentClose)+checkMin(currentCloseMin)+checkPAM(currentClose)+ '</span>' + info);
        $('.status .controls').prepend('<a href="http://maps.google.com/maps?z=18&q='+ thisLatN +',' + thisLongN +'"><svg><use xlink:href="#maps-icon"></use></svg><span>View on Google Maps</span></a>');
        $('.status .loading').remove();
        $('.status').addClass('open');
        $('.status').removeClass('closed');
      }

    } else {

      $('#status-copy').html('<span>Currently Closed</span>Sorry, we\'re is closed right now!');
      $('.status .loading').remove();

    }



  }


  $.ajax({
      dataType: "jsonp",
      url: themeurl + "/_objects/jsonp-wrapper.php",
      success: function(data) {
        setOpen(data);
      },
      error: function(error) {
        console.log(error);
      }
  });






});


