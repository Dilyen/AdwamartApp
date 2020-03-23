<div class="deals"> 
		<div class="container"> 
			<h3 class="w3ls-title">DEALS OF THE DAY </h3>
			<div class="deals-row">
				@if (count($public_data['deals']))
					@foreach ($public_data['deals'] as $deal)
						<div class="col-md-3 focus-grid"> 
							<a href="{{route('deals.show', $deal->item->id)}}" class="wthree-btn"> 
							<div class="focus-image"><i class="fa fa-{{$deal->icon}}"></i></div>
							<h4 class="clrchg">{{$deal->name}}</h4> 
							</a>
						</div>
					@endforeach
				@else
					<h6>There are no deals</h6>
				@endif
				
				<div class="clearfix"> </div>
			</div>  	
		</div>  	
	</div> 