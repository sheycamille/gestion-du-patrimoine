<div id="paypal-button-container"></div>
<script src="{{ asset('admin/js/paypal.js') }}" defer></script>
<script defer>
    document.addEventListener("DOMContentLoaded", function() {
        window.onload = function() {
            var amount = '{{ $amount }}';
            var route = '{{ route('account.liveaccounts') }}';
            paypalFunc(amount, route);
        }
    });
</script>
