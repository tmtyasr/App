<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Twentyfour Photo</title>
    @include('Home-Page.css')
</head>
<body class="bg-light">

@include('Home-Page.header')

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">DAFTAR ORDER</h2>
</div>

@if(Session::has('success'))    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5">
                <div class="alert alert-success fade show">
                    {{ Session::get('success')}}
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container d-flex table-responsive">
    @if($bookings->isEmpty())
        <div class="alert alert-danger w-100 text-center">
            Belum ada order,yuk order sekarang!
        </div>
    @else
        <table class="table table-hover border-dark bg-white text-center">
            <thead class="bg text-light border-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Event</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Nomor Hp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach($bookings as $booking)
    <tr>
        <td>{{ $booking->id }}</td>
        <td>{{ $booking->date }}</td>
        <td>{{ $booking->event }}</td>
        <td>{{ $booking->paket }}</td>
        <td>{{ $booking->waktu }}</td>
        <td>{{ $booking->nomor }}</td>
        <td>{{ $booking->alamat }}</td>
        <td>Rp. {{ number_format($booking->price, 2) }}</td>
        <td>
            @if($booking->status == 'pending')
                <form id="pay-form-{{ $booking->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                    <button type="button" class="btn btn-sm border-0 bg-warning text-white fw-bold mb-1" onclick="payNow('{{ $booking->id }}')"><i class="bi bi-cash-coin"></i> Bayar</button>
                </form>
                <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm border-0 bg-danger text-white fw-bold"><i class="bi bi-trash"></i> Batal</button>
                </form>
            @elseif($booking->status == 'cancelled')
                <form action="{{ route('booking.uncancel', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm border-0 bg-success text-white fw-bold"><i class="bi bi-arrow-counterclockwise"></i> Uncancel</button>
                </form>
            @elseif($booking->status == 'confirmed')
                <button type="button" class="btn btn-sm border-0 bg-success text-white fw-bold mb-1" disabled><i class="bi bi-check-circle"></i> Berhasil Dibayar</button>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>
        </table>
    @endif
</div>

@include('Home-Page.Footer')

<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
    function payNow(bookingId) {
        let form = document.getElementById('pay-form-' + bookingId);
        let formData = new FormData(form);

        fetch('{{ route('pay') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            snap.pay(data.snapToken, {
                onSuccess: function(result) {
                    fetch('{{ route('payment.success') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ booking_id: bookingId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            document.querySelector(`#pay-form-${bookingId}`).innerHTML = '<button type="button" class="btn btn-sm border-0 bg-success text-white fw-bold mb-1" disabled><i class="bi bi-check-circle"></i> Berhasil Dibayar</button>';
                        }
                    });
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
        })
        .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>