@extends('admin.layouts.app')

@section('browsertitle', 'Ecocargo | Fleet ')

@section('title','Fleet')

@section('breadcrumb1', 'Fleet')

@section('breadcrumb2', 'Show')

@section('styles')
   
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
 
    <style>
        .head {
            font-weight: 900;
            font-size: 16px;
        }

        .content {
            font-size: 16px; 
        }
    </style>
    
@endsection

    

@section('content')
   
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{  url( URL::previous() ) }}" class="btn btn-md btn-primary pl-5 pr-5" >Back</a>
            </div>
        </div>
        </div>
    </section>

    <section class="content mt-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <!-- AREA CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Fleet Information</h3>
  
                  
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div class="row col-md">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item head">Country</li>
                                <li class="list-group-item head">State / Province / Region</li>
                                <li class="list-group-item head">City</li>
                                <li class="list-group-item head">Service</li>
                                <li class="list-group-item head">Date</li>
                              </ul> 
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                              <li class="list-group-item content">
                                @foreach ($countries as $country)
                                      @if ($country->id == $fleet->country_id)
                                          {{ $country->name }}
                                      @endif
                                @endforeach
                              </li>

                              <li class="list-group-item content">
                                @foreach ($states as $state)
                                      @if ($state->id == $fleet->state_id)
                                          {{ $state->name }}
                                      @endif
                                @endforeach
                              </li>
                              
                              <li class="list-group-item content">
                                @foreach ($cities as $city)
                                      @if ($city->id == $fleet->city_id)
                                          {{ $city->name }}
                                      @endif
                                @endforeach
                              <li class="list-group-item content">{{ $fleet->service }} </li>
                              <li class="list-group-item content">{{ $fleet->date }}</li>
          
                             
                              
                            </ul>
                        </div>

                    </div>
                    
                  </div>

                  {{-- <div class="row col-sm-12">
                    <table>
                        <thead>
                            <th>Country</th>
                            <th>State / Province / Region<th>
                            <th>City<th>
                            <th>Service<th>
                            <th>Date<th>
                              
                            
                        </thead>
                        <tbody>
                            
                                <td>
                                    @foreach ($countries as $country)
                                          @if ($country->id == $fleet->country_id)
                                              {{ $country->name }}
                                          @endif
                                    @endforeach
                                    
                                </td>
                                <td>
                                    @foreach ($states as $state)
                                          @if ($state->id == $fleet->state_id)
                                              {{ $state->name }}
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
                                <td>
                                    {{ $fleet->service }} 

                                </td>
    
                                <td>

                                    {{ $fleet->date }}
                                </td>

                                <td>
                                    
                                    {{ trim($fleet->order_note) }}
                                </td>
                                  
                                 
                                  
                                </ul>
                            
                        </tbody>
                    </table>
                   </div> --}}
                  </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              
  
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-4">
              <!-- LINE CHART -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Order Note</h3>
  
                  
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div class="row">
                        <div class="col-md-12">
                          <textarea name="" id="" rows="5" class="form-control">
                              {{ $fleet->order_note }}
                          </textarea>
                        </div>
                      </div>
                      
                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

   
   
@endsection


