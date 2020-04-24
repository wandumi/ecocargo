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
                <h3 class="card-title">All States</h3>
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
                          <td>{{ $loop->index++ }}</td>
                          <td>{{ $states->country_id }}</td>
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
            "autoWidth": false
          });
        });
      </script>
     
@endsection