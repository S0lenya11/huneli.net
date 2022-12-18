// Get a reference to the button
var button = document.getElementById("startButton");

// Add an event listener to the button that will start the countdown when clicked
button.addEventListener("click", function() {
  // Prompt the user to select a date and time
  var date = prompt("Please select a date and time (e.g. 12/31/2022 23:59)");

  // Parse the user's input and convert it to a Date object
  var selectedDate = new Date(date);

  // Start counting back from the selected date and time
  setInterval(function() {
    // Decrement the selected date by one second
    selectedDate.setSeconds(selectedDate.getSeconds() - 1);

    // Display the updated date and time in the page
    document.getElementById("countdown").innerHTML = selectedDate;
  }, 1000);
});
