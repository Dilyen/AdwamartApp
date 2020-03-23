@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('page-header-title', 'Items')

@section('content')
	
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Items
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                    
                                            <th>Name</th>
                                            <th>Number of Products</th>
                                            <th><i class="fa fa-gear"></i></th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($public_data['items'] as $item)
                                            <tr>
                                            <td>{{$item->name }}</td>
                                            <td>{{$item->product()->count()}}</td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" href='#modal-edit-{{ $item->id }}'>Edit</a>
                                                {{-- include edit modal --}}
                                                @include('admin.partials.modals.edititemsmodal')

                                                <a class="btn btn-danger" data-toggle="modal" href='#modal-delete-{{ $item->id }}'>Delete</a>
                                                {{-- include delete modal --}}
                                                @include('admin.partials.modals.deleteitemsmodal')
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
                    <form action="{{route('items.store') }}" method="POST" role="form">

                        {{csrf_field()}}
                        <legend>Add Offer</legend>
                    
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Item Name">
                        </div>
                        <div class="form-group">
                            <label for="">Offer</label>
                            <select name="category" id="input" class="form-control offer-select" required="required" >
                                <option value="" disabled selected>Choose Offer</option>
                                @foreach (  $public_data['offers'] as $offer)
                                   <option value="{{$offer->id }}">{{$offer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
        </div>
        <!-- /#page-wrapper -->

@endsection