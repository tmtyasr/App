<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    @include('admin.links')
    
    <title>Admin Dashboard</title>
</head>
<body class="bg-light">
    <!-- Header -->
@include('admin.header')    

        <div class="container-fluid" id="main-content">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-10 p-4 overflow-hidden">
                    <div class="card border-0 shadow-lg my-4">
                        <div class="card-header db-bg">
                            <h3 class="fw-bold">Create Menu</h3>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

   @include('admin.scripts')
</body>
</html>