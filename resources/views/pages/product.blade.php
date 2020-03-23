@extends('layout.master')
@section('title', 'Products Page')
@section('content')
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.html">Home</a></li>
					<li class="active">Products</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>Electronics</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter By<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Low price</a></li> 
								<li><a href="#">High price</a></li>
								<li><a href="#">Latest</a></li> 
								<li><a href="#">Popular</a></li> 
							</ul> 
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Samsung</a></li> 
								<li><a href="#">LG</a></li>
								<li><a href="#">Sony</a></li> 
								<li><a href="#">Other</a></li> 
							</ul> 
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
					
				@if (count($products) > 0)
				@foreach ($products as $product)
				<div class="col-md-3 product-grids">
					 	<div class="agile-products">
							<div class="new-tag"><h6>{{$product->discount}}%<br>Off</h6></div>

							@if(Storage::disk('local')->has('public/products/'.$product->image))
                                   <a href="{{route('products.show', $product->id)}}"><img src="{{ route('productimage',['filename' => $product->image]) }}" class="img-responsive" alt="img" > </a>   
                            @endif
		
							<div class="agile-product-text">              
								<h5><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></h5> 
								<h6><del>{{$product->price}}</del>Ghc {{$product->price - ($product->discount / 100) * $product->price }}</h6> 
								<form action="#" method="post">
									{{-- <input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Audio speaker" /> 
									<input type="hidden" name="amount" value="100.00" />  --}}
									<a href="{{route('products.show', $product->id)}}" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>
								</form> 
							</div>
						</div> 
						</div>
					 @endforeach
				@else
				<h6 style="text-align: center;">There are no products</h6>
				@endif
					 
						
					
					
					<div class="clearfix"> </div>
				</div>
				<!-- add-products --> 
				<div class="w3ls-add-grids w3agile-add-products">
					<a href="#"> 
						<h4>TOP 10 TRENDS FOR YOU FLAT <span>20%</span> OFF</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<!-- //add-products -->
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Filter By Price</h4>            
						<div class="row row1 scroll-pane">
							<form action="{{route('getproductbyprice') }}" method="post">
								{{csrf_field()}}
							<label class="checkbox"><input type="radio" name="filter" value="0"><i></i>0 - Gh 100 </label>
							<label class="checkbox"><input type="radio" name="filter" value="100"><i></i>Gh 100 - Gh 200 </label> 
							<label class="checkbox"><input type="radio" name="filter" value="200"><i></i>Gh 200 - Gh 300  </label> 
							<label class="checkbox"><input type="radio" name="filter" value="300"><i></i>Gh 300 - Gh 400 </label> 
							<label class="checkbox"><input type="radio" name="filter" value="more"><i></i>More</label> 

							<button type="submit" class="btn" style="background-color: #1af; color: #fff;">Filter</button>
							</form>
							
						</div> 
					</div>
					
					<div class="sidebar-row" style="margin-top: 120px;">
						<h4>DISCOUNTS</h4>
						<div class="row row1 scroll-pane">
							<form action="{{route('getproductbydiscount') }}" method="post">
								{{csrf_field()}}
							<label class="checkbox"><input type="radio" name="filter" value="0"><i></i>Upto - 10% </label>
							<label class="checkbox"><input type="radio" name="filter" value="10"><i></i>10% - 20% </label>
							<label class="checkbox"><input type="radio" name="filter" value="20"><i></i>20% - 30% </label>
							<label class="checkbox"><input type="radio" name="filter" value="more"><i></i>More </label>
							

							<button type="submit" class="btn" style="background-color: #1af; color: #fff;">Filter</button>
							</form>
							
						</div>
					</div>
								 
				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="w3ls-title">Our Recommendations </h3> 
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>
				<div id="owl-demo5" class="owl-carousel">
					@foreach ($public_data['products'] as $product)
									<div class="item">
									<div class="glry-w3agile-grids agileits">
									
											<a href="{{route('products.show', $product->id)}}">
										@if(Storage::disk('local')->has('public/products/'.$product->image))
                                   		<a href="{{route('products.show', $product->id)}}"><img src="{{ route('productimage',['filename' => $product->image]) }}"  alt="img" > </a>   
                           				 @endif 
											</a>
											<div class="view-caption agileits-w3layouts">           
												<h4><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></h4>
												<p>{{$product->description}}</p>
												<h5>{{$product->price}}</h5> 
												<form action="#" method="post">
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" /> 
													<input type="hidden" name="w3ls_item" value="Audio speaker" /> 
													<input type="hidden" name="amount" value="100.00" /> 
													<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
												</form>  
											</div>   
										</div> 
									</div>
									@endforeach 
				</div>    
			</div>
			<!-- //recommendations -->
		</div>
	</div>
	<!--//products-->  
@endsection

