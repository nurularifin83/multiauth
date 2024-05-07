@extends('admin.admin')
@section('auth_user')
<div class="registration_page center_container">
    <div class="center_content">
        <div class="logo">
            <h1 class="text-light">Seller Register</h1>
        </div>
        <form action="{{ route('seller.register.create') }}" method="post">
           @csrf

            <div class="form-group icon_parent">
                <label for="uname">Full Name</label>
                <input id="name" type="text" class="form-control" name="name" required autofocus placeholder="Full Name">
                <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
            </div>
            <div class="form-group icon_parent">
                <label for="email">E-mail</label>
                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" placeholder="Email Address">
                <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
            </div>
            <div class="form-group icon_parent">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="password" placeholder="Password">
                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
            </div>
            <div class="form-group icon_parent">
                <label for="rtpassword">Re-type Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation" placeholder="Confirm Password">
                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
            </div>
            <div class="form-group">
                <a class="registration" href=" ">Already have an account</a><br>
                <button type="submit" class="btn btn-blue">Signup</button>
            </div>
        </form>
        <div class="footer">
            <p>Copyright &copy; 2024 <a href="#">{{ config('app.name', 'Laravel') }}</a>. All rights reserved.</p>
        </div>
    </div>
</div>
@endsection