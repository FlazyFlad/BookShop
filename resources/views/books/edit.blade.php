<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @include('books.import.styles')
</head>


<body class="antialiased">

<div class="container">
    <form action="{{route('books.update', $book->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <form action="" method="post">
                <div class="modal-header">
                    <div class="col-xs-6">
                        <h4>Edit <b>Book</b></h4>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{$book->name}}" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" value="{{$book->author}}" name="author" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" value="{{$book->description}}" name="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" value="{{$book->price}}" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Vendor</label>
                        <select name="vendor_id" class="form-select">
                            @foreach($vendors as $vendor)
                                <option name="vendor_name" value="{{$vendor->id}}" @if($vendor->id == $book->vendor_id) selected @endif>{{$vendor->vendor_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('books.index')}}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>
        </div>
    </form>
</div>
</body>
</html>
