@if ($errors->any())
    <div class="alert alert-custom alert-danger">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span><br>
            @endforeach
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
