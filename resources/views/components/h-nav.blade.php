<div class="page-header">
    <div class="header-wrapper row m-0">
      <div class="header-logo-wrapper col-auto p-0">
        <div class="logo-wrapper"><a href="{{ url("index.html") }}">
            <img class="img-fluid for-light" src="{{ asset("/assets/images/logo/logo-1.png") }}" alt="">
            <img class="img-fluid for-dark" src="{{ asset("/assets/images/logo/logo.png") }}" alt=""></a>
        </div>
        <div class="toggle-sidebar">
          <svg class="sidebar-toggle"> 
            <use href="/assets/svg/icon-sprite.svg#stroke-animation"></use>
          </svg>
        </div>
      </div>
      
      <div class="nav-right col-xxl-7 col-xl-6 col-auto box-col-6 pull-right right-header p-0 ms-auto">
        <ul class="nav-menus">
          <li class="">
            <p class="f-w-400 txt-info" id="datetime" style="display: inline;"></p>
          </li>
          {{-- <li>
            <p>IP : {{$ipAddress}}</p>
          </li> --}}
         
       
          
          <li class="profile-nav onhover-dropdown p-0">
            <div class="d-flex align-items-center profile-media"><img class="b-r-10 img-40" src="{{ asset("/../assets/images/dashboard/profile.png") }}" alt="">
              <div class="flex-grow-1"><span>{{$userName}}</span>
                <p class="mb-0">{{$ipAddress}} <i class="middle fa fa-angle-down"></i></p>
              </div>
            </div>
            <ul class="profile-dropdown onhover-show-div">
              <li><a href="{{ url("") }}"><i data-feather="user"></i><span>Account </span></a></li>
              <li><a href="{{ url("") }}"><i data-feather="settings"></i><span>Settings</span></a></li>
              <li><a href="{{ url("") }}"><i data-feather="log-in"> </i><span>Log out</span></a></li>
            </ul>
          </li>
        </ul>
      </div>
    
    </div>
  </div>

  