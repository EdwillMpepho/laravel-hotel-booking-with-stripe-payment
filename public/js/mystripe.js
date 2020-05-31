

(function() {
    // Create a Stripe client.
var stripe = Stripe('you own information');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
 base: {
   color: '#32325d',
   fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
   fontSmoothing: 'antialiased',
   fontSize: '16px',
   '::placeholder': {
     color: '#aab7c4'
   }
 },
 invalid: {
   color: '#fa755a',
   iconColor: '#fa755a'
 }
};

// Create an instance of the card Element.
var card = elements.create('card', {
    style: style,
    hidePostalCode:true
   });

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
 var displayError = document.getElementById('card-errors');
 if (event.error) {
   displayError.textContent = event.error.message;
 } else {
   displayError.textContent = '';
 }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
 event.preventDefault();
 // disable submit button for a case of a double click
  document.getElementById('btnPayment').disable = true;
 // some additional data
  var data = {
     name: document.getElementById('name').value,
     address: document.getElementById('address').value,
     telno: document.getElementById('telno').value
  };


 stripe.createToken(card,data).then(function(result) {
   if (result.error) {
     // Inform the user if there was an error.
     var errorElement = document.getElementById('card-errors');
     errorElement.textContent = result.error.message;
     document.getElementById('btnPayment').disable = false;
   } else {
     // Send the token to your server.
     stripeTokenHandler(result.token);

   }
 });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
 // Insert the token ID into the form so it gets submitted to the server
 var form = document.getElementById('payment-form');
 var hiddenInput = document.createElement('input');
 hiddenInput.setAttribute('type', 'hidden');
 hiddenInput.setAttribute('name', 'stripeToken');
 hiddenInput.setAttribute('value', token.id);
 form.appendChild(hiddenInput);
  console.log(token);
 // Submit the form
  form.submit();
}
})();
