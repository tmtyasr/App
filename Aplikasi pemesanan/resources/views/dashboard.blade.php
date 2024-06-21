<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Home</title>
    
    <style>
        p {
            text-transform: capitalize;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffdd;
            color: #333;
            text-align: center;
        }
        header.navbar-container {
            max-width: 1200px;
            width: 100%;
            margin: auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: .5rem;
            z-index: 999;
        }
        header.navbar-container .logo img {
            width: 200px;
        }
        header.navbar-container .nav-list ul {
            padding-left: 0;
            display: flex;
            justify-content: center;
            gap: 2rem 1rem;
        }
        header.navbar-container .nav-list li {
            list-style-type: none;
        }
        header.navbar-container .nav-list li a {
            text-decoration: none;
            font-size: 1.05rem;
            padding: 0.5rem 1.5rem;
            border-radius: 999px;
            transition: all 0.2s ease-in-out;
            color: black;
            font-weight: 700;
        }
        .navbar-container .nav-list li:hover a {
            color: #b0926a;
        }
        .active {
            background-color: #b0926a;
        }
        .nav-list .active:hover {
            color: #b0926a;
            background-color: transparent;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        main {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 1.5rem 4rem;
            display: flex;
            align-items: center;
        }
        main .content {
            flex: 1;
            display: flex;
            align-items: center;
        }
        main .content .content-description {
            flex: 1 1;
            text-align: left;
        }
        main .content .content-description .title {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            color: #b0926a;
            line-height: 1.2;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        }
        main .content .content-description p {
            line-height: 1.3rem;
            font-size: 1.2rem;
            color: black;
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        }
        main .content .content-description h3 {
            margin-top: 3rem;
            font-weight: 500;
        }
        main .content .content-description a {
            display: inline-block;
            padding: 0.4rem 2.5rem;
            margin-top: 1rem;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 1rem;
            color: #ffffdd;
            border: 3px solid transparent;
            border-radius: 999px;
            background-color: #b0926a;
            cursor: pointer;
            transition: all 0.15s ease-in;
            text-decoration: none;
        }
        main .content .content-description a:hover {
            border: 3px solid #b0926a;
            color: #b0926a;
            background-color: transparent;
        }

        main .content .content-image {
            flex: 1;
            display: flex;
        }

        main .content .content-image img {
            margin: auto;
            min-width: 250px;
            width: 350px;
        }
    </style>
</head>
<body>
    <header class="navbar-container">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="twentyfour photo">
        </div>
        <nav class="nav-list">
            <ul>
                <li><a href="{{ route('account.dashboard' )}}">Beranda</a></li>
                <li><a href="#daftar">Daftar order</a></li>
                <li><a href="{{ route('account.Gallery' )}}">Gallery</a></li>
                <li><a href="#user">{{ Auth::user()->name }}</a></li>
                
                <li><a href="{{ route('account.logout' )}}" class="active">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="content">
            <div class="content-image">
                <img src="{{ asset('img/icon/1.png') }}" alt="title">
            </div>
            <div class="content-description">
                <h1 class="title">-Twentyfour.Photo-</h1>
                <p>Capture Your Best Moments With Us</p>
                <h3>Booking sesi fotografi anda</h3>
                <a href="{{ route('account.menu_booking' )}}">BOOKING NOW</a>
            </div>
        </div>
    </main>
</body>
</html>
