<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</head>
<body>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = '/thank_you';
                },
                onPending: function(result) {
                    alert('Waiting for your payment!');
                },
                onError: function(result) {
                    alert('Payment failed!');
                },
                onClose: function() {
                    alert('You closed the popup without finishing the payment');
                }
            });
        };
    </script>
</body>
</html>
