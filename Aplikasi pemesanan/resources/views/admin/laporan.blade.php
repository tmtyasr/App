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
        <div class="row justify-content-center mt-4">
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 ms-auto p-4 overflow-hidden">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark text-white">
                        <h3 class="fw-bold"><i class="bi bi-file-earmark-bar-graph"></i> Laporan Pemesanan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Transaction ID</th>
            <th>Event</th>
            <th>Amount</th>
            <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.scripts')
</body>
</html>