@extends('admin.layouts.app')

@section('browsertitle', 'Ecocargo | States')

@section('title','States ')

@section('breadcrumb1', 'States')

@section('breadcrumb2', 'View')

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
              <div class="card-header justify-content-between">
                <h3 class="card-title float-left">All States</h3>
                <button type="submit" class="btn btn-success btn-sm float-right pl-5 pr-5" data-toggle="modal" data-target=".stateModal">add State</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($allstates as $states)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>
                            @foreach ($countries as $country)
                                @if ($country->id == $states->country_id)
                                    {{ $country->name }}
                                @endif
                            @endforeach
                           
                          </td>
                          <td>{{ $states->name }}</td>
                          <td>{{ $states->created_at->toFormattedDateString() }}</td>
                          <td>
                            <a href="" class="btn-sm btn-info fa fa-edit" 
                                data-toggle="modal" data-target=".stateEditModal" 
                                data-stateid="{{ $states->id }}"></a> /
                            <a href="" class="btn-sm btn-success fa fa-eye"
                                data-toggle="modal" data-target=".stateShowModal" data-stateid="{{ $states->id }}"></a> /
                            <a href="" class="btn-sm btn-danger fa fa-trash stateDelete" data-id="{{ $states->id }}"></a>
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

    <!-- Add Modal -->
    <div class="modal fade stateModal" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Country</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                 <form id="stateForm">
                  @csrf
                     <div class="form-group">
                       <select name="country" id="country" class="form-control">
                         <option disabled selected>Countries</option>
                         @foreach ($countries as $country)
                             <option value="{{ $country->id }}">{{ $country->name }}</option>
                         @endforeach
                       </select>
                     </div>
                     
                     <div class="form-group">
                      <label for="name">name</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>

            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="saveState">Save Country</button>
            
          </div>

          
                    

        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
     <!-- Edit the form -->
     <div class="modal fade stateEditModal" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Country</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                 <form id="stateEditForm">
                  @csrf
                     <div class="form-group">
                       <label for="country">Country</label>
                       <select name="country" id="country" class="form-control">
                         <option disabled selected>Country</option>
                         @foreach ($countries as $country)
                             <option value="{{ $country->id }}">{{ $country->name }}</option>
                         @endforeach
                       </select>
                     </div>
                     
                     <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div>
                      <input type="hidded" name="stateid" id="stateid">
                    </div>

            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateState">Save Country</button>
            
          </div>

          
                    

        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Show the form -->
    <div class="modal fade stateShowModal" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Show State</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                 
                 <form id="showState">
                     <div class="form-group">
                       <select id="country" class="form-control">
                         <label for="country">Country</label>
                         
                              @foreach ($countries as $country)
                                  <option selected disabled value="{{ $country->id }}">{{ $country->name }}</option>
                              @endforeach
                       </select>
                     </div>

                     <div>
                         <input type="text" name="name" id="name" class="form-control">
                     </div>
                 </form>

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

          // create a new state
          $('#saveState').on('click', function(event){
            event.preventDefault();
            
            //  alert('Your saving');
            let url = 'states';
            let stateForm = $('#stateForm').serialize();

            $.ajax({
                url:url,
                type: "POST",
                data: stateForm,
                success: function(data){
                  console.log(data);
                  
                  if(data){
                    // alert('Successfully Save!');
                    
                      swal({
                        title: "Saved!",
                        text: "State/Pronvince/Region Successfully Saved!",
                        icon: "success",
                        button: "Ok!",
                      }).then(
                          function(){ 
                              location.reload();
                          }
                      );
                      // window.location.replace(response.url);
                      $('.stateModal').modal('hide');
                    } else {
                      swal("Oops!", data.errors, 'error');
                    }




                  $('.countryModal').modal('show');
                },
                error: function(error){
                  swal('Fail',"Failed to Save, Please try again later");
                }
            });

          });

          //show State the coun
          $('.stateShowModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let stateId = button.data('stateid') // Extract info from data-* attributes

                // alert(countryId);

                // let modal = $(this)
                let url = 'states';
            
                $.ajax({
                    url: url+"/"+stateId,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#showState').find('#country').val(data.country_id);
                        $('#showState').find('#name').val(data.name);
                            

                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });

            
            
          });

          //edit the state
          $('.stateEditModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let stateId = button.data('stateid') // Extract info from data-* attributes

                // alert(countryId);

                // let modal = $(this)
                let url = 'states';
            
                $.ajax({
                    url: url+"/"+stateId+"/edit",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#stateEditForm').find('#country').val(data.country_id);
                        $('#stateEditForm').find('#name').val(data.name);
                        $('#stateEditForm').find('#stateid').val(data.id);
                        
                    
                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });

            });
            
          });

          // update the state
          $('#updateState').on('click', function(event){
            event.preventDefault();

            // alert('HIE');
            let stateId = $('#stateid').val();
            let url = 'states';
            let states = $('#stateEditForm').serialize();

            $.ajax({
                url:url+"/"+stateId,
                type: "PUT",
                data: states,
                success: function(data){
                  console.log(data);
                  if(data){
                    // alert('Successfully Save!');
                    
                      swal({
                        title: "Updated!",
                        text: "Country Successfully Updated!",
                        icon: "success",
                        button: "Ok!",
                      }).then(
                          function(){ 
                              location.reload();
                          }
                      );
                      // window.location.replace(response.url);
                      $('.stateEditModal').modal('hide');
                    } else {
                      swal("Oops!", data.errors, 'error');
                  }
                            
                  // $('.countryEditModal').show();
                },
                error: function(error){
                  swal("Fail!", "Failed to Upadate, Please, try again later!", 'error');
                }
            });
          });

          // Delete button with sweetalert 
          $('.stateDelete').on('click', function () {
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
                      let url = 'states';

                      $.ajax({
                            url: url+"/"+dataId,
                            type: "DELETE",
                            data: {
                                "id": dataId,
                                "_token": '{{csrf_token()}}',
                            },
                            success: function (data) {
                                  swal("Done! State has been Deleted!", {
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

      </script>
     
@endsection