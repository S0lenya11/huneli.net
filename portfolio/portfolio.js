// Select the form element
const form = document.querySelector('form');

// Add an event listener to the form
form.addEventListener('submit', function(event) {
  // Prevent the form from being submitted
  event.preventDefault();

  // Get the values of the form fields
  const email = document.querySelector('#email').value;
  const message = document.querySelector('#message').value;

  // Check if the email is in the correct format
  const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  if (!emailRegex.test(email)) {
    // If the email is not in the correct format, show an error message
    alert('Please enter a valid email address.');
    return;
  }

  // Check if the message is not empty
  if (message.trim() === '') {
    // If the message is empty, show an error message
    alert('Please enter a message.');
    return;
  }

  // If the form is valid, submit it
  form.submit();
});

// Select the list items
const listItems = document.querySelectorAll('li');

// Add an event listener to each list item
listItems.forEach(function(item) {
  item.addEventListener('click', function() {
    // Get the position of the target element
    const target = document.querySelector
