
    <!-- <header class="header" id="header"> -->
      <div>
        <div class="header_top">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="header_top_content d-flex flex-row align-items-center justify-content-start">
                  <div class="logo">
                    <a href="#">health<span>+</span></a>  
                  </div>
                  <div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                    
                    <div class="header_top_phone">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <span>+959 797402014</span>
                    </div>
                  </div>
                  <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header_nav" id="header_nav_pin">
          <div class="header_nav_inner">
            <div class="header_nav_container">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="header_nav_content d-flex flex-row align-items-center justify-content-around">
                      <nav class="main_nav">
                        <ul class="d-flex flex-row align-items-center justify-content-start">
                          <li class="active"><a href="{{route('index')}}">Home</a></li>
                          <li><a href="{{route('about')}}">About</a></li>
                          <li><a href="{{route('contact')}}">Contact</a></li>

                          @guest
                          <li><a href="{{route('login')}}">Login</a></li>
                          <li><a href="{{route('register')}}">Register</a></li>
                          @endguest
                          
                          @hasrole('user')
                          <li>
                            <a href="{{route('appointment.create')}}">Make an Appointment</a>
                          </li>
                          @endhasrole

                          @hasrole('admin')
                          <li>
                            <a href="{{route('admin')}}">Admin</a>
                          </li>
                          @endhasrole

                          @hasanyrole('user|admin')
                          <li class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <!-- <a class="dropdown-item text-dark" href="#">Profile</a> -->
                              <a class="dropdown-item text-dark" href="{{route('getAppointmentview')}}">Appointment</a>
                              <a class="dropdown-item text-dark" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                                  </form>
                            </div>
                          </li>
                          @endhasanyrole

                       </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    <!-- </header> -->
