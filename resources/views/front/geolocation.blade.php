
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Cargo | Geolocation</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/bootstrap.min.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('front/dashboard.css') }}" rel="stylesheet">

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <link rel="stylesheet" href="{{ asset('front/parsleyjs/dist/parsley.css') }}">

  </head>
  <style>
    .form-fleet{
        margin: 0 auto;
    }
    label{
        font-size:1rem;
        font-weight: bold;
    }
    #title{
      font-weight:500; 
      font-size:18pt;
    }

    #date_created {
      padding:10px 0px 5px 20px;
    }

    #price {
      font-weight: 700;
      font-size: 10pt;
    }

    #noBids {
      margin:0 auto;
      text-align: center;
      font-size: 14pt;
    }

    .title{
      font-size: 16pt;
      text-align: center;
    }
  </style>
  <body>
  <div id="app">
    <header>
    
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Cargo</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
          <ul class="navbar-nav ml-auto pr-4">
            <li class="nav-item active">
              
              <a  class="nav-link" href="{{ url('/') }}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
           
            <li class="nav-item">
        
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

            
            
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

    </header>

    <main role="main">

      
        <div class="album py-5 bg-light">
          <div class="container">

            <div class="row">

                <div class="col-md-8 form-fleet">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h3>Shipping System</h3>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                  <label for="latitude">latitude</label>
                                  <input type="text" id="latitude" name="latitude" class="form-control" />
                                </div>
                          
                                <div class="form-group">
                                  <label for="longitude">longitude</label>
                                  <input
                                    type="text"
                                    id="longitude"
                                    name="longitude"
                                    class="form-control"
                                  />
                                </div>
                          
                                <div class="form-group">
                                  <label for="country">Country</label>
                                  <input type="text" id="country" name="country" class="form-control" />
                                </div>
                          
                                <div class="form-group">
                                  <label for="region">region</label>
                                  <input type="text" id="region" name="region" class="form-control" />
                                </div>
                          
                                <div class="form-group">
                                  <label for="timezone">timezone</label>
                                  <input type="text" id="timezone" name="timezone" class="form-control" />
                                </div>
                          
                                <div class="form-group">
                                  <label for="city">city</label>
                                  <input type="text" id="city" name="city" class="form-control" />
                                </div>
                          
                                <div class="form-group">
                                  <label for="ip">ip</label>
                                  <input type="text" id="ip" name="ip" class="form-control" />
                                </div>
                          
                                <div class="form-group">
                                  <label for="location">location</label>
                                  <input type="text" id="location" name="location" class="form-control" />
                                </div>
                              </form>

                        </div>
                    </div>

                </div>

           
              
       

              </div>

            </div>


          </div>
        </div>
      


    </div>


    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        
      </div>
    </footer>

    
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/popper.min.js') }}"></script>
    <script src="{{ asset('front/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/holder.min.js') }}"></script>
    <script src="{{ asset('front/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ asset('front/sweetalert/dist/sweetalert.min.js') }}"></script>
    {{-- <script src="http://parsleyjs.org/dist/parsley.js"></script> --}}
    
    <script>
        $(document).ready(function(){
          
            
        $.getJSON("http://ipinfo.io", function (data) {
            document.getElementById("country").value = data.country;
            document.getElementById("city").value = data.city;
            document.getElementById("region").value = data.region;
            document.getElementById("timezone").value = data.timezone;
            document.getElementById("location").value = data.loc;
            document.getElementById("ip").value = data.ip;

            console.log(data.ip); //: "41.144.77.22"
            console.log(data.hostname); //: "dsl-144-77-22.telkomadsl.co.za"
            console.log(data.city); //: "Randburg"
            console.log(data.region); //: "Gauteng"
            console.log(data.country); //: "ZA"
            console.log(data.loc); //: "-26.0941,28.0012"
            console.log(data.timezone); //: "Africa/Johannesburg"
        });
        

    
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
            const long = position.coords.longitude;
            const lat = position.coords.latitude;

            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = long;

            console.log("lat " + lat);
            console.log("lat " + long);
            console.log(position.coords.latitude);
            console.log(position.coords.longitude);
            console.log(position);
            });
        } else {
            console.log("not found");
        }
    

        });
    </script>
  </body>
</html>
