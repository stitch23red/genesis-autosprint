jQuery(document).ready(function() {
  // Date to count down to
  var countDownDate = new Date("Apr 1, 2020 09:00:00").getTime();

  var x = setInterval(function() {
    //Get todays date and time
    var now = new Date().getTime();

    // Find distance of time between now and the count down date
    var distance = countDownDate - now;

    //Calculations for days, hours, minutes and seconds
    var days = "-";
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="c1"
    if (distance >=0) {
        document.getElementById("c1d").innerHTML = days;
        //document.getElementById("c1h").innerHTML = hours;
        //document.getElementById("c1m").innerHTML = minutes;
    }



    // If the count down is finished, write some text
    if (distance < 0) {
     clearInterval(x);
     document.getElementById("c1exp").innerHTML = ": EXPIRED";
    }
  }, 5000);

});
