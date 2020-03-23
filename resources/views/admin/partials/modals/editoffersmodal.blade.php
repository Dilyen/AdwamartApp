<div class="modal fade" id="modal-edit-{{ $offer->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('offers.update', $offer->id) }}" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit {{ $offer->name }}</h4>
                </div>
                <div class="modal-body">
                   
                        
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $offer->name }}" class="form-control" id="" >
                            </div>

                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category" id="input" class="form-control category-select" required="required" style="width: 100%;">
                                   <option value="" disabled>Choose Category</option>
                                    @foreach (  $public_data['categories'] as $category)
                                       <option value="{{$category->id }}" {{ $offer->category_id == $category->id ? 'selected' : '' }}>{{$category->name }}</option>
                                    @endforeach
                                </select>
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