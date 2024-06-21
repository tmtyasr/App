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
                    <a href="{{route('admin.create')}}" class="btn btn-dark text-white"><i class="bi bi-plus-lg"></i> Create</a>
                </div>
            </div>
        <div class="row d-flex justify-content-center">
        @if(Session::has('success'))    
            <div class="col-md-10 ms-auto mt-4">
                <div class="alert alert-success alert-dismissible fade show">
                    {{ Session::get('success')}}
                </div>
            </div>
            @endif
            <div class="ms-auto col-md-10 p-4 overflow-hidden">
            <div class="card border-0 shadow-lg my-1">
                    <div class="card-header bg-dark text-white">
                        <h4 class="fw-bold"><i class="bi bi-list-ul"></i> Menu Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center" >
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                        <th>Image</th>
                                        <th>Event</th>
                                        <th>Paket</th>
                                        <th>Facility</th>
                                        <th>Price</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($menus->isNotEmpty())
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>
                                            @if ($menu->image != "")
                                                <img src="{{asset('img/menu/'.$menu->image)}}" alt="">
                                            @endif
                                        </td>
                                        <td>{{$menu->event}}</td>
                                        <td>{{$menu->paket}}</td>
                                        <td>{{$menu->facility}}</td>
                                        <td>Rp.{{$menu->price}}</td>
                                        <td>{{\Carbon\Carbon::parse($menu->created_at)->format('d-m-Y')}}</td>
                                        <td>{{\Carbon\Carbon::parse($menu->updated_at)->format('d-m-Y')}}</td>
                                        <td>
                                            <a href="{{route('admin.edit',$menu->id)}}" class="btn btn-dark mb-1"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" onclick="deleteMenu({{ $menu->id }});" class="btn btn-danger mb-1"><i class="bi bi-trash3-fill"></i></a>
                                            <form id="delete-menu-from-{{ $menu->id }}" action="{{ route('admin.destroy',$menu->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('admin.scripts')
</body>
</html>

<script>
    function deleteMenu(id) {
        if(confirm("Are you sure you want to delete menu?")) {
            document.getElementById("delete-menu-from-"+id).submit();
        }
    }
</script>