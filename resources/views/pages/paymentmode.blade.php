@extends('layout.master')
@section('title', 'Payment Method')
<style type="text/css">
	.middle-center {
		vertical-align: middle !important;
		font-size: 1.3em;
		font-weight: bold;
	}
</style>
@section('content')
    <!-- sign up-page -->
    <div class="login-page">
        <div class="container"> 
            <h3 class="w3ls-title w3ls-title1">Payment Methods</h3>  
            	<p>Please make your payment via Mobile Money</p>
            	<div class="row">	
            	<table class="table table-hover ">
            		
            		<tbody>
            			<tr>
            				<td><img src="images/mtn.jpg" width="150" height="150"></td>
            				<td class="middle-center">0549163989</td>
            			</tr>

            			<tr>
            				<td><img src="images/tigo.jpg" width="150" height="150"></td>
            				<td class="middle-center">0277859645</td>
            			</tr>

            			<tr>
            				<td><img src="images/vodcash.jpg" width="150" height="150"></td>
            				<td class="middle-center">0506938754</td>
            			</tr>

            			<tr>
            				<td><img src="images/airtel.jpeg" width="150" height="150"></td>
            				<td class="middle-center">0264897541</td>
            			</tr>
            		</tbody>
            	</table> 
            	</div>
             
        </div>
    </div>
@endsection
