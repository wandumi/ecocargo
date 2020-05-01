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
                     <button type="submit" class="btn btn-sm btn-success" 
                             data-toggle="modal" data-target=".bd-example-modal-lg">Add Client </button>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                          <td>{{ $clients->created_at }}</td>
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

    <!-- Large modal -->
  

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 p-5">
                  <form>
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
                      <label for="name">Physcial Address</label>
                      <textarea name="address" id="address" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="name">Clietn Type</label>
                      <select name="client_type" id="client_type" class="form-control">
                        <option disabled selected>Select Type of the Client</option>
                        <option value="0">Sender</option>
                        <option value="1">Receiver</option>
                      </select>
                    </div>
      
                  </form>
              </div>
    
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Add Client</button>
        </div>
          
      </div>
    </div>
  </div>

  
@endsection


@section('script')
      
      <!-- DataTables -->
      <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>

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
     
@endsection