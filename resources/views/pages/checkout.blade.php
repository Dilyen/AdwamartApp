@extends('layout.master')
@section('title', 'Checkout Page')
@section('content')
    <!-- sign up-page -->
    <div class="login-page">
        <div class="container"> 
            <h3 class="w3ls-title w3ls-title1">Provide Delivery Information</h3>  
            <div class="login-body">
                <form action="{{ route('deliveries.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                    	<select name="region" id="input" class="form-control" required="required">
                        	<option value="">Select Region</option>
                        	<option value="Northern" {{ old('region') == 'Northern' ? 'selected' : '' }}>Northern</option>
                        	<option value="Upper East" {{ old('region') == 'Upper East' ? 'selected' : '' }}>Upper East</option>
                        	<option value="Upper West" {{ old('region') == 'Upper West' ? 'selected' : '' }}>Upper West</option>
                        	<option value="Volta" {{ old('region') == 'Volta' ? 'selected' : '' }}>Volta</option>
                        	<option value="Ashanti" {{ old('region') == 'Ashanti' ? 'selected' : '' }}>Ashanti</option>
                        	<option value="Eastern" {{ old('region') == 'Eastern' ? 'selected' : '' }}>Eastern</option>
                        	<option value="Brong Ahafo" {{ old('region') == 'Brong Ahafo' ? 'selected' : '' }}>Brong Ahafo</option>
                        	<option value="Central" {{ old('region') == 'Central' ? 'selected' : '' }}>Central</option>
                        	<option value="Greater Accra" {{ old('region') == 'Greater Accra' ? 'selected' : '' }}>Greater Accra</option>
                        	<option value="Western" {{ old('region') == 'Western' ? 'selected' : '' }}>Western</option>                  
                        </select>
                    
                    
                    @if ($errors->has('region'))
                        <span class="help-block">
                            <strong>{{ $errors->first('region') }}</strong>
                        </span>
                    @endif
                    </div>

                    <div class="form-group">
	                    <input type="text" class="user" name="address" placeholder="Enter your Address" required="" value="{{old('address') }}">
	                    @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                    	<input type="text" name="phone" class="phone" placeholder="Phone " required="">
                    </div>

                   
                    <input type="submit" value="Proceed ">
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
