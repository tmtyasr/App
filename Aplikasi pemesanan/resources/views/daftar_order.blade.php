<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Twentyfour Photo</title>
    @include('Home-Page.css')

    <style>
        .no-orders {
            text-align: center;
            margin-top: 20px;
        }
        .no-orders svg {
            width: 100px;
            height: 100px;
            color: #6c757d;
        }
        .no-orders p {
            font-size: 20px;
            color: #6c757d;
        }
        .no-orders .cta {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
        }
        .no-orders .cta:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body class="bg-light">

@include('Home-Page.header')

<div class="my-5 px-4 mb-0">
  <h2 class="fw-bold h-font text-center">DAFTAR BOOKING</h2>
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

<div class="container d-flex table-responsive justify-content-center">
    @if($bookings->isEmpty())
        <div class=" w-50 text-center no-orders">
        <!-- <i class="bi bi-emoji-frown" style="font-size: 100px; color: #6c757d;"></i>
        <p style="font-size: 20px; color: #6c757d;">Belum ada booking, yuk booking sekarang <i class="bi bi-emoji-wink"></i></p> -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm2 3h10v2H3V7z"/>
        </svg>
        <p class="mt-3">Belum ada booking,yuk booking sekarang <i class="bi bi-emoji-wink"></i></p>
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
