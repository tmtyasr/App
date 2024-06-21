<!-- resources/views/thank_you.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>Terima Kasih</title>
    @include('Home-Page.css')
</head>
<body class="bg-light">

@include('Home-Page.header')

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">Terima Kasih</h2>
  <p class="text-center">Pembayaran Anda telah berhasil diproses.</p>
</div>

@include('Home-Page.Footer')

</body>
</html>
