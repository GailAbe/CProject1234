@extends('layout.app')

@section('title')
    Household Record | View
@endsection

@section('content')
    <form method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="View Household Record" :back-url="route('household.index')">
                    <div class="d-flex">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">House No.</label>
                            <input type="text" name="household_number" class="form-control"
                                value="{{ $household->household_number }}" placeholder="Enter House No." required
                                readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bolder">Purok:</label>
                            <select name="purok_name" class="form-control" required disabled>
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
                    @foreach ($household->members as $hmember)
                        <div class="row border rounded-sm border-dark pt-3 m-2" {{ $loop->first ? 'data-parent' : '' }}>
                            <input type="hidden" name="memberId[]" value="{{ $hmember->id }}">
                            <div class="form-group col-md-4">
                                <label class="font-weight-bolder">Full Name:</label>
                                <input type="text" name="fullname[]" class="form-control"
                                    value="{{ $hmember->fullname }}" placeholder="Lastname, Firstname Middlename"
                                    readonly />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bolder">Gender:</label>
                                <select name="gender[]" class="form-control" disabled>
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
                                    placeholder="" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bolder">Birth Place:</label>
                                <input type="text" name="bplace[]" class="form-control" value="{{ $hmember->bplace }}"
                                    placeholder="Enter purpose" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bolder">Civil Status:</label>
                                <div class="input-group">
                                    <select name="cstatus[]" class="form-control" disabled>
                                        <option value="">-- Please select --</option>
                                        @foreach ($cstatus as $status)
                                            <option value="{{ $status }}" @selected($hmember->cstatus == $status)>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </x-card>
            </div>
        </div>
    </form>
@endsection
