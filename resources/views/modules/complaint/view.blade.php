@extends('layout.app')

@section('title')
    Complaint | View
@endsection

@section('content')
    <x-errors></x-errors>
    <x-success></x-success>

    <div class="row">
        <div class="col-md-6">
            <x-card title="Settled Complaint" :back-url="route('complaint.index')">
                <div class="d-flex flex-wrap">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bolder">Name of Complainant:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $complaint->complainant }}" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bolder">Date & Time:<span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" value="{{ $complaint->date_time }}" readonly />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bolder">Witness:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $complaint->witness }}" readonly />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bolder">Complain To:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $complaint->complaint_to }}" readonly />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bolder" for="exampleTextarea">Notes/Cause of Complaint:<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" readonly>{{ $complaint->notes }}</textarea>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="col-md-6">
            <form method="post" action="{{ route('complaint.settleImageStore', $complaint->id) }}"
                enctype="multipart/form-data">
                @csrf
                <x-card title="Upload Image">
                    <x-slot:toolbar>
                        @if ($image == 'no-image.jpg')
                            <label for="file-upload" class="custom-file-upload font-weight-bold btn btn-outline-primary">
                                <i class="fas fa-cloud-upload-alt"></i> Upload File
                            </label>
                            <input id="file-upload" class="form-control" type="file" name="image"
                                onchange="loadFile(event)" required />
                        @endif
                    </x-slot:toolbar>
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-12 text-center">
                            @if ($image != null)
                                <img src="{{ asset('images/' . $image) }}" alt="image" id="output"
                                    class="img-fluid max-w-200px" />
                            @endif
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-center">
                            @if ($complaint->complaint_status == 'Not Settled')
                                <button class="btn font-weight-bolder btn-light-warning btn-lg col-md-8" hidden
                                    id="btn_pic" type="submit">Set
                                    as settled</button>
                            @endif
                        </div>
                    </x-slot:footer>
                </x-card>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);

            var btn_pic = document.getElementById('btn_pic');
            btn_pic.hidden = false;
        }
    </script>
@endpush
