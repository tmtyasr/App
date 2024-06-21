<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Twentyfour Photo</title>
    @include('Home-Page.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hidden {
            display: none;
        }
        .search-box {
            position: relative;
            width: 30%;
        }
        .search-input {
            width: 100%;
            padding: 10px 20px 10px 40px;
            border: 1px solid #ccc;
            border-radius: 25px;
        }
        .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #aaa;
        }
    </style>
</head>
<body class="bg-light">
@include('Home-Page.header')
<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">MENU</h2>
    @isset($event)
        <h3 class="text-center h-font">{{ $event }}</h3>
    @endisset

    <!-- Search Form -->
    <div class="d-flex justify-content-center my-4">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="searchInput" class="form-control search-input" placeholder="Search for menu...">
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-evenly">
        <div class="col-lg-9 col-md-12 px-4" id="menuContainer">
            @foreach($menus as $menu)
            <div class="card mb-4 border-0 shadow menu-item">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="{{ asset('img/menu/' . $menu->image) }}" class="img-fluid rounded" alt="{{ $menu->event }}">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">{{ $menu->event }}</h5>
                        <h5 class="mb-3">{{ $menu->paket }}</h5>
                        <div class="features mb-3">
                            <h6 class="mb-3">Facility</h6>
                            @foreach(explode(',', $menu->facility) as $facility)
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base mb-1">
                                {{ $facility }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-2 text-center">
                        <h6 class="mb-4">Rp {{ number_format($menu->price, 0, ',', '.') }}</h6>
                        <a href="{{ route('booking.form', ['event' => $menu->event, 'price' => $menu->price, 'paket' => $menu->paket]) }}" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Booking</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('Home-Page.Footer')

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var filter = this.value.toLowerCase();
        var menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(function(item) {
            var event = item.querySelector('h5.mb-3').textContent.toLowerCase();
            var paket = item.querySelectorAll('h5.mb-3')[1].textContent.toLowerCase();

            if (event.includes(filter) || paket.includes(filter)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });
</script>
</body>
</html>