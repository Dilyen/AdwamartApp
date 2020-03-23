@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('page-header-title', 'Offers')

@section('content')
	
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Offers
                        </div>
                         @isset ($public_data['offers'])
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                    
                                            <th>Name</th>
                                            <th>Number of Items</th>
                                            <th><i class="fa fa-gear"></i></th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($public_data['offers'] as $offer)
                                        <tr>
                                            <td>{{ $offer->name }}</td>
                                            <td>{{ $offer->item()->count() }}</td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" href='#modal-edit-{{ $offer->id }}'>Edit</a>
                                                {{-- include edit modal --}}
                                                @include('admin.partials.modals.editoffersmodal')

                                                <a class="btn btn-danger" data-toggle="modal" href='#modal-delete-{{ $offer->id }}'>Delete</a>
                                                {{-- include delete modal --}}
                                                @include('admin.partials.modals.deleteoffersmodal')
                                            </td>                                         
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        @else
                            <p>No Category Available</p>
                        @endisset

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-4">
                    <form action="{{route('offers.store') }}" method="POST" role="form">
                        {{ csrf_field() }}
                        <legend>Add Offer</legend>
                    
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Offer Name">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" id="input" class="form-control category-select" required="required">
                               <option value="" disabled selected>Choose Category</option>
                                @foreach (  $public_data['categories'] as $category)
                                   <option value="{{$category->id }}">{{$category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
        </div>
        <!-- /#page-wrapper -->

@endsection