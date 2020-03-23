<!-- header -->
<div class="header">
	<div class="w3ls-header"><!--header-one--> 
		<div class="w3ls-header-left">
			<p><a href="#">UPTO $50 OFF ON LAPTOPS | USE COUPON CODE LAPPY </a></p>
		</div>
		<div class="w3ls-header-right">
			<ul>
				<li class="dropdown head-dpdn">
					@auth()
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}<span class="caret"></span></a>
						@else
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
					
					@endauth
						<ul class="dropdown-menu">
						@guest
						<li><a href="{{ route('login') }}">Login </a></li> 
						<li><a href="{{ route('register') }}">Sign Up</a></li>
						@else
						<li><a href="{{ route('carts.index') }}">My Orders</a></li>  
						{{-- <li><a href="#">Wallet</a></li> --}} 
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
						@endguest
						  
						
					</ul> 
				</li> 
				{{-- <li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-percent" aria-hidden="true"></i> Today's Deals<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="offers.html">Cash Back Offers</a></li> 
						<li><a href="offers.html">Product Discounts</a></li>
						<li><a href="offers.html">Special Offers</a></li> 
					</ul> 
				</li> --}} 
				{{-- <li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gift" aria-hidden="true"></i> Gift Cards<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="offers.html">Product Gift card</a></li> 
						<li><a href="offers.html">Occasions Register</a></li>
						<li><a href="offers.html">View Balance</a></li> 
					</ul> 
				</li> --}} 
				{{-- <li class="dropdown head-dpdn">
					<a href="contact.html" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i> Store Finder</a>
				</li> --}} 
				{{-- <li class="dropdown head-dpdn">
					<a href="card.html" class="dropdown-toggle"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Credit Card</a>
				</li>  --}}
				<li class="dropdown head-dpdn">
					<a href="{{ url('/faq') }}" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div> 
	</div>
	<div class="header-two"><!-- header-two -->
		<div class="container">
			<div class="header-logo">
				<h1><a href="{{ url('/') }}"><span>A</span>dwamart <i>App</i></a></h1>
				<h6><a><i>Your One Corner Market.</i></a></h6> 
			</div>	
			<div class="header-search">
				<form action="{{route('searchproductrequest') }}" method="post">
					{{csrf_field()}}
					<input type="search" name="Search" placeholder="Search for a Product..." required="" id="searchProduct">
					<button type="submit" class="btn btn-default" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
				</form>
			</div>
			{{-- <div class="header-cart"> 
				<div class="my-account">
					<a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> CONTACT US</a>						
				</div>
				<div class="cart"> 
					<form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart" />
						<input type="hidden" name="display" value="1" />
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
				</div>
				<div class="clearfix"> </div> 
			</div> --}} 
			<div class="clearfix"> </div>
		</div>		
	</div><!-- //header-two -->
	<div class="header-three"><!-- header-three -->
		<div class="container">
			<div class="menu">
				<div class="cd-dropdown-wrapper">
					<a class="cd-dropdown-trigger" href="#0">Store Categories</a>
					<nav class="cd-dropdown"> 
						<a href="#0" class="cd-close">Close</a>
						<ul class="cd-dropdown-content"> 
							
							@foreach ($public_data['categories'] as $category)
							<li class="has-children">
								<a href="#">{{ $category->name }}</a> 
								<ul class="cd-secondary-dropdown is-hidden">
									<li class="go-back"><a href="#">Menu</a></li>
									<li class="see-all"><a href="{{ route('getproductswithcategory', $category->id) }}">All {{ $category->name }}</a></li>
									@foreach ($category->offer as $offer)
							
									<li class="has-children">
										<a href="#">{{ strtoupper($offer->name) }}</a>  
										<ul class="is-hidden"> 
											<li class="go-back"><a href="{{ route('getproductswithoffer', $offer->id) }}">All {{ $category->name }}</a></li>
											@foreach ($offer->item as $item)
											
											<li class="">
												<a href="{{ route('getproductwithitem', $item->id) }}">{{ $item->name }}</a> 
											</li>
											@endforeach
										</ul>
									</li> 
									@endforeach
								</ul> <!-- .cd-secondary-dropdown --> 
							</li> <!-- .has-children -->
							@endforeach
							
					</nav> <!-- .cd-dropdown -->
				</div> <!-- .cd-dropdown-wrapper -->	 
			</div>
			<div class="move-text">
				<div class="marquee"><a href="offers.html"> New collections are available here...... <span>Get extra 10% off on everything | no extra taxes </span> <span> Try shipping pass free for 15 days with unlimited</span></a></div>
				<script type="text/javascript" src="{{ URL::to('Adwamart/js/jquery.marquee.min.js') }}"></script>
				<script>
				  $('.marquee').marquee({ pauseOnHover: true });
				  //@ sourceURL=pen.js
				</script>
			</div>
		</div>
	</div>
</div>