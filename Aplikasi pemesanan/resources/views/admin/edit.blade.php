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
                <div class="col-md-10 d-flex justify-content-end">
                    <a href="{{route('admin.menu_booking')}}" class="btn btn-dark"><i class="bi bi-box-arrow-in-left"></i> Back</a>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 ms-auto p-4 overflow-hidden">
                    <div class="card border-0 shadow-lg my-4">
                        <div class="card-header db-bg">
                            <h3 class="fw-bold">Edit Menu</h3>
                        </div>
                        <form enctype="multipart/form-data" action="{{route('admin.update',$menu->id)}}" method="post">
                            @method('put')
                            @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5 fw-bold">Event</label>
                                <input value="{{ old('event',$menu->event) }}" type="text" class="@error('event') is-invalid @enderror form-control form-control-lg" placeholder="event" name="event">
                                @error('event')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5 fw-bold">Paket</label>
                                <input value="{{ old('paket',$menu->paket) }}" type="text" class="@error('paket') is-invalid @enderror form-control form-control-lg" placeholder="paket" name="paket">
                                @error('paket')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5 fw-bold">Facility</label>
                                <textarea placeholder="Facility" class="@error('facility') is-invalid @enderror form-control" name="facility" cols="30" rows="5">{{ old('facility', $menu->facility) }}</textarea>
                                @error('facility')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label h5 fw-bold">Price</label>
                                <input value="{{ old('price',$menu->price) }}" type="text" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="price" name="price">
                                @error('price')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5 fw-bold">Image</label>
                                <input type="file" class="form-control form-control-lg" placeholder="price" name="image">
                                @if ($menu->image != "")
                                    <img class="w-50 my-3" src="{{asset('img/menu/'.$menu->image)}}" alt="">
                                @endif
                            </div>
                            <div class="col-lg-1 mb-lg-3 mt-2">
                                <button type="submit" class="btn text-white shadow-none db-bg button-hover">Update</button>
                            </div>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

   @include('admin.scripts')
</body>
</html>