 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ecocargo</span>
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
            <a href="{{ url('home') }}" class="nav-link {{ setActive('home', 'active') }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
         

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ setActive('clients', 'active') }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Clients
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('clients') }}" class="nav-link {{ setActive('clients', 'active') }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>All Clients</p>
                </a>
              </li>
              
            </ul>
          </li>

         

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link {{ setActive('fleetdash', 'active') }}">
                <i class="nav-icon fa fa-bus"></i>
                <p>
                    Fleet
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <li class="nav-item">

                        <a href="{{ url('fleetdash') }}" class="nav-link {{ setActive('fleetdash', 'active') }} ">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>all fleet</p>
                        </a>

                    </li>

                    {{-- <li class="nav-item">

                        <a href="{{ url('social') }}" class="nav-link {{ setActive('social', 'active') }} ">
                            <i class="fa fa-line-chart nav-icon"></i>
                            <p>Social Media Reports</p>
                        </a>

                    </li> --}}
                    
                </li>
            </ul>

          </li>


          
          <li class="nav-header">SETTINGS</li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ setActive('countries/country', 'active') }}">
              <i class="nav-icon fa fa-globe"></i>
              <p>
                Countries
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('countries/country') }}" class="nav-link {{ setActive('countries/country', 'active') }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('countries/states') }}" class="nav-link {{ setActive('countries/allstates', 'active') }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>States</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('countries/cities') }}" class="nav-link {{ setActive('countries/allcities', 'active') }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Cities</p>
                </a>
              </li>
             
            </ul>
          </li>
         
        

          

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