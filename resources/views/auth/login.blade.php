@extends('layouts.app')
@section('content')

<div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">    
        <div class="login-card login-dark">
          <div>
            <div>
                @if($errors->any())
                <div class="alert alert-light-danger alert-dismissible fade show" role="alert">
                    <p class="txt-danger">{{ $errors->first() }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                  </div>
                  @endif
                
                  {{-- <div class="alert txt-primary border-primary alert-dismissible fade show" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    <p>One of <strong>YouTube's</strong>most crucial ranking factors is Watch Time.</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> --}}
            </div>
            
            
                <div class="login-main"> 
              <form action="{{ url('/verify/login')}}" method="POST" class="theme-form">
                
                @csrf
                <h3>Sign in to account</h3>
                <p>Enter your email & password to login</p>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" type="text" name="email" id="username" placeholder="Enter username or email" value="{{ old('email') }}">
                  
                
                </div>
            
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" required placeholder="Enter Password">
                    
                    
                  </div>
                  
                </div>
                <div class="form-group mb-0">
                
                  <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary btn-block w-100">Sign in</button>
                  </div>
                </div>
                {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                <div class="social mt-4">
                  <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                </div>
                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ url("sign-up.html") }}">Create Account</a></p> --}}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection