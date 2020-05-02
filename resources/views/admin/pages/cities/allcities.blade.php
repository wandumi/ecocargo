@extends('admin.layouts.app')

@section('styles')
   
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
 
    
@endsection

    

@section('content')
    <div class="containter-fluid mr-3 ml-3">
        <div class="row">
            
          <div class="col-md-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title float-left">Cities</h3>
                <span>
                  <button class="btn-sm btn-success float-right" data-toggle="modal" data-target=".cityModal">Add Cities</button>
                </span> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>State/Pronvince/Region</th>
                    <th>Cities</th>
                    <th>Created at</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($allcities as $city)
                        <tr>
                          <td>{{ $loop->index+ 1}}</td>
                          
                          <td>
                            @foreach ($states as $state)
                                @if($state->id == $city->state_id)
                                {{ $state->name }}
                                @endif
                            @endforeach
                          </td>
                          <td>{{ $city->name }}</td>
                          <td>{{ $city->created_at->toFormattedDateString() }}</td>
                          <td>
                            <a href="#" class="btn-sm btn-info fa fa-edit"
                               data-toggle="modal" data-target=".cityEditModal"
                               data-cityid="{{ $city->id }}"></a> /
                            <a href="#" class="btn-sm btn-success fa fa-eye"
                               data-toggle="modal" data-target=".cityShowModal"
                               data-cityid="{{ $city->id }}"></a> / 
                            <a href="#" class="btn-sm btn-danger fa fa-trash cityDelete" data-id="{{ $city->id }}"></a>
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
    <div class="modal fade cityModal" id="modal-lg">
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
                 <form id="cityForm">
                  @csrf
                     <div class="form-group">
                       <select name="state" id="state" class="form-control">
                         <option disabled selected>State/Pronvince/Region</option>
                         @foreach ($states as $state)
                             <option value="{{ $state->id }}">{{ $state->name }}</option>
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
            <button type="submit" class="btn btn-success" id="saveCity">Save City</button>
            
          </div>

          
                    

        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
     <!-- Edit the form -->
     <div class="modal fade cityEditModal" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">City</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                 <form id="cityEditForm">
                  @csrf
                     <div class="form-group">
                       <label for="states">States</label>
                       <select name="state" id="state" class="form-control">
                         <option disabled selected>States / Pronvince / Region</option>
                         @foreach ($states as $state)
                             <option value="{{ $state->id }}">{{ $state->name }}</option>
                         @endforeach
                       </select>

                     </div>
                     
                     <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div>
                      <input type="hidden" name="cityid" id="cityid">
                    </div>

            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateCity">Save City</button>
            
          </div>

          
                    

        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

      <!-- Show the form -->
      <div class="modal fade cityShowModal" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Show City</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
                   
                   <form id="showCity">
                       <div class="form-group">
                         <select id="state" class="form-control">
                           <label for="state">State</label>
                           
                                @foreach ($states as $state)
                                    <option selected disabled value="{{ $state->id }}">{{ $state->name }}</option>
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

          $('#saveCity').on('click', function(event){
            event.preventDefault();
            
            //  alert('Your saving');
            let url = 'cities';
            let cityForm = $('#cityForm').serialize();

            $.ajax({
                url:url,
                type: "POST",
                data: cityForm,
                success: function(data){
                  console.log(data);
                  
                  if(data){
                    // alert('Successfully Save!');
                    
                      swal({
                        title: "Saved!",
                        text: "City Successfully Saved!",
                        icon: "success",
                        button: "Ok!",
                      }).then(
                          function(){ 
                              location.reload();
                          }
                      );
                      // window.location.replace(response.url);
                      $('.cityModal').modal('hide');
                    } else {
                      swal("Oops!", data.errors, 'error');
                    }




                  $('.cityModal').modal('show');
                },
                error: function(error){
                  swal('Fail',"Failed to Save, Please try again later");
                }
            });

          });

          //show City the coun
          $('.cityShowModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let cityId = button.data('cityid') // Extract info from data-* attributes

                // alert(countryId);

                // let modal = $(this)
                let url = 'cities';
            
                $.ajax({
                    url: url+"/"+cityId,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#showCity').find('#state').val(data.state_id);
                        $('#showCity').find('#name').val(data.name);
                            

                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });

            
            
          });

          //edit the coun
          $('.cityEditModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let cityId = button.data('cityid') // Extract info from data-* attributes

                // alert(countryId);

                // let modal = $(this)
                let url = 'cities';
            
                $.ajax({
                    url: url+"/"+cityId+"/edit",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#cityEditForm').find('#state').val(data.state_id);
                        $('#cityEditForm').find('#name').val(data.name);
                        $('#cityEditForm').find('#cityid').val(data.id);
                        
                    
                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });

            });
            
          });

          //Update the cities to which state/pronvice they belong to they belong to
          $('#updateCity').on('click', function(event){
            event.preventDefault();

            // alert('HIE');
            let cityId = $('#cityid').val();
            let url = 'cities';
            let cities = $('#cityEditForm').serialize();

            $.ajax({
                url:url+"/"+cityId,
                type: "PUT",
                data: cities,
                success: function(data){
                  console.log(data);
                  if(data){
                    // alert('Successfully Save!');
                    
                      swal({
                        title: "Updated!",
                        text: "City Successfully Updated!",
                        icon: "success",
                        button: "Ok!",
                      }).then(
                          function(){ 
                              location.reload();
                          }
                      );
                      // window.location.replace(response.url);
                      $('cityEditModal').modal('hide');
                    } else {
                      swal("Oops!", data.errors, 'error');
                  }
                            
                  // $('.countryEditModal').show();
                },
                error: function(error){
                  swal("Fail!", "Failed to Upadate, Please, try again later!", 'error');
                }
            });
          })

          // Delete button with sweetalert 
          $('.cityDelete').on('click', function () {
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
                      let url = 'cities';

                      $.ajax({
                            url: url+"/"+dataId,
                            type: "DELETE",
                            data: {
                                "id": dataId,
                                "_token": '{{csrf_token()}}',
                            },
                            success: function (data) {
                                  swal("Done! City has been Deleted!", {
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