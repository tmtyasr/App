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

<!-- Carousel -->

<div class="container-fluid px-lg-4 mt-4">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{ asset('img/carousel/graduation4.png') }}" alt="Graduation" class="w-100 d-block" style="width:100%">
        <div class="carousel-caption">
        </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('img/carousel/engagement31.jpg') }}" alt="prewedding" class="w-100 d-block" style="width:100%">
        <div class="carousel-caption">
        </div> 
    </div>
    <div class="carousel-item">
        <img src="{{ asset('img/carousel/prewedding1.png') }}" alt="prewedding" class="w-100 d-block" style="width:100%">
        <div class="carousel-caption">
        </div> 
    </div>
    <div class="carousel-item">
        <img src="{{ asset('img/carousel/prewedding.jpeg') }}" alt="prewedding" class="w-100 d-block" style="width:100%">
        <div class="carousel-caption">
        </div> 
    </div>
    <div class="carousel-item">
        <img src="{{ asset('img/carousel/wedding1.jpg') }}" alt="Wedding" class="w-100 d-block">
        <div class="carousel-caption">
        </div>  
    </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    </button>
    </div>
</div>

<!-- Menu -->

    <h2 class="mt-4 pt-4 mb-4 text-center font-weight-bold h-font ">Menu</h2>

    <div class="container">
        <div class="row">
        @foreach ($menus as $menu)
            <div class="col-lg-3 col-md-6 my-3" >
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('img/menu/' . $menu->image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $menu->event }}</h5>
                        <h6 class="mb-4">Rp. {{ number_format($menu->price, 0, ',', '.') }}</h6>
                      <div class="d-flex justify-content-evenly mb-2">
                          <a href="{{ route('menu.detail', ['event' => $menu->event]) }}" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                      </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <!-- Gallery -->
    <h2 class="mt-4 pt-4 mb-2 text-center font-weight-bold h-font ">Gallery</h2>

    <div class="container d-flex">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-2">
        <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
            <div class="img-container overflow-hidden">
                <img src="{{ asset('img/graduation4.png') }}" class="d-block zoom" width="100%">
            </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
            <div class="img-container overflow-hidden">
                <img src="{{ asset('img/engagement3.jpg') }}" class="d-block zoom" width="100%">
            </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
            <div class="img-container overflow-hidden">
                <img src="{{ asset('img/prewedding.jpeg') }}" class="d-block zoom" width="100%">
            </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
            <div class="img-container overflow-hidden">
                <img src="{{ asset('img/wedding2.jpg') }}" class="d-block zoom" width="100%">
            </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/20240604_185623_374.jpg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/20240604_185744_553.jpg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/20240604_185839_320.jpg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/20240604_185932_913.jpg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
    </div>
</div>

<!-- Footer -->
    
@include('Home-Page.Footer')
    
    
</body>
</html>