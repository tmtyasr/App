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
    <h2 class="fw-bold h-font text-center">Form Booking</h2>
</div>

<div class="container">
    <div class="row justify-content-evenly">
        <div class="col-lg-12 col-md-12 px-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <!-- Success Message -->
                    

                    <form class="row g-3" method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama" value="{{ Auth::user()->name }}" required readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="inputDate" name="date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEvent" class="form-label">Event</label>
                            <input type="text" class="form-control" id="inputEvent" name="event" placeholder="Event" value="{{ old('event', $event ?? '') }}" required readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPaket" class="form-label">Paket</label>
                            <input type="text" class="form-control" id="inputPaket" name="paket" placeholder="Paket" value="{{ old('paket', $paket ?? '') }}" required readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="inputWaktu" class="form-label">Waktu</label>
                            <input type="text" class="form-control" id="inputWaktu" placeholder="Waktu" name="waktu" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputNomor" class="form-label">Nomor</label>
                            <input type="text" class="form-control" id="inputNomor" placeholder="Nomor" value="{{ Auth::user()->phone }}" name="nomor" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPrice" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" id="inputPrice" name="price" placeholder="Price" value="{{ old('price', $price ?? '') }}" required readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputAlamat" class="form-label">Alamat</label>
                            <textarea placeholder="Alamat" class="form-control" name="alamat" id="inputAlamat" cols="30" rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm text-white custom-bg shadow-none">Booking</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('Home-Page.Footer')


</body>
</html>
