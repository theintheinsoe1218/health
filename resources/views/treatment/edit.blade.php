@extends('admin.template')
@section('admin.content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2" >
            <h2>Edit Form</h2>
            <form method="post" action="{{route('treatment.update',$treatment->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Occur:</label>
                    <input type="text" name="occur" class="form-control" value="{{$treatment->occur}}" id="occur" class="@error('occur') is-invalid @enderror">
                    @error('occur')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Allergic:</label>
                    <input type="text" name="allergic" class="form-control" value="{{$treatment->allergic}}" id="allergic" class="@error('allergic') is-invalid @enderror">
                    @error('occur')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Cost:</label>
                    <input type="text" name="cost" class="form-control" value="{{$treatment->cost}}" id="cost" class="@error('cost') is-invalid @enderror">
                    @error('cost')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Date:</label>
                    <input type="text" name="date" class="form-control" value="{{$treatment->date}}" id="date" class="@error('date') is-invalid @enderror">
                    @error('date')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <input type="submit" name="update" value="Update" class="btn btn-info">
                
            </form>
        </div>
    </div>    
</div>

@endsection