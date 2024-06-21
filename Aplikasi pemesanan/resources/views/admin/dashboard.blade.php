<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Admin Dashboard</title>
    @include('admin.links')
</head>
<body class="bg-light">

    <!-- Header -->
    @include('admin.header')

    <!-- Main Content -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SELAMAT DATANG</h3>
                
                <!-- Statistics -->
                <div class="row mb-3">
    <div class="col-lg-3 col-sm-6">
        <a href="{{ route('admin.user') }}" class="text-decoration-none text-dark">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{ route('admin.booking') }}" class="text-decoration-none text-dark">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pemesanan</h5>
                    <p class="card-text">{{ $totalBookings }}</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{ route('admin.booking.status', 'pending') }}" class="text-decoration-none text-dark">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Inquiries</h5>
                    <p class="card-text">{{ $pendingInquiries }}</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{ route('admin.booking.status', 'confirmed') }}" class="text-decoration-none text-dark">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Confirmed</h5>
                    <p class="card-text">{{ $confirmedBookings }}</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{ route('admin.booking.status', 'cancelled') }}" class="text-decoration-none text-dark">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Cancelled</h5>
                    <p class="card-text">{{ $cancelledBookings }}</p>
                </div>
            </div>
        </a>
    </div>
</div>


                <!-- Recent Bookings Table -->
                <div class="card border-0 shadow-lg my-1">
                    <div class="card-header bg-dark text-white">
                        <h4 class="fw-bold">Pesanan Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Event</th>
                                        <th>Paket</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id}}</td>
                                            <td>{{ $booking->user->name ?? $booking->nama }}</td> 
                                            <td>{{ $booking->event }}</td>
                                            <td>{{ $booking->paket }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>
                                                @if($booking->status == 'confirmed')
                                                    <span class="badge bg-success">Confirmed</span>
                                                @elseif($booking->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($booking->status == 'cancelled')
                                                    <span class="badge bg-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            <!-- <td>
                                                <a href="#" class="btn btn-warning btn-sm mb-1"><i class="bi bi-clock"></i></a>
                                                <a href="#" class="btn btn-success btn-sm mb-1"><i class="bi bi-check-circle"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm mb-1"><i class="bi bi-x-circle"></i></a>
                                            </td> -->
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

    @include('admin.scripts')
</body>
</html>
