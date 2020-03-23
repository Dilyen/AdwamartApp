<div class="modal fade" id="modal-edit-{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('products.update', $product->id) }}" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit {{ $product->name }}</h4>
                </div>
                <div class="modal-body">
                   
                        
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="" placeholder="Enter Product Name">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Price &cent;</label>
                            <input type="text" value="{{ $product->price }}" name="price" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <input type="text" value="{{ $product->discount }}" name="discount" class="form-control" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Item</label>
                            <select name="item" id="input" class="form-control item-select" required="required" style="width: 100%;">
                                <option value="" disabled>Choose Item</option>
                                @foreach (  $public_data['items'] as $item)
                                   <option value="{{$item->id }}" {{ $product->item_id == $item->id ? 'selected' : ''}}>{{$item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id="" placeholder="">
                        </div>
                        
                            
                        
                          
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>