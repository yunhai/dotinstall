var stripe = Stripe(STRIPE_KEY)
var elements = stripe.elements({ locale: 'ja' })

var style = {
    base: {
        color: '#32325d',
        iconColor: '#666EE8',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4',
        },
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a',
    },
}

var card = elements.create('cardNumber', {
    style: style,
    placeholder: 'カード番号',
})
card.mount('#card-number')

var cardExpiry = elements.create('cardExpiry', {
    style: style,
    placeholder: '月 / 年',
})
cardExpiry.mount('#card-expiry')

var cardCvc = elements.create('cardCvc', {
    style: style,
    placeholder: 'CVC',
})
cardCvc.mount('#card-cvc')

function stripeErrorHandler(event) {
    var displayError = document.getElementById('card-errors');

    if (event.error) {
        displayError.textContent = event.error.message
    } else {
        displayError.textContent = '';
    }

    if (event.complete) {
        switch (event.elementType) {
            case 'cardNumber':
                cardExpiry.focus();
                break;
            case 'cardExpiry':
                cardCvc.focus();
                break;
            default:
        }
    }
}

card.addEventListener('change', function(event) {
    
    stripeErrorHandler(event);
})

cardExpiry.addEventListener('change', function(event) {
    stripeErrorHandler(event);
})

cardCvc.addEventListener('change', function(event) {
    stripeErrorHandler(event);
})

function stripeTokenHandler(token) {
    var form = document.getElementById('j-payment-form')
    var hiddenInput = document.createElement('input')
    hiddenInput.setAttribute('type', 'hidden')
    hiddenInput.setAttribute('name', 'stripeToken')
    hiddenInput.setAttribute('value', token.id)
    form.appendChild(hiddenInput)
    form.submit()
}

$('#j-submit').on('click', function(event) {
    event.preventDefault()
    $target = $(event.currentTarget)
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            var errorElement = document.getElementById('card-errors')
            errorElement.textContent = result.error.message
        } else {
            const enable = $target.data('enable')
            if (typeof enable === 'undefined') {
                stripeTokenHandler(result.token)
            }
            $target.attr('data-enable', 0)
        }
    })
})
