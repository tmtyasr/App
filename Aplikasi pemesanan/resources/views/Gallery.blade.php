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
    <!-- Gallery -->
    <div class="my-5 px-5">
      <h2 class="font-weight-bold h-font text-center">GALLERY</h2>
        <div class="container d-flex">
          <div class="row justify-content-evenly px-lg-0 px-md-0 px-2">
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/graduation3.png') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/graduation4.png') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/engagement1.jpg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/engagement3.jpg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/prewedding4.png') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/prewedding.jpeg') }}" class="d-block zoom" width="100%">
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center rounded py-4 my-3">
                <div class="img-container overflow-hidden">
                    <img src="{{ asset('img/wedding3.jpg') }}" class="d-block zoom" width="100%">
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
    </div>

<!-- Footer -->
    
@include('Home-Page.Footer')
    
    
</body>
</html>