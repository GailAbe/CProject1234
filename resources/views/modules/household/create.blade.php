@extends('layout.app')

@section('title')
    Household Record | Create
@endsection

@section('content')
    <x-errors></x-errors>
    <x-success></x-success>
    <form action="{{ route('household.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <x-card title="Create Household Record" :back-url="route('household.index')">
                    <div class="d-flex">
                        <div class="form-group col-md-6">
                            <label>Household No. <span class="text-danger">*</span></label>
                            <input type="text" name="household_number" class="form-control"
                                value="{{ old('household_number') }}" placeholder="Enter Household No." required />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Purok: <span class="text-danger">*</span></label>
                            <select name="purok_name" class="form-control" required>
                                <option value="">-- Please select --</option>
                                @foreach ($puroks as $purok)
                                    <option value="{{ $purok }}" @selected(old('purok_name') == $purok)>{{ $purok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Fullname of Family Head</label>
                            <input type="text" name="fhead_name" class="form-control" value="{{ old('fhead_name') }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label>Gender of Family Head</label>
                            <select name="fhead_gender" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}" @selected(old('fhead_gender') == $gender)>{{ $gender }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Civil Status</label>
                            <select name="fhead_cstatus" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($cstatus as $status)
                                    <option value="{{ $status }}" @selected(old('fhead_cstatus') == $status)>{{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Birth Place:</label>
                            <input type="text" name="fhead_bplace" class="form-control" value="{{ old('fhead_bplace') }}"
                                placeholder="Birthplace" required />
                        </div>
                        <div class="col-md-6">
                            <label>Birth Date:</label>
                            <input type="date" name="fhead_bdate" class="form-control" value="{{ old('fhead_bdate') }}"
                                placeholder="Birthdate" required />
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-card title="Household Members" data-item-container>
                    <button type="button" class="btn btn-primary mb-3" data-add-item>Add new item</button>
                    <div class="row border rounded-sm border-dark pt-3 m-2" data-parent>
                        <div class="form-group col-md-4">
                            <label>Full Name:<span class="text-danger">*</span></label>
                            <input type="text" name="fullname[]" class="form-control" value=""
                                placeholder="Lastname, Firstname Middlename" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Gender:</label>
                            <select name="gender[]" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}" @selected(old('gender.0') == $gender)>{{ $gender }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Birthdate:</label>
                            <input type="date" name="bdate[]" class="form-control" value="" placeholder="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Birth Place:</label>
                            <input type="text" name="bplace[]" class="form-control" value=""
                                placeholder="Enter purpose" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Civil Status:</label>
                            <div class="input-group">
                                <select name="cstatus[]" class="form-control">
                                    <option value="">-- Please select --</option>
                                    @foreach ($cstatus as $status)
                                        <option value="{{ $status }}" @selected(old('cstatus.0') == $status)>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-group-append d-none" data-item-hide>
                                    <button class="btn btn-danger" type="button" data-remove-item>
                                        <span class="flaticon2-trash"></span>
                                    </button>
                                </div>
                            </div>
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
