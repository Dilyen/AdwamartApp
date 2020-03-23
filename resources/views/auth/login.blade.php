@extends('layout.master')
@section('title', 'Login Page')
@section('content')


   <!-- login-page -->
    <div class="login-page">
        <div class="container"> 
            <h3 class="w3ls-title w3ls-title1">Login to your account</h3>  
            <div class="login-body">
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="user" name="email" placeholder="Enter your email" required="" value="{{old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="password" name="password" class="lock" placeholder="Password" required="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    <input type="submit" value="Login">
                    <div class="forgot-grid">
                        <label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i></i>Remember me</label>
                        <div class="forgot">
                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> --}}
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>  
            <h6> Not a Member? <a href="{{route('register')}}">Sign Up Now »</a> </h6> 
            <div class="login-page-bottom social-icons">
                <h5>Recover your social account</h5>
                <ul>
                    <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                    <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                    <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                    <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                    <li><a href="#" class="fa fa-rss icon rss"> </a></li> 
                </ul> 
            </div>
        </div>
    </div>
    <!-- //login-page -->

@endsection