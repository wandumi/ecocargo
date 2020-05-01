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
                          <td>{{ $states->created_at }}</td>
                          <td>
                            <a href="#" class="btn-sm btn-info">Edit</a> /
                            <a href="#" class="btn-sm btn-success">View</a>
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

      </script>
     
@endsection