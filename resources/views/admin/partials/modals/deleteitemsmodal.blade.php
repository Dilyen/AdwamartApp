<div class="modal fade" id="modal-delete-{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('items.destroy', $item->id) }}" method="POST" role="form">

            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete {{ $item->name }}</h4>
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


