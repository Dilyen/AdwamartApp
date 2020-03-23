@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('page-header-title', 'Products')

@section('content')
	
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                    
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Belongs to</th>
                                            <th><i class="fa fa-gear"></i></th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($public_data['products'] as $product)
                                            <tr>
                                            <td>{{$product->name }}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->discount }}</td>
                                            <td>{{$product->item->name}}</td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" href='#modal-edit-{{ $product->id }}'>Edit</a>
                                                {{-- include edit modal --}}
                                                @include('admin.partials.modals.editproductsmodal')

                                                <a class="btn btn-danger" data-toggle="modal" href='#modal-delete-{{ $product->id }}'>Delete</a>
                                                {{-- include delete modal --}}
                                                @include('admin.partials.modals.deleteproductsmodal')
                                            </td>                                         
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-4">
                    <form action="{{route('products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                {{csrf_field()}}
                        <legend>Add Offer</legend>
                    
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Price &cent;</label>
                            <input type="text" name="price" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <input type="text" name="discount" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Item</label>
                            <select name="item" id="input" class="form-control item-select" required="required">
                                <option value="" disabled selected>Choose Item</option>
                                @foreach (  $public_data['items'] as $item)
                                   <option value="{{$item->id }}">{{$item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id="" placeholder="">
                        </div>
                        
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
        </div>
        <!-- /#page-wrapper -->

@endsection