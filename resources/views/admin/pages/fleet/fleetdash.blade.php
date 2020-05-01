@extends('admin.layouts.app')

@section('styles')
   
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
 
    
@endsection

    

@section('content')
    <div class="containter-fluid mr-2 ml-2">
        <div class="row">
            
          <div class="col-md-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fleet (Cargo)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Country</th>
                    
                    <th>City</th>
                    <th>Service</th>
                    <th>Order Note</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($allFleets as $fleet)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>
                            @foreach ($countries as $country)
                                    @if ($country->id == $fleet->country_id)
                                        {{ $country->name }}
                                    @endif
                              @endforeach
                           </td>
                         
                          <td>
                              @foreach ($cities as $city)
                                    @if ($city->id == $fleet->city_id)
                                        {{ $city->name }}
                                    @endif
                              @endforeach
                          </td>
                          <td>{{ $fleet->service }} </td>
                          <td>{{ $fleet->order_note }}</td>
                          <td>{{ $fleet->created_at->toDayDateTimeString()}}</td>
                          <td>
                            
                            
                            <a href="{{ route('fleetdash.show',$fleet->id) }}" 
                                class="btn btn-success btn-sm" 
                                    >
                              view
                            </a>
                            
                          </td>
                        </tr>
                    @endforeach
                  
              
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
        </div>
    </div>

    {{-- vIEW MODAL  --}}
    <div class="modal fade fleetModalShow" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Fleet Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item">Country</li>
                    <li class="list-group-item">State / Province / Region</li>
                    <li class="list-group-item">City</li>
                    <li class="list-group-item">Service</li>
                    <li class="list-group-item">Date</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item">
                      @foreach ($countries as $country)
                            @if ($country->id == $fleet->country_id)
                                {{ $country->name }}
                            @endif
                      @endforeach
                    </li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">
                      @foreach ($cities as $city)
                            @if ($city->id == $fleet->city_id)
                                {{ $city->name }}
                            @endif
                      @endforeach
                    <li class="list-group-item">{{ $fleet->service }} </li>
                    <li class="list-group-item">{{ $fleet->date }}</li>

                   
                    
                  </ul>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-12">
                  <label for="order_note">Order Note</label>
                  <textarea name="" id="" rows="5" class="form-control">
                    {{ $fleet->order_note }}
                  </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
   
@endsection


@section('script')
      
      <!-- DataTables -->
      <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>

      <!-- page script -->
      <script>
        $(function () {
          $('#example1').DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true
          });
        });
      </script>

      <script>
        $(document).ready(function(){

          $('.fleetModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let fleetId = button.data('fleetid') // Extract info from data-* attributes

                // alert(fleetid);
      
                // let modal = $(this)
                let url = 'fleetdash';
             
                $.ajax({
                    url: url+"/"+fleetId,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#updateTaskForm').find('#userid').val(data.user_id);
                        $('#updateTaskForm').find('#taskid').val(data.id);
                        $('#updateTaskForm').find('#subject_edit').val(data.subject);
                        $('#updateTaskForm').find('#related_to_edit').val(data.related_to);
                        $('#updateTaskForm').find('#priority_edit').val(data.priority);
                        $('#updateTaskForm').find('#status_edit').val(data.statuses);
                        $('#updateTaskForm').find('#userstatus').val(data.statuses);
                        $('#updateTaskForm').find('#description_edit').val(data.description);

                     
                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });

            });
            
        });
      </script>
     
@endsection