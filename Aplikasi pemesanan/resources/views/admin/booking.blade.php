<!-- Admin Booking View -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    @include('admin.links')
    
    <title>Booking</title>
</head>
<body class="bg-light">
    <!-- Include Header -->
    @include('admin.header')    

    <div class="container-fluid" id="main-content">
        <div class="row d-flex justify-content-center">
            <div class="ms-auto col-md-10 p-4 overflow-hidden">
                <div class="container mt-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card border-0 shadow-lg my-1">
                    <div class="card-header bg-dark text-white">
                        <h4 class="fw-bold"><i class="bi bi-card-list"></i> Daftar Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th> 
                                        <th>Tanggal</th>
                                        <th>Event</th>
                                        <th>Paket</th>
                                        <th>Waktu</th>
                                        <th>Nomor Hp</th>
                                        <th>Alamat</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->user->name ?? $booking->nama }}</td> 
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->event }}</td>
                                            <td>{{ $booking->paket }}</td>
                                            <td>{{ $booking->waktu }}</td>
                                            <td>{{ $booking->nomor }}</td>
                                            <td>{{ $booking->alamat }}</td>
                                            <td>Rp. {{ $booking->price }}</td>
                                            <td>
                                                @if($booking->status == 'confirmed')
                                                    <span class="badge bg-success">Confirmed</span>
                                                @elseif($booking->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($booking->status == 'cancelled')
                                                    <span class="badge bg-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            <td>
            @if($booking->status == 'pending')
            <form action="{{ route('admin.booking.confirm', $booking->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm mb-1"><i class="bi bi-check-circle"></i></button>
                                                    </form>
                                                    <form action="{{ route('admin.booking.cancel', $booking->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm mb-1"><i class="bi bi-x-circle"></i></button>
                                                </form>
            @elseif($booking->status == 'cancelled')
            <form action="{{ route('admin.booking.uncancel', $booking->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm mb-1"><i class="bi bi-arrow-repeat"></i></button>
                                                    </form>
            @elseif($booking->status == 'confirmed')
            <form action="{{ route('admin.booking.cancel', $booking->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm mb-1"><i class="bi bi-exclamation-triangle"></i></button>
                                                </form>
            @endif
        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Scripts -->
    @include('admin.scripts')
</body>
</html>
