<div class="modal fade" id="modal-delete-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" role="form">

            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete {{ $category->name }}</h4>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Are you sure you want to perform this action?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>


