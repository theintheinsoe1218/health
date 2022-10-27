@extends('admin.template')
@section('admin.content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 justify-content-center offset-3">
               <h2>Enter Medicine pill</h2>
            <form method="post" action="{{route('medicine.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="enter your pill name" class="form-control" class="@error('name') is-invalid @enderror">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="text" name="qty" id="qty" placeholder="enter your amount of pill" class="form-control" class="@error('qty') is-invalid @enderror">
                        @error('qty')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" placeholder="enter your pail price" class="form-control" class="@error('price') is-invalid @enderror">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <input type="submit" id="save" class="btn btn-outline-danger" value="Save">
                </form>
            </div>
        </div>
     </div>
@endsection