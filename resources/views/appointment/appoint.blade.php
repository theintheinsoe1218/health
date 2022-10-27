 
@extends('template')
@section('content')

<div class="info">
    <div class="container">
      
      <div class="row row-eq-height">

        <!-- Info Form -->
        <div class="col-lg-12 info_box_col" id="appointment">
          <div class="info_form_container">
            <div class="info_form_title">Make an Appointment</div>
            <form action="{{route('appointment.store')}}" class="info_form" id="info_form" method="post">
              @csrf
              <input type="number" class="info_input" placeholder="Age" required="required" name="age" id="age" class="@error('age') is-invalid @enderror">
              @error('age')
                <div class="alert alert-danger">{{$message}}</div>
              @enderror

              <input type="radio" name="gender" value="male"> Male
              <input type="radio" name="gender" value="female"> Female
              <input type="radio" name="gender" value="other"> Other

              <textarea name="symptoms" class="info_input" placeholder="Symptoms" id="symptoms" class="@error('symptoms') is-invalid @enderror"></textarea><br>
              @error('symptoms')
                <div class="alert alert-danger">{{$message}}</div>
              @enderror

              <input type="date" class="form-control" placeholder="Appointment Date" name="date" id="date" class="@error('date') is-invalid @enderror">
              @error('date')
                <div class="alert alert-danger">{{$message}}</div>
              @enderror

              <div id="token"></div>
              <input type="hidden" name="tokenno" value="" id="tokenno">
              <input type="submit" name="submit" value="Make an appointment" class="info_form_button mb-5">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    //alert('hi');
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      $('#date').change(function (){
        var date=$('#date').val();
        //alert(date);
        $.post("{{route('appointment.getTokenNo')}}",{date:date},function(response){
          //console.log(response);
      

        var html=`<div class="media mb-4">
          <div class="media-body">
            <h5 class="mt-0">Your Token number is ${response}</h5>

          </div>
        </div>`;
        
       $('#tokenno').val(response);
        
        $('#token').html(html);


      })

    
    });

  });
  //getTokenNo('date');



</script>
@endsection


  