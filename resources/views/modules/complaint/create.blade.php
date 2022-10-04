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
                        <div class="form-group col-md-6">
                            <label>Name of Complainant:<span class="text-danger">*</span></label>
                            <input type="text" name="complainant" class="form-control" value=""
                                placeholder="Enter Name of Complainant" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date & Time:<span class="text-danger">*</span></label>
                            <input type="date" name="complainant" class="form-control" value="" placeholder="" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Witness:<span class="text-danger">*</span></label>
                            <input type="text" name="witness" class="form-control" value=""
                                placeholder="Enter Witness" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleTextarea">Notes/Cause of Complaint:<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="notes" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleTextarea">Complain To:<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="complaint_to" rows="3"></textarea>
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
