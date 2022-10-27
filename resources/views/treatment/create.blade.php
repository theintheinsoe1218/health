@extends('admin.template')
@section('admin.content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-2">
            <h2>Creat New Treatment</h2>
            <form action="{{route('treatment.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Occur:</label>
                    <input type="text" name="occur" class="form-control" id="occur" class="@error('occur') is-invalid @enderror">
                    @error('occur')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Appointment</label>
                    <select name="user_id" id="user_id" class="custom-select">
                        @foreach($appointments as $row)
                        <option value="{{$row->id}}">{{$row->uname}}</option>
                        @endforeach
                    </select>
                    
                </div>

                <div class="form-group">
                    <label>Allergic:</label>
                    <input type="text" name="allergic" class="form-control" id="allergic" class="@error('allergic') is-invalid @enderror">
                    <!-- @error('allergic')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror -->
                </div>

               <div class="form-group">
                    <div class="row">
                        <div class="col col-lg-6">
                            <label>Patient Medicine</label>
                        </div>

                        <div class="col col-lg-6">
                            <a class="btn btn-outline-secondary mb-2 float-right" id="add">Add New Medicine</a>
                        </div>
                    </div>    
                    <div class="container " id="oldmedicine">
                        <div class="row my-2">
                            <div class="col col-lg-6 ">
                                <select class="custom-select medicine" name="medicine">
                                @foreach($medicines as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                                </select>
                            </div>   

                            <div class="col-lg-6 "><input type="text" name="amount" class="form-control amount" id="qty" placeholder="Qty">
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="container" id="table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Amount</th>
                            </thead>
                            <tbody id="tbody">
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" name="date" class="form-control" id="date" class="@error('date') is-invalid @enderror">
                    <!-- @error('date')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror -->
                </div>
                <input type="submit" name="save" value="save" class="btn  btn-outline-secondary">
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#table").hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $("#add").click(function(){
    $('.amount').val('');

    })
     var medicine_array =[];
    $('.amount').change(function(){
    var medicine = $('.medicine').val();
    var amount = $('.amount').val();
    var user_id = $('#user_id').val();


    // console.log(medicine,amount);

   
    var medicine_amount = {};
    medicine_amount[medicine] =amount;
   
    medicine_array.push(medicine_amount);
    
     $.post("{{route('treatment.store')}}",{medicine_amount:medicine_amount,user_id:user_id},function(response){
            
            
          })


     $.post("{{route('getmedicines')}}",{appointment_id:user_id},function(response){
        console.log(response);
        var html = '';
        $.each(response,function(i,v){
            
                html+=`<tr><td>${v.medicine_name}</td><td><input type="text" name="amount" class="form-control amounts" id="qty" placeholder="Qty" value=${v.amount} data-id = ${v.medicine_id}></td></tr>`;

           
        });
        $('#tbody').html(html);
        $("#table").show();
       $("#tbody").on('change  ','.amounts',function(){
                var amount=$(this).val();
                var medicine = $(this).data('id');
                console.log(medicine);
                console.log(amount);
                var medicine_amount = {};
                medicine_amount[medicine] =amount;
                console.log(medicine_amount);
                console.log(user_id);


                $.post("{{route('updatemedicines')}}",{medicine_amount:medicine_amount,appointment_id:user_id},function(response){
            
            
          })

            })
        
        });
 });
});
</script>


@endsection