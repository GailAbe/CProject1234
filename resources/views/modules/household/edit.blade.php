@extends('layout.app')

@section('title')
    Household Record | Edit
@endsection

@section('content')
    <x-errors></x-errors>
    <x-success></x-success>
    <form action="{{ route('household.update', $household->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="Edit Household Record" :back-url="route('household.index')">
                    <div class="d-flex">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">House No. <span class="text-danger">*</span></label>
                            <input type="text" name="household_number" class="form-control"
                                value="{{ $household->household_number }}" placeholder="Enter House No." required />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Purok: <span class="text-danger">*</span></label>
                            <select name="purok_name" class="form-control" required>
                                <option value="">-- Please select --</option>
                                @foreach ($puroks as $purok)
                                    <option value="{{ $purok }}" @selected($household->purok_name == $purok)>{{ $purok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-card title="Household Members" data-item-container>
                    <button type="button" class="btn btn-primary mb-3" data-add-item>Add new item</button>
                    @foreach ($household->members as $hmember)
                        <div class="row border rounded-sm border-dark pt-3 m-2" {{ $loop->first ? 'data-parent' : '' }}>
                            <input type="hidden" name="memberId[]" value="{{ $hmember->id }}">
                            <div class="form-group col-md-4">
                                <label class="font-weight-bolder">Full Name:<span class="text-danger">*</span></label>
                                <input type="text" name="fullname[]" class="form-control"
                                    value="{{ $hmember->fullname }}" placeholder="Lastname, Firstname Middlename" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bolder">Gender:</label>
                                <select name="gender[]" class="form-control">
                                    <option value="">-- Please select --</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender }}" @selected($hmember->gender == $gender)>
                                            {{ $gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bolder">Birthdate:</label>
                                <input type="date" name="bdate[]" class="form-control" value="{{ $hmember->bdate }}"
                                    placeholder="" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bolder">Birth Place:</label>
                                <input type="text" name="bplace[]" class="form-control" value="{{ $hmember->bplace }}"
                                    placeholder="Enter purpose" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bolder">Civil Status:</label>
                                <div class="input-group">
                                    <select name="cstatus[]" class="form-control">
                                        <option value="">-- Please select --</option>
                                        @foreach ($cstatus as $status)
                                            <option value="{{ $status }}" @selected($hmember->cstatus == $status)>
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
                    @endforeach
                    <x-slot:footer>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn col-md-2 font-weight-bolder btn-info">UPDATE RECORD</button>
                        </div>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection
