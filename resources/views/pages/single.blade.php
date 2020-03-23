@extends('layout.master')
@section('title', 'Product')

@section('content')

<!-- breadcrumbs --> 
	<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.html">Home</a></li>
			<li class="active">Single Page</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides" style="list-style: none;">
								<li data-thumb="images/s1.jpg">
									<div class="thumb-image detail_images">
									@if(Storage::disk('local')->has('public/products/'.$product->image))
                                   <img src="{{ route('productimage',['filename' => $product->image]) }}" data-imagezoom="true" class="img-responsive" alt="img" >   
                            	@endif
									</div>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="visible-xs" style="margin-top: 20px;"></div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name">{{$product->name }}</h3>
						<p>Processing Time: Item will be shipped out within 2-3 working days. </p>
						<div class="single-rating">
							<ul>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								<li class="rating">20 reviews</li>
								<li><a href="#">Add your review</a></li>
							</ul> 
						</div>
						<div class="single-price">
							<ul>
								<li>Ghc {{$product->price - ($product->discount / 100) * $product->price }}</li>  
								<li><del>Ghc {{$product->price }}</del></li> 
								<li><span class="w3off">{{$product->discount }}% OFF</span></li> 
								<li>Ends on: June,5th</li>
								<li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
							</ul>	
						</div> 
						<p class="single-price-text">{{$product->description}}</p>
						<form action="{{ route('carts.store') }}" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $product->id }}">
							@guest
							 	<a href="{{route('login') }}" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>

							 @else
							 <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
							 @endguest 
							
						</form>
						{{-- <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button> --}}
					</div>
				   <div class="clearfix"> </div>  
				</div>
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