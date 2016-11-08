

    // page is now ready, initialize the calendar...

  // $('#userCalendar').fullCalendar({
  // // put your options and callbacks here
  // });
  // $('#userCalendar').fullCalendar({
  //   weekends: false // will hide Saturdays and Sundays
  // });
  // $('#userCalendar').fullCalendar({
  //   dayClick: function() {
  //   alert('a day has been clicked!');
  //   }
  // });
  $(document).ready(function() {
    
    (function($) {
      $(function() {
        $('.toggle-overlay').click(function() {
          $('aside').toggleClass('open');
        });
      });
    })(jQuery);


      $('#userCalendar').fullCalendar({
          googleCalendarApiKey: 'AIzaSyBiWG_Zp8Fmm8-kUaJRzGkYEGBzzH-X97s',
          events: {
              googleCalendarId: '0atlgl77nu11vhb4u4pb253bbc@group.calendar.google.com'
          },
          // weekends: false,
          firstDay: 1,
          weekNumbers: true,
          header: {
            left:   'today prev,next',
            center: 'title',
            right:  'basicWeek,month,basicDay,list'
          },
          businessHours: true,
          businessHours: {
              // days of week. an array of zero-based day of week integers (0=Sunday)
              dow: [ 1, 2, 3, 4, 5 ], // Monday - Friday

              start: '09:00', // a start time
              end: '14:00', // an end time
          },

      });
      $('.fc-button').show();
  });
