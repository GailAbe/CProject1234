@extends('layout.app')

@section('title')
    Purchase Request | Create
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create Household" :back-url="route('household.index')">
                    <div class="d-flex">
                        <div class="form-group col-md-4">
                            <label>Household No. <span class="text-danger">*</span></label>
                            <input type="text" name="household_number" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Purok: <span class="text-danger">*</span></label>
                            <select name="purok_name" class="form-control">
                                <option value="">-- Please select --</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Family Head: <span class="text-danger">*</span></label>
                            <input type="text" name="family_head" class="form-control" value=""
                                placeholder="Enter Family Head" />
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-card title="Item list" data-item-container>
                    <button type="button" class="btn btn-primary mb-3" data-add-item>Add new item</button>
                    <div class="row" data-parent>
                        <div class="form-group col-md-4">
                            <label>Full Name:<span class="text-danger">*</span></label>
                            <input type="text" name="fullname[]" class="form-control" value=""
                                placeholder="Enter Full Name" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Gender:</label>
                            <select name="gender" class="form-control">
                                <option value="">-- Please select --</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Birthdate:</label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter purpose" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Birth Place:</label>
                            <input type="text" name="bplace[]" class="form-control" value=""
                                placeholder="Enter purpose" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Civil Status:</label>
                            <select name="cstatus[]" class="form-control">
                                <option value="">-- Please select --</option>
                            </select>
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
