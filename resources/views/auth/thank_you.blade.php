<x-app-layout>
    <div class="container-fluid mx-auto my-24">
        {{-- @if(session('registrant'))
        @php
            $registrant = session('registrant');
        @endphp --}}
        @registered
            <h1 class="text-white text-9xl text-center">
                {{ __('Thank You!') }} 
            </h1>
            <h3 class="text-white text-center text-xl"> {{session('name') . ','}} {{ __('your registration has been submitted') }}</h3>

            <p class="text-center text-white mt-8">
                {{ __('Your registration code is ') }}{{session('code')}} {{ __('. Copy this code to use when making your payment.') }}
            </p>
            <p class="text-center text-white mt-4">
                {{ __('Please click the payment button below to confirm and secure your spot.') }}
            </p>
            <div class="text-center mt-5">
                <form id="payment-form" action="{{ route('profile.edit') }}" method="get">
                    @csrf
                    <x-primary-button class="dark:bg-lime-400" id="payment-button">Make Payment</x-primary-button>
                </form>
                
                <script>
                    document.getElementById('payment-button').addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent the form from submitting immediately
                
                        // Open the payment link in a new tab
                        window.open('https://spurropen.com/payment', '_blank');
                
                        // Submit the form after opening the link
                        document.getElementById('payment-form').submit();
                    });
                </script>
            </div>
        {{-- @else --}}
        @endregistered
            <p class="text-center dark:text-white text-2xl mt-40">
                {{ __('Registration not found.') }}
            </p>
            <p class="text-center dark:text-white text-xl mt-4">
                {{ __('You made not have registered or please contact a councilor for support.') }}
            </p>
        {{-- @endif --}}

    </div>
</x-app-layout>