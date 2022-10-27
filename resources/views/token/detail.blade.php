@extends('template')
@section('content')
<div class="info " id="appointment">
 @if (session('success'))
 <div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="container">
  <div id="jsonData"></div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Date</th>
        <th>Token No</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="tbody">

    </tbody>
  </table>
</div>
</div>


@endsection

@section('script')

<script type="text/javascript">


  $(document).ready(function(){
   $('.table').hide();
   // let today = new Date().toISOString().slice(0, 10)
   // console.log(today);
   /* $('#jsonData').hide();*/

         /* setTimeout(function(){ 
            $( "#jsonData" ).load("{{route('getAppointment')}}")}
            , 500);
          
          //console.log(jsonData);
          var jsonData = $("#jsonData").val();*/

          //console.log(jsonData);

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          getAppointmentData();
          setInterval(function(){
            getAppointmentData();
          },5*1000);


          function getAppointmentData(){
            $.get("{{route('getAppointment')}}",function(response){
            console.log(response);
             
            
            var html="";
            var j=0;

            $.each(response,function(i,v){
                //console.log(v.status);
                j=j+1;
                var oldStatus = v.status;
                console.log(oldStatus);


                if(v.status==1){
                  html+=`<tr><td>${j}</td><td>${v.appointment_date}</td><td>${v.token_no}</td><td><p id="treatment">Treatment Now</p></td></tr>`;
                }else if(v.status== 2){
                  html+=`<tr><td>${j}</td><td>${v.appointment_date}</td><td>${v.token_no}</td><td>Finished</td></tr>`;
                }else{
                  html+=`<tr><td>${j}</td><td>${v.appointment_date}</td><td>${v.token_no}</td><td>Waiting</td></tr>`;
                }
              })
            $('#tbody').html(html);
            $('.table').show();
            // $.each(response,function(i,v){
            //   var html=v.appointment_date;
            //   if(today == html){
            //     $('.table').show();
            //   }
            //   else{
            //     $('.table').hide();
            //   }

            // })
            

          });
          }
        });

  @endsection