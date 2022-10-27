@extends('admin.template')
@section('admin.content')

<div class="container">
   
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Age</th>
                <th>Symptoms</th>
                <th>Date</th>
                <th>Token No</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
             $j=0;
             @endphp
            @foreach($appointment as $appointment)
            @php
            $j=$j+1;
            @endphp

            <tr>
                <td>{{$j}}</td>
                <td>{{$appointment->user->name}}</td>
                <td>{{$appointment->age}}</td>
                <td>{{$appointment->symtoms}}</td>
                <td>{{$appointment->appointment_date}}</td>
                <td>{{$appointment->token_no}}</td>
                
                <td>

                    @if($appointment->status == 0)

                    <form action="{{route('appointment.update',$appointment->id)}}" method="post" id="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{$appointment->user_id}}" class="btn btn-outline-success">
                        <input type="submit" name="" value="Treatment" class="btn btn-outline-success">
                    </form>
                    @endif

                    @if($appointment->status == 1)
                    <form action="{{route('appointment.update',$appointment->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{$appointment->user_id}}" class="btn btn-outline-primary">
                         <input type="hidden" name="status" value="2" class="btn btn-outline-success">
                        <input type="submit" name="done" value="Done" class="btn btn-outline-success">
                    </form>
                    @endif
                    @if($appointment->status == 2)
                    
                        <input type="submit" name="done" value="Finished" class="btn btn-outline-success" class="disabled">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    //alert('hi');
   
  //getTokenNo('date');



</script>
@endsection
