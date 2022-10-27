@extends('admin.template')
@section('admin.content')

<div class="container mb-5">
    <div class="row">
        <div class="col col-lg-6">
            <input type="date" name="from" id="from" class="form-control">
        </div>
        
        <div class="col col-lg-6">
            <input type="date" name="to" id="to" class="form-control">
        </div>
    </div>
</div>

<div class="alert alert-warning" role="alert" id="alert">
  
</div>
        
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Appointment</th>
                <th>Occur</th>
                <th>Allergic</th>
                <th>Cost</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach($treatment as $treatment)
            <tr>
                <td>{{$treatment->id}}</td>
                <td>{{$treatment->uname}}</td>
                <td>{{$treatment->occur}}</td>
                <td>{{$treatment->allergic}}</td>
                <td>{{$treatment->cost}}</td>
                <td>{{$treatment->date}}</td>
               <!--  <td><a href="{{route('treatment.edit',$treatment->id)}}" class="btn btn-info">Edit</a></td> -->
            </tr>
            @endforeach
           <tr>
                <td colspan="4">Total</td>
                <td colspan="2">{{$cost}}</td>
            </tr>
            <tr>
                <td colspan="4">Outcome</td>
                <td colspan="2">{{$outcome}}</td>
            </tr>
            <tr>
                <td colspan="4">Profits</td>
                <td colspan="2">{{$profits}}</td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#alert').hide();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $("#to").change(function(){
            var from = $("#from").val();
            //alert(from);
            var to = $("#to").val();
            $.post("{{route('report')}}",{from:from,to:to},function(response){
                console.log(response);
                var html='';
                if (response =="Empty Result") {
                    var alertData = response;
                //alert(alertData);
                $("#alert").text(response);
                $('#alert').show();
                }

                
                $.each(response,function(i,v){
                    var id = v.id;
                    var appointment_id = v.appointment_id;
                    var occur = v.occur;
                    var allergic = v.allergic;
                    var cost = v.cost;
                    var date = v.date;

                    html += `<tr>
                                <td>${id}</td>
                                <td>${appointment_id}</td>
                                <td>${occur}</td>
                                <td>${allergic}</td>
                                <td>${cost}</td>
                                <td>${date}</td>
                            </tr>`;

                    $('#tbody').html(html);
                })
                

                
            }) 
        })
        
        
    });
</script>
@endsection