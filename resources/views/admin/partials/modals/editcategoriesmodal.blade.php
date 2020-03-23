<div class="modal fade" id="modal-edit-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('categories.update', $category->id ) }}" method="POST" role="form">

                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit {{ $category->name }}</h4>
                </div>
                <div class="modal-body">
                   
                        
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" value="{{ $category->name }}">
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