@extends('admin.layouts.app')


@section('browsertitle', 'Ecocargo | Countries ')

@section('title','Countries ')

@section('breadcrumb1', 'Countries')

@section('breadcrumb2', 'View')

@section('styles')
   
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
 
    
@endsection

    

@section('content')
    <div class="containter-fluid mt-3 mr-2 ml-2">
        <div class="row">
            
          <div class="col-md-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title float-left">All Countries</h3>
                <span class="float-right">
                  <button class="btn btn-md btn-success" 
                          data-toggle="modal"
                          data-target=".countryModal">Add Countries</button>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive-md nowrap" width="100%">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Country</th>
                    <th>ZIP Code</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($allcountries as $country)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $country->name }}</td>
                          <td>{{ $country->zip_code }}</td>
                          <td>{{ $country->created_at->toDayDateTimeString() }}</td>
                          <td>
                            <a href="" class="btn-sm btn-info fa fa-edit" 
                                        data-toggle="modal"
                                        data-target=".countryEditModal"
                                        data-countryid ="{{ $country->id }}"></a> /
                            <a href="" class="btn-sm btn-success fa fa-eye"
                                        data-toggle="modal" data-target=".countryShowModal" 
                                        data-countryid ="{{ $country->id }}"></a> /
                            <a href="" class="btn-sm btn-danger fa fa-trash countryDelete" data-id={{ $country->id }}></a>

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
    <div class="modal fade countryModal" id="modal-lg">
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
                 <form id="countryForm">
                  @csrf
                     <div class="form-group">
                       <label for="country">Country Name</label>
                       <input type="text" name="country" id="country" class="form-control">
                     </div>
                     
                     <div class="form-group">
                      <label for="zip_code">ZIP Code</label>
                      <input type="text" name="zip_code" id="zip_code" class="form-control">
                    </div>

            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="saveCountry">Save Country</button>
            
          </div>

          
                    

        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
     <!-- Edit the form -->
     <div class="modal fade countryEditModal" id="modal-lg">
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
                 <form id="countryEditForm">
                  @csrf
                     <div class="form-group">
                       <label for="country">Country Name</label>
                       <input type="text" name="country" id="country" class="form-control">
                     </div>
                     
                     <div class="form-group">
                      <label for="zip_code">ZIP Code</label>
                      <input type="text" name="zip_code" id="zip_code" class="form-control">
                    </div>

                    <div>
                      <input type="hidden" name="countryid" id="countryid">
                    </div>

            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateCountry">Save Country</button>
            
          </div>

          
                    

        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Show the form -->
    <div class="modal fade countryShowModal" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Show Country</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                 <form id="showCountry">
                  @csrf
                     <div class="form-group">
                       <label for="country">Country Name</label>
                       <input type="text" name="country" id="country" class="form-control">
                     </div>
                     
                     <div class="form-group">
                      <label for="zip_code">ZIP Code</label>
                      <input type="text" name="zip_code" id="zip_code" class="form-control">
                    </div>

                    

            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
 
            
          </div>

          
                    

        </form>
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

          $('#saveCountry').on('click', function(event){
            event.preventDefault();
            
            //  alert('Your saving');
            let url = 'country';
            let countryForm = $('#countryForm').serialize();

            $.ajax({
                url:url,
                type: "POST",
                data: countryForm,
                success: function(data){
                  console.log(data);
                  
                  if(data){
                    // alert('Successfully Save!');
                    
                      swal({
                        title: "Saved!",
                        text: "Country Successfully Saved!",
                        icon: "success",
                        button: "Ok!",
                      }).then(
                          function(){ 
                              location.reload();
                          }
                      );
                      // window.location.replace(response.url);
                      $('.countryModal').modal('hide');
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

          //show Countries
          $('.countryShowModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let countryId = button.data('countryid') // Extract info from data-* attributes

                // alert(countryId);

                // let modal = $(this)
                let url = 'country';
            
                $.ajax({
                    url: url+"/"+countryId,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#showCountry').find('#country').val(data.name);
                        $('#showCountry').find('#zip_code').val(data.zip_code);
                        
                        
                    
                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                    
                });

            
            
          });

          $('.countryEditModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
              
                let countryId = button.data('countryid') // Extract info from data-* attributes

                // alert(countryId);

                // let modal = $(this)
                let url = 'country';
            
                $.ajax({
                    url: url+"/"+countryId+"/edit",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('#countryEditForm').find('#country').val(data.name);
                        $('#countryEditForm').find('#zip_code').val(data.zip_code);
                        $('#countryEditForm').find('#countryid').val(data.id);
                        
                    
                    },
                    error: function(){
                        alert("There was an error!");
                        // toastr.error('There was an error, Please try again later');
                    }
                });

            
            
          });

          $('#updateCountry').on('click', function(event){
            event.preventDefault();

            // alert('HIE');
            let countryId = $('#countryid').val();
            let url = 'country';
            let country = $('#countryEditForm').serialize();

            $.ajax({
                url:url+"/"+countryId,
                type: "PUT",
                data: country,
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
                      $('countryEditModal').modal('hide');
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
          $('.countryDelete').on('click', function () {
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
                      let url = 'country';

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