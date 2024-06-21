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

    <!-- Sidebar -->
        
<div class="container-fluid" id="main-content">
  <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">
      <h3 class="mb-4">SETTINGS</h3>
      <!-- General Settings section -->
      <div class="card mb-4 border-0 shadow-lg">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-3">Carousels Settings</h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </div>
        </div>
      </div>
      <div class="card mb-4 border-0 shadow-lg">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-3">Gallery Settings</h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </div>
        </div>
      </div>
      <div class="card border-0 shadow-lg">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-3">Footer Settings</h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </div>
          <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
          <p class="card-text">content</p>
          <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
          <p class="card-text">content</p>
        </div>
      </div>
    </div>
  </div>
</div>



   @include('admin.scripts')
</body>
</html>