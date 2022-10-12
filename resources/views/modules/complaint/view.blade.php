@extends('layout.app')

@section('title')
    Complaint | View
@endsection

@section('content')
    <x-errors></x-errors>
    <form method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <x-card title="Settled Complaint" :back-url="route('complaint.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Name of Complainant:<span class="text-danger">*</span></label>
                            <input type="text" name="complainant" class="form-control"
                                value="{{ $complaint->complainant }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Date & Time:<span class="text-danger">*</span></label>
                            <input type="datetime-local" name="date_time" class="form-control"
                                value="{{ $complaint->date_time }}" readonly />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Witness:<span class="text-danger">*</span></label>
                            <input type="text" name="witness" class="form-control" value="{{ $complaint->witness }}"
                                readonly />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Complain To:<span class="text-danger">*</span></label>
                            <input type="text" name="complaint_to" class="form-control"
                                value="{{ $complaint->complaint_to }}" readonly />
                        </div>
                        {{-- data add item to dapat --}}
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder" for="exampleTextarea">Notes/Cause of Complaint:<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="notes" rows="4" readonly>{{ $complaint->notes }}</textarea>
                        </div>
                    </div>
                </x-card>
            </div>
            <div class="col-md-6">
                <x-card title="Upload Image">
                    <x-slot:toolbar>
                        <label for="file-upload" class="custom-file-upload font-weight-bold btn btn-outline-primary">
                            <i class="fas fa-cloud-upload-alt"></i> Upload File
                        </label>
                        <input id="file-upload" type="file" />
                    </x-slot:toolbar>
                    <div class="row">

                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-center">
                            <button type="reset" class="btn font-weight-bolder btn-light-danger btn-lg col-md-8">SET AS
                                SETTLED</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
        </div>
    </form>
@endsection
