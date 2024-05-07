@extends('admin.admin')
@section('auth_user')
<div class="login_page center_container">
    <div class="center_content">
        <div class="logo">
            <h1 class="text-light">Admin Register</h1>
        </div>

        @if(Session::has('error')) 
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ session::get('error') }} </strong>  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{ route('admin.login') }}" class="d-block" method="post">
            @csrf
            
            <div class="form-group icon_parent">
                 <label for="password">Email</label>
                <input type="email" class="form-control"  name="email" placeholder="Email Address">
                    <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
             
            </div>
            <div class="form-group icon_parent">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                    
                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
            </div>
            <div class="form-group">
                <label class="chech_container">{{ __('Remember me') }}
                    <input type="checkbox" name="remember" id="remember" >
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-group">
                <a class="registration" href="{{ route('admin.register') }}">Create new account</a><br>
                <a href="" class="text-white">I forgot my password</a>
                <button type="submit" class="btn btn-blue">{{ __('Log in') }}</button>
            </div>
        </form>
        <div class="footer">
           <p>Copyright &copy; 2024 <a href="#">{{ config('app.name', 'Laravel') }}</a>. All rights reserved.</p>
        </div>
        
    </div>
</div>
@endsection