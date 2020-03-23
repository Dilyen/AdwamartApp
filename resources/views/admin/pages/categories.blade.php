@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('page-header-title', 'Categories')

@section('content')
	
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Categories
                        </div>
                        <!-- /.panel-heading -->
                        @isset ($public_data['categories'])
                            
                             
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                    
                                            <th>Name</th>
                                            <th>Number of Offers</th>
                                            <th><i class="fa fa-gear"></i></th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($public_data['categories'] as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->offer()->count() }}</td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" href='#modal-edit-{{ $category->id }}'>Edit</a>
                                                {{-- include edit modal --}}
                                                @include('admin.partials.modals.editcategoriesmodal')

                                                <a class="btn btn-danger" data-toggle="modal" href='#modal-delete-{{ $category->id }}'>Delete</a>
                                                {{-- include delete modal --}}
                                                @include('admin.partials.modals.deletecategoriesmodal')
                                            </td>                                         
                                        </tr>
                                           
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                      
                        @else
                            <h3>No Category Available</h3>
                        @endisset


                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-4">
                    <form action="{{route('categories.store') }}" method="POST" role="form">

                        {{ csrf_field() }}
                        <legend>Add Category</legend>
                    
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Category Name">
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
        </div>
        <!-- /#page-wrapper -->

@endsection