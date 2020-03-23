@extends('layout.master')
@section('title', 'Delivery Info')

@section('content')

<!-- breadcrumbs --> 
	<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Order Page</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				@if (count($carts) > 0)
					@foreach ($carts as $cart)
				<div class="single-page-row" id="detail-21" style="margin-top: 20px;">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides" style="list-style: none;">
								<li data-thumb="images/s1.jpg">
									<div class="thumb-image detail_images">
									@if(Storage::disk('local')->has('public/products/'.$cart->product->image))
                                   <img src="{{ route('productimage',['filename' => $cart->product->image]) }}" width="100px;" height="100px;" class="img-responsive" alt="img" >   
                            	@endif
									</div>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="visible-xs" style="margin-top: 20px;"></div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name">{{$cart->product->name }}</h3>
					
						<div class="single-price">
							<ul>
								<li><h1>Ghc {{$cart->product->price - ($cart->product->discount / 100) * $cart->product->price }}</h1></li>  
								<li><h1>x</h1></li> 
								<li><h1>{{$cart->quantity }}</h1></li>
								<li> = </li> 
								<li><h1>Ghc {{ $cart->quantity * $cart->product->price }}</h1></li>
								
							</ul>	
						</div> 
					
						<form action="{{ route('carts.destroy', $cart->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
						
						
							 <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Remove from Cart</button>
							  
							
						</form>
						
					</div>
				   <div class="clearfix"> </div>  
				</div>

					@endforeach
					<div class="container" style="margin-top: 20px;">
						<div class="row">
							<div class="col-md-3 col-md-offset-4">
								<h1>Total: Ghc {{ $sum }}</h1>
							</div>
							<div class="col-md-2 col-md-offset-1">
								<a href="{{ route('checkout') }}" class="btn btn-success btn-lg">Prceed to Checkout <i class="fa fa-arrow-circle-o-right"></i></a>
							</div>
						</div>
					</div>
					

				@else
					<div class="row">
					<div class="col-sm-12">
						
							<div class="alert alert-info fade in">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="fa fa-times"></i></span>
								</button>
				            	<b>Info:</b> There are no orders in your cart
							</div>
							
						
					</div>
				</div>
				@endif
				

				<div class="single-page-icons social-icons"> 
					<ul>
						<li><h4>Share on</h4></li>
						<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
						<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
					</ul>
				</div>
			</div>
@endsection