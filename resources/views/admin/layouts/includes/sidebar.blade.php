 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name  }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/home') }}" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
          </li>
         
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Cargo Information
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Clients
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('clientsinfo') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>All Clients</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Fleet
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('fleetdash') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>All fleet</p>
                </a>
              </li>
             
            </ul>
          </li>


          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Pickup Information
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data Tables</p>
                </a>
              </li>
            </ul>
          </li> --}}

          .3
          <li class="nav-header">SETTINGS</li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Countries
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('countries') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('allstates') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>States</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('allcities') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Cities</p>
                </a>
              </li>
             
            </ul>
          </li>
         
          {{-- <li class="nav-header">SIGN OUT</li> --}}

          

          <li class="nav-item mt-5 mb-5">
            <a class="nav-link" href="{{ route('logout') }}"
                        onclick="
                    if(confirm('Are you sure you want to Logout?')){
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                    }else{
                        event.preventDefault();
                    }
                        ">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                    Logout
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->


    </div>
    <!-- /.sidebar -->
  </aside>