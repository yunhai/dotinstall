var stripe = Stripe('pk_test_M7Bpxg5vJ03qNHHjsJoIo00V');
var elements = stripe.elements();

var style = {
  base: {
    iconColor: '#666EE8',
    color: '#31325F',
    lineHeight: '40px',
    fontWeight: 300,
    fontFamily: 'Helvetica Neue',
    fontSize: '15px',

    '::placeholder': {
      color: '#CFD7E0',
    },
  },
};

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
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// //
// var cardNumberElement = elements.create('cardNumber', {
//   style: style
// });
// cardNumberElement.mount('#card-number-element');
//
// var cardExpiryElement = elements.create('cardExpiry', {
//   style: style
// });
// cardExpiryElement.mount('#card-expiry-element');
//
// var cardCvcElement = elements.create('cardCvc', {
//   style: style
// });
// cardCvcElement.mount('#card-cvc-element');




function setOutcome(result) {
  var successElement = document.querySelector('.success');
  var errorElement = document.querySelector('.error');
  successElement.classList.remove('visible');
  errorElement.classList.remove('visible');

  if (result.token) {
    // In this example, we're simply displaying the token
    successElement.querySelector('.token').textContent = result.token.id;
    successElement.classList.add('visible');

    // In a real integration, you'd submit the form with the token to your backend server
    //var form = document.querySelector('form');
    //form.querySelector('input[name="token"]').setAttribute('value', result.token.id);
    //form.submit();
  } else if (result.error) {
    errorElement.textContent = result.error.message;
    errorElement.classList.add('visible');
  }
}

var cardBrandToPfClass = {
	'visa': 'pf-visa',
  'mastercard': 'pf-mastercard',
  'amex': 'pf-american-express',
  'discover': 'pf-discover',
  'diners': 'pf-diners',
  'jcb': 'pf-jcb',
  'unknown': 'pf-credit-card',
}

function setBrandIcon(brand) {
	var brandIconElement = document.getElementById('brand-icon');
  var pfClass = 'pf-credit-card';
  if (brand in cardBrandToPfClass) {
  	pfClass = cardBrandToPfClass[brand];
  }
  for (var i = brandIconElement.classList.length - 1; i >= 0; i--) {
  	brandIconElement.classList.remove(brandIconElement.classList[i]);
  }
  brandIconElement.classList.add('pf');
  brandIconElement.classList.add(pfClass);
}
//
// cardNumberElement.on('change', function(event) {
// 	// Switch brand logo
// 	if (event.brand) {
//   	setBrandIcon(event.brand);
//   }
//
// 	setOutcome(event);
// });

document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault();
  stripe.createToken(card).then(setOutcome);
});
