	<!-- welcome -->
	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class=" nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" >
							<i class="fa fa-laptop" aria-hidden="true"></i> 
							<h5>Electronics</h5>
						</a></li>
						<li role="presentation"><a href="#carl" role="tab" id="carl-tab" data-toggle="tab"> 
							<i class="fa fa-female" aria-hidden="true"></i>
							<h5>Fashion</h5>
						</a></li>
						<li role="presentation"><a href="#james" role="tab" id="james-tab" data-toggle="tab"> 
							<i class="fa fa-gift" aria-hidden="true"></i>
							<h5>Photo & Gifts</h5>
						</a></li>
						<li role="presentation"><a href="#decor" role="tab" id="decor-tab" data-toggle="tab"> 
							<i class="fa fa-home" aria-hidden="true"></i>
							<h5>Home Decor</h5>
						</a></li>
						<li role="presentation"><a href="#sports" role="tab" id="sports-tab" data-toggle="tab"> 
							<i class="fa fa-motorcycle" aria-hidden="true"></i>
							<h5>Sports</h5>
						</a></li> 
					</ul>
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Featured Products</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<div id="owl-demo" class="owl-carousel"> 
									
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
													{{-- <input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" /> 
													<input type="hidden" name="w3ls_item" value="Audio speaker" /> 
													<input type="hidden" name="amount" value="100.00" />  --}}
													<a 
													href="{{route('products.show', $product->id)}}" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>
												</form>  
											</div>   
										</div> 
									</div>
									@endforeach
								</div>
							</div>		
						</div>
						<div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo1" class="owl-carousel"> 
									   
									@foreach ($public_data['products'] as $product)
									<div class="item">
									<div class="glry-w3agile-grids agileits">
										<div class="new-tag"><h6>{{$product->discount}}% <br> Off</h6></div>
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
						</div> 
						    
							</div>
						</div>

						
						 
					</div>   
				</div>  
			</div>  	
	<!-- //welcome -->