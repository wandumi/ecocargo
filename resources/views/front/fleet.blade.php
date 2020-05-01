
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Cargo | Fleet</title>

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
                            <form name="fleet" id="fleet" method="POST" action="{{ url('fleet') }}" data-parsley-validate="true">
                                @csrf

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="countries">countries</label>
                                        <select name="countries" id="countries" class="form-control" required>
                                            <option disabled selected value="">Countries</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="state_province_region">State / Provice / Region</label>
                                        <select name="states" id="states"  class="form-control" required>
                                            <option disables selected value="">State/Province/Region</option>
                                            <option value="0"></option>
                                        </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="cities">Cities</label>
                                        <select name="cities" id="cities" class="form-control" required>
                                            <option disables selected value="">Cities</option>
                                           
                                        </select>
                                    </div>

                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="sender">Sender Information</label>
                                        <select name="sender" id="sender" class="form-control" required >
                                            <option disabled selected value="">Sender Information</option>
                                            @foreach ($sender as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-6">

                                    <div class="form-group">
                                      <label for="receiver">Receiver Information</label>
                                      <select name="receiver" id="receiver" class="form-control" required>
                                          <option disabled selected value="">Receiver Information</option>
                                          @foreach ($receiver as $client)
                                              <option value="{{ $client->id }}">{{ $client->name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="services">Services</label>
                                        <input type="text" name="services" class="form-control" required >
                                    </div>

                                  </div>
                                  <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>
                                  </div>
                                </div>


                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="order_note">Order Note</label>
                                      <textarea name="order_note" id="order_note" rows="5" class="form-control" required></textarea>
                                    </div>

                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <button type="reset" class="btn-md btn-warning float-left pl-md-5 pr-md-5 text-dark " >Reset</button> 
                                    <button id="fleetSend" class="btn-md btn-success float-right pl-md-5 pr-md-5" type="submit">Save Info</button>
                                  </div>
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
          
            

            $('#countries').on('change', function(e){
                // console.log(e);

                let country_id = e.target.value;
                // console.log(country_id);


                $.get('/states?country_id='+ country_id, function(data){
                    console.log(data);
                    $('#states').empty();
                    $('#states').append('<option value="0" disable="true" selected="true">State Province Region</option>');

                    $.each(data, function(index, statesObj){
                        $('#states').append('<option value="'+ statesObj.id +'">'+ statesObj.name +'</option>');
                    })
                });

                
            });
 
            $('#states').on('change', function(e){
                // console.log(e);

                let state_id = e.target.value;

                $.get('/cities?state_id='+ state_id, function(data){
                    console.log(data);
                    $('#cities').empty();
                    $('#cities').append('<option value="0" disable="true" selected="true">Cities</option>');

                    $.each(data, function(index, citiesObj){
                        $('#cities').append('<option value="'+ citiesObj.id +'">'+ citiesObj.name +'</option>');
                    })
                });
            });


            var fleetForm = $('#fleet');

            fleetForm.submit(function(e){

              e.preventDefault();

              $.ajax({
                  url: fleetForm.attr('action'),
                  type: "POST",
                  data: fleetForm.serialize(),
                  success: function(data){
                      console.log(data);
  
                      

                      if(data){
                        // alert('Successfully Save!');
                        
                          swal({
                            title: "Successfully!",
                            text: "Fleet Information has been Saved!",
                            icon: "success",
                            button: "Ok!",
                          });
                          // window.location.replace(response.url);
                        } else {
                          swal("Oops!", data.errors, 'error');
                      }
                      


                  
                      
                  },
                  error:function(){
                        swal("Fail!", "Fleet not Saved!", 'error');
                  }
              });

            });
            

        });
    </script>
  </body>
</html>
