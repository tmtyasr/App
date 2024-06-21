<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Twentyfour Photo</title>
    @include('Home-Page.css')
    <style>
        .box{
            border-top-color: #9CAFAA !important;
        }
    </style>
</head>
<body class="bg-light">

@include('Home-Page.header')
    <!-- About Us -->
    <div class="my-5 px-4">
      <h2 class="fw-bold h-font text-center">ABOUT US</h2>
      <p class="text-center h-font">Capture Your Best Moments With Us</p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3 fw-bold">Selamat Datang di Twentyfour Photo</h3>
                <p>TwentyFour Photo adalah platform pemesanan jasa fotografi berbasis web yang berkomitmen
                    untuk menghubungkan klien dengan fotografer profesional. Kami memahami bahwa setiap momen
                    berharga dalam hidup Anda layak untuk diabadikan dengan sempurna. Oleh karena itu, kami hadir untuk mempermudah Anda menemukan dan memesan jasa fotografi terbaik sesuai kebutuhan Anda.
                </p>
            </div>
            <div class="col-lg-6 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="{{ asset('img/about/about1.jpeg') }}" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="{{asset('img/about/Graduation.svg')}}" width="70px">
                    <h4 class="mt-3">Graduation</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="{{asset('img/about/Engagement.svg')}}" width="70px">
                    <h4 class="mt-3">Engagement</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="{{asset('img/about/camera-vacation-summer-svgrepo-com.svg')}}" width="70px">
                    <h4 class="mt-3">Prewedding</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="{{asset('img/about/Wedding.svg')}}" width="70px">
                    <h4 class="mt-3">Wedding</h4>
                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
    
@include('Home-Page.Footer')
    
    
</body>
</html>