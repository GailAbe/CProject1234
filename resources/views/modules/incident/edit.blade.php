@extends('layout.app')

@section('title')
    Incident | Edit
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="{{ route('incident.update', $incident->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="Edit Incident" :back-url="route('incident.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-4">
                            <label>Name of Victim:<span class="text-danger">*</span></label>
                            <input type="text" name="victim" class="form-control" value="{{ $incident->victim }}"
                                placeholder="Enter Victim Name" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date & Time:<span class="text-danger">*</span></label>
                            <input type="datetime-local" name="date" value="{{ $incident->date }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Place of Accident Occurred:<span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control" value="{{ $incident->location }}"
                                placeholder="Enter Place" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Person Involved in Accident:<span class="text-danger">*</span></label>
                            <input type="text" name="person_involved" class="form-control"
                                value="{{ $incident->person_involved }}" placeholder="Enter N/A if personal incident" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cause of Accident:<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="cause" rows="5">{{ $incident->cause }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Injury:<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="injury" rows="5">{{ $incident->injury }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Incident Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="incident_description" rows="5">{{ $incident->incident_description }}</textarea>
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-4 font-weight-bolder btn-info">UPDATE
                                INCIDENT RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
