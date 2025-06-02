<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

    
<div class="container">
    <h1 class="text-center">Pay using your Card</h1>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details -Total $ {{ $totalprice }}</h3>
                </div>

                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form id="payment-form" method="POST" action="{{ route('stripe.post',$totalprice) }}">
                        @csrf

                        <div class="form-group">
                            <label>Name on Card</label>
                            <input type="text" class="form-control" name="card_name" required>
                        </div>

                        <div class="form-group">
                            <label>Card Information</label>
                            <div id="card-element" class="form-control" style="padding:10px;"></div>
                            <div id="card-errors" class="text-danger mt-2" role="alert"></div>
                        </div>

                        <input type="hidden" name="stripeToken" id="stripeToken">

                        <div class="form-group mt-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const card = elements.create("card", { hidePostalCode: true });
    card.mount("#card-element");

    const form = document.getElementById("payment-form");

    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        const {token, error} = await stripe.createToken(card);

        if (error) {
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            document.getElementById('stripeToken').value = token.id;
            form.submit();
        }
    });
</script>
</body>
</html>
