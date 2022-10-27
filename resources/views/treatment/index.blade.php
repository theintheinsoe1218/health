@extends('admin.template')
@section('admin.content')

<div class="container">
    <form class="form-group">
        <div>
            <a href="{{route('treatment.create')}}" class="form-group btn btn-outline-secondary">Create New</a>
        </div>
    </form>
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
        <tbody>
            @php
             $j=0;
             @endphp
            @foreach($treatment as $treatment)
            @php
            $j=$j+1;
            @endphp
            <tr>
                <td>{{$j}}</td>
                <td>{{$treatment->uname}}</td>
                <td>{{$treatment->occur}}</td>
                <td>{{$treatment->allergic}}</td>
                
                <td>{{$treatment->cost}}</td>
                <td>{{$treatment->date}}</td>
                <td>
                    <button type="button" class="detail btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{$treatment->appointment_id}}" data-tid="{{$treatment->id}}">
                        Detail
                  </button>
                    
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Patient information list</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                        <div class="modal-body" id="body">
                            
                        </div>
                        <div id="medicine" class="modal-body">
                                
                        </div>
                        
                            
                      
                    <div class="modal-footer">
                        <!-- <p id="tid"></p> -->
                        
                        <form action="{{route('treatment.update',$treatment->id)}}" method="post">
                                @method('PUT')
                                @csrf
                                 <div class="form-group">
                                <label>Cost:</label>
                                <input type="text" name="cost" class="form-control" id="cost" >
                                <input type="hidden" id="tid" name="tid">
                         </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-outline-primary" value="Save">
                        </form>

                    </div>
                </div>
            </div>
        </div>


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
        $('.detail').click(function(){
            var id=$(this).data('id');
            var tid=$(this).data('tid');
            //console.log(tid);
            $("#tid").val(tid);

            $.get("{{route('getid')}}",{tid:tid},function(response){
            });


            var url = '{{ route("treatment.show", ":id") }}';
            url = url.replace(':id', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            $.get(url,{id:id,tid:tid},function(response){
                var html="";
                var medicine="";
                //console.log(response);
                var patient_medicines = response.patient_medicines;
                var treatment = response.treatment;
                //console.log(treatment[0].uname);
                html=`<div class="container">
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <label >Name</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>${treatment[0].uname}</label>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <label >Age</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>${treatment[0].age}</label>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <label >Gender</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>${treatment[0].gender}</label>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <label >Allergic</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>${treatment[0].allergic}</label>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <label >Occur</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>${treatment[0].occur}</label>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <label >Appointment Date</label>
                                </div>
                                <div class="col-lg-6">
                                    <label>${treatment[0].appointment_date}</label>
                                </div>
                            </div>
                        </div>`;
                        medicine=`<table class="table ml-3">
                            <tr>    
                            <td>Pill Name</td>
                            <td>Amount
                            </tr>`;
                $.each(patient_medicines, function( i, v ) {
                        medicine+=`<tr>
                                    <td>${v.mname}</td>
                                    <td>${v.amount}</td>
                                    </tr>
                                    `
                            

                });
                medicine+=`</table>`;
                $('#body').html(html);
                $('#medicine').html(medicine);
            })

        })
        
    })


</script>
@endsection