@extends('admin.template')
@section('admin.content')


<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Medicine Lists</h2>
            <div class="m-2">
                <a href="{{ route('medicine.create') }}" class="btn btn-outline-secondary">Create New</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php
                     $j=0;
                     @endphp
                    @foreach($medicine as $medicine)
                    @php
                    $j=$j+1;
                    @endphp
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$medicine->name}}</td>
                        <td>{{$medicine->qty}}</td>
                        <td>{{$medicine->price}}</td>
                        <td><a href="{{route('medicine.edit',$medicine->id)}}" class="btn btn-outline-secondary">Edit</a>
                            <form method="post" action="{{route('medicine.destroy',$medicine->id)}}" onsubmit="return confirm('Are You Sure')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                 <input type="submit" name="btnsubmit" value="Delete" class="btn btn-outline-danger">
                            </form></td>
                        
                    </tr>
                    @endforeach
                    
                </tbody>

                

            </table>

        </div>
    </div>
</div>

 
@endsection
