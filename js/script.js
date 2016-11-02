$(document).ready(function() {

    // page is now ready, initialize the calendar...

  $('#userCalendar').fullCalendar({
  // put your options and callbacks here
  });
  $('#userCalendar').fullCalendar({
    weekends: false // will hide Saturdays and Sundays
  });
  $('#userCalendar').fullCalendar({
    dayClick: function() {
    alert('a day has been clicked!');
    }
  });

});
