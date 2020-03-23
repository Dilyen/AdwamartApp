<div class="modal fade" id="modal-delete-{{ $offer->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" role="form">

            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete {{ $offer->name }}</h4>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Are you sure you want to perform this action?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>


