<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    @include('books.import.styles')
</head>


<body class="antialiased">
<div fragment="header" style="padding:0px 0px 10px 20px;background-color: #415d7e;">
    <div style="display: flex">
        <a href="{{ route('books.index') }}" style="color: white; font-weight: bold; padding-left: 50px;
                font-size: 16px; text-decoration: none; font-family: Arial, Helvetica, sans-serif;">
            <svg style="color:white" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            </svg>
            BookWorld</a>
        @guest()
            <a style="color: white;
                font-size: 15px; text-decoration: none; padding-left: 1140px;" href="{{ route('register') }}">Register</a>
            <a style="color: white;
                font-size: 15px; text-decoration: none; padding-left: 40px;" href="{{ route('auth') }}">Log In</a>
        @endguest
        @auth()
            <a style="color: white;
                font-size: 15px; text-decoration: none; padding-left: 1140px;"><?php echo \Illuminate\Support\Facades\Auth::user()->email ?></a>
            <a style="color: white; padding-left: 40px;
                      font-size: 15px; text-decoration: none;" href="{{ route('logout') }}">Log Out</a>
            <p style="color: white;
            font-size: 15px; text-decoration: none; padding-left: 20px;">
                @if(session('status'))
                    {{ session('status') }}
                @endif
            </p>
        @endauth
    </div>
</div>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row" style="display: flex">
                    <div style="display: flex" class="col-xs-6">
                        <h2>Info about this <b>Book</b></h2>
                        <a style="margin-left: 930px" href="{{ route('books.index') }}" class="btn btn-warning"> <span>Main Page</span></a>
                    </div>
                </div>
            </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Author:{{$book->author}}</li>
                        <li class="list-group-item">Description:{{$book->description}}</li>
                        <li class="list-group-item">Price:{{$book->price}}</li>
                        @foreach($vendors as $vendor)
                            @if($vendor->id === $book->vendor_id)
                                <li class="list-group-item">Vendor:{{$vendor->vendor_name}}</li>
                            @endif
                        @endforeach
                        <li  class="list-group-item" style="max-width: 256px">Image: <img src="{{asset('/storage/'.$book->image)}}" alt="img"></li>
                    </ul>
                    <div class="card-body">
                        <a style="font-family: 'Varela Round', sans-serif; font-size: 20px;"
                        href="{{ route('books.edit', $book->id)  }}" class="btn btn-info">Edit</a>
                        <form style="margin-top: 15px" action="{{ route('books.destroy', $book->id)  }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="font-family: 'Varela Round', sans-serif; font-size: 20px;"
                            type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
