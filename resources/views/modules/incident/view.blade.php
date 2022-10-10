@extends('layout.app')

@section('title')
    Incident | View
@endsection

@section('content')
    <x-errors></x-errors>
    <form method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="View Incident" :back-url="route('incident.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-4">
                            <label>Name of Victim:<span class="text-danger">*</span></label>
                            <input type="text" name="victim" class="form-control" value="{{ $incident->victim }}"
                                readonly />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date & Time:<span class="text-danger">*</span></label>
                            <input type="datetime-local" name="date" value="{{ $incident->date }}" class="form-control"
                                readonly />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Place of Accident Occurred:<span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control" value="{{ $incident->location }}"
                                readonly />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Person Involved in Accident:<span class="text-danger">*</span></label>
                            <input type="text" name="person_involved" class="form-control"
                                value="{{ $incident->person_involved }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cause of Accident:<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="cause" rows="5" readonly>{{ $incident->cause }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Injury:<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="injury" rows="5" readonly>{{ $incident->injury }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Incident Description: <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="incident_description" rows="5" readonly>{{ $incident->incident_description }}</textarea>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </form>
@endsection
