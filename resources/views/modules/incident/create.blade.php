@extends('layout.app')

@section('title')
    Incident | Create
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create Incident" :back-url="route('incident.index')">
                    <div class="d-flex">
                        <div class="form-group col-md-4">
                            <label>Name of Victim:<span class="text-danger">*</span></label>
                            <input type="text" name="victim" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date & Time:<span class="text-danger">*</span></label>
                            <select name="date" class="form-control">
                                <option value="">-- Please select --</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Place of Accident Occurred:<span class="text-danger">*</span></label>
                            <input type="text" name="family_head" class="form-control" value=""
                                placeholder="Enter Place" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Person Involved in Accident:<span class="text-danger">*</span></label>
                            <input type="text" name="family_head" class="form-control" value=""
                                placeholder="Enter N/A if personal incident" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleTextarea">Cause of Accident:<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleTextarea">Injury:<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        </div>
                    </div>
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-2 font-weight-bolder btn-info">CREATE
                                HOUSEHOLD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
