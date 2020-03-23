@extends('layout.master')

{{-- start content here --}}
@section('content')
	
		
	{{-- include banner here --}}
	@include('partials.banner')
	{{-- end banner --}}

	{{-- include featured products --}}
	@include('partials.featured_products')
	{{-- end featured products --}}

	{{-- include add product --}}
	@include('partials.add_product')
	{{-- end add product --}}




{{-- include deals here --}}
@include('partials.deals')
{{-- end deals --}}

@endsection