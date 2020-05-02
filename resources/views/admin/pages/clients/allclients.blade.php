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
                <h3 class="card-title float-left">All Clients</h3>
                <span class="float-right">
                     

                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                      Add Client
                    </button>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive-md table-responsive-sm nowrap" width="100%">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Addres</th>
                    <th>Sender/Receiver</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($allclients as $clients)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $clients->name }}</td>
                          <td>{{ $clients->email }}</td>
                          <td>{{ $clients->phone}}</td>
                          <td>{{ $clients->address }} </td>
                          <td>
                            @if($clients->client_type == 0)
                                <span class="badge badge-success">Sender</span>
                            @elseif($clients->client_type == 1)
                                <span class="badge badge-info">Receiver</span>
                            @endif
                          </td>
                          <td>{{ $clients->created_at->toFormattedDateString() }}</td>
                          <td>
                            <a href="#" class="btn-sm btn-info fa fa-edit" 
                                   data-toggle="modal" 
                                   data-target=".clientEditModal"
                                   data-clientid="{{ $clients->id }}"></a>
                                    /

                             <a href="" class="btn-sm btn-success fa fa-eye" 
                                    data-toggle="modal" 
                                    data-target=".clientShowModal"
                                    data-clientid="{{ $clients->id }}"></a>
                                     /
                            
                            <a href="" class="clientDelete btn-sm btn-danger fa fa-trash" data-id="{{$clients->id}}"></a>
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

    <div class="modal fade modal-md" id="modal-default">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Client Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="clientInfo">
              @csrf
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="emali" name="email" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Clietn Type</label>
                    <select name="clienttype" id="clienttype" class="form-control">
                      <option disabled selected>Select Type of the Client</option>
                      <option value="0">Sender</option>
                      <option value="1">Receiver</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Physcial Address</label>
                    <textarea name="address" id="address" rows="5" class="form-control"></textarea>
                  </div>
                  
                
            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="saveClient">Save Client</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-md clientEditModal" id="modal-default">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Client</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="updateClient">
              @csrf
              @method('PUT')
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="emali" name="email" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Clietn Type</label>
                    <select name="clienttype" id="clienttype" class="form-control">
                      <option disabled selected>Select Type of the Client</option>
                      <option value="0">Sender</option>
                      <option value="1">Receiver</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Physcial Address</label>
                    <textarea name="address" id="address" rows="5" class="form-control"></textarea>
                  </div>

                  <div>
                    <input type="hidden" name="clientid" id="clientid">
                  </div>
                  
                
            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updateClientForm">Update Client</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade modal-md clientShowModal" id="modal-default">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Show Client</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="showClient">
              
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="emali" name="email" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Clietn Type</label>
                    <select name="clienttype" id="clienttype" class="form-control">
                      <option disabled selected>Select Type of the Client</option>
                      <option value="0">Sender</option>
                      <option value="1">Receiver</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Physcial Address</label>
                    <textarea name="address" id="address" rows="5" class="form-control"></textarea>
                  </div>

                  
                  
                
            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  
@endsection


@section('script')


      
      <!-- DataTables -->
      <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
      <script src="{{ asset('front/sweetalert/dist/sweetalert.min.js') }}"></script>

      <!-- page script -->
      <script>
        $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
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
            // Create client to the database
            $('#saveClient').on('click', function(event){

                event.preventDefault();
                
                let url = 'clients';
                let client = $('#clientInfo').serialize();

                $.ajax({
                   url:url,
                   type: 'POST',
                   data: client,
                   success: function(data){
                      console.log(data);
                      
                      if(data){
                
                            swal({
                              title: "Saved!",
                              text: "Client Successfully Saved!",
                              icon: "success",
                              button: "Ok!",
                            }).then(
                                function(){ 
                                    location.reload();
                                }
                            );
                            // window.location.replace(response.url);
                            $('.clientModal').modal('hide');
                      } else {
                            swal("Oops!", data.errors, 'error');
                          }

                        $('.countryModal').modal('show');
                   },
                   error: function(){
                        swal('Fail',"Failed to Save, Please try again later");
                   }
                });
            });

            
            // show the client
            $('.showEditModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let clientId = button.data('clientid') // Extract info from data-* attributes

                alert(clientId);
      
                // let modal = $(this)
                let url = 'clients';
             
                $.ajax({
                    url: url+"/"+clientId,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#showClient').find('#clientid').val(data.id);
                        $('#showClient').find('#name').val(data.name);
                        $('#showClient').find('#email').val(data.email);
                        $('#showClient').find('#phone').val(data.phone);
                        $('#showClient').find('#address').val(data.address);
                        $('#showClient').find('#clienttype').val(data.client_type);
                 

                     
                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });
            
            });

            // Update client
            $('#updateClientForm').on('click', function(event){
                event.preventDefault();

                let clientUpdate = $('#updateClient').serialize();
                let clientId = $('#clientid').val();
               
                let url = 'clients';

                $.ajax({
                  url: url+"/"+clientId,
                  type: "PUT",
                  data: clientUpdate,
                  success: function(data){
                    console.log(data);
                    
                    if(data){
                    // alert('Successfully Save!');
                    
                      swal({
                        title: "Saved!",
                        text: "Successfully Updated!",
                        icon: "success",
                        // button: "Ok!",
                      }).then(
                          function(){ 
                              location.reload();
                          }
                      );
                      // window.location.replace(response.url);
                      $('.clientEditModal').modal('hide');
                    } else {
                      swal("Oops!", data.errors, 'error');
                    }

                    setTimeout(function(){
                      location.reload();
                    }, 2000);
                  },
                  error: function(){
                    swal('Fail',"Failed to Save, Please try again later");
                  }
                });
            });

            // Delete button with sweetalert 
            $('.clientDelete').on('click', function () {
                // return confirm('Are you sure want to delete?');
                event.preventDefault();//this will hold the url
                
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                swal({
                    title: "Are you sure?",
                    text: "Once clicked, this will be not be Reversed!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {

                    if (willDelete) {
                      
                      let dataId = $(this).attr("data-id");
                      // let token = $("meta[name='csrf-token']").attr("content");
                      // alert(dataId);
                      let url = 'clients';

                      $.ajax({
                            url: url+"/"+dataId,
                            type: "DELETE",
                            data: {
                                "id": dataId,
                                "_token": '{{csrf_token()}}',
                            },
                            success: function (data) {
                                  swal("Done! Client has been Deleted!", {
                                      icon: "success",
                                      button: false,
                                  });
                            }         
                        });

                      setTimeout(function(){
                          location.reload(true);//this will release the event
                      },3000);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });
        });
      </script>
     
@endsection