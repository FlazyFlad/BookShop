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
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <div class="col-xs-6">
                <h4>Add <b>Book</b></h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Vendor</label><br>
                <select name="vendor_id" class="form-select">
                    @foreach($vendors as $vendor)
                        <option name="vendor_name" value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Image</label><br>
                <input type="file" name="image" required>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{route('books.index')}}" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <input type="submit" class="btn btn-success" value="Add">
        </div>
    </form>
</div>
</body>
</html>
