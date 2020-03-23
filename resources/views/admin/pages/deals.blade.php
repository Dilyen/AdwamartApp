@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('page-header-title', 'Deals')

@section('content')
	
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Deals
                        </div>
                        <!-- /.panel-heading -->
                        @isset ($public_data['deals'])
                            
                             
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                    
                                            <th>Name</th>
                                            <th><i class="fa fa-gear"></i></th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($public_data['deals'] as $deal)
                                        <tr>
                                            <td>{{ $deal->name }}</td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" href='#modal-edit-{{ $deal->id }}'>Edit</a>
                                                {{-- include edit modal --}}
                                                {{-- @include('admin.partials.modals.editdealsmodal') --}}

                                                <a class="btn btn-danger" data-toggle="modal" href='#modal-delete-{{ $deal->id }}'>Delete</a>
                                                {{-- include delete modal --}}
                                               {{--  @include('admin.partials.modals.deletedealsmodal') --}}
                                            </td>                                         
                                        </tr>
                                           
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                      
                        @else
                            <h3>No Deal Available</h3>
                        @endisset


                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-4">
                    <form action="{{route('deals.store') }}" method="POST" role="form">

                        {{ csrf_field() }}
                        <legend>Add deal</legend>
                    
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Deal Name">
                        </div>
                        <div class="form-group">
                            <label for="">Icon</label>
                            <select class="form-control" name="icon">
                                <option value="mobile">mobile</option>
                                <option value="laptop">laptop</option>
                                <option value="wheelchair">wheelchair</option>
                                <option value="home">home</option>
                                <option value="book">book</option>
                                <option value="asterisk">asterisk</option>
                                <option value="gamepad">gamepad</option>
                                <option value="shopping-basket">shopping-basket</option>
                                <option value="medkit">medkit</option>
                                <option value="car">car</option>
                                <option value="cutlery">cutlery</option>
                                <option value="futbol-o">football</option>
                                <option value="gift">gift</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Item of Deal</label>
                            <select name="item" id="input" class="form-control" required="required">
                               <option value="" disabled selected>Choose Item</option>
                                @foreach (  $public_data['items'] as $item)
                                   <option value="{{$item->id }}">{{$item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
        </div>
        <!-- /#page-wrapper -->

@endsection