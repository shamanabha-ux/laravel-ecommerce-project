<script src="https://js.stripe.com/v3/"></script>

<h3>Total: ₹{{ $total }}</h3>

<form id="payment-form">
    <div id="card-element"></div>
    <button type="submit">Pay Now</button>
</form>

<script>
const stripe = Stripe("{{ env('STRIPE_KEY') }}");
const elements = stripe.elements();
const card = elements.create('card');

card.mount('#card-element');

document.getElementById('payment-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const {error, paymentIntent} = await stripe.confirmCardPayment(
        "{{ $clientSecret }}",
        {
            payment_method: {
                card: card
            }
        }
    );

    if (error) {
        alert(error.message);
    } else {
       // window.location.href = "/payment-success";
        window.location.href = "/payment-success?order_id={{ $order_id }}";
    }
});
</script>