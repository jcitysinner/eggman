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

  function setOpen(data) {


    var open = false;

    if (data.open.length) {

      open = true;

    } else {

      open = false;

    }

    if (open) {

      var currentOpen = 0;
      var currentClose = 0;
      var soon = false;
      var currentTime = Date.now() / 1000;
      var info;
      var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

      console.log(currentTime);
      console.log(data.open[0].start);

      for (i = 0; i < data.open.length; i++) {

        if (data.open[i].start < currentTime && data.open[i].end > currentTime) {

          currentClose = data.open[i].end;
          info = data.open[i].display;
          soon = true;

        } else if (data.open[i].start > currentTime && soon == false) {

          currentClose = data.open[i].end;
          currentOpen = data.open[i].start;
          soon = true;

        }

        var thisDateOpen = new Date(data.open[i].start*1000);
        var thisDateClose =  new Date(data.open[i].end*1000);
        var thisDateMonth = months[thisDateOpen.getMonth()];
        var thisDateDate = thisDateOpen.getDate();
        var thisDateOpenHour = thisDateOpen.getHours();
        var thisDateCloseHour = thisDateClose.getHours();

        if (thisDateOpenHour > 12) {

          thisDateOpenHour = thisDateOpenHour - 12 + 'PM';

        } else if (thisDateOpenHour === 0) {

          thisDateOpenHour = '12AM';

        } else {

          thisDateOpenHour = thisDateOpenHour + 'AM';

        }

         if (thisDateCloseHour > 12) {

          thisDateCloseHour = thisDateCloseHour - 12 + 'PM';

        } else if (thisDateCloseHour === 0) {

          thisDateCloseHour = '12AM';

        } else {

          thisDateCloseHour = thisDateCloseHour + 'AM';

        }

        var html = $('.schedule dl').html() + '<dt>'+ thisDateMonth +' '+ thisDateDate +'</dt><dd><div><strong>'+thisDateOpenHour+' - '+thisDateCloseHour+'</strong>'+data.open[i].display+'<a href="#"><svg><use xlink:href="#maps-icon"></use></svg><span>View on Google Maps</span></a></div></dd>';

        $('.schedule dl').html(html);

      }

      if (currentClose === 0) {

        $('#status-copy').html('<span>Currently Closed</span>Sorry, The Eggman Truck is closed right now!');

      } else if(currentOpen !== 0){

        console.log(currentOpen);
        var date = new Date(currentOpen*1000);
        var hours = date.getHours();

        if (hours > 12) {

          hours = hours - 12 + 'PM';

        } else if (hours === 0) {

          hours = '12AM';

        } else {

          hours = hours + 'AM';

        }

        $('#status-copy').html('<span>Currently Closed</span>We will be open again at ' + hours + '!');
        $('.status').removeClass('closed');
        $('.status').addClass('soon');

      } else {

        var date = new Date(currentClose*1000);
        var hours = date.getHours();

        if (hours > 12) {

          hours = hours - 12 + 'PM';

        } else if (hours === 0) {

          hours = '12AM';

        } else {

          hours = hours + 'AM';

        }

        $('#status-copy').html('<span>Open Now Until ' + hours + '</span>' + info);
        $('.status').removeClass('closed');
        $('.status').addClass('open');


      }

    } else {

      $('#status-copy').html('<span>Currently Closed</span>Sorry, The Eggman Truck is closed right now!');

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


