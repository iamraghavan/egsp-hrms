<div class="sidebar-wrapper" data-layout="fill-svg">
    <div>
      <div class="logo-wrapper"><a href="{{ url("index.html") }}"><img class="img-fluid" src="{{ asset("/assets/images/logo/logo.png") }}" alt=""></a>
        <div class="toggle-sidebar">
          <svg class="sidebar-toggle"> 
            <use href="/assets/svg/icon-sprite.svg#toggle-icon"></use>
          </svg>
        </div>
      </div>
      <div class="logo-icon-wrapper"><a href="{{ url("index.html") }}"><img class="img-fluid" src="{{ asset("/assets/images/logo/logo-icon.png") }}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="{{ url("index.html") }}"><img class="img-fluid" src="{{ asset("/assets/images/logo/logo-icon.png") }}" alt=""></a>
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="pin-title sidebar-main-title">
              <div> 
                <h6>Pinned</h6>
              </div>
            </li>
            <li class="sidebar-main-title">
              <div>
                <h6 class="lan-1">General</h6>
              </div>
            </li>
           
            
           
            
           
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                <a class="sidebar-link sidebar-title link-nav" href="{{ url("/add/add-employee") }}">
                    <span>Add Employee</span>
                </a>
            </li>

            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
              <a class="sidebar-link sidebar-title link-nav" href="{{ url("/employee/calculate-salary") }}">
                  <span>Calculate Salary</span>
              </a>
          </li>

            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                <a class="sidebar-link sidebar-title link-nav" href="{{ url("") }}">
               
                <span>Get Report</span>

                </a>
            </li>
        
     
 
           
        
    
         
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>