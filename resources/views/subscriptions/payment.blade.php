@extends('layouts.cfe')
@push('js')
<script src="https://js.stripe.com/v3/"></script>
@endpush

@php
$url = Request::URL();
$url_details = explode("/",$url);
//print_r($url_details);
$chosen_plan = $url_details[4];
//echo $chosen_plan;
@endphp
@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
			@php
			$plan = \App\Models\Plans::where('identifier',$chosen_plan)->first();
			@endphp
			{{ $plan->title }} Subscription Plan
                    </div>
                </div>

<div class="bg-gray-200 bg-opacity-25 grid  ">
<div class="p-6 sm:px-10 bg-white border-b border-gray-200">
        <div class="ml-12">
		<div class="card">
                <!--div class="card-header">{{ __('Checkout page') }}</div-->

                <div class="card-body">
                    <form id="payment-form" action="/savepayments" method="POST">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="card-holder-name" value="" placeholder="Name on the card">
                        </div>

<div> &nbsp;</div>
                        <div class="form-group">
                            <label for="">Card details</label>
                            <div id="card-element" class="StripeElement"></div>
                        </div>

<div> &nbsp;</div>

                        <button type="submit" class="btn btn-primary w-100 ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transitio" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>

                    </form>
                </div>
            </div>

<div> &nbsp;</div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout page') }}</div>

                <div class="card-body">
                    <form id="payment-form" action="/savepayments" method="POST">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                        </div>
                        <div class="form-group">
                            <label for="">Card details</label>
                            <div id="card-element"></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<script src="https://js.stripe.com/v3/"></script>
<script>
    //const stripe = Stripe('{{ config('cashier.key') }}')
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')

            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit();
        }
    })
</script>
@endsection

