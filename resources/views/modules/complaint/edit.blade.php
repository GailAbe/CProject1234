@extends('layout.app')

@section('title')
    Complaint | Edit
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="{{ route('complaint.update', $complaint->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="Edit Complaint" :back-url="route('complaint.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Name of Complainant:<span class="text-danger">*</span></label>
                            <input type="text" name="complainant" class="form-control"
                                value="{{ $complaint->complainant }}" placeholder="Enter Name of Complainant" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Date & Time:<span class="text-danger">*</span></label>
                            <input type="datetime-local" name="date_time" class="form-control"
                                value="{{ $complaint->date_time }}" placeholder="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Witness:<span class="text-danger">*</span></label>
                            <input type="text" name="witness" class="form-control" value="{{ $complaint->witness }}"
                                placeholder="Enter Witness" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Complain To:<span class="text-danger">*</span></label>
                            <input type="text" name="complaint_to" class="form-control"
                                value="{{ $complaint->complaint_to }}" placeholder="" />
                        </div>
                        {{-- data add item to dapat --}}
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder" for="exampleTextarea">Notes/Cause of Complaint:<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="notes" rows="4">{{ $complaint->notes }}</textarea>
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-4 font-weight-bolder btn-info">UPDATE COMPLAINT
                                RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
