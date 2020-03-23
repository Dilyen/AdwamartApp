@extends('layout.master')
@section('title', 'Register Page')
@section('content')
    <!-- sign up-page -->
    <div class="login-page">
        <div class="container"> 
            <h3 class="w3ls-title w3ls-title1">Create your account</h3>  
            <div class="login-body">
                <form action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="user" name="name" placeholder="Enter your Name" required="" value="{{old('name') }}">
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    <input type="text" class="user" name="email" placeholder="Enter your email" required="" value="{{old('email') }}">
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    <input type="password" name="password" class="lock" placeholder="Password" required="">

                    <input type="password" name="password_confirmation" class="lock" placeholder="Password" required="">

                    <input type="submit" value="Sign Up ">
                    {{-- <div class="forgot-grid">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
                        <div class="forgot">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div> --}}
                </form>
            </div>  
            <h6>Already have an account? <a href="{{route('login')}}">Login Now »</a> </h6>  
        </div>
    </div>
@endsection