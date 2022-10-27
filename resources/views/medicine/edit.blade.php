@extends('admin.template')
@section('admin.content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 offset-md-2 my-5">
            <h2>Edit Form</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('medicine.update',$medicine->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$medicine->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="text" name="qty" value="{{$medicine->qty}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" value="{{$medicine->price}}">
                    </div>
                    <input type="submit" id="edit" class="btn btn-outline-danger" value="Save">

            </form>
        </div>
    </div>
</div>
<br>

@endsection