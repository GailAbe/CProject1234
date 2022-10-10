@extends('layout.app')

@section('title')
    Complaint | Create
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="{{ route('complaint.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create Complaint" :back-url="route('complaint.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Name of Complainant:<span class="text-danger">*</span></label>
                            <input type="text" name="complainant" class="form-control" value="{{ old('complainant') }}"
                                placeholder="Enter Name of Complainant" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Date & Time:<span class="text-danger">*</span></label>
                            <input type="datetime-local" name="date_time" class="form-control"
                                value="{{ old('date_time') }}" placeholder="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Witness:<span class="text-danger">*</span></label>
                            <input type="text" name="witness" class="form-control" value="{{ old('witness') }}"
                                placeholder="Enter Witness" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder">Complain To:<span class="text-danger">*</span></label>
                            <input type="text" name="complaint_to" class="form-control" value="{{ old('complaint_to') }}"
                                placeholder="" />
                        </div>
                        {{-- data add item to dapat --}}
                        <div class="form-group col-md-12">
                            <label class="font-weight-bolder" for="exampleTextarea">Notes/Cause of Complaint:<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="notes" rows="4">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-4 font-weight-bolder btn-info">CREATE COMPLAINT
                                RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
